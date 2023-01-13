@extends('layouts.vendor_master')
@section('header_css')
    <style>

        .avtivity-card {
          position: relative;
          z-index: 1;
          overflow: hidden; }
          .avtivity-card .activity-icon {
            height: 80px;
            width: 80px;
            min-width: 80px;
            display: block;
            -webkit-transition: all 0.5s;
            -ms-transition: all 0.5s;
            transition: all 0.5s;
            border-radius: 100%;
            line-height: 80px;
            text-align: center; }
          .avtivity-card .title {
            font-size: 28px; }
          .avtivity-card .progress {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%; }
          .avtivity-card .effect {
            position: absolute;
            display: block;
            width: 0;
            height: 0;
            border-radius: 50%;
            transition: width .4s ease-in-out,height .4s ease-in-out;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            z-index: -1; }
          .avtivity-card p, .avtivity-card .media-body span {
            -webkit-transition: all 0.5s;
            -ms-transition: all 0.5s;
            transition: all 0.5s; }
          .avtivity-card:hover .activity-icon {
            background: #fff !important; }
          .avtivity-card:hover .effect {
            width: 225%;
            height: 562px; }
          .avtivity-card:hover p {
            color: #fff; }
          .avtivity-card:hover .media-body span {
            color: #fff !important; }
          .avtivity-card:hover .progress {
            background: rgba(255, 255, 255, 0.2) !important; }
            .avtivity-card:hover .progress .progress-bar {
              background: #fff !important; }
          @media only screen and (max-width: 767px) {
            .avtivity-card .title {
              font-size: 20px; }
            .avtivity-card .activity-icon {
              height: 65px;
              width: 65px;
              min-width: 65px;
              line-height: 65px; }
              .avtivity-card .activity-icon svg {
                width: 35px;
                height: 35px; } }
                .card {
          margin-bottom: 1.875rem;
          background-color: #fff;
          transition: all .5s ease-in-out;
          position: relative;
          border: 0px solid transparent;
          border-radius: 1.25rem;
          box-shadow: 0px 12px 23px 0px rgba(160, 44, 250, 0.04);
          height: calc(100% - 30px); }
          @media only screen and (max-width: 575px) {
            .card {
              margin-bottom: 0.938rem;
              height: calc(100% - 0.938rem); } }
          .card-body {
            padding: 1.875rem; }
            @media only screen and (max-width: 575px) {
              .card-body {
                padding: 1rem; } }
                .widget-stat .media .media-body p {
            font-weight: 500;
            font-size: 16px;
            line-height: 1.5; }
            @media only screen and (max-width: 1400px) {
              .widget-stat .media .media-body p {
                font-size: 14px; } }
            [data-theme-version="dark"] .widget-stat .media .media-body p {
              color: #c4c9d5; }
          .widget-stat .media .media-body small,
          .widget-stat .media .media-body .small {
            font-size: 75%; }
          .widget-stat .media .media-body h3 {
            font-size: 30px;
            font-weight: 600;
            margin: 0;
            line-height: 1.2; }
          .widget-stat .media .media-body h4 {
            font-size: 24px;
            display: inline-block;
            vertical-align: middle; }
          .widget-stat .media .media-body span {
            margin-left: 5px; }
        .widget-stat[class*="bg-"] .media > span {
          background-color: rgba(255, 255, 255, 0.25);
          color: #fff; }
        .widget-stat[class*="bg-"] .progress {
          background-color: rgba(255, 255, 255, 0.25) !important; }

        [direction="rtl"] .widget-stat .media .media-body span {
          margin-left: 0;
          margin-right: 10px; }

        </style>
@endsection
@section('vendor_body_content')
    <div class="col-lg-9 col-md-9">
        @if (session('registrion_success'))
            <div class="alert alert-success">
                {{ session('registrion_success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card h-auto avtivity-card">
                            <div class="card-body ">
                                <div class="media  d-flex align-items-center gap-4">
                                    <span class="activity-icon bgl-success mr-md-4 mr-3">
                                    <img width="50px" src="{{ asset('frontend_assets/img/report_image/order.png') }}" alt="frontend_assets/img/report_image/order.png'">

                                    </span>
                                    <div class="media-body text-center">
                                        <p class="fs-14 mb-2">Total Order</p>
                                        <span class="title text-black font-w600">{{ $invoices_info->count() }}</span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-success" style="width: {{ $invoices_info->count() }}%; height:5px;" role="progressbar">
                                        <span class="sr-only">{{ $invoices_info->count() }}% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-success" style="top: 162px; left: 124px;"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card h-auto avtivity-card">
                            <div class="card-body">
                                <div class="media d-flex align-items-center gap-4">
                                    <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                                    <img width="50px" src="{{ asset('frontend_assets/img/report_image/paper-money.png') }}" alt="frontend_assets/img/report_image/order.png'">

                                    </span>
                                    <div class="media-body text-center">
                                        <p class="fs-14 mb-2">Unpaid Amount</p>
                                        <span class="title text-black font-w600">${{ $invoices_info->where('payment','unpaid')->sum('total_price') }}</span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-secondary" style="width: {{ $invoices_info->where('payment','unpaid')->sum('total_price') }}%; height:5px;" role="progressbar">
                                        <span class="sr-only">{{ $invoices_info->where('payment','unpaid')->sum('total_price') }}% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-secondary" style="top: 62px; left: -46.5px;"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card h-auto avtivity-card">
                            <div class="card-body">
                                <div class="media d-flex align-items-center gap-4">
                                    <span class="activity-icon bgl-danger mr-md-4 mr-3">
                                    <img width="50px" src="{{ asset('frontend_assets/img/report_image/pay.png') }}" alt="frontend_assets/img/report_image/order.png'">

                                    </span>
                                    <div class="media-body text-center">
                                        <p class="fs-14 mb-2">Paid Amount</p>
                                        <span class="title text-black font-w600">${{ $invoices_info->where('payment','paid')->sum('total_price') }}</span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-danger" style="width: {{ $invoices_info->where('payment','paid')->sum('total_price') }}%; height:5px;" role="progressbar">
                                        <span class="sr-only">{{ $invoices_info->where('payment','paid')->sum('total_price') }}% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-danger" style="top: 32px; left: -54px;"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card h-auto avtivity-card">
                            <div class="card-body">
                                <div class="media d-flex align-items-center gap-4">
                                    <span class="activity-icon bgl-warning  mr-md-4 mr-3">
                                        <img width="50px" src="{{ asset('frontend_assets/img/report_image/box.png') }}" alt="frontend_assets/img/report_image/box.png'">
                                    </span>
                                    <div class="media-body text-center">
                                        <p class="fs-14 mb-2">Deliverd</p>
                                        <span class="title text-black font-w600">10</span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-warning" style="width: 42%; height:5px;" role="progressbar">
                                        <span class="sr-only">42% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-warning" style="top: 36px; left: -12.5px;"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card h-auto avtivity-card">
                            <div class="card-body">
                                <div class="media d-flex align-items-center gap-4">
                                    <span class="activity-icon bgl-success  mr-md-4 mr-3">
                                        <img width="50px" src="{{ asset('frontend_assets/img/report_image/box(1).png') }}" alt="frontend_assets/img/report_image/box(1).png'">
                                    </span>
                                    <div class="media-body text-center">
                                        <p class="fs-14 mb-2">Pending Order</p>
                                        <span class="title text-black font-w600">52</span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-success" style="width: 42%; height:5px;backgroun:#BA6555;" role="progressbar">
                                        <span class="sr-only">42% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-success" style="top: 36px; left: -12.5px;"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card h-auto avtivity-card">
                            <div class="card-body" >
                                <div class="media d-flex align-items-center gap-4">
                                    <span class="activity-icon bgl-primary  mr-md-4 mr-3">
                                        <img width="50px" src="{{ asset('frontend_assets/img/report_image/p.png') }}" alt="frontend_assets/img/report_image/p.png'">
                                    </span>
                                    <div class="media-body text-center">
                                        <p class="fs-14 mb-2">Processign  Order</p>
                                        <span class="title text-black font-w600">10</span>
                                    </div>
                                </div>
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar bg-primary" style="width: 42%; height:5px;" role="progressbar">
                                        <span class="sr-only">42% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="effect bg-primary" style="top: 36px; left: -12.5px;"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection

