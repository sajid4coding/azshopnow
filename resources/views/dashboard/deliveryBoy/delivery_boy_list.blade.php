@extends('layouts.dashboardmaster')

@section('header_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="container">
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6 px-0" >
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack px-5">
            <!--begin::Page title-->
            <div class="page-title flex-wrap p-0 m-0">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Delivery Boy</h1>
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
                    <li class="breadcrumb-item text-muted">Delivery Boy List</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <div class="button">
                <a href="{{ route('delivery.boy.add') }}" class="btn sm-btn bg-primary text-light">Add Delivery Boy</a>
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>

    {{-- @if (session('add_success_message'))
      <p class="text-success bg-primary p-5">{{ session('add_success_message') }}</p>
    @endif --}}
    <div class="row">
        <div class="card">
            <div class="col-lg-12">
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="delivery_boy_list">
                    <thead>
                        <tr>
                            <th><b>SL.</b></th>
                            <th><b>Photo</b></th>
                            <th><b>Name</b></th>
                            <th><b>Phone Number</b></th>
                            <th><b>Address</b></th>
                            <th><b>Status</b></th>
                            <th><b>Join Date</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($delivery_boys->where('status','active') as $delivery_boy)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    @if ($delivery_boy->photo)
                                    <img style="width: 60px;height:60px;border-radius:50%" src="{{ asset('uploads/delivery_boy_photo') }}/{{ $delivery_boy->photo }}" alt="">

                                    @else
                                    <img style="width: 60px;height:60px;border-radius:50%" src="{{ asset('uploads/demo/profile.jpg') }}" alt="">

                                    @endif
                                </td>
                                <td>{{ $delivery_boy->name }}</td>
                                <td>{{ $delivery_boy->phone_number }}</td>
                                <td>{{ $delivery_boy->address }}</td>

                                <td>{{ $delivery_boy->status }}</td>
                                <td>{{ $delivery_boy->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            {{-- <a href="{{ route('delivery.boy.edit', $delivery_boy->id) }}" class="btn btn-sm menu-link px-3">View & Edit</a> --}}
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $delivery_boy->id }}" class="btn btn-sm menu-link px-3">Details</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('delivery.boy.out.of.work',$delivery_boy->id) }}" class="btn btn-sm menu-link px-3" >Out of Work</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                </td>

                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $delivery_boy->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-lg-4 m-auto">
                                            <img width="100" src="{{ asset('uploads/delivery_boy_photo') }}/{{ $delivery_boy->photo }}" alt="">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-12">
                                            <p>
                                                <span class=""> <b>Name : </b> {{ $delivery_boy->name }}</span>
                                            </p>
                                            <p>
                                                <span class=""> <b>Email : </b> {{ $delivery_boy->email }}</span>
                                            </p>
                                            <p>
                                                <span class=""> <b>Phone Number : </b> {{ $delivery_boy->phone_number }}</span>
                                            </p>
                                            <p>
                                                <span class=""> <b>Address : </b> {{ $delivery_boy->address }}</span>
                                            </p>
                                            <p>
                                                <span class=""> <b>Date of Birth : </b> {{ $delivery_boy->date_of_birth }}</span>
                                            </p>
                                            <p>
                                                <span class=""> <b>Birth Reg. Number : </b> {{ $delivery_boy->Birth_reg_number }}</span>
                                            </p>
                                            <p>
                                                <span class=""> <b>Nid Id : </b> {{ $delivery_boy->nid_id}}</span>
                                            </p>
                                            @if ($delivery_boy->reason_of_join_again)
                                            <p>
                                                <span class=""> <b>reason of join again : </b> {{ $delivery_boy->reason_of_join_again}}</span>
                                            </p>
                                            @endif

                                            <p>
                                                <span class=""> <b>Join Date : </b> {{ $delivery_boy->created_at->format('D M,Y') }}</span>
                                            </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="{{ route('delivery.boy.edit', $delivery_boy->id) }}" class="btn btn-primary">
                                        Edit Info
                                    </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
<script>
    $(document).ready(function () {
        $('#delivery_boy_list').DataTable();
    });
</script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    @if(session('add_success_message'))

    $(document).ready(function(){

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
        title: '{{ session('add_success_message') }}'
        })

    })
    @endif
    @if(session('update_success_message'))

    $(document).ready(function(){

        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        background:'#62C9FF',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: '{{ session('update_success_message') }}'
        })

    })
    @endif
    @if(session('out_of_work'))

    $(document).ready(function(){

        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        background:'#62C9FF',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: '{{ session('out_of_work') }}'
        })

    })
    @endif
</script>
@endsection
