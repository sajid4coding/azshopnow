<?php

namespace App\Http\Controllers;

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
             return view('frontend.customer.dashbord');
        }else{
             return view('frontend.customerlogin');
        }
    }
}
