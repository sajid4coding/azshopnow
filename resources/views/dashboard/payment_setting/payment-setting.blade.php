@extends('layouts/dashboardmaster')
@section('content')
<div class="container">
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Payment Setting</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Payment Setting</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <div class="row justify-content-center align-items-center my-3">
            <div class="col-8">
                <div class="card">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <h5>Payment Setting</h5>
                    </div>
                    <div class="card-body">
                        @php
                            $payment_methods = explode('|',$payment_setting->payment_setting);
                        @endphp
                        <form action="{{ route('payment.setting.select') }}" method="POST" id="seller_commission_save">
                            @csrf
                            <div class="row">
                                <label class="col-md-4 col-from-label">Payment Settings</label>
                                <div class="col-md-8">
                                    <input @foreach ($payment_methods as $payment_method) {{ $payment_method == 'paypal' ? 'checked' : '' }} @endforeach type="checkbox" value="paypal" name="paypal"> <span>PayPal</span> <br>
                                    <input @foreach ($payment_methods as $payment_method) {{ $payment_method == 'stripe' ? 'checked' : '' }} @endforeach type="checkbox" value="stripe" name="stripe"> <span>Stripe</span> <br>
                                    <input @foreach ($payment_methods as $payment_method) {{ $payment_method == 'skrill' ? 'checked' : '' }} @endforeach type="checkbox" value="skrill" name="skrill"> <span>Skrill</span> <br>
                                    <input @foreach ($payment_methods as $payment_method) {{ $payment_method == 'bank' ? 'checked' : '' }} @endforeach type="checkbox" value="bank" name="bank"> <span>Bank</span>
                                </div>
                            </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-warning my-3">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_scripe')
<script>
    @if (session('payment_status'))
    $(document).ready(function(){
        $('#payment_status').click(function(){
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: '{{ session('payment_status') }}'
            })
        });
    });
    @endif
</script>
@endsection
