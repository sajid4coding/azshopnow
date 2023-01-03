@extends('layouts.vendor_master')
@section('header_css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('vendor_body_content')

<div class="col-lg-9">

    <table id="example" class="table table-striped" style="width:100%">
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
        <tbody>
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
        </tbody>
    </table>

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
    $('#example').DataTable();
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
