@extends('layouts.customermaster')
@section('customermasert_body')
<div class="">
    <h5 class="text-center pb-3">Your Orders</h5>
    <table class="table table-bordered">
        <tr>
            <th>SL</th>
            <th>Payment Method</th>
            <th>Payment</th>
            <th>Order Status</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        @php
            $sl = 1;
        @endphp
        @forelse ($orders as $order)
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->payment }}</td>
                <td>{{ $order->order_status }}</td>
                <td>{{ $order->total_price }}</td>
                <td>
                    <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-primary p-3">Download Invoice</a>
                </td>
            </tr>

            <tr style="background: #09091a !important;">
                <td colspan="7" style="background: #26303d !important; color:white;padding:10px;">
                    <span style="font-weight: 500;font-size:18px">
                        Details :
                    </span>
                    @foreach (App\Models\Order_Detail::where('invoice_id', $order->id)->get() as $review)
                        <span style="display: block;padding-left:30px">
                            Product Name:  <span style="color:#00d9ff !important;margin-right:20px"><a  style="color:#00d9ff !important;" href="{{ route('single.product', $review->relationwithproduct->id) }}">{{ $review->relationwithproduct->product_title }}</a>  </span>
                            @if ($review->size_id && $review->color_id)
                                Color: <span style="color:#00d9ff !important;margin-right:20px">{{ $review->relationwithcolor->color_name }} </span>
                                Size: <span style="color:rgb(0, 217, 255) !important;margin-right:20px">{{ $review->relationwithsize->size }}  </span>
                            @elseif($review->size_id)
                                Size: <span style="color:rgb(0, 217, 255) !important;margin-right:20px">{{ $review->relationwithsize->size }}  </span>
                            @elseif( $review->color_id)
                                Color: <span style="color:#00d9ff !important;margin-right:20px">{{ $review->relationwithcolor->color_name }} </span>
                            @endif

                            Quantity: <span style="color:rgb(0, 217, 255) !important;margin-right:20px">{{ $review->quantity }}  </span>

                            Unit Price: <span style="color:rgb(0, 217, 255) !important;margin-right:20px">${{ $review->total_price }}</span>
                            @php
                                $reviews = App\Models\ProductReview::where([
                                    'order_detail_id' => $review->id,
                                ])->exists();
                            @endphp
                            @if (!$reviews)
                                <a href="{{ route('product.review', $review->id) }}" class="btn btn-warning py-2 px-4" style="margin:10px">Write Review</a>
                            @endif
                        </span>
                    @endforeach
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
