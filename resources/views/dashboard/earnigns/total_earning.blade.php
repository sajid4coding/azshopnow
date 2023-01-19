@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
<div class="row">
    <div class="col-xl-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-xl-stretch mb-xl-8 bg-info py-3">
                    <!--begin::Header-->
                    <div class="card-header border-0 bg-info text-center py-5">
                        <img width="50px" style="margin: 0 auto;" src="{{ asset('dashboard_assets/media/icons/earning.png') }}" alt="earning">
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body p-0" style="margin-top: 20px">

                        <div class="card-p mt-n20 position-relative" >

                             <div class="text-white text-center">
                                <h3 class="text-light"><a style="font-size: 14px; color:#ffffff;display:block; margin-top:20px">Total Earnings</a></h3>
                               <p class="text-light"> <span style='font-size:18px;color:rgb(255, 255, 255)'>${{ $invoices->sum('total_price') }}</span></p>



                            </div>

                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-xl-stretch mb-xl-3 bg-info" style="height:100px;padding:8px !important">
                    <!--begin::Header-->
                    <div class="card-header border-0 bg-info text-center py-0">
                        <img width="20px" style="margin: 0 auto;display:block;height:20px" src="{{ asset('dashboard_assets/media/icons/earning.png') }}" alt="earning">
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body p-0" style="margin-top: 5px">

                        <div class="card-p p-0 mt-n20 position-relative" style="top: 5px;padding:0 !important">

                             <div class="text-white text-center">
                                <h3 class="text-light"><a style="font-size: 14px; color:#ffffff;display:block; margin-top:10px">Stripe</a></h3>
                               <p class="text-light"> <span style='font-size:24px;color:rgb(255, 255, 255)'>${{ $invoices->where('payment_method','stripe')->sum('total_price') }}</span></p>
                            </div>

                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>
                <div class="card card-xl-stretch mb-xl-8 bg-info" style="height:100px;padding:8px !important">
                    <!--begin::Header-->
                    <div class="card-header border-0 bg-info text-center py-0">
                        <img width="20px" style="margin: 0 auto;display:block;height:20px" src="{{ asset('dashboard_assets/media/icons/earning.png') }}" alt="earning">
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body p-0" style="margin-top: 5px">

                        <div class="card-p mt-n20 position-relative p-0" style="top: 5px;padding:0 !important">

                             <div class="text-white text-center">
                                <h3 class="text-light"><a style="font-size: 14px; color:#ffffff;display:block; margin-top:10px" title="Cash On Delivery">COD</a></h3>
                               <p class="text-light"> <span style='font-size:24px;color:rgb(255, 255, 255)'>${{ $invoices->where('payment_method','COD')->sum('total_price') }}</span></p>



                            </div>

                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>

            </div>
        </div>
        <!--begin::Mixed Widget 2-->

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
                       <p class="text-light" > <span style='font-size:44px;color:rgb(255, 255, 255)'>$0</span></p>
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
                       <p class="text-light" ><span style='font-size:44px;color:rgb(255, 255, 255)'>$0</span></p>
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
