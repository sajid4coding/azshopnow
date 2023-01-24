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
                        <h5 class="title">List of Vendors By Each Categories</h5>
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


