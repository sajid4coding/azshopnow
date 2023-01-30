@extends('layouts.vendor_master')

@section('vendor_body_content')
@php
    $payment_methods = explode('|',$payment_setting->payment_setting);
@endphp
<div class="col-lg-9">
    @if ($payment_setting->payment_setting == NULL)
        <div class="text-center">
            <span style="font-size: 300px;"><i class="fas fa-wallet"></i></span>
            <h2 style="color: #858585;">No Payment Method Added For Vendor</h2>
        </div>
    @else
        <div class="row">
            <div class="col-6 mb-3">
                @foreach ($payment_methods as $payment_method)
                    @if ($payment_method == 'paypal')
                        <div class="card">
                            <div class="card-header">
                                <h6>Paypal</h6>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center ">
                                    <div class="mb-3">
                                        <form action="{{ route('vendor.wallet.update') }}" method="post">
                                        @csrf
                                            <div class="input-group">
                                                <span class="input-group-text">PayPal</span>
                                                <input name="paypal" id="paypal" class="form-control @error ('paypal') is-invalid @enderror" type="email" placeholder="you@domain.com" value="{{ $wallet->paypal ? $wallet->paypal : '' }}">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary m-4">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-6 mb-3">
                @foreach ($payment_methods as $payment_method)
                    @if ($payment_method == 'stripe')
                        <div class="card">
                            <div class="card-header">
                                <h6>Stripe</h6>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="mb-3">
                                        <form action="{{ route('vendor.wallet.update') }}" method="post">
                                        @csrf
                                            <div class="input-group">
                                                <span class="input-group-text">Stripe</span>
                                                <input name="stripe" id="stripe" class="form-control @error ('stripe') is-invalid @enderror" type="email" placeholder="you@domain.com" value="{{ $wallet->stripe ? $wallet->stripe : '' }}">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary m-4">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-6 mb-3">
                @foreach ($payment_methods as $payment_method)
                    @if ($payment_method == 'skrill')
                        <div class="card">
                            <div class="card-header">
                                <h6>Skrill</h6>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="mb-3">
                                        <form action="{{ route('vendor.wallet.update') }}" method="post">
                                        @csrf
                                            <div class="input-group">
                                                <span class="input-group-text">Skrill</span>
                                                <input name="skrill" id="skrill" class="form-control @error ('skrill') is-invalid @enderror" type="email" placeholder="you@domain.com" value="{{ $wallet->skrill ? $wallet->skrill : '' }}">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary m-4">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-6 mb-3">
                @foreach ($payment_methods as $payment_method)
                    @if ($payment_method == 'bank')
                        <div class="card">
                            <div class="card-header">
                                <h6>Bank</h6>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="mb-3">
                                        <form action="{{ route('vendor.wallet.update') }}" method="post">
                                        @csrf
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Account Holder</span>
                                                <input class="@error ('account_holder') is-invalid @enderror form-control" type="text" placeholder="Account Holder" name="account_holder" value="{{ $wallet->bank_account_holder ? $wallet->bank_account_holder : '' }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <select class="form-control" name="account_type">
                                                    <option value="Personal Account" {{ $wallet->bank_account_number == 'Personal Account' ? 'selected' : '' }}>Personal Account</option>
                                                    <option value="Merchant Account" {{ $wallet->bank_account_number == 'Merchant Account' ? 'selected' : '' }}>Merchant Account</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Routing Number</span>
                                                <input class="@error ('routing_number') is-invalid @enderror form-control" type="text" placeholder="Routing Number" name="routing_number" value="{{ $wallet->bank_routing_number ? $wallet->bank_routing_number : '' }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Bank Name</span>
                                                <input class="@error ('bank_name') is-invalid @enderror form-control" type="text" placeholder="Bank Name" name="bank_name" value="{{ $wallet->bank_name ? $wallet->bank_name : '' }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Bank Address</span>
                                                <textarea class="@error ('bank_address') is-invalid @enderror form-control" name="bank_address" id="" cols="10" rows="5">{{ $wallet->bank_address ? $wallet->bank_address : '' }}</textarea>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Bank IBAN</span>
                                                <input class="@error ('bank_IBAN') is-invalid @enderror form-control" type="text" placeholder="Bank IBAN" name="bank_IBAN" value="{{ $wallet->bank_IBAN ? $wallet->bank_IBAN : '' }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Bank Swift Code</span>
                                                <input class="@error ('bank_swift_code') is-invalid @enderror form-control" type="text" placeholder="Bank Swift Code" name="bank_swift_code" value="{{ $wallet->bank_swift_code ? $wallet->bank_swift_code : '' }}">
                                            </div>
                                            <img src="{{ asset('uploads/demo/bank-check.png') }}" class="img-fluid rounded-top" alt="bank-check.png"> <br>
                                            <input {{ $wallet->checkbox ? 'checked' : '' }} type="checkbox" class="mt-3" name="checkbox" class="@error ('checkbox') is-invalid @enderror" required> <span>I attest that I am the owner and have full authorization to this bank account</span>
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary m-4">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
@section('footer_script')
    <script>
        $('#specific_seller').click(function(){
            $("#vendor_list").slideDown();})
        $('#all_seller').click(function(){
            $("#vendor_list").slideUp();
        })
    </script>
@endsection
