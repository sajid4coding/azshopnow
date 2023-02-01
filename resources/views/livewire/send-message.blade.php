<div>
      <!--begin::Post-->
      <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
                    <!--begin::Contacts-->
                    <div class="card card-flush" style="height:500px;width:100%">
                        <!--begin::Card header-->
                        <div class="card-header pt-7" id="kt_chat_contacts_header">
                            <!--begin::Form-->
                            <form class="w-100 position-relative" autocomplete="off">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Input-->
                                <input wire:model.debounc.50ms="search" type="text" class="form-control form-control-solid px-15" placeholder="Search by username">
                                <!--end::Input-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-5" id="kt_chat_contacts_body">
                            <!--begin::List-->
                            <div class="scroll-y me-n5 pe-5 " data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="350px" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px" style="max-height: 350px;">
                                <!--begin::Style-->
                                <style>
                                    .select_user{
                                        background: rgba(0, 195, 255, 0.297);
                                        padding: 0 5px;
                                        border-radius: 5px;
                                    }
                                </style>
                                <!--begin::Style-->
                                <!--begin::User-->
                                @if ($searchUser->count() > 0)
                                <p class="border-b border-2">All Vendor</p>
                                @foreach ($searchUser->where('role','vendor') as $user)
                                @if ($user->id != auth()->id())
                                <div class="d-flex flex-stack py-4 px-1 cursor-pointer user @if ($user->id == $select_id) select_user @endif " wire:click="getUserId({{ $user->id }})" id="{{ $user->name }}">
                                    <!--begin::Details-->
                                     <div class="d-flex align-items-center">
                                       <!--begin::Avatar-->
                                        <div class="symbol symbol-45px symbol-circle">
                                           <picture>
                                               @if ($user->profile_photo)
                                                 <img class="symbol symbol-45px symbol-circle" width="40"  src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" alt="{{ $user->profile_photo }}">
                                               @else
                                                 <img class="symbol symbol-45px symbol-circle" width="40"  src="{{ asset('uploads/profile_photo/profile_picture.png') }}" alt="{{ $user->profile_photo }}">
                                               @endif
                                           </picture>
                                       </div>
                                       <!--end::Avatar-->
                                       <!--begin::Details-->
                                       <div class="ms-5">
                                           <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">{{ $user->name }}</span>
                                           <div class="fw-bold text-muted">{{ $user->email }}</div>
                                       </div>
                                       <!--end::Details-->
                                   </div>
                                   <!--end::Details-->
                                </div>
                                @endif
                               @endforeach
                               <p class="border-b border-2">All Customer</p>
                               @foreach ($searchUser->where('role','customer') as $user)
                               @if ($user->id != auth()->id())
                               <div class="d-flex flex-stack py-4 px-1 cursor-pointer user @if ($user->id == $select_id) select_user @endif " wire:click="getUserId({{ $user->id }})" id="{{ $user->name }}">
                                   <!--begin::Details-->
                                    <div class="d-flex align-items-center">
                                      <!--begin::Avatar-->
                                       <div class="symbol symbol-45px symbol-circle">
                                          <picture>
                                              @if ($user->profile_photo)
                                                <img class="symbol symbol-45px symbol-circle" width="40"  src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" alt="{{ $user->profile_photo }}">
                                              @else
                                                <img class="symbol symbol-45px symbol-circle" width="40"  src="{{ asset('uploads/profile_photo/profile_picture.png') }}" alt="{{ $user->profile_photo }}">
                                              @endif
                                          </picture>
                                      </div>
                                      <!--end::Avatar-->
                                      <!--begin::Details-->
                                      <div class="ms-5">
                                          <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">{{ $user->name }}</span>
                                          <div class="fw-bold text-muted">{{ $user->email }}</div>
                                      </div>
                                      <!--end::Details-->
                                  </div>
                                  <!--end::Details-->
                               </div>
                               @endif
                               @endforeach

                                @else
                                    <p class="border-b border-2">All Vendor</p>
                                    @foreach ($allUser->where('role','vendor') as $user)
                                            @if ($user->id != auth()->id())
                                            <div class="d-flex flex-stack py-4 px-1 cursor-pointer user @if ($user->id == $select_id) select_user @endif " wire:click="getUserId({{ $user->id }})" id="{{ $user->name }}">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-45px symbol-circle">
                                                        <picture>
                                                            @if ($user->profile_photo)
                                                            <img class="symbol symbol-45px symbol-circle" width="40"  src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" alt="{{ $user->profile_photo }}">
                                                            @else
                                                            <img class="symbol symbol-45px symbol-circle" width="40"  src="{{ asset('uploads/profile_photo/profile_picture.png') }}" alt="{{ $user->profile_photo }}">
                                                            @endif
                                                        </picture>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5">
                                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">{{ $user->name }}</span>
                                                        <div class="fw-bold text-muted">{{ $user->email }}</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Lat seen-->
                                                <!--end::Lat seen-->
                                            </div>
                                            @endif
                                    @endforeach
                                    <p class="border-b border-2">All Customer</p>
                                    @foreach ($allUser->where('role','customer') as $user)
                                            @if ($user->id != auth()->id())
                                            <div class="d-flex flex-stack py-4 px-1 cursor-pointer user @if ($user->id == $select_id) select_user @endif " wire:click="getUserId({{ $user->id }})" id="{{ $user->name }}">
                                                <!--begin::Details-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Avatar-->
                                                    <div class="symbol symbol-45px symbol-circle">
                                                        <picture>
                                                            @if ($user->profile_photo)
                                                            <img class="symbol symbol-45px symbol-circle" width="40"  src="{{ asset('uploads/profile_photo') }}/{{ $user->profile_photo }}" alt="{{ $user->profile_photo }}">
                                                            @else
                                                            <img class="symbol symbol-45px symbol-circle" width="40"  src="{{ asset('uploads/profile_photo/profile_picture.png') }}" alt="{{ $user->profile_photo }}">
                                                            @endif
                                                        </picture>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Details-->
                                                    <div class="ms-5">
                                                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">{{ $user->name }}</span>
                                                        <div class="fw-bold text-muted">{{ $user->email }}</div>
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Details-->
                                                <!--begin::Lat seen-->
                                                <!--end::Lat seen-->
                                            </div>
                                            @endif
                                    @endforeach
                               @endif

                                <!--end::User-->
                            </div>
                            <!--end::List-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Contacts-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <!--begin::Messenger-->

                    @if (!$select_id)
                        <div class="d-flex justify-content-center align-items-center" style="height:500px;width:100%">
                            <div class="text-center">
                                <h2 class="text-center">Pick up where you left off</h2>
                                <p class="text-center">Select a conversation and chat away.</p>
                            </div>
                        </div>
                    @else
                        <form  wire:submit.prevent="sendMessage">
                            <div class="card" id="kt_chat_messenger">
                                <!--begin::Card header-->
                                <div class="card-header" id="kt_chat_messenger_header">
                                    <!--begin::Title-->
                                    <div class="card-title">
                                        <!--begin::User-->
                                        <div class="d-flex justify-content-center  me-3 gap-3">
                                             <div>
                                                <img src="{{ asset('uploads/profile_photo') }}/{{ $select_photo }}" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                             </div>
                                             <div class="ml-5">
                                                <span class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 mb-2 lh-1" id="userName">{{ $select_name ? $select_name : 'No select' }}</span>
                                                <input type="text"  hidden wire:model="receive_id"  >
                                                <!--begin::Info-->
                                                <div class="mb-0 lh-1">
                                                    <span class="fs-7 fw-bold text-muted">{{ $select_role }}</span>
                                                </div>
                                                <!--end::Info-->
                                             </div>

                                        </div>
                                        <!--end::User-->
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div wire:poll class="card-body" id="kt_chat_messenger_body">
                                    <!--begin::Messages-->
                                    <div class="scroll-y me-n5 pe-5 h-300px " data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="250px" data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px" style="max-height: 250px;">

                                        @foreach ($allMessage as $message)

                                            @if ($message->receiver_id == $select_id && $message->sender_id== auth()->id() ||
                                            $message->sender_id == $select_id && $message->receiver_id== auth()->id() )
                                            @if ($message->sender_id != auth()->id())
                                            <!--begin::Message(in)-->
                                            <div class="d-flex justify-content-start mb-10">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column align-items-start">
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center mb-2">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-35px symbol-circle">
                                                            <img alt="Pic"  src="{{ asset('uploads/profile_photo') }}/{{ userProfilePhoto($message->sender_id) }}">
                                                            <div style="font-size: 10px !important"  class="text-muted fs-7 mb-1"> {{  $message->created_at->diffForHumans() }} </div>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        @if ($message->image)
                                                        <div style="box-shadow: 0 5px 10px 0 #00000046;display:block;width:200px" class=" bg-light py-2 px-2 rounded-lg  font_size_small shadow-black shadow-xl ">
                                                            <img style="display: block;width:200px;height:100px" src="{{ asset('uploads/messanger') }}/{{ $message->image }}" alt="{{ $message->image }}">
                                                        </div>
                                                        @endif
                                                        @if ( $message->message)
                                                           <div style="box-shadow: 0 5px 10px 0 #00000046" class="p-3 rounded mb-5  text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text"> {{  $message->message }}</div>
                                                        @endif

                                                    </div>
                                                    <!--end::User-->
                                                    <!--begin::Text-->
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Message(in)-->
                                        @else
                                            <!--begin::Message(out)-->
                                            <div class="d-flex justify-content-end mb-10">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-column align-items-end">
                                                    <!--begin::User-->

                                                    <!--begin::Text-->

                                                    @if ($message->image)
                                                    <div style="box-shadow: 0 5px 10px 0 #00000046;display:block;width:200px" class=" bg-light py-2 px-2 rounded-lg  font_size_small shadow-black shadow-xl ">
                                                        <img style="display: block;width:200px;height:100px" src="{{ asset('uploads/messanger') }}/{{ $message->image }}" alt="{{ $message->image }}">
                                                    </div>
                                                    @endif
                                                    @if ($message->message)
                                                        <div style="box-shadow: 0 5px 10px 0 #00000046" class="p-3 rounded mb-5  text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">
                                                           {{  $message->message }}
                                                        </div>
                                                    @endif

                                                    <span style="font-size: 10px !important"  class="text-muted fs-7 mb-1"> {{  $message->created_at->diffForHumans() }}</span>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Message(out)-->
                                            @endif
                                            @endif
                                        @endforeach
                                    </div>
                                    <!--end::Messages-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Card footer-->
                                <div class="card-footer pt-4 d-flex" id="kt_chat_messenger_footer">
                                    <!--begin::Input-->
                                    <label  class="msg_img  @if ($img_message)
                                    bg-danger
                                    @else
                                    bg-primary
                                    @endif " for="msg_img"><i class="fas fa-image"></i></label>
                                    <input wire:model="img_message" style="display: none" type="file"  id="msg_img">

                                    <input wire:model="message"  class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message">
                                    <!--end::Input-->
                                     <div class="d-flex flex-stack">
                                        <!--begin::Actions-->

                                        <!--end::Actions-->
                                        <!--begin::Send-->
                                        <button  class="btn btn-primary send_message_btn" data-kt-element="send">Send</button>
                                        <!--end::Send-->
                                    </div>
                                    <!--end::Toolbar-->
                                    <style>
                                        .msg_img{
                                            width: 50px !important;
                                            height: 50px !important;
                                            /* background: #0D6EFD; */
                                            color: #ffffff;
                                            opacity: 1;
                                            font-size: 20px;
                                            text-align: center;
                                            line-height: 50px;
                                            border-radius: 100%;
                                            box-shadow: 0 0 20px 0 #00000046;
                                            cursor: pointer;
                                        }
                                    </style>
                                </div>
                                <!--end::Card footer-->
                            </div>
                    </form>
                    @endif






                    <!--end::Messenger-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
            <!--begin::Modals-->


            <!--end::Modals-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
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
