@extends('layouts/frontendmaster')

@section('content')
<!-- breadcrumb-area -->
<section class="breadcrumb-area-four" style="padding:50px 0;background: url(@if($banners->cart_page_banner) {{ asset('uploads/banners') }}/{{ $banners->cart_page_banner }} @else https://flevix.com/wp-content/uploads/2020/07/Red-Blue-Abstract-Background.jpg @endif) no-repeat center; background-size:cover;" >
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="breadcrumb-content">
                    <h2 class="title">Cart</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('customerhome') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-5">
                <div class="breadcrumb-img text-end">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->
<div class="container">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            @livewire('cart-page')
        </div>
    </div>
</div>

<style>
    @media (min-width: 1025px) {
        .h-custom {
        height: 100vh !important;
        }
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }

    .bg-grey {
        background-color: #eae8e8;
    }

    @media (min-width: 992px) {
        .card-registration-2 .bg-grey {
        border-top-right-radius: 16px;
        border-bottom-right-radius: 16px;
        }
    }

    @media (max-width: 991px) {
        .card-registration-2 .bg-grey {
        border-bottom-left-radius: 16px;
        border-bottom-right-radius: 16px;
        }
    }
</style>
@endsection
