@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Website Contents</h1>
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
                    <li class="breadcrumb-item text-muted">Website</li>
                    <!--end::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Contents</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <div class="row">
      <div class="col-lg-7 m-auto">

        <div class="card " style="padding: 50px !important">
            <form action="{{ route('general.website.centent.post') }}" method="post">
                @csrf
                <div class="input-group mb-5">
                    <span class="input-group-text">Website Title</span>
                    <input type="text" class="form-control" placeholder="title" name="website_title" value="{{ $general->website_title }}">
                </div>
                <div class="input-group mb-5">
                    <span class="input-group-text">Copyright Text</span>
                    <input type="text" class="form-control"  placeholder="copyright" value="{{ $general->copyright_text }}" name="Copyright_text">
                </div>

                <div class="input-group mb-5">
                    <label class="input-group-text">Capcha</label>
                    <select name="capcha" class="form-select" id="">
                        <option @if ($general->capcha_status == 'active')
                        selected
                        @endif value="active">Active</option>
                        <option  @if ($general->capcha_status == 'deactive')
                            selected
                        @endif value="deactive">Deactive</option>
                    </select>
                </div>
                <div class="input-group mb-5">
                    <label class="input-group-text">Twak.io</label>
                    <select name="twak_io_status" class="form-select" id="">
                        <option  @if ($general->twak_io_status == 'active')
                            selected
                        @endif value="active">Active</option>
                        <option  @if ($general->twak_io_status == 'deactive')
                            selected
                        @endif value="deactive">Deactive</option>
                    </select>
                </div>
                <div class="input-group mb-5">
                    <span class="input-group-text">Twak.io Widget Code</span>
                    <input type="text" name="twak_io_id" class="form-control" placeholder="id" value="{{$general->twak_io_id}}">
                </div>
                <button type="submit" class="btn btn-primary mt-5">Save Change</button>
            </form>
        </div>

      </div>
    </div>
</div>
@endsection

