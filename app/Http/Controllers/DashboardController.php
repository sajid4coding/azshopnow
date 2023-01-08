<?php

namespace App\Http\Controllers;

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
use App\Models\Newsletter;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\Return_;

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
            // $vendorDetails->email
            Mail::to($vendorDetails->email)->send(new CampaignNotification($vendorDetails->name,$vendorDetails->email,$vendorDetails->shop_name,$productName->product_title,$productName->campaign));
        }elseif($request->campaign=='flash-sell'){
            Product::find($id)->update([
                'campaign' => $request->campaign
            ]);
            $productName=Product::find($id);
            $vendorId=Product::where('id',$id)->first()->vendor_id;
            $vendorDetails=User::find($vendorId);
            // $vendorDetails->email
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
         'invoices' => Invoice::all(),

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
}
