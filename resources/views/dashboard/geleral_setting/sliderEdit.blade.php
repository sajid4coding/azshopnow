@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Website / Homepage Slider</h1>
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
                    <li class="breadcrumb-item text-muted">Homepage</li>
                    <!--end::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Slider</li>
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

          <div class="card p-5">
              <form action="{{ route('general.slider.edit.post',$slider->id) }}" method="post" enctype="multipart/form-data">
                  @csrf

                  <div class="card mb-5">
                    <p>Current Image</p>
                      <img height="200px" src="{{ asset('uploads/slider') }}/{{$slider->slider_image}}" alt="$slider->slider_image">
                  </div>
                  <div class="input-group mb-1">

                      <span class="input-group-text">Set New Image</span>
                      <input type="file" class="form-control" placeholder="title" name="slider_image" >
                  </div>
                  <p class="text-danger mb-5">Please, give this image 1073px*575px for beeter quality</p>

                  <div class="input-group mb-5">
                    <span class="input-group-text">Slider / Page Link</span>
                    <input type="url" class="form-control" placeholder="url" name="slider_page_link" value="{{ $slider->slider_page_link }}">
                  </div>

                  @error('slider_image')
                  <p class="text-light bg-danger p-3 rounded">{{ $message }}</p>
                  @enderror
                  @error('slider_page_link')
                  <p class="text-light bg-danger p-3 rounded">{{ $message }}</p>
                  @enderror
                  @if(session('slider_success'))
                  <p class="text-light bg-success p-3 rounded">{{ session('slider_success') }}</p>
                  @endif

                  <button type="submit" class="btn btn-primary mt-5">Update Slider</button>
              </form>
          </div>
        </div>

      </div>
</div>
@endsection
