@extends('layouts.dashboardmaster')

@section('header_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Announcement</h1>
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
                    <li class="breadcrumb-item text-muted">Announcement</li>
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
                        <a href="{{route('announcement.create')}}" class="btn btn-primary btn-sm">Add Announcement</a>
                    </div>
                    <!--begin::Table-->
                    <div id="kt_ecommerce_sales_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="announcement">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Seller</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($announcements as $announcement)
                                        <tr class="odd">
                                            <td data-kt-ecommerce-order-filter="order_id">
                                                {{ $loop->index+1 }}
                                            </td>
                                            <td>
                                                {{ $announcement->title }}
                                            </td>
                                            <td>
                                                @if ($announcement->where([
                                                    'title' => $announcement->title,
                                                    'description' => $announcement->description,
                                                    'vendor_type' => 'Specific Seller'
                                                ])->exists())
                                                    @foreach ($announcement->where([
                                                        'title' => $announcement->title,
                                                        'description' => $announcement->description,
                                                        'vendor_type' => 'Specific Seller'
                                                    ])->get() as $seller)
                                                        <span class="badge bg-warning text-dark">{{ App\Models\User::find($seller->specific_seller)->shop_name }}</span> <br>
                                                    @endforeach
                                                @else
                                                    <span class="badge bg-success">{{ $announcement->vendor_type }}</span>
                                                @endif
                                                {{-- @if ($announcement->vendor_type == 'Specific Seller')
                                                    @foreach ($sellers as $seller)
                                                        <span class="badge bg-warning text-dark">{{ App\Models\User::find($seller)->shop_name }}</span> <br>
                                                    @endforeach
                                                @else
                                                    <span class="badge bg-success">{{ $announcement->vendor_type }}</span>
                                                @endif --}}
                                            </td>
                                            <td>
                                                @if ($announcement->status == 'publish')
                                                    <span class="badge bg-primary">{{ $announcement->status }}</span>
                                                @else
                                                    <span class="badge bg-danger">{{ $announcement->status }}</span>
                                                @endif
                                            </td>
                                            <td data-order="2022-03-23">
                                                <span class="fw-bolder">{{ $announcement->created_at->diffForHumans() }}</span>
                                            </td>
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
                                                        <a href="{{ route('announcement.edit',$announcement->id) }}" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#announcement{{ $announcement->id }}">View</a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <form action="{{ route('announcement.destroy',$announcement->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button style="border: none;" class="menu-link px-3 text-danger" data-kt-ecommerce-order-filter="delete_row">Delete</button>
                                                        </form>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
                                            </td>

                                            <!-- Modal -->
                                            <div class="modal fade" id="announcement{{ $announcement->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog-centered modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Announcement</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('announcement.update', $announcement->id) }}" method="POST">
                                                     @csrf
                                                     @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <input class="form-control mb-5" type="text" placeholder="type title..." name="title" value="{{ $announcement->title }}">

                                                                    <textarea class="form-control summernote" name="description">{{ $announcement->description }}</textarea>

                                                                    <div class="mt-5">
                                                                        <input type="radio" class="allsellers" id="all_seller" name="drone" value="All Seller" {{ $announcement->vendor_type == 'All Seller' ? 'checked' : '' }}>
                                                                        <label for="all_seller">All Seller</label>
                                                                    </div>

                                                                    <div class="mb-5">
                                                                        <input type="radio" class="specific" id="specific_seller" name="drone" value="Specific Seller" {{ $announcement->vendor_type == 'Specific Seller' ? 'checked' : '' }}>
                                                                        <label for="specific_seller">Specific Seller</label>
                                                                    </div>

                                                                    <div class="mb-5" class="vendor_list" style="display: none">
                                                                        <select name="specific_seller[]" class="form-control mb-5 js-example-tags" multiple="multiple">
                                                                            @foreach ($all_seller as $seller)
                                                                                <option value="{{ $seller->id }}">{{ $seller->shop_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-5">
                                                                        <select class="form-select" name="status" id="status">
                                                                            <option value="publish" {{ $announcement->status == 'publish'? 'selected' : '' }}>Publish</option>
                                                                            <option value="private" {{ $announcement->status == 'private'? 'selected' : '' }}>Private</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>

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
@endsection
@section('footer_script')
<script>
    $(document).ready(function () {
        $('#announcement').DataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    @if (session('announcement_created'))

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
        title: '{{ session('announcement_created') }}'
        })
    @endif

    @if (session('announcement_updated'))

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
        title: '{{ session('announcement_updated') }}'
        })
    @endif

    @if (session('announcement_delete'))

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
        title: '{{ session('announcement_delete') }}'
        })
    @endif

</script>

<script>
    $(".js-example-tags").select2({
        tags: true
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'type description...',
            height: 300,
        });
    });
</script>
<script>
    $('.specific').click(function(){
        $(".vendor_list").slideDown();})
    $('.allsellers').click(function(){
        $(".vendor_list").slideUp();
    })
</script>

@endsection

