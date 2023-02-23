<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VendorActivation;
use App\Mail\VendorBan;
use App\Models\General;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\VendorPaymentRequest;

class VendorsmanagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors=User::where('role','vendor')->latest()->get();
        return view('dashboard.usersManagement.vendor.allVendorsList', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendorProducts= Product::where('vendor_id', $id)->where('status', 'published')->where('vendorProductStatus', 'published')->latest()->get();
        $vendor = User::findOrFail($id);
        $general_setting = General::find(1);
        return view('dashboard.usersManagement.vendor.vendorAction',compact('vendor', 'vendorProducts', 'general_setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'seller_commission' => 'required',
            'minimum_amount_withdraw' => 'required',
        ]);

        $user = User::find($id);

        // ACTIVE STATUS CONDITION START
        if ($request->status=='active') {
          $user->status='active';
          $user->email_verified_at=now();
          Mail::to($user->email)->send(new VendorActivation($user->name,$user->email,$user->shop_name));
        }else{
          $user->status='deactive';
          $user->email_verified_at=now();
          Mail::to($user->email)->send(new VendorBan($user->name,$user->email,$user->shop_name));
        }
        $user->save();
        // ACTIVE STATUS CONDITION END

        // SELLER COMMISSION STATUS CONDITION START
        if ($request->seller_commission) {
            $user->seller_commission = $request->seller_commission;
        }
        $user->save();
        // SELLER COMMISSION STATUS CONDITION END

        // SELLER MINIMUM AMOUNT WITHDRAW STATUS CONDITION START
        if ($request->minimum_amount_withdraw) {
            $user->minimum_amount_withdraw = $request->minimum_amount_withdraw;
        }
        $user->save();
        // SELLER MINIMUM AMOUNT WITHDRAW STATUS CONDITION END

        return back()->with('success','Vendor profile status changed successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/vendormanagement')->with('success','Vendor profile deleted successfully.');
    }

    function payout(){
        return view('dashboard.payout.payout',[
            'seller_data' => General::find(1),
            'seller_payout_requests' => VendorPaymentRequest::where('status', 'paid')->get()
        ]);
    }

    function payout_request(){
        return view('dashboard.payout.payout-request',[
            'seller_payout_requests' => VendorPaymentRequest::where('status', 'processing')->orwhere('status', 'rejected')->orwhere('status', 'unpaid')->get(),
            'seller_data' => General::find(1),
        ]);
    }

    function get_paid(Request $request, $id){
        $request->validate([
            'transactions_id' => 'required',
        ]);
        Invoice::find(VendorPaymentRequest::find($id)->invoice_id)->update([
            'withdraw_status' => 'Payment Clear',
            'transactions_id' => $request->transactions_id
        ]);
        VendorPaymentRequest::find($id)->update([
            'status' => 'paid'
        ]);
        return back();
    }
    function payout_request_accepted($id){
        Invoice::find(VendorPaymentRequest::find($id)->invoice_id)->update([
            'withdraw_status' => 'Payout Request Approved'
        ]);
        VendorPaymentRequest::find($id)->update([
            'status' => 'processing'
        ]);
        return back();
    }

    function payout_request_declined($id){
        Invoice::find(VendorPaymentRequest::find($id)->invoice_id)->update([
            'withdraw_status' => 'Payout Request Rejected'
        ]);
        VendorPaymentRequest::find($id)->update([
            'status' => 'rejected'
        ]);
        return back();
    }

    function commission(){
        return view('dashboard.commission.commission',[
            'seller_date' => General::find(1),
        ]);
    }

    function commission_save(Request $request){
        $request->validate([
            'seller_commission' => 'required'
        ]);
        General::find(1)->update([
            'seller_commission' => $request->seller_commission,
        ]);
        return back()->with('seller_commission_save', 'Seller Commission updated');
    }

    function minimum_seller_amount_withdraw(Request $request){
        $request->validate([
            'minimum_seller_amount_withdraw' => 'required'
        ]);
        General::find(1)->update([
            'minimum_amount_withdraw' => $request->minimum_seller_amount_withdraw,
        ]);
        return back()->with('seller_amount_withdraw_save', 'Seller Amount Withdraw updated');
    }

    function payment_setting(){
        return view('dashboard.payment_setting.payment-setting',[
            'payment_setting' => General::find(1)
        ]);
    }
    function payment_setting_select(Request $request){
        General::find(1)->update([
            'payment_setting' => collect($request->except('_token'))->implode('|')
        ]);
        return back()->with('payment_status', 'Payment Settings Updated');
    }
}
