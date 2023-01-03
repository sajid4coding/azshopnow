@extends('layouts/frontendmaster')

@section('content')

  <!-- main-area -->
  <main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area-four breadcrumb-bg vendor-profile-breadcrumb" style='background: url(@if (auth()->user()->banner)  {{ asset('uploads/banner_img') }}/{{ auth()->user()->banner }}  @else https://www.cohesity.com/wp-content/new_media/2021/03/demo-days-lp-banner.png @endif) no-repeat center;background-size:cover;''>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="store-product">
                        <div class="store-thumb" style="overflow: hidden">
                            {{-- https://pondokindahmall.co.id/assets/img/default.png --}}
                            @if (auth()->user()->profile_photo)
                               <img  src="{{ asset('uploads/vendor_profile') }}/{{ auth()->user()->profile_photo }}" alt="img">
                            @else
                               <img src="https://pondokindahmall.co.id/assets/img/default.png" alt="img">
                            @endif
                        </div>
                        <div class="store-content">
                            <span class="verified">Verified <i class="fa-solid fa-crown"></i></span>
                            @if (auth()->user()->shop_name)
                            <h2 class="title">  {{ auth()->user()->shop_name }} </h2>
                            <ul>
                                <li class="customer">Owner Name : <span style="color: #FF4800 !important;padding-left:10px;font-size:1.2rem">{{ auth()->user()->name }}</span> </li>
                            </ul>
                            @else
                            <h2 class="title">  {{ auth()->user()->name }} </h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="breadcrumb-list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit  profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

<!-- breadcrumb-area-end -->
    <section class="register_section section_space">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="vr-form-box">
                    <h3 class="title text-center">Profile Settings</h3>
                    <div class="vr-form-box">
                         @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                         @endif
                    <form class="form-prevent-multiple-submits" action="{{ route('change.profile.post') }}" method="POST">
                            @csrf
                        <div class="form-grp">
                            <label for="text">name*</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="text">Email Adress *</label>
                                    <input type="text" id="email" name="email" value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="text">Phone nembur *</label>
                                    <input type="text" id="phone_number"  name="phone_number" value="{{ auth()->user()->phone_number }}">
                                </div>
                            </div>
                        </div>
                        <button class="button-prevent-multiple-submits" type="submit">Save Changes</button>
                    </form>
                </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="vr-form-box">
                    <h3 class="title text-center">Change Password</h3>
                    <div class="vr-form-box">
                          @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                         @endif
                    <form class="form-prevent-multiple-submits" action="{{ route('password.update') }}" method="POST">
                            @csrf
                        <div class="form-grp">
                            <label for="text">Current Password *</label>
                            <input type="text" name="current_password">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="text">New password *</label>
                                    <input type="text" id="password" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="text">Confirm password *</label>
                                    <input type="text" id="re-password"  name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <button class="button-prevent-multiple-submits" type="submit">Save Changes</button>
                    </form>
                </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
