@extends('layouts/frontendmaster')

@section('content')
  <!-- breadcrumb-area -->
            <section class="breadcrumb-area-four breadcrumb-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="breadcrumb-content">
                                <h2 class="title">Verify Your Email</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('customerhome') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Verify Your Email</li>
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

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body ">
                    @if (session('message'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <div class="text-center mt-3">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},

                    </div>
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-center my-3">{{ __('click here to request another') }}</button>.

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
