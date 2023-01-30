@extends('layouts.frontendmaster')
@section('content')

<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area" style="padding:50px 0;background: url(@if($banners->shop_page_banner) {{ asset('uploads/banners') }}/{{ $banners->shop_page_banner }} @else https://flevix.com/wp-content/uploads/2020/07/Red-Blue-Abstract-Background.jpg @endif) no-repeat center; background-size:cover;background-position:center" >
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8 order-2 order-md-0">
                    {{-- <div class="breadcrumb-product text-center">
                        <div class="thumb">
                            <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/br_product_img.png" alt="img"></a>
                            <span>35% OFF</span>
                        </div>
                        <div class="content">
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <h4 class="title"><a href="shop-details.html">Blender Mixer Food</a></h4>
                            <h5 class="price">$37.00</h5>
                        </div>
                    </div> --}}
                    <div class="slider-add-banner banner-active mb-45">
                        @foreach ($bannerProducts as $bannerProducts)
                                <div class="add-banner">
                                    <div class="add-banner-img">
                                        <a href="{{ route('single.product', ['id'=>$bannerProducts->id,'title'=>Str::slug($bannerProducts->product_title)]) }}"><img src="{{ asset('uploads/product_photo') }}/{{$bannerProducts->thumbnail}}" alt=""></a>
                                    </div>
                                    <div class="add-banner-content">
                                        <span>{{Floor(((100*$bannerProducts->product_price)-(100*$bannerProducts->discount_price))/$bannerProducts->product_price)}}% discount</span>
                                        <h2 class="title">{{Str::limit($bannerProducts->product_title,9)}}</h2>
                                        <p>{{staff($bannerProducts->vendor_id)->shop_name}}</p>
                                        <a href="{{ route('single.product', ['id'=>$bannerProducts->id,'title'=>Str::slug($bannerProducts->product_title)]) }}" class="btn">shop now</a>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="breadcrumb-content">
                        <h2 class="title text-light">Sort By - Low To high</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Low To High</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


            <!-- shop-area -->
            <div class="shop-area pt-90 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-md-8 col-sm-10 order-2 order-lg-0">
                            <aside class="shop-sidebar">
                                <div class="widget mb-35">
                                    <div class="widget-title mb-25">
                                        <h4 class="title">Category</h4>
                                    </div>
                                    <div class="shop-cat-list">
                                        @php
                                            $categories= category()
                                        @endphp
                                        <ul>
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a href="{{route('category.product',$category->slug)}}">{{$category->category_name}}<span>{{categoryProductCount($category->slug)}}</span></a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <div class="widget mb-40">
                                    <div class="widget-title mb-25">
                                        <h4 class="title">Most Viewd Products</h4>
                                    </div>
                                    <div class="sidebar-product-list">
                                        <ul>
                                            @php
                                                $mostviewedproducts=mostViewedProducts()
                                            @endphp
                                            @foreach ($mostviewedproducts as $product)
                                                <li>
                                                    <div class="thumb">
                                                        <a href="{{route('single.product', ['id'=>$product->id,'title'=>Str::slug($product->product_title)])}}"><img src="{{ asset('uploads/product_photo') }}/{{$product->thumbnail}}" alt="img"></a>
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="title"><a href="{{route('single.product', ['id'=>$product->id,'title'=>Str::slug($product->product_title)])}}">{{Str::limit($product->product_title,8)}}</a></h6>
                                                        <div class="rating">
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
                                                        @if ($product->discount_price)
                                                            <h4>
                                                                ${{$product->discount_price}}
                                                                <span class="price text-muted">
                                                                    <del> ${{$product->product_price}}</del>
                                                                </span>
                                                            </h4>
                                                        @else
                                                            <h4 class="price">${{$product->product_price}}</h4>
                                                        @endif
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="widget mb-40">
                                    <div class="widget-title price-title mb-15">
                                        <h4 class="title">Filter by price :</h4>
                                    </div>
                                    <form action="{{route('price.filter')}}" method="POST">
                                        @csrf
                                        <div class="price_filter">
                                            <div id="slider-range"></div>
                                            <div class="price_slider_amount">
                                                <input type="submit" class="btn" value="Filter">
                                                <span>Price :</span>
                                                <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="widget">
                                    <div class="widget-title mb-15">
                                        <h4 class="title">All Vendors</h4>
                                    </div>
                                    <div class="shop-brand-list">
                                        @php
                                            $vendors=vendors()
                                        @endphp
                                        <ul>
                                            @foreach ($vendors as $vendor)
                                                <li>
                                                    <a href="{{route('vendor.product',['id'=>$vendor->id ,'shopname'=>Str::slug($vendor->shop_name)])}}">{{$vendor->shop_name}} <i class="fa-solid fa-angles-right"></i></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-lg-8">
                            <div class="shop-top-wrap mb-35">
                                <div class="shop-top-left">
                                    <h5 class="title">Shop</h5>
                                </div>
                                <div class="shop-top-right">
                                    <form action="{{route('product.sorting')}}">
                                       <label for="shortBy">Sorting By &nbsp;</label>
                                        <select id="shortBy" name="select" class="form-select" aria-label="Default select example" style="border: 1px solid">
                                            <option value="default">Default</option>
                                            <option value="lowtohigh">Low To High</option>
                                            <option value="hightolow">High To Low</option>
                                            <option value="newest">Newest Item</option>
                                        </select> &nbsp;
                                        <button style="padding: 5px 20px;
                                        background: #FF4800;
                                        color: #fff;
                                        border: none;">Sort</button>
                                    </form>
                                    {{-- <ul>
                                        <li>View</li>
                                        <li class="active"><a href="#"><i class="fa-solid fa-table-cells"></i></a></li>
                                        <li><a href="#"><i class="fa-solid fa-bars"></i></a></li>
                                    </ul> --}}
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                @foreach ($products as $product)
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
                                        @include('components.frontend.productgrid')
                                    </div>
                                @endforeach
                            </div>
                            <div class="shop-bottom-wrap">
                                <div class="shop-bottom-box">
                                    <div class="shop-bottom-right">
                                            {{$products->links('pagination::bootstrap-5')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- shop-area-end -->

@endsection
