<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic as ImageTwo;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class CustomerChat extends Component
{
    use WithFileUploads;
    public $userId;
    public $select_id;
    public $select_name;
    public $select_role;
    public $select_photo;
    public $message;
    public $img_message;
    public $receive_id;
    public $validate;


    public function render()
    {

        return view('livewire.customer-chat',[
            'allUser' => User::all(),
            'allMessage' => Message::all()
        ]);
    }
    public function getUserId($id){
        $this->select_id =$id;
        $this->select_name =User::find($id)->name;
        $this->select_role =User::find($id)->role;
        $this->select_photo =User::find($id)->profile_photo;
    }
    public function sendMessage(){

        // $image_ext = $this->img_message->getClientOriginalExtension();

        if($this->img_message){
            $photo= Carbon::now()->format('Y').rand(1,9999).".".$this->img_message->getClientOriginalExtension();
            $img = Image::make($this->img_message);
            $img->save(base_path('public/uploads/messanger/'.$photo), 60);
            $this->validate([
                'select_id' => 'required',
            ]);
            Message::insert([
                'sender_id' => auth()->id(),
                'receiver_id' => $this->select_id,
                'image' => $photo,
                'message' => $this->message,
                'created_at' => Carbon::now(),
            ]);
            $this->reset('img_message');
            $this->reset('message');
        }else{
            
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
            $this->reset('img_message');
            $this->reset('message');
        }

    }








}
