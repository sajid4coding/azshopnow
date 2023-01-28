@extends('layouts/frontendmaster')

@section('content')
<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area" style="padding:50px 0;background: url(@if($banners->shop_page_banner) {{ asset('uploads/banners') }}/{{ $banners->shop_page_banner }} @else https://flevix.com/wp-content/uploads/2020/07/Red-Blue-Abstract-Background.jpg @endif) no-repeat center; background-size:cover;background-position:center" >
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8 order-2 order-md-0">
                    <div class="slider-add-banner banner-active mb-45">
                        @foreach ($bannerProducts as $bannerProducts)
                                <div class="add-banner">
                                    <div class="add-banner-img">
                                        <a href="{{ route('single.product', ['id'=>$bannerProducts->id,'title'=>Str::slug($bannerProducts->product_title)]) }}"><img src="{{ asset('uploads/product_photo') }}/{{$bannerProducts->thumbnail}}" alt=""></a>
                                    </div>
                                    <div class="add-banner-content">
                                        <span>{{Floor(((100*$bannerProducts->product_price)-(100*$bannerProducts->discount_price))/$bannerProducts->product_price)}}% discount</span>
                                        <h2 class="title">{{Str::limit($bannerProducts->product_title,9)}}</h2>
                                        <p>{{staff($bannerProducts->vendor_id)->shop_name}}</p>
                                        <a href="{{ route('single.product', ['id'=>$bannerProducts->id,'title'=>Str::slug($bannerProducts->product_title)]) }}" class="btn">shop now</a>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="breadcrumb-content">
                        <h2 class="title text-light">New-Arrivals</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">New-Arrivals</li>
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
