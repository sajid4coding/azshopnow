@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Errors Page</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{Route('dashboard')}}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Show</li>
                    <!--end::Item-->

                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>

    <div class="container">
        <div class="row" id="kt_content">

            <div class="col-md-6 my-5">
                <div style="margin-left: 40px">
                    <section id="logo_edit">
                        <div class="text-dark pb-2" style="font-size: 22px;font-weight:500">
                            Unauthorized Error Page
                        </div>
                        <div class="card" style="width:25rem">

                            <div class="card-body border" style="border-color:#a8a8a8 !important">
                                <img style="width: 100%; display:block" src="{{asset('uploads/errorPage/401.png')}}" class="card-img-top" alt="errorPage/401.png">
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <div class="col-md-6 my-5">
                <div style="margin-left: 40px">
                    <section id="logo_edit">
                        <div class="text-dark pb-2"  style="font-size: 22px;font-weight:500">
                            Forbidden Error Page
                        </div>
                        <div class="card" style="width:25rem">

                            <div class="card-body border" style="border-color:#a8a8a8 !important">
                                <img style="width: 100%; display:block" src="{{asset('uploads/errorPage/403.png')}}" class="card-img-top" alt="errorPage/401.png">
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <div class="col-md-6 my-5">
                <div style="margin-left: 40px">
                    <section id="logo_edit">
                        <div class="text-dark pb-2"  style="font-size: 22px;font-weight:500">
                            This page not found Error Page
                        </div>
                        <div class="card" style="width:25rem">

                            <div class="card-body border" style="border-color:#a8a8a8 !important">
                                <img style="width: 100%; display:block" src="{{asset('uploads/errorPage/404.png')}}" class="card-img-top" alt="errorPage/401.png">
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <div class="col-md-6 my-5">
                <div style="margin-left: 40px">
                    <section id="logo_edit">
                        <div class="text-dark pb-2" style="font-size: 22px;font-weight:500">
                            Service Unavailable Error Page
                        </div>
                        <div class="card" style="width:25rem">

                            <div class="card-body border" style="border-color:#a8a8a8 !important">
                                <img style="width: 100%; display:block" src="{{asset('uploads/errorPage/502.png')}}" class="card-img-top" alt="errorPage/401.png">
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <div class="col-md-6 my-5">
                <div style="margin-left: 40px">
                    <section id="logo_edit">
                        <div class="text-dark pb-2"  style="font-size: 22px;font-weight:500">
                            Bad Gateway Error Page
                        </div>
                        <div class="card" style="width:25rem">

                            <div class="card-body border" style="border-color:#a8a8a8 !important">
                                <img style="width: 100%; display:block" src="{{asset('uploads/errorPage/503.png')}}" class="card-img-top" alt="errorPage/401.png">
                            </div>

                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('footer_script')
    <script>
        @if (session('success_msg'))
            $( document ).ready(function() {
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
                title: '{{ session('success_msg') }}'
                })
            });
        @endif
    </script>
    <script>
        @if (session('favicon_success_msg'))
            $( document ).ready(function() {
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
                title: '{{ session('favicon_success_msg') }}'
                })
            });
        @endif
    </script>
    <script>
        @if (session('dashboard_logo_success_msg'))
            $( document ).ready(function() {
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
                title: '{{ session('dashboard_logo_success_msg') }}'
                })
            });
        @endif
    </script>
    <script>
        @if (session('dashboard_favicon_logo_success_msg'))
            $( document ).ready(function() {
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
                title: '{{ session('dashboard_favicon_logo_success_msg') }}'
                })
            });
        @endif
    </script>
@endsection
