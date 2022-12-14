<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    function dashboard(){
        $users = User::all();
        $products = Product::all();
        return view('dashboard',compact('users','products'));
    }

    function product_lists(){
        return view('dashboard.product.product-lists',[
            'products' => Product::all()
        ]);
    }

    function product_edit($id){
        return view('dashboard.product.product-edit',[
            'product' => Product::find($id),
            'categories' => Category::all(),
            'product_gellaries' => ProductGallery::where('product_id', $id)->get()
        ]);
    }
    function product_status(Request $request, $id){
        Product::find($id)->update([
            'status' => $request->status
        ]);
        return redirect('product_lists');
    }
    function product_delete($id){
        Product::find($id)->delete();
        return back();
    }
}
