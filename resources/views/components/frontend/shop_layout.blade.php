

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
                                                <li><a href="{{route('vendor.product',['id'=>$vendor->id])}}">{{$vendor->shop_name}} <i class="fa-solid fa-angles-right"></i></a></li>
                                                {{-- <li><a href="/vendor/all/product?id={{$vendor->id}}&shopname={{$vendor->shop_name}}">{{$vendor->shop_name}} <i class="fa-solid fa-angles-right"></i></a></li> --}}
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
                                @foreach ($products as $product)
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
                                        @include('components.frontend.productgrid')
                                    </div>
                                @endforeach
                            </div>
                            <div class="shop-bottom-wrap">
                                <div class="shop-bottom-top">
                                    <h5 class="title"></h5>
                                    <p>Showing 1-09 of 30 Item(S)</p>
                                </div>
                                <div class="shop-bottom-box">
                                    <div class="shop-bottom-left">
                                        <form action="#">
                                            <select id="short-By" name="select" class="form-select" aria-label="Default select example">
                                                <option value="">Show 09</option>
                                                <option>Show 12</option>
                                                <option>Show 08</option>
                                                <option>Show 06</option>
                                                <option>Show 03</option>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="shop-bottom-right">
                                        <form action="#">
                                            <select id="short-by" name="select" class="form-select" aria-label="Default select example">
                                                <option value="">Default sorting</option>
                                                <option>Free Shipping</option>
                                                <option>Best Match</option>
                                                <option>Newest Item</option>
                                                <option>Size A - Z</option>
                                            </select>
                                        </form>
                                        {{-- <ul>
                                            <li class="active"><a href="#"><i class="fa-solid fa-table-cells"></i></a></li>
                                            <li><a href="#"><i class="fa-solid fa-bars"></i></a></li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- shop-area-end -->
