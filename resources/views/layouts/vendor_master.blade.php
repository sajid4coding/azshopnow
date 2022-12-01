@extends('layouts.frontendmaster')
@section('header_css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
@section('content')
  <!-- main-area -->
  <main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area-four breadcrumb-bg vendor-profile-breadcrumb" style='background: url(@if (auth()->user()->banner)  {{ asset('uploads/banner_img') }}/{{ auth()->user()->banner }}  @else https://www.cohesity.com/wp-content/new_media/2021/03/demo-days-lp-banner.png @endif) no-repeat center;background-size:cover;''>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="store-product">
                        <div class="store-thumb" style="overflow: hidden">
                            {{-- https://pondokindahmall.co.id/assets/img/default.png --}}
                            @if (auth()->user()->profile_photo)
                               <img  src="{{ asset('uploads/vendor_profile') }}/{{ auth()->user()->profile_photo }}" alt="img">
                            @else
                               <img src="https://pondokindahmall.co.id/assets/img/default.png" alt="img">
                            @endif
                        </div>
                        <div class="store-content">
                            <span class="verified">Verified <i class="fa-solid fa-crown"></i></span>
                            @if (auth()->user()->shop_name)
                            <h2 class="title">  {{ auth()->user()->shop_name }} </h2>
                            <ul>
                                <li class="customer">Owner Name : <span style="color: #FF4800 !important;padding-left:10px;font-size:1.2rem">{{ auth()->user()->name }}</span> </li>
                            </ul>
                            @else
                            <h2 class="title">  {{ auth()->user()->name }} </h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Vendor setting</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- vendor-setting-area -->
    <div class="vendor-setting-area pt-80 pb-90">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-12 col-lg-12">
                    <div class="vendor-setting-wrap">
                        <h2 class="title">Dashboard</h2>

                      {{-- Coupon Success Message --}}
                         @if (session('coupon_add_success'))
                                <div class="alert alert-primary" role="alert">
                                    <strong>{{ session('coupon_add_success') }}</strong>
                                </div>
                         @endif
                      {{-- Cooupon Sucess Message --}}
                      {{-- Coupon Success Message --}}
                         @if (session('coupon_delete_message'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ session('coupon_delete_message') }}</strong>
                                </div>
                         @endif
                      {{-- Cooupon Sucess Message --}}

                      <div class="row">
                        <div class="col-lg-3 col-md-3">

                            <aside class="vs-sidebar">
                                <div class="vs-widget">
                                    <div class="widget-title mb-4" >
                                        <h4 class="title">Account Details</h4>
                                    </div>
                                    <ul class="nav cust_ul nav-tabs gap-3" style="padding-left: 20px !important"   role="tablist">

                                        <li class="nav-item active">
                                            <a class="nav-link cust_a"  href="{{ route('vendor.dashboard') }}"><i class="flaticon-user"></i> Vendor Profile</a>
                                        </li>
                                        {{-- <div id="target" class="">dashboard</div> --}}

                                        <li class="nav-item" >
                                            <a class="nav-link cust_a" href="{{ route('vendor.setting') }}"><i class="far fa-edit"></i>Setting</a>
                                        </li>
                                        <li class="nav-item" >
                                            <a class="nav-link cust_a" href="{{ route('vendor.coupon.add') }}"><i class="fas fa-tag"></i>Coupon</a>
                                        </li>


                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-cloud-upload"></i>  Product Upload
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                              <li><a class="dropdown-item"  href="{{ route('vendor.product.upload') }}">Product Add</a></li>
                                              <li><a class="dropdown-item" href="#">Product List</a></li>
                                              <li><a class="dropdown-item" href="{{ route('attributes.index') }}">Attributes</a></li>
                                            </ul>
                                          </li>
                                        <li class="mb-3">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                  <a style="color: #585B60" href="route('logout')" class="cust_a" onclick="event.preventDefault(); this.closest('form').submit();"><i style="font-size: 20px;padding-right:5px" class="fa-solid fa-arrow-right-from-bracket"></i>  Log Out</a>
                                            </form>
                                        </li>
                                    </ul>


                                </div>
                                <div class="vs-widget" >
                                    <div class="vs-page-link" >
                                    </div>
                                </div>

                                <div class="vs-widget" >
                                    @if (auth()->user()->address || auth()->user()->phone_number)
                                    <div class="widget-title mt-5">
                                        <h4 class="title">Contacts</h4>
                                    </div>
                                    <ul class="contact-info">
                                        @if (auth()->user()->address)
                                        <li><i class="fa-solid fa-location-dot"></i>{{ auth()->user()->address }}</li>
                                        @endif
                                        @if (auth()->user()->phone_number)
                                        <li><i class="fa-solid fa-phone-volume"></i> <a href="tel:{{ auth()->user()->phone_number }}">{{ auth()->user()->phone_number }}</a></li>
                                        @endif
                                    </ul>
                                    @endif
                                </div>
                            </aside>

                        </div>

@yield('vendor_body_content')

</div>
</div>
</div>
</div>
</div>
</div>
<!-- vendor-setting-area-end -->



</main>
<!-- main-area-end -->
@endsection
@section('footer_script')
<script>
    $(document).ready(function(){
    $('li').on('click',function(){
        $(this).siblings().removeClass('active')
        $(this).addClass('active')
    })
})

</script>
<script type="text/javascript">
    function showPreview(event){
    if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
    }
    }
</script>
<script>
    $('#summernote').summernote({
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote
    });
</script>
@endsection
