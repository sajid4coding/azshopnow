@extends('layouts.frontendmaster')
@section('content')
  <!-- main-area -->
  <main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area-four breadcrumb-bg vendor-profile-breadcrumb" style='background: url(@if (auth()->user()->banner)  {{ asset('uploads/banner_img') }}/{{ auth()->user()->banner }}  @else https://www.cohesity.com/wp-content/new_media/2021/03/demo-days-lp-banner.png @endif) no-repeat center;background-size:cover;''>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="store-product">
                        <div class="store-thumb" style="overflow: hidden">
                            {{-- https://pondokindahmall.co.id/assets/img/default.png --}}
                            @if (auth()->user()->profile_photo)
                               <img  src="{{ asset('uploads/vendor_profile') }}/{{ auth()->user()->profile_photo }}" alt="img">
                            @else
                               <img src="https://pondokindahmall.co.id/assets/img/default.png" alt="img">
                            @endif
                        </div>
                        <div class="store-content">
                            <span class="verified">Verified <i class="fa-solid fa-crown"></i></span>
                            @if (auth()->user()->shop_name)
                            <h2 class="title">  {{ auth()->user()->shop_name }} </h2>
                            <ul>
                                <li class="customer">Owner Name : <span style="color: #FF4800 !important;padding-left:10px;font-size:1.2rem">{{ auth()->user()->name }}</span> </li>
                            </ul>
                            @else
                            <h2 class="title">  {{ auth()->user()->name }} </h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Vendor setting</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- vendor-setting-area -->
    <div class="vendor-setting-area pt-80 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-8 order-2 order-lg-0">
                    <aside class="vs-sidebar">
                        <div class="vs-widget">
                            <div class="widget-title">
                                <h4 class="title">Account Details</h4>
                            </div>
                            {{-- <ul class="product-quantity">
                                <li>
                                    <div class="content">
                                        <i class="flaticon-shopping-bag-1"></i>
                                        <p>Product Quantity</p>
                                    </div>
                                    <span>1500+</span>
                                </li>
                                <li>
                                    <div class="content">
                                        <i class="flaticon-diamond"></i>
                                        <p>Total Transactions</p>
                                    </div>
                                    <span>50,0000+</span>
                                </li>
                            </ul> --}}
                        </div>
                        <div class="vs-widget">
                            <div class="vs-page-link">
                                <ul>
                                    <li>
                                        <a href="#">Product</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="vs-widget">
                            <div class="vs-page-link">
                                <ul>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                              <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i>  Sign Out</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="vs-widget">
                            @if (auth()->user()->address || auth()->user()->phone_number)
                            <div class="widget-title">
                                <h4 class="title">Contacts</h4>
                            </div>
                            <ul class="contact-info">
                                @if (auth()->user()->address)
                                <li><i class="fa-solid fa-location-dot"></i>{{ auth()->user()->address }}</li>
                                @endif
                                @if (auth()->user()->phone_number)
                                <li><i class="fa-solid fa-phone-volume"></i> <a href="tel:{{ auth()->user()->phone_number }}">{{ auth()->user()->phone_number }}</a></li>
                                @endif
                            </ul>
                            @endif

                            {{-- <div class="contact-bottom">
                                <div class="wishlist">
                                    <ul>
                                        <li><a href="#"><i class="fa-regular fa-heart"></i>35k+</a></li>
                                        <li><a href="#">...</a></li>
                                    </ul>
                                </div>
                                <div class="social">
                                    <ul>
                                        <li><a href="#"><i class="fa-brands fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </aside>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="vendor-setting-wrap">
                        <h2 class="title">Dashboard</h2>

                      {{-- Coupon Success Message --}}
                         @if (session('coupon_add_success'))
                                <div class="alert alert-primary" role="alert">
                                    <strong>{{ session('coupon_add_success') }}</strong>
                                </div>
                         @endif
                      {{-- Cooupon Sucess Message --}}
                      {{-- Coupon Success Message --}}
                         @if (session('coupon_delete_message'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ session('coupon_delete_message') }}</strong>
                                </div>
                         @endif
                      {{-- Cooupon Sucess Message --}}

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                    role="tab" aria-controls="profile" aria-selected="true"><i class="flaticon-rim"></i> Store Profile</button>
                            </li> --}}
                            <li class="nav-item active" role="presentation">
                                <button class="nav-link" id="vendor-tab" data-bs-toggle="tab" data-bs-target="#vendor" type="button"
                                role="tab" aria-controls="vendor" aria-selected="false"><i class="flaticon-user"></i> Vendor Profile</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="edit-tab" data-bs-toggle="tab" data-bs-target="#edit" type="button"
                                role="tab" aria-controls="edit" aria-selected="false"><i class="far fa-edit"></i>Setting</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="coupon-tab" data-bs-toggle="tab" data-bs-target="#coupon" type="button"
                                role="tab" aria-controls="coupon" aria-selected="false"><i class="fas fa-tag"></i>Coupons Add & List</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="vendor" role="tabpanel" aria-labelledby="vendor-tab">
                                <div class="vendor-profile-wrap">
                                    <div class="avatar-post">
                                        <div class="avatar-post-img">
                                            <img src=" @if (auth()->user()->profile_photo)
                                            {{ asset('uploads/vendor_profile') }}/{{ auth()->user()->profile_photo }}
                                            @else
                                            https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png
                                            @endif " alt="img">
                                        </div>
                                        <div class="avatar-post-content">
                                            <h4 class="title">{{ auth()->user()->name }}</h4>
                                            <p>{{ auth()->user()->bio }}</p>
                                            {{-- <ul class="social">
                                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                                <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="row justify-content-center">
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
                                            <div class="vp-product-item mb-30">
                                                <div class="vp-product-thumb text-center">
                                                    <span class="tag">Sold</span>
                                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vp_product01.png" alt="img"></a>
                                                    <div class="product-overlay-action">
                                                        <ul>
                                                            <li class="wishlist"><a href="#"><i class="fa-regular fa-heart"></i></a></li>
                                                            <li class="color-option">
                                                                <span class="orange"></span>
                                                                <span class="cyan"></span>
                                                                <span class="gray"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="vp-product-content">
                                                    <ul class="sold-by">
                                                        <li>Sold by <a href="vendor-profile.html">Olle Store</a></li>
                                                    </ul>
                                                    <h4 class="title"><a href="shop-details.html">Large Capacity Bamboo</a></h4>
                                                    <ul>
                                                        <li class="price">$19.35 - $45.35</li>
                                                        <li class="rating">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="vp-product-content-bottom text-center">
                                                    <a href="#" class="compare"><i class="fa-solid fa-code-compare"></i>Compare Options</a>
                                                    <a href="#" class="quick-view"><i class="fa-regular fa-eye"></i>Quick View</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
                                            <div class="vp-product-item mb-30">
                                                <div class="vp-product-thumb text-center">
                                                    <span class="tag">Sold</span>
                                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vp_product02.png" alt="img"></a>
                                                    <div class="product-overlay-action">
                                                        <ul>
                                                            <li class="wishlist"><a href="#"><i class="fa-regular fa-heart"></i></a></li>
                                                            <li class="color-option">
                                                                <span class="orange"></span>
                                                                <span class="cyan"></span>
                                                                <span class="gray"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="vp-product-content">
                                                    <ul class="sold-by">
                                                        <li>Sold by <a href="vendor-profile.html">Olle Store</a></li>
                                                    </ul>
                                                    <h4 class="title"><a href="shop-details.html">Laptop Tablet 13.3 Inch</a></h4>
                                                    <ul>
                                                        <li class="price">$69.35 - $45.35</li>
                                                        <li class="rating">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="vp-product-content-bottom text-center">
                                                    <a href="#" class="compare"><i class="fa-solid fa-code-compare"></i>Compare Options</a>
                                                    <a href="#" class="quick-view"><i class="fa-regular fa-eye"></i>Quick View</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
                                            <div class="vp-product-item mb-30">
                                                <div class="vp-product-thumb text-center">
                                                    <span class="tag">Sold</span>
                                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vp_product03.png" alt="img"></a>
                                                    <div class="product-overlay-action">
                                                        <ul>
                                                            <li class="wishlist"><a href="#"><i class="fa-regular fa-heart"></i></a></li>
                                                            <li class="color-option">
                                                                <span class="orange"></span>
                                                                <span class="cyan"></span>
                                                                <span class="gray"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="vp-product-content">
                                                    <ul class="sold-by">
                                                        <li>Sold by <a href="vendor-profile.html">Olle Store</a></li>
                                                    </ul>
                                                    <h4 class="title"><a href="shop-details.html">OnePlus 8 Pronyx Black</a></h4>
                                                    <ul>
                                                        <li class="price">$39.35 - $45.35</li>
                                                        <li class="rating">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="vp-product-content-bottom text-center">
                                                    <a href="#" class="compare"><i class="fa-solid fa-code-compare"></i>Compare Options</a>
                                                    <a href="#" class="quick-view"><i class="fa-regular fa-eye"></i>Quick View</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
                                            <div class="vp-product-item mb-30">
                                                <div class="vp-product-thumb text-center">
                                                    <span class="tag">Sold</span>
                                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vp_product04.png" alt="img"></a>
                                                    <div class="product-overlay-action">
                                                        <ul>
                                                            <li class="wishlist"><a href="#"><i class="fa-regular fa-heart"></i></a></li>
                                                            <li class="color-option">
                                                                <span class="orange"></span>
                                                                <span class="cyan"></span>
                                                                <span class="gray"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="vp-product-content">
                                                    <ul class="sold-by">
                                                        <li>Sold by <a href="vendor-profile.html">Olle Store</a></li>
                                                    </ul>
                                                    <h4 class="title"><a href="shop-details.html">OnePlus 8 Pronyx Black</a></h4>
                                                    <ul>
                                                        <li class="price">$39.35 - $45.35</li>
                                                        <li class="rating">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="vp-product-content-bottom text-center">
                                                    <a href="#" class="compare"><i class="fa-solid fa-code-compare"></i>Compare Options</a>
                                                    <a href="#" class="quick-view"><i class="fa-regular fa-eye"></i>Quick View</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
                                            <div class="vp-product-item mb-30">
                                                <div class="vp-product-thumb text-center">
                                                    <span class="tag">Sold</span>
                                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vp_product05.png" alt="img"></a>
                                                    <div class="product-overlay-action">
                                                        <ul>
                                                            <li class="wishlist"><a href="#"><i class="fa-regular fa-heart"></i></a></li>
                                                            <li class="color-option">
                                                                <span class="orange"></span>
                                                                <span class="cyan"></span>
                                                                <span class="gray"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="vp-product-content">
                                                    <ul class="sold-by">
                                                        <li>Sold by <a href="vendor-profile.html">Olle Store</a></li>
                                                    </ul>
                                                    <h4 class="title"><a href="shop-details.html">Stretching Device Back</a></h4>
                                                    <ul>
                                                        <li class="price">$29.35 - $45.35</li>
                                                        <li class="rating">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="vp-product-content-bottom text-center">
                                                    <a href="#" class="compare"><i class="fa-solid fa-code-compare"></i>Compare Options</a>
                                                    <a href="#" class="quick-view"><i class="fa-regular fa-eye"></i>Quick View</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
                                            <div class="vp-product-item mb-30">
                                                <div class="vp-product-thumb text-center">
                                                    <span class="tag">Sold</span>
                                                    <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/vp_product06.png" alt="img"></a>
                                                    <div class="product-overlay-action">
                                                        <ul>
                                                            <li class="wishlist"><a href="#"><i class="fa-regular fa-heart"></i></a></li>
                                                            <li class="color-option">
                                                                <span class="orange"></span>
                                                                <span class="cyan"></span>
                                                                <span class="gray"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="vp-product-content">
                                                    <ul class="sold-by">
                                                        <li>Sold by <a href="vendor-profile.html">Olle Store</a></li>
                                                    </ul>
                                                    <h4 class="title"><a href="shop-details.html">One Washer Dryer Combo</a></h4>
                                                    <ul>
                                                        <li class="price">$19.35 - $50.35</li>
                                                        <li class="rating">
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                            <i class="fa-solid fa-star"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="vp-product-content-bottom text-center">
                                                    <a href="#" class="compare"><i class="fa-solid fa-code-compare"></i>Compare Options</a>
                                                    <a href="#" class="quick-view"><i class="fa-regular fa-eye"></i>Quick View</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                                <div class="product-upload-wrap">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="title">Product Title</label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="price">Product Price</label>
                                                    <input type="text" placeholder="$ -">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="price">Product Brand</label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="price">Weight</label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-grp">
                                            <label for="price">Product Discount %</label>
                                            <input type="text" placeholder="% -">
                                        </div>
                                        <div class="form-grp">
                                            <label for="price">Product Description</label>
                                            <textarea name="text"></textarea>
                                        </div>
                                        <button type="submit">Upload Shop</button>
                                    </form>
                                </div>
                            </div> --}}
                            <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                <div class="product-upload-wrap">
                                    <form action="{{ route('vendor.update.info') }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="container">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload" name="profile_photo" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview" style="background-image: url({{ asset('uploads/vendor_profile/'.auth()->user()->profile_photo) }});">
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                 <div class="form-grp">
                                                     <label >Banner Photo : </label>
                                                    <input type='file'  name="banner" accept=".png, .jpg, .jpeg" />
                                                 </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label>Name</label>
                                                    <input type="text" name="name" value="{{ auth()->user()->name }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label >Email</label>
                                                    <input type="email" name="email" value="{{ auth()->user()->email }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label >Phone Number</label>
                                                    <input type="phone" name="phone_number" value="{{ auth()->user()->phone_number }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label >shop Name</label>
                                                    <input type="text" name="shop_name" value="{{ auth()->user()->shop_name }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-grp">
                                                    <label >Bio</label>
                                                    <textarea name="bio" id="" cols="30" rows="10">{{ auth()->user()->bio  }}</textarea>

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-grp">
                                                    <label >Address</label>
                                                    <input type="text" name="address" value="{{ auth()->user()->address }}">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit">Update Info</button>
                                    </form>


                                    {{-- CHANGE PASSWORD START --}}
                                    <form  action="{{ route('vendor.change.password') }}"  method="POST" class="mt-5">
                                          @csrf
                                        <div class="row mt-5">
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label>Current Password</label>
                                                    <input type="password"  name="current_password" placeholder="Current password">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label >New Password</label>
                                                    <input type="password" name="password" placeholder="New password">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label >Confirm Password</label>
                                                    <input type="password" name="password_confirmation" placeholder="confirm password">
                                                </div>
                                            </div>

                                        </div>

                                        @if (session('change_message'))

                                        <div class="alert alert-success" role="alert">
                                            <strong>{{ session('change_message') }}</strong>
                                        </div>
                                          @endif

                                         @if (session('change_error_message'))

                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>{{ session('change_error_message') }}</strong>
                                                    </div>
                                         @endif

                                         @if ($errors->any())
                                              @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>{{ $error }}</strong>
                                                    </div>
                                              @endforeach
                                         @endif

                                        <button type="submit">Change Password</button>
                                    </form>
                                </div>
                            </div>
                              <div class="tab-pane fade " id="coupon" role="tabpanel" aria-labelledby="coupon-tab">
                                <div class="product-upload-wrap">
                                    <div class="product-upload-box text-center">
                                        <div class="product-upload-content">
                                          <h2 class="text-danger">Add Coupons</h2>
                                        </div>
                                    </div>
                                    {{-- ==== Error Messages ==== --}}
                                    @if ($errors->any())
                                       @foreach ($errors->all() as $error)
                                             <div class="alert alert-danger" role="alert">
                                                <strong>{{ Str::replaceFirst('_', ' ', $error) }}</strong>
                                             </div>
                                       @endforeach
                                    @endif
                                    {{-- ==== Error Messages ==== --}}
                                    <form action="{{ route('coupon.add') }}" method="POST">
                                         @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="title">Coupon Code</label>
                                                    <input type="text" placeholder="Example: xYzw12" name="coupon_code" id="title">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="price">Minimum Price of buy</label>
                                                    <input type="text" id="price" name="minimum_price" placeholder="$ -">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group pl-3">
                                                    <label class="d-block" for="">Discount Type</label>

                                                    <select class="form-select" name="discount_type" id="">
                                                        <option disabled selected value="">-Select Coupon type-</option>
                                                        <option value="percentage">Percentage ( % )</option>
                                                        <option value="flat">Flat</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="weight">Coupon Amount</label>
                                                    <input type="number" name="coupon_amount" id="weight">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="weight">Discount Message</label>
                                                    <input type="text" name="discount_message" id="weight">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="text-center mt-3">
                                                    <button type="submit">Add Coupon</button>
                                                </div>
                                            </div>
                                        </div>


                                    </form>

                                    {{-- ==========================================
                                                   Coupon List Start
                                        =========================================== --}}

                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <h6>Available Coupons</h6>
                                              </div>
                                              <div class="col-md-12">
                                                <table class="table table-stripe">
                                                  <thead class="thead-dark">
                                                    <tr>
                                                      <th>S.N</th>
                                                      <th> Code</th>
                                                      <th>Details</th>
                                                      <th>Minimum Value</th>
                                                      <th>Amount</th>
                                                      <th>Action</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    @forelse ($coupons as $coupon)
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td>{{ $coupon->coupon_code }}</td>
                                                        <td>{{ $coupon->discount_message }}</td>
                                                        <td>{{ $coupon->minimum_price }}</td>
                                                        <td>
                                                            @if ($coupon->discount_type == 'flat')
                                                            {{ $coupon->coupon_amount }} tk.
                                                            @else
                                                            {{ $coupon->coupon_amount }}%
                                                            @endif
                                                        </td>
                                                        <td><a href="{{ route('coupon.delete',$coupon->id) }}" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
                                                      </tr>
                                                    @empty
                                                    <tr>

                                                        <td class="text-center bg-danger text-white" colspan="6">You have no any coupon yet</td>
                                                    </tr>
                                                    @endforelse


                                                  </tbody>
                                                </table>
                                              </div>
                                        </div>

                                    {{-- ==========================================
                                                   Coupon List End
                                        =========================================== --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- vendor-setting-area-end -->



</main>
<!-- main-area-end -->
@endsection
