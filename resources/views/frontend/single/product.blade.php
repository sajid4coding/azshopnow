@extends('layouts/frontendmaster')

@section('content')

  <!-- main-area -->
        <main>
            <!-- breadcrumb-area -->
            <div class="breadcrumb-area-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{$single_product->product_title}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- shop-details-area -->
            <div class="shop-details-area pt-80 pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <div class="shop-details-img-wrap">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane show active" id="nav-item-one" role="tabpanel" aria-labelledby="nav-item-one-tab">
                                        <div class="shop-details-img">
                                            <img src="{{ asset('uploads/product_photo') }}/{{$single_product->thumbnail}}" alt="img" width="100%">
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-item-two" role="tabpanel" aria-labelledby="nav-item-two-tab">
                                        <div class="shop-details-img">
                                            <img src="{{ asset('frontend_assets') }}/img/product/shop_details02.jpg" alt="img">
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-item-three" role="tabpanel" aria-labelledby="nav-item-three-tab">
                                        <div class="shop-details-img">
                                            <img src="{{ asset('frontend_assets') }}/img/product/shop_details03.jpg" alt="img">
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-item-four" role="tabpanel" aria-labelledby="nav-item-four-tab">
                                        <div class="shop-details-img">
                                            <img src="{{ asset('frontend_assets') }}/img/product/shop_details04.jpg" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-details-nav-wrap">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-item-one-tab" data-bs-toggle="tab" data-bs-target="#nav-item-one"
                                            type="button" role="tab" aria-controls="nav-item-one" aria-selected="true">
                                            <img src="{{ asset('frontend_assets') }}/img/product/shop_nav_img01.jpg" alt="img">
                                        </button>
                                        <button class="nav-link" id="nav-item-two-tab" data-bs-toggle="tab" data-bs-target="#nav-item-two" type="button"
                                            role="tab" aria-controls="nav-item-two" aria-selected="false">
                                            <img src="{{ asset('frontend_assets') }}/img/product/shop_nav_img02.jpg" alt="img">
                                        </button>
                                        <button class="nav-link" id="nav-item-three-tab" data-bs-toggle="tab" data-bs-target="#nav-item-three"
                                            type="button" role="tab" aria-controls="nav-item-three" aria-selected="false">
                                            <img src="{{ asset('frontend_assets') }}/img/product/shop_nav_img03.jpg" alt="img">
                                        </button>
                                        <button class="nav-link" id="nav-item-four-tab" data-bs-toggle="tab" data-bs-target="#nav-item-four"
                                            type="button" role="tab" aria-controls="nav-item-four" aria-selected="false">
                                            <img src="{{ asset('frontend_assets') }}/img/product/shop_nav_img04.jpg" alt="img">
                                        </button>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 col-md-8">
                            <div class="shop-details-content">
                                <span><i class="fa-solid fa-check"></i>In Stock</span>
                                <h2 class="title">{{$single_product->product_title}}</h2>
                                <ul>
                                    {{-- <li data-background="{{ asset('frontend_assets') }}/img/images/coupon_bg01.png">
                                        $29.30 Coupons For You
                                    </li>
                                    <li data-background="{{ asset('frontend_assets') }}/img/images/coupon_bg02.png">
                                        $4.25 off.OLLESHOP7
                                    </li>
                                    <li>
                                        <a href="#">Get Coupons</a>
                                    </li> --}}
                                </ul>

                                <p>{{$single_product->short_description}}</p>
                                {{-- <div class="shop-details-price">
                                    <h2 class="title">${{$single_product->product_price}}</h2>
                                    <h4 class="stock-status">- IN Stock</h4>
                                </div> --}}
                                @livewire('add-to-cart',['productID'=>$single_product->id])
                                <div class="shop-details-Wishlist">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa-regular fa-heart"></i>Add to Wishlist</a>
                                        </li>
                                        {{-- <li><a href="#"><i class="fa-solid fa-chart-column"></i>Compare</a></li> --}}
                                    </ul>
                                </div>
                                <div class="shop-details-bottom">
                                    <ul>
                                        <li class="sd-category">
                                            <span class="title">Categories :</span>
                                            <a href="#!">{{Str::title($single_product->parent_category_slug)}}</a>
                                        </li>
                                        <li class="sd-sku">
                                            <span class="title">SKU :</span>
                                            <a href="shop.html">{{$single_product->sku}}</a>
                                        </li>
                                        <li class="sd-share">
                                            <span class="title">Share Now :</span>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-2 col-lg-12 col-md-4">
                            <div class="recommended-item-wrap">
                                <div class="recommended scroll">
                                    <span>Recommended For You :</span>
                                    <div class="recommended-item mb-25">
                                        <div class="thumb">
                                            <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/recommended_img01.jpg" alt="img"></a>
                                        </div>
                                        <div class="content">
                                            <h5 class="price">$39.08</h5>
                                            <ul>
                                                <li>by <a href="vendor-profile.html">Market Store</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="recommended-item mb-25">
                                        <div class="thumb">
                                            <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/recommended_img02.jpg" alt="img"></a>
                                        </div>
                                        <div class="content">
                                            <h5 class="price">$29.08</h5>
                                            <ul>
                                                <li>by <a href="vendor-profile.html">Olle Store</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="recommended-item mb-25">
                                        <div class="thumb">
                                            <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/recommended_img03.jpg" alt="img"></a>
                                        </div>
                                        <div class="content">
                                            <h5 class="price">$25.08</h5>
                                            <ul>
                                                <li>by <a href="vendor-profile.html">max shop</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="recommended-item mb-25">
                                        <div class="thumb">
                                            <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/recommended_img01.jpg" alt="img"></a>
                                        </div>
                                        <div class="content">
                                            <h5 class="price">$39.08</h5>
                                            <ul>
                                                <li>by <a href="vendor-profile.html">Market Store</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- shop-details-area-end -->

            <!-- best-sell-product-area -->
            <section class="best-sell-product-area pt-85 pb-10">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-60">
                                <h2 class="title">Welcome to Vendor Profile</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="best-sell-nav">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                                            role="tab" aria-controls="all" aria-selected="true">
                                                <i class="flaticon-shipping"></i>
                                                <span>All Categories</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="watch-tab" data-bs-toggle="tab" data-bs-target="#watch" type="button"
                                            role="tab" aria-controls="watch" aria-selected="false">
                                                <i class="flaticon-smartwatch"></i>
                                                <span>smart watch</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="electronics-tab" data-bs-toggle="tab" data-bs-target="#electronics"
                                            type="button" role="tab" aria-controls="electronics" aria-selected="false">
                                                <i class="flaticon-lamp"></i>
                                                <span>Consumer Electronics</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="appliance-tab" data-bs-toggle="tab" data-bs-target="#appliance" type="button"
                                            role="tab" aria-controls="appliance" aria-selected="false">
                                                <i class="flaticon-kitchen-utensils"></i>
                                                <span>home appliance</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="shoes-tab" data-bs-toggle="tab" data-bs-target="#shoes" type="button"
                                            role="tab" aria-controls="shoes" aria-selected="false">
                                                <i class="flaticon-high-heels-1"></i>
                                                <span>Shoes & Accessories</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="sports-tab" data-bs-toggle="tab" data-bs-target="#sports" type="button"
                                            role="tab" aria-controls="sports" aria-selected="false">
                                                <i class="flaticon-sport-equipment"></i>
                                                <span>Sports & Entertainment</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="row mb-20">
                                        <div class="col-xl-12">
                                            <div class="vendor-wrap">
                                                <div class="row">
                                                    <div class="col-xl-5 col-lg-8">
                                                        <div class="vendor-content">
                                                            <div class="content-top mb-20">
                                                                <div class="icon">
                                                                    <i class="fa-solid fa-sliders"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <h2 class="title"><a href="#">Theme Beyond Technology.Ltd</a>
                                                                    </h2>
                                                                    <ul>
                                                                        <li>2 year</li>
                                                                        <li><a href="#">Verified <img src="{{ asset('frontend_assets') }}/img/icon/verified_icon.png"
                                                                                    alt=""></a></li>
                                                                        <li>40k Customer</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="ranking mb-30">
                                                                <ul>
                                                                    <li>No.1 Vendor Rankings</li>
                                                                    <li>Annual Sales $45,000,00</li>
                                                                </ul>
                                                            </div>
                                                            <div class="vendor-services">
                                                                <ul>
                                                                    <li>
                                                                        <h2 class="title">+/- 5 hr</h2>
                                                                        <p>Response Time</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">5,000,00+</h2>
                                                                        <p>Transtctions</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">100%</h2>
                                                                        <p>On-time delivery</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-12">
                                                        <div class="vendor-product-wrap">
                                                            <ul>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product01.png" alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Gloves $9.08</a></h2>
                                                                        <span>15 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product02.png" alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">watch $8.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product03.png" alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Shoes $9.08</a></h2>
                                                                        <span>03 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product04.png" alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Cap $5.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="watch" role="tabpanel" aria-labelledby="watch-tab">
                                    <div class="row mb-20">
                                        <div class="col-xl-12">
                                            <div class="vendor-wrap">
                                                <div class="row">
                                                    <div class="col-xl-5 col-lg-8">
                                                        <div class="vendor-content">
                                                            <div class="content-top mb-20">
                                                                <div class="icon">
                                                                    <i class="fa-solid fa-shield"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <h2 class="title"><a href="#">Fashion Max</a></h2>
                                                                    <ul>
                                                                        <li>1 year</li>
                                                                        <li><a href="#">Verified <img src="{{ asset('frontend_assets') }}/img/icon/verified_icon.png" alt=""></a>
                                                                        </li>
                                                                        <li>13k Customer</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="ranking mb-30">
                                                                <ul>
                                                                    <li>No.1 Vendor Rankings</li>
                                                                    <li>Annual Sales $5,000,00</li>
                                                                </ul>
                                                            </div>
                                                            <div class="vendor-services">
                                                                <ul>
                                                                    <li>
                                                                        <h2 class="title">+/- 5 hr</h2>
                                                                        <p>Response Time</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">200,00+</h2>
                                                                        <p>Transtctions</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">100%</h2>
                                                                        <p>On-time delivery</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-12">
                                                        <div class="vendor-product-wrap">
                                                            <ul>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="blog-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product09.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="blog-details.html">Shoes $9.08</a></h2>
                                                                        <span>15 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="blog-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product10.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="blog-details.html">cap $8.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="blog-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product11.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="blog-details.html">watch $9.08</a></h2>
                                                                        <span>03 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="blog-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product12.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="blog-details.html">watch $5.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="electronics" role="tabpanel" aria-labelledby="electronics-tab">
                                    <div class="row mb-20">
                                        <div class="col-xl-12">
                                            <div class="vendor-wrap">
                                                <div class="row">
                                                    <div class="col-xl-5 col-lg-8">
                                                        <div class="vendor-content">
                                                            <div class="content-top mb-20">
                                                                <div class="icon">
                                                                    <i class="fa-solid fa-shield"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <h2 class="title"><a href="#">Olle Technology.Ltd</a></h2>
                                                                    <ul>
                                                                        <li>1 year</li>
                                                                        <li><a href="#">Verified <img src="{{ asset('frontend_assets') }}/img/icon/verified_icon.png" alt=""></a>
                                                                        </li>
                                                                        <li>13k Customer</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="ranking mb-30">
                                                                <ul>
                                                                    <li>No.1 Vendor Rankings</li>
                                                                    <li>Annual Sales $5,000,00</li>
                                                                </ul>
                                                            </div>
                                                            <div class="vendor-services">
                                                                <ul>
                                                                    <li>
                                                                        <h2 class="title">+/- 5 hr</h2>
                                                                        <p>Response Time</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">200,00+</h2>
                                                                        <p>Transtctions</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">100%</h2>
                                                                        <p>On-time delivery</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-12">
                                                        <div class="vendor-product-wrap">
                                                            <ul>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product05.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Gloves $9.08</a></h2>
                                                                        <span>15 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product06.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">watch $8.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product07.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Shoes $9.08</a></h2>
                                                                        <span>03 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product08.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Cap $5.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="appliance" role="tabpanel" aria-labelledby="appliance-tab">
                                    <div class="row mb-20">
                                        <div class="col-xl-12">
                                            <div class="vendor-wrap">
                                                <div class="row">
                                                    <div class="col-xl-5 col-lg-8">
                                                        <div class="vendor-content">
                                                            <div class="content-top mb-20">
                                                                <div class="icon">
                                                                    <i class="fa-solid fa-sliders"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <h2 class="title"><a href="#">Theme Beyond Technology.Ltd</a>
                                                                    </h2>
                                                                    <ul>
                                                                        <li>2 year</li>
                                                                        <li><a href="#">Verified <img src="{{ asset('frontend_assets') }}/img/icon/verified_icon.png" alt=""></a>
                                                                        </li>
                                                                        <li>40k Customer</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="ranking mb-30">
                                                                <ul>
                                                                    <li>No.1 Vendor Rankings</li>
                                                                    <li>Annual Sales $45,000,00</li>
                                                                </ul>
                                                            </div>
                                                            <div class="vendor-services">
                                                                <ul>
                                                                    <li>
                                                                        <h2 class="title">+/- 5 hr</h2>
                                                                        <p>Response Time</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">5,000,00+</h2>
                                                                        <p>Transtctions</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">100%</h2>
                                                                        <p>On-time delivery</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-12">
                                                        <div class="vendor-product-wrap">
                                                            <ul>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product04.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Gloves $9.08</a></h2>
                                                                        <span>15 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product02.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">watch $8.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product01.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Shoes $9.08</a></h2>
                                                                        <span>03 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product04.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Cap $5.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="shoes" role="tabpanel" aria-labelledby="shoes-tab">
                                    <div class="row mb-20">
                                        <div class="col-xl-12">
                                            <div class="vendor-wrap">
                                                <div class="row">
                                                    <div class="col-xl-5 col-lg-8">
                                                        <div class="vendor-content">
                                                            <div class="content-top mb-20">
                                                                <div class="icon">
                                                                    <i class="fa-solid fa-shield"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <h2 class="title"><a href="#">Olle Technology.Ltd</a></h2>
                                                                    <ul>
                                                                        <li>1 year</li>
                                                                        <li><a href="#">Verified <img src="{{ asset('frontend_assets') }}/img/icon/verified_icon.png" alt=""></a>
                                                                        </li>
                                                                        <li>13k Customer</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="ranking mb-30">
                                                                <ul>
                                                                    <li>No.1 Vendor Rankings</li>
                                                                    <li>Annual Sales $5,000,00</li>
                                                                </ul>
                                                            </div>
                                                            <div class="vendor-services">
                                                                <ul>
                                                                    <li>
                                                                        <h2 class="title">+/- 5 hr</h2>
                                                                        <p>Response Time</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">200,00+</h2>
                                                                        <p>Transtctions</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">100%</h2>
                                                                        <p>On-time delivery</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-12">
                                                        <div class="vendor-product-wrap">
                                                            <ul>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product09.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Gloves $9.08</a></h2>
                                                                        <span>15 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product08.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">watch $8.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product02.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Shoes $9.08</a></h2>
                                                                        <span>03 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product05.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Cap $5.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="sports" role="tabpanel" aria-labelledby="sports-tab">
                                    <div class="row mb-20">
                                        <div class="col-xl-12">
                                            <div class="vendor-wrap">
                                                <div class="row">
                                                    <div class="col-xl-5 col-lg-8">
                                                        <div class="vendor-content">
                                                            <div class="content-top mb-20">
                                                                <div class="icon">
                                                                    <i class="fa-solid fa-shield"></i>
                                                                </div>
                                                                <div class="content">
                                                                    <h2 class="title"><a href="#">Fashion Max</a></h2>
                                                                    <ul>
                                                                        <li>1 year</li>
                                                                        <li><a href="#">Verified <img src="{{ asset('frontend_assets') }}/img/icon/verified_icon.png" alt=""></a>
                                                                        </li>
                                                                        <li>13k Customer</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="ranking mb-30">
                                                                <ul>
                                                                    <li>No.1 Vendor Rankings</li>
                                                                    <li>Annual Sales $5,000,00</li>
                                                                </ul>
                                                            </div>
                                                            <div class="vendor-services">
                                                                <ul>
                                                                    <li>
                                                                        <h2 class="title">+/- 5 hr</h2>
                                                                        <p>Response Time</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">200,00+</h2>
                                                                        <p>Transtctions</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">100%</h2>
                                                                        <p>On-time delivery</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-12">
                                                        <div class="vendor-product-wrap">
                                                            <ul>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="blog-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product11.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="blog-details.html">Shoes $9.08</a></h2>
                                                                        <span>15 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="blog-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product01.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="blog-details.html">cap $8.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="blog-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product11.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="blog-details.html">watch $9.08</a></h2>
                                                                        <span>03 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="blog-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product12.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="blog-details.html">watch $5.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- best-sell-product-area-end -->

            <!-- product-details-area -->
            <section class="product-details-area pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="product-desc-wrap">
                                <div class="product-desc-top">
                                    <div class="product-desc-nav">
                                        <ul class="nav nav-tabs" id="productTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                                    data-bs-target="#overview" type="button" role="tab" aria-controls="overview"
                                                    aria-selected="true">Overview</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="specifications-tab" data-bs-toggle="tab"
                                                    data-bs-target="#specifications" type="button" role="tab" aria-controls="specifications"
                                                    aria-selected="false">costumer reviews
                                                    (0)</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-report">
                                        <a href="contact.html">Report Item</a>
                                    </div>
                                </div>
                                <div class="tab-content" id="productTabContent">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <div class="product-desc-content">
                                            {{-- <p>
                                                {{$single_product->short_description}}
                                            </p> --}}
                                            <p>
                                                {{$single_product->description}}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                                        <div class="product-desc-content">
                                            <div class="product-desc-review">
                                                <div class="review-title mb-20">
                                                    <h4 class="title">Customer Reviews (0)</h4>
                                                </div>
                                                <div class="left-rc">
                                                    <p>No reviews yet</p>
                                                </div>
                                                <div class="right-rc">
                                                    <a href="#">Write a review</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- product-details-area-end -->

            <!-- popular-product-area -->
            <section class="popular-product-area pb-90">
                <div class="container">
                    <div class="row align-items-center mb-35">
                        <div class="col-md-8">
                            <div class="section-title">
                                <h2 class="title">Supplier's popular products</h2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="vendor-profile text-end">
                                <a href="vendor-profile.html">Go Vendor Profile<i class="fa-regular fa-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row popular-product-active">
                        <div class="col-xl-2">
                            <div class="product-item-three">
                                <div class="product-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/popular_product01.jpg" alt="img"></a>
                                </div>
                                <div class="product-content text-center">
                                    <h4 class="title"><a href="shop-details.html">OnePlus 8 Pro Onyx Black</a></h4>
                                    <p>0 orders <span>-35%</span></p>
                                    <h4 class="price">$29.08</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="product-item-three">
                                <div class="product-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/popular_product02.jpg" alt="img"></a>
                                </div>
                                <div class="product-content text-center">
                                    <h4 class="title"><a href="shop-details.html">Stretching Device Back</a></h4>
                                    <p>03 orders <span>-25%</span></p>
                                    <h4 class="price">$19.08</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="product-item-three">
                                <div class="product-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/popular_product03.jpg" alt="img"></a>
                                </div>
                                <div class="product-content text-center">
                                    <h4 class="title"><a href="shop-details.html">Electric Kick Scooter</a></h4>
                                    <p>05 orders <span>-40%</span></p>
                                    <h4 class="price">$45.08</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="product-item-three">
                                <div class="product-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/popular_product04.jpg" alt="img"></a>
                                </div>
                                <div class="product-content text-center">
                                    <h4 class="title"><a href="shop-details.html">Stretching Device Back</a></h4>
                                    <p>08 orders <span>-30%</span></p>
                                    <h4 class="price">$35.08</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="product-item-three">
                                <div class="product-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/popular_product05.jpg" alt="img"></a>
                                </div>
                                <div class="product-content text-center">
                                    <h4 class="title"><a href="shop-details.html">Outdoor Travel 35L Sport</a></h4>
                                    <p>10 orders <span>-20%</span></p>
                                    <h4 class="price">$19.08</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="product-item-three">
                                <div class="product-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/popular_product06.jpg" alt="img"></a>
                                </div>
                                <div class="product-content text-center">
                                    <h4 class="title"><a href="shop-details.html">Electric Kick Scooter</a></h4>
                                    <p>02 orders <span>-35%</span></p>
                                    <h4 class="price">$29.08</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="product-item-three">
                                <div class="product-thumb">
                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/popular_product03.jpg" alt="img"></a>
                                </div>
                                <div class="product-content text-center">
                                    <h4 class="title"><a href="shop-details.html">Electric Kick Scooter</a></h4>
                                    <p>05 orders <span>-40%</span></p>
                                    <h4 class="price">$45.08</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- popular-product-area-end -->

@endsection

