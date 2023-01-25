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
                        <a href="http://localhost:8000/dashboard" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Join Again</li>

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

    {{-- @if (session('add_success_message'))
      <p class="text-success bg-primary p-5">{{ session('add_success_message') }}</p>
    @endif --}}

    <div class="form_add_delivery">
        <div class="row">
            <div class="col-lg-12">
              <div class="card p-5">
                  <form action="{{ route('delivery.boy.join.again.post',$delivery_boy->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-lg-6">
                            <picture>
                                @if ($delivery_boy->photo)
                                <img style="width: 100px;height:100px;border-radius:50%" src="{{ asset('uploads/delivery_boy_photo') }}/{{ $delivery_boy->photo }}" alt="">

                                @else
                                <img style="width: 100px;height:100px;border-radius:50%" src="{{ asset('uploads/demo/profile.jpg') }}" alt="">

                                @endif
                            </picture>
                            <div class="input-group my-5">
                                <span class="input-group-text">Reason Of Join Again<span style="color:red">*</span></span>
                                <input type="text" class="form-control" placeholder="reason here....." name="reason_of_join_again">
                            </div>
                        </div>

                    </div>

                      <button type="submit" class="btn btn-danger mt-5">Join Again</button>
                  </form>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
@section('footer_script')
<script>
    @if(session('add_success_message'))

        $(document).ready(function(){

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
            title: '{{ session('add_success_message') }}'
            })

        })
    @endif

</script>
@endsection
