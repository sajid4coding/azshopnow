@extends('layouts.customermaster')
@section('header_css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('customermasert_body')
<div class="tab-pane  active text-center" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="card mt-5">
        <div class="card-header">
            <h5>Lists of Product Return</h5>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
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

