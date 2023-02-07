@extends('layouts.dashboardmaster')
@section('header_css')
<style>
    .card_hover{
        overflow: hidden;
    }
    .view_more{
        font-size: 18px;
        font-weight: 100;
        color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        position: absolute;
        top: -50px;
        right: 0;
        background: #a10303;
        padding: 5px 15px;
        border-top-right-radius: 10px;
        border-bottom-left-radius: 10px;
        transition: .4s all ease-in-out;

    }
    .view_more:hover{
        color: hsl(49, 100%, 50%) !important;
    }
    .card_hover:hover  .view_more{
         top: 0
    }
</style>
@endsection
@section('content')

<div class="container">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar pb-3 py-lg-6 px-0 mx-0">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack px-0 mx-0">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap px-1 mx-1">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">All Order</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">All order</li>
                    <!--end::Item-->

                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    {{-- <div class="post d-flex flex-column" id="kt_post"> --}}
        <!--begin::Container-->

            <!--begin::Products-->


                <!--begin::Card body-->
                <div class="card">
                <div class="row gap-0 ">
                    <!--begin::Table-->
                    <div class="col-xxl-4 col-xl-4 col-md-4">
                        <!--begin::Mixed Widget 2-->
                        <div class="card card_hover card-xl-stretch mb-xl-8 bg-success">
                            <!--begin::Header-->
                            <div class="card-header border-0 text-center py-5 bg-success">
                                {{-- <i  style="margin: 0 auto;font-size:50px;color:rgb(255, 255, 255)" class="fas fa-users"></i> --}}
                                <img width="50px" style="margin: 0 auto;" src="{{ asset('dashboard_assets/media/order/004-processing.png') }}" alt="tax">
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body p-0" style="margin-top: 20px">

                                <div class="card-p mt-n20 position-relative">

                                     <div class="text-white text-center">
                                        <h3 class="text-light"><a style="font-size: 14px; color:#ffffff;display:block; margin-top:20px" >All Orders</a></h3>
                                       {{-- <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>${{ $invoices->sum('tax_amount') }}</span></p> --}}
                                       <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>{{ $invoices->count() }}</span></p>
                                     </div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                            <a href="{{route('processing.order')}}" class="view_more"> view More <i class="fas fa-plus"></i></a>
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-md-4">
                        <!--begin::Mixed Widget 2-->
                        <div class="card card_hover card-xl-stretch mb-xl-8 bg-primary" >
                            <!--begin::Header-->
                            <div class="card-header border-0 text-center py-5" >
                                {{-- <i  style="margin: 0 auto;font-size:50px;color:rgb(255, 255, 255)" class="fas fa-users"></i> --}}
                                <img width="50px" style="margin: 0 auto;" src="{{ asset('dashboard_assets/media/order/002-pending.png') }}" alt="tax">
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body p-0" style="margin-top: 20px">

                                <div class="card-p mt-n20 position-relative">

                                     <div class="text-white text-center">
                                        <h3 class="text-light"><a style="font-size: 14px; color:#ffffff;display:block; margin-top:20px" >Pending Orders</a></h3>
                                       {{-- <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>${{ $invoices->sum('tax_amount') }}</span></p> --}}
                                       <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>{{ $invoices->where('order_status','pending')->count() }}</span></p>
                                     </div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                            <a href="{{route('pending.order')}}" class="view_more"> view More <i class="fas fa-plus"></i></a>
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-md-4">
                        <!--begin::Mixed Widget 2-->
                        <div class="card card_hover card-xl-stretch mb-xl-8 bg-info">
                            <!--begin::Header-->
                            <div class="card-header border-0 text-center py-5">
                                {{-- <i  style="margin: 0 auto;font-size:50px;color:rgb(255, 255, 255)" class="fas fa-users"></i> --}}
                                <img width="50px" style="margin: 0 auto;" src="{{ asset('dashboard_assets/media/order/004-processing.png') }}" alt="tax">
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body p-0" style="margin-top: 20px">

                                <div class="card-p mt-n20 position-relative">

                                     <div class="text-white text-center">
                                        <h3 class="text-light"><a style="font-size: 14px; color:#ffffff;display:block; margin-top:20px" >Processing Orders</a></h3>
                                       {{-- <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>${{ $invoices->sum('tax_amount') }}</span></p> --}}
                                       <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>{{ $invoices->where('order_status','processing')->count() }}</span></p>
                                     </div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                            <a href="{{route('processing.order')}}" class="view_more"> view More <i class="fas fa-plus"></i></a>
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-md-4">
                        <!--begin::Mixed Widget 2-->
                        <div class="card card_hover card-xl-stretch mb-xl-8 bg-warning">
                            <!--begin::Header-->
                            <div class="card-header border-0 text-center py-5" >
                                {{-- <i  style="margin: 0 auto;font-size:50px;color:rgb(255, 255, 255)" class="fas fa-users"></i> --}}
                                <img width="50px" style="margin: 0 auto;" src="{{ asset('dashboard_assets/media/order/002-pending.png') }}" alt="tax">
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body p-0" style="margin-top: 20px">

                                <div class="card-p mt-n20 position-relative">

                                     <div class="text-white text-center">
                                        <h3 class="text-light"><a style="font-size: 14px; color:#ffffff;display:block; margin-top:20px" >Pending Orders</a></h3>
                                       {{-- <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>${{ $invoices->sum('tax_amount') }}</span></p> --}}
                                       <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>{{ $invoices->where('order_status','pending')->count() }}</span></p>
                                     </div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Body-->
                            <a href="{{route('pending.order')}}" class="view_more"> view More <i class="fas fa-plus"></i></a>
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-md-4">
                        <!--begin::Mixed Widget 2-->
                        <div class="card card_hover card-xl-stretch mb-xl-8" style="background: linear-gradient(90deg, rgb(8, 56, 0) 0%, rgb(14, 78, 2) 100%, rgb(4, 100, 18) 100%);">
                            <!--begin::Header-->
                            <div class="card-header border-0 text-center py-5">
                                {{-- <i  style="margin: 0 auto;font-size:50px;color:rgb(255, 255, 255)" class="fas fa-users"></i> --}}
                                <img width="50px" style="margin: 0 auto;" src="{{ asset('dashboard_assets/media/order/003-delivery-man.png') }}" alt="tax">
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body p-0" style="margin-top: 20px">

                                <div class="card-p mt-n20 position-relative">

                                     <div class="text-white text-center">
                                        <h3 class="text-light" style="font-size: 14px; color:#ffffff;display:block; margin-top:20px">Delivered Order</h3>
                                       {{-- <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>${{ $invoices->sum('tax_amount') }}</span></p> --}}
                                       <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>{{ $invoices->where('order_status','delivered')->count() }}</span></p>
                                     </div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <a href="{{route('delivered.order')}}" class="view_more"> view More <i class="fas fa-plus"></i></a>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-md-4">
                        <!--begin::Mixed Widget 2-->
                        <div class="card card_hover card-xl-stretch mb-xl-8 bg-danger">
                            <!--begin::Header-->
                            <div class="card-header border-0 text-center py-5">
                                {{-- <i  style="margin: 0 auto;font-size:50px;color:rgb(255, 255, 255)" class="fas fa-users"></i> --}}
                                <img width="50px" style="margin: 0 auto;" src="{{ asset('dashboard_assets/media/order/001-basket.png') }}" alt="tax">
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body p-0" style="margin-top: 20px">

                                <div class="card-p mt-n20 position-relative">

                                     <div class="text-white text-center">
                                        <h3 class="text-light"><a style="font-size: 14px; color:#ffffff;display:block; margin-top:20px" >Canceled Order</a></h3>
                                       {{-- <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>${{ $invoices->sum('tax_amount') }}</span></p> --}}
                                       <p class="text-light"> <span style='font-size:44px;color:rgb(255, 255, 255)'>{{ $invoices->where('order_status','canceled')->count() }}</span></p>
                                     </div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <a href="{{route('canceled.order')}}" class="view_more"> view More <i class="fas fa-plus"></i></a>
                            <!--end::Body-->
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Mixed Widget 2-->
                        <h2  class="bg-primary p-3 my-5 text-light">Latest Processing Order</h2>
                        <div class="card card-xl-stretch mb-xl-8" style="background: #f2f2f2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pl-5"><b> SL.</b></th>
                                        <th ><b> Customer</b></th>
                                        <th ><b> Order Date</b></th>
                                        <th ><b> Total</b></th>
                                        <th ><b> Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($invoices->where('order_status','processing') as $invoice)
                                  <tr>
                                    <!--begin::Order ID=-->
                                    <td data-kt-ecommerce-order-filter="order_id">
                                        {{ $loop->index+1 }}
                                    </td>
                                    <!--end::Order ID=-->
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                                        <img style="width:60px;display:block;height:60px" src="{{ asset('uploads/profile_photo') }}/@if($invoice->relationwithCustomerUser->profile_photo){{ $invoice->relationwithCustomerUser->profile_photo }}@else default.png @endif" alt="dfgf">
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bolder">{{ $invoice->relationwithCustomerUser->name }}</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                     <!--begin::Date Added=-->
                                     <td class="text-end" data-order="2022-03-23">
                                        <span class="fw-bolder">{{ $invoice->created_at->format('d-m-y') }}</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="fw-bolder">{{ $invoice->total_price }}$</span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('order.details',$invoice->id) }}" class="menu-link px-3">View</a>
                                            </div>
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                  </tr>
                                @endforeach

                                </tbody>
                              </table>
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Mixed Widget 2-->
                        <h2 class="bg-primary p-3 my-5 text-light">Latest Delivered Order</h2>
                        <div class="card card-xl-stretch mb-xl-8" style="background: #f2f2f2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pl-1"><b> SL.</b></th>
                                        <th ><b> Customer</b></th>
                                        <th ><b> Order Date</b></th>
                                        <th ><b> Total</b></th>
                                        <th ><b> Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($invoices->where('order_status','delivered') as $invoice)
                                  <tr>
                                    <!--begin::Order ID=-->
                                    <td data-kt-ecommerce-order-filter="order_id">
                                        {{ $loop->index+1 }}
                                    </td>
                                    <!--end::Order ID=-->
                                    <!--begin::Customer=-->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                                        <img style="width:60px;display:block;height:60px" src="{{ asset('uploads/profile_photo') }}/@if($invoice->relationwithCustomerUser->profile_photo){{ $invoice->relationwithCustomerUser->profile_photo }}@else default.png @endif" alt="dfgf">
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bolder">{{ $invoice->relationwithCustomerUser->name }}</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                     <!--begin::Date Added=-->
                                     <td class="text-end" data-order="2022-03-23">
                                        <span class="fw-bolder">{{ $invoice->created_at->format('d-m-y') }}</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="fw-bolder">{{ $invoice->total_price }}$</span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('order.details',$invoice->id) }}" class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                  </tr>
                                @endforeach

                                </tbody>
                              </table>
                        </div>
                        <!--end::Mixed Widget 2-->
                    </div>
                    <!--end::Table-->
                </div>
            </div>
                <!--end::Card body-->


            <!--end::Products-->

        <!--end::Container-->
    {{-- </div> --}}
    <!--end::Post-->
</div>
@endsection
@section('footer_script')
<script>
    @if (session('delete_success'))

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
        title: 'Successfully deleted a invoice history'
        })
    @endif

</script>
@endsection
