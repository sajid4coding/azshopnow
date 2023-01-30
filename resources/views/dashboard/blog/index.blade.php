@extends('layouts.dashboardmaster')

@section('header_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="container">
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Blog List</h1>
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
                        <li class="breadcrumb-item text-muted">Blog-List</li>
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
                    <div class="card-body pt-0">
                        <div class="my-3">
                            <a href="{{route('blog.create')}}" class="btn btn-primary btn-sm">Add Blog</a>
                        </div>
                        <!--begin::Table-->
                        <div id="kt_ecommerce_sales_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="blog">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Thumbnal</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                        <tr class="odd">
                                            <!--begin::Order ID=-->
                                            <td data-kt-ecommerce-order-filter="order_id">
                                                {{ $loop->index+1 }}
                                            </td>
                                            <!--end::Order ID=-->
                                            <!--begin::Customer=-->
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <!--begin:: Avatar -->
                                                    <div class="">
                                                        <a href="#">
                                                            <div class="">
                                                                @if ($blog->blog_photo != NULL)
                                                                    <img  src="{{ asset('uploads/blog_photo') }}/{{$blog->blog_photo}}" class="img-fluid" width="150px">
                                                                @else
                                                                    <img  src="{{ asset('uploads/blog_photo') }}/default.png" class="img-fluid" width="150px">
                                                                @endif
                                                            </div>

                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h2 class="text-gray-800 text-hover-primary fs-5 fw-bolder">{{$blog->blog_title}}</h2>
                                            </td>
                                            <!--end::Customer=-->
                                            <!--begin::Status=-->
                                            <td data-order="Completed">
                                                <!--begin::Badges-->
                                                <div class="badge @if ($blog->status == 'published')
                                                    badge-light-success
                                                @elseif ($blog->status == 'unpublished')
                                                    badge-light-danger
                                                @endif ">{{ $blog->status }}</div> <br>
                                                <span class="fw-bolder">{{ $blog->created_at->diffForHumans() }}</span>
                                                <!--end::Badges-->
                                            </td>
                                            <!--end::Status=-->
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
                                                        <a href="{{ route('blog.edit',$blog->id) }}" class="menu-link px-3">View</a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3 my-2">
                                                        <form action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-primary">Delete</button>
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
</div>
@endsection
@section('footer_script')
<script>
    $(document).ready(function () {
        $('#blog').DataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
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
        })
    @endif

</script>

@endsection

