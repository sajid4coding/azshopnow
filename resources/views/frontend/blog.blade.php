@extends('layouts.frontendmaster')
@section('content')
    <!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area" style="padding:50px 0;background: url(@if($banners->shop_page_banner) {{ asset('uploads/banners') }}/{{ $banners->shop_page_banner }} @else https://flevix.com/wp-content/uploads/2020/07/Red-Blue-Abstract-Background.jpg @endif) no-repeat center; background-size:cover;background-position:center" >
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="breadcrumb-content">
                        <h2 class="title text-light">Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-light" href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <section>
        <div class="container">
            <div class="row my-5">
                    @foreach ($blogs as $blog)
                        @include('components.frontend.blog_grid')
                    @endforeach
            </div>
        </div>
    </section>
    <style>
        /* @media (min-width:320px) and (max-width:575px){
           .m-w-50{
            width: 50% !important;
           }
           .product-content .title a {
            font-size: 10px !important;
           }
           .product-content .title a h6{
            font-size: 10px !important;
           }
           .product-content .title span{
            font-size: 10px !important;
           }
           .product-content .rating{
            font-size: 10px;
           }
           .product-content p{
            font-size: 10px;
           }
           .product-content .rating span{
            font-size: 10px;
           }
        } */
    </style>
@endsection
