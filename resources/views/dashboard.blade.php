@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-4">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch mb-xl-8 bg-info">
                <!--begin::Header-->
                <div class="card-header border-0 bg-info text-center py-5">

                    <i  style="margin: 0 auto;font-size:50px;color:rgb(255, 255, 255)" class="fas fa-users"></i>


                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0" style="margin-top: 20px">

                    <div class="card-p mt-n20 position-relative">

                         <div class="text-white text-center">
                            <h3 class="text-light"><a style="font-size: 26px; color:#ffffff;display:block; margin-top:20px"  href="{{ route('adminmanagement.index') }}">Total Admin</a></h3>
                           <p class="text-light" style="font-size: 20px; color:#ffffff; margin-top:10px;"><span class="count"> {{ $users->where('role','admin')->count() }} </span> <span style='font-size:14px;color:rgb(255, 179, 136)'>persons</span></p>
                         </div>

                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
        <div class="col-xl-4">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch mb-xl-8 bg-success">
                <!--begin::Header-->
                <div class="card-header border-0 bg-success text-center py-5">
                    <i  style="margin: 0 auto;font-size:50px;color:rgb(255, 255, 255)" class="fas fa-users"></i>
                    {{-- <img width="50px" style="margin: 0 auto;" src="{{ asset('frontend_assets/img/report_image/order.png') }}" alt=""> --}}

                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0" style="margin-top: 20px">

                    <div class="card-p mt-n20 position-relative">

                         <div class="text-white text-center">
                            <h3 class="text-light"><a style="font-size: 26px; color:#ffffff;display:block; margin-top:20px" href="{{ route('vendormanagement.index') }}">Total Vendor</a></h3>
                           <p class="text-light" style="font-size: 20px; color:#ffffff; margin-top:10px;"><span class="count">{{ $users->where('role','vendor')->count() }} </span> <span style='font-size:14px;color:rgb(255, 179, 136)'>persons</span></p>
                         </div>

                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
        <div class="col-xl-4">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch mb-xl-8 bg-primary">
                <!--begin::Header-->
                <div class="card-header border-0 bg-primary text-center py-5">
                    <i  style="margin: 0 auto;font-size:50px;color:rgb(255, 255, 255)" class="fas fa-users"></i>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0" style="margin-top: 20px">

                    <div class="card-p mt-n20 position-relative">
                         <div class="text-white text-center">
                            <h3 class="text-light" ><a style="font-size: 26px; color:#ffffff;display:block; margin-top:20px"  href="{{ route('customermanagement.index') }}">Total Customer</a></h3>
                           <p class="text-light" style="font-size: 20px; color:#ffffff; margin-top:10px;"><span class="count">{{ $users->where('role','customer')->count() }} </span> <span style='font-size:14px;color:rgb(255, 179, 136)'>persons</span></p>
                         </div>

                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
        <div class="col-xl-4">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch mb-xl-8 bg-danger">
                <!--begin::Header-->
                <div class="card-header border-0 bg-danger text-center py-5">
                    <img width="50px" style="margin: 0 auto;" src="{{ asset('frontend_assets/img/report_image/box.png') }}" alt="">
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0" style="margin-top: 20px">

                    <div class="card-p mt-n20 position-relative">

                         <div class="text-white text-center">
                            <h3 class="text-light" style="font-size: 26px; color:#ffffff; margin-top:20px">Total Product</h3>
                           <p class="text-light" style="font-size: 20px; color:#ffffff; margin-top:10px;"><span class="count">{{ $products->count() }}</span></p>
                         </div>

                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
        <div class="col-xl-4">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch mb-xl-8 bg-info">
                <!--begin::Header-->
                <div class="card-header border-0 bg-info text-center py-5">

                    <img width="50px" style="margin: 0 auto;" src="{{ asset('frontend_assets/img/report_image/order.png') }}" alt="">

                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0" style="margin-top: 20px">

                    <div class="card-p mt-n20 position-relative">

                         <div class="text-white text-center">
                            <h3 class="text-light" style="font-size: 26px; color:#ffffff; margin-top:20px">Approve Products</h3>
                           <p class="text-light" style="font-size: 20px; color:#ffffff; margin-top:10px;"><span class="count">{{ $products->where('status','published')->count() }}</span></p>
                         </div>

                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
        <div class="col-xl-4">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xl-stretch mb-xl-8 bg-danger">
                <!--begin::Header-->
                <div class="card-header border-0 bg-danger text-center py-5">

                    <img width="50px" style="margin: 0 auto;" src="{{ asset('frontend_assets/img/report_image/box(1).png') }}" alt="">

                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0" style="margin-top: 20px">

                    <div class="card-p mt-n20 position-relative">

                         <div class="text-white text-center">
                            <h3 class="text-light" style="font-size: 26px; color:#ffffff; margin-top:20px">Prending Products</h3>
                           <p class="text-light" style="font-size: 20px; color:#ffffff; margin-top:10px;"><span class="count">{{ $products->where('status','unpublished')->count() }}</span></p>
                         </div>

                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
    </div>
</div>
@endsection
