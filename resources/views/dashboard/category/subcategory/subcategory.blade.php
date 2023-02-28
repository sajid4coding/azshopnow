@extends('layouts/dashboardmaster')

@section('header_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Sub Categories</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Sub-Catalog</li>
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
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-toolbar">
                            <!--begin::Add customer-->
                            <a href="{{ route('subcategory.create') }}" class="btn btn-primary form-prevent-multiple-submits">Add Sub Category</a>
                            <!--end::Add customer-->
                        </div>

                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <div id="kt_ecommerce_category_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="sub_category_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-250px sorting">Category</th>
                                        <th class="min-w-250px sorting">Parent Category</th>
                                        <th class="min-w-150px sorting">Category Status</th>
                                        <th class="text-end min-w-70px sorting_disabled">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-semibold text-gray-600">

                                    <!--end::Table row-->

                                    @foreach ($subcategories as $subcategory)
                                        <tr class="odd">
                                            <!--begin::Category=-->
                                            <td>
                                                <div class="d-flex">
                                                    <!--begin::Thumbnail-->
                                                    <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="symbol symbol-50px">
                                                        <span class="symbol-label" style="background-image:url({{ asset('uploads') }}/category_photo/sub_category_photo/{{ $subcategory->thumbnail }});"></span>
                                                    </a>
                                                    <!--end::Thumbnail-->
                                                    <div class="ms-5">
                                                        <!--begin::Title-->
                                                        <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">{{ $subcategory->category_name }}</a>
                                                        <!--end::Title-->
                                                        <!--begin::Description-->
                                                        <div class="text-muted fs-7 fw-bold">{{ Str::limit($subcategory->description, 100) }}</div>
                                                        <!--end::Description-->
                                                    </div>
                                                </div>
                                            </td>
                                            <!--end::Category=-->
                                            <!--begin::Parent Category=-->
                                            <td>
                                                <!--begin::Badges-->
                                                <div class="badge badge-light-primary">{{ $subcategory->relationshipwith_parent_category->category_name}}</div>
                                                <!--end::Badges-->
                                            </td>
                                            <!--end::Parent Category=-->
                                            <!--begin::Type=-->
                                            <td>
                                                <!--begin::Badges-->
                                                @if ($subcategory->status == 'unpublished')
                                                    <div class="badge badge-light-danger">{{ Str::title($subcategory->status) }}</div>
                                                @else
                                                    <div class="badge badge-light-success">{{ Str::title($subcategory->status) }}</div>
                                                @endif
                                                <!--end::Badges-->
                                            </td>
                                            <!--end::Type=-->
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
                                                        <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-sm menu-link px-3">Edit</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm menu-link px-3" >Delete</button>
                                                        </form>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
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
</div>
@endsection

@section('footer_script')
    <script>
        $(document).ready(function () {
            $('#sub_category_table').DataTable();
        });
    </script>
    <script>
        @if (session('success'))
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
            title: "{{session('success')}}"
            });
        @endif
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
@endsection
