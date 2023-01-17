@extends('layouts/dashboardmaster')

@section('header_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Report</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Report</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Category-->
            <div class="card card-flush">
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_ecommerce_category_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="review_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-250px sorting">Product</th>
                                        <th class="min-w-250px sorting">Reporter</th>
                                        <th class="min-w-150px sorting">Title</th>
                                        <th class="min-w-150px sorting">Date & Time</th>
                                        <th class="text-end min-w-70px sorting_disabled">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">

                                    <!--end::Table row-->
                                    @foreach ($reports as $report)
                                        <tr class="odd">
                                            <!--begin::Category=-->
                                            <td>
                                                <div class="d-flex">
                                                    <!--begin::Thumbnail-->
                                                    <a href="{{ route('single.product', ['id'=>$report->product_id,'title'=>Str::slug($report->relationwithproduct->product_title)]) }}" class="symbol symbol-50px" target="_blank">
                                                        <span class="symbol-label" style="background-image:url({{ asset('uploads') }}/product_photo/{{ $report->relationwithproduct->thumbnail }});"></span>
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <div class="ms-5">
                                                        <!--begin::Title-->
                                                        <a href="{{ route('single.product',['id'=>$report->product_id,'title'=>Str::slug($report->relationwithproduct->product_title)]) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" target="_blank">{{ $report->relationwithproduct->product_title }}</a>
                                                        <!--end::Title-->
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $report->customer_name }}
                                            </td>
                                            <!--end::Category=-->
                                            <!--begin::Type=-->
                                            <td>
                                                {{ $report->subject }}
                                            </td>
                                            <!--end::Type=-->
                                            <!--begin::Avg Rating=-->
                                            <td>
                                                {{ $report->created_at }}
                                            </td>
                                            <!--end::Avg Rating=-->
                                            <!--begin::Action=-->
                                            <td>
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $report->id }}">Details</a>

                                                <!-- Modal Start-->
                                                <div class="modal fade" id="exampleModal{{ $report->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">REPORT DETAILS</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="table-responsive show-table">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th>Reporter:</th>
                                                                                        <td>{{ $report->customer_name }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Email:</th>
                                                                                        <td>{{ $report->customer_email }}</td>
                                                                                    </tr>
                                                                                    @if ($report->phone_number)
                                                                                        <tr>
                                                                                            <th>Phone:</th>
                                                                                            <td>{{ $report->phone_number }}</td>
                                                                                        </tr>
                                                                                    @endif
                                                                                    <tr>
                                                                                        <th>Reported at:</th>
                                                                                        <td>{{ $report->created_at }}</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h6>Title:</h6>
                                                                        <p>{{ $report->subject }}</p>
                                                                        <h6>Message:</h6>
                                                                        <p>{{ $report->customer_message }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal End-->
                                            </td>
                                            <!--end::Action=-->
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
@endsection

@section('footer_script')
    <script>
        $(document).ready(function () {
            $('#review_table').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
@endsection
