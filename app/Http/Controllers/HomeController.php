<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
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
             ]);
        }else{
             return view('frontend.customerlogin');
        }
    }
}
