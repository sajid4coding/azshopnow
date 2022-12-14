<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\General;
use Carbon\Carbon;

class GeneralController extends Controller
{
    public function LogosEdit(){

       return view('dashboard.geleral_setting.logos_edit',[
        'general' => General::find(1),
       ]);
    }
    function HeaderLogoPost(Request $request){
        $request->validate([
            'header_logo' =>'required|max:2048|mimes:jpg,bmp,png',
        ]);
        $old_image = General::find(1)->header_logo;
        if($old_image){
            unlink(base_path('public/uploads/general_photo/'.$old_image));
        }
        $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('header_logo')->getClientOriginalExtension();
        $img = Image::make($request->file('header_logo'))->resize(300, 300);
        $img->save(base_path('public/uploads/general_photo/'.$photo), 60);
        General::find(1)->update([
            'header_logo' =>$photo,
        ]);
        return  back()->with('success_msg','Successfully changes current header logo');
    }
    function footerLogoPost(Request $request){
        $request->validate([
            'footer_logo' =>'required|max:2048|mimes:jpg,bmp,png',
        ]);
        $old_image = General::find(1)->footer_logo;
        if($old_image){
            unlink(base_path('public/uploads/general_photo/'.$old_image));
        }
        $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('footer_logo')->getClientOriginalExtension();
        $img = Image::make($request->file('footer_logo'))->resize(300, 300);
        $img->save(base_path('public/uploads/general_photo/'.$photo), 60);
        General::find(1)->update([
            'footer_logo' =>$photo,
        ]);
        return  back()->with('success_msg','Successfully changes current header logo');
    }
    function invoiceLogoPost(Request $request){
        $request->validate([
            'invoice_logo' =>'required|max:2048|mimes:jpg,bmp,png',
        ]);
        $old_image = General::find(1)->invoice_logo;
        if($old_image){
            unlink(base_path('public/uploads/general_photo/'.$old_image));
        }
        $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('invoice_logo')->getClientOriginalExtension();
        $img = Image::make($request->file('invoice_logo'))->resize(300, 300);
        $img->save(base_path('public/uploads/general_photo/'.$photo), 60);
        General::find(1)->update([
            'invoice_logo' =>$photo,
        ]);
        return  back()->with('success_msg','Successfully changes current Invoice logo');
    }
    function faviconPost(Request $request){
        $request->validate([
            'favicon_logo' =>'required|max:2048|mimes:jpg,bmp,png',
        ]);
        $old_image = General::find(1)->favicon_logo;
        if($old_image){
            unlink(base_path('public/uploads/general_photo/'.$old_image));
        }
        $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('favicon_logo')->getClientOriginalExtension();
        $img = Image::make($request->file('favicon_logo'))->resize(32, 32);
        $img->save(base_path('public/uploads/general_photo/'.$photo), 60);
        General::find(1)->update([
            'favicon_logo' =>$photo,
        ]);
        return  back()->with('favicon_success_msg','Successfully changes current Invoice logo');
    }
    function dashboardLogoPost(Request $request){
        $request->validate([
            'dashboard_logo' =>'required|max:2048|mimes:jpg,bmp,png',
        ]);
        $old_image = General::find(1)->dashboard_logo;
        if($old_image){
            unlink(base_path('public/uploads/general_photo/'.$old_image));
        }
        $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('dashboard_logo')->getClientOriginalExtension();
        $img = Image::make($request->file('dashboard_logo'))->resize(300, 300);
        $img->save(base_path('public/uploads/general_photo/'.$photo), 60);
        General::find(1)->update([
            'dashboard_logo' =>$photo,
        ]);
        return  back()->with('dashboard_logo_success_msg','Successfully changes current Invoice logo');
    }
    function DashboardFaviconLogoPost(Request $request){
        $request->validate([
            'dashboard_favicon_logo' =>'required|max:2048|mimes:jpg,bmp,png',
        ]);
        $old_image = General::find(1)->dashboaed_favicon_logo;
        if($old_image){
            unlink(base_path('public/uploads/general_photo/'.$old_image));
        }
        $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('dashboard_favicon_logo')->getClientOriginalExtension();
        $img = Image::make($request->file('dashboard_favicon_logo'))->resize(300, 300);
        $img->save(base_path('public/uploads/general_photo/'.$photo), 60);
        General::find(1)->update([
            'dashboard_favicon_logo' =>$photo,
        ]);
        return  back()->with('dashboard_favicon_logo_success_msg','Successfully changes current Invoice logo');
    }
    function websiteContents(){
        return view('dashboard.geleral_setting.website_content',[
            'general' => General::find(1),
        ]);
    }
    function websiteContentsPost(Request $request){
        if($request->website_title){
            General::find(1)->update([
                'website_title' => $request->website_title
            ]);
        };
        if($request->theme_color){
            General::find(1)->update([
                'theme_color' => $request->theme_color
            ]);
        };
        if($request->copyright_text){
            General::find(1)->update([
                'copyright_text' => $request->copyright_text
            ]);
        };
        if($request->capcha){
            General::find(1)->update([
                'capcha_status' => $request->capcha
            ]);
        };
        if($request->twak_io_status){
            General::find(1)->update([
                'twak_io_status' => $request->twak_io_status
            ]);
        };
        if($request->twak_io_id){
            General::find(1)->update([
                'twak_io_id' => $request->twak_io_id
            ]);
        };

        return back();
    }
}
