@extends('layouts.dashboardmaster')
@section('header_css')
 <style>
    .img{
        min-width: 200px;
         max-width:400px;
         height: 200px;
         display: block;
         border-radius: 10px;
         box-shadow: 0 0 10px 0 #929292;
         text-align: center;
         line-height: 200px;
         font-size: 24px;
         margin-left: 60px
    }
    input[type=file]{
    padding:10px;
    background:#ffffff;
    box-shadow: 0 0 10px 0 #929292;
    overflow: hidden;
    }
 </style>
@endsection
@section('content')
<div class="container">

   {{-- SHOP PAGE BANNER FORM  --}}
  <form action="{{ route('shop.banner.edit') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row mt-5">
            <div class="col-lg-2"><p></p> Shop Page Banner :</div>
            <div class="col-lg-2">
                <input type='file' name="shop_page_banner"/>
                <button type="submit" class="btn btn-primary mt-5">Change</button>
            </div>

            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <img class="img"  src="{{ asset('uploads/banners') }}/{{ $banners->shop_page_banner }}" alt="No image selected" />
            </div>
        </div>
    </form>

         {{-- VENDOR REGISTAR & LOGIN PAGE BANNER FORM  --}}
         <form action="{{ route('vendor.banner.edit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5">
                <div class="col-lg-2"><p></p> Vendor Login Banner :</div>
                <div class="col-lg-2">
                    <input type='file' name="vendor_login_banner"/>
                    <button type="submit" class="btn btn-primary mt-5">Change</button>
                </div>

                <div class="col-lg-2"></div>
                <div class="col-lg-6">
                   <img class="img"  src="{{ asset('uploads/banners') }}/{{ $banners->vendor_login_banner }}" alt="No image selected" />
                </div>
            </div>
          </form>

   {{-- CUSTOMER REGISTAR & LOGIN PAGE BANNER FORM  --}}
   <form action="{{ route('customer.banner.edit') }}" method="post" enctype="multipart/form-data">
     @csrf
    <div class="row mt-5">
        <div class="col-lg-2"><p></p> Customer Login Banner :</div>
        <div class="col-lg-2">
            <input type='file' name="customer_login_banner" />
            <button type="submit" class="btn btn-primary mt-5">Change</button>
        </div>

        <div class="col-lg-2"></div>
        <div class="col-lg-6">
            <img class="img"  src="{{ asset('uploads/banners') }}/{{ $banners->customer_login_banner }}" alt="No image selected" />
        </div>
    </div>
  </form>



     {{-- CART PAGE BANNER FORM  --}}
     <form action="{{ route('cart.banner.edit') }}" method="post" enctype="multipart/form-data">
         @csrf
        <div class="row mt-5">
            <div class="col-lg-2"><p></p> Cart Page Banner :</div>
            <div class="col-lg-2">
                <input type='file' name="cart_page_banner" />
                <button type="submit" class="btn btn-primary mt-5">Change</button>
            </div>

            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <img class="img"  src="{{ asset('uploads/banner_img') }}/{{ $banners->cart_page_banner }}" alt="No image selected" />
            </div>
        </div>
      </form>


</div>
@endsection
{{-- @section('footer_script')
  <script>

         function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);

            }
        }

        $('#customer_banner').onchange(
            function readURL(input) {

if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $('#blah2')
            .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);

}
}
        )


  </script>
@endsection --}}

