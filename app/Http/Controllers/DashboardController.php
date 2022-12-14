<?php

namespace App\Http\Controllers;

use App\Mail\productApproved;
use App\Mail\productBan;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Mail;


class DashboardController extends Controller
{
    function dashboard(){
        return view('layouts.dashboardmaster');
    }

    function product_lists(){
        return view('dashboard.product.product-lists',[
            'products' => Product::where('vendorProductStatus','published')->get()
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
        if ($request->status=='published') {
            Product::find($id)->update([
                'status' => $request->status
            ]);
            $productName=Product::find($id)->product_title;
            $vendorId=Product::where('id',$id)->first()->vendor_id;
            $vendorDetails=User::find($vendorId);
            Mail::to($vendorDetails->email)->send(new productApproved($vendorDetails->name,$vendorDetails->email,$vendorDetails->shop_name,$productName));
        }else{
            Product::find($id)->update([
                'status' => $request->status
            ]);
            $productName=Product::find($id)->product_title;
            $vendorId=Product::where('id',$id)->first()->vendor_id;
            $vendorDetails=User::find($vendorId);
            // $vendorDetails->email
            Mail::to($vendorDetails->email)->send(new productBan($vendorDetails->name,$vendorDetails->email,$vendorDetails->shop_name,$productName));
        }
        return redirect('product_lists')->with('success','Vendor Product Status Changed Successfully');
    }
    function product_delete($id){
        Product::find($id)->delete();
        return back();
    }
}
