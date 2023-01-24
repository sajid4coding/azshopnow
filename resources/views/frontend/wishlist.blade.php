@extends('layouts/frontendmaster')
@section('header_css')

@endsection
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area-four" style="padding:50px 0;background: url(@if($banners->cart_page_banner) {{ asset('uploads/banners') }}/{{ $banners->cart_page_banner }} @else https://flevix.com/wp-content/uploads/2020/07/Red-Blue-Abstract-Background.jpg @endif) no-repeat center; background-size:cover;" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="breadcrumb-content">
                        <h2 class="title">Wishlist</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="breadcrumb-img text-end">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    @if (wishlist() == 0)
    <!-- empty_wishlist_section - start
    ================================================== -->
    <section class="empty_cart_section section_space">
        <div class="container m-5">
            <div class="empty_cart_content text-center">
                <span class="cart_icon display-4 text-primary">
                    <i class="fa-solid fa-heart"></i>
                </span>
                <h3 class="text-primary">This wishlist is empty.</h3>
                <p>
                    You don't have any products in the wishlist yet. <br>
                    You will find a lot of interesting products on our "Shop" page.
                </p>
                <a class="btn btn-primary" href="{{ route('shop.page') }}"><i class="fa fa-chevron-left"></i> Continue shopping </a>
            </div>
        </div>
    </section>
    <!-- empty_wishlist_section - end
    ================================================== -->
    @else

    <!-- cart_section - start
    ================================================== -->
    <section class="cart_section section_space py-5">
        <div class="container">
            <div class="card p-5">
            <div class="cart_table">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>PRODUCT</th>
                            <th class="text-center">PRICE</th>
                            <th class="text-center">STOCK STATUS</th>
                            <th class="text-center">ADD TO CART</th>
                            <th class="text-center">REMOVE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wishlists as $wishlist)
                            <tr>
                                <td>
                                    <div class="cart_product">
                                        <img width="50" src="{{ asset('uploads/product_photo') }}/{{ $wishlist->relationwithproduct->thumbnail }}" alt="image_not_found" />
                                        <a class="" style="color:#FF4800;" href="{{ route('single.product', ['id'=>$wishlist->relationwithproduct->id,'title'=>$wishlist->relationwithproduct->product_title]) }}">{{ $wishlist->relationwithproduct->product_title }}</span>
                                    </div>
                                </td>
                                <td class="text-center" style="padding-top: 20px">
                                    @if ($wishlist->relationwithproduct->discount_price)
                                        <span class="price_text">${{ $wishlist->relationwithproduct->discount_price }}</span>
                                        <del>${{ $wishlist->relationwithproduct->product_price }}</del>
                                    @else
                                        <span class="price_text">${{ $wishlist->relationwithproduct->product_price }}</span>
                                    @endif
                                </td>
                                @if ($wishlist->relationwithinventory->quantity ==0)
                                    <td class="text-center" style="padding-top: 20px"><span class="price_text text-danger">Out Stock</span></td>
                                @else
                                    <td class="text-center" style="padding-top: 20px"><span class="price_text text-success">In Stock</span></td>
                                @endif
                                <td class="text-center" style="padding-top: 20px">
                                    <a href="{{route('single.product', ['id'=>$wishlist->relationwithproduct->id,'title'=>$wishlist->relationwithproduct->product_title])}}" style="padding: 5px 10px; font-size: 10px;" class="btn btn_primary text-dark">Add To Cart</a>
                                </td>
                                <td class="text-center" style="padding-top: 20px">
                                    <a href="{{ route('wishlist.delete', $wishlist->inventory_id) }}" class="remove_btn"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @empty

                        @endforelse

                        {{-- <tr>
                            <td>
                                <div class="cart_product">
                                    <img src="assets/images/compare/compare_img_2.jpg" alt="image_not_found" />
                                    <h3>Your Product Title Here</h3>
                                </div>
                            </td>
                            <td class="text-center"><span class="price_text">$10.50</span></td>
                            <td class="text-center"><span class="price_text text-danger">Out Stock</span></td>
                            <td class="text-center">
                                <a href="#!" class="btn btn_primary">Add To Cart</a>
                            </td>
                            <td class="text-center">
                                <a href="#!" class="remove_btn"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="cart_product">
                                    <img src="assets/images/compare/compare_img_3.jpg" alt="image_not_found" />
                                    <h3>Your Product Title Here</h3>
                                </div>
                            </td>
                            <td class="text-center"><span class="price_text">$10.50</span></td>
                            <td class="text-center"><span class="price_text text-success">In Stock</span></td>
                            <td class="text-center">
                                <a href="#!" class="btn btn_primary">Add To Cart</a>
                            </td>
                            <td class="text-center">
                                <a href="#!" class="remove_btn"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>
    <!-- cart_section - end
    ================================================== -->
    @endif
@endsection
