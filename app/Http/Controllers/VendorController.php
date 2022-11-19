<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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
              'password' =>  Hash::make($request->password),
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
}
