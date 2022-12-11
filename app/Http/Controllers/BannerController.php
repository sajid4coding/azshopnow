<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannerController extends Controller
{
   function index(){
       return view('dashboard.banners.edit');
   }
}
