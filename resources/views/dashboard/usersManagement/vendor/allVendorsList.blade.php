@extends('layouts/dashboardmaster')

@section('header_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">

            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">

                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">


                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Vendors List</h1>

                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">

                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Home</a>
                        </li>

                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-muted">Vendor</li>

                    </ul>

                </div>

            </div>

        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">

            <div id="kt_app_content_container" class="app-container container-xxl">

                <div class="card card-flush">

                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">

                        <div class="card-title">

                            <div class="d-flex align-items-center position-relative my-1">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                    <div id="kt_ecommerce_category_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="vendor_table">

                               <thead>

                                        <th class="min-w-250px sorting">Vendor Details</th>
                                        <th class="min-w-150px sorting">Status</th>

                                        <th class="text-end min-w-70px sorting_disabled">Actions</th>


                                </thead>

                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($vendors as $vendor)
                                        <tr class="odd">
                                            <td>
                                                <div class="d-flex">

                                                    @if ($vendor->profile_photo)
                                                        <a href="{{ route('vendormanagement.edit', $vendor->id) }}" class="symbol symbol-50px">
                                                            <span class="symbol-label" style="background-image:url({{ asset('uploads/vendor_profile') }}/{{ $vendor->profile_photo }});"></span>
                                                        </a>
                                                    @endif

                                                    <div class="ms-5">

                                                        <a href="{{ route('vendormanagement.edit', $vendor->id) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">{{ $vendor->name }}</a>

                                                        <div class="text-muted fs-7 fw-bold">{{ $vendor->email }}</div>

                                                    </div>
                                                </div>
                                            </td>
                                            <td>

                                                @if ($vendor->status == 'deactive')
                                                    <div class="badge badge-light-danger">{{ Str::title($vendor->status) }}</div>
                                                @else
                                                    <div class="badge badge-light-success">{{ Str::title($vendor->status) }}</div>
                                                @endif

                                            </td>

                                            <td class="text-end">
                                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions

                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                </a>

                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">

                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('vendormanagement.edit', $vendor->id) }}" class="menu-link  btn btn-sm px-3">Edit</a>
                                                    </div>

                                                    <div class="menu-item px-3">
                                                        <form class=" form-prevent-multiple-submits" action="{{ route('vendormanagement.destroy', $vendor->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm menu-link  px-3 button-prevent-multiple-submits" >Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
    <script>
        $(document).ready(function () {
            $('#vendor_table').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
@endsection

