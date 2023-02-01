<div>
    <div class="card">
        <div class="row g-0">
            <div class="col-12 col-lg-4 col-xl-3 border-right">
                 <!--begin::Style-->
                 <style>
                    .select_user{
                        background: rgba(0, 195, 255, 0.297);
                        padding: 10px 5px;
                        border-radius: 5px;
                    }
                </style>
                <div class="px-4 d-none d-md-block">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 pt-3 pb-2 mb-2 border-b-2" style="border-bottom:1px solid #79797977">
                            All vendor
                        </div>
                    </div>
                </div>
                <!--begin::Style-->
                @foreach ($allUser as $user)
                    @if ($user->id != auth()->id())
                    @if (App\Models\Message::where('receiver_id',auth()->id())->where('sender_id',$user->id)->exists())
                    <span  class="list-group-item list-group-item-action border-0 px-3 cursor-pointer  @if ($user->id == $select_id) select_user @endif " wire:click="getUserId({{ $user->id }})" id="{{ $user->name }}">
                        <div class="d-flex align-items-start">
                            <img style="margin-right: 10px !important;" src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" class="rounded-circle mr-1" alt="Vanessa Tucker" width="30" height="30">
                            <div class="flex-grow-1 ml-3 font_size_small pl-2">
                                 {{ $user->name }}
                                <div class="small"> {{ $user->role }}</div>
                            </div>
                        </div>
                    </span>
                    @endif
                    @endif
                @endforeach

                <hr class="d-block d-lg-none mt-1 mb-0">
            </div>
            <div class="col-12 col-lg-8 col-xl-9">

                 @if (!$select_name)
                    <div class="d-flex justify-content-center align-items-center" style="height:400px;width:100%">
                        <div class="text-center">
                            <h2 class="text-center">Pick up where you left off</h2>
                            <p class="text-center">Select a conversation and chat away.</p>
                        </div>
                    </div>
                 @else
                 <div class="py-2 px-4 border-bottom d-none d-lg-block">
                    <div class="d-flex align-items-center py-1">
                        <div class="position-relative">
                            <img src="{{ asset('uploads/profile_photo') }}/{{ $select_photo }}" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                        </div>
                        <div class="flex-grow-1 pl-5">
                            <strong>{{ $select_name ? $select_name : 'No select' }}</strong>
                            <div class="text-muted small"><em>{{ $select_role }}</em></div>
                        </div>
                    </div>
                </div>
                <div wire:poll class="position-relative" >
                    <div class="chat-messages p-4" style="height:400px;width:100%">
                        @foreach ($allMessage as $message)
                        @if ($message->receiver_id == $select_id && $message->sender_id== auth()->id() ||
                             $message->sender_id == $select_id && $message->receiver_id== auth()->id() )
                            @if ($message->sender_id != auth()->id())
                            <div class="chat-message-left pb-4">
                             <div>
                                <img src="{{ asset('uploads/profile_photo') }}/{{ userProfilePhoto($message->sender_id) }}" class="rounded-circle mr-1" alt="Sharon Lessman" width="30" height="30">
                                 <div style="font-size: 8px !important" class="text-muted small text-nowrap mt-2  font_size_small">{{  $message->created_at->diffForHumans() }}</div>
                             </div>
                             <div>
                                @if ($message->image)
                                <div style="box-shadow: 0 5px 10px 0 #00000046;display:block;width:200px" class=" bg-light py-2 px-2 rounded-lg  font_size_small shadow-black shadow-xl ">
                                    <img src="{{ asset('uploads/messanger') }}/{{ $message->image }}" alt="">
                                </div>
                                @endif
                                @if ($message->message)
                                <div style="box-shadow: 0 5px 10px 0 #00000046;" class="mt-2 bg-light py-2 px-2 rounded-lg  font_size_small shadow-black shadow-xl ">
                                    {{ $message->message }}
                                </div>
                                @endif
                             </div>
                             </div>
                             @else
                             <div class="chat-message-right pb-4">
                                    <div style="text-align:right">
                                        <img src="{{ asset('uploads/profile_photo') }}/{{ userProfilePhoto($message->sender_id) }}" class="rounded-circle mr-1" alt="Sharon Lessman" width="30" height="30">
                                     <div style="font-size: 8px !important" class="text-muted small text-nowrap mt-2  font_size_small">{{  $message->created_at->diffForHumans() }}</div>
                                    </div>
                                   <div>
                                    @if ($message->image)
                                    <div style="box-shadow: 0 5px 10px 0 #00000046;display:block;width:200px" class=" bg-light py-2 px-2 rounded-lg  font_size_small shadow-black shadow-xl ">
                                        <img src="{{ asset('uploads/messanger') }}/{{ $message->image }}" alt="{{ $message->image }}">
                                    </div>
                                    @endif
                                    @if ($message->message)
                                    <div style="box-shadow: 0 5px 10px 0 #00000046;" class="bg-light mt-2 py-2 px-2 rounded-lg  font_size_small shadow-black shadow-xl ">
                                        {{ $message->message }}
                                    </div>
                                    @endif
                                   </div>
                             </div>
                            @endif
                         @endif
                        @endforeach
                    </div>
                </div>
                <form wire:submit.prevent="sendMessage">

                    <div class="flex-grow-0 py-3 px-4 border-top">
                        <div class="input-group">
                            <label  class="msg_img  @if ($img_message)
                            bg-danger
                            @else
                            bg-primary
                            @endif " for="msg_img"><i class="fas fa-image"></i></label>
                             <input wire:model="img_message" style="display: none" type="file" name="" id="msg_img">
                            <input wire:model="message" type="text" class="form-control" placeholder="Type your message">
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
                 @endif
                 <style>
                    .msg_img{
                        width: 50px;
                        height: 50px;
                        /* background: #0D6EFD; */
                        color: #ffffff;
                        font-size: 20px;
                        text-align: center;
                        line-height: 50px;
                        border-radius: 100%;
                        box-shadow: 0 0 20px 0 #00000046;
                    }
                </style>
            </div>
        </div>
    </div>
</div>
@section('footer_script')
    <script>
        let classNameGet = document.getElementsByClassName('user');
        let idGet = classNameGet[0].id;
        $('.user').click(function(){
            $('#userName').htm(this.id)
        })
    </script>
@endsection
