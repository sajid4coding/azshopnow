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
                        <h6>Add Permission</h6>
                        <div>
                            <form action="{{route('vendor.staff.permission.post')}}" method="POST">
                                @csrf
                                <div class="my-3">
                                    <label for="permission" class="form-label">Permission Name</label>
                                    <input type="text" id="permission"  name="name" class="form-control">
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary">Add Permission</button>
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
                            <th>Permission Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($permissions as $permission)
                         <tr>
                             <td>
                                {{$loop->index+1}}
                            </td>
                             <td>
                                <h6>{{$permission->name}}</h6>
                            </td>
                             <td>
                                 <div>
                                    <form action="{{route('vendor.staff.permission.delete',$permission->id)}}" method="POST">
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
