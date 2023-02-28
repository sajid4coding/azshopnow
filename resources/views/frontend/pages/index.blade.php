@extends('layouts.frontendmaster')
@section('content')
    <!-- main-area -->
<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area" style="padding:50px 0;background: url(@if($banners->shop_page_banner) {{ asset('uploads/banners') }}/{{ $banners->shop_page_banner }} @else https://flevix.com/wp-content/uploads/2020/07/Red-Blue-Abstract-Background.jpg @endif) no-repeat center; background-size:cover;background-position:center" >
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="breadcrumb-content">
                        <h2 class="title text-light">{{$page->page_title}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-light" href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$page->created_at->format('M d Y')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <section>
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12">
                    <div class="">
                        <h1 class="title text-dark h1 text-start">{{$page->page_title}}</h1>
                        <p class="lead mt-5" style="line-height: 1.7rem; text-align:justify;">
                            @php
                                echo $page->description;
                            @endphp
                        </p>
                        <style>
                            #social-links ul li{
                                display: inline-block;
                            }
                            #social-links ul li a{
                                padding:20px;
                                margin: 2px;
                                font-size: 25px;
                            }
                        </style>
                        <h6 class="mt-5">Social Share: </h6>
                       {!! $shareButtons !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_script')
<script src="{{ asset('js/share.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
@endsection
