<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Shop Name</th>
        <th>Billing Name</th>
        <th>Billing Email</th>
        <th>Billing Company</th>
        <th>Billing Phone</th>
        <th>Billing Country</th>
        <th>Billing Country Id</th>
        <th>Billing Address</th>
        <th>Order Comments</th>
        <th>Subtotal</th>
        <th>Coupon Discount</th>
        <th>After Coupon Discount</th>
        <th>Delivery Change</th>
        <th>Tax</th>
        <th>Tax Amount</th>
        <th>Total Price</th>
        <th>Payment Method</th>
        <th>Payment Status</th>
        <th>Order Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->user_id }}</td>
            <td>{{ $invoice->vendor_id }}</td>
            <td>{{ $invoice->billing_first_name }}</td>
            <td>{{ $invoice->billing_email }}</td>
            <td>{{ $invoice->billing_company }}</td>
            <td>{{ $invoice->billing_phone }}</td>
            <td>{{ $invoice->billing_country }}</td>
            <td>{{ $invoice->billing_country_id }}</td>
            <td>{{ $invoice->billing_address }}</td>
            <td>{{ $invoice->order_comments }}</td>
            <td>{{ $invoice->subtotal }}</td>
            <td>{{ $invoice->coupon_discount }}</td>
            <td>{{ $invoice->after_coupon_discount }}</td>
            <td>{{ $invoice->delivery_change }}</td>
            <td>{{ $invoice->tax }}</td>
            <td>{{ $invoice->tax_amount }}</td>
            <td>{{ $invoice->total_price }}</td>
            <td>{{ $invoice->payment_method }}</td>
            <td>{{ $invoice->payment }}</td>
            <td>{{ $invoice->order_status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
