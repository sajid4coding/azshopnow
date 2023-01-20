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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Reviews</h1>
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
                    <li class="breadcrumb-item text-muted">Reviews</li>
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
                                        <th class="min-w-250px sorting">Product Name</th>
                                        <th class="min-w-250px sorting">Vendor</th>
                                        <th class="min-w-150px sorting">Product Status</th>
                                        <th class="min-w-150px sorting">Avg. Rating</th>
                                        <th class="text-end min-w-70px sorting_disabled">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">

                                    <!--end::Table row-->
                                    @foreach ($products as $product)

                                        @php
                                            $product_exist = App\Models\ProductReview::where('product_id', $product->id)->exists();
                                        @endphp

                                        @if ($product_exist)
                                            <tr class="odd">
                                                <!--begin::Category=-->
                                                <td>
                                                    <div class="d-flex">
                                                        <!--begin::Thumbnail-->
                                                        <a href="{{ route('single.product', $product->id) }}" class="symbol symbol-50px" target="_blank">
                                                            <span class="symbol-label" style="background-image:url({{ asset('uploads') }}/product_photo/{{ $product->thumbnail }});"></span>
                                                        </a>
                                                        <!--end::Thumbnail-->
                                                        <div class="ms-5">
                                                            <!--begin::Title-->
                                                            <a href="{{ route('single.product', $product->id) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" target="_blank">{{ $product->product_title }}</a>
                                                            <!--end::Title-->
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    Shop Name: <i>{{ $product->relationwithuser->shop_name }}</i> <br>
                                                    Vendor Name: <i>{{ $product->relationwithuser->name }}</i> <br>
                                                </td>
                                                <!--end::Category=-->
                                                <!--begin::Type=-->
                                                <td>
                                                    <!--begin::Badges-->
                                                    @if ($product->vendorProductStatus == 'unpublished')
                                                        <div class="badge badge-light-danger">{{ Str::title($product->vendorProductStatus) }}</div>
                                                    @else
                                                        <div class="badge badge-light-success">{{ Str::title($product->vendorProductStatus) }}</div>
                                                    @endif
                                                    <!--end::Badges-->
                                                </td>
                                                <!--end::Type=-->
                                                <!--begin::Avg Rating=-->
                                                <td>
                                                    <!--begin::Review Star-->
                                                    <div class="reviews">
                                                        @for ($x = 1; $x <= 5; $x++)
                                                            @if ($x <= $product->relationwith_review->rating)
                                                                <i class="fas fa-star text-warning"></i>
                                                            @else
                                                                <i class="far fa-star"></i><!--Empty star-->
                                                            @endif
                                                            @endfor
                                                            ({{ count_review($product->id) }})
                                                        </div>
                                                    <!--end::Review Star-->
                                                </td>
                                                <!--end::Avg Rating=-->
                                                <!--begin::Action=-->
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon--></a>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="{{ route('view.review', $product->id) }}" class="btn btn-sm menu-link px-3">View</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu-->
                                                </td>
                                                <!--end::Action=-->
                                            </tr>
                                        @endif
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





