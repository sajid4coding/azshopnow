<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\General;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class BannerController extends Controller
{
   function index(){
    $banners = Banner::first();
    $general = General::find(1);

       return view('dashboard.banners.edit',compact('banners','general'));
   }
   function shop_page(Request $request){


       $request->validate([
           'shop_page_banner' =>'required|max:2048|mimes:jpg,bmp,png',
        ]);



        $old_image = Banner::select('shop_page_banner')->first()->shop_page_banner;

        $localStore =  $request->file('shop_page_banner');
        $extension_img = $request->file('shop_page_banner')->extension();
        $image_name =  $request->file('shop_page_banner')->getClientOriginalName();
        $newName = 'banner_photo'.'_'.time().'_'.$image_name;

        if($request->hasFile('shop_page_banner')){

            $img = Image::make($localStore)->resize(1920, 657)->save(base_path('public/uploads/banners/'.$newName));

          if( $old_image){
              unlink(base_path('public/uploads/banners/'.$old_image));
          }
          $img->save(base_path('public/uploads/banners/'.$newName), 60);
          Banner::find(1)->update([
              'shop_page_banner' => $newName,
          ]);

        }
        return back()->with('updated_image_success','Successfully updated this image');
   }
   function vendor_page(Request $request){
      $request->validate([
        'vendor_login_banner' =>'required|max:2048|mimes:jpg,bmp,png',
      ]);
      $old_image = Banner::select('vendor_login_banner')->first()->vendor_login_banner;

      if($request->hasFile('vendor_login_banner')){

          $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('vendor_login_banner')->getClientOriginalExtension();
        //   return $photo;
          $img = Image::make($request->file('vendor_login_banner'));
          $img->save(base_path('public/uploads/banners/'.$photo));

          if( $old_image){
              unlink(base_path('public/uploads/banners/'.$old_image));
          }

          Banner::find(1)->update([
              'vendor_login_banner' => $photo,
          ]);
        }
        return back()->with('updated_image_success','Successfully updated this image');
   }
   function customer_page(Request $request){
      $request->validate([
        'customer_login_banner' =>'required|max:2048|mimes:jpg,bmp,png',
      ]);
      $old_image = Banner::select('customer_login_banner')->first()->customer_login_banner;

      if($request->hasFile('customer_login_banner')){

          $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('customer_login_banner')->getClientOriginalExtension();
          $img = Image::make($request->file('customer_login_banner'))->resize(1200, 300);

          if( $old_image){
              unlink(base_path('public/uploads/banners/'.$old_image));
          }
          $img->save(base_path('public/uploads/banners/'.$photo), 60);

          Banner::find(1)->update([
              'customer_login_banner' => $photo,
          ]);
        }
        return back()->with('updated_image_success','Successfully updated this image');
   }
   function cart_page(Request $request){
       $request->validate([
          'cart_page_banner' =>'required|max:2048|mimes:jpg,bmp,png',
        ]);
        $old_image = Banner::select('cart_page_banner')->first()->cart_page_banner;

        if($request->hasFile('cart_page_banner')){

            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('cart_page_banner')->getClientOriginalExtension();
            $img = Image::make($request->file('cart_page_banner'));
            // return $request->file('cart_page_banner');

          if( $old_image){
              unlink(base_path('public/uploads/banners/'.$old_image));
          }
          $img->save(base_path('public/uploads/banners/'.$photo), 60);

          Banner::find(1)->update([
              'cart_page_banner' => $photo,
          ]);
        }
        return back()->with('updated_image_success','Successfully updated this image');
   }
}
