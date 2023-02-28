<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ getGeneralValue("website_title") }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/general_photos/favicon')}}/{{getGeneralValue("favicon")}}">

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
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/summernote-lite.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/summernote-bs4.css">
        <link rel="stylesheet" href="{{ asset('dashboard_assets')}}/css/submits.css">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        @livewireStyles
        @yield('header_css')
    </head>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        @if (getGeneralValue('twak_io_status') == 'active')
            s1.src="{{ getGeneralValue('twak_io_id')}}";
        @endif
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <body>

        <!-- Preloader -->
        {{-- <div id="preloader">
            <div id="preloader-status">
                <div class="preloader-position loader"> <span></span> </div>
            </div>
        </div> --}}
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
                                    @guest
                                    <li><a href="{{ route('vendor.login') }}">Vendor Login</a></li>
                                    {{-- <li><a href="{{ route('become.vendor') }}">Become a Vendor</a></li> --}}
                                    <li><a href="{{ route('plans') }}">Become a Vendor</a></li>
                                    @endguest
                                    <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
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
                                 @if (getGeneralValue("logo"))
                                     <a  href="{{ route('home') }}"><img style="min-width: 100px !important;" src="{{asset('storage/general_photos/logo')}}/{{ getGeneralValue("logo") }}" alt=""></a>
                                 @else
                                     <a href="{{ route('home') }}"><img  width="100" src="{{asset('uploads/demo/demo_logo.jpg')}}" alt="demo_logo.jpg"></a>
                                 @endif
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-9">
                            <div class="d-block m-d-flex d-sm-flex align-items-center justify-content-end">
                                <div class="header-search-wrap">
                                    <form action="{{route('search')}}">
                                        <input type="search" name="q" placeholder="Search for product...">
                                        <button><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-action">
                                    <ul>
                                        @auth
                                            <li class="header-shop">
                                                <a class="m-f-size" href="{{ route('wishlist') }}">
                                                    <i class="fa-regular fa-heart"></i>Wishlist
                                                    <span class="cart-count" style="right: 2px !important;">{{ wishlist() }}</span>
                                                </a>
                                            </li>
                                            {{-- <li><a href="#"><i class="fas fa-redo"></i>Compare</a></li> --}}
                                            <li class="header-shop">
                                                <a class="m-f-size" href="{{ route('cart') }}">
                                                    <i class="flaticon-shopping-bag"></i>Cart
                                                    <span class="cart-count">{{ cart() }}</span>
                                                </a>
                                            </li>
                                        @endauth
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
                                                @elseif (auth()->user()->role == 'staff')
                                                <a href="{{ route('vendor.dashboard') }}">
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
                                         <li class="ms-1 m-f-size m-t-15" >
                                              <style>
                                                .ms-1 {
                                                 margin-left: ($spacer * .30) !important;
                                                }
                                            </style>
                                               <a class="m-f-size" href="{{ route('customer.login') }}">Login -</a>
                                            </li>
                                           <li class="ms-1 m-f-size m-t-15">
                                            <style>
                                                .ms-1 {
                                                 margin-left: ($spacer * .25) !important;
                                                }
                                            </style>
                                               <a class="m-f-size" href="{{ route('customer.register') }}">Register</a>
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
                                        <a href="{{ route('home') }}"><img src="{{ asset('frontend_assets') }}/img/logo/w_logo.png" alt=""></a>
                                    </div>

                                    @php
                                        $home_page = url('/');
                                        $current_page = url()->current();
                                        $fix_categories = category();
                                    @endphp
                                    <div class="header-category">
                                        <a href="#" class="cat-toggle">
                                            <i class="fas fa-bars"></i>
                                            Browse Categories
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        @php
                                            $categories = category();
                                        @endphp
                                        <ul class="category-menu" @if ($current_page != $home_page) style="display: none;" @endif>
                                            {{-- <li><a href="shop.html"><i class="flaticon-make-up"></i>Health and Beauty </a>
                                            </li> --}}
                                            @foreach ($categories as $category)
                                                <li class="menu-item-has-children"><a href="{{route('category.product',$category->slug)}}"><i class="{{$category->icon}}"></i>{{$category->category_name}}</a>
                                                    <ul class="megamenu">
                                                        <li class="sub-column-item"><a href="#">Sub Categories</a>
                                                            @php
                                                                $subCategories=subCategory($category->slug)
                                                            @endphp
                                                            <ul>
                                                                @foreach ($subCategories as $subCategory)
                                                                    <li><a href="{{route('subcategory.products',['slug'=>$category->slug,'id'=>$subCategory->id,'scName'=>$subCategory->category_name])}}">{{$subCategory->category_name}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        {{-- <li class="sub-column-item"><a href="shop.html">Smart Electronics</a>
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
                                                        </li> --}}
                                                        <li class="sub-column-item"><a href="shop.html">Category Thumbnail</a>
                                                            <ul>
                                                                <li class="mega-menu-banner"><a href="shop.html"><img src="{{asset('uploads/category_photo')}}/{{$category->thumbnail}}" alt=""></a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endforeach
                                            {{-- <li class="menu-item-has-children"><a href="shop.html"><i class="flaticon-rim"></i>Automotive & Motorcycle </a>
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
                                            </li> --}}
                                        </ul>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">

                                        @php
                                            $url = explode('/',url()->current());
                                            $current_page = end($url);
                                        @endphp
                                        <ul class="navigation">
                                            <li class="@if ($current_page == '127.0.0.1:8000') active @endif"><a href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li class="@if ($current_page == 'shop') active @endif"><a href="{{ route('shop.page') }}">SHOP</a>
                                            {{-- <li><a href="{{ route('single.product') }}">single Product</a></li> --}}

                                               {{-- <ul class="submenu">
                                                    <li><a href="shop.html">Our Shop</a></li>
                                                </ul> --}}
                                            </li>
                                            <li class="menu-item-has-children"><a href="{{route('post.blog')}}">Blogs</a>
                                                {{-- <ul class="submenu">
                                                    <li><a href="shop.html">Our Blog</a></li>
                                                    <li><a href="shop-details.html">Blog Details</a></li>
                                                </ul> --}}
                                            </li>
                                            <li class="@if ($current_page == 'offers') active @endif"><a href="{{ route('offers') }}">Offers</a>
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- <div class="header-action d-none d-md-block">
                                        <ul>
                                            <li class="header-btn"><a href="shop.html">Super Discount <img src="{{ asset('frontend_assets') }}/img/images/discount_shape.png" alt=""></a></li>
                                        </ul>
                                    </div> --}}
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
                                        @auth
                                        <li class="header-sine-in" style="text-align: center !important;">
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
                                            @elseif (auth()->user()->role == 'staff')
                                            <a href="{{ route('vendor.dashboard') }}">
                                                <i class="flaticon-user"></i>
                                                <p>{{ Str::title(auth()->user()->name) }}</span></p>
                                            </a>
                                            @endif
                                        </li>
                                    @endauth
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
                                @if($errors->any('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <form action="{{ route('newsletter.store') }}" method="post">
                                    @csrf
                                    <input type="text" placeholder="Your email here..." name="email">
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
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-8 m-w-50">
                            <div class="footer-widget mb-30">
                                <div class="f-logo mb-25">
                                    <a href="{{ route('home') }}"><img style="max-width: 100px !important;" src="{{asset('storage/general_photos/logo')}}/{{ getGeneralValue("logo") }}" alt=""></a>
                                </div>
                                <div class="footer-content">
                                    <span>Got Question? Call us 24/7</span>
                                    <a href="tel:0123456" class="contact">0-333-6666-7777</a>
                                    <p>Register now to get updates on pronot get up ions & coupons ster now toon.</p>
                                </div>
                                <div class="footer-social">
                                    <ul>
                                        @if (socialLinks())
                                            @foreach (socialLinks() as $social)
                                            <li><a href="{{ $social->social_link }}">
                                                @if ($social->social_icon)
                                                   <i class="{{ $social->social_icon }}"></i>
                                                @else
                                                   <picture>
                                                    <img src="{{ asset('uploads/social_image/') }}/{{ $social->social_image }}" alt="$social->social_image">
                                                   </picture>

                                                @endif
                                                </a>
                                            </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-4 m-w-50">
                            <div class="footer-widget mb-30">
                                <div class="fw-title mb-20">
                                    <h2 class="title">INFORMATION</h2>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        <li><a href="{{ route('front.pages',1) }}">About Us</a></li>
                                        <li><a href="{{ route('front.pages',2) }}">Careers</a></li>
                                        <li><a href="{{ route('front.pages',3) }}">Orders & Shipping</a></li>
                                        <li><a href="{{ route('front.pages',4) }}">Office Supplies</a></li>
                                        <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                                        <li><a href="{{ route('contact.us') }}">Customer Service</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 m-w-50">
                            <div class="footer-widget mb-30">
                                <div class="fw-title mb-20">
                                    <h2 class="title">MY ACCOUNT</h2>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                      <li><a href="{{ route('front.pages',5) }}">Track My Order</a></li>
                                        <li><a href="{{ route('cart') }}">View Cart</a></li>
                                        @guest
                                        <li><a href="{{ route('customer.login') }}">Sign In</a></li>
                                            <li><a href="{{ route('plans') }}">Become a Vendor</a></li>
                                        @endguest
                                        <li><a href="{{ route('wishlist') }}">My Wishlist</a></li>
                                        <li><a href="{{ route('front.pages',6) }}">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 m-w-50">
                            <div class="footer-widget mb-30">
                                <div class="fw-title mb-20">
                                    <h2 class="title">CUSTOMER SERVICE</h2>
                                </div>
                                <div class="fw-link">
                                    <ul>
                                        <li><a href="{{ route('front.pages',7) }}">Payment Methods</a></li>
                                        <li><a href="{{ route('front.pages',8) }}">Money-back guarantee!</a></li>
                                        <li><a href="{{ route('front.pages',9) }}">Products Returns</a></li>
                                        <li><a href="{{ route('front.pages',10) }}">Support Center</a></li>
                                        <li><a href="{{ route('front.pages',11) }}">Shipping</a></li>
                                        <li><a href="{{ route('front.pages',12) }}">Term and Conditions</a></li>
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
                                <p>{{ getGeneralValue("copyright_text") }}</p>
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

    <style>
        @media (min-width:320px) and (max-width:575px){
            .m-t-15{
                margin-top: -15px;
            }

            .m-d-flex{
                display: flex !important;
                justify-content: space-between !important;
                align-items: center !important;
            }
            .m-f-size{
                font-size: 10px !important;
            }
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
    <script src="{{ asset('frontend_assets') }}/js/product.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/custom.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/submit.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/summernote-lite.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="{{ asset('frontend_assets') }}/js/summernote-bs4.js"></script>
    <script src="{{ asset('frontend_assets') }}/js/summernote-bs5.js"></script> --}}


{{-- charts js start --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.0-release/chart.min.js"></script> --}}
{{-- charts js end --}}

    {!! NoCaptcha::renderJs() !!}

    @livewireScripts
    @yield('footer_script')
</body>
</html>
