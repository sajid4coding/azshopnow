<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Invoice;
use App\Models\General;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function customerhome ()
    {
        // echo auth()->user()->role;
        if(auth()->user()->role == 'customer'){
             return view('frontend.customer.dashbord',[
                'invoices_info' => Invoice::where('user_id',auth()->user()->id)->get(),
                'banners' => Banner::all()->first(),
                'general' => General::find(1),
             ]);
        }else{
             return view('frontend.customerlogin',[
                'banners' => Banner::all()->first(),
                'general' => General::find(1),
             ]);
        }
    }
}
