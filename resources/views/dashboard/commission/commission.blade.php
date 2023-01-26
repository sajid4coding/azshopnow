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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Seller Commission</h1>
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
                        <li class="breadcrumb-item text-muted">Commission</li>
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
                        <h5>Seller Commission</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('commission.save') }}" method="POST" id="seller_commission_save">
                            @csrf
                            <div class="row">
                                <label class="col-md-4 col-from-label">Seller Commission</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="number" value="{{ $seller_date->seller_commission }}" placeholder="Seller Commission" name="seller_commission" class="form-control @error('seller_commission') is-invalid @enderror">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
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
        <div class="row justify-content-center align-items-center my-3">
            <div class="col-8">
                <div class="card">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <h5>Withdraw Seller Amount</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('minimum.seller.amount.withdraw') }}" method="POST">
                            @csrf
                            <div class="row">
                                <label class="col-md-4 col-from-label">Minimum Seller Amount Withdraw</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="number" value="{{ $seller_date->minimum_amount_withdraw }}" placeholder="Minimum Seller Amount Withdraw" name="minimum_seller_amount_withdraw" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">$</span>
                                        </div>
                                    </div>
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
@section('footer_script')
<script>
    @if (session('seller_commission_save'))
    $(document).ready(function(){
        $('#seller_commission_save').click(function(){
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
            title: '{{ session('seller_commission_save') }}'
            })
        });
    });
    @endif
</script>
@endsection
