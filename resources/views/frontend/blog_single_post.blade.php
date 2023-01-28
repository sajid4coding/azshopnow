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
                        <h2 class="title text-light">{{$blog->blog_title}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-light" href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$blog->category}}</li>
                                <li class="breadcrumb-item active" aria-current="page">{{$blog->created_at->format('M d Y')}}</li>
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
                <div class="col-md-12">
                    <div class="text-center">
                        <img src="{{asset('uploads/blog_photo')}}/{{$blog->blog_photo}}" alt="" class="img-fluid" width="70%">
                    </div>
                    <div class="mt-5">
                        @php
                            echo $blog->description;
                        @endphp
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
