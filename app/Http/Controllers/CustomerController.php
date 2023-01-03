<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Banner, Invoice, User, Order_Detail, Product, ProductReview, ReviewGallery};
use Carbon\Carbon;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Intervention\Image\Facades\Image;



class CustomerController extends Controller
{
    //     public function __construct()
    // {
    //     $this->middleware('auth');
    // }
   

    public function customer_register(){
         return view('frontend.customeregister',[
            'banners' => Banner::all()->first(),
         ]);
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

      return view('frontend.customerlogin',[
        'banners' => Banner::all()->first(),
      ]);

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
                'orders' => Invoice::where('user_id', auth()->id())->latest()->get(),
                // 'order_details' => Order_Detail::where('user_id', auth()->id())->get(),
            ]);
       }

    public function invoice_download($id){
        $invoice = Invoice::find($id);
        $order_details = Order_Detail::where('invoice_id', $id)->get();
        $pdf = Pdf::loadView('pdf.invoice', compact('invoice', 'order_details'));
        return $pdf->setPaper('a4', 'portrait')->download('invoice.pdf');
    }

    public function product_review_list(){
        return view('frontend.customer.review_product_list',[
            'reviews' => ProductReview::where('user_id', auth()->id())->latest()->get(),
        ]);
    }


    public function product_review($id){
        return view('frontend.customer.product_review', compact('id'));
    }


    public function product_review_post(Request $request, $id){
        $request->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);
        $product_review_id = ProductReview::insertGetId([
            'invoice_id' => Order_Detail::find($id)->invoice_id,
            'order_detail_id' => $id,
            'user_id' => auth()->id(),
            'vendor_id' => Invoice::find($id)->vendor_id,
            'product_id' => Order_Detail::find($id)->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'created_at' => now()
        ]);

        $review_images = $request->file('review_images');
        if($review_images){
            foreach($review_images as $review_image){
                $review_gallery= Carbon::now()->format('Y').rand(1,9999).".".$review_image->getClientOriginalExtension();
                $review_img = Image::make($review_image)->resize(207, 232);
                $review_img->save(base_path('public/uploads/product_review_images/'.$review_gallery), 70);
                ReviewGallery::insert([
                    'product_review_id' => $product_review_id,
                    'review_image' => $review_gallery,
                    'created_at' => now()
                ]);
            }
        }
        return redirect('customer/product-review-list');
    }


    public function customer_profile_submit(Request $request){
         if($request->hasFile('profile_photo') && $request->hasFile('banner')){

                $photo= 'customer_profile'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('profile_photo')->getClientOriginalExtension();
                $img = Image::make($request->file('profile_photo'))->resize(300, 300);
                $img->save(base_path('public/uploads/customer_profile/'.$photo), 60);


                $banner_photo= 'banner'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('banner')->getClientOriginalExtension();
                $banner_img = Image::make($request->file('banner'))->resize(1200, 267);
                $banner_img->save(base_path('public/uploads/banner_img/'.$banner_photo));

                if(auth()->user()->banner !== NULL){
                    unlink(base_path('public/uploads/banner_img/'.auth()->user()->banner));
                }

                if(auth()->user()->profile_photo !== NULL){
                    unlink(base_path('public/uploads/customer_profile/'.auth()->user()->profile_photo));
                }

                 User::find(auth()->user()->id)->update($request->except('_token','profile_photo','banner')+[
                    'profile_photo' =>  $photo,
                    'banner' =>  $banner_photo,
                 ]);
            }else{
                if($request->hasFile('profile_photo')){


                    $photo= 'customer_profile'.Carbon::now()->format('Y').rand(1,9999).".".$request->file('profile_photo')->getClientOriginalExtension();
                    $img = Image::make($request->file('profile_photo'))->resize(300, 300);
                    $img->save(base_path('public/uploads/customer_profile/'.$photo), 60);

                    if(auth()->user()->profile_photo !== NULL){
                        unlink(base_path('public/uploads/customer_profile/'.auth()->user()->profile_photo));
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


             return back();
    }


}
