<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use App\Models\{Banner, Cart, Category, Inventory, Invoice ,Order_Detail,Product, ProductGallery, ProductReview, ReviewGallery, User, Wishlist};
use Khsing\World\World;
use Khsing\World\Models\Country;
use Doctrine\Inflector\WordInflector;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{

    function single_product ($id){
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

        return view('frontend.single.product', compact('single_product','recommendedProducts', 'productGalleries','product_reviews','inventory','product_id'));
    }
    function contact_us_index(){
        return view('frontend.contact_us');
    }
    function newArrivals(){
        $products=Product::where('status','published')->where('vendorProductStatus','published')->latest()->get();
        $banners = Banner::all()->first();
        return view('frontend.newArrivals',compact('products','banners'));
    }
    function topSelection(){
        $topReviews=ProductReview::all();
        $products=Product::where('status','published')->where('vendorProductStatus','published')->latest()->get();
        $banners = Banner::all()->first();
        return view('frontend.topSelection',compact('products','banners','topReviews'));
    }
    function shop_page(){
        $products=Product::where('status','published')->where('vendorProductStatus','published')->get()->shuffle();
        $banners = Banner::all()->first();
        return view('frontend.shop',compact('products','banners'));
    }
    function categoryProduct($slug){
        $categoryName=Category::where('slug', $slug)->first();
        $products=Product::where('parent_category_slug',$slug)->where('status','published')->where('vendorProductStatus','published')->get()->shuffle();
        return view('frontend.categoryProduct', compact('products','categoryName'));
    }

    function vendorProduct($id, $shopname){
        $shopName=User::findOrFail($id);
        $products=Product::where('vendor_id',$id)->where('status','published')->where('vendorProductStatus','published')->latest()->get();
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
                'total_price' => $request->total_price,
                'payment_method' => $request->payment_method,
                'created_at' => now()
            ]);
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

        Mail::to('mdshrabon.dev@gmail.com')->send(new ContactMessage($request->except('_token')));

        return back()->with('contact_success_message','Your message successfully we have received!');
    }

    public function search (Request $request){
        $banners = Banner::all()->first();
        $searchResult=$request->q;
        $products=Product::where('product_title','LIKE','%'.$searchResult.'%')
        ->orWhere('tag','LIKE','%'.$searchResult.'%')
        ->get()
        ->shuffle();
        return view('frontend.search',compact('searchResult','products','banners'));
    }
    public function index(){
        return view('index', [
            'categories' => Category::where('status','published')->latest()->limit(12)->get()->shuffle(),
            'auth_categories' => Category::where('status','published')->latest()->limit(12)->get()->shuffle(),
            'products' => Product::where('status','published')->where('vendorProductStatus','published')->latest()->limit(3)->get(),
            'topReviews' =>ProductReview::all(),
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
}
