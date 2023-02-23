

            <!-- shop-area -->
            <div class="shop-area pt-90 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-10 ">
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
                                                <input type="submit" class="btn " value="Filter">
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
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="shop-top-wrap mb-35">
                                <div class="shop-top-left">
                                    <h5 class="title">Shop</h5>
                                </div>
                                <div class="shop-top-right">
                                    <form action="{{route('product.sorting')}}">
                                       <label for="shortBy">Sorting By &nbsp;</label>
                                        <select id="shortBy" name="select" class="form-select !form-control" aria-label="Default select example" style="border: 1px solid">
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
                                @foreach ($products->shuffle() as $product)
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 m-w-50">
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
                <style>
                .btn{
                    background-color: #FF4800 !important;
                    border-color: #FF4800 !important;
                }
                .btn:hover{
                    background-color: #1339FE !important;
                    border-color: #1339FE !important;
                    /* background-color: #1339FE !important; */
                }
                </style>
            </div>
            <!-- shop-area-end -->
