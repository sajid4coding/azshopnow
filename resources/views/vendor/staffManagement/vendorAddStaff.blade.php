@extends('layouts.vendor_master')
@section('header_css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('vendor_body_content')
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        @endif
                        <h6>Add Staff</h6>
                        <div>
                            <form action="{{route('vendor.add.staff.post')}}" method="POST">
                                @csrf
                                <div class="my-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name"  name="name" class="form-control">
                                </div>
                                <div class="my-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" id="email"  name="email" class="form-control">
                                </div>
                                <div class="my-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-select">
                                       @foreach ($roles as $role)
                                         <option value="{{$role->id}}">{{$role->name}}</option>
                                       @endforeach
                                    </select>
                                    <span class="text-danger">First create a role*</span>
                                </div>
                                <div class="my-3">
                                    <label for="permission" class="form-label">Permissions:</label>
                                    <br>
                                    @foreach ($permissions as $permission)
                                        <div class="d-inline-block" style="font-size:16px!important">
                                            <input class="from-control" id="{{$permission->name}}" type="checkbox" name="permission[]" value="{{$permission->id}}"> <label for="{{$permission->name}}">{{$permission->name}}</label>
                                        </div> &nbsp;
                                    @endforeach
                                </div>
                                <div>
                                    @if (subscriptionName()->name == 1 && staffCount() < 2)
                                        <button class="btn btn-sm btn-primary">Add Staff</button>
                                    @elseif(subscriptionName()->name == 2 && staffCount() < 5)
                                        <button class="btn btn-sm btn-primary">Add Staff</button>
                                    @elseif(subscriptionName()->name == 3)
                                        <button class="btn btn-sm btn-primary">Add Staff</button>
                                    @else
                                        <span class="text-danger">Staff Account limit is over. You can upgrade Subscription-Plans</span>, <a href="{{route('upgrade')}}">Upgrade Plan</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <table id="staffTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($vendorLists as $vendorList)
                       @php
                            $roleID=DB::table('model_has_roles')->where('model_id',$vendorList->id)->first()->role_id;
                            $permissionsId=DB::table('role_has_permissions')->where('role_id',$roleID)->get();
                        @endphp
                         <tr>
                            <td>
                                {{$loop->index+1}}
                            </td>
                             <td>
                                <h6>{{ $vendorList->name }}</h6>
                                <span>{{ $vendorList->email }}</span> <br>
                                <span class="badge bg-primary text-warning"><span class="text-light">Role:</span> {{DB::table('roles')->where('id',$roleID)->first()->name}}</span>
                            </td>
                             <td>
                               @foreach ($permissionsId as $permission)
                                <span class="badge bg-success"> {{DB::table('permissions')->where('id',$permission->permission_id)->first()->name}}</span>
                               @endforeach
                            </td>
                             <td>
                                 <div>
                                    <form action="{{route('vendor.add.staff.delete',$vendorList->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="mx-2" style="border: none;"><i class="fas fa-trash-alt text-danger"></i></button>
                                    </form>
                                 </div>
                             </td>
                         </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('footer_script')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#view').click(function(){
        Swal.fire({
            title: 'Error!',
            text: 'Do you want to continue',
            icon: 'error',
            confirmButtonText: 'Close'
        })
    })

$(document).ready(function () {
    $('#staffTable').DataTable();
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
