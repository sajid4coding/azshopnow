@extends('layouts.frontendmaster')
@section('content')
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
                            <h4 class="title">Best Seller</h4>
                        </div>
                        <div class="sidebar-product-list">
                            <ul>
                                <li>
                                    <div class="thumb">
                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/sidebar_product01.jpg" alt="img"></a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="shop-details.html">Appliance Aid Kitchen Stand</a></h6>
                                        <div class="rating">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <h4 class="price"><del>$39.08</del> $19.00</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="thumb">
                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/sidebar_product02.jpg" alt="img"></a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="shop-details.html">One Washer Dryer</a></h6>
                                        <div class="rating">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <h4 class="price"><del>$39.08</del> $19.00</h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="thumb">
                                        <a href="shop-details.html"><img src="{{ asset('frontend_assets') }}/img/product/sidebar_product03.jpg" alt="img"></a>
                                    </div>
                                    <div class="content">
                                        <h6 class="title"><a href="shop-details.html">Electric Blender Mixer</a></h6>
                                        <div class="rating">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <h4 class="price"><del>$39.08</del> $19.00</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget mb-40">
                        <div class="widget-title price-title mb-15">
                            <h4 class="title">Filter by price :</h4>
                        </div>
                        <div class="price_filter">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <input type="submit" class="btn" value="Filter">
                                <span>Price :</span>
                                <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                            </div>
                        </div>
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
                        <form action="#">
                            <label for="shortBy">sort By</label>
                            <select id="shortBy" name="select" class="form-select" aria-label="Default select example">
                                <option value="">Sorting</option>
                                <option>Free Shipping</option>
                                <option>Best Match</option>
                                <option>Newest Item</option>
                                <option>Size A - Z</option>
                            </select>
                        </form>
                        {{-- <ul>
                            <li>View</li>
                            <li class="active"><a href="#"><i class="fa-solid fa-table-cells"></i></a></li>
                            <li><a href="#"><i class="fa-solid fa-bars"></i></a></li>
                        </ul> --}}
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($products->shuffle() as $product)
                        <div class="row mb-20" >
                            <div class="col-xl-12">
                                <div class="vendor-wrap" style="background: #EFEFED !important" >
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-8">
                                            <div class="vendor-content">
                                                <div class="content-top mb-20">
                                                    <div class="icon">
                                                        <i class="fa-solid fa-sliders"></i>
                                                    </div>
                                                    <div class="content">
                                                       <h2>
                                                        <a href="{{route('vendor.product',['id'=>$product->vendor_id,'shopname'=>Str::slug($product->relationwithuser->shop_name)])}}">{{Str::limit($product->relationwithuser->shop_name,12)}}</a>
                                                        </h2>
                                                        <ul>
                                                            @php
                                                                $createdTime=$product->relationwithuser->created_at->diffForHumans()
                                                            @endphp
                                                            <li>{{$createdTime}}</li>
                                                            <li><a href="#">Verified <img src="{{ asset('frontend_assets') }}/img/icon/verified_icon.png"
                                                                        alt=""></a></li>
                                                            {{-- <li> Order</li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                                {{-- <div class="ranking mb-30">
                                                    <ul>
                                                        <li>No.1 Vendor Rankings</li>
                                                        <li>Annual Sales $45,000,00</li>
                                                    </ul>
                                                </div> --}}
                                                <div class="vendor-services">
                                                    <ul>
                                                        <li>
                                                            <h2 class="title">{{vendorOrderCount($product->vendor_id)}}</h2>
                                                            <p>Total Sold</p>
                                                        </li>
                                                        <li>
                                                            <h2 class="title">${{vendorTotalEarnigs($product->vendor_id)}}</h2>
                                                            <p>Total Earnings</p>
                                                        </li>
                                                        {{-- <li>
                                                            <h2 class="title">100%</h2>
                                                            <p>On-time delivery</p>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-12">
                                            <div class="vendor-product-wrap">
                                                @php
                                                   $vendorProducts= vendorProducts($product->vendor_id)
                                                @endphp
                                                <ul>
                                                    @foreach ($vendorProducts as $vendorProduct)
                                                        <li class="vendor-product">
                                                            <div class="thumb">
                                                                <a href="{{route('single.product', ['id'=>$vendorProduct->id,'title'=>Str::slug($vendorProduct->product_title)])}}"><img
                                                                        src="{{ asset('uploads/product_photo') }}/{{$vendorProduct->thumbnail}}" alt=""></a>
                                                            </div>
                                                            <div class="content">
                                                                <h2 class="title"><a href="{{route('single.product', ['id'=>$vendorProduct->id,'title'=>Str::slug($vendorProduct->product_title)] )}}">{{Str::limit($vendorProduct->product_title,8)}}</a></h2>
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
                        {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">

                        </div> --}}
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


