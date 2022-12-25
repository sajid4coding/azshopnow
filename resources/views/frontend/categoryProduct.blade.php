@extends('layouts.frontendmaster')
@section('content')
   <!-- main-area -->
<main>
    <style>

        .Shop_BG{
            background: url( https://image.shutterstock.com/image-photo/business-development-success-growth-banking-260nw-2017842467.jpg);
            repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg Shop_BG" >
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8 order-2 order-md-0">
                    <div class="breadcrumb-product text-center">
                        <div class="thumb">
                            @if ($categoryName->thumbnail)
                                <img src="{{ asset('uploads/category_photo') }}/{{$categoryName->thumbnail}}" alt="img">
                            @endif
                        </div>
                        <div class="content">
                            {{-- <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div> --}}
                            <h4 class="title">
                                @if ($categoryName->category_name)
                                    {{$categoryName->category_name}}
                                @endif
                            </h4>
                            {{-- <h5 class="price">$37.00</h5> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="breadcrumb-content">
                        @if ($categoryName->description)
                            <p class="text-light">{{$categoryName->description}}</p>
                        @endif
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$categoryName->category_name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
@include('components.frontend.shop_layout')
@endsection
