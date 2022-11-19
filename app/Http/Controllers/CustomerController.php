<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use  App\Http\Controllers\HomeController;
use Illuminate\Support\Str;
use Auth;

class CustomerController extends Controller
{
    public function customer_login(Request $request){

           return view('frontend.customerlogin');
    }


    public function customer_register(){
         return view('frontend.customeregister');
     }

       public function customer_login_post(Request $request){
              $request->validate([
                  'email' => 'required',
                  'password' => 'required',
            ]);
              if(Auth::attempt(['email' => $request->email, 'password' => $request->password,])){
                  return redirect('customerhome');
             }else{
                  return back()->with('login', 'Your Email and password is wrong');
             }
    }

    public function customer_register_post(Request $request){
        //  return view('frontend.customeregister');
        // return $request;
        $request->validate([
            '*' => 'required'
        ]);
         $id = user::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone_Number' => $request->phone_Number,
            'password' =>bcrypt($request->password),
            'role' => 'customer',
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Your Account Created Successfully');

     }

}
