@extends('layouts.customermaster')
@section('customermasert_body')
<div class="">
    <h5 class="text-center pb-3">Your Orders</h5>
    <table class="table table-bordered">
        <tr>
            <th>SL</th>
            <th>Order No</th>
            <th>Sub Total</th>
            <th>Discount</th>
            <th>Delivery Charge</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>1</td>
            <td>#120</td>
            <td>52500</td>
            <td>200</td>
            <td>100</td>
            <td>52400</td>
            <td>
                <a href="#" class="btn btn-primary">Download Invoice</a>
            </td>
        </tr>
    </table>
</div>
@endsection
