<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Invoice, User, Order_Detail, Product};
use Carbon\Carbon;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class CustomerController extends Controller
{
    //     public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
            '*' => 'required',
             'email' => "unique:users",
            'password' => 'required|min:8|confirmed',
        ]);
         $id = user::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone_Number' => $request->phone_number,
            'password' =>bcrypt($request->password),
            'role' => 'customer',
            'status' => 'active',
            'created_at' => Carbon::now()
        ]);
        // SENT EMAIL VERIFY
        user::find($id)->sendEmailVerificationNotification();
         // SENT EMAIL VERIFY
        return redirect('/customer/login');
        // return redirect()->route('/customer/login');
        // return back()->with('success', 'Your Account Created Successfully');
    }
    public function customer_login(Request $request){

      return view('frontend.customerlogin');

     }
    public function edit_profile(){

          return view('frontend.editprofile');
     }

    public function change_profile_post(Request $request){

           $request->validate([
              '*'=>'required',
          ]);

          User::find(auth()->id())->update([
             'name' =>  $request->name,
              'email' => $request->email,
              'phone_number' => $request->phone_number,

           ]);

            return back()->with('success', 'profile settings changed successfully!');

     }


    public function password_update(Request $request){

                $request->validate([
                'current_password' => 'required',
                'password'=>['required', 'confirmed','different:current_password', Password::min(8)],
                'password_confirmation'=> 'required',

            ]);
            if(Hash::check($request->current_password, auth()->user()->password)){
                User::find(auth()->id())->update([
                    'password'=>Hash::make($request->password),
                ]);
                return back()->with('password','Your password change successfully');
             }else{

                return back()->with('change_error_message','Your current password is wrong');

            }
            return back()->with('');
     }

       function customer_account_details(){
            return view('frontend.customer.customer_account_details');
       }
       function customer_invoice_details(){
            return view('frontend.customer.customer_invoice',[
                'orders' => Invoice::where('user_id', auth()->id())->get(),
            ]);
       }

    public function invoice_download($id){
        $pdf = Pdf::loadView('pdf.invoice');
        return $pdf->setPaper('a4', 'portrait')->download('invoice.pdf');
    }


}
