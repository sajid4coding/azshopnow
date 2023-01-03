@extends('layouts.vendor_master')

@section('vendor_body_content')
<div class="col-lg-9">

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>SL</th>
                <th>Cus. Name</th>
                <th>Pay. System</th>
                <th>Pay. Status</th>
                <th>Total Amount</th>
                <th>Order Status</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invoices as $invoice)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $invoice->billing_first_name }}</td>
                <td>{{ $invoice->payment_method }}</td>
                <td>{{ $invoice->payment }}</td>
                <td>{{ $invoice->total_price }}</td>
                <td>{{ $invoice->order_status }}</td>
                <td>{{ $invoice->created_at->format('d/m/y') }}</td>
            </tr>
            <tr style="background: #09091a !important">
                <td colspan="7" style="background: #26303d !important; color:white;padding:10px;">
                    <span style="font-weight: 500;font-size:18px">
                        Details :
                    </span>
                    @foreach (App\Models\Order_Detail::where('invoice_id', $invoice->id)->get() as $order)
                        <span style="display: block;padding-left:30px">
                        Product Name:  <span style="color:#00d9ff !important;margin-right:20px"><a style="color:#00d9ff !important;" href="{{ route('single.product', ['id'=> $order->relationwithproduct->id, 'title'=>Str::slug($order->relationwithproduct->product_title)]) }}">{{ $order->relationwithproduct->product_title }}</a></span>
                        @if ($order->size_id && $order->color_id)
                            Color:  <span style="color:#00d9ff !important;margin-right:20px">{{ $order->relationwithcolor->color_name }} </span>
                            Size:  <span style="color:rgb(0, 217, 255) !important;margin-right:20px">{{ $order->relationwithsize->size }}  </span>
                        @elseif($order->size_id)
                            Size:  <span style="color:rgb(0, 217, 255) !important;margin-right:20px">{{ $order->relationwithsize->size }}  </span>
                        @elseif($order->color_id)
                            Color:  <span style="color:#00d9ff !important;margin-right:20px">{{ $order->relationwithcolor->color_name }} </span>
                        @endif

                        Quantity :  <span style="color:rgb(0, 217, 255) !important;margin-right:20px">{{ $order->quantity }}  </span>

                        Unit Price :  <span style="color:rgb(0, 217, 255) !important;margin-right:20px">${{ $order->total_price }} </span>
                        </span>
                    @endforeach
                </td>

                {{-- @php
                    $reviews = App\Models\ProductReview::where('order_detail_id', $order->id)->get();
                @endphp
                @if ($reviews)
                    @foreach ($reviews as $review)
                        <td colspan="2" style="background: #26303d83 !important; color:white;padding:10px;">
                            <span style="font-weight: 500;font-size:18px">
                                Review :
                            </span>
                            <div class="rating">
                                @for ($x = 1; $x <= 5; $x++)
                                    @if ($x <= $review->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star"></i><!--Empty star-->
                                    @endif
                                @endfor
                                <textarea readonly class="form-control" cols="5" rows="4" style="overflow-y: scroll;  height: 100px; resize:none; font-size:12px;">{{ $review->comment }}</textarea>
                            </div>
                        </td>
                    @endforeach
                @endif --}}
             </tr>
        @empty
            <tr>
                <td colspan="50" class="text-center">
                    <span class="text-danger">No available data</span>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>
@endsection
@section('footer_script')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection

