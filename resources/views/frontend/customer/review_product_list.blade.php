@extends('layouts.customermaster')
@section('customermasert_body')
<div class="">
    <h5 class="text-center pb-3">Your purchased product list</h5>
    <table class="table table-breviewed">
        <tr>
            <th>SL</th>
            <th>Product Name</th>
            <th>Action</th>
        </tr>
        @php
            $sl = 1;
        @endphp
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>
                        <a href="{{ route('single.product', $order->relationwith_orderinvoice->relationwithproduct->id) }}">{{ $order->relationwith_orderinvoice->relationwithproduct->product_title }}</a> <br>
                        @if ($order->relationwith_orderinvoice->size_id && $order->relationwith_orderinvoice->color_id)
                            <span>Size: {{ $order->relationwith_orderinvoice->relationwithsize->size }}</span><br>
                            <span>Color: {{ $order->relationwith_orderinvoice->relationwithcolor->color_name }}</span>

                        @elseif($order->relationwith_orderinvoice->size_id)
                            <span>Size: {{ $order->relationwith_orderinvoice->relationwithsize->size }}</span>

                        @elseif($order->relationwith_orderinvoice->color_id)
                            <span>Color: {{ $order->relationwith_orderinvoice->relationwithcolor->color_name }}</span>
                        @endif
                    </td>
                    <td>

                       @php
                           $review = App\Models\ProductReview::find($order->id);
                       @endphp

                        @if (App\Models\ProductReview::find($order->id))
                            <div class="rating">
                                @for ($x = 1; $x <= 5; $x++)
                                    @if ($x <= $review->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star"></i><!--Empty star-->
                                    @endif
                                @endfor
                                <textarea readonly class="form-control" cols="5" rows="2" style="overflow-y: scroll;  height: 100px;">{{ $review->comment }}</textarea>
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
