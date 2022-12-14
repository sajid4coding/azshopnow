@extends('layouts.customermaster')
@section('customermasert_body')
<div class="">
    <h5 class="text-center pb-3">Your Orders</h5>
    <table class="table table-bordered">
        <tr>
            <th>SL</th>
            <th>Payment Method</th>
            <th>Payment</th>
            <th>Payment Status</th>
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
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->total_price }}</td>
                <td>
                    <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-primary">Download Invoice</a>
                </td>
            </tr>
            <tr class="mb-2">
                <td colspan="50" class="bg-secondary bg-gradient">
                    <div class="m-4">
                        @foreach (App\Models\Order_Detail::where('invoice_id', $order->id)->get() as $order)
                            <span>Product Name: <a href="{{ route('single.product', $order->relationwithproduct->id) }}">{{ $order->relationwithproduct->product_title }}</a></span> | 
                            <span>Quantity: {{ $order->quantity }}</span><br>
                            @if ($order->size_id && $order->color_id)
                                <span>Size: {{ $order->relationwithsize->size }}</span><br>
                                <span>Color: {{ $order->relationwithcolor->color_name }}</span>

                            @elseif($order->size_id)
                                <span>Size: {{ $order->relationwithsize->size }}</span>

                            @elseif($order->color_id)
                                <span>Color: {{ $order->relationwithcolor->color_name }}</span>
                            @endif
                        @endforeach
                    </div>
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
