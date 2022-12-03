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
                <th>Sub Category</th>
                <th>Inventory</th>
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
                 <td>{{ Str::title($product->parent_category_slug) }}</td>
                 <td>{{ $product->relationwith_subcategory->category_name }}</td>
                 <td><a href="{{ route('inventory', $product->id) }}" class="btn btn-primary btn-sm py-2 px-3">Add Inventory</a></td>
                 <td>
                     <a href="#"><i class="fas fa-edit"></i></a>
                     <a href="#" class="mx-2"><i class="fas fa-trash-alt"></i></a>
                     <span class="text-info "><i class="fas fa-eye"></i></span>
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
@endsection
