@extends('layouts.dashboardmaster')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="toolbar" id="kt_toolbar">

        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">

            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">

                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">View User Details</h1>

                <span class="h-20px border-gray-300 border-start mx-4"></span>

                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>

                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>

                    <li class="breadcrumb-item text-muted">User Management</li>

                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>

                    <li class="breadcrumb-item text-muted">Users</li>

                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>

                    <li class="breadcrumb-item text-dark">View User</li>

                </ul>

            </div>

            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <div class="m-0">

                    <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                        </svg>
                    </span>
                   Filter</a>

                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_624475ee614e2">

                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                        </div>

                        <div class="separator border-gray-200"></div>

                        <div class="px-7 py-5">

                            <div class="mb-10">

                                <label class="form-label fw-bold">Status:</label>

                                <div>
                                    <select class="form-select form-select-solid select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_624475ee614e2" data-allow-clear="true" data-select2-id="select2-data-7-kr6e" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="select2-data-9-nqtn"></option>
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="2">In Process</option>
                                        <option value="2">Rejected</option>
                                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-8xld" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-q5gn-container" aria-controls="select2-q5gn-container"><span class="select2-selection__rendered" id="select2-q5gn-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>

                            </div>

                            <div class="mb-10">

                                <label class="form-label fw-bold">Member Type:</label>

                                <div class="d-flex">

                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="checkbox" value="1">
                                        <span class="form-check-label">Author</span>
                                    </label>

                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="2" checked="checked">
                                        <span class="form-check-label">Customer</span>
                                    </label>

                                </div>

                            </div>

                            <div class="mb-10">

                                <label class="form-label fw-bold">Notifications:</label>

                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked">
                                    <label class="form-check-label">Enabled</label>
                                </div>

                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                            </div>

                        </div>

                    </div>

                </div>

                <a href="../../demo1/dist/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>

            </div>

        </div>

    </div>

    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-xxl">

            <div class="d-flex flex-column flex-lg-row">

                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">

                    <div class="card mb-5 mb-xl-8">

                        <div class="card-body">

                            <div class="d-flex flex-center flex-column py-5">

                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    @if (auth()->user()->profile_photo)
                                    <img src="{{asset('uploads/profile_photo')}}/{{$customer->profile_photo}}" alt="image">
                                    @else
                                    <img src="{{asset('uploads/profile_photo/default.png')}}" alt="image">
                                    @endif
                                </div>

                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{$customer->name}}</a>

                                <div class="mb-9">

                                    <div class="badge badge-lg badge-light-primary d-inline">{{Str::title($customer->role)}}</div>

                                </div>

                            </div>

                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                                <span class="ms-2 rotate-180">

                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                        </svg>
                                    </span>

                                </span></div>
                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Edit customer details">
                                    <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">Edit</a>
                                </span>
                            </div>

                            <div class="separator"></div>

                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">

                                    <div class="fw-bolder mt-5">Account ID</div>
                                    <div class="text-gray-600">ID-{{$customer->id}}</div>

                                    <div class="fw-bolder mt-5">Email</div>
                                    <div class="text-gray-600">
                                        <a href="#" class="text-gray-600 text-hover-primary">{{$customer->email}}</a>
                                    </div>

                                    <div class="fw-bolder mt-5">Address</div>
                                    <div class="text-gray-600">{{$customer->address}}</div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered mw-650px">

                    <div class="modal-content">

                        <form class="form" action="{{route('customermanagement.update', $customer->id)}}" method="POST" id="kt_modal_update_user_form">
                            @csrf
                            @method('PATCH')

                            <div class="modal-body py-10 px-lg-17">

                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px" style="max-height: 346px;">

                                    <div class="fw-boldest fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_user_user_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_user_user_info">Status
                                    <span class="ms-2 rotate-180">

                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                            </svg>
                                        </span>

                                    </span></div>

                                    <div id="kt_modal_update_user_user_info" class="collapse show">
                                        <div class="fv-row mb-7">

                                            <select name="status" id="" class="form-select">
                                                <option @if($customer->status=='active') selected="selected"@endif value="active">Active</option>
                                                <option @if($customer->status=='deactive') selected="selected"@endif value="deactive">Deactive</option>
                                            </select>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer flex-center">

                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...

                                </button>

                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
