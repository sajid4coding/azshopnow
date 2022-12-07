@extends('layouts.frontendmaster')

@section('content')
<!-- checkout-section - start
================================================== -->
<section class="checkout-section section_space my-5">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
            <div class="woocommerce bg-light p-3">
                <form action="{{ route('checkout_post') }}" method="POST">
                    @csrf
                    <div class="row gx-5">
                            <div class="col-md-8">
                                <div>
                                    <h4 class="py-4">Billing Details</h4>
                                    <div class="row px-4">
                                        <div class="col-6">
                                            <p>
                                                <label for="billing_first_name" class="fw-bold">First Name <abbr class="required">*</abbr></label>
                                                <input type="text" class="form-control" name="billing_first_name" id="billing_first_name" placeholder="" autocomplete="given-name" value="" />
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p>
                                                <label for="billing_email" class="fw-bold">Email Address <abbr class="required">*</abbr></label>
                                                <input type="email" class="form-control" name="billing_email" id="billing_email" placeholder="" autocomplete="email" value="" />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row px-4">
                                        <div class="col-6">
                                            <p>
                                                <label for="billing_company" class="fw-bold">Company Name</label>
                                                <input type="text" class="form-control" name="billing_company" id="billing_company" placeholder="" autocomplete="organization" value="" />
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p>
                                                <label for="billing_phone" class="fw-bold">Phone <abbr class="required">*</abbr></label>
                                                <input type="tel" class="form-control" name="billing_phone" id="billing_phone" placeholder="" autocomplete="tel" value="" />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row px-4">
                                        <div class="col-6">
                                            <p>
                                                <label for="billing_country_code" class="fw-bold">Country <abbr class="required">*</abbr></label>
                                                <select class="form-select" name="billing_country_code" id="billing_country_code" autocomplete="country">
                                                    <option value="">Select a country&hellip;</option>
                                                    {{-- @foreach ($countries as $country)
                                                        <option value="{{ $country->code }}">{{ $country->name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p>
                                                <label for="billing_country_id" class="fw-bold">City <abbr class="required">*</abbr></label>
                                                <select class="form-select" name="billing_country_id" id="billing_country_id" autocomplete="country_code">
                                                    <option value="" >Select Country First&hellip;</option>
                                                    {{-- <option value="AX" selected='selected'>&#197;land Islands</option> --}}
                                                </select>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="px-4">
                                        <label for="billing_address" class="fw-bold">Address <abbr class="required">*</abbr></label>
                                        <input type="text" class="form-control" name="billing_address" id="billing_address" placeholder="Street address" autocomplete="address-line1" value="" />
                                    </p>
                                    <p class="px-4">
                                        <label for="order_comments" class="fw-bold">Order Notes</label>
                                        <textarea name="order_comments" class="form-control" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h4 class="py-4">Your order</h4>
                                <div class="woocommerce-checkout-review-order">
                                    <table class="table table-bordered">
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td>&dollar; </span>{{ session('subtotal') }}</span>
                                                <input type="hidden" name="subtotal" value="{{ session('subtotal') }}" />
                                            </td>
                                        </tr>
                                        @if (session('coupon_info'))
                                            <tr class="cart-subtotal">
                                                <th>Discount (-)</th>
                                                <td><span class="text-danger">&dollar;
                                                    @if (session('coupon_info')->coupon_type == 'percentage')
                                                        {{ session('coupon_info')->coupon_amount }}% <small>({{ session('coupon_info')->coupon_code }})</small>
                                                        <input type="hidden" name="coupon_discount" value="{{ session('coupon_info')->coupon_amount }}%" />
                                                    @else
                                                        {{ session('coupon_info')->coupon_amount }} <small>({{ session('coupon_info')->coupon_code }})</small>
                                                        <input type="hidden" name="coupon_discount" value="{{ session('coupon_info')->coupon_amount }}" />
                                                    @endif
                                                </span>
                                                </td>
                                            </tr>
                                            <tr class="coupon_discount">
                                                <th>After Coupon Discount</th>
                                                <td>
                                                &dollar; {{ session('after_discount') }}</span>
                                                    <input type="hidden" name="after_coupon_discount" value="{{ session('after_discount') }}" />
                                                </td>
                                            </tr>
                                        @endif
                                        <tr class="delivery">
                                            <th>Delivery Charge (+)</th>
                                            <td>
                                            <span class="woocommerce-Price-currencySymbol">&dollar; {{ session('shipping_cost') }}</span>
                                                <input type="hidden" name="delivery_change" value="{{ session('shipping_cost') }}" />
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong>
                                                    <span class="text-success">&dollar;
                                                    @if (session('after_discount'))
                                                        {{ session('after_discount') + session('shipping_cost') }}
                                                        <input type="hidden" name="total_price" value="{{ session('after_discount') + session('shipping_cost') }}" />
                                                        @php
                                                            session(['total' => session('after_discount') + session('shipping_cost')])
                                                        @endphp
                                                    @else
                                                        {{ session('subtotal') + session('shipping_cost') }}
                                                        <input type="hidden" name="total_price" value="{{ session('subtotal') + session('shipping_cost') }}" />
                                                        @php
                                                            session(['total' => session('subtotal') + session('shipping_cost')])
                                                        @endphp
                                                    @endif
                                                </span>
                                            </strong>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="bg-secondary text-white p-3 mb-2 py-3 mt-5">
                                        <div class="form-check mb-2">
                                            <input id="payment_method_cheque" type="radio" class="form-check-input" name="payment_method" value="COD" checked='checked' />
                                            <label for="payment_method_cheque" class="form-check-label text-white">Cash On Delivery</label>
                                        </div>
                                        {{-- <div class="form-check mb-2">
                                            <input id="payment_method_ssl" type="radio" class="form-check-input" name="payment_method" value="SSL" />
                                            <label for="payment_method_ssl" class="form-check-label">SSL Commerz</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input id="payment_method_stripe" type="radio" class="form-check-input" name="payment_method" value="STRIPE" />
                                            <label for="payment_method_stripe" class="form-check-label">Stripe Payment</label>
                                        </div> --}}
                                        <hr>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">PLACE ORDER</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- checkout-section - end
================================================== -->
@endsection

