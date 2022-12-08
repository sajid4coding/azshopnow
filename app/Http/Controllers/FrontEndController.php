<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Invoice;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\User;
use Khsing\World\World;
use Khsing\World\Models\Country;
use Doctrine\Inflector\WordInflector;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{

    function single_product ($id){
        $single_product = Product::findOrFail($id);
        return view('frontend.single.product', compact('single_product'));
    }
    function contact_us_index(){
        return view('frontend.contact_us');
    }
    function shop_page(){
        $products=Product::where('status','published')->get()->shuffle();
        return view('frontend.shop',compact('products'));
    }
    function categoryProduct($slug){
        $categoryName=Category::where('slug', $slug)->first();
        $products=Product::where('parent_category_slug',$slug)->where('status','published')->get()->shuffle();
        return view('frontend.categoryProduct', compact('products','categoryName'));
    }

    function vendorProduct($id){
        $shopName=User::find($id);
        $products=Product::where('vendor_id',$id)->where('status','published')->latest()->get();
        return view('frontend.vendorProduct', compact('products','shopName'));
    }
    function cart(){
        return view('frontend.cart');
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
            $invoice_id = Invoice::insert([
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
                'total_price' => $request->total_price,
                'payment_method' => $request->payment_method,
                'created_at' => now()
            ]);
        }else{
            $invoice_id = Invoice::insert([
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
                'total_price' => $request->total_price,
                'payment_method' => $request->payment_method,
                'created_at' => now()
            ]);
        }

        foreach(Cart::where('user_id', auth()->id())->get() as $order_detail){
            // if(Product::find($order_detail->product_id)->discount_price){
            //     $unit_price = Product::find($order_detail->product_id)->discount_price;
            // }else{
            //     $unit_price = Product::find($order_detail->product_id)->regular_price;
            // }

            Order_Detail::insert([
                "invoice_id" => $invoice_id,
                "user_id" => $order_detail->user_id,
                "vendor_id" => $order_detail->vendor_id,
                "product_id" => $order_detail->product_id,
                "size_id" => $order_detail->size_id,
                "color_id" => $order_detail->color_id,
                "quantity" => $order_detail->quantity,
                "total_price" => session('total'),
                "created_at" => now()
            ]);
        }
        if(Inventory::where([
            'product_id' => $order_detail->product_id,
            'vendor_id' => $order_detail->vendor_id,
            'size' =>  $order_detail->size,
            'color' => $order_detail->color
        ])->exists()){
            Inventory::where([
                'product_id' => $order_detail->product_id,
                'vendor_id' => $order_detail->vendor_id,
                'size' =>  $order_detail->size,
                'color' => $order_detail->color
            ])->decrement('quantity', $order_detail->quantity);
        }

        if($request->payment_method == "COD"){
            Cart::where('user_id', auth()->id())->delete();
            return redirect('customerhome');
        }
        else{
            return redirect('pay')->with('invoice_id', $invoice_id);
        }

        Cart::where('user_id', auth()->id())->delete();
        return redirect('customerhome');

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

    public function index(){
        return view('index', [
            'categories' => Category::where('status','published')->latest()->limit(12)->get()->shuffle(),
            'auth_categories' => Category::where('status','published')->latest()->limit(20)->get()->shuffle()
        ]);
    }
}
