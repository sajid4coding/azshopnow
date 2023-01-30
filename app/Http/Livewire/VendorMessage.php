<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class VendorMessage extends Component
{
    public $userId;
    public $select_id;
    public $select_name;
    public $select_role;
    public $select_photo;
    public $message;
    public $receive_id;
    public $validate;


    public function render()
    {
        return view('livewire.vendor-message',[
            'allUser' => User::all(),
            'allMessage' => Message::all(),
        ]);

    }
    public function getUserId($id){
        $this->select_id =$id;
        $this->select_name =User::find($id)->name;
        $this->select_role =User::find($id)->role;
        $this->select_photo =User::find($id)->profile_photo;
    }
    public function sendMessage(){
        $this->validate([
            'select_id' => 'required',
            'message' => 'required',
        ]);
        Message::insert([
            'sender_id' => auth()->id(),
            'receiver_id' => $this->select_id,
            'message' => $this->message,
            'created_at' => Carbon::now(),
        ]);
        $this->reset('message');
    }
}
