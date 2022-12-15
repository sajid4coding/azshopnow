@extends('layouts.customermaster')
@section('customermasert_body')
<div class="">
    <h5 class="text-center pb-3">Your purchased product list</h5>
    <table class="table table-breviewed">
        <tr>
            <th>SL</th>
            <th>Product</th>
            <th>Action</th>
        </tr>
        @php
            $sl = 1;
        @endphp
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td style="display: flex; gap: 20px;">
                        <img width="70px" height="70px" src="{{ asset('uploads/product_photo') }}/{{ $order->relationwith_orderinvoice->relationwithproduct->thumbnail }}" alt="">

                         <span>
                            <a  style="font-size: 16px; color:rgb(255, 38, 0);font-weight:500" href="{{ route('single.product', $order->relationwith_orderinvoice->relationwithproduct->id) }}">{{ $order->relationwith_orderinvoice->relationwithproduct->product_title }}</a> <br>
                        @if ($order->relationwith_orderinvoice->size_id && $order->relationwith_orderinvoice->color_id)
                            <span style="font-size: 12px; color:#3a3a3a;font-weight:500" >Size: {{ $order->relationwith_orderinvoice->relationwithsize->size }}</span><br>
                            <span style="font-size: 12px; color:#3a3a3a;font-weight:500" >Color: {{ $order->relationwith_orderinvoice->relationwithcolor->color_name }}</span>

                        @elseif($order->relationwith_orderinvoice->size_id)
                            <span style="font-size: 12px; color:#3a3a3a;font-weight:500" >Size: {{ $order->relationwith_orderinvoice->relationwithsize->size }}</span>

                        @elseif($order->relationwith_orderinvoice->color_id)
                            <span style="font-size: 12px; color:#3a3a3a;font-weight:500" >Color: {{ $order->relationwith_orderinvoice->relationwithcolor->color_name }}</span>
                        @endif
                         </span>
                    </td>
                    <td>

                       @php
                           $review = App\Models\ProductReview::find($order->id);
                       @endphp

                        @if (App\Models\ProductReview::find($order->id))
                            <div class="rating">
                                @for ($x = 1; $x <= $review->rating; $x++)
                                    <i class="fa-solid fa-star text-warning"></i>
                                @endfor
                                <textarea  readonly class="form-control" cols="5" rows="2" style="overflow-y: scroll;  height: 70px;resize:none">{{ $review->comment }}</textarea>
                            </div>
                        @else
                            <a href="{{ route('product.review', $order->id) }}" class="btn btn-warning py-2 px-4">Write Review</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="50" class="text-center text-danger">
                        <span>No Data Available</span>
                    </td>
                </tr>
            @endforelse
    </table>
</div>
@endsection
