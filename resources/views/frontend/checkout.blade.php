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
                {{-- <form action="{{ route('stripe_checkout_post') }}" method="POST"> --}}
                    @csrf
                    <div class="row gx-5">
                            <div class="col-md-8">
                                <div>
                                    <h4 class="py-4">Billing Details</h4>
                                    <div class="row px-4">
                                        <div class="col-md-6">
                                            <p>
                                                <label for="billing_first_name" class="fw-bold">First Name <abbr class="required">*</abbr></label>
                                                <input type="text" class="form-control" name="billing_first_name" id="billing_first_name" placeholder="" autocomplete="given-name" value="" />
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <label for="billing_email" class="fw-bold">Email Address <abbr class="required">*</abbr></label>
                                                <input type="email" class="form-control" name="billing_email" id="billing_email" placeholder="" autocomplete="email" value="" />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row px-4">
                                        <div class="col-md-6">
                                            <p>
                                                <label for="billing_company" class="fw-bold">Company Name</label>
                                                <input type="text" class="form-control" name="billing_company" id="billing_company" placeholder="" autocomplete="organization" value="" />
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <label for="billing_phone" class="fw-bold">Phone <abbr class="required">*</abbr></label>
                                                <input type="tel" class="form-control" name="billing_phone" id="billing_phone" placeholder="" autocomplete="tel" value="" />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row px-4">
                                        <div class="col-md-6">
                                            <p>
                                                <label for="billing_country_code" class="fw-bold">Country <abbr class="required">*</abbr></label>
                                                {{-- <select class="form-select" name="billing_country_code" id="billing_country_code" autocomplete="country">
                                                    <option value="USA">&hellip;</option>
                                                </select> --}}
                                                <input readonly id="billing_country_code" class="form-select" value="United State" type="text" name="billing_country_code">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <label for="billing_country_id" class="fw-bold">City <abbr class="required">*</abbr></label>
                                                <select class="form-select" name="billing_country_id" id="billing_country_id" autocomplete="country_code">
                                                    <option value="" >Select City&hellip;</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->code }}">{{ $city->name }}</option>
                                                    @endforeach
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
                                                <td>
                                                    <span class="text-danger">&dollar;
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

                                        @php
                                            if(session('packagingCost')){
                                                $packagingCost = session('packagingCost')->cost;
                                            }elseif (session('vendorpackagingCost')) {
                                                $packagingCost = session('vendorpackagingCost')->packaging_cost;
                                            }else {
                                                $packagingCost = 0;
                                            }
                                        @endphp

                                        @if (session('packagingCost'))
                                            <tr class="delivery">
                                                <th>Packaging Charge (+)</th>
                                                <td>
                                                    <span class="woocommerce-Price-currencySymbol">&dollar; {{ session('packagingCost')->cost}}</span>
                                                    <input type="hidden" name="delivery_change" value="{{ session('packagingCost')->cost }}" />
                                                </td>
                                            </tr>
                                        @endif
                                        @if (session('vendorpackagingCost'))
                                            <tr class="delivery">
                                                <th>Packaging Charge (+)</th>
                                                <td>
                                                    <span class="woocommerce-Price-currencySymbol">&dollar; {{ session('vendorpackagingCost')->packaging_cost}}</span>
                                                    <input type="hidden" name="delivery_change" value="{{ session('vendorpackagingCost')->packaging_cost }}" />
                                                </td>
                                            </tr>
                                        @endif
                                        <tr class="delivery">
                                            <th>Tax (%)</th>
                                            <td>
                                            <span class="woocommerce-Price-currencySymbol"></span>
                                                <span id="spanTaxValue"> 00.00 </span>
                                                <input   readonly id="stateTax" placeholder="00.00" type="text" hidden name="tax" value="" />
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong>
                                                    <span  class="text-success">&dollar;
                                                    @if (session('after_discount'))
                                                      <span id="spanTotalValue">  {{ session('after_discount') + session('shipping_cost') + $packagingCost}} </span>

                                                        <input id="totalValue" type="text" hidden name="total_price" value="{{ session('after_discount') + session('shipping_cost') + $packagingCost }}" />
                                                        @php
                                                            session(['total' => session('after_discount') + session('shipping_cost') + $packagingCost ])
                                                        @endphp
                                                    @else
                                                        <span id="spanTotalValue"> {{ session('subtotal') + session('shipping_cost') + $packagingCost }}</span>

                                                        <input id="totalValue" type="text" hidden name="total_price" value="{{ session('subtotal') + session('shipping_cost') + $packagingCost }}" />
                                                        @php
                                                            session(['total' => session('subtotal') + session('shipping_cost') + $packagingCost ])
                                                        @endphp
                                                    @endif
                                                </span>
                                            </strong>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="bg-dark text-white p-3 mb-2 py-3 mt-5">
                                        <div class="form-check mb-2">
                                            <input id="payment_method_cheque" type="radio" class="form-check-input" name="payment_method" value="COD" checked='checked' />
                                            <label for="payment_method_cheque" class="form-check-label text-white">Cash On Delivery</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input id="payment_method_stripe" type="radio" class="form-check-input" name="payment_method" value="stripe"  />
                                            <label for="payment_method_stripe" class="form-check-label text-white">Stripe</label>
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
                                        <div id="payment-request-button">
                                            <!-- A Stripe Element will be inserted here. -->
                                          </div>
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
@section('footer_script')
<script src="https://js.stripe.com/v3/"></script>







 <script>

const stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx', {
    apiVersion: "2022-11-15",
  });
  const paymentRequest = stripe.paymentRequest({
  country: 'US',
  currency: 'usd',
  total: {
    label: 'Demo total',
    amount: 1099,
  },
  requestPayerName: true,
  requestPayerEmail: true,
});

       $(document).ready(function(){
          $('#billing_country_id').change(function(){
              var state_code = $(this).val()
            //    @php
            //      session()->forget(['tax_value', '']);
            //    @endphp

              if(state_code){
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             $.ajax({
                type: 'post',
                url: '/getStateCode',
                data: {
                    stateCode:state_code,
                    subtotal:  <?=(session('after_discount'))? session('after_discount'):session('subtotal')?>,
                    total:{{ session('total') }},
                },
                success: function (data) {

                    // session::put('tax_value',data);
                    var value = JSON.parse(data)

                    $('#stateTax').val(value.tax)
                    $('#totalValue').val(value.total)
                    $('#spanTotalValue').text(value.total)
                    $('#spanTaxValue').text(value.tax)

                }
            });
                }
          })
       })
 </script>
@endsection

