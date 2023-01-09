@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Front-End Logo</h1>
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
                    <li class="breadcrumb-item text-muted">logo</li>
                    <!--end::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">change</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <div class="content d-flex flex-row" id="kt_content">
        <div style="margin-left: 40px">
            <section id="logo_edit">
                <div class="text-primary pb-2" style="font-size: 26px;font-weight:700">
                    Header Logo
                </div>
                <div class="card" style="width:25rem">

                    <div class="card-body">
                        <p>Previous Logo</p>
                        <img style="width: 120px; display:block" src="{{asset('uploads/general_photo')}}/{{$general->header_logo}}" class="card-img-top" alt="...">
                    </div>

                    <div class="card-body">

                        <form action="{{ route('header.logo.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="input-group mb-3">

                            <input name="header_logo" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <p class="text-primary">New Logo set*</p>
                            @error('header_logo')

                            <p class="text-danger">  {{$message}}</p>

                            @enderror
                            <button type="submit" class="btn sm-btn btn-info">Change</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <div style="margin-left: 40px">
        <section id="logo_edit">
            <div class="text-primary pb-2" style="font-size: 26px;font-weight:700">
                Footer Logo
            </div>
            <div class="card" style="width:25rem">

                <div class="card-body">
                    <p>Previous Logo</p>
                    <img style="width: 120px; display:block" src="{{asset('uploads/general_photo')}}/{{$general->footer_logo}}" class="card-img-top" alt="...">

                </div>

                <div class="card-body">

                    <form action="{{ route('footer.logo.post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="input-group mb-3">

                        <input  name="footer_logo" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <p class="text-primary">New Logo set*</p>
                        <button type="submit" class="btn sm-btn btn-info">Change</button>
                    </form>
                </div>
            </div>
        </section>
        </div>
        <div style="margin-left: 40px">
        <section id="logo_edit">
            <div class="text-primary pb-2" style="font-size: 26px;font-weight:700">
                Invoice Logo
            </div>
            <div class="card" style="width:25rem">

                <div class="card-body">
                    <p>Previous Logo</p>
                    <img style="width: 120px; display:block" src="{{asset('uploads/general_photo')}}/{{$general->invoice_logo}}" class="card-img-top" alt="...">

                </div>

                <div class="card-body">

                    <form action="{{ route('invoice.logo.post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="input-group mb-3">

                        <input  name="invoice_logo"  type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <p class="text-primary">New Logo set*</p>
                        <button type="submit" class="btn sm-btn btn-info">Change</button>
                    </form>
                </div>
            </div>
        </section>
        </div>
    </div>
    <div style="margin-left: 40px">
        <section id="logo_edit">
            <div class="text-primary pb-2" style="font-size: 26px;font-weight:700">
                Favicon
            </div>
            <div class="card" style="width:25rem">

                <div class="card-body">
                    <p>Previous Favicon</p>
                    <img style="width: 32px; display:block" src="{{asset('uploads/general_photo')}}/{{$general->favicon_logo}}" class="card-img-top" alt="favicon logo">

                </div>

                <div class="card-body">

                    <form action="{{ route('favicon.post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="input-group mb-3">

                        <input  name="favicon_logo"  type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <p class="text-primary">New favicon set*</p>
                        <button type="submit" class="btn sm-btn btn-info">Change</button>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 my-5">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Back-End Logo</h1>
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
                    <li class="breadcrumb-item text-muted">logo</li>
                    <!--end::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">change</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <div class="content d-flex flex-row" id="kt_content">
        <div style="margin-left: 40px">
            <section id="logo_edit">
                <div class="text-primary pb-2" style="font-size: 26px;font-weight:700">
                    Dashboard Logo
                </div>
                <div class="card" style="width:25rem">

                    <div class="card-body">
                        <p>Previous Logo</p>
                        <img style="width: 120px; display:block" src="{{asset('uploads/general_photo')}}/{{$general->dashboard_logo}}" class="card-img-top" alt="...">
                    </div>

                    <div class="card-body">

                        <form action="{{ route('dashboard.logo.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="input-group mb-3">

                            <input name="dashboard_logo" type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <p class="text-primary">New Logo set*</p>
                            @error('header_logo')

                            <p class="text-danger">  {{$message}}</p>

                            @enderror
                            <button type="submit" class="btn sm-btn btn-info">Change</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <div style="margin-left: 40px">
            <section id="logo_edit">
                <div class="text-primary pb-2" style="font-size: 26px;font-weight:700">
                    Dashboard Favicon
                </div>
                <div class="card" style="width:25rem">

                    <div class="card-body">
                        <p>Previous Favicon</p>
                        <img style="width: 32px; display:block" src="{{asset('uploads/general_photo')}}/{{$general->dashboard_favicon_logo}}" class="card-img-top" alt="favicon logo">

                    </div>

                    <div class="card-body">

                        <form action="{{ route('dashboard.favicon.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="input-group mb-3">

                            <input  name="dashboard_favicon_logo"  type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <p class="text-primary">New favicon set*</p>
                            <button type="submit" class="btn sm-btn btn-info">Change</button>
                        </form>
                    </div>
                </div>
            </section>
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
