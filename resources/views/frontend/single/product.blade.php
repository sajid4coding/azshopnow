@extends('layouts/frontendmaster')
@section('content')
<style>
#review_section{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width:100%;
}
#review_section .testimonial-heading{
    letter-spacing: 1px;
    margin: 30px 0px;
    padding: 10px 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

#review_section .testimonial-heading span{
    font-size: 1.3rem;
    color: #252525;
    margin-bottom: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
#review_section .testimonial-box-container{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    width:100%;
}
#review_section .testimonial-box{
    width:500px;
    box-shadow: 2px 2px 30px rgba(0,0,0,0.1);
    background-color: #ffffff;
    padding: 20px;
    margin: 15px;
    cursor: pointer;
}
#review_section .profile-img{
    width:50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
}
#review_section .profile-img img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
#review_section .profile{
    display: flex;
    align-items: center;
}
#review_section .name-user{
    display: flex;
    flex-direction: column;
}
#review_section .name-user strong{
    color: #3d3d3d;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
}
#review_section .name-user span{
    color: #979797;
    font-size: 0.8rem;
}
#review_section .reviews{
    color: #f9d71c;
}
#review_section .box-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
#review_section .client-comment p{
    font-size: 0.9rem;
    color: #4b4b4b;
}
#review_section .testimonial-box:hover{
    transform: translateY(-10px);
    transition: all ease 0.3s;
}

@media(max-width:1060px){
    #review_section .testimonial-box{
        width:45%;
        padding: 10px;
    }
}
@media(max-width:790px){
    #review_section .testimonial-box{
        width:100%;
    }
    #review_section .testimonial-heading h1{
        font-size: 1.4rem;
    }
}
@media(max-width:340px){
    #review_section .box-top{
        flex-wrap: wrap;
        margin-bottom: 10px;
    }
    #review_section .reviews{
        margin-top: 10px;
    }
}
/* Image PopUp */
</style>

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
                    @if (session('report_success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('report_success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Something Is Missing In Report Section
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <div class="shop-details-img-wrap">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane show active" id="nav-item-one" role="tabpanel" aria-labelledby="nav-item-one-tab">
                                        <div class="shop-details-img">
                                            <img src="{{ asset('uploads/product_photo') }}/{{$single_product->thumbnail}}" alt="img" width="100%">
                                        </div>
                                    </div>
                                    @foreach ($productGalleries as $productGallery)
                                        <div class="tab-pane" id="nav-item-two-{{$productGallery->id}}" role="tabpanel" aria-labelledby="nav-item-two-tab">
                                            <div class="shop-details-img">
                                                <img src="{{ asset('uploads/product_gellery_photo') }}/{{$productGallery->product_gallery}}"width="100%"alt="img">
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- <div class="tab-pane" id="nav-item-three" role="tabpanel" aria-labelledby="nav-item-three-tab">
                                        <div class="shop-details-img">
                                            <img src="{{ asset('frontend_assets') }}/img/product/shop_details03.jpg" alt="img">
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="nav-item-four" role="tabpanel" aria-labelledby="nav-item-four-tab">
                                        <div class="shop-details-img">
                                            <img src="{{ asset('frontend_assets') }}/img/product/shop_details04.jpg" alt="img">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="shop-details-nav-wrap">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-item-one-tab" data-bs-toggle="tab" data-bs-target="#nav-item-one"
                                            type="button" role="tab" aria-controls="nav-item-one" aria-selected="true">
                                            <img src="{{ asset('uploads/product_photo') }}/{{$single_product->thumbnail}}" width="104" alt="img">
                                        </button>
                                        @foreach ($productGalleries as $productGallery)
                                            <button class="nav-link" id="nav-item-two-tab" data-bs-toggle="tab" data-bs-target="#nav-item-two-{{$productGallery->id}}" type="button"
                                                role="tab" aria-controls="nav-item-two" aria-selected="false">
                                                <img src="{{ asset('uploads/product_gellery_photo') }}/{{$productGallery->product_gallery}}" width="104" alt="img">
                                            </button>
                                        @endforeach
                                        {{-- <button class="nav-link" id="nav-item-three-tab" data-bs-toggle="tab" data-bs-target="#nav-item-three"
                                            type="button" role="tab" aria-controls="nav-item-three" aria-selected="false">
                                            <img src="{{ asset('frontend_assets') }}/img/product/shop_nav_img03.jpg" alt="img">
                                        </button>
                                        <button class="nav-link" id="nav-item-four-tab" data-bs-toggle="tab" data-bs-target="#nav-item-four"
                                            type="button" role="tab" aria-controls="nav-item-four" aria-selected="false">
                                            <img src="{{ asset('frontend_assets') }}/img/product/shop_nav_img04.jpg" alt="img">
                                        </button> --}}
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 col-md-8">
                            <div class="shop-details-content">
                                {{-- @if ($inventory && $inventory->quantity >0)
                                    <span><i class="fa-solid fa-check"></i>In Stock</span>
                                @else
                                    <span class="bg-warning text-dark"><i class="fa-solid fa-close"></i>Stock out</span>
                                @endif --}}
                                <h2 class="title">{{$single_product->product_title}}</h2>
                                <ul>
                                    <li data-background="{{ asset('frontend_assets') }}/img/images/coupon_bg01.png">
                                        $29.30 Coupons For You
                                    </li>
                                    <li data-background="{{ asset('frontend_assets') }}/img/images/coupon_bg02.png">
                                        $4.25 off.OLLESHOP7
                                    </li>
                                    <li>
                                        <a href="#">Get Coupons</a>
                                    </li>
                                </ul>

                                <p>{{$single_product->short_description}}</p>


                                {{-- LIVEWIRE PART START --}}

                                @livewire('add-to-cart',['productID'=>$single_product->id])

                                {{-- LIVEWIRE PART END --}}


                                <div class="shop-details-bottom">
                                    <ul>
                                        <li class="sd-category">
                                            <span class="title">Categories :</span>
                                            <a href="{{route('category.product',$single_product->parent_category_slug)}}">{{Str::title($single_product->parent_category_slug)}}</a>
                                        </li>
                                        <li class="sd-sku">
                                            <span class="title">SKU :</span>
                                            <a href="{{route('shop.page')}}">{{$single_product->sku}}</a>
                                        </li>
                                        <li class="sd-sku">
                                            <span class="title">Tags :</span>
                                            <a href="{{route('shop.page')}}">{{$single_product->tag}}</a>
                                        </li>
                                        <li class="sd-share">
                                            <span class="title">Share Now :</span>
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
                                           {!! $shareButtons !!}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-2 col-lg-12 col-md-4">
                            <div class="recommended-item-wrap">
                                <div class="recommended scroll">
                                    <span>Recommended For You :</span>
                                    @foreach ($recommendedProducts as $product)
                                        <div class="recommended-item mb-25">
                                            <div class="thumb">
                                                <a href="{{route('single.product', ['id'=>$product->id,'title'=>Str::slug($product->product_title)])}}"><img src="{{ asset('uploads/product_photo') }}/{{$product->thumbnail}}" alt="img"></a>
                                            </div>
                                            <div class="content">
                                                <h5 class="title">{{Str::limit($product->product_title,10)}}</h5>
                                                @if ($product->discount_price)
                                                    <h4>
                                                        <span>${{$product->discount_price}} <del class="text-muted"> ${{$product->product_price}}</del></span>
                                                        <span class="bg-warning text-dark p-1" style="display: inline-block">-{{Floor(((100*$product->product_price)-(100*$product->discount_price))/$product->product_price)}}%</span>
                                                    </h4>
                                                @else
                                                    <h4>
                                                        <span>${{$product->product_price}}</span>
                                                    </h4>
                                                @endif
                                                <ul>
                                                    <li>by <a href="{{route('vendor.product',['id'=>$single_product->vendor_id,'shopname'=>Str::slug($single_product->relationwithuser->shop_name)])}}">{{$single_product->relationwithuser->shop_name}}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
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
                                                                   <h2>
                                                                    <a href="{{route('vendor.product',['id'=>$single_product->vendor_id,'shopname'=>Str::slug($single_product->relationwithuser->shop_name)])}}">{{$single_product->relationwithuser->shop_name}}</a>
                                                                    </h2>
                                                                    <ul>
                                                                        @php
                                                                            $createdTime=$single_product->relationwithuser->created_at->diffForHumans()
                                                                        @endphp
                                                                        <li>{{$createdTime}}</li>
                                                                        <li><a href="#">Verified <img src="{{ asset('frontend_assets') }}/img/icon/verified_icon.png"
                                                                                    alt=""></a></li>
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
                                                                        <h2 class="title">{{vendorOrderCount($single_product->vendor_id)}}</h2>
                                                                        <p>Total Sold</p>
                                                                    </li>
                                                                    <li>
                                                                        <h2 class="title">${{vendorTotalEarnigs($single_product->vendor_id)}}</h2>
                                                                        <p>Total Earnings</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7 col-lg-12">
                                                        <div class="vendor-product-wrap">
                                                            @php
                                                               $vendorProducts= vendorProducts($single_product->vendor_id)
                                                            @endphp
                                                            <ul>
                                                                @foreach ($vendorProducts as $vendorProduct)
                                                                    <li class="vendor-product">
                                                                        <div class="thumb">
                                                                            <a href="{{route('single.product', ['id'=>$vendorProduct->id,'title'=>Str::slug($vendorProduct->product_title)])}}"><img
                                                                                    src="{{ asset('uploads/product_photo') }}/{{$vendorProduct->thumbnail}}" alt=""></a>
                                                                        </div>
                                                                        <div class="content">
                                                                            <h2 class="title"><a href="{{route('single.product', ['id'=>$vendorProduct->id,'title'=>Str::slug($vendorProduct->product_title)] )}}">{{Str::limit($vendorProduct->product_title,10)}}</a></h2>
                                                                            <span>15 (Sale)</span>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
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
                                                    ({{ $product_reviews->count() }})
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- <div class="product-report">
                                        <a href="#">Report Item</a>
                                    </div> --}}
                                    <!-- Button trigger modal -->
                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Report Item
                                    </a>
                                    <!-- Modal Start-->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Report Item</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('report.product', $single_product->id) }}" method="POST">
                                            @csrf
                                                <div class="modal-body">
                                                    <div class="contact-form">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" name="customer_name" placeholder="Your Name *">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="customer_email" placeholder="Your Email *">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="phone" name="phone_number" placeholder="Your Phone">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="subject" placeholder="Subject">
                                                            </div>
                                                        </div>
                                                        <textarea name="customer_message" placeholder="Your Message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                    @auth
                                                        <button type="submit" class="btn btn-primary">Report Item</button>
                                                    @endauth

                                                    @guest
                                                        <button id="not_logged_in" type="button" class="btn btn-primary">Report Item</button>
                                                    @endguest

                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- Modal End-->
                                </div>
                                <div class="tab-content" id="productTabContent">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <div class="product-desc-content">
                                            <p id="single_product_description">
                                                {{-- {!! $single_product->description !!} --}}
                                                @php
                                                    echo ( $single_product->description )
                                                @endphp
                                            </p>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                                        <div class="product-desc-content">
                                            <div class="product-desc-review">
                                                <div class="review-title mb-20">
                                                    <h4 class="title">Customer Reviews ({{ $product_reviews->count() }})</h4>
                                                </div>
                                                <div class="left-rc">
                                                    <section id="review_section">
                                                        <!--testimonials-box-container------>
                                                        <div class="testimonial-box-container">
                                                            <!--BOX-1-------------->
                                                            @forelse ($product_reviews as $product_review)
                                                                <div class="testimonial-box">
                                                                    <!--top------------------------->
                                                                    <div class="box-top">
                                                                        <!--profile----->
                                                                        <div class="profile">
                                                                            <!--img---->
                                                                            <div class="profile-img">
                                                                                <img src="{{ asset('uploads/profile_photo') }}/{{ $product_review->relationwithuser->profile_photo }}" />
                                                                            </div>
                                                                            <!--name-and-username-->
                                                                            <div class="name-user">
                                                                                <strong>{{ $product_review->relationwithuser->name }}</strong>
                                                                            </div>
                                                                        </div>
                                                                        <!--reviews------>

                                                                        <div class="reviews">
                                                                            @for ($x = 1; $x <= 5; $x++)
                                                                                @if ($x <= $product_review->rating)
                                                                                    <i class="fas fa-star"></i>
                                                                                @else
                                                                                    <i class="far fa-star"></i><!--Empty star-->
                                                                                @endif
                                                                            @endfor
                                                                        </div>
                                                                    </div>
                                                                    <!--Comments---------------------------------------->
                                                                    <div class="client-comment">
                                                                        <p class="mb-3">{{ $product_review->comment }}</p>
                                                                        <div class="d-flex">
                                                                        @php
                                                                            $product_galleries = App\Models\ReviewGallery::where('product_review_id', $product_review->id)->get();
                                                                        @endphp
                                                                        @if ($product_galleries)
                                                                            @foreach ($product_galleries as $product_gallery)
                                                                                <img class="m-2" height="60" src="{{ asset('uploads/product_review_images') }}/{{ $product_gallery->review_image }}" alt="azshopshow">
                                                                            @endforeach
                                                                        @endif
                                                                        @foreach (reply("$product_review->id") as $reply)
                                                                           <div class="mt-4">
                                                                            <i class="fas fa-reply"></i>

                                                                           <div class="profile pl-5">
                                                                                <!--img---->
                                                                                <div class="profile-img">
                                                                                   <img width="50" src="{{ asset('uploads/profile_photo') }}/{{  App\Models\User::find($reply->vendor_id)->profile_photo }}" />
                                                                                </div>
                                                                                <!--name-and-username-->
                                                                                <div>
                                                                                <div class="name-user" style="font-size: 10px !important">
                                                                                   <strong>{{ App\Models\User::find($reply->vendor_id)->name}}</strong>
                                                                                </div>
                                                                                <div class="name-user pl-5" style="font-size: 10px !important">
                                                                                <p>{{ $reply->reply }}</p>
                                                                                </div>
                                                                                </div>
                                                                           </div>
                                                                           </div>

                                                                        @endforeach
                                                                    </div>

                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div class="left-rc">
                                                                    <p>No reviews yet</p>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                    </section>
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
                                <a href="{{route('vendor.product',['id'=>$single_product->vendor_id,'shopname'=>Str::slug($single_product->relationwithuser->shop_name)])}}">{{$single_product->relationwithuser->shop_name}}</a>
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

<script>
    $(document).ready(function(){
        $('#single_product_description').innerHTML({{  $single_product->description  }})
    })
</script>
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

@section('footer_script')
<script>
    $(document).ready(function(){
    $('#not_logged_in').click(function(){
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'You have to need Login first!',
        footer: '<a href="{{route('customer.login')}}">Click here to login</a>'
        });
        });
    });
</script>
<script src="{{ asset('js/share.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
@endsection

