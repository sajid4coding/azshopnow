<?php

namespace App\Http\Controllers;

use App\Mail\productApproved;
use App\Mail\productBan;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Mail;


class DashboardController extends Controller
{
    function dashboard(){
        $users = User::all();
        $products = Product::all();
        return view('dashboard',compact('users','products'));
    }

    function product_lists(){
        return view('dashboard.product.product-lists',[
            'products' => Product::where('vendorProductStatus','published')->where('status','published')->latest()->get()
        ]);
    }
    function pendingProducts (){
        return view('dashboard.product.pending-products',[
            'products' => Product::where('vendorProductStatus','published')->where('status','unpublished')->latest()->get()
        ]);
    }
    function bannedProducts(){
        return view('dashboard.product.banned-products',[
            'products' => Product::where('vendorProductStatus','published')->where('status','banned')->latest()->get()
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
        }elseif(($request->status=='published')){
            Product::find($id)->update([
                'status' => $request->status
            ]);
            $productName=Product::find($id)->product_title;
            $vendorId=Product::where('id',$id)->first()->vendor_id;
            $vendorDetails=User::find($vendorId);
            // $vendorDetails->email
            Mail::to($vendorDetails->email)->send(new productBan($vendorDetails->name,$vendorDetails->email,$vendorDetails->shop_name,$productName));
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

    function reviews(){
        return view('dashboard.review.review',[
            'products' => Product::all()
        ]);
    }
    function view_reviews($product_id){
        return view('dashboard.review.view-review',[
            'view_reviews' => ProductReview::where('product_id', $product_id)->get()
        ]);
    }
    function AllOrder(){
        return view('dashboard.orders.allOrder',[
         'invoices' => Invoice::all(),

        ]);
    }
    function DeliveredOrder(){
        return view('dashboard.orders.deliveredOrder',[
         'invoices' => Invoice::all(),

        ]);
    }
    function PendingOrder(){
        return view('dashboard.orders.pendingOrder',[
         'invoices' => Invoice::all(),

        ]);
    }
    function ProcessingOrder(){
        return view('dashboard.orders.processingOrder',[
         'invoices' => Invoice::all(),

        ]);
    }
    function CanceledOrder(){
        return view('dashboard.orders.canceledOrder',[
         'invoices' => Invoice::all(),

        ]);
    }
    function OrderDetails($id){
        return view('dashboard.orders.orderDetails',[
         'invoice' => Invoice::find($id),
         'orders' => Order_Detail::where('invoice_id',$id)->get(),

        ]);
    }
    function OrderDelete($id){
         Invoice::find($id)->delete();
         Order_Detail::where('invoice_id',$id)->delete();
         return back()->with('delete_success','Successfully Deleted Invoice History');
    }
    function TaxEarning(){

        return view('dashboard.earnigns.tax_calculate',[
         'invoices' => Invoice::all(),

        ]);
    }
    function TotalEarning(){
        return view('dashboard.earnigns.total_earning',[
         'invoices' => Invoice::all(),
        ]);
    }
    function SubscriptionEarning(){
        return view('dashboard.earnigns.subscription');
    }
    function CommissionEarning(){
        return view('dashboard.earnigns.commission');
    }
}
