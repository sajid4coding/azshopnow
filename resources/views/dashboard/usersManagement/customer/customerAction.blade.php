@extends('layouts.dashboardmaster')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

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
