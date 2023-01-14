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
                        <h6>Add Staff</h6>
                        <div>
                            <form action="">
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
                                    <button class="btn btn-sm btn-primary">Add Staff</button>
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
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Inventory</th>
                            <th>Review</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                       @foreach ($products as $product)
                         <tr>
                             <td>
                                <img width="50px" height="50" src="{{ asset('uploads/product_photo') }}/{{ $product->thumbnail }}" alt="{{ $product->product_title }}">
                                {{ $product->product_title }}
                            </td>
                             <td>
                                {{ Str::title($product->parent_category_slug) }} <br>
                                @if ($product->sub_category_id)
                                    <span>Sub-Category: {{ $product->relationwith_subcategory->category_name }}</span>
                                @endif
                            </td>
                             <td>
                                @if ($product->status == 'unpublished')
                                    <div class="badge bg-warning text-dark">
                                        Pending
                                    </div>
                                @elseif ($product->status == 'banned')
                                    <div class="badge bg-danger text-light">
                                        Banned
                                    </div>
                                @else
                                    @if ($product->vendorProductStatus == 'draft')
                                        <div class="badge bg-danger">
                                            Draft
                                        </div>
                                        <div class="badge bg-success">
                                            Approved
                                        </div>
                                    @else
                                        <div class="badge bg-success">
                                            Approved
                                        </div>
                                    @endif
                                @endif
                            </td>
                             <td><a href="{{ route('inventory', $product->id) }}" class="btn btn-primary btn-sm py-2 px-3">Add Inventory</a></td>
                             <td><h6 class="bg-secondary text-center text-white"><i class="fas fa-star text-warning"></i> {{ round(review($product->id)) }}</h6></td>
                             <td>
                                 <div>
                                    <a href="{{route('product.edit',$product->id)}}"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('single.product', ['id'=>$product->id,'title'=>Str::slug($product->product_title)])}}" class="text-info "><i class="fas fa-eye"></i></a>
                                 </div>
                                 <div>
                                    <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="mx-2" style="border: none;"><i class="fas fa-trash-alt text-danger"></i></button>
                                    </form>
                                 </div>
                             </td>
                         </tr>
                       @endforeach
                    </tbody> --}}
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
