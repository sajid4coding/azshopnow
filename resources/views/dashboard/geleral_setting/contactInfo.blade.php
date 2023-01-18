@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Contact Info</h1>
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
                    <li class="breadcrumb-item text-muted">Contact</li>
                    <!--end::Item-->

                    <!--end::Item-->
                    <!--begin::Item-->

                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <div class="row">
      <div class="col-lg-6 m-auto">

        <div class="card" style="padding: 50px">
            <form action="{{ route('general.contact.info.post') }}" method="post">
                @csrf
                <div class="input-group mb-5">
                    <span class="input-group-text">Email </span>
                    <input type="text" class="form-control" placeholder="title" name="email" value="{{ $general->email }}">
                </div>

                <div class="input-group mb-5">
                    <span class="input-group-text">Phone Number</span>
                    <input type="text" class="form-control"  placeholder="phone number" name="phone_number" value="{{ $general->phone_number }}">
                </div>
                <div class="input-group mb-5">
                    <span class="input-group-text">Teliphone Number</span>
                    <input type="text" class="form-control"  placeholder="teliphone" name="teliphone" value="{{ $general->teliphone }}">
                </div>
                <div class="input-group mb-5">
                    <span class="input-group-text">Address</span>
                    <input type="text" class="form-control"  placeholder="Address" name="address" value="{{ $general->address }}" >
                </div>




                <button type="submit" class="btn btn-primary mt-5">Save Change</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection

