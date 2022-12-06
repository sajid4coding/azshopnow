<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\User;
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
