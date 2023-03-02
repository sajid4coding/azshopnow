<div>
    @if (cart() == 0)
    <!-- empty_cart_section - start
    ================================================== -->
    <section class="empty_cart_section section_space">
        <div class="container m-5">
            <div class="empty_cart_content text-center">
                <span class="cart_icon display-4 text-primary">
                    <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                </span>
                <h3 class="text-primary">There are no more items in your cart</h3>
                <a class="btn btn-primary" href="{{ route('shop.page') }}"><i class="fa fa-chevron-left"></i> Continue shopping </a>
            </div>
        </div>
    </section>
    <!-- empty_cart_section - end
    ================================================== -->
    @else

    <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
        <div class="card-body p-0">
            <div class="row g-0">
            <div class="col-lg-8">
                <div class="p-5">
                <div class="d-flex justify-content-between align-items-center mb-5 from-select">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                    <h6 class="mb-0 text-muted">{{ $carts->count() }} items</h6>
                </div>
                <hr class="my-4">

                @php
                    $subtotal = 0;
                @endphp

                <style>
                    .light_red{
                        background: rgba(196, 53, 53, 0.507);
                    }
                </style>
                    @php
                        $flag = false;
                    @endphp
                @foreach ($carts as $cart)
                    @php
                        if(get_inventory($cart->product_id, $cart->size_id, $cart->color_id) < $cart->quantity){
                            $flag = true;
                        }else{
                            $flag = false;
                        }
                    @endphp
                    <div class="row mb-4 d-flex justify-content-between align-items-center @if ($flag == true) light_red @endif">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                            <img
                            src="{{ asset('uploads/product_photo') }}/{{ $cart->relationwithproduct->thumbnail }}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            @if ($cart->size_id && $cart->color_id)
                                <h6 class="text-muted"><span>Size</span>: {{ $cart->relationwithsize->size }} | <span>Color</span>: {{ $cart->relationwithcolor->color_name  }}</h6>
                            @elseif ($cart->size_id)
                                <h6 class="text-muted"><span>Size</span>: {{ $cart->relationwithsize->size }}</h6>
                            @elseif ($cart->color_id)
                                <h6 class="text-muted"><span>Color</span>: {{ $cart->relationwithcolor->color_name }}</h6>
                            @endif
                            <a href="{{ route('single.product', ['id'=>$cart->relationwithproduct->id,'title'=>Str::slug($cart->relationwithproduct->product_title)]) }}" target="_blank" class="text-black fw-bolder">{{ $cart->relationwithproduct->product_title }}</a>
                            <br>
                            @if (get_inventory($cart->product_id, $cart->size_id, $cart->color_id) < $cart->quantity)
                                <small class="badge bg-primary">Available Product</small> : <small class="badge bg-info text-dark">{{ get_inventory($cart->product_id, $cart->size_id, $cart->color_id) }}</small>
                            @endif
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                            <button wire:click="quantity_decrement({{ $cart->id }})" class="p-2" style="border: none">
                            <i class="fas fa-minus"></i>
                            </button>

                            <input style="width: 4rem;text-align:center;" wire:keyup="quantity({{ $cart->id }}, $event.target.value)" type="text" value="{{ $cart->quantity }}" class="form-control" />

                            <button wire:click="quantity_increment({{ $cart->id }})" class="p-2" style="border: none">
                            <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                            <h6 class="mb-0">${{ cart_total($cart->product_id, $cart->quantity, $cart->size_id, $cart->color_id) }}
                                @php
                                    $subtotal += cart_total($cart->product_id, $cart->quantity, $cart->size_id, $cart->color_id)
                                @endphp
                            </h6>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end m-d-i-block">
                            <button  wire:click="cart_row_delete({{ $cart->id }})" class="bg-transparent  border-0 text-muted"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <hr class="my-4">
                @endforeach

                <div class="pt-5">
                    <h6 class="mb-0"><a href="#!" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                </div>
                </div>
            </div>
            <div class="col-lg-4 bg-grey">
                <div class="p-5">
                <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                <hr class="my-4 bg-success">
                <div class="bg-dark text-white p-3 mb-2 py-3 mb-4">
                    @foreach ($packagings as $packaging)
                        <div class="form-check mb-2">
                            <input id="packaging{{$packaging->id}}" type="radio" wire:click="packagingSelect({{$packaging->id}})" class="form-check-input" name="packaging" value="packagingCost"  />
                            <label for="packaging{{$packaging->id}}" class="form-check-label text-white">{{$packaging->packaging_name}} - ${{$packaging->cost}}</label>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <h5 class="text-uppercase">Subtotal</h5>
                    <h5>${{ $subtotal }}</h5>
                    @php
                        session(['subtotal' => round($subtotal)])
                    @endphp
                </div>
                @if (session('coupon_info'))
                    <div class="d-flex justify-content-between mb-2">
                        <h5 class="text-uppercase text-danger">Discount (-)</h5>
                        <h5 class="text-danger">$
                            @if (session('coupon_info')->discount_type == 'percentage')
                                {{ session('coupon_info')->coupon_amount }}% <small>({{ session('coupon_info')->coupon_code }})</small>
                            @else
                                {{ session('coupon_info')->coupon_amount }} <small>({{ session('coupon_info')->coupon_code }})</small>
                            @endif
                        </h5>
                    </div>
                @endif
                @if (session('coupon_info'))
                <div class="d-flex justify-content-between mb-2">
                    <h5 class="text-uppercase">After Coupon Discount</h5>
                        <h5>$
                            @if (session('coupon_info')->discount_type == 'percentage')
                                {{ round($subtotal - (session('coupon_info')->coupon_amount * $subtotal) / 100) }}
                                @php
                                    session(['after_discount' => round($subtotal - (session('coupon_info')->coupon_amount * $subtotal) / 100)])
                                @endphp
                            @else
                                {{ round($subtotal - session('coupon_info')->coupon_amount) }}
                                @php
                                    session(['after_discount' => round($subtotal - session('coupon_info')->coupon_amount)])
                                @endphp
                            @endif
                        </h5>
                    </div>
                @endif
                <div class="d-flex justify-content-between mb-2">
                    <h5 class="text-uppercase text-success">Delivery Charge (+)</h5>
                    <h5>${{ session('shipping_cost') ?? 0 }}</h5>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <h5 class="text-uppercase text-success">Packaging Charge (+)</h5>
                    <h5>${{ session('packagingCost')->cost ?? 0 }}</h5>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Order Total</h5>
                    <h5>$@if (session('coupon_info'))
                        {{ session('after_discount') + session('shipping_cost') + session('packagingCost')->cost }}
                        @else
                            @if (session('shipping_cost') != 0 && session('packagingCost') )
                                {{ session('subtotal') + session('shipping_cost') + session('packagingCost')->cost }}

                            @elseif(session('packagingCost'))
                                {{ round(session('subtotal') + session('packagingCost')->cost) }}

                            @else
                                {{ round(session('subtotal')) }}

                            @endif
                        @endif
                    </h5>
                </div>

                <h5 class="text-uppercase mb-3">Shipping</h5>

                <div class="mb-4 pb-2">
                    <select class="form-select" wire:model="shipping">
                        <option value="0">Select Your Option</option>
                        @foreach ($shippings as $shipping)
                            <option value="{{ $shipping->id }}">{{ $shipping->shipping_name }}</option>
                        @endforeach
                    </select>
                </div>
                <h5 class="text-uppercase mb-3">Coupon code</h5>
                <div class="mb-5">
                    <div class="form-outline">
                        {{-- <input type="text" id="form3Examplea2" class="form-control form-control-lg" /> --}}
                        {{-- <label class="form-label" for="form3Examplea2">Enter your code</label> --}}
                        <input class="form-control form-control-lg" type="text" wire:model="coupon" placeholder=" @if (session('coupon_info')) {{ session('coupon_info')->coupon_code }} @else Coupon Code... @endif">
                        <div class="d-flex justify-content-center">
                            <button wire:click="apply_coupon({{ $subtotal }},{{ $carts->first()->vendor_id }})" class="my-2 btn btn-primary btn-sm">Apply Coupon</button>
                        </div>
                    </div>
                    <small class="text-danger">{{ $coupon_error }}</small>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>$@if(session('coupon_info'))
                            {{ session('after_discount') + session('shipping_cost') + session('packagingCost')->cost }}
                        @else
                            @if (session('shipping_cost') != 0 && session('packagingCost'))
                                {{ session('subtotal') + session('shipping_cost') + session('packagingCost')->cost }}
                            @elseif (session('packagingCost'))
                                {{ round(session('subtotal')+ session('packagingCost')->cost) }}
                            @else
                                {{ round(session('subtotal')) }}
                            @endif
                        @endif
                    </h5>
                </div>
                {{ session('cart_detail') }}
                @if ($flag == false)
                    @if ($shipping_id != 0)
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('checkout') }}" class="btn btn-dark my-2 btn btn-primary btn-sm">Procced to checkout</a>
                        </div>
                    @endif
                @endif
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    @endif
    <style>
        @media (min-width:320px) and (max-width:575px){
            .m-d-i-block{
                display: block !important;
                margin-top: -193px !important;
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
</div>
