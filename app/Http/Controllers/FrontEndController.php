<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
    function contact_us_index(){
        return view('frontend.contact_us');
    }
    function contact_us_post(Request $request){
        $request->validate([
            '*' =>'required',
            'email' => 'email',
        ]);

        contact::create($request->except('_token'));

        Mail::to('mdshrabon.dev@gmail.com')->send(new ContactMessage($request->except('_token')));

        return back()->with('contact_success_message','Your message successfully we have received!');
    }
}
