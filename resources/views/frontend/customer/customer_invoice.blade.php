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
                <td style="padding: 10px">{{ $sl++ }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->payment }}</td>
                <td>{{ $order->order_status }}</td>
                <td>{{ $order->total_price }}</td>
                <td>
                    <a href="{{ route('invoice.download', $order->id) }}">Invoice <i class="fas fa-download"></i></a>
                </td>
            </tr>

            <tr style="background: #09091a !important;">
                <td colspan="7" style="background: #3c4550 !important; color:white;padding:10px;">
                    <span style="font-weight: 500;font-size:18px">
                        Details :
                    </span>
                    @foreach (App\Models\Order_Detail::where('invoice_id', $order->id)->get() as $review)
                        <span style="display: block;padding-left:30px">
                            Product Name:  <span style="color:#00d9ff !important;margin-right:20px"><a  style="color:#00d9ff !important;" href="{{ route('single.product', ['id'=>$review->relationwithproduct->id,'title'=>Str::slug($review->relationwithproduct->product_title)]) }}">{{ $review->relationwithproduct->product_title }}</a>  </span>
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
                                <a href="{{ route('product.review', $review->id) }}" class="btn btn-danger py-2 px-4" style="margin:10px;background:#FF4800;font-weight:300">Review <i class="fas fa-pen-alt"></i> </a>
                            @endif
                            @php
                               $existData= App\Models\Product_Return::where('invoice_id',$order->id)->exists();
                            @endphp
                            @if ($existData == 0 )
                                @if ($order->order_status=='delivered' && $order->payment=='paid')
                                   @if ($order->created_at->diffInDays(\Carbon\Carbon::now()) < 7)
                                     <a href="{{ route('return.product', $order->id) }}" class="btn btn-danger py-2 px-4" style="margin:10px;background:#FF4800;font-weight:300">Return Product </a>
                                   @endif
                                @endif
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
