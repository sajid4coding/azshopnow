@extends('layouts.frontendmaster')
@section('header_css')
<style>
    .coupon-btn:hover:after{
        left: -45px !important;
    }
    .coupon-btn .get-code {
        top: -10px;
    }
</style>
@endsection
@section('content')

@if (coupons() == 0)
    <!-- empty_coupon_web_page_section - start
    ================================================== -->
    <section class="empty_cart_section section_space">
        <div class="container my-5">
            <div class="empty_cart_content text-center">
                <span class="cart_icon display-4 text-primary">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                <h3 class="text-primary">No coupon available</h3>
                <a class="btn btn_secondary text-dark" href="{{ route('shop.page') }}"><i class="fa fa-chevron-left"></i> Continue shopping </a>
            </div>
        </div>
    </section>
    <!-- empty_coupon_web_page_section - end
    ================================================== -->
@else
    <!-- coupon-product-area -->
    <section class="coupon-product-area pt-90 pb-60">
        <div class="container">
            <div class="row " >
                <div class="col-lg-12 ">
                    @foreach ($coupons as $coupon)
                            <div class="coupon-product-item-wrap mb-30  @if ($loop->iteration % 2 == 0)bg-warning @else bg-light @endif">
                                <div class="row align-items-center ">
                                    <div class="col-lg-8">
                                        <div class="coupon-product-item">
                                            <div class="coupon-product-thumb">
                                                <img src="{{asset('uploads/vendor_profile')}}/{{$coupon->relationwithuser->profile_photo}}" alt="img">
                                                <h6 class="text-center">{{$coupon->relationwithuser->shop_name}}</h6>
                                            </div>
                                            <div class="coupon-product-content mt-25">
                                                <div class="content-top">
                                                    <div class="rating">
                                                        @for ($x = 1; $x <= 5; $x++)
                                                            @if ($x <= floor(reviewForvendor($coupon->vendor_id)))
                                                                <i class="fas fa-star"></i>
                                                            @else
                                                                <i class="far fa-star"></i><!--Empty star-->
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <span> Ratings</span>
                                                </div>
                                                {{-- <h3 class="title">Cap Caps New Cotton Baseball Cap With Embroidered</h3> --}}
                                                <p>{{$coupon->discount_message}}</p>

                                                    <h6><span class="text-muted">Minimun Purchase price:</span> ${{$coupon->minimum_price}}</h6>
                                                @if ($coupon->discount_type=='percentage')
                                                    <h4 class="price">{{$coupon->coupon_amount}}% <span class="text-muted">Discount</span></h4>
                                                @else
                                                <h4 class="price"><span class="text-muted">Discount</span>: ${{$coupon->coupon_amount}} </h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="coupon-code text-end mt-70">
                                            <a href="{{route('vendor.product',['id'=>$coupon->relationwithuser->id ,'shopname'=>Str::slug($coupon->relationwithuser->shop_name)])}}" class="coupon-btn">
                                                <span class="get-code">Get code</span>
                                                <span class="hcode">{{$coupon->coupon_code}}</span>
                                            </a>
                                            <p>Expires {{$coupon->expire_date}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    {{-- <div class="coupon-product-item-wrap style-two mb-30">
                        <div class="row align-items-center">
                            <div class="col-lg-9">
                                <div class="coupon-product-item">
                                    <div class="coupon-product-thumb">
                                        <img src="{{asset('frontend_assets')}}/img/product/coupon_product02.jpg" alt="img">
                                    </div>
                                    <div class="coupon-product-content mt-25">
                                        <div class="content-top">
                                            <div class="rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <span>0 Ratings</span>
                                        </div>
                                        <h3 class="title">Watch Sleep Oximeter SMART WATCH Sleep</h3>
                                        <p>Armcha In publishing and graphic design, Lorem ipsum is a placeholder text commonly used
                                            demotrate the visual form of a document</p>
                                        <h4 class="price">$5.35 - $19.35</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="coupon-code text-end mt-70">
                                    <a href="#" class="coupon-btn">
                                        <span class="get-code">Get code</span>
                                        <span class="hcode">88JF</span>
                                    </a>
                                    <p>Expires 2022. 03. 31</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- coupon-product-area-end -->
@endif
<style>
       @media (min-width:320px) and (max-width:575px){
            .empty_cart_content{
                margin: 0 auto !important;
            }
           .empty_cart_content h3{
             font-size: 12px !important;
           }
           .empty_cart_content a{
             font-size: 12px !important;
             padding: 5px 6px;
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
