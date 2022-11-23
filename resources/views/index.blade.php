@extends('layouts/frontendmaster')

@section('content')

        <!-- main-area -->
        <main>
            <!-- banner-area -->
            <section class="banner-area pt-20">
                <div class="banner-shape"></div>
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-xl-9">
                            <div class="row align-items-center">
                                <div class="col-lg-6 order-0 order-lg-2">
                                    <div class="banner-img">
                                        <img src="{{ asset('frontend_assets') }}/img/banner/banner_img.png" alt="">
                                        <div class="product-tooltip">
                                            <div class="tooltip-btn"></div>
                                            <div class="tooltip-product-item product-tooltip-item left">
                                                <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
                                                <div class="tooltip-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="{{ asset('frontend_assets') }}/img/product/tooltip_img.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="tooltip-product-content">
                                                    <h5 class="title"><a href="shop-details.html">Watch $29.08 <span>-35%</span></a>
                                                    </h5>
                                                    <p class="order">05 orders</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-tooltip">
                                            <div class="tooltip-btn"></div>
                                            <div class="tooltip-product-item product-tooltip-item bottom left">
                                                <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
                                                <div class="tooltip-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="{{ asset('frontend_assets') }}/img/product/tooltip_img02.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="tooltip-product-content">
                                                    <h5 class="title"><a href="shop-details.html">Watch $25.08 <span>-40%</span></a>
                                                    </h5>
                                                    <p class="order">03 orders</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-tooltip">
                                            <div class="tooltip-btn"></div>
                                            <div class="tooltip-product-item product-tooltip-item">
                                                <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
                                                <div class="tooltip-product-thumb">
                                                    <a href="shop-details.html">
                                                        <img src="{{ asset('frontend_assets') }}/img/product/tooltip_img.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="tooltip-product-content">
                                                    <h5 class="title"><a href="shop-details.html">Watch $29.08 <span>-35%</span></a>
                                                    </h5>
                                                    <p class="order">05 orders</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="banner-content">
                                        <h2 class="title">Always <br> Be Your <span>MULTIVENDOR</span></h2>
                                        <h4 class="small-title">Women <span>Fashion</span></h4>
                                        <h5 class="price">Total order : <span>$30.00</span></h5>
                                        <a href="shop.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- banner-area-end -->

            <!-- super-deals-area -->
            <section class="super-deals-product-area pt-30 pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="product-wrap mb-30">
                                <div class="row align-items-center mb-20">
                                    <div class="col-xl-3 col-lg-4 col-md-3">
                                        <div class="section-title">
                                            <h2 class="title">Super <span>Deals</span></h2>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-7">
                                        <div class="super-deals-countdown">
                                            <p>Top products. Incredible prices</p>
                                            <div class="coming-time" data-countdown="2023/4/30"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-2 col-md-2">
                                        <div class="view-more text-end">
                                            <a href="shop.html">View more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row custom justify-content-center">
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product01.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">Watch $29.08<span>-35%</span></a></h4>
                                                <p>0 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product02.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">Backup $29.08<span>-25%</span></a></h4>
                                                <p>05 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product03.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">Fashion $15.08<span>-35%</span></a></h4>
                                                <p>13 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product04.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">Watch $29.08<span>-35%</span></a></h4>
                                                <p>50 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product05.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">Accessories<span>-15%</span></a></h4>
                                                <p>02 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product06.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">Jewellery $29.08<span>-20%</span></a></h4>
                                                <p>20 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-9">
                            <div class="product-wrap top-product mb-20">
                                <div class="row mb-20">
                                    <div class="col-sm-6">
                                        <div class="product-title">
                                            <h4 class="title">Top Selection</h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="view-more text-end">
                                            <a href="shop.html">View more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row custom justify-content-center">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product07.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">launch $29.08<span>-30%</span></a></h4>
                                                <p>40 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product08.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">Watch $29.08<span>-40%</span></a></h4>
                                                <p>20 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product09.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">phone $29.08<span>-10%</span></a></h4>
                                                <p>30 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-9">
                            <div class="product-wrap top-product mb-20">
                                <div class="row mb-20">
                                    <div class="col-sm-6">
                                        <div class="product-title">
                                            <h4 class="title">New arrivals</h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="view-more text-end">
                                            <a href="shop.html">View more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row custom justify-content-center">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product10.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">launch $29.08<span>-30%</span></a></h4>
                                                <p>40 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product11.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">Watch $29.08<span>-40%</span></a></h4>
                                                <p>20 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product-item mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/super_product12.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="title"><a href="shop-details.html">phone $29.08<span>-10%</span></a></h4>
                                                <p>30 orders</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- super-deals-area-end -->

            <!-- choose-product-area -->
            <section class="choose-product-area pt-80 pb-70">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-40">
                                <h2 class="title">Choose Category</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8">
                            <div class="category_slider">
                                    <div class="add-banner">
                                        <div class="add-banner-img mb-20">
                                            <a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/add_banner_img01.jpg" alt="img"></a>
                                        </div>
                                        <div class="add-banner-content">
                                            <span>On the weekend</span>
                                            <h2 class="title">Top Clothing</h2>
                                            <a href="shop.html" class="btn btn-two">shop now</a>
                                        </div>
                                    </div>

                                    <div class="add-banner">
                                        <div class="add-banner-img mb-20">
                                            <a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/add_banner_img01.jpg" alt="img"></a>
                                        </div>
                                        <div class="add-banner-content">
                                            <span>On the weekend</span>
                                            <h2 class="title">Top Clothing</h2>
                                            <a href="shop.html" class="btn btn-two">shop now</a>
                                        </div>
                                    </div>

                                    <div class="add-banner">
                                        <div class="add-banner-img mb-20">
                                            <a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/add_banner_img01.jpg" alt="img"></a>
                                        </div>
                                        <div class="add-banner-content">
                                            <span>On the weekend</span>
                                            <h2 class="title">Top Clothing</h2>
                                            <a href="shop.html" class="btn btn-two">shop now</a>
                                        </div>
                                    </div>
                                    <div class="add-banner">
                                        <div class="add-banner-img mb-20">
                                            <a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/add_banner_img01.jpg" alt="img"></a>
                                        </div>
                                        <div class="add-banner-content">
                                            <span>On the weekend</span>
                                            <h2 class="title">Top Clothing</h2>
                                            <a href="shop.html" class="btn btn-two">shop now</a>
                                        </div>
                                    </div>

                                    <div class="add-banner">
                                        <div class="add-banner-img mb-20">
                                            <a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/add_banner_img01.jpg" alt="img"></a>
                                        </div>
                                        <div class="add-banner-content">
                                            <span>On the weekend</span>
                                            <h2 class="title">Top Clothing</h2>
                                            <a href="shop.html" class="btn btn-two">shop now</a>
                                        </div>
                                    </div>

                                    <div class="add-banner">
                                        <div class="add-banner-img mb-20">
                                            <a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/add_banner_img01.jpg" alt="img"></a>
                                        </div>
                                        <div class="add-banner-content">
                                            <span>On the weekend</span>
                                            <h2 class="title">Top Clothing</h2>
                                            <a href="shop.html" class="btn btn-two">shop now</a>
                                        </div>
                                    </div>
                             </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-8">
                            <div class="join-olle-wrap">
                                <div class="icon">
                                    <a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4g-Qf3MOCxDiyXBYM_qK8UVg0zN5-7r_Fvw&usqp=CAU" alt=""></a>
                                </div>
                                <h3 class="title">Join with AZShop</h3>
                                <div class="join-btn">
                                    <a href="contact.html" class="btn">Join Us</a>
                                    <a href="contact.html" class="btn">Sign In</a>
                                </div>
                                <a href="shop.html"><img src="https://image.shutterstock.com/image-photo/business-development-success-growth-banking-260nw-2017842467.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- choose-product-area-end -->

            <!-- flash-product-area -->
            <section class="flash-product-area pt-90 pb-60">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-md-8 col-sm-10">
                            <div class="slider-add-banner banner-active mb-45">
                                <div class="add-banner">
                                    <div class="add-banner-img">
                                        <a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/add_banner_slider01.jpg" alt=""></a>
                                    </div>
                                    <div class="add-banner-content">
                                        <span>35% discount</span>
                                        <h2 class="title">Smart Phone</h2>
                                        <p>Reference site about</p>
                                        <a href="shop.html" class="btn">shop now</a>
                                    </div>
                                </div>
                                <div class="add-banner">
                                    <div class="add-banner-img">
                                        <a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/add_banner_slider01.jpg" alt=""></a>
                                    </div>
                                    <div class="add-banner-content">
                                        <span>35% discount</span>
                                        <h2 class="title">Smart Phone</h2>
                                        <p>Reference site about</p>
                                        <a href="shop.html" class="btn">shop now</a>
                                    </div>
                                </div>
                                <div class="add-banner">
                                    <div class="add-banner-img">
                                        <a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/add_banner_slider01.jpg" alt=""></a>
                                    </div>
                                    <div class="add-banner-content">
                                        <span>35% discount</span>
                                        <h2 class="title">Smart Phone</h2>
                                        <p>Reference site about</p>
                                        <a href="shop.html" class="btn">shop now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="trending-product">
                                <h3 class="title">Trending Products</h3>
                                <ul>
                                    <li class="trending-product-item mb-30">
                                        <div class="thumb">
                                            <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/trending_product01.png" alt=""></a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="shop-details.html">Morales Ultimate Launch</a></h6>
                                            <h4 class="price">$09.08 <del>$29.08</del></h4>
                                            <div class="content-bottom">
                                                <ul>
                                                    <li>1k+ Orders ~</li>
                                                    <li><i class="fa-solid fa-star"></i>4.7</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="trending-product-item mb-30">
                                        <div class="thumb">
                                            <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/trending_product02.png" alt=""></a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="shop-details.html">Lixada Fishing Breathable</a></h6>
                                            <h4 class="price">$14.08 <span>-35%</span></h4>
                                            <div class="content-bottom">
                                                <ul>
                                                    <li>1.5k+ Orders ~</li>
                                                    <li><i class="fa-solid fa-star"></i>4.8</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="trending-product-item mb-30">
                                        <div class="thumb">
                                            <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/trending_product03.png" alt=""></a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="shop-details.html">Morales Ultimate Launch</a></h6>
                                            <h4 class="price">$18.08 <span>-25%</span></h4>
                                            <div class="content-bottom">
                                                <ul>
                                                    <li>2k+ Orders ~</li>
                                                    <li><i class="fa-solid fa-star"></i>4.5</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="trending-product-item mb-30">
                                        <div class="thumb">
                                            <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/trending_product04.png" alt=""></a>
                                        </div>
                                        <div class="content">
                                            <h6 class="title"><a href="shop-details.html">Winter Gloves Mens</a></h6>
                                            <h4 class="price">$19.08 <span>-20%</span></h4>
                                            <div class="content-bottom">
                                                <ul>
                                                    <li>3k+ Orders ~</li>
                                                    <li><i class="fa-solid fa-star"></i>4.9</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-md-12">
                            <div class="add-banner-thumb mb-55">
                                <a href="#"><img src="{{ asset('frontend_assets') }}/img/images/add_banner_img02.jpg" alt=""></a>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="section-title title-style-two mb-30">
                                        <h4 class="title">Flash Sale Today!</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="product-menu-nav">
                                        <button class="active" data-filter="*">Flash</button>
                                        <button class="" data-filter=".cat-one">Popular</button>
                                        <button class="" data-filter=".cat-two">Top Rate</button>
                                    </div>
                                </div>
                            </div>
                            <div class="flash-product-item-wrap">
                                <div class="row flash-isotope-active">
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-item grid-sizer cat-two">
                                        <div class="product-item-two mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/flash_product01.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title"><a href="shop-details.html">Morales Ultimate Launch</a></h6>
                                                <h4 class="price">$29.08 <span>-35%</span></h4>
                                                <div class="content-bottom">
                                                    <ul>
                                                        <li>1k+ Orders ~</li>
                                                        <li><i class="fa-solid fa-star"></i>4.9</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-item grid-sizer cat-two cat-one">
                                        <div class="product-item-two mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/flash_product02.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title"><a href="shop-details.html">Lixada Fishing Breathable</a></h6>
                                                <h4 class="price">$25.08 <span>-34%</span></h4>
                                                <div class="content-bottom">
                                                    <ul>
                                                        <li>1.5k+ Orders ~</li>
                                                        <li><i class="fa-solid fa-star"></i>4.2</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-item grid-sizer cat-one">
                                        <div class="product-item-two mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/flash_product03.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title"><a href="shop-details.html">Winter Gloves Mens</a></h6>
                                                <h4 class="price">$29.08 <span>-20%</span></h4>
                                                <div class="content-bottom">
                                                    <ul>
                                                        <li>2k+ Orders ~</li>
                                                        <li><i class="fa-solid fa-star"></i>4.8</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-item grid-sizer cat-one cat-two">
                                        <div class="product-item-two mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/flash_product04.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title"><a href="shop-details.html">Fashion High scalding</a></h6>
                                                <h4 class="price">$28.08 <span>-40%</span></h4>
                                                <div class="content-bottom">
                                                    <ul>
                                                        <li>2.5k+ Orders ~</li>
                                                        <li><i class="fa-solid fa-star"></i>4.7</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-item grid-sizer cat-two cat-one">
                                        <div class="product-item-two mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/flash_product05.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title"><a href="shop-details.html">Morales Ultimate Launch</a></h6>
                                                <h4 class="price">$29.08 <span>-35%</span></h4>
                                                <div class="content-bottom">
                                                    <ul>
                                                        <li>1.5k+ Orders ~</li>
                                                        <li><i class="fa-solid fa-star"></i>4.4</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-item grid-sizer cat-two">
                                        <div class="product-item-two mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/flash_product06.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title"><a href="shop-details.html">Lixada Fishing Breathable</a></h6>
                                                <h4 class="price">$27.08 <span>-50%</span></h4>
                                                <div class="content-bottom">
                                                    <ul>
                                                        <li>1.5k+ Orders ~</li>
                                                        <li><i class="fa-solid fa-star"></i>4.3</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-item grid-sizer cat-one">
                                        <div class="product-item-two mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/flash_product07.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title"><a href="shop-details.html">Elastic Summer Newborn</a></h6>
                                                <h4 class="price">$9.08 <span>-30%</span></h4>
                                                <div class="content-bottom">
                                                    <ul>
                                                        <li>5.5k+ Orders ~</li>
                                                        <li><i class="fa-solid fa-star"></i>4.5</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-item grid-sizer cat-two">
                                        <div class="product-item-two mb-30">
                                            <div class="product-thumb">
                                                <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/flash_product08.jpg" alt=""></a>
                                            </div>
                                            <div class="product-content">
                                                <h6 class="title"><a href="shop-details.html">Fashion High scalding</a></h6>
                                                <h4 class="price">$29.08 <span>-30%</span></h4>
                                                <div class="content-bottom">
                                                    <ul>
                                                        <li>3.3k+ Orders ~</li>
                                                        <li><i class="fa-solid fa-star"></i>4.5</li>
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
            </section>
            <!-- flash-product-area-end -->

            <!-- best-sell-product-area -->
            <section class="best-sell-product-area pt-80 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-60">
                                <h2 class="title">Find Best Seller Vendor</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="best-sell-nav">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                                            type="button" role="tab" aria-controls="all" aria-selected="true">
                                                <i class="flaticon-shipping"></i>
                                                <span>All Categories</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="watch-tab" data-bs-toggle="tab" data-bs-target="#watch"
                                            type="button" role="tab" aria-controls="watch" aria-selected="false">
                                                <i class="flaticon-smartwatch"></i>
                                                <span>smart watch</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="electronics-tab" data-bs-toggle="tab"
                                            data-bs-target="#electronics" type="button" role="tab" aria-controls="electronics"
                                            aria-selected="false">
                                                <i class="flaticon-lamp"></i>
                                                <span>Consumer Electronics</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="appliance-tab" data-bs-toggle="tab" data-bs-target="#appliance"
                                            type="button" role="tab" aria-controls="appliance" aria-selected="false">
                                                <i class="flaticon-kitchen-utensils"></i>
                                                <span>home appliance</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="shoes-tab" data-bs-toggle="tab" data-bs-target="#shoes"
                                            type="button" role="tab" aria-controls="shoes" aria-selected="false">
                                                <i class="flaticon-high-heels-1"></i>
                                                <span>Shoes & Accessories</span>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="sports-tab" data-bs-toggle="tab" data-bs-target="#sports"
                                            type="button" role="tab" aria-controls="sports" aria-selected="false">
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
                                                                        <li><a href="#">Verified <img
                                                                                    src="{{ asset('frontend_assets') }}/img/icon/verified_icon.png"
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
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product01.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Gloves $9.08</a></h2>
                                                                        <span>15 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product02.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">watch $8.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product03.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Shoes $9.08</a></h2>
                                                                        <span>03 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product04.png"
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
                                    <div class="row">
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
                                                                        <li><a href="#">Verified <img
                                                                                    src="{{ asset('frontend_assets') }}/img/icon/verified_icon.png"
                                                                                    alt=""></a>
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
                                                                        <a href="shop-details.html"><img
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product05.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Gloves $9.08</a></h2>
                                                                        <span>15 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product06.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">watch $8.08</a></h2>
                                                                        <span>15k+ (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product07.png"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="content">
                                                                        <h2 class="title"><a href="shop-details.html">Shoes $9.08</a></h2>
                                                                        <span>03 (Sale)</span>
                                                                    </div>
                                                                </li>
                                                                <li class="vendor-product">
                                                                    <div class="thumb">
                                                                        <a href="shop-details.html"><img
                                                                                src="{{ asset('frontend_assets') }}/img/product/vendor_product08.png"
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
                                    <div class="row">
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
                                    <div class="row">
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
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product01.png"
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
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product03.png"
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
                                    <div class="row">
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
                                    <div class="row">
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
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product01.png"
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
                                                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vendor_product03.png"
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
                                    <div class="row">
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- best-sell-product-area-end -->

            <!-- features-area -->
            <section class="features-area pt-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-10">
                            <div class="features-item mb-30">
                                <div class="features-thumb">
                                    <img src="{{ asset('frontend_assets') }}/img/features/features_img01.jpg" alt="">
                                </div>
                                <div class="features-content">
                                    <span>35% discount</span>
                                    <h2 class="title"><a href="shop.html">Smart home mixer</a></h2>
                                    <p>Giving information on origins random Lipsum generator.</p>
                                    <a href="shop.html" class="btn">shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-10">
                            <div class="features-item mb-30">
                                <div class="features-thumb">
                                    <img src="{{ asset('frontend_assets') }}/img/features/features_img02.jpg" alt="">
                                </div>
                                <div class="features-content white-content">
                                    <span>35% discount</span>
                                    <h2 class="title"><a href="shop.html">Smart home mixer</a></h2>
                                    <p>Giving information on origins random Lipsum generator.</p>
                                    <a href="shop.html" class="btn">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- features-area-end -->

            <!-- blog-area -->
            <section class="blog-area pt-55 pb-60">
                <div class="container">
                    <div class="row mb-40">
                        <div class="col-lg-6 col-md-6">
                            <div class="section-title">
                                <h2 class="title">Most Popular Blog</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="view-btn text-end">
                                <a href="blog.html">View All Post<i class="fa-solid fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-9">
                            <div class="blog-item mb-30">
                                <div class="blog-thumb">
                                    <a href="blog-details.html"><img src="{{ asset('frontend_assets') }}/img/blog/blog_img01.jpg" alt=""></a>
                                </div>
                                <div class="blog-content">
                                    <div class="comment">
                                        <a href="#">
                                            <i class="fa-regular fa-comment"></i>
                                            <span>18</span>
                                        </a>
                                    </div>
                                    <a href="#" class="tag">ecommerce</a>
                                    <h4 class="title"><a href="blog-details.html">The New Sony Solo the Cinematic Dream Brings</a></h4>
                                    <p>Lorem Ipsum is simply dumy text the printing and industry orem Ipsum been industry's standard
                                        dummy.</p>
                                    <div class="blog-meta">
                                        <ul>
                                            <li>JOHN SMITH .</li>
                                            <li><a href="blog-details.html">read more</a></li>
                                            <li>. february 10,2022</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-9">
                            <div class="blog-item mb-30">
                                <div class="blog-thumb">
                                    <a href="blog-details.html"><img src="{{ asset('frontend_assets') }}/img/blog/blog_img02.jpg" alt=""></a>
                                </div>
                                <div class="blog-content">
                                    <div class="comment">
                                        <a href="#">
                                            <i class="fa-regular fa-comment"></i>
                                            <span>09</span>
                                        </a>
                                    </div>
                                    <a href="#" class="tag">together</a>
                                    <h4 class="title"><a href="blog-details.html">Closeup of woman hands buying online with credit card</a></h4>
                                    <p>Lorem Ipsum is simply dumy text the printing and industry orem Ipsum been industry's standard
                                        dummy.</p>
                                    <div class="blog-meta">
                                        <ul>
                                            <li>JOHN SMITH .</li>
                                            <li><a href="blog-details.html">read more</a></li>
                                            <li>. february 10,2022</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-9">
                            <div class="blog-item mb-30">
                                <div class="blog-thumb">
                                    <a href="blog-details.html"><img src="{{ asset('frontend_assets') }}/img/blog/blog_img03.jpg" alt=""></a>
                                </div>
                                <div class="blog-content">
                                    <div class="comment">
                                        <a href="#">
                                            <i class="fa-regular fa-comment"></i>
                                            <span>03</span>
                                        </a>
                                    </div>
                                    <a href="#" class="tag">spending</a>
                                    <h4 class="title"><a href="blog-details.html">Joyful father and son having fun spending tim</a></h4>
                                    <p>Lorem Ipsum is simply dumy text the printing and industry orem Ipsum been industry's standard
                                        dummy.</p>
                                    <div class="blog-meta">
                                        <ul>
                                            <li>JOHN SMITH .</li>
                                            <li><a href="blog-details.html">read more</a></li>
                                            <li>. february 10,2022</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- blog-area-end -->


@endsection
