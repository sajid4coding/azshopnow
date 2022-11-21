<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\Rules\Password;
use Image;

class vendorController extends Controller
{
     function vendor_index(){
         return view('vendor.registration');
     }
     function vendor_post(Request $request){
        // return  $request;
        $request->validate([
            '*' => 'required',
            'email' => "unique:users",
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised(3)],
        ]);

        User::insert([
              'name' =>   $request->name,
              'email' =>   $request->email,
              'password' =>  bcrypt($request->password),
              'role' =>  'vendor',
              'status' =>  'deactive',
              'created_at' => Carbon::now(),
        ]);

        return redirect('/vendor/login');

        }
        function vendor_login(){
             return view('vendor.login');
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
            return view('vendor.dashboard');
        }
        function vendor_update_info(Request $request){


            if($request->hasFile('profile_photo')){


                $photo= 'vendor_profile'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('profile_photo')->getClientOriginalExtension();
                $img = Image::make($request->file('profile_photo'))->resize(300, 300);
                $img->save(base_path('public/uploads/vendor_profile/'.$photo), 60);

                if(auth()->user()->profile_photo !== NULL){
                    unlink(base_path('public/uploads/vendor_profile/'.auth()->user()->profile_photo));
                }

                 User::find(auth()->user()->id)->update($request->except('_token','profile_photo')+[
                    'profile_photo' =>  $photo,
                 ]);
            }else{
                User::find(auth()->user()->id)->update($request->except('_token','profile_photo'));
            }
             return back();

        }
        function vendor_change_password(Request $request){

            $request->validate([
                '*'=>'required',
                'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised(3)],

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

}
