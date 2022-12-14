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
                <th>Order Status</th>
                <th>Total Amount</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
             <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $invoice->billing_first_name }}</td>
                <td>{{ $invoice->payment_method }}</td>
                <td>{{ $invoice->payment }}</td>
                <td>{{ $invoice->payment_method }}</td>
                <td>{{ $invoice->total_price }}</td>
                <td>{{ $invoice->created_at->format('d/m/y') }}</td>
             </tr>
             <tr style="background: #09091a !important">
                <td colspan="7" style="background: #26303d !important; color:white;padding:10px;">
                    <span style="font-weight: 500;font-size:18px">
                        Details :
                    </span>
                    @foreach (App\Models\Order_Detail::where('invoice_id', $invoice->id)->get() as $order)
                        <span style="display: block;padding-left:30px">
                                Name:  <span style="color:#00d9ff !important;margin-right:20px">{{ $order->relationwithproduct->product_title }}  </span>
                                @if ($order->relationwithsize->size && $order->relationwithcolor->color_name)
                                    Color:  <span style="color:#00d9ff !important;margin-right:20px">{{ $order->relationwithcolor->color_name }} </span>
                                    Size:  <span style="color:rgb(0, 217, 255) !important;margin-right:20px">{{ $order->relationwithsize->size }}  </span>
                                @elseif($order->relationwithsize->size)
                                    Size:  <span style="color:rgb(0, 217, 255) !important;margin-right:20px">{{ $order->relationwithsize->size }}  </span>
                                @elseif( $order->relationwithcolor->color_name)
                                    Color:  <span style="color:#00d9ff !important;margin-right:20px">{{ $order->relationwithcolor->color_name }} </span>
                                @endif

                                Quantity :  <span style="color:rgb(0, 217, 255) !important;margin-right:20px">{{ $order->quantity }}  </span>

                                Unit Price :  <span style="color:rgb(0, 217, 255) !important;margin-right:20px">${{ $order->total_price }} </span>
                        </span>
                    @endforeach
                </td>
             </tr>
           @endforeach
        </tbody>
    </table>

</div>
@endsection
@section('footer_script')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection

