<div>
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
                @foreach ($carts as $cart)
                    <div class="row mb-4 d-flex justify-content-between align-items-center @if(get_inventory($cart->product_id, $cart->size_id, $cart->color_id) < $cart->quantity) light_red ? '' @endif">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                            <img
                            src="{{ asset('uploads/product_photo') }}/{{ $cart->relationwithproduct->thumbnail }}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            @if ($cart->size_id || $cart->color_id)
                                <h6 class="text-muted"><span>Size</span>: {{ $cart->relationwithsize->size }} | <span>Color</span>: {{ $cart->relationwithcolor->color_name  }}</h6>
                            @endif
                            <a href="{{ route('single.product', $cart->relationwithproduct->id) }}" target="_blank" class="text-black fw-bolder">{{ $cart->relationwithproduct->product_title }}</a>
                            <br>
                            @if (get_inventory($cart->product_id, $cart->size_id, $cart->color_id) < $cart->quantity)
                                <small class="badge bg-primary">Available Product</small> : <small class="badge bg-info text-dark">{{ get_inventory($cart->product_id, $cart->size_id, $cart->color_id) }}</small>
                            @endif
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                            <button wire:click="quantity_decrement({{ $cart->id }})" class="p-2" style="border: none">
                            <i class="fas fa-minus"></i>
                            </button>

                            <input wire:keyup="quantity({{ $cart->id }}, $event.target.value)" type="number" value="{{ $cart->quantity }}" class="form-control form-control-sm" />

                            <button wire:click="quantity_increment({{ $cart->id }})" class="p-2" style="border: none">
                            <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                            <h6 class="mb-0">${{ cart_total($cart->product_id, $cart->quantity) }}
                                @php
                                    $subtotal += cart_total($cart->product_id, $cart->quantity);
                                @endphp
                            </h6>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <button wire:click="cart_row_delete({{ $cart->id }})" class="bg-transparent border-0 text-muted"><i class="fas fa-times"></i></button>
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
                    <h5>${{ session('cost') ?? 0 }}</h5>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Order Total</h5>
                    <h5>$@if (session('coupon_info'))
                        {{ session('after_discount') + session('cost') }}
                        @else
                            @if (session('cost') != 0)
                                {{-- {{ session('after_discount') + session('shipping_charge') }} --}}
                                {{ session('subtotal') + session('cost') }}
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
                            <button wire:click="apply_coupon({{ $subtotal }},{{ $carts->first()->venor_id }})" class="my-2 btn btn-sm">Apply Coupon</button>
                        </div>
                    </div>
                    <small class="text-danger">{{ $coupon_error }}</small>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>$@if(session('coupon_info'))
                            {{ session('after_discount') + session('cost') }}
                        @else
                            @if (session('cost') != 0)
                                {{ session('subtotal') + session('cost') }}
                            @else
                                {{ round(session('subtotal')) }}
                            @endif
                        @endif
                    </h5>
                </div>
                @if ($shipping_id != 0)
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-dark my-2 btn btn-sm">Procced to cheackout</button>
                    </div>
                @endif
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>