@extends('layouts/frontendmaster')

@section('content')
    <!-- breadcrumb-area -->
            <section class="breadcrumb-area-four breadcrumb-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="breadcrumb-content">
                                <h2 class="title">become a Customer</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">become a Customer</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="breadcrumb-img text-end">
                                <img src="assets/img/images/breadcrumb_img.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
 <section class="register_section section_space">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="vr-form-box">
                                <h3 class="title text-center">customer register Form</h3>
                              <div class="vr-form-box">
                                         @if ($errors->any())
                                        <div class="alert alert-danger">
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                        </div>
                                            @endif
                                                 @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                            @endif
                                <form action="{{ route('customer.register.post') }}" method="POST">
                                      @csrf
                                    <div class="form-grp">
                                        <label for="name">User Name *</label>
                                        <input type="text" name="name">
                                    </div>
                                    <div class="form-grp">
                                        <label for="email">Email address *</label>
                                        <input type="email" name="email">
                                    </div>
                                    <div class="form-grp">
                                        <label for="phone_number">Phone Number *</label>
                                        <input name="phone_number" type="text">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-grp">
                                                <label for="password">Password *</label>
                                                <input type="password" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grp">
                                                <label for="re-password">Re-Password *</label>
                                                <input type="password" id="re-password"  name="password_confirmation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        {!! NoCaptcha::display() !!}
                                    </div>
                                    <button type="submit">REGISTER</button>
                                </form>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
@endsection

