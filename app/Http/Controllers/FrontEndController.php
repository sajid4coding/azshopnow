<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use App\Mail\OrderMailNotification;
use App\Models\{Banner, Blog, Cart, Category, Coupon, Inventory, Invoice ,Order_Detail, Page, Product, ProductGallery, ProductReport, ProductReview, ReviewGallery, SubCategory, User, Wishlist};
use Khsing\World\World;
use Khsing\World\Models\Country;
use Doctrine\Inflector\WordInflector;
use Illuminate\Support\Facades\Mail;
use App\Models\General;
use App\Notifications\OrderNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;
use Share;

class FrontEndController extends Controller
{

    function single_product ($id,$title){
        Product::find($id)->increment('product_views');
        $inventory=Inventory::where('product_id',$id)->first();
        $productGalleries= ProductGallery::where('product_id',$id)->get();
        $product_reviews = ProductReview::where('product_id', $id)->get();
        $single_product = Product::findOrFail($id);
        $product_id = $id;
        $recommendedProducts=Product::where([
            'parent_category_slug'=>$single_product->parent_category_slug,
            'status'=>'published',
            'vendorProductStatus'=>'published',
            ])->where('id','!=',$id)->limit(4)->get();

        // Product Share
       $shareButtons= Share::currentPage()
       ->facebook()
       ->linkedin()
       ->twitter()
       ->telegram();

        return view('frontend.single.product', compact('single_product','recommendedProducts', 'productGalleries','product_reviews','inventory','product_id','shareButtons'));
    }
     function newsletter(Request $request){
         $request -> validate([
            'email' => 'required|email'
         ]);

    }
    function report_product(Request $request, $id){
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'subject' => 'required',
            'customer_message' => 'required'
        ]);

        ProductReport::insert([
            'user_id' => auth()->id(),
            'product_id' => $id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'phone_number' => $request->phone_number,
            'subject' => $request->subject,
            'customer_message' => $request->customer_message,
            'created_at' => now()
        ]);
        return back()->with('report_success', 'Report Submit Successful');
    }

    function contact_us_index(){
        return view('frontend.contact_us');
    }
    function postBlog (){
        $banners = Banner::all()->first();
        $blogs=Blog::where('status','published')->get()->shuffle();
        return view('frontend.blog',compact('blogs','banners'));
    }
    function singleBlogPost ($id,$title){
        $banners = Banner::all()->first();
        $blog=Blog::findOrFail($id);
        $shareButtons= Share::currentPage()
       ->facebook()
       ->linkedin()
       ->twitter()
       ->telegram();
        return view('frontend.blog_single_post',compact('blog','banners','shareButtons'));
    }

    function newArrivals(){
        $products=Product::where('status','published')->where('vendorProductStatus','published')->latest()->paginate(9);
        $banners = Banner::all()->first();
        $bannerProducts=Product::where('status','published')->where('vendorProductStatus','published')->where('discount_price','!=',NULL)->latest()->limit(3)->get();
        return view('frontend.newArrivals',compact('products','banners','bannerProducts'));
    }

    function topSelection(){
        $topReviews=ProductReview::where('rating','>',3)->latest()->paginate(9);
        $banners = Banner::all()->first();
        return view('frontend.topSelection',compact('banners','topReviews'));
    }
    function shop_page(){
        $products=Product::where('status','published')->where('vendorProductStatus','published')->paginate(9);
        $bannerProducts=Product::where('status','published')->where('vendorProductStatus','published')->latest()->limit(3)->get();
        $banners = Banner::all()->first();
        return view('frontend.shop',compact('products','banners','bannerProducts'));
    }
    function categoryProduct($slug){
        $categoryName=Category::where('slug', $slug)->first();
        $products=Product::where('parent_category_slug',$slug)->where('status','published')->where('vendorProductStatus','published')->paginate(9);
        return view('frontend.categoryProduct', compact('products','categoryName'));
    }

    function vendorProduct($id, $shopname){
        $shopName=User::findOrFail($id);
        $products=Product::where('vendor_id',$id)->where('status','published')->where('vendorProductStatus','published')->latest()->paginate(9);
        return view('frontend.vendorProduct', compact('products','shopName'));
    }
    function cart(){
        return view('frontend.cart',[
            'banners' => Banner::all()->first(),
        ]);
    }
    function wishlist(){
        return view('frontend.wishlist',[
            'banners' => Banner::all()->first(),
            'wishlists' => Wishlist::where('user_id', auth()->id())->get()
        ]);
    }
    function wishlist_delete_row($inventory_id){
        Wishlist::where('inventory_id', $inventory_id)->delete();
        return back();
    }
    function checkout(){
        $explode_cart = explode('/', url()->previous());
        $cart_page = end($explode_cart);

        if($cart_page == 'cart'){
            $countries = Country::getByCode('us');
            $cities = $countries->children();
            return view('frontend.checkout', compact('countries','cities'));
        }else{
            return abort(404);
        }
    }
    function checkout_post(Request $request){
        if(session('coupon_info')){
            $invoice_id = Invoice::insertGetId([
                'user_id' => auth()->id(),
                'vendor_id' =>  Cart::where('user_id',auth()->id())->first()->vendor_id,
                'billing_first_name' => $request->billing_first_name,
                'billing_email' => $request->billing_email,
                'billing_company' => $request->billing_company,
                'billing_phone' => $request->billing_phone,
                'billing_country' => $request->billing_country_code,
                'billing_country_id' => $request->billing_country_id,
                'billing_address' => $request->billing_address,
                'order_comments' => $request->order_comments,
                'subtotal' => $request->subtotal,
                'coupon_discount' => session('coupon_info')->coupon_amount,
                'after_coupon_discount' => session('after_discount'),
                'delivery_change' => session('shipping_cost'),
                'tax' => $request->tax,
                'tax_amount' => (session('after_discount'))? session('after_discount')*($request->tax/100) : $request->subtotal*($request->tax/100) ,
                'total_price' => $request->total_price,
                'payment_method' => $request->payment_method,
                'created_at' => now()
            ]);
        }else{
            $invoice_id = Invoice::insertGetId([
                'user_id' => auth()->id(),
                'vendor_id' =>  Cart::where('user_id',auth()->id())->first()->vendor_id,
                'billing_first_name' => $request->billing_first_name,
                'billing_email' => $request->billing_email,
                'billing_company' => $request->billing_company,
                'billing_phone' => $request->billing_phone,
                'billing_country' => $request->billing_country_code,
                'billing_country_id' => $request->billing_country_id,
                'billing_address' => $request->billing_address,
                'order_comments' => $request->order_comments,
                'subtotal' => $request->subtotal,
                'delivery_change' => session('shipping_cost'),
                'tax' => $request->tax,
                'tax_amount' => $request->subtotal*($request->tax/100) ,
                'total_price' => $request->total_price,
                'payment_method' => $request->payment_method,
                'created_at' => now()
            ]);
            $admins=User::where('role','admin')->get();
            $invoice=Invoice::find($invoice_id);
            foreach($admins as $admin){
                $admin->notify(new OrderNotification($invoice));
            }
            $vendorEmail=auth()->user(Cart::where('user_id',auth()->id())->first()->vendor_id)->email;



        }

        foreach(Cart::where('user_id', auth()->id())->get() as $order_detail){
             if(Product::find($order_detail->product_id)->discount_price){
                 $unit_price = Product::find($order_detail->product_id)->discount_price;
             }else{
                 $unit_price = Product::find($order_detail->product_id)->product_price;
             }
            Order_Detail::insert([
                "invoice_id" => $invoice_id,
                "user_id" => $order_detail->user_id,
                "vendor_id" => $order_detail->vendor_id,
                "product_id" => $order_detail->product_id,
                "size_id" => $order_detail->size_id ?? NULL,
                "color_id" => $order_detail->color_id ?? NULL,
                "quantity" => $order_detail->quantity,
                "total_price" => $unit_price,
                "created_at" => now()
            ]);

            if(Inventory::find($order_detail->inventory_id)->exists()){
                Inventory::find($order_detail->inventory_id)->decrement('quantity', $order_detail->quantity);
            }
        }
        //mail notification
        $admins= User::where('role','admin')->latest()->get();
        $productId=Cart::where('user_id',auth()->id())->first()->product_id;
        // $productName=Product::find($productId)->product_title;
        $orders=Order_Detail::where('invoice_id',$invoice_id)->get();
        foreach($admins as $admin){
            $email=$admin->email;
            $roleID=DB::table('model_has_roles')->where('model_id',$admin->id)->first()->role_id;
            // $roleID=DB::table('roles')->where('id',$roleID)->first()->name;
            $permissionsId=DB::table('role_has_permissions')->where('role_id',$roleID)->get();
            foreach ($permissionsId as $permission) {
                if(DB::table('permissions')->where('id',$permission->permission_id)->first()->name == 'admin-Product Management'){
                    Mail::to($email)->bcc($vendorEmail,$request->billing_email)->send(new OrderMailNotification($orders,$invoice,$request->billing_first_name));
                }
            }
        }

        if($request->payment_method == "COD"){
            Cart::where('user_id', auth()->id())->delete();
            return redirect('customer/profile/invoice');
        }elseif($request->payment_method == "paypal"){
            return redirect('paypal/checkout/post')->with('invoice_id', $invoice_id);
        }
        else{
            return redirect('stripe/checkout/post')->with('invoice_id', $invoice_id);
        }

        Cart::where('user_id', auth()->id())->delete();
        return redirect('customer/profile/invoice');
    }


    function contact_us_post(Request $request){
        $request->validate([
            '*' =>'required',
            'email' => 'email',
        ]);

        contact::create($request->except('_token'));

        Mail::to(config('mail.from.address'))->send(new ContactMessage($request->except('_token')));

        return back()->with('contact_success_message','Your message successfully we have received!');
    }

    public function search (Request $request){
        $banners = Banner::all()->first();
        $searchResult=$request->q;
        $products=Product::where('product_title','LIKE','%'.$searchResult.'%')
        ->orWhere('tag','LIKE','%'.$searchResult.'%')
        ->paginate(9);
        return view('frontend.search',compact('searchResult','products','banners'));
    }
    public function productSorting (Request $request){
        if($request->select == 'newest'){
            $banners = Banner::all()->first();
            $bannerProducts=Product::where('status','published')->where('vendorProductStatus','published')->where('discount_price','!=',NULL)->latest()->limit(3)->get();
            $products=Product::where('status','published')->where('vendorProductStatus','published')->latest()->paginate(9);
            return view('frontend.newArrivals',compact('products','banners','bannerProducts'));
        }elseif($request->select == 'hightolow'){
            $banners = Banner::all()->first();
            $bannerProducts=Product::where('status','published')->where('vendorProductStatus','published')->where('discount_price','!=',NULL)->latest()->limit(3)->get();
            $products=Product::where('status','published')->where('vendorProductStatus','published')->orderBy('product_price','DESC')->paginate(9);
            return view('frontend.HighToLow',compact('products','banners','bannerProducts'));
        }elseif($request->select == 'default'){
            $products=Product::where('status','published')->where('vendorProductStatus','published')->paginate(9);
            $bannerProducts=Product::where('status','published')->where('vendorProductStatus','published')->where('discount_price','!=',NULL)->latest()->limit(3)->get();
            $banners = Banner::all()->first();
            return view('frontend.shop',compact('products','banners','bannerProducts'));
        }else{
            $banners = Banner::all()->first();
            $bannerProducts=Product::where('status','published')->where('vendorProductStatus','published')->where('discount_price','!=',NULL)->latest()->limit(3)->get();
            $products=Product::where('status','published')->where('vendorProductStatus','published')->orderBy('product_price','ASC')->paginate(9);
            return view('frontend.LowToHigh',compact('products','banners','bannerProducts'));
        }

        // $lowToHigh=$request->q;
        // $products=Product::where('product_title','LIKE','%'.$searchResult.'%')
        // ->orWhere('tag','LIKE','%'.$searchResult.'%')
        // ->paginate(9);
        // return view('frontend.search',compact('searchResult','products','banners'));
    }
    public function index(){

        return view('index', [
            'categories' => Category::where('status','published')->latest()->limit(12)->get()->shuffle(),
            'auth_categories' => Category::where('status','published')->latest()->limit(12)->get()->shuffle(),
            'products' => Product::where('status','published')->where('vendorProductStatus','published')->latest()->limit(3)->get(),
            'EmptyReviewsproducts' => Product::where('status','published')->where('vendorProductStatus','published')->latest()->limit(6)->get(),
            'topReviews' =>ProductReview::where('rating',5)->latest()->limit(3)->get()->shuffle(),
            'firstReviewPrduct' =>ProductReview::where('rating',5)->first(),
            'superDealspProducts' => Product::where('status','published')->where('campaign','super-deals')->where('vendorProductStatus','published')->latest()->limit(10)->get(),
            'trendingProducts' => Product::where('status','published')->where('campaign','trending')->where('vendorProductStatus','published')->latest()->limit(4)->get(),
            'flashSaleProducts' => Product::where('status','published')->where('vendorProductStatus','published')->limit(8)->get()->shuffle(),
            'bestCategories'=>Category::where('status','published')->latest()->limit(7)->get()->shuffle(),
            'general' => General::find(1),
            'blogs'=>Blog::where('status','published')->latest()->limit('3')->get()->shuffle(),
        ]);
    }
    public function stateTex(Request $request){

          if($request->stateCode == 'AZ'){
            $value = 5.60;
          }elseif($request->stateCode == 'AL'){
            $value = 4.00;
          }elseif($request->stateCode == 'AK'){
            $value = 0.00;
          }elseif($request->stateCode == 'AR'){
            $value = 6.50;
          }elseif($request->stateCode == 'CA'){
            $value = 7.25;
          }elseif($request->stateCode == 'CO'){
            $value = 2.90;
          }elseif($request->stateCode == 'CT'){
            $value = 6.35;
          }elseif($request->stateCode == 'DE'){
            $value = 0.00;
          }elseif($request->stateCode == 'FL'){
            $value = 6.00;
          }elseif($request->stateCode == 'GA'){
            $value = 4.00;
          }elseif($request->stateCode == 'HI'){
            $value = 4.00;
          }elseif($request->stateCode == 'ID'){
            $value = 6.00;
          }elseif($request->stateCode == 'IL'){
            $value = 6.25;
          }elseif($request->stateCode == 'IN'){
            $value = 7.00;
          }elseif($request->stateCode == 'IA'){
            $value = 6.00;
          }elseif($request->stateCode == 'KS'){
            $value = 6.50;
          }elseif($request->stateCode == 'KY'){
            $value = 6.00;
          }elseif($request->stateCode == 'LA'){
            $value = 4.45;
          }elseif($request->stateCode == 'ME'){
            $value = 5.50;
          }elseif($request->stateCode == 'MD'){
            $value = 6.00;
          }elseif($request->stateCode == 'MA'){
            $value = 6.25;
          }elseif($request->stateCode == 'MI'){
            $value = 6.00;
          }elseif($request->stateCode == 'MN'){
            $value = 6.88;
          }elseif($request->stateCode == 'MS'){
            $value = 7.00;
          }elseif($request->stateCode == 'MO'){
            $value = 4.23;
          }elseif($request->stateCode == 'MT'){
            $value = 0.00;
          }elseif($request->stateCode == 'NE'){
            $value = 5.50;
          }elseif($request->stateCode == 'NV'){
            $value = 6.85;
          }elseif($request->stateCode == 'NH'){
            $value = 0.00;
          }elseif($request->stateCode == 'NJ'){
            $value = 6.63;
          }elseif($request->stateCode == 'NM'){
            $value = 5.13;
          }elseif($request->stateCode == 'NY'){
            $value = 4.00;
          }elseif($request->stateCode == 'NC'){
            $value = 4.75;
          }elseif($request->stateCode == 'ND'){
            $value = 5.00;
          }elseif($request->stateCode == 'OH'){
            $value = 5.75;
          }elseif($request->stateCode == 'OK'){
            $value = 4.50;
          }elseif($request->stateCode == 'OR'){
            $value = 0.00;
          }elseif($request->stateCode == 'PA'){
            $value = 6.00;
          }elseif($request->stateCode == 'RI'){
            $value = 7.00;
          }elseif($request->stateCode == 'SC'){
            $value = 6.00;
          }elseif($request->stateCode == 'SD'){
            $value = 4.50;
          }elseif($request->stateCode == 'TN'){
            $value = 7.00;
          }elseif($request->stateCode == 'TX'){
            $value = 6.25;
          }elseif($request->stateCode == 'UT'){
            $value = 5.95;
          }elseif($request->stateCode == 'VT'){
            $value = 6.00;
          }elseif($request->stateCode == 'VA'){
            $value = 5.30;

          }elseif($request->stateCode == 'WA'){
            $value = 6.50;

          }elseif($request->stateCode == 'DC'){
            $value = 6.00;

          }elseif($request->stateCode == 'WV'){
            $value = 6.00;

          }elseif($request->stateCode == 'WI'){
            $value = 5.00;

          }elseif($request->stateCode == 'WY'){
            $value = 4.00;

          };

         $rent = ($request->subtotal*$value)/100;
         $tax = $value;

         $totalValue = $request->total + $rent;
        //  number_format(('round')$totalValue);

         $allData = ['tax'=>"$tax ",'total'=>round($totalValue)];



         return json_encode($allData, JSON_PRETTY_PRINT);
    }
    public function listOfVendors ($slug){
        $products=Product::select('vendor_id')->where('status','published')->where('parent_category_slug',$slug)->where('vendorProductStatus','published')->groupBy('vendor_id')->paginate(9);
        return view('frontend.listOfVendors',compact('products'));
    }
    public function subcategoryProducts($slug, $id, $scName){
        $categoryName=Category::where('slug', $slug)->first();
        $subCategoryName=SubCategory::where('parent_category_slug', $slug)->first();
        $products=Product::where('sub_category_id',$id)->where('status','published')->where('vendorProductStatus','published')->paginate(9);
        return view('frontend.subcategoryProducts', compact('products','categoryName','subCategoryName'));
    }
    public function offers(){
        $coupons=Coupon::where('expire_date','>',Carbon::now())->get()->shuffle();
        return view('frontend.offers',compact('coupons'));
    }
    public function priceFilter (Request $request){
        $priceArry= explode(',',$request->price);
        $min=(int)$priceArry[0];
        $max=(int)$priceArry[1];
        $products=Product::where('status','published')->where('vendorProductStatus','published')->whereBetween('product_price',[$min,$max])->paginate(9);
        $banners = Banner::all()->first();
        $bannerProducts=Product::where('status','published')->where('vendorProductStatus','published')->where('discount_price','!=',NULL)->latest()->limit(3)->get();
        Return view('frontend.priceFilter',compact('products','banners','bannerProducts'));
    }

    public function front_pages($id){
        return view('frontend.pages.index', [
            'page' => Page::find($id),
            'banners' => Banner::all()->first(),
            'shareButtons' => Share::currentPage()
            ->facebook()
            ->linkedin()
            ->twitter()
            ->telegram(),
        ]);
    }
}
