@extends('layouts.dashboardmaster')

@section('header_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Delivered Order</h1>
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
                    <li class="breadcrumb-item text-muted">Delivered order</li>
                    <!--end::Item-->

                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="row my-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{route('year.invoice.download')}}" method="POST">
                                @csrf
                                <div>
                                    {{session('year')}}
                                    <h4>Year</h4>
                                    <hr>
                                    <select name="year" id="" class="form-select">
                                        <option value="0000">- Select Year</option>
                                        @foreach (range(date('Y'), date('Y')-10) as $y)
                                            <option value="{{$y}}">{{$y}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-sm btn-primary">Download</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('monthly.invoice.download')}}" method="POST">
                                @csrf
                                <div>
                                    <h4>Month</h4>
                                    <hr>
                                    @php
                                        $months=array("01"=>"January", "02"=>"February", "03"=>"March" , "04"=>"April" , "05"=>"May" , "06"=>"June" , "07"=>"July" , "08"=>"August" , "09"=>"September" , "10"=>"October" , "11"=>"November" , "12"=>"December");
                                    @endphp
                                    <select name="month" id="" class="form-select">
                                        <option value="0">- Select Month</option>
                                        @foreach ($months as $key=>$month)
                                            <option value="{{$key}}">{{$month}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-sm btn-primary">Download</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('day.invoice.download')}}" method="POST">
                                @csrf
                                <div>
                                    <h4>Day</h4>
                                    <hr>
                                    <select name="day" id="" class="form-select">
                                        <option value="0">- Select Day</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-sm btn-primary">Download</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <!--begin::Add product-->
                        {{-- <a href="../../demo1/dist/apps/ecommerce/catalog/add-product.html" class="btn btn-primary">Add Order</a> --}}
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_ecommerce_sales_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="delivered_order_table">
                                <thead>
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Date Added</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-bold text-gray-600">
                                    @foreach ($invoices->where('order_status','delivered') as $invoice)
                                        <tr class="odd">
                                            <td data-kt-ecommerce-order-filter="order_id">
                                                {{ $loop->index+1 }}
                                            </td>
                                            <!--begin::Customer=-->
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <!--begin:: Avatar -->
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                            <div class="symbol-label fs-3 bg-light-danger text-danger">
                                                                <img style="width:60px;display:block;height:60px" src="{{ asset('uploads/profile_photo') }}/@if($invoice->relationwithCustomerUser->profile_photo){{ $invoice->relationwithCustomerUser->profile_photo }}@else default.png @endif" alt="dfgf">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <div class="ms-5">
                                                        <!--begin::Title-->
                                                        <a href="../../demo1/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bolder">{{ $invoice->relationwithCustomerUser->name }}</a>
                                                        <!--end::Title-->
                                                    </div>
                                                </div>
                                            </td>
                                            <!--end::Customer=-->
                                            <!--begin::Status=-->
                                            <td>
                                                <!--begin::Badges-->
                                                <div class="badge @if ($invoice->order_status == 'processing')
                                                    badge-light-primary
                                                @elseif ($invoice->order_status == 'pending')
                                                    badge-light-warning
                                                @elseif ($invoice->order_status == 'delivered')
                                                    badge-light-success
                                                @else
                                                badge-light-danger
                                                @endif ">{{ $invoice->order_status }}</div>
                                                <!--end::Badges-->
                                            </td>
                                            <!--end::Status=-->
                                            <!--begin::Total=-->
                                            <td>
                                                <span class="fw-bolder">${{ $invoice->total_price }}</span>
                                            </td>
                                            <!--end::Total=-->
                                            <!--begin::Date Added=-->
                                            <td>
                                                <span class="fw-bolder">{{ $invoice->created_at->format('d-m-y') }}</span>
                                            </td>
                                            <!--end::Date Added=-->
                                            <!--begin::Action=-->
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('admin.invoice.download', $invoice->id) }}" class="menu-link px-3">Invoice</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('order.details',$invoice->id) }}" class="menu-link px-3">View</a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('order.delete',$invoice->id) }}" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>
                                            <!--end::Action=-->
                                        </tr>
                                    @endforeach
                                </tbody>


                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            <!--end::Products-->
            </div>
        <!--end::Container-->
        </div>
    <!--end::Post-->
    </div>
</div>
@endsection
@section('footer_script')
<script>
    $(document).ready(function () {
        $('#delivered_order_table').DataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    @if (session('delete_success'))

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
        title: 'Successfully deleted a invoice history'
        })
    @endif

</script>
@endsection
