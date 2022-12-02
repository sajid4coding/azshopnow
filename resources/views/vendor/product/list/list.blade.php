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
                <th>Regular Price</th>
                <th>Quantity</th>
                <th>After Discount Price</th>
                <th>Entry Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>Edinburgh</td>
                <td>Edinburgh</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td style="display: flex;gap:15px;">
                    <a href="#"><i class="fas fa-edit"></i></a>
                    <a href="#"><i class="fas fa-trash-alt"></i></a>
                    <span class="text-info "><i class="fas fa-eye"></i></span>
                </td>
            </tr>



        </tbody>
        {{-- <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> --}}
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
