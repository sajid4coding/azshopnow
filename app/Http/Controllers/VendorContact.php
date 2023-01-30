<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VendorContact extends Controller
{
    public function customer_with_with_vendor($id){

        Message::insert([
            'sender_id' => auth()->id(),
            'receiver_id' => $id,
            'message' => 'Hello',
            'created_at' => Carbon::now(),
        ]);

        return redirect('/customer/chat-with-vendor');
    }
}
