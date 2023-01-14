<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\General;
use App\Models\Slider;
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
        $img = Image::make($request->file('header_logo'))->resize(85, 28);
        $img->save(base_path('public/uploads/general_photo/'.$photo), 100);
        General::find(1)->update([
            'header_logo' =>$photo,
        ]);
        return  back()->with('success_msg','Changed Header Logo');
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
        $img = Image::make($request->file('footer_logo'))->resize(85, 28);
        $img->save(base_path('public/uploads/general_photo/'.$photo), 100);
        General::find(1)->update([
            'footer_logo' =>$photo,
        ]);
        return  back()->with('success_msg','Changed Footer Logo');
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
        $img = Image::make($request->file('invoice_logo'))->resize(85, 28);
        $img->save(base_path('public/uploads/general_photo/'.$photo), 100);
        General::find(1)->update([
            'invoice_logo' =>$photo,
        ]);
        return  back()->with('success_msg','Changed Invoice Logo');
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
        $img->save(base_path('public/uploads/general_photo/'.$photo), 100);
        General::find(1)->update([
            'favicon_logo' =>$photo,
        ]);
        return  back()->with('favicon_success_msg','Changed Favicon Logo');
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
        $img = Image::make($request->file('dashboard_logo'))->resize(270, 56);
        $img->save(base_path('public/uploads/general_photo/'.$photo), 100);
        General::find(1)->update([
            'dashboard_logo' =>$photo,
        ]);
        return  back()->with('dashboard_logo_success_msg','Changed Dashboard Logo');
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
        $img = Image::make($request->file('dashboard_favicon_logo'))->resize(270, 56);
        $img->save(base_path('public/uploads/general_photo/'.$photo), 100);
        General::find(1)->update([
            'dashboard_favicon_logo' =>$photo,
        ]);
        return  back()->with('dashboard_favicon_logo_success_msg','Changed Dashboard Favicon Logo');
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
    public function generalSlider(){
        return view('dashboard.geleral_setting.slider',[
            'sliders' =>slider::all()
        ]);
    }
    public function generalSliderPost(Request $request){
        $request->validate([
            'slider_image' =>'required|max:2048|mimes:jpg,bmp,png',
            'slider_page_link' =>'url',
        ]);
        $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('slider_image')->getClientOriginalExtension();
        $img = Image::make($request->file('slider_image'))->resize(1073,575);
        $img->save(base_path('public/uploads/slider/'.$photo), 60);

        slider::insert([
            'slider_image' => $photo,
            'slider_page_link' => $request->slider_page_link,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('slider_success', 'Successfully added a new slider');
    }
    public function generalSliderEdit($id){

        return view('dashboard.geleral_setting.sliderEdit',[
       'slider' => Slider::find($id),
        ]);
    }
    public function generalSliderEditPost(Request $request, $id){
        $request->validate([
            'slider_image' =>'max:2048|mimes:jpg,bmp,png',
            'slider_page_link' =>'url',
        ]);

        if($request->file('slider_image')){
            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('slider_image')->getClientOriginalExtension();
            $img = Image::make($request->file('slider_image'))->resize(1073,575);
            $img->save(base_path('public/uploads/slider/'.$photo), 60);

            slider::find($id)->update([
                'slider_image' => $photo,
                'slider_page_link' => $request->slider_page_link,
                'updated_at' => Carbon::now(),
            ]);
        }else{
            slider::find($id)->update([
                'slider_page_link' => $request->slider_page_link,
                'updated_at' => Carbon::now(),
            ]);
        }



        return redirect('general-settings/dashboard-slider')->with('slider_updated', 'Successfully updateed this slider');
    }
    public function generalSliderDelete($id){

        slider::find($id)->delete();
        return back()->with('slider_delete', 'Successfully Delete a slider');
    }
}
