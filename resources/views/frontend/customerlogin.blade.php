@extends('layouts/frontendmaster')

@section('content')
    <!-- breadcrumb-area -->
            <section class="breadcrumb-area-four" style="padding:50px 0;background: url(@if($banners->customer_login_banner) {{ asset('uploads/banners') }}/{{ $banners->customer_login_banner }} @else https://flevix.com/wp-content/uploads/2020/07/Red-Blue-Abstract-Background.jpg @endif) no-repeat center; background-size:cover;" >
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

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

 <section class="register_section section_space">
                <div class="container">
                    <div class="row justify-content-center my-5">
                        <div class="col-lg-8 ">
                            <div class="vr-form-box">
                                <h3 class="title text-center">customer login Form</h3>
                                @if(session('success'))
                                    <div class="alert alert-success text-center">
                                        <span>{{session('success')}}</span>
                                    </div>
                                @endif
                                <form action="{{ route('customer.login.post') }}" method="POST">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                            @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                     </div>
                                                    @endif
                                                        @if (session('login'))
                                                    <div class="alert alert-danger">
                                                        {{ session('login') }}
                                                    </div>
                                                    @endif
                                            <div class="form-grp ">
                                                <label for="email">Email *</label>
                                                <input type="text" name="email">
                                            </div>
                                            <div class="form-grp">
                                                <label for="password">Password *</label>
                                                <input type="password"  name="password">
                                                <div class="mt-3">
                                                    <p>If you have no account <a href="{{ route('customer.register') }}">Registration</a> here!</p>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <a href="{{ route('password.request') }}" class=" mt-4 text-muted">Forgot your password</a>
                                        </div>
                                            <button class="btn btn-sm button-prevent-multiple-submits" type="submit">Login</button>
                                        </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

@endsection
