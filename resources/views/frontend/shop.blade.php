@extends('layouts/frontendmaster')

@section('content')
<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area" style="padding:50px 0;background: url(@if($banners->shop_page_banner) {{ asset('uploads/banners') }}/{{ $banners->shop_page_banner }} @else https://flevix.com/wp-content/uploads/2020/07/Red-Blue-Abstract-Background.jpg @endif) no-repeat center; background-size:cover;background-position:center" >
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8 order-2 order-md-0">
                    {{-- <div class="breadcrumb-product text-center">
                        @foreach ($bannerProducts->shuffle() as $product)
                            <div class="thumb">
                                <a href="shop-details.html"><img src="{{ asset('uploads/product_photo') }}/{{$product->thumbnail}}" alt="img"></a>
                                @if ($product->discount_price)
                                    <span>-{{Floor(((100*$product->product_price)-(100*$product->discount_price))/$product->product_price)}}%</span>
                                @endif
                            </div>
                            <div class="content">
                                <div class="rating">
                                    @if (review($product->id))
                                        @for ($x = 1; $x <= 5; $x++)
                                            @if ($x <= review($product->id))
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i><!--Empty star-->
                                            @endif
                                        @endfor
                                        <span style="font-size: 10px;">({{ count_review($product->id) }})</span>
                                    @else
                                        <span class="text-danger">No Review Yet</span>
                                    @endif
                                </div>
                                <h4 class="title"><a href="{{route('single.product', ['id'=>$product->id,'title'=>Str::slug($product->product_title)])}}">{{$product->product_title}}</a></h4>
                                @if ($product->discount_price)
                                    <h4>
                                        ${{$product->discount_price}}
                                        <span class="price text-muted">
                                            <del> ${{$product->product_price}}</del>
                                        </span>
                                    </h4>
                                @else
                                    <h4 class="price">${{$product->product_price}}</h4>
                                @endif
                            </div>
                        @endforeach
                    </div> --}}
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
                                        <a href="{{ route('single.product', ['id'=>$bannerProducts->id,'title'=>Str::slug($bannerProducts->product_title)]) }}" class="btn m-p-0">shop now</a>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="breadcrumb-content">
                        <h2 class="title text-light">Shopping with AZ SHOP NOW</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-light" href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
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
    .btn:hover{
        border-color: #FF4800 !important;
    }
    .m-p-0{
        padding: 6px 10px !important;
        background: blue;
       }
    @media (min-width:320px) and (max-width:575px){
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
</style>
@endsection
