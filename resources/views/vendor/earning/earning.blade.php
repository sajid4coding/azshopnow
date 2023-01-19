@extends('layouts.vendor_master')

@section('vendor_body_content')
<div class="col-lg-9">

    <table id="example" class="table table-striped" style="width:100%;">
        <thead>
            <tr>
                <th></th>
                <th>Order ID</th>
                <th>Amount</th>
                <th>Withdrawal Status</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
        <form action="{{ route('vendor.withdrawal.request') }}" method="POST">
            @csrf
            <tbody>
                @forelse ($invoices as $invoice)
                    <tr>
                        @if ($invoice->withdraw_status == 'not yet requested withdrawal')
                            <td><input type="checkbox" name="checkbox[]" value="{{ $invoice->id }}"></td>
                        @else
                            <td><input type="checkbox" disabled value="{{ $invoice->id }}"></td>
                        @endif
                        <td>#{{ $invoice->id }}</td>
                        <td>{{ floor($invoice->total_price - $invoice->total_price * $seller_data->seller_commission/100) }}</td>
                        <td>
                            <span class="text-danger">{{ $invoice->withdraw_status }}</span>
                        </td>
                        <td>
                            @if ($invoice->updated_at)
                                {{ $invoice->updated_at->format('d/m/y') }}
                            @endif
                        </td>
                        <td>
                            {{-- FIRST MODAL START --}}

                            <!-- Button trigger modal (Order View)-->
                            <button type="button" class="btn btn-primary py-1 px-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $invoice->id }}" style="border: none">
                                <i class="fas fa-eye"></i> View
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $invoice->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
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
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- FIRST MODAL EMD --}}


                            {{-- SECOND MODAL START --}}

                            <!-- Button trigger modal (Order Details)-->
                            <button type="button" class="btn btn-danger py-1 px-3" data-bs-toggle="modal" data-bs-target="#orderdetail{{ $invoice->id }}" style="border: none">
                                <i class="fas fa-info-circle"></i> Details
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="orderdetail{{ $invoice->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-primary">
                                                    <tbody>
                                                        <tr>
                                                            <th>Pay. System:</th>
                                                            <td>{{ $invoice->payment_method }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pay. Status:</th>
                                                            <td>{{ $invoice->payment }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Order Status:</th>
                                                            <td>{{ $invoice->order_status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total Amount:</th>
                                                            <td>{{ $invoice->total_price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Commission (-{{ $seller_data->seller_commission }}%):</th>
                                                            <td>{{ $invoice->total_price * $seller_data->seller_commission/100 }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- SECOND MODAL END --}}

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="50" class="text-center">
                            <span class="text-danger">No available data</span>
                        </td>
                    </tr>
                @endforelse
                    <tr>
                        <td colspan="50" class="text-center">
                            <button type="submit" class="btn btn-primary my-2 py-1 px-3">Withdraw Request</button>
                        </td>
                    </tr>
            </tbody>
        </form>
    </table>

</div>
@endsection
@section('footer_script')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection


