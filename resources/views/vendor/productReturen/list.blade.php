@extends('layouts.vendor_master')
@section('header_css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('vendor_body_content')
<div class="col-md-9">
    <div class="card mt-5">
        <div class="card-header">
            <h5>Lists of Product Return</h5>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Customer Details</th>
                        <th>Product Title</th>
                        <th>Return Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-start">
                   @foreach ($returnProducts as $product)
                     <tr>
                        <td>
                            @php
                                $customer=App\Models\User::find($product->user_id)
                            @endphp
                            <h5><span class="text-muted">Name: </span>{{$customer->name}}</h5>
                            <h6><span class="text-muted">Email: </span>{{$customer->email}}</h6>
                            @if ($customer->phone_number)
                                <h6><span class="text-muted">Phone Number: </span>{{$customer->phone_number}}</h6>
                            @endif
                        </td>
                         <td>
                            {{-- <img width="50px" height="50" src="{{ asset('uploads/product_photo') }}/{{ $product->thumbnail }}" alt="{{ $product->product_title }}">
                            {{ $product->product_title }} --}}
                            <h5>{{ Str::title($product->product_name) }} <br></h5>
                        </td>
                         <td>
                            {{ Str::limit($product->return_message,100) }} <br>
                        </td>
                         <td>
                            @if ($product->status == 'pending')
                                <div class="badge bg-warning text-dark">
                                    Pending
                                </div>
                            @elseif ($product->status == 'completed')
                                <div class="badge bg-success text-light">
                                    Approved
                                </div>
                            @else
                            <div class="badge bg-danger text-light">
                                Rejected
                            </div>
                            @endif
                        </td>
                         <td>
                            <div>
                                <a href="{{route('view.return.product',$product->id)}}"><i class="fas fa-marker"></i></a>
                            </div>
                             <div>
                                <form action="{{route('return.product.delete',$product->id)}}" method="POST">
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

