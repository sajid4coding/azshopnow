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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Tax Earning</h1>
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
                    <li class="breadcrumb-item text-muted">Tax Earning</li>
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
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_ecommerce_sales_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="tax_datatable">
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Sub Total</th>
                                        <th>Delivered Charge</th>
                                        <th>Tax(%)</th>
                                        <th>Tax Amount</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoices as $invoice)
                                        <tr class="odd">
                                            <!--begin::Order ID=-->
                                                <td data-kt-ecommerce-order-filter="order_id">
                                                    #{{ $loop->index+1 }}
                                                </td>
                                            <!--end::Order ID=-->
                                            <!--begin::Status=-->
                                            <td data-order="Completed">
                                                ${{ ($invoice->after_coupon_discount)? $invoice->after_coupon_discount : $invoice->subtotal }}
                                            </td>
                                            <td data-order="Completed">
                                                <div style="width: 150.875px;">
                                                    ${{ $invoice->delivery_change }}
                                                </div>
                                            </td>
                                            <!--end::Status=-->
                                            <!--begin::Total=-->
                                            <td>
                                                <span class="fw-bolder">{{ $invoice->tax }}%</span>
                                            </td>
                                            <td>
                                                <span class="fw-bolder"> ${{ $invoice->tax_amount }}</span>
                                            </td>
                                            <!--end::Total=-->
                                            <!--begin::Date Added=-->
                                            <td data-order="2022-03-23">
                                                <span class="fw-bolder">${{ $invoice->total_price }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center" style="width: 100.266px;padding-left:35px">
                                                    <div class="badge @if ($invoice->order_status == 'processing')
                                                        badge-light-primary
                                                    @elseif ($invoice->order_status == 'pending')
                                                        badge-light-warning
                                                    @elseif ($invoice->order_status == 'delivered')
                                                        badge-light-success
                                                    @else
                                                    badge-light-danger
                                                    @endif ">{{ $invoice->order_status }}</div>
                                                </div>
                                            </td>
                                            <td data-order="2022-03-23">
                                                <span class="fw-bolder">{{ $invoice->created_at->format('d-m-y') }}</span>
                                            </td>
                                            <!--end::Date Added=-->
                                            <!--begin::Action=-->

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
@endsection
@section('footer_script')
<script>
    $(document).ready(function () {
        $('#tax_datatable').DataTable();
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
