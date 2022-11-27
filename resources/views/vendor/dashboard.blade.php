@extends('layouts.vendor_master')
@section('vendor_body_content')
<div class="col-lg-9 col-md-9">
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="vendor" role="tabpanel" aria-labelledby="vendor-tab">
            <div class="vendor-profile-wrap">
                <div class="text-center">
                    <div>
                        <div class="avatar-post-img mb-3" style="margin:0 auto;">
                            <img src=" @if (auth()->user()->profile_photo)
                            {{ asset('uploads/vendor_profile') }}/{{ auth()->user()->profile_photo }}
                            @else
                            https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png
                            @endif " alt="img">
                        </div>
                   </div>
                    <div class="avatar-post-content">
                        <h4 class="title ">{{ auth()->user()->name }}</h4>
                        <p>{{ auth()->user()->bio }}</p>
                        {{-- <ul class="social">
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        </ul> --}}
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection

