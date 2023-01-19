@extends('layouts/dashboardmaster')

@section('header_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="row">
                <div class="col-md-6">
                    <div class="card my-5">
                        <div class="card-body">
                            <h3>Super Admin</h3>
                            <hr>
                            <div class="d-flex">
                                <!--begin::Thumbnail-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    @if ($superAdmin->profile_photo)
                                    <img src="{{asset('uploads/profile_photo')}}/{{$superAdmin->profile_photo}}" alt="image">
                                    @else
                                    <img src="{{asset('uploads/profile_photo/default.png')}}" alt="image">
                                    @endif
                                </div>
                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <span class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">Name: {{ $superAdmin->name }}</span>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">Email Address: {{ $superAdmin->email }}</div>
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">Role: {{ Str::title($superAdmin->role) }}</div>
                                    <!--end::Description-->
                                </div>
                            </div>
                            <hr>
                            {{-- <div class="text-end">
                                <a href="{{route('adminmanagement.create')}}" class="btn btn-sm btn-primary">Add Editor</a>
                            </div> --}}
                        </div>
                    </div>
                    <!--begin::Title-->
                    <!--end::Breadcrumb-->
                </div>
            </div>
            <div class="row my-5">
                <div class="col-md-12">
                    <div class="card my-5">
                        <div class="card-body">
                            <h3>Add Editor</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error )
                                        <li>{{Str::title($error)}}</li>
                                    @endforeach
                                </div>
                            @endif
                            <form action="{{route('adminmanagement.store')}}" method="POST" id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class=" col-form-label  fw-bold fs-6">Name</label>
                                        <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" >
                                        <!--end::Label-->
                                    </div>
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class=" col-form-label  fw-bold fs-6">Email Address</label>
                                        <input type="email" name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" >
                                        <!--end::Label-->
                                    </div>
                                    <div class="row mb-6">
                                        <label class=" col-form-label  fw-bold fs-6">Role</label>
                                        <Select class="form-select" name="role">
                                            @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </Select>
                                    </div>
                                    <div class="row mb-6">
                                        <div class="col-md-12">
                                            @foreach ($permissions as $permission)
                                                <div class="d-inline-block" style="font-size:16px!important">
                                                    <input class="from-control" id="{{$permission->name}}" type="checkbox" name="permission[]" value="{{$permission->id}}">
                                                    <label for="{{$permission->name}}">{{$permission->name}}</label>
                                                </div> &nbsp; <br>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--end::Card body-->
                                <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Add Staff</button>
                                    </div>
                                <!--end::Actions-->
                                <input type="hidden"><div></div>
                            </form>
                        </div>
                    </div>
                    <!--end::Breadcrumb-->
                </div>
            </div>
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Admin Staffs List</h1>
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
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Staffs</li>
                    <!--end::Item-->
                </ul>
            <!--begin::Category-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Category">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->

                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <div id="kt_ecommerce_category_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="vendor_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-250px sorting">Details</th>
                                    <th class="min-w-150px sorting">Status</th>
                                    <th class="min-w-150px sorting">Permission</th>
                                    <th class="text-end min-w-70px sorting_disabled">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">

                                <!--end::Table row-->
                                @foreach ($editors as $editor)
                                @php
                                    $roleID=DB::table('model_has_roles')->where('model_id',$editor->id)->first()->role_id;
                                    $permissionsId=DB::table('role_has_permissions')->where('role_id',$roleID)->get();
                                @endphp
                                    <tr class="odd">
                                        <!--begin::Category=-->
                                        <td>
                                            <div class="d-flex">
                                                <!--begin::Thumbnail-->
                                                @if ($editor->profile_photo)
                                                    <a href="{{ route('vendormanagement.edit', $editor->id) }}" class="symbol symbol-50px">
                                                        <span class="symbol-label" style="background-image:url({{ asset('uploads/profile_photo') }}/{{ $editor->profile_photo }});"></span>
                                                    </a>
                                                @endif
                                                <!--end::Thumbnail-->
                                                <div class="ms-5">
                                                    <!--begin::Title-->
                                                    <a href="{{ route('vendormanagement.edit', $editor->id) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">{{ $editor->name }}</a>
                                                    <!--end::Title-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7 fw-bold">{{ $editor->email }}</div>
                                                    <div></div>
                                                    <span class="badge bg-primary text-warning"><span class="text-light">Role: &nbsp;</span> {{Str::title(DB::table('roles')->where('id',$roleID)->first()->name)}}</span>
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                        </td>
                                        <!--end::Category=-->
                                        <!--begin::Type=-->
                                        <td>
                                            <!--begin::Badges-->
                                            @if ($editor->status == 'deactive')
                                                <div class="badge badge-light-danger">{{ Str::title($editor->status) }}</div>
                                            @else
                                                <div class="badge badge-light-success">{{ Str::title($editor->status) }}</div>
                                            @endif
                                            <!--end::Badges-->
                                        </td>
                                        <td>
                                            <div style="height: 100px; width: 200px; overflow-y: scroll;">
                                                @foreach ($permissionsId as $permission)
                                                    <span class="badge badge-light-success"> {{DB::table('permissions')->where('id',$permission->permission_id)->first()->name}}</span> <br>
                                                @endforeach
                                            </div>
                                        </td>
                                        <!--end::Type=-->
                                        <!--begin::Action=-->
                                        @if (auth()->user()->role=='admin')
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
                                                        <a href="{{ route('adminmanagement.edit', $editor->id) }}" class="menu-link  btn btn-sm px-3">Edit</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <form action="{{ route('adminmanagement.destroy', $editor->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm menu-link  px-3" >Delete</button>
                                                        </form>
                                                    </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                        @else
                                        <td class="text-end">
                                            <span href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Just For Admin
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            {{-- <span class="svg-icon svg-icon-5 m-0">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                                </svg>
                                            </span> --}}
                                            <!--end::Svg Icon--></span>
                                            <!--begin::Menu-->
                                            {{-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('adminmanagement.edit', $editor->id) }}" class="menu-link  btn btn-sm px-3">Edit</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <form action="{{ route('adminmanagement.destroy', $editor->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm menu-link  px-3" >Delete</button>
                                                        </form>
                                                    </div>
                                                <!--end::Menu item-->
                                            </div> --}}
                                            <!--end::Menu-->
                                        </td>
                                        @endif
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
            $('#vendor_table').DataTable();
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
@endsection
