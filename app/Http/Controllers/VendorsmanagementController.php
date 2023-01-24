<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VendorActivation;
use App\Mail\VendorBan;
use App\Models\General;
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
        $vendor=User::findOrFail($id);
        return view('dashboard.usersManagement.vendor.vendorAction',compact('vendor', 'vendorProducts'));

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
        $user=User::find($id);
        if ($user->status=='active') {
          $user->status='deactive';
          $user->email_verified_at=now();
          Mail::to($user->email)->send(new VendorBan($user->name,$user->email,$user->shop_name));
        }else{
          $user->status='active';
          $user->email_verified_at=now();
          Mail::to($user->email)->send(new VendorActivation($user->name,$user->email,$user->shop_name));
        }
        $user->save();
        return redirect('/vendormanagement')->with('success','Vendor profile status changed successfully.');
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
            'seller_date' => General::find(1),
        ]);
    }
    function payout_request(){
        return view('dashboard.payout.payout-request',[
            'seller_payout_requests' => VendorPaymentRequest::all(),
            'seller_data' => General::find(1),
        ]);
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
}
