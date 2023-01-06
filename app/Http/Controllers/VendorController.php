<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\VendorShipping;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Facades\Image;


class vendorController extends Controller
{
    function vendor_index(){
         return view('vendor.registration',[
            'banners' => Banner::all()->first(),
         ]);
     }
    function vendor_post(Request $request){
        // return  $request;
        $request->validate([
            '*' => 'required',
            'email' => "unique:users",
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        User::insert([
              'name' =>   $request->name,
              'shop_name' =>   $request->shop_name,
              'email' =>   $request->email,
              'password' =>  bcrypt($request->password),
              'role' =>  'vendor',
              'status' =>  'deactive',
              'created_at' => Carbon::now(),
        ]);
        return redirect('/vendor/login')->with('registrion_success','Your registation successfully & wait for admin approval');

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
                if(Auth()->user()->role == 'vendor'){
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
        $invoices_info = Invoice::where('vendor_id',auth()->user()->id)->get();
        $coupons =  Coupon::where('vendor_id',auth()->user()->id)->get();
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

                // if(auth()->user()->banner !== NULL){
                //     unlink(base_path('public/uploads/banner_img/'.auth()->user()->banner));
                // }

                // if(auth()->user()->profile_photo !== NULL){
                //     unlink(base_path('public/uploads/vendor_profile/'.auth()->user()->profile_photo));
                // }

                 User::find(auth()->user()->id)->update($request->except('_token','profile_photo','banner')+[
                    'profile_photo' => $photo,
                    'banner' =>  $banner_photo,
                    ]);
            }else{
                if($request->hasFile('profile_photo')){


                    $photo= 'vendor_profile'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('profile_photo')->getClientOriginalExtension();
                    $img = Image::make($request->file('profile_photo'))->resize(300, 300);
                    $img->save(base_path('public/uploads/vendor_profile/'.$photo), 60);

                    // if(auth()->user()->profile_photo !== NULL){
                    //     unlink(base_path('public/uploads/vendor_profile/'.auth()->user()->profile_photo));
                    // }

                     User::find(auth()->user()->id)->update($request->except('_token','profile_photo','banner')+[
                        'profile_photo' =>  $photo,
                     ]);
                }else if($request->hasFile('banner')){


                    $banner_photo= 'banner'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('banner')->getClientOriginalExtension();
                    $banner_img = Image::make($request->file('banner'))->resize(1200, 267);
                    $banner_img->save(base_path('public/uploads/banner_img/'.$banner_photo));

                    // if(auth()->user()->banner !== NULL){
                    //     unlink(base_path('public/uploads/banner_img/'.auth()->user()->banner));
                    // }

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
            'coupon_code' => 'required',
            'coupon_amount' => 'required',
            'minimum_price' => 'integer',
            'coupon_amount' => 'integer',
            ]);


        Coupon::create($request->except('_token')+['vendor_id' => auth()->user()->id]);

        return back()->with('coupon_add_success','Successfully added a new coupon');
    }
    function coupon_delete($id){
            Coupon::find($id)->delete();
            return back()->with('coupon_delete_message', 'Successfully deleted a coupon');

    }
    function vendor_setting(){
        return view('vendor.settings');
    }
    function vendor_coupon_add_index(){
        $coupons =  Coupon::where('vendor_id',auth()->user()->id)->get();
        $coupon_count =  Coupon::where('vendor_id',auth()->user()->id)->count();
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
            'product_count' => Product::where('vendor_id',auth()->id())->count()
        ]);
    }

    function vendor_orders(){
        $invoices = Invoice::where('vendor_id',auth()->id())->get();
        return view('vendor.orders',compact('invoices'));
    }
}
