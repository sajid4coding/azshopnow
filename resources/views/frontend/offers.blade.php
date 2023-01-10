@extends('layouts.frontendmaster')
@section('content')
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
@endsection
