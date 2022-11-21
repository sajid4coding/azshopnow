@extends('layouts/frontendmaster')

@section('content')

    <!-- breadcrumb-area -->
            <section class="breadcrumb-area-four breadcrumb-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="breadcrumb-content">
                                <h2 class="title">Edit your Password</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('customerhome') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Your password</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="breadcrumb-img text-end">
                                <img src="{{ asset('frontend_assets') }}/img/images/breadcrumb_img.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
                    <form action="{{ route('change.profile.post') }}" method="POST">
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
                        <button type="submit">Save Changes</button>
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
                    <form action="{{ route('password.update') }}" method="POST">
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
                        <button type="submit">Save Changes</button>
                    </form>
                </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
