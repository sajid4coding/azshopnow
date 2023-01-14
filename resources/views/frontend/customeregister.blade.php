@extends('layouts/frontendmaster')

@section('content')
    <!-- breadcrumb-area -->
            <section class="breadcrumb-area-four"  style="padding:50px 0;background: url(@if($banners->customer_login_banner) {{ asset('uploads/banners') }}/{{ $banners->customer_login_banner }} @else https://flevix.com/wp-content/uploads/2020/07/Red-Blue-Abstract-Background.jpg @endif) no-repeat bottom; background-size:cover;background-origin: border-box" >
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="breadcrumb-content">
                                <h2 class="title">become a Customer</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('customerhome') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">become a Customer</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="breadcrumb-img text-end">

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
                                <form class=" form-prevent-multiple-submits" action="{{ route('customer.register.post') }}" method="POST">
                                      @csrf
                                    <div class="form-grp">
                                        <label for="name">User Name *</label>
                                        <input type="text" name="name">
                                         @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                    </div>
                                    <div class="form-grp">
                                        <label for="email">Email address *</label>
                                        <input type="email" name="email">
                                         @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                    </div>
                                    <div class="form-grp">
                                        <label for="phone_number">Phone Number *</label>
                                        <input name="phone_number" type="text">
                                         @error('phone_number')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-grp">
                                                <label for="password">Password *</label>
                                                <input type="password" id="password" name="password">
                                                 @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-grp">
                                                <label for="re-password">Re-Password *</label>
                                                <input type="password" id="re-password"  name="password_confirmation">
                                                 @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                            <p>If you have already account <a href="{{ route('customer.login') }}">LOGIN</a> here!</p>
                                    </div>
                                    <div class="">
                                        {!! NoCaptcha::display() !!}
                                    </div>
                                    <button class=" button-prevent-multiple-submits" type="submit">REGISTER</button>
                                </form>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
@endsection

