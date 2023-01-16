<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\General;
use App\Models\Slider;
use App\Models\Social;
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
    function socialLink(){
        return view('dashboard.geleral_setting.social_link',[
            'socials' => Social::all(),
        ]);
    }
    function socialLinkEdit($id){
        return view('dashboard.geleral_setting.social_link_edit',[
            'social' => Social::find($id),
        ]);
    }
    function socialLinkPost(Request $request){
        $request->validate([
            'social_name' => 'required',
            'social_link' => 'required|url',
       ]);
        if(!$request->social_icon){

            $request->validate([
                 'social_image' => 'required|mimes:png,jpg|dimensions:max_width=50,max_height=50'
            ]);
        }else{
            $request->validate([
                'social_image' => 'mimes:png,jpg|dimensions:max_width=50,max_height=50'
           ]);
        }
        if($request->hasFile('social_image')){

            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('social_image')->getClientOriginalExtension();
            $img = Image::make($request->file('social_image'));
            $img->save(base_path('public/uploads/social_image/'.$photo), 60);
            Social::insert([
                'social_name' => $request->social_name,
                'social_link' => $request->social_link,
                'social_icon' => $request->social_icon,
                'social_image' => $photo,
                'icon_bg_color' => $request->icon_bg_color,
                'created_at' => Carbon::now(),
            ]);
        }else{
            Social::insert([
                'social_name' => $request->social_name,
                'social_link' => $request->social_link,
                'social_icon' => $request->social_icon,
                'icon_bg_color' => $request->icon_bg_color,
                'created_at' => Carbon::now(),
            ]);
        }


        return back()->with('social_add_message','Successfully added a new social link');
    }
    public function socialLinkEditPost(Request $request, $id){

        $request->validate([
            'social_name' => 'required',
            'social_link' => 'required|url',
       ]);
        if( !$request->social_icon && !Social::find($id)->social_image){
            $request->validate([
                 'social_image' => 'required|mimes:png,jpg|dimensions:max_width=50,max_height=50'
            ]);
        }
        if($request->hasFile('social_image')){

            $photo= Carbon::now()->format('Y').rand(1,9999).".".$request->file('social_image')->getClientOriginalExtension();
            $img = Image::make($request->file('social_image'));
            $img->save(base_path('public/uploads/social_image/'.$photo), 60);
            if($request->icon_bg_color == '#000000'){
                Social::find($id)->update([
                    'social_name' => $request->social_name,
                    'social_link' => $request->social_link,
                    'social_icon' => $request->social_icon,
                    'social_image' => $photo,
                    'updated_at' => Carbon::now(),
                ]);
            }else{
                Social::find($id)->update([
                    'social_name' => $request->social_name,
                    'social_link' => $request->social_link,
                    'social_icon' => $request->social_icon,
                    'social_image' => $photo,
                    'icon_bg_color' => $request->icon_bg_color,
                    'updated_at' => Carbon::now(),
                ]);
            }
        }else{
            if($request->icon_bg_color == '#000000'){
                Social::find($id)->update([
                    'social_name' => $request->social_name,
                    'social_link' => $request->social_link,
                    'social_icon' => $request->social_icon,
                    'updated_at' => Carbon::now(),
                ]);
            }else{
                Social::find($id)->update([
                    'social_name' => $request->social_name,
                    'social_link' => $request->social_link,
                    'social_icon' => $request->social_icon,
                    'icon_bg_color' => $request->icon_bg_color,
                    'updated_at' => Carbon::now(),
                ]);
            }
        }


        return redirect('general-settings/dashboard-social-link')->with('social_add_message','Successfully Updated a social link');
    }
    function socialLinkDelete($id){
        Social::find($id)->delete();
        return back()->with('social_delete', 'Successfully Delete a slider');
    }
    function contactInfo(){
        return view('dashboard.geleral_setting.contactInfo',[
            'general' => General::find(1),
        ]);
    }
    function contactInfoPost(Request $request){
        if($request->email){
            General::find(1)->update([
                'email' => $request->email
            ]);
        };
        if($request->phone_number){
            General::find(1)->update([
                'phone_number' => $request->phone_number
            ]);
        };
        if($request->teliphone){
            General::find(1)->update([
                'teliphone' => $request->teliphone
            ]);
        };
        if($request->address){
            General::find(1)->update([
                'address' => $request->address
            ]);
        };

        return back();
    }

}
