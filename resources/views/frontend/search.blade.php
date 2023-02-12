@extends('layouts/frontendmaster')

@section('content')
<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area"  style="padding:50px 0;background: url(@if($banners->shop_page_banner) {{ asset('uploads/banners') }}/{{ $banners->shop_page_banner }} @else https://flevix.com/wp-content/uploads/2020/07/Red-Blue-Abstract-Background.jpg @endif) no-repeat center; background-size:cover;background-position:center">
        <div class="container">
            {{-- <div class="row align-items-center justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8 order-2 order-md-0">
                    <div class="breadcrumb-product text-center">
                        <div class="thumb">
                            <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/br_product_img.png" alt="img"></a>
                            <span>35% OFF</span>
                        </div>
                        <div class="content">
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <h4 class="title"><a href="shop-details.html">Blender Mixer Food</a></h4>
                            <h5 class="price">$37.00</h5>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-9 col-lg-8 col-md-7 mt-5">
                    <div class="breadcrumb-content">
                        <h4 class="title text-light">Search: {{$searchResult}}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item "><a class="text-light" href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Search - {{$searchResult}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
@include('components.frontend.shop_layout')
<style>
    @media (min-width:320px) and (max-width:575px){
        .home_banner_slider{
        height: 326px;
        }
        .home_banner_slider a {
            height: 326px;
        }
        .home_banner_slider a img{
            height: 326px;
        }
       .m-w-50{
        width: 50% !important;
       }
       .product-content .title a {
        font-size: 10px !important;
       }
       .product-content .title a h6{
        font-size: 10px !important;
       }
       .product-content .title span{
        font-size: 10px !important;
       }
       .product-content .rating{
        font-size: 10px;
       }
       .product-content p{
        font-size: 10px;
       }
       .product-content .rating span{
        font-size: 10px;
       }
    }
    @media (min-width:768px) and (max-width:991px){
        .join-olle-wrap h3{
           font-size: 14px !important;
        }
        .join-olle-wrap a{
           font-size: 10px !important;
        }
    }
</style>
@endsection
