@extends('layouts.vendor_master')

@section('vendor_body_content')
    <div class="col-lg-9">
        <div class="row align-items-center">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h4 class="card-title">Request Details</h4>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Total Amount:</th>
                                        <th>Commission (-{{ $seller_data->seller_commission }}%):</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_amount = 0;
                                    @endphp
                                    @forelse ($invoice_pay_request as $invoice)
                                        <tr>
                                            <td>#{{ $invoice->id }}</td>
                                            <td>{{ $invoice->total_price}}</td>
                                            <td>{{ $invoice->total_price * $seller_data->seller_commission/100}}</td>
                                            <td>{{ floor($invoice->total_price - $invoice->total_price * $seller_data->seller_commission/100) }}</td>
                                            @php
                                                $total_amount += floor($invoice->total_price - $invoice->total_price * $seller_data->seller_commission/100);
                                            @endphp
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
                                                <h4>Total: ${{ $total_amount }}</h4>
                                                @if ($total_amount > $seller_data->minimum_amount_withdraw)
                                                    <form action="{{ route('vendor.withdrawal') }}" method="POST">
                                                        @csrf
                                                        <input hidden type="text" name="invoice_ids" value="{{ $invoice_pay_request->pluck('id') }}">
                                                        <button type="submit" class="btn btn-primary my-2 py-1 px-3">Withdraw</button>
                                                    </form>
                                                @else
                                                    <span class="text-danger">Minimum Withdraw Amount ${{ $seller_data->minimum_amount_withdraw }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection
