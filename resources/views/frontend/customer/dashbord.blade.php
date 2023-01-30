@extends('layouts.customermaster')
@section('customermasert_css')
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
    text-align: center;
}
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
@section('customermasert_body')
<div class="tab-pane  active text-center" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <h5>Welcome to Account</h5>
<div class="card">
<div class="card-body">
<div class="row">


    <div class="col-xl-12 col-xxl-12">
        <div class="row">
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body" style="height: 100px !important">
                        <div class="media d-flex align-items-center gap-2" >
                            <span class="activity-icon bgl-success mr-md-4 mr-5">
                               <img width="50px" src="{{ asset('frontend_assets/img/report_image/order.png') }}" alt="frontend_assets/img/report_image/order.png'">
                            </span>
                            <div class="media-body" style="margin-left: 20px">
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
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media  d-flex align-items-center gap-2">
                            <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                              <img width="50px" src="{{ asset('frontend_assets/img/report_image/paper-money.png') }}" alt="frontend_assets/img/report_image/order.png'">

                            </span>
                            <div class="media-body"  style="margin-left: 20px">
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
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media  d-flex align-items-center gap-2">
                            <span class="activity-icon bgl-danger mr-md-4 mr-3">
                              <img width="50px" src="{{ asset('frontend_assets/img/report_image/pay.png') }}" alt="frontend_assets/img/report_image/order.png'">

                            </span>
                            <div class="media-body"  style="margin-left: 20px">
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
            {{-- <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media  d-flex align-items-center gap-2">
                            <span class="activity-icon bgl-warning  mr-md-4 mr-3">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.9996 10.0001C22.7611 10.0001 24.9997 7.76148 24.9997 5.00004C24.9997 2.23859 22.7611 0 19.9996 0C17.2382 0 14.9996 2.23859 14.9996 5.00004C14.9996 7.76148 17.2382 10.0001 19.9996 10.0001Z" fill="#FFBC11"></path>
                                    <path d="M29.7178 36.3838L23.5603 38.6931L26.6224 39.8414C27.9402 40.3307 29.3621 39.6527 29.8413 38.3778C30.0964 37.6976 30.021 36.9851 29.7178 36.3838Z" fill="#FFBC11"></path>
                                    <path d="M8.37771 27.6588C7.08745 27.1803 5.64452 27.8298 5.15873 29.1224C4.67411 30.4151 5.32967 31.8555 6.62228 32.3413L9.31945 33.3527L16.4402 30.6821L8.37771 27.6588Z" fill="#FFBC11"></path>
                                    <path d="M34.8413 29.1225C34.3554 27.8297 32.9126 27.1803 31.6223 27.6589L11.6223 35.1589C10.3295 35.6448 9.67401 37.0852 10.1586 38.3779C10.6378 39.6524 12.0594 40.3309 13.3776 39.8415L33.3777 32.3414C34.6705 31.8556 35.326 30.4152 34.8413 29.1225Z" fill="#FFBC11"></path>
                                    <path d="M37.5001 20.0001H31.5455L27.2364 11.3819C26.7886 10.4871 25.8776 9.97737 24.9388 10.0001L19.9996 10.0001L15.061 10.0001C14.1223 9.97737 13.2125 10.4872 12.7637 11.3819L8.45457 20.0001H2.49998C1.1194 20.0001 0 21.1195 0 22.5001C0 23.8807 1.1194 25.0001 2.49998 25.0001H10C10.9473 25.0001 11.8128 24.4654 12.2363 23.6183L15 18.0909V27.4724L19.9998 29.3472L25 27.4719V18.0909L27.7637 23.6183C28.1873 24.4655 29.0528 25.0001 30 25.0001H37.5C38.8806 25.0001 40 23.8807 40 22.5001C40 21.1195 38.8807 20.0001 37.5001 20.0001Z" fill="#FFBC11"></path>
                                </svg>
                            </span>
                            <div class="media-body"  style="margin-left: 20px">
                                <p class="fs-14 mb-2">Morning Yoga</p>
                                <span class="title text-black font-w600">18:34:21”</span>
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
            </div> --}}
        </div>
    </div>
    {{-- <hr> --}}
    {{-- <h3 class="text-center">My Order chart</h3>
    <div class="col-6">
        <canvas id="myChart"></canvas>
    </div>
    <div class="col-6">
        <canvas id="myChart1"></canvas>
    </div> --}}
</div>
</div>
</div>
</div>
@endsection
