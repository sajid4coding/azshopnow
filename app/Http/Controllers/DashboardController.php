<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Exports\DailyInvoicesExport;
use App\Exports\ExportNewslettter;
use App\Exports\MonthlyInvoicesExport;
use App\Exports\YearlyInvoicesExport;
use App\Mail\productApproved;
use App\Mail\productBan;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductReport;
use App\Models\ProductReview;
use App\Models\General;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Mail;
use App\Mail\CampaignNotification;
use App\Models\DeliveryBoy;
use App\Models\Newsletter;
use App\Models\Product_Return;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Subscription as CashierSubscription;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\Return_;
use Stripe\Subscription;

class DashboardController extends Controller
{
    function dashboard(){
        $users = User::all();
        $products = Product::all();
        $general = General::find(1);
        return view('dashboard',compact('users','products','general'));
    }

    function product_lists(){
        return view('dashboard.product.product-lists',[
            'products' => Product::where('vendorProductStatus','published')->where('status','published')->latest()->get(),
            'general' => General::find(1),

        ]);
    }
    function pendingProducts (){
        return view('dashboard.product.pending-products',[
            'products' => Product::where('vendorProductStatus','published')->where('status','unpublished')->latest()->get(),
            'general' => General::find(1),
        ]);
    }
    function bannedProducts(){
        return view('dashboard.product.banned-products',[
            'products' => Product::where('vendorProductStatus','published')->where('status','banned')->latest()->get(),
            'general' => General::find(1),
        ]);
    }
    function super_deal_products (){
        $products = Product::where('vendorProductStatus','published')->where('status','published')->where('campaign','super-deals')->latest()->get();
        return view('dashboard.campaign.super_deal_products',compact('products'));
    }
    function trending_products (){
        $products = Product::where('vendorProductStatus','published')->where('status','published')->where('campaign','trending')->latest()->get();
        return view('dashboard.campaign.trending_products',compact('products'));
    }
    function flash_sale_products (){
        $products = Product::where('vendorProductStatus','published')->where('status','published')->where('campaign','flash-sale')->latest()->get();
        return view('dashboard.campaign.flash_sale_products',compact('products'));
    }

    function product_edit($id){
        return view('dashboard.product.product-edit',[
            'product' => Product::find($id),
            'categories' => Category::all(),
            'product_gellaries' => ProductGallery::where('product_id', $id)->get()
        ]);
    }
    function product_campaign(Request $request, $id){
          //campaign
        if ($request->campaign=='super-deals') {
            Product::find($id)->update([
                'campaign' => $request->campaign
            ]);
            $productName=Product::find($id);
            $vendorId=Product::where('id',$id)->first()->vendor_id;
            $vendorDetails=User::find($vendorId);
            Mail::to($vendorDetails->email)->send(new CampaignNotification($vendorDetails->name,$vendorDetails->email,$vendorDetails->shop_name,$productName->product_title,$productName->campaign));
        }elseif($request->campaign=='trending'){
            Product::find($id)->update([
                'campaign' => $request->campaign
            ]);
            $productName=Product::find($id);
            $vendorId=Product::where('id',$id)->first()->vendor_id;
            $vendorDetails=User::find($vendorId);
            Mail::to($vendorDetails->email)->send(new CampaignNotification($vendorDetails->name,$vendorDetails->email,$vendorDetails->shop_name,$productName->product_title,$productName->campaign));
        }elseif($request->campaign=='flash-sale'){
            Product::find($id)->update([
                'campaign' => $request->campaign
            ]);
            $productName=Product::find($id);
            $vendorId=Product::where('id',$id)->first()->vendor_id;
            $vendorDetails=User::find($vendorId);
            Mail::to($vendorDetails->email)->send(new CampaignNotification($vendorDetails->name,$vendorDetails->email,$vendorDetails->shop_name,$productName->product_title,$productName->campaign));
        }else{
            Product::find($id)->update([
                'campaign' => $request->campaign
            ]);
        }
        return redirect('product_lists')->with('success','Product campaign updated Successfully');
    }
    function product_status(Request $request, $id){
        if ($request->status=='published') {
            Product::find($id)->update([
                'status' => $request->status,
            ]);
            $productName=Product::find($id)->product_title;
            $vendorId=Product::where('id',$id)->first()->vendor_id;
            $vendorDetails=User::find($vendorId);
            Mail::to($vendorDetails->email)->send(new productApproved($vendorDetails->name,$vendorDetails->email,$vendorDetails->shop_name,$productName));
        }
        // elseif($request->status=='unpublished'){
        //     Product::find($id)->update([
        //         'status' => $request->status,
        //     ]);
        //     $productName=Product::find($id)->product_title;
        //     $vendorId=Product::where('id',$id)->first()->vendor_id;
        //     $vendorDetails=User::find($vendorId);
        //     // $vendorDetails->email
        //     Mail::to($vendorDetails->email)->send(new productBan($vendorDetails->name,$vendorDetails->email,$vendorDetails->shop_name,$productName));
        // }
        else{
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
         'invoices' => Invoice::where('order_status','delivered')->latest()->get(),

        ]);
    }

    function invoice_download($id){
        $invoice = Invoice::find($id);
        $order_details = Order_Detail::where('invoice_id', $id)->get();
        $pdf = Pdf::loadView('pdf.invoice', compact('invoice', 'order_details'));
        return $pdf->setPaper('a4', 'portrait')->download('invoice.pdf');
    }

    function PendingOrder(){
        return view('dashboard.orders.pendingOrder',[
         'invoices' => Invoice::where('order_status','pending')->latest()->get(),

        ]);
    }
    function ProcessingOrder(){
        return view('dashboard.orders.processingOrder',[
         'invoices' => Invoice::where('order_status','processing')->latest()->get(),

        ]);
    }
    function CanceledOrder(){
        return view('dashboard.orders.canceledOrder',[
         'invoices' => Invoice::where('order_status','canceled')->latest()->get(),

        ]);
    }
    function OrderDetails($id){
        return view('dashboard.orders.orderDetails',[
         'invoice' => Invoice::find($id),
         'orders' => Order_Detail::where('invoice_id',$id)->get(),

        ]);
    }
    function OrderDetailsPost(Request $request,$id){
        Invoice::findOrFail($id)->update([
            'order_status'=>$request->order_status,
        ]);
        if($request->order_status=='delivered'){
            Invoice::findOrFail($id)->update([
                'payment'=>'paid',
            ]);
        }
         return back()->with('delete_success','Orde status changed successfully');
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
        return view('dashboard.earnigns.subscription',[
            'subscriptions' => CashierSubscription::all(),
        ]);
    }
    function CommissionEarning(){
        return view('dashboard.earnigns.commission',[
            'invoices' => Invoice::all(),
        ]);
    }

    function report(){
        return view('dashboard.report.report',[
            'reports' => ProductReport::all(),
        ]);
    }
    function yearInvoiceDownload (Request $request){
        // $order_details = Order_Detail::where('created_at','LIKE',"{$request->year}%")->get();
        return Excel::download(new YearlyInvoicesExport($request->year), 'yearlyInvoices.xlsx');
    }
    function monthlyInvoiceDownload  (Request $request){
        $year=Carbon::now()->format('Y');
        return Excel::download(new MonthlyInvoicesExport($year,$request->month), 'monthlyInvoices.xlsx');
    }
    function dayInvoiceDownload  (Request $request){
        $year=Carbon::now()->format('Y');
        $month=Carbon::now()->format('m');
        return Excel::download(new DailyInvoicesExport($year,$month,$request->day), 'dailyInvoices.xlsx');
    }
    function newslettter (){
        $newsletters = Newsletter::all();
        return view('dashboard.usersManagement.newsletter',compact('newsletters'));
    }

    function exportNewslettter(){
        return Excel::download(new ExportNewslettter(), 'newslettersList.xlsx');
    }

    function deliveryBoyAdd(){
        return view('dashboard.deliveryBoy.delivery_boy');
    }
    function deliveryBoyPost(Request $request){


         $request->validate([
            "name" => 'required',
            "email" => 'required|email',
            "phone_number" => 'required',
            'photo' => 'mimes:png,jpg|dimensions:max_width=350,max_height=350',
            "address" => 'required',
        ]);

        if($request->hasFile('photo')){
            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('photo')->getClientOriginalExtension();
            $img = Image::make($request->file('photo'));
            $img->save(base_path('public/uploads/delivery_boy_photo/'.$photo), 60);

            DeliveryBoy::insert([
                "name" => $request->name,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "photo" => $photo,
                "date_of_birth" => $request->date_of_birth,
                "Birth_reg_number" => $request->Birth_reg_number,
                "nid_id" => $request->nid_id,
                "address" => $request->address,
                'created_at' => Carbon::now(),
            ]);
        }else{
            DeliveryBoy::insert([
                "name" => $request->name,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "date_of_birth" => $request->date_of_birth,
                "Birth_reg_number" => $request->Birth_reg_number,
                "nid_id" => $request->nid_id,
                "address" => $request->address,
                'created_at' => Carbon::now(),
            ]);
        }
        return back()->with('add_success_message','Successfully added a new delivery boy');
    }
    function deliveryBoyList(){
        return view('dashboard.deliveryBoy.delivery_boy_list',[
            'delivery_boys' => DeliveryBoy::all(),
        ]);
    }
    function deliveryBoyOutOfWorkList(){
        return view('dashboard.deliveryBoy.delivery_boy_out_work_list',[
            'delivery_boys' => DeliveryBoy::all(),
        ]);
    }
    function deliveryBoyOutOfWorkPost(Request $request,$id){
          $request->validate([
            'reason_out_of_work' => 'required'
          ]);
        DeliveryBoy::find($id)->update([
            'status' => 'out_of_work',
            'reason_out_of_work' =>  $request->reason_out_of_work,
            'updated_at' =>  Carbon::now(),
        ]);
        return redirect('manage-delivery-boy/delivery-boy-list')->with('out_of_work','Successfully out of work this boy!');
    }
    function deliveryBoyJoinAgainPost(Request $request,$id){
          $request->validate([
            'reason_of_join_again' => 'required'
          ]);
        DeliveryBoy::find($id)->update([
            'status' => 'active',
            'reason_of_join_again' =>  $request->reason_of_join_again,
            'updated_at' =>  Carbon::now(),
        ]);
        return redirect('delivery-boy-list')->with('out_of_work','Successfully out of work this boy!');
    }
    function deliveryBoyDelete($id){

        DeliveryBoy::find($id)->Delete();
        return redirect('out-of-work/list')->with('out_of_work_delete','Permanently delete this info!');
    }
    function deliveryBoyOutOfWork($id){

        return view('dashboard.deliveryBoy.delivery_boy_out_of_work',[
            'delivery_boy' =>DeliveryBoy::find($id),
        ]);
    }
    function deliveryBoyEdit($id){

        return view('dashboard.deliveryBoy.delivery_boy_edit',[
            'delivery_boy' =>DeliveryBoy::find($id),
        ]);
    }
    function deliveryBoyJoinAgain($id){

        return view('dashboard.deliveryBoy.delivery_boy_jion_again',[
            'delivery_boy' =>DeliveryBoy::find($id),
        ]);
    }
    function deliveryBoyEditPost(Request $request,$id){


        $request->validate([
           "name" => 'required',
           "email" => 'required|email',
           "phone_number" => 'required',
           'photo' => 'mimes:png,jpg|dimensions:max_width=350,max_height=350',
           "address" => 'required',
       ]);

       if($request->hasFile('photo')){
           $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('photo')->getClientOriginalExtension();
           $img = Image::make($request->file('photo'));
           $img->save(base_path('public/uploads/delivery_boy_photo/'.$photo), 60);

           DeliveryBoy::find($id)->update([
               "name" => $request->name,
               "email" => $request->email,
               "phone_number" => $request->phone_number,
               "photo" => $photo,
               "date_of_birth" => $request->date_of_birth,
               "Birth_reg_number" => $request->Birth_reg_number,
               "nid_id" => $request->nid_id,
               "address" => $request->address,
               'created_at' => Carbon::now(),
           ]);
       }else{
           DeliveryBoy::find($id)->update([
               "name" => $request->name,
               "email" => $request->email,
               "phone_number" => $request->phone_number,
               "date_of_birth" => $request->date_of_birth,
               "Birth_reg_number" => $request->Birth_reg_number,
               "nid_id" => $request->nid_id,
               "address" => $request->address,
               'created_at' => Carbon::now(),
           ]);
       }
       return redirect('manage-delivery-boy/delivery-boy-list')->with('update_success_message','Successfully update a delivery boy profile');
   }
   function markasread(){
    auth()->user()->unreadNotifications->where('type','App\Notifications\VendorRegisterNotification')->markAsRead();
    return back();
   }
   function productmarkasread(){
    auth()->user()->unreadNotifications->where('type','App\Notifications\ProductNotification')->markAsRead();
    return back();
   }
   function ordermarkasread(){
    auth()->user()->unreadNotifications->where('type','App\Notifications\OrderNotification')->markAsRead();
    return back();
   }
   function ordermarkasreadreturn(){
    auth()->user()->unreadNotifications->where('type','App\Notifications\ProductreturnNotification')->markAsRead();
    return back();
   }
   function allNotification (){
    return view('dashboard.notification.vendorRegisterNotification');
   }
   function deleteNotification (){
    auth()->user()->Notifications()->delete();
    return back();
   }

   function chatAdmin(){
      return view('dashboard.chat.chat');
   }
   function productReturn (){
      $returnProducts=Product_Return::where('status','!=','rejected')->latest()->get();
      return view('dashboard.productReturn.productReturn',compact('returnProducts'));
   }
   function productReturnView($id){
        $invoiceID=Product_Return::findOrfail($id)->invoice_id;
        $invoice=Invoice::find($invoiceID);
        $returnProducts=Product_Return::findOrfail($id);
        $customerID=User::find(Product_Return::findOrfail($id)->user_id);
      return view('dashboard.productReturn.productReturnview',compact('returnProducts','invoice','customerID'));
   }
}
