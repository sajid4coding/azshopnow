<?php

namespace App\Http\Controllers;

use App\Models\{Banner,Coupon, General, Invoice,Plan,Product,Shipping,SubCategory,User, VendorPaymentRequest, VendorShipping};
use Carbon\Carbon;
use GuzzleHttp\Middleware;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Stripe\Stripe;
use function PHPUnit\Framework\returnSelf;


class vendorController extends Controller
{

    // BEFORE LOGIN FOR SUBCRIPTION START
    public function plan_index()
    {
        // $plans = Plan::get();
        return view("frontend.subscription.plans",[
            'basic' => Plan::where('name','Basic')->first(),
            'premium' => Plan::where('name','Premium')->first(),
            'azshop' => Plan::where('name','Az Shop')->first(),
        ]);
    }

    public function plan_show(Plan $plan, Request $request)
    {
        $user = Auth()->loginUsingId(session('vendor_id'));
        $intent = $user->createSetupIntent();
        // $intent = auth()->user()->createSetupIntent();
        return view("frontend.subscription.subscription", compact("plan","intent"));
    }

    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->create($request->token);
        User::where('id', auth()->id())->update([
            'dashboard_access' => 'active',
            'status' => 'active',
        ]);
        return redirect('/vendor/dashboard')->with('registrion_success','Your registation successfully & Subscription purchase successful!');
    }
    // BEFORE LOGIN FOR SUBCRIPTION END


    function vendor_index(Plan $plan, Request $request){
        $banners = Banner::all()->first();
        return view('vendor.registration',compact('banners','plan'));
    }

    function vendor_post(Request $request){
        $request->validate([
            'name' => 'required',
            'shop_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'email' => "unique:users",
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        // GET THE VENDOR ID BECAUSE OF SUBCRIPTION PLAN
        $vendor_id = User::insertGetId([
              'name' =>   $request->name,
              'shop_name' =>   $request->shop_name,
              'email' =>   $request->email,
              'password' =>  bcrypt($request->password),
              'role' =>  'vendor',
              'status' =>  'deactive',
              'dashboard_access' =>  'deactive',
              'created_at' => Carbon::now(),
        ]);
        $role = Role::where('name','vendor')->first();
        $role->givePermissionTo(Permission::where('name','LIKE','vendor-%')->get());
        $user= User::find($vendor_id);
        $user->assignRole($role);

        session(['vendor_id' => $vendor_id]);

        $plan = Plan::find($request->plan);

        return redirect('plans'.'/'.$plan->slug);

        // return redirect('/vendor/login')->with('registrion_success','Your registation successfully & wait for admin approval');

    }

    function vendor_login(){
        return view('vendor.login',[
        'banners' => Banner::all()->first(),
        ]);
    }

    function vendor_login_post_form(Request $request){

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            // Authentication passed...
            if(Auth()->user()->status == 'active'){
                if(Auth()->user()->role == 'vendor' || Auth()->user()->role == 'staff'){
                    return redirect()->intended('vendor/dashboard');
                }else{
                    return back()->with('vendor_login_error','Sorry, you are not a vendor.');
                }
            }else{
                return back()->with('vendor_login_error','Sorry, you have no approval yet. ');
            }
        }else{
            return back()->with('vendor_login_error','Sorry, you have not a vendor account.');
        }
    }

    function vendor_dashboard(){
        if(auth()->user()->role =='vendor'){
            $invoices_info = Invoice::where('vendor_id',auth()->user()->id)->get();
            $coupons =  Coupon::where('vendor_id',auth()->user()->id)->get();
        }else{
            $invoices_info = Invoice::where('vendor_id',auth()->user()->vendor_id)->get();
            $coupons =  Coupon::where('vendor_id',auth()->user()->vendor_id)->get();
        }
        return view('vendor.dashboard',compact('coupons','invoices_info'));
    }

    function vendor_update_info(Request $request){

        if($request->hasFile('profile_photo') && $request->hasFile('banner')){

            $photo= 'vendor_profile'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('profile_photo')->getClientOriginalExtension();
            $img = Image::make($request->file('profile_photo'))->resize(300, 300);
            $img->save(base_path('public/uploads/vendor_profile/'.$photo), 60);


            $banner_photo= 'banner'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('banner')->getClientOriginalExtension();
            $banner_img = Image::make($request->file('banner'))->resize(1200, 267);
            $banner_img->save(base_path('public/uploads/banner_img/'.$banner_photo));

            if(auth()->user()->banner !== NULL){
                unlink(base_path('public/uploads/banner_img/'.auth()->user()->banner));
            }

            if(auth()->user()->profile_photo !== NULL){
                unlink(base_path('public/uploads/vendor_profile/'.auth()->user()->profile_photo));
            }

                User::find(auth()->user()->id)->update($request->except('_token','profile_photo','banner')+[
                'profile_photo' =>  $photo,
                'banner' =>  $banner_photo,
                ]);
        }else{
            if($request->hasFile('profile_photo')){


                $photo = 'vendor_profile'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('profile_photo')->getClientOriginalExtension();
                $img = Image::make($request->file('profile_photo'))->resize(300, 300);
                $img->save(base_path('public/uploads/vendor_profile/'.$photo), 60);

                if(auth()->user()->profile_photo !== NULL){
                    unlink(base_path('public/uploads/vendor_profile/'.auth()->user()->profile_photo));
                }

                    User::find(auth()->user()->id)->update($request->except('_token','profile_photo','banner')+[
                    'profile_photo' =>  $photo,
                    ]);
            }else if($request->hasFile('banner')){


                $banner_photo= 'banner'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('banner')->getClientOriginalExtension();
                $banner_img = Image::make($request->file('banner'))->resize(1200, 267);
                $banner_img->save(base_path('public/uploads/banner_img/'.$banner_photo));

                if(auth()->user()->banner !== NULL){
                    unlink(base_path('public/uploads/banner_img/'.auth()->user()->banner));
                }

                if(auth()->user()->profile_photo !== NULL){
                    unlink(base_path('public/uploads/vendor_profile/'.auth()->user()->profile_photo));
                }

                 User::find(auth()->user()->id)->update($request->except('_token','profile_photo','banner')+[
                    // 'profile_photo' => $photo,
                    'banner' =>  $banner_photo,
                    ]);
            }else{
                if($request->hasFile('profile_photo')){


                    $photo= 'vendor_profile'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('profile_photo')->getClientOriginalExtension();
                    $img = Image::make($request->file('profile_photo'))->resize(300, 300);
                    $img->save(base_path('public/uploads/vendor_profile/'.$photo), 60);

                    if(auth()->user()->profile_photo !== NULL){
                        unlink(base_path('public/uploads/vendor_profile/'.auth()->user()->profile_photo));
                    }

                     User::find(auth()->user()->id)->update($request->except('_token','profile_photo','banner')+[
                        'profile_photo' =>  $photo,
                     ]);
                }else if($request->hasFile('banner')){


                    $banner_photo= 'banner'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('banner')->getClientOriginalExtension();
                    $banner_img = Image::make($request->file('banner'))->resize(1200, 267);
                    $banner_img->save(base_path('public/uploads/banner_img/'.$banner_photo));

                    if(auth()->user()->banner !== NULL){
                        unlink(base_path('public/uploads/banner_img/'.auth()->user()->banner));
                    }

                     User::find(auth()->user()->id)->update($request->except('_token','profile_photo','banner')+[
                        'banner' =>  $banner_photo,
                     ]);
                }else{
                    User::find(auth()->user()->id)->update($request->except('_token','profile_photo','banner'));
                }
            }
        }

            return back();

    }

    function vendor_change_password(Request $request){

        $request->validate([
            '*'=>'required',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols(),'different:current_password'],

        ]);

        if(Hash::check($request->current_password,auth()->user()->password)){

            user::find(auth()->id())->update([
                'password'=>Hash::make($request->password),
            ]);

            return back()->with('change_message','Your passwoerd change successfully');
            }else{

            return back()->with('change_error_message','Your current password is wrong');

        }
        return back();
    }

    function coupon_store(Request $request){
        $request->validate([
            'discount_message' => 'required',
            'coupon_code' => 'required|max:6',
            'coupon_amount' => 'required',
            'minimum_price' => 'integer',
            'coupon_amount' => 'integer',
            ]);

        if(auth()->user()->role =='vendor'){
            Coupon::create($request->except('_token')+['vendor_id' => auth()->user()->id]);
        }else{
            Coupon::create($request->except('_token')+['vendor_id' => auth()->user()->vendor_id]);
        }

        return back()->with('coupon_add_success','Successfully added a new coupon');
    }
    function coupon_delete($id){
        // $expireDate=Coupon::find($id)->expire_date;
            Coupon::find($id)->delete();
            return back()->with('coupon_delete_message', 'Successfully deleted a coupon');

    }
    function vendor_setting(){
        return view('vendor.settings');
    }
    function vendor_coupon_add_index(){
        if(auth()->user()->role == 'vendor'){
            $coupons =  Coupon::where('vendor_id',auth()->user()->id)->where('expire_date','>',Carbon::now())->get();
            $coupon_count =  Coupon::where('vendor_id',auth()->user()->id)->count();
        }else{
            $coupons =  Coupon::where('vendor_id',auth()->user()->vendor_id)->get();
            $coupon_count =  Coupon::where('vendor_id',auth()->user()->vendor_id)->count();
        }
        return view('vendor.coupon_add',compact('coupons', 'coupon_count'));
    }

    function getIDFromCategory(Request $request){
        $subCategories = SubCategory::where('parent_category_slug',$request->category_id)->get();
        if($subCategories){
            $get_category_dropdown ='';
                foreach($subCategories as $subCategory){
                $get_category_dropdown .= "<option value='$subCategory->id'>$subCategory->category_name</option>";
                }

                return $get_category_dropdown;
        }else{
            $get_category_dropdown ='';
                $get_category_dropdown .= "<option value=''>-- No Sub-Category --</option>";
            // $this->subCategoryHaveorNot = 'false';
            return $get_category_dropdown;
        }
    }
    function getIDFromCategoryEdit(Request $request){
        $subCategories = SubCategory::where('parent_category_slug',$request->category_id)->get();

        if($subCategories){
            $get_category_dropdown ='';
                foreach($subCategories as $subCategory){
                $get_category_dropdown .= "<option  value='$subCategory->id'>$subCategory->category_name</option>";
                }

                return $get_category_dropdown;
        }else{
            $get_category_dropdown ='';
                $get_category_dropdown .= "<option value=''>-- No Sub-Category --</option>";
            // $this->subCategoryHaveorNot = 'false';
            return $get_category_dropdown;
        }
    }

    function vendor_product_upload(){
        return view('vendor.product_upload', [
            // 'product_count' => Product::where('vendor_id',auth()->id())->count(),
        ]);
    }

    function vendor_orders(){
        $invoices = Invoice::where('vendor_id',auth()->id())->get();
    //    if(auth()->user()->role == 'vendor'){
    //         $invoices = Invoice::where('vendor_id',auth()->id())->get();
    //    }else{
    //         $invoices = Invoice::where('vendor_id',auth()->user()->vendor_id)->get();
    //    }
        return view('vendor.orders',compact('invoices'));
    }

    function vendor_earning(){
        // $invoices = Invoice::where([
        //     'vendor_id' => auth()->id(),
        //     'payment' => 'paid',
        //     'order_status' => 'delivered',
        // ])->get();
        $invoices = Invoice::where('vendor_id',auth()->id())->get();
        $seller_data = General::find(1);
        return view('vendor.earning.earning',compact('invoices','seller_data'));
    }

    function withdrawal_request(Request $request){
        $request->validate([
            'checkbox' => 'required',
        ]);
        $invoice_pay_request = Invoice::wherein('id', $request->checkbox)->get();
        $seller_data = General::find(1);
        return view('vendor.earning.withdrawal-request',compact('invoice_pay_request','seller_data'));
    }

    function withdrawal(Request $request){
        $invoice_ids = explode(',', rtrim(ltrim($request->invoice_ids, '['),']'));
        foreach ($invoice_ids as $invoice_id) {
            VendorPaymentRequest::insert([
                'vendor_id' => auth()->id(),
                'invoice_id' => $invoice_id,
                'created_at' => now(),
            ]);
            Invoice::find($invoice_id)->update([
                'withdraw_status' => 'Send Payment Request',
            ]);
        }
        return redirect('vendor-earning');
    }
}
