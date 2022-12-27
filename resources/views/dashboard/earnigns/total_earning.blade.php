@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
<div class="row">
    <div class="col-xl-4">
        <!--begin::Mixed Widget 2-->
        <div class="card card-xl-stretch mb-xl-8 bg-info">
            <!--begin::Header-->
            <div class="card-header border-0 bg-info text-center py-5">
                <img width="50px" style="margin: 0 auto;" src="{{ asset('dashboard_assets/media/icons/earning.png') }}" alt="earning">
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body p-0" style="margin-top: 20px">

                <div class="card-p mt-n20 position-relative">

                     <div class="text-white text-center">
                        <h3 class="text-light"><a style="font-size: 14px; color:#ffffff;display:block; margin-top:20px">Total Earnings</a></h3>
                       <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>${{ $invoices->sum('total_price') }}</span></p>
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
                {{-- <i  style="margin: 0 auto;font-size:50px;color:rgb(255, 255, 255)" class="fas fa-users"></i> --}}
                <img width="50px" style="margin: 0 auto;" src="{{ asset('dashboard_assets/media/icons/tax.png') }}" alt="tax">
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body p-0" style="margin-top: 20px">

                <div class="card-p mt-n20 position-relative">

                     <div class="text-white text-center">
                        <h3 class="text-light"><a style="font-size: 14px; color:#ffffff;display:block; margin-top:20px" >Total Tax</a></h3>
                       <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>${{ $invoices->sum('tax_amount') }}</span></p>
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
                <img width="50px" style="margin: 0 auto;" src="{{ asset('dashboard_assets/media/icons/subscribe.png') }}" alt="subscription">
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body p-0" style="margin-top: 20px">

                <div class="card-p mt-n20 position-relative">
                     <div class="text-white text-center">
                        <h3 class="text-light" ><a style="font-size: 14px; color:#ffffff;display:block; margin-top:20px" >Subscription Earning</a></h3>
                       <p class="text-light" > <span style='font-size:44px;color:rgb(255, 255, 255)'>$</span></p>
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
                <img width="50px" style="margin: 0 auto;" src="{{ asset('dashboard_assets/media/icons/commission.png') }}" alt="commission">
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body p-0" style="margin-top: 20px">
                <div class="card-p mt-n20 position-relative">
                     <div class="text-white text-center">
                        <h3 class="text-light" style="font-size: 14px; color:#ffffff; margin-top:20px">Total Commission </h3>
                       <p class="text-light" ><span style='font-size:44px;color:rgb(255, 255, 255)'>$</span></p>
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
