@extends('layouts.vendor_master')
@section('header_css')
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection
@section('vendor_body_content')

<div class="col-lg-9">

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Review Date</th>
                <th>Reply</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($reviews as $review)
            <tr>
                <td>
                    {{ $loop->index +1 }}
                </td>
                <td>
                    {{ $review->relationwithuser->name }}
                </td>
                <td>
                    {{ $review->relationwithproduct->product_title }}
                </td>
                <td>
                   {{ $review->rating }} of 5
                </td>
                <td>
                   {{ $review->comment }}
                </td>
                <td>
                   {{ $review->created_at->format('d-m-Y') }}
                </td>
                <td>
                    @if (replyHaveorNot("$review->id"))
                       <span style="color:rgba(80, 80, 80, 0.521)">Already sended</span>
                    @else
                    <span class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $review->id }}">
                       <i class="fa-sharp fa-solid fa-reply"></i>
                    </span>
                    @endif


                </td>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $review->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" style="font-family:Verdana, Geneva, Tahoma, sans-serif;color:rgb(90, 90, 90)" id="exampleModalLabel">Reply of feedback</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('feedback.post') }}"  method="post">
                                    @csrf
                                    <input hidden name="review_id" type="text" value="{{ $review->id }}">
                                    <input hidden name="vendor_id" type="text" value="{{ auth()->id() }}">
                                    <input hidden name="customer_id" type="text" value="{{ $review->user_id }}">
                                    <textarea style="resize:none" name="reply" id="" cols="30" rows="5"></textarea>


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary p-2 px-5 mt-4">Reply</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                <!-- Modal -->
            </tr>
            <!-- Button trigger modal -->

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
    @if (session('reply_success'))
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
        title: "{{session('reply_success')}}"
        });
    @endif
</script>
@endsection
