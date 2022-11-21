@extends('layouts.frontendmaster')
@section('content')
  <!-- main-area -->
  <main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area-four breadcrumb-bg vendor-profile-breadcrumb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="store-product">
                        <div class="store-thumb">
                            <img src="{{ asset('uploads/vendor_profile') }}/{{ auth()->user()->profile_photo }}" alt="img">
                        </div>
                        <div class="store-content">
                            <span class="verified">Verified <i class="fa-solid fa-crown"></i></span>
                            <h2 class="title">@if (auth()->user()->shop_name)
                                {{ auth()->user()->shop_name }}
                            @else
                               Set your shop name
                            @endif </h2>
                            <ul>
                                <li class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </li>
                                <li class="customer">40k Customer</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="breadcrumb-img text-end">
                        <img src="{{ asset('frontend_assets') }}/img/images/breadcrumb_img.png" alt="img">
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
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                            <ul class="product-quantity">
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
                            </ul>
                        </div>
                        <div class="vs-widget">
                            <div class="vs-page-link">
                                <ul>
                                    <li class="active">
                                        <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="flaticon-shoe"></i> Products</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="flaticon-maths"></i> Withdraw</a>
                                    </li>
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
                            <div class="widget-title">
                                <h4 class="title">Contacts</h4>
                            </div>
                            <ul class="contact-info">
                                <li><i class="fa-solid fa-location-dot"></i>{{ auth()->user()->address }}</li>
                                <li><i class="fa-solid fa-phone-volume"></i> <a href="tel:{{ auth()->user()->phone_number }}">{{ auth()->user()->phone_number }}</a></li>
                            </ul>
                            <div class="contact-bottom">
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
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="vendor-setting-wrap">
                        <h2 class="title">Dashboard</h2>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                    role="tab" aria-controls="profile" aria-selected="true"><i class="flaticon-rim"></i> Store Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="vendor-tab" data-bs-toggle="tab" data-bs-target="#vendor" type="button"
                                    role="tab" aria-controls="vendor" aria-selected="false"><i class="flaticon-user"></i> Vendor Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments" type="button"
                                    role="tab" aria-controls="payments" aria-selected="false"><i class="flaticon-diamond"></i> Payments methods</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="edit-tab" data-bs-toggle="tab" data-bs-target="#edit" type="button"
                                    role="tab" aria-controls="edit" aria-selected="false"><i class="far fa-edit"></i>Setting</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="product-upload-wrap">
                                    <div class="product-upload-box text-center">
                                        <div class="product-upload-content">
                                            <i class="fa-solid fa-cloud-arrow-up"></i>
                                            <a href="#">Upload Product</a>
                                            <p>Upload a product for your store. Product size is (600×800) pixels.</p>
                                        </div>
                                    </div>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="title">Product Title</label>
                                                    <input type="text" id="title">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="price">Product Price</label>
                                                    <input type="text" id="price" placeholder="$ -">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="brand">Product Brand</label>
                                                    <input type="text" id="brand">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-grp">
                                                    <label for="weight">Weight</label>
                                                    <input type="text" id="weight">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-grp">
                                            <label for="discount">Product Discount %</label>
                                            <input type="text" id="discount" placeholder="% -">
                                        </div>
                                        <div class="form-grp">
                                            <label for="description">Product Description</label>
                                            <textarea name="text" id="description"></textarea>
                                        </div>
                                        <button type="submit">Upload Shop</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vendor" role="tabpanel" aria-labelledby="vendor-tab">
                                <div class="vendor-profile-wrap">
                                    <div class="avatar-post">
                                        <div class="avatar-post-img">
                                            <img src=" @if (auth()->user()->profile_photo)
                                            {{ asset('uploads/vendor_profile/') }}/{{ auth()->user()->profile_photo }}
                                            @else
                                            https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png
                                            @endif " alt="img">
                                        </div>
                                        <div class="avatar-post-content">
                                            <h4 class="title">{{ auth()->user()->name }}</h4>
                                            <p>Lorem Ipsum is simply dummy text of the prinng and typeg industry. Lorem Ipsum has been the industry's
                                                standard dummy text ever since.</p>
                                            <ul class="social">
                                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                                <li><a href="#"><i class="fa-brands fa-pinterest-p"></i></a></li>
                                                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
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
                            </div>
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
