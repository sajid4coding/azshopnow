@extends('layouts.dashboardmaster')
@section('header_css')
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 px-0" >
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack px-5">
            <!--begin::Page title-->
            <div class="page-title flex-wrap p-0 m-0">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Delivery Boy</h1>
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
                    <li class="breadcrumb-item text-muted">Delivery Boy</li>
                    <!--end::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Edit</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>

    {{-- @if (session('add_success_message'))
      <p class="text-success bg-primary p-5">{{ session('add_success_message') }}</p>
    @endif --}}

    <div class="form_add_delivery">
        <div class="row">
            <div class="col-lg-12">
              <div class="card p-5">
                  <form action="{{ route('delivery.boy.edit.post',$delivery_boy->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group mb-5">
                                <span class="input-group-text">Name<span style="color:red">*</span></span>
                                <input type="text" class="form-control" placeholder="name here" name="name" value="{{ $delivery_boy->name}}">
                            </div>
                            @error('name')
                            <p class="text-light rounded bg-danger p-4">{{ $message }}</p>
                            @enderror
                            <div class="input-group mb-5">
                                <span class="input-group-text">Email<span style="color:red">*</span></span>
                                <input type="text" class="form-control" placeholder="Email here" name="email" value="{{ $delivery_boy->email}}">
                            </div>
                            @error('email')
                            <p class="text-light rounded bg-danger p-4">{{ $message }}</p>
                            @enderror
                            <div class="input-group mb-5">
                                <span class="input-group-text">Date of Birth <span style="opacity: .5">(Optional)</span></span>
                                <input type="date" class="form-control" placeholder="date" name="date_of_birth" value="{{ $delivery_boy->date_of_birth}}">
                            </div>
                            <div class="input-group mb-5">
                                <span class="input-group-text">Birth Reg. Id <span style="opacity: .5">(Optional)</span></span>
                                <input type="text" class="form-control" placeholder="Id here" name="Birth_reg_number" value="{{ $delivery_boy->Birth_reg_number}}">
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="input-group mb-5">
                                @if ($delivery_boy->photo)
                                <img style="width: 60px;height:60px;border-radius:50%" src="{{ asset('uploads/delivery_boy_photo') }}/{{ $delivery_boy->photo }}" alt="">

                                @else
                                <img style="width: 60px;height:60px;border-radius:50%" src="{{ asset('uploads/demo/profile.jpg') }}" alt="">

                                @endif
                                {{-- <span class="input-group-text">Photo<span style="opacity: .5">(Optional)</span></span> --}}
                                <input type="file" class="form-control" placeholder="name here" name="photo" value="">
                            </div>
                            @error('photo')
                             <p class="text-light rounded bg-danger p-4">{{ $message }}</p>
                            @enderror
                            <div class="input-group mb-5">
                                <span class="input-group-text">Phone Number<span style="color:red">*</span></span>
                                <input type="tell" class="form-control" placeholder="number here" name="phone_number" value="{{ $delivery_boy->phone_number}}">
                            </div>
                            @error('phone_number')
                            <p class="text-light rounded bg-danger p-4">{{ $message }}</p>
                            @enderror
                            <div class="input-group mb-5">
                                <span class="input-group-text">Address<span style="color:red">*</span></span>
                                <input type="text" class="form-control" placeholder="Address here" name="address" value="{{ $delivery_boy->address}}">
                            </div>
                            @error('address')
                            <p class="text-light rounded bg-danger p-4">{{ $message }}</p>
                            @enderror
                            <div class="input-group mb-5">
                                <span class="input-group-text">NID Id <span style="opacity: .5">(Optional)</span></span>
                                <input type="text" class="form-control" placeholder="Id here" name="nid_id" value="{{ $delivery_boy->nid_id}}">
                            </div>
                        </div>
                    </div>

                      <button type="submit" class="btn btn-primary mt-5">Save Change</button>
                  </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection

