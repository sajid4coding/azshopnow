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
                                        <a href="{{route('shop.page')}}" class="btn">Shop Now</a>
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
                                            {{-- <a href="shop.html">View more</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row popular-product-active">
                                        @foreach ($superDealspProducts as $Products)
                                            <div class="col-xl-2">
                                                <div class="product-item-three">
                                                    <div class="product-thumb">
                                                        <a href="{{route('single.product',['id'=>$Products->id,'title'=>Str::slug($Products->product_title)])}}"><img src="{{ asset('uploads/product_photo') }}/{{$Products->thumbnail}}" alt="img"></a>
                                                    </div>
                                                    {{-- <div class="product-content text-center">
                                                        <h4 class="title"><a href="{{route('single.product',['id'=>$Products->id,'title'=>Str::slug($Products->product_title)])}}">{{Str::limit($Products->product_title,10)}}</a></h4>
                                                        <p>{{orderCount($Products->id)}} orders @if($Products->discount_price) <span>-{{Floor(((100*$Products->product_price)-(100*$Products->discount_price))/$Products->product_price)}}%</span> @endif</p>
                                                        <h4 class="price">$ @if ($Products->discount_price) {{ $Products->discount_price }} @else {{ $Products->product_price }} @endif </h4>
                                                    </div> --}}
                                                    <div class="product-content">
                                                        <h4 class="title"><a href="{{route('single.product', ['id'=>$Products->id,'title'=>Str::slug($Products->product_title)])}}">{{Str::limit($Products->product_title,7)}} @if ($Products->discount_price)
                                                            <h6 style="display: inline-block; float:right">
                                                                ${{$Products->discount_price}}
                                                                <del class="text-muted"> ${{$Products->product_price}}</del>
                                                                <span>-{{Floor(((100*$Products->product_price)-(100*$Products->discount_price))/$Products->product_price)}}%</span>
                                                            </h6>
                                                        @else
                                                            <h6 style="display: inline-block; float:right" class="price">${{$Products->product_price}}</h6>
                                                        @endif</a></h4>
                                                        <P>{{orderCount($Products->id)}} Orders</P>
                                                        <div class="rating text-warning">
                                                            @if (review($Products->id))
                                                                @for ($x = 1; $x <= 5; $x++)
                                                                    @if ($x <= review($Products->id))
                                                                        <i class="fas fa-star"></i>
                                                                    @else
                                                                        <i class="far fa-star"></i><!--Empty star-->
                                                                    @endif
                                                                @endfor
                                                                <span style="font-size: 10px;">({{ count_review($Products->id) }})</span>
                                                            @else
                                                                <span class="text-danger">No Review Yet</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($topReviews->count() >=3)
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
                                                <a href="{{route('top.selection')}}">View more</a>
                                            </div>
                                        </div>
                                        {{-- {{$products}} --}}
                                    </div>
                                    <div class="row custom justify-content-center">
                                        @foreach ($topReviews as $product)
                                                {{-- @if (floor(review($product->relationwithproduct->id)) ==5) --}}
                                                    <div class="col-md-4 col-sm-6">
                                                        <div class="product-item mb-30">
                                                            <div class="product-thumb">
                                                                <a href="{{route('single.product',['id'=>$product->relationwithproduct->id,'title'=>Str::slug($product->relationwithproduct->product_title)])}}"><img src="{{ asset('uploads/product_photo') }}/{{$product->relationwithproduct->thumbnail}}" alt=""></a>
                                                            </div>

                                                            <div class="product-content">
                                                                <h4 class="title"><a href="{{route('single.product', ['id'=>$product->relationwithproduct->id,'title'=>Str::slug($product->relationwithproduct->product_title)])}}">{{Str::limit($product->relationwithproduct->product_title,7)}} @if ($product->relationwithproduct->discount_price)
                                                                    <h6 style="display: inline-block; float:right">
                                                                        ${{$product->relationwithproduct->discount_price}}
                                                                        <del class="text-muted"> ${{$product->relationwithproduct->product_price}}</del>
                                                                        <span>-{{Floor(((100*$product->relationwithproduct->product_price)-(100*$product->relationwithproduct->discount_price))/$product->relationwithproduct->product_price)}}%</span>
                                                                    </h6>
                                                                @else
                                                                    <h6 style="display: inline-block; float:right" class="price">${{$product->relationwithproduct->product_price}}</h6>
                                                                @endif</a></h4>
                                                                <P>{{orderCount($product->relationwithproduct->id)}} Orders</P>
                                                                <div class="rating text-warning">
                                                                    @if (review($product->relationwithproduct->id))
                                                                        @for ($x = 1; $x <= 5; $x++)
                                                                            @if ($x <= review($product->relationwithproduct->id))
                                                                                <i class="fas fa-star"></i>
                                                                            @else
                                                                                <i class="far fa-star"></i><!--Empty star-->
                                                                            @endif
                                                                        @endfor
                                                                        <span style="font-size: 10px;">({{ count_review($product->relationwithproduct->id) }})</span>
                                                                    @else
                                                                        <span class="text-danger">No Review Yet</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                {{-- @endif --}}
                                        @endforeach
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
                                                <a href="{{route('new.arrivals')}}">View more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row custom justify-content-center">
                                        @foreach ($products as $product)
                                            <div class="col-md-4 col-sm-6">
                                                <div class="product-item mb-30">
                                                    <div class="product-thumb">
                                                        <a href="{{route('single.product', ['id'=>$product->id,'title'=>Str::slug($product->product_title)])}}"><img src="{{asset('uploads/product_photo')}}/{{$product->thumbnail}}" alt=""></a>
                                                    </div>
                                                    <div class="product-content">
                                                        <h4 class="title"><a href="{{route('single.product', ['id'=>$product->id,'title'=>Str::slug($product->product_title)])}}">{{Str::limit($product->product_title,7)}} @if ($product->discount_price)
                                                            <h6 style="display: inline-block; float:right">
                                                                ${{$product->discount_price}}
                                                                <del class="text-muted"> ${{$product->product_price}}</del>
                                                                <span>-{{Floor(((100*$product->product_price)-(100*$product->discount_price))/$product->product_price)}}%</span>
                                                            </h6>
                                                        @else
                                                            <h6 style="display: inline-block; float:right" class="price">${{$product->product_price}}</h6>
                                                        @endif</a></h4>
                                                        <P>{{orderCount($product->id)}} Orders</P>
                                                        <div class="rating text-warning">
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
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class="col-md-4 col-sm-6">
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
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row justify-content-center">
                            <div class="col-xl-12 col-lg-9">
                                <div class="product-wrap top-product mb-20">
                                    <div class="row mb-20">
                                        <div class="col-sm-6">
                                            <div class="product-title">
                                                <h4 class="title">New arrivals</h4>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="view-more text-end">
                                                <a href="{{route('new.arrivals')}}">View more</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row custom justify-content-center">
                                        @foreach ($EmptyReviewsproducts as $product)
                                            <div class="col-md-2 col-sm-2">
                                                <div class="product-item mb-30">
                                                    <div class="product-thumb">
                                                        <a href="{{route('single.product', ['id'=>$product->id,'title'=>Str::slug($product->product_title)])}}"><img src="{{asset('uploads/product_photo')}}/{{$product->thumbnail}}" alt=""></a>
                                                    </div>
                                                    <div class="product-content">
                                                        <h4 class="title"><a href="{{route('single.product', ['id'=>$product->id,'title'=>Str::slug($product->product_title)])}}">{{Str::limit($product->product_title,7)}} @if ($product->discount_price)
                                                            <h6 style="display: inline-block; float:right">
                                                                ${{$product->discount_price}}
                                                                <del class="text-muted"> ${{$product->product_price}}</del>
                                                                <span>-{{Floor(((100*$product->product_price)-(100*$product->discount_price))/$product->product_price)}}%</span>
                                                            </h6>
                                                        @else
                                                            <h6 style="display: inline-block; float:right" class="price">${{$product->product_price}}</h6>
                                                        @endif</a></h4>
                                                        <P>{{orderCount($product->id)}} Orders</P>
                                                        <div class="rating text-warning">
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
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class="col-md-4 col-sm-6">
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
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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

                    {{-- Categories Section Start --}}

                    <div class="row justify-content-center">
                        @if ($auth_categories)
                            @auth
                                <div class="col-xl-12">
                                    <div class="row justify-content-center">
                                        @foreach ($auth_categories as $category)
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-8">
                                                <div class="add-banner">
                                                    <div class="add-banner-img mb-10">
                                                        <style>
                                                            .add-banner-img{
                                                                display: flex !important;
                                                                justify-content: center !important;
                                                                align-items: center !important;
                                                            }
                                                        </style>
                                                        <a href="{{route('category.product',$category->slug)}}"><img width="150" src="{{ asset('uploads') }}/category_photo/{{ $category->thumbnail }}" alt="img"></a>
                                                    </div>
                                                    <div class="add-banner-content">
                                                    </div>
                                                </div>
                                                <h6 class="text-center">{{ $category->category_name }}</h6>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endauth
                        @endif
                        @if ($categories)
                            @guest
                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8">
                                    <div class="row justify-content-center">
                                        @foreach ($categories as $category)
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-8">
                                                <div class="add-banner">
                                                    <div class="add-banner-img mb-20">
                                                        <a href="shop.html"><img src="{{ asset('uploads') }}/category_photo/{{ $category->thumbnail }}" alt="img"></a>
                                                    </div>
                                                    <div class="add-banner-content">
                                                    </div>
                                                </div>
                                                <h6 class="text-center">{{ $category->category_name }}</h6>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endguest
                            @guest
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-8">
                                    <div class="join-olle-wrap">
                                        <div class="icon">
                                            <a href="{{ route('vendor.login') }}"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4g-Qf3MOCxDiyXBYM_qK8UVg0zN5-7r_Fvw&usqp=CAU" alt=""></a>
                                        </div>
                                        <h3 class="title">Business with AZShop</h3>
                                        <div class="join-btn">
                                            <a href="{{ route('become.vendor') }}" class="btn">Join Us</a>
                                            <a href="{{ route('vendor.login') }}" class="btn">Sign In</a>
                                        </div>
                                        <a href="{{ route('home') }}"><img src="https://image.shutterstock.com/image-photo/business-development-success-growth-banking-260nw-2017842467.jpg" alt=""></a>
                                    </div>
                                </div>
                            @endguest
                        @endif
                    </div>

                    {{-- Categories Section End --}}

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
                                    @foreach ($trendingProducts as $trendingProducts)
                                        <li class="trending-product-item mb-30">
                                            <div class="thumb">
                                                <a href="{{ route('single.product', ['id'=>$trendingProducts->id,'title'=>Str::slug($trendingProducts->product_title)]) }}"><img src="{{ asset('uploads/product_photo') }}/{{$trendingProducts->thumbnail}}" alt=""></a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="{{ route('single.product', ['id'=>$trendingProducts->id,'title'=>Str::slug($trendingProducts->product_title)]) }}">{{Str::limit($trendingProducts->product_title,7)}}</a></h6>
                                                @if ($trendingProducts->discount_price)
                                                    <h4 class="price">${{$trendingProducts->discount_price}} <del>${{$trendingProducts->product_price}}</del></h4>
                                                @else
                                                    <h4>${{$trendingProducts->product_price}}</h4>
                                                @endif
                                                <div class="content-bottom">
                                                    <ul>
                                                        <li>{{orderCount($trendingProducts->id)}} Orders ~</li>
                                                        <div class="rating text-warning">
                                                            @if (review($trendingProducts->id))
                                                                @for ($x = 1; $x <= 5; $x++)
                                                                    @if ($x <= review($trendingProducts->id))
                                                                        <i class="fas fa-star"></i>
                                                                    @else
                                                                        <i class="far fa-star"></i><!--Empty star-->
                                                                    @endif
                                                                @endfor
                                                                <span style="font-size: 10px;">({{ count_review($trendingProducts->id) }})</span>
                                                            @else
                                                                <span class="text-danger">No Review Yet</span>
                                                            @endif
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
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
                                        <button class="active" data-filter=".all">All</button>
                                        <button class="" data-filter=".cat-one">Flash</button>
                                        <button class="" data-filter=".cat-two">Popular</button>
                                        <button class="" data-filter=".cat-three">Super Deals</button>
                                    </div>
                                </div>
                            </div>
                            <div class="flash-product-item-wrap">
                                <div class="row flash-isotope-active">
                                    @foreach ($flashSaleProducts as $flashSaleProducts)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-item grid-sizer all @if($flashSaleProducts->campaign=='trending') {{'cat-two'}} @elseif($flashSaleProducts->campaign=='flash-sale'){{'cat-one'}} @elseif($flashSaleProducts->campaign=='super-deals'){{'cat-three'}} @endif  ">
                                            <div class="product-item-two mb-30">
                                                <div class="product-thumb">
                                                    <a href="{{ route('single.product', ['id'=>$flashSaleProducts->id,'title'=>Str::slug($flashSaleProducts->product_title)]) }}"><img src="{{ asset('uploads/product_photo') }}/{{$flashSaleProducts->thumbnail}}" alt=""></a>
                                                </div>
                                                <div class="product-content">
                                                    <h6 class="title"><a href="{{ route('single.product', ['id'=>$flashSaleProducts->id,'title'=>Str::slug($flashSaleProducts->product_title)]) }}">{{Str::limit($flashSaleProducts->product_title,15)}}</a></h6>
                                                    <h4 class="price">@if($flashSaleProducts->discount_price) ${{$flashSaleProducts->discount_price}} <del class="text-muted"> ${{$flashSaleProducts->product_price}}</del> @else ${{$flashSaleProducts->product_price}} @endif @if($flashSaleProducts->discount_price) <span>-{{Floor(((100*$flashSaleProducts->product_price)-(100*$flashSaleProducts->discount_price))/$flashSaleProducts->product_price)}}%</span> @endif</h4>
                                                    <div class="content-bottom">
                                                        <ul>
                                                            <li>{{orderCount($flashSaleProducts->id)}} Orders ~</li>
                                                            <div class="rating text-warning">
                                                                @if (review($flashSaleProducts->id))
                                                                    @for ($x = 1; $x <= 5; $x++)
                                                                        @if ($x <= review($flashSaleProducts->id))
                                                                            <i class="fas fa-star"></i>
                                                                        @else
                                                                            <i class="far fa-star"></i><!--Empty star-->
                                                                        @endif
                                                                    @endfor
                                                                    <span style="font-size: 10px;">({{ count_review($flashSaleProducts->id) }})</span>
                                                                @else
                                                                    <span class="text-danger">No Review Yet</span>
                                                                @endif
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 grid-item grid-sizer cat-two cat-one">
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
                                    </div> --}}
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
                                <h2 class="title">Find Best Vendor</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="best-sell-nav">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach ($bestCategories as $bestCategory)
                                        <li class="nav-item" role="presentation">
                                            <a href="{{route('listOfVendors',['slug'=>$bestCategory->slug])}}" class="nav-link" id="all-tab">
                                                    <i class="flaticon-shipping"></i>
                                                    <span>{{$bestCategory->category_name}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
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
