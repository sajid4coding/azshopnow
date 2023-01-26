@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div class="col-md-3">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-lg-row">
                        <!--begin::Sidebar-->
                        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                            <!--begin::Card-->
                            <div class="card mb-5 mb-xl-8">
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Summary-->
                                    <!--begin::User Info-->
                                    <div class="d-flex flex-center flex-column py-5">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-100px symbol-circle mb-7">
                                            @if (auth()->user()->profile_photo)
                                            <img src="{{asset('uploads/profile_photo')}}/{{auth()->user()->profile_photo}}" alt="image">
                                            @else
                                            <img src="{{asset('uploads/profile_photo/default.png')}}" alt="image">
                                            @endif
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Name-->
                                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{$vendor->name}}</a>
                                        <!--end::Name-->
                                        <!--begin::Position-->
                                        <div class="mb-9">
                                            <!--begin::Badge-->
                                            <div class="badge badge-lg badge-light-primary d-inline">{{Str::title($vendor->role)}}</div>
                                            <!--begin::Badge-->
                                        </div>
                                        <!--end::Position-->
                                    </div>
                                    <!--end::User Info-->

                                    <!--end::Summary-->

                                    <!--begin::Details toggle-->
                                    <div class="d-flex flex-stack fs-4 py-3">
                                        <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                                        <span class="ms-2 rotate-180">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                                </svg>
                                            </span>

                                            <!--end::Svg Icon-->
                                        </span></div>
                                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Edit customer details">
                                            <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">Edit</a>
                                        </span>
                                    </div>


                                    <!--end::Details toggle-->
                                    <div class="separator"></div>
                                    <!--begin::Details content-->
                                    <div id="kt_user_view_details" class="collapse show">
                                        <div class="pb-5 fs-6">
                                            <!--begin::Details item-->
                                            <div class="fw-bolder mt-5">Account ID</div>
                                            <div class="text-gray-600">ID-{{$vendor->id}}</div>
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            <div class="fw-bolder mt-5">Email</div>
                                            <div class="text-gray-600">
                                                <a href="#" class="text-gray-600 text-hover-primary">{{$vendor->email}}</a>
                                            </div>
                                            <!--begin::Details item-->
                                            <!--begin::Details item-->
                                            @if ($vendor->address)
                                                <div class="fw-bolder mt-5">Address</div>
                                                <div class="text-gray-600">
                                                    <a href="#" class="text-gray-600 text-hover-primary">{{$vendor->address}}</a>
                                                </div>
                                            @endif
                                            <div class="fw-bolder mt-5">Commission</div>
                                            @if ($vendor->seller_commission)
                                                <div class="text-gray-600">
                                                    <a href="#" class="text-gray-600 text-hover-primary">{{$vendor->seller_commission}}</a>
                                                </div>
                                             @else
                                                <div class="text-gray-600">
                                                    <a href="#" class="text-gray-600 text-hover-primary">{{$general_setting->seller_commission}}%</a>
                                                </div>
                                            @endif
                                            <div class="fw-bolder mt-5">Minimum Amount Withdraw</div>
                                            @if ($vendor->minimum_amount_withdraw)
                                                <div class="text-gray-600">
                                                    <a href="#" class="text-gray-600 text-hover-primary">{{$vendor->minimum_amount_withdraw}}</a>
                                                </div>
                                            @else
                                                <div class="text-gray-600">
                                                    <a href="#" class="text-gray-600 text-hover-primary">${{$general_setting->minimum_amount_withdraw}}</a>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <!--end::Details content-->
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Form-->
                                <form class="form" action="{{route('vendormanagement.update', $vendor->id)}}" method="POST" id="kt_modal_update_user_form">
                                    @csrf
                                    @method('PATCH')
                                    <!--begin::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body py-10 px-lg-17">
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px" style="max-height: 346px;">
                                            <!--begin::User toggle-->
                                            <div class="fw-boldest fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_user_user_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_user_user_info">Status
                                            <span class="ms-2 rotate-180">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span></div>
                                            <!--end::User toggle-->

                                            <!--begin::User form-->
                                            <div id="kt_modal_update_user_user_info" class="collapse show">
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    {{-- <label class="fs-6 fw-bold mb-2"></label> --}}
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="status" id="" class="form-select">
                                                        <option @if($vendor->status=='active') selected="selected"@endif value="active">Active</option>
                                                        <option @if($vendor->status=='deactive') selected="selected"@endif value="deactive">Deactive</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::User form-->
                                            <!--begin::Commission form-->
                                            <div id="kt_modal_update_user_user_info" class="collapse show">
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    {{-- <label class="fs-6 fw-bold mb-2"></label> --}}
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <label for="seller_commission">Commission (%)</label>
                                                    <input id="seller_commission" name="seller_commission" class="form-control" type="text" value="{{ $vendor->seller_commission ? $vendor->seller_commission : $general_setting->seller_commission }}">
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Commission form-->
                                            <!--begin::Minimum Amount Withdraw form-->
                                            <div id="kt_modal_update_user_user_info" class="collapse show">
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    {{-- <label class="fs-6 fw-bold mb-2"></label> --}}
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <label for="minimum_amount_withdraw">Minimum Amount Withdraw ($)</label>
                                                    <input id="minimum_amount_withdraw" name="minimum_amount_withdraw" class="form-control" type="text" value="{{ $vendor->minimum_amount_withdraw ? $vendor->minimum_amount_withdraw : $general_setting->minimum_amount_withdraw }}">
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Minimum Amount Withdraw form-->
                                        </div>
                                        <!--end::Scroll-->
                                    </div>

                                    <!--end::Modal body-->
                                    <!--begin::Modal footer-->
                                    <div class="modal-footer flex-center">
                                        <!--begin::Button-->
                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                            {{-- <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span> --}}
                                        </button>
                                        <!--end::Button-->
                                    </div>

                                    <!--end::Modal footer-->
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="row" style="max-height:100vh!important; overflow-y:scroll">
            @foreach ($vendorProducts as  $vendorProduct)
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img style="width:150px!important; height:150px!important;"  src="{{asset('uploads/product_photo')}}/{{$vendorProduct->thumbnail}}" alt="image">
                            </div>
                            <div class="col-md-10">
                                <h2>{{ $vendorProduct->product_title }}</h2>
                                <span style="font-size:18px!important">{{ Str::title($vendorProduct->parent_category_slug)  }}</span>
                                <br>
                                <span style="font-size:18px!important">SKU: {{ $vendorProduct->sku }}</span>
                                <div class="rating">
                                    @if (review($vendorProduct->id))
                                        @for ($x = 1; $x <= 5; $x++)
                                            @if ($x <= review($vendorProduct->id))
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i><!--Empty star-->
                                            @endif
                                        @endfor
                                        <span style="font-size: 10px;">({{ count_review($vendorProduct->id) }})</span>
                                    @else
                                        <span class="text-danger">No Review Yet</span>
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
       </div>
    </div>
</div>
@endsection
@section('footer_script')
<script>
    @if (session('success'))
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
        title: '{{ session('success') }}'
        });
    @endif
</script>
@endsection
