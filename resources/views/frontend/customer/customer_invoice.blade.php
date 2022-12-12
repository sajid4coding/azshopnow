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
                        <span>Product Name: <a href="{{ route('single.product', $order->relationwith_orderinvoice->relationwithproduct->id) }}">{{ $order->relationwith_orderinvoice->relationwithproduct->product_title }}</a></span><br>
                        @if ($order->relationwith_orderinvoice->size_id && $order->relationwith_orderinvoice->color_id)
                            <span>Size: {{ $order->relationwith_orderinvoice->relationwithsize->size }}</span><br>
                            <span>Color: {{ $order->relationwith_orderinvoice->relationwithcolor->color_name }}</span>

                        @elseif($order->relationwith_orderinvoice->size_id)
                            <span>Size: {{ $order->relationwith_orderinvoice->relationwithsize->size }}</span>

                        @elseif($order->relationwith_orderinvoice->color_id)
                            <span>Color: {{ $order->relationwith_orderinvoice->relationwithcolor->color_name }}</span>
                        @endif
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
