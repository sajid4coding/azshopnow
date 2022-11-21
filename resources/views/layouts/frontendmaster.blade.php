<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Olle - Price Comparison with Multi-vendor Store HTML Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend_assets') }}/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/animate.min.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/mCustomScrollbar.min.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/flaticon.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/slick.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/jquery-ui.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/default.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/style.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/custom_style.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/responsive.css">
    </head>
    <body>

        <!-- Preloader -->
        <div id="preloader">
            <div id="preloader-status">
                <div class="preloader-position loader"> <span></span> </div>
            </div>
        </div>
        <!-- Preloader end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header>
            <div class="header-top-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="header-top-left">
                                <a href="#">Welcome! Free Shipping on orders over US$29.99</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="header-top-right">
                                <ul>



                                    @auth
                                    @if (auth()->user()->role == 'vendor')
                                    <li><a href="{{ route('vendor.dashboard') }}">Vendor Dashboard</a></li>
                                    @else
                                    <li><a href="{{ route('become.vendor') }}">Become a Vendor</a></li>
                                    <li><a href="{{ route('vendor.login') }}">Vendor Login</a></li>
                                    @endif
                                    @endauth


                                    @guest
                                    <li><a href="{{ route('become.vendor') }}">Become a Vendor</a></li>
                                    <li><a href="{{ route('vendor.login') }}">Vendor Login</a></li>
                                    @endguest


                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-search-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-3">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('frontend_assets') }}/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-9">
                            <div class="d-block d-sm-flex align-items-center justify-content-end">
                                <div class="header-search-wrap">
                                    <form action="#">
                                        <input type="text" placeholder="Search for product...">
                                        <select class="custom-select">
                                            <option selected="">All Categories</option>
                                            <option>Women's Clothing</option>
                                            <option>Men's Clothing</option>
                                            <option>Luggage & Bags</option>
                                        </select>
                                        <button><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-action">
                                    <ul>
                                        <li><a href="#"><i class="far fa-star"></i>Wishlist</a></li>
                                        <li><a href="#"><i class="fas fa-redo"></i>Compare</a></li>
                                        <li class="header-shop"><a href="#"><i class="flaticon-shopping-bag"></i>Cart
                                        <span class="cart-count">0</span>
                                        </a></li>
                                        @auth
                                        <li class="header-sine-in">

                                                 @if (auth()->user()->role == 'vendor')
                                                 <a href="{{ route('vendor.dashboard') }}">
                                                    <i class="flaticon-user"></i>
                                                    <p>{{ Str::title(auth()->user()->name) }}</span></p>
                                                </a>
                                                 @elseif (auth()->user()->role == 'customer')
                                                 <a href="{{ route('customerhome') }}">
                                                    <i class="flaticon-user"></i>
                                                    <p>{{ Str::title(auth()->user()->name) }}</span></p>
                                                </a>
                                                 @endif



                                        </li>

                                        @endauth

                                        @guest
                                        {{-- CUSTOMER LOGIN START --}}
                                        <li class="header-sine-in">
                                            <a href="{{ route('home') }}">
                                                <i class="flaticon-user"></i>
                                            </a>
                                         <li class="ms-1">
                                              <style>
                                                .ms-1 {
                                                 margin-left: ($spacer * .30) !important;
                                                }
                                            </style>
                                               <a href="{{ route('customer.login') }}">Login /</a>
                                                </li>
                                           <li class="ms-1">
                                            <style>
                                                .ms-1 {
                                                 margin-left: ($spacer * .25) !important;
                                                }
                                            </style>
                                               <a href="{{ route('customer.register') }}">Register</a>
                                           </li>
                                        </li>
                                    </ul>
                                    {{-- CUSTOMER LOGIN END --}}

                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav">
                                    <div class="logo d-none">
                                        <a href="index.html"><img src="{{ asset('frontend_assets') }}/img/logo/w_logo.png" alt=""></a>
                                    </div>
                                    <div class="header-category">
                                        <a href="#" class="cat-toggle">
                                            <i class="fas fa-bars"></i>
                                            Browse Categories
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <ul class="category-menu">
                                            <li class="add-megamenu">
                                                <a href="#"><i class="fa-solid fa-gear"></i>How to add MegaMenu</a>
                                            </li>
                                            <li><a href="shop.html"><i class="flaticon-make-up"></i>Health and Beauty </a>
                                            </li>
                                            <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-smartphone"></i>Smartphone & Table</a>
                                                <ul class="megamenu">
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Batteries</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Electronic Cigarettes</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Smart Electronics</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Light Bulbs</a></li>
                                                            <li><a href="shop.html">Watch Fashion</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">Audio Amplifier Boards</a></li>
                                                            <li><a href="shop.html">Smart Electronics</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Tees, Knits & Pools</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Electronic Cigarettes</a>
                                                        <ul>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Portable Audio & Video</a>
                                                        <ul>
                                                            <li><a href="shop.html">Portable Audio & Video</a></li>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Audio & Video</a>
                                                        <ul>
                                                            <li class="mega-menu-banner"><a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/megamenu_banner.jpg" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-rim"></i>Automotive & Motorcycle </a>
                                                <ul class="megamenu">
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Batteries</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Electronic Cigarettes</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Smart Electronics</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Light Bulbs</a></li>
                                                            <li><a href="shop.html">Watch Fashion</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">Audio Amplifier Boards</a></li>
                                                            <li><a href="shop.html">Smart Electronics</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Tees, Knits & Pools</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Electronic Cigarettes</a>
                                                        <ul>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Portable Audio & Video</a>
                                                        <ul>
                                                            <li><a href="shop.html">Portable Audio & Video</a></li>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Audio & Video</a>
                                                        <ul>
                                                            <li class="mega-menu-banner"><a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/megamenu_banner.jpg" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-sofa"></i>Furniture <span>30%</span></a>
                                                <ul class="megamenu">
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Batteries</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Electronic Cigarettes</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Smart Electronics</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Light Bulbs</a></li>
                                                            <li><a href="shop.html">Watch Fashion</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">Audio Amplifier Boards</a></li>
                                                            <li><a href="shop.html">Smart Electronics</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Tees, Knits & Pools</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Electronic Cigarettes</a>
                                                        <ul>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Portable Audio & Video</a>
                                                        <ul>
                                                            <li><a href="shop.html">Portable Audio & Video</a></li>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Audio & Video</a>
                                                        <ul>
                                                            <li class="mega-menu-banner"><a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/megamenu_banner.jpg" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-ball"></i>Sport & Outdoors</a>
                                                <ul class="megamenu">
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Batteries</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Electronic Cigarettes</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Smart Electronics</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Light Bulbs</a></li>
                                                            <li><a href="shop.html">Watch Fashion</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">Audio Amplifier Boards</a></li>
                                                            <li><a href="shop.html">Smart Electronics</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Tees, Knits & Pools</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Electronic Cigarettes</a>
                                                        <ul>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Portable Audio & Video</a>
                                                        <ul>
                                                            <li><a href="shop.html">Portable Audio & Video</a></li>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Audio & Video</a>
                                                        <ul>
                                                            <li class="mega-menu-banner"><a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/megamenu_banner.jpg" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-plug"></i>Electronics</a>
                                                <ul class="megamenu">
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Batteries</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Electronic Cigarettes</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Smart Electronics</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Light Bulbs</a></li>
                                                            <li><a href="shop.html">Watch Fashion</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">Audio Amplifier Boards</a></li>
                                                            <li><a href="shop.html">Smart Electronics</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Tees, Knits & Pools</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Electronic Cigarettes</a>
                                                        <ul>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Portable Audio & Video</a>
                                                        <ul>
                                                            <li><a href="shop.html">Portable Audio & Video</a></li>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Audio & Video</a>
                                                        <ul>
                                                            <li class="mega-menu-banner"><a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/megamenu_banner.jpg" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html"><i class="flaticon-necklace"></i>Bags & shoe</a>
                                            </li>
                                            <li><a href="shop.html"><i class="flaticon-diamond"></i>Accessories</a>
                                            </li>
                                            <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-headphone"></i>entanglement</a>
                                                <ul class="megamenu">
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Batteries</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Electronic Cigarettes</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Smart Electronics</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Light Bulbs</a></li>
                                                            <li><a href="shop.html">Watch Fashion</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">Audio Amplifier Boards</a></li>
                                                            <li><a href="shop.html">Smart Electronics</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Tees, Knits & Pools</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Electronic Cigarettes</a>
                                                        <ul>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Portable Audio & Video</a>
                                                        <ul>
                                                            <li><a href="shop.html">Portable Audio & Video</a></li>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Audio & Video</a>
                                                        <ul>
                                                            <li class="mega-menu-banner"><a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/megamenu_banner.jpg" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-agronomy"></i>Outdoor and Nature</a>
                                                <ul class="megamenu">
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Batteries</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Electronic Cigarettes</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Smart Electronics</a>
                                                        <ul>
                                                            <li><a href="shop.html">Cables & Adapters</a></li>
                                                            <li><a href="shop.html">Chargers</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Light Bulbs</a></li>
                                                            <li><a href="shop.html">Watch Fashion</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                        <ul>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">Audio Amplifier Boards</a></li>
                                                            <li><a href="shop.html">Smart Electronics</a></li>
                                                            <li><a href="shop.html">Bags & Cases</a></li>
                                                            <li><a href="shop.html">Tees, Knits & Pools</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Electronic Cigarettes</a>
                                                        <ul>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">Projectors</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Portable Audio & Video</a>
                                                        <ul>
                                                            <li><a href="shop.html">Portable Audio & Video</a></li>
                                                            <li><a href="shop.html">Audio & Video</a></li>
                                                            <li><a href="shop.html">Televisions</a></li>
                                                            <li><a href="shop.html">TV Receivers</a></li>
                                                            <li><a href="shop.html">TV Sticks</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-column-item"><a href="shop.html">Audio & Video</a>
                                                        <ul>
                                                            <li class="mega-menu-banner"><a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/megamenu_banner.jpg" alt=""></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul class="more_slide_open">
                                                    <li><a href="shop.html"><i class="flaticon-make-up"></i>Health Product<span>-20%</span></a></li>
                                                    <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-smartwatch"></i>Western woman</a>
                                                        <ul class="megamenu">
                                                            <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                                <ul>
                                                                    <li><a href="shop.html">Cables & Adapters</a></li>
                                                                    <li><a href="shop.html">Batteries</a></li>
                                                                    <li><a href="shop.html">Chargers</a></li>
                                                                    <li><a href="shop.html">Bags & Cases</a></li>
                                                                    <li><a href="shop.html">Electronic Cigarettes</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="sub-column-item"><a href="shop.html">Smart Electronics</a>
                                                                <ul>
                                                                    <li><a href="shop.html">Cables & Adapters</a></li>
                                                                    <li><a href="shop.html">Chargers</a></li>
                                                                    <li><a href="shop.html">Bags & Cases</a></li>
                                                                    <li><a href="shop.html">Light Bulbs</a></li>
                                                                    <li><a href="shop.html">Watch Fashion</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="sub-column-item"><a href="shop.html">Accessories & Parts</a>
                                                                <ul>
                                                                    <li><a href="shop.html">Projectors</a></li>
                                                                    <li><a href="shop.html">Audio Amplifier Boards</a></li>
                                                                    <li><a href="shop.html">Smart Electronics</a></li>
                                                                    <li><a href="shop.html">Bags & Cases</a></li>
                                                                    <li><a href="shop.html">Tees, Knits & Pools</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="sub-column-item"><a href="shop.html">Electronic Cigarettes</a>
                                                                <ul>
                                                                    <li><a href="shop.html">Audio & Video</a></li>
                                                                    <li><a href="shop.html">Televisions</a></li>
                                                                    <li><a href="shop.html">TV Receivers</a></li>
                                                                    <li><a href="shop.html">Projectors</a></li>
                                                                    <li><a href="shop.html">TV Sticks</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="sub-column-item"><a href="shop.html">Portable Audio & Video</a>
                                                                <ul>
                                                                    <li><a href="shop.html">Portable Audio & Video</a></li>
                                                                    <li><a href="shop.html">Audio & Video</a></li>
                                                                    <li><a href="shop.html">Televisions</a></li>
                                                                    <li><a href="shop.html">TV Receivers</a></li>
                                                                    <li><a href="shop.html">TV Sticks</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="sub-column-item"><a href="shop.html">Audio & Video</a>
                                                                <ul>
                                                                    <li class="mega-menu-banner"><a href="shop.html"><img src="{{ asset('frontend_assets') }}/img/images/megamenu_banner.jpg" alt=""></a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="shop.html"><i class="flaticon-lamp"></i>Industrial Product</a></li>
                                                </ul>
                                            </li>
                                            <li class="more-categories">
                                                All Categories
                                                <i class="fas fa-chevron-right"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class="active menu-item-has-children"><a href="#">Home</a>
                                                <ul class="submenu">
                                                    <li class="active"><a href="index.html">Home One</a></li>
                                                    <li><a href="index-2.html">Home Two</a></li>
                                                    <li><a href="index-3.html">Home Three</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="#">SHOP</a>
                                                <ul class="submenu">
                                                    <li><a href="shop.html">Our Shop</a></li>
                                                    <li><a href="shop-details.html">shop Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="promotion.html">PROMOTION</a></li>
                                            <li class="menu-item-has-children"><a href="#">BLOG</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Our blog</a></li>
                                                    <li><a href="blog-details.html">blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="index-3.html">SPECIAL</a></li>
                                            <li class="menu-item-has-children"><a href="#">PAGES</a>
                                                <ul class="submenu">
                                                    <li><a href="become-vendor.html">become a vendor</a></li>
                                                    <li><a href="vendor-profile.html">vendor Profile</a></li>
                                                    <li><a href="vendor-setting.html">vendor setting</a></li>
                                                    <li><a href="coupon.html">coupon list</a></li>
                                                    <li><a href="contact.html">contact</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="vendor-list.html">vendor Store List</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-action d-none d-md-block">
                                        <ul>
                                            <li class="header-btn"><a href="shop.html">Super Discount <img src="{{ asset('frontend_assets') }}/img/images/discount_shape.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <nav class="menu-box">
                                    <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
                                    <div class="nav-logo"><a href="index.html"><img src="{{ asset('frontend_assets') }}/img/logo/logo.png" alt="" title=""></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu-backdrop"></div>
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->


        {{-- CONTENT AREA START--}}

            @yield('content')

        {{-- CONTENT AREA END--}}


        <!-- newsletter-area -->
        <section class="newsletter-area pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="newsletter-wrap">
                            <div class="newsletter-content">
                                <h2 class="title">Sign Up for Weekly <span>Newsletter</span></h2>
                                <p>Get 10% off new collection special Investigationes demonstraverunt</p>
                            </div>
                            <div class="newsletter-form">
                                <form action="#">
                                    <input type="text" placeholder="Your email here...">
                                    <button type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- newsletter-area-end -->
    </main>
    <!-- main-area-end -->

    <!-- footer-area -->
    <footer>
        <div class="footer-area">
            <div class="footer-top pt-60 pb-40">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="footer-widget mb-30">
                                <div class="f-logo mb-25">
                                    <a href="index.html"><img src="{{ asset('frontend_assets') }}/img/logo/logo.png" alt=""></a>
                                </div>
                                <div class="footer-content">
                                    <span>Got Question? Call us 24/7</span>
                                    <a href="tel:0123456" class="contact">0-333-6666-7777</a>
                                    <p>Register now to get updates on pronot get up ions & coupons ster now toon.</p>
                                </div>
                                <div class="footer-social">
                                    <ul>
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-4">
                            <div class="footer-widget mb-30">
                                <div class="fw-title mb-20">
                                    <h2 class="title">INFORMATION</h2>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        <li><a href="contact.html">About Us</a></li>
                                        <li><a href="contact.html">Careers</a></li>
                                        <li><a href="contact.html">Orders & Shipping</a></li>
                                        <li><a href="contact.html">Office Supplies</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="contact.html">Customer Service</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30">
                                <div class="fw-title mb-20">
                                    <h2 class="title">MY ACCOUNT</h2>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                      <li><a href="shop.html">Track My Order</a></li>
                                        <li><a href="shop.html">View Cart</a></li>
                                        <li><a href="contact.html">Sign In</a></li>
                                        <li><a href="contact.html">Help</a></li>
                                        <li><a href="shop.html">My Wishlist</a></li>
                                        <li><a href="contact.html">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget mb-30">
                                <div class="fw-title mb-20">
                                    <h2 class="title">CUSTOMER SERVICE</h2>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        <li><a href="vendor-setting.html">Payment Methods</a></li>
                                        <li><a href="contact.html">Money-back guarantee!</a></li>
                                        <li><a href="contact.html">Products Returns</a></li>
                                        <li><a href="contact.html">Support Center</a></li>
                                        <li><a href="vendor-list.html">Shipping</a></li>
                                        <li><a href="contact.html">Term and Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <div class="copyright-text">
                                <p>Copyright ©2022 Olle All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="cart-img text-end">
                                <img src="{{ asset('frontend_assets') }}/img/images/cart_img.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->



    <!-- JS here -->
    <script src="{{ asset('frontend_assets') }}/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/jquery.countdown.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/jquery.mCustomScrollbar.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/jquery-ui.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/slick.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/wow.min.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/main.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/custom.js"></script>

    {!! NoCaptcha::renderJs() !!}
    @yield('footer_script')

</body>
</html>