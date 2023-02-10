@extends('layouts.dashboardmaster')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>All Notifications</h6>
                            </div>
                            <div class="col-md-6" >
                                <a href="{{route('delete.notification')}}"style="float: right" class="btn btn-sm btn-primary">Delete All</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h6>Vendor Register Notifications</h6>
                                <div>
                                    <!--begin::Item-->
                                    @foreach (auth()->user()->notifications->where('type','App\Notifications\VendorRegisterNotification') as $notification)
                                        <div class="row">
                                            <div class="col>
                                                <div class="d-flex flex-stack py-4">
                                                    <!--begin::Section-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-35px me-4">
                                                            <span class="symbol-label bg-light-primary">
                                                                <!--begin::Svg Icon | path: icons/duotune/technology/teh008.svg-->
                                                                <span class="svg-icon svg-icon-2 svg-icon-primary">
                                                                    <i class="fas fa-user-alt"></i>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Title-->
                                                        <div class="mb-0 me-2">
                                                            <a href="{{route('vendormanagement.index')}}" class="fs-6 text-gray-800 text-hover-primary fw-bolder"><b>{{$notification->data['name']}}</b></a>
                                                            <div class="text-gray-400 fs-7">Created a Seller Account. <br>
                                                                 {{-- Shop Name: <b>{{$notification->data['shop_name']}}</b></div> --}}
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Section-->
                                                    <!--begin::Label-->
                                                    <span class="badge badge-light fs-8">{{$notification->created_at->diffForHumans()}}</span>
                                                    <!--end::Label-->
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                    <!--end::Item-->
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h6>Product Notification</h6>
                                <div >
                                    <!--begin::Item-->
                                    @foreach (auth()->user()->notifications->where('type','App\Notifications\ProductNotification') as $notification)
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex flex-stack py-4">
                                                    <!--begin::Section-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-35px me-4">
                                                            <span class="symbol-label bg-light-primary">
                                                                <!--begin::Svg Icon | path: icons/duotune/technology/teh008.svg-->
                                                                <span class="svg-icon svg-icon-2 svg-icon-primary">
                                                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.3" d="M11 6.5C11 9 9 11 6.5 11C4 11 2 9 2 6.5C2 4 4 2 6.5 2C9 2 11 4 11 6.5ZM17.5 2C15 2 13 4 13 6.5C13 9 15 11 17.5 11C20 11 22 9 22 6.5C22 4 20 2 17.5 2ZM6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13ZM17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13Z" fill="currentColor" />
                                                                        <path d="M17.5 16C17.5 16 17.4 16 17.5 16L16.7 15.3C16.1 14.7 15.7 13.9 15.6 13.1C15.5 12.4 15.5 11.6 15.6 10.8C15.7 9.99999 16.1 9.19998 16.7 8.59998L17.4 7.90002H17.5C18.3 7.90002 19 7.20002 19 6.40002C19 5.60002 18.3 4.90002 17.5 4.90002C16.7 4.90002 16 5.60002 16 6.40002V6.5L15.3 7.20001C14.7 7.80001 13.9 8.19999 13.1 8.29999C12.4 8.39999 11.6 8.39999 10.8 8.29999C9.99999 8.19999 9.20001 7.80001 8.60001 7.20001L7.89999 6.5V6.40002C7.89999 5.60002 7.19999 4.90002 6.39999 4.90002C5.59999 4.90002 4.89999 5.60002 4.89999 6.40002C4.89999 7.20002 5.59999 7.90002 6.39999 7.90002H6.5L7.20001 8.59998C7.80001 9.19998 8.19999 9.99999 8.29999 10.8C8.39999 11.5 8.39999 12.3 8.29999 13.1C8.19999 13.9 7.80001 14.7 7.20001 15.3L6.5 16H6.39999C5.59999 16 4.89999 16.7 4.89999 17.5C4.89999 18.3 5.59999 19 6.39999 19C7.19999 19 7.89999 18.3 7.89999 17.5V17.4L8.60001 16.7C9.20001 16.1 9.99999 15.7 10.8 15.6C11.5 15.5 12.3 15.5 13.1 15.6C13.9 15.7 14.7 16.1 15.3 16.7L16 17.4V17.5C16 18.3 16.7 19 17.5 19C18.3 19 19 18.3 19 17.5C19 16.7 18.3 16 17.5 16Z" fill="currentColor" />
                                                                    </svg> --}}
                                                                    <i class="fas fa-cart-arrow-down"></i>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Title-->
                                                        <div class="mb-0 me-2">
                                                            <a href="{{route('pending.products')}}" class="fs-6 text-gray-800 text-hover-primary fw-bolder"><b>{{$notification->data['name']}}</b>, This product is newly uploaded, need activation.</a>

                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Section-->
                                                    <!--begin::Label-->
                                                    <span class="badge badge-light fs-8">{{$notification->created_at->diffForHumans()}}</span>
                                                    <!--end::Label-->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!--end::Item-->
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h6>Order Notifications</h6>
                                <div class="scroll-y mh-325px my-5 px-8">
                                    <!--begin::Item-->
                                    @foreach (auth()->user()->notifications->where('type','App\Notifications\OrderNotification') as $notification)
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex flex-stack py-4">
                                                    <!--begin::Section-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Symbol-->
                                                        <div class="d-flex align-items-center me-2">
                                                            <!--begin::Code-->
                                                            <div class="symbol symbol-35px me-4">
                                                                <span class="symbol-label bg-light-primary">
                                                                    <span class="symbol-label bg-light-primary"><i class="fas fa-credit-card"></i></span>
                                                                </span>
                                                            </div>
                                                            <!--end::Code-->
                                                            <!--begin::Title-->
                                                            <a href="{{route('pending.order')}}" class="fs-6 text-gray-800 text-hover-primary fw-bolder"><b>{{$notification->data['name']}}</b>, Ordered a product.</a>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Symbol-->
                                                    </div>
                                                    <!--end::Section-->
                                                    <!--begin::Label-->
                                                    <span class="badge badge-light fs-8">{{$notification->created_at->diffForHumans()}}</span>
                                                    <!--end::Label-->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!--end::Item-->
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h6>Return Notifications</h6>
                                <div class="scroll-y mh-325px my-5 px-8">
                                    <!--begin::Item-->
                                    @foreach (auth()->user()->notifications->where('type','App\Notifications\ProductreturnNotification') as $notification)
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex flex-stack py-4">
                                                    <!--begin::Section-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Symbol-->
                                                        <div class="d-flex align-items-center me-2">
                                                            <!--begin::Code-->
                                                            <div class="symbol symbol-35px me-4">
                                                                <span class="symbol-label bg-light-primary">
                                                                    <span class="symbol-label bg-light-primary"><i class="fas fa-credit-card"></i></span>
                                                                </span>
                                                            </div>
                                                            <!--end::Code-->
                                                            <!--begin::Title-->
                                                            <a href="{{route('pending.order')}}" class="fs-6 text-gray-800 text-hover-primary fw-bolder"><b>{{$notification->data['product']}}</b>, this product has a return request.</a>
                                                            <!--end::Title-->
                                                        </div>
                                                        <!--end::Symbol-->
                                                    </div>
                                                    <!--end::Section-->
                                                    <!--begin::Label-->
                                                    <span class="badge badge-light fs-8">{{$notification->created_at->diffForHumans()}}</span>
                                                    <!--end::Label-->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!--end::Item-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
