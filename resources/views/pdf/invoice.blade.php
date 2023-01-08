<table style="box-sizing:border-box; border:1px solid #c8c8c8;" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>

      <td height="120px!important" colspan="2" align="center"><img src="https://i.postimg.cc/DyZGddrW/sagor.jpg" width="700" height="90" /><hr />
          {{ env('APP_NAME') }}
      </td>
    </tr>
    <tr>
      <td height="31" colspan="2" style="padding-left:10px; font-size:20px; font-family:Verdana, Geneva, sans-serif;"><strong>INVOICE</strong></td>
    </tr>
    <tr>
      <td width="61%" height="28"><table style="box-sizing:border-box; border:1px solid #c8c8c8; margin:10px;" width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td  width="25%" height="25" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; font-size:14px;"><strong>Name</strong></td>
            <td width="75%" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-bottom:1px solid #c8c8c8;  font-size:14px;">{{ $invoice->billing_first_name }}</td>
          </tr>
        <tr>
          <td  width="25%" height="25" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; font-size:14px;"><strong>Email </strong></td>
          <td width="75%" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-bottom:1px solid #c8c8c8;  font-size:14px;">{{ $invoice->billing_email }}</td>
        </tr>
        <tr>
          <td height="25" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-right:1px solid #c8c8c8;  font-size:14px;"><strong>Address</strong></td>
          <td style="padding-left:10px; font-family:Verdana, Geneva, sans-serif;  font-size:14px;">{{ $invoice->billing_address }}</td>
        </tr>
        <tr>
          <td height="25" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8;  font-size:14px;"><strong>Mobile</strong></td>
          <td style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-top:1px solid #c8c8c8;  font-size:14px;">{{ $invoice->billing_phone }}</td>
        </tr>

        <tr>
            <td height="25" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8; font-size:14px;"><strong>Shop Name</strong></td>
            <td style="padding-left:10px; font-family:Verdana, Geneva, sans-serif;  border-top:1px solid #c8c8c8; font-size:14px;">{{ $invoice->relationwithuser->shop_name }}</td>
        </tr>

      </table></td>
      <td width="39%" align="right"><table style="box-sizing:border-box; border:1px solid #c8c8c8; margin:10px;" width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="25" align="right" style="padding-right:10px; font-family:Verdana, Geneva, sans-serif; border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; font-size:14px;"><strong>Order ID</strong> : #{{ $invoice->id }}</td>
          </tr>
        <tr>
          <td height="25" align="right" style="padding-right:10px; font-family:Verdana, Geneva, sans-serif; border-right:1px solid #c8c8c8;  font-size:14px;"><strong>Date:</strong> : {{ $invoice->created_at->format('d-m-y') }}</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="28" colspan="2"> </td>
    </tr>
    <tr>
      <td style="padding:10px;" height="28" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="13%" height="28" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-left:#c8c8c8 1px solid; border-top:#c8c8c8 1px solid; font-family:Verdana, Geneva, sans-serif; font-size:13px;"><strong>S.N</strong></td>
          <td width="22%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:#c8c8c8 1px solid; font-family:Verdana, Geneva, sans-serif; font-size:13px;"><strong>DESCRIPTION </strong></td>
          <td width="26%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:#c8c8c8 1px solid; font-family:Verdana, Geneva, sans-serif; font-size:13px;"><strong>AMOUNT</strong></td>
          <td width="20%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:#c8c8c8 1px solid; font-family:Verdana, Geneva, sans-serif; font-size:13px;"><strong>QUATITY</strong></td>
          <td width="19%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:#c8c8c8 1px solid; font-family:Verdana, Geneva, sans-serif; font-size:13px;"><strong>SUBTOTAL</strong></td>
        </tr>
        @foreach ($order_details as $order_detail)
            <tr>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-left:#c8c8c8 1px solid" height="28" align="center">1</td>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">
                {{ $order_detail->relationwithproduct->product_title }} <br>
                @if ($order_detail->size_id && $order_detail->color_id)
                    Size: {{ $order_detail->relationwithsize->size }}<br>
                    Color: {{ $order_detail->relationwithsize->color_name  }}
                @elseif($order_detail->size_id)
                    Size: {{ $order_detail->relationwithsize->size }}
                @elseif($order_detail->color_id)
                    Color: {{ $order_detail->relationwithsize->color_name  }}
                @endif
                </td>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">{{ $order_detail->total_price }}</td>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">{{ $order_detail->quantity }}</td>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">{{ $order_detail->quantity * $order_detail->total_price }}</td>
            </tr>
        @endforeach
        {{-- <tr>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-left:#c8c8c8 1px solid" height="28" align="center">2</td>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">Hosting </td>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">1500</td>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">1</td>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">1500</td>
        </tr>
        <tr>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-left:#c8c8c8 1px solid" height="28" align="center">3</td>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">Designing</td>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">4000</td>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">1</td>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">4000</td>
        </tr> --}}
      </table>

      </td>
    </tr>
    <tr>
      <td style="padding:10px;" height="28"> </td>
      <td style="padding:10px;" height="28"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8; border-left:1px solid #c8c8c8; font-family:Verdana, Geneva, sans-serif; font-size:13px; padding-left:10px;" width="51%" height="29"><strong>Sub Total Amount</strong></td>
          <td width="49%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8;">{{ $invoice->subtotal }}</td>
        </tr>
        @if ($invoice->coupon_discount != NULL)
            <tr>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8; border-left:1px solid #c8c8c8; font-family:Verdana, Geneva, sans-serif; font-size:13px; padding-left:10px;" width="51%" height="29"><strong>Coupon Discount</strong></td>
              <td width="49%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8;">{{ $invoice->coupon_discount }}</td>
            </tr>
            <tr>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8; border-left:1px solid #c8c8c8; font-family:Verdana, Geneva, sans-serif; font-size:13px; padding-left:10px;" width="51%" height="29"><strong>After Coupon Discount</strong></td>
              <td width="49%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8;">{{ $invoice->after_coupon_discount }}</td>
            </tr>
        @endif
        <tr>
            <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8; border-left:1px solid #c8c8c8; font-family:Verdana, Geneva, sans-serif; font-size:13px; padding-left:10px;" width="51%" height="29"><strong>Delivery Charge</strong></td>
            <td width="49%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8;">{{ $invoice->delivery_change }}</td>
        </tr>
        {{-- <tr>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-left:1px solid #c8c8c8; font-family:Verdana, Geneva, sans-serif; font-size:13px; padding-left:10px;" height="29"><strong>GST </strong></td>
          <td align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;">200</td>
        </tr> --}}
        <tr>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-left:1px solid #c8c8c8; font-family:Verdana, Geneva, sans-serif; font-size:13px; padding-left:10px;" height="29"><strong>Tax</strong></td>
          <td align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;">{{ $invoice->tax }}</td>
        </tr>
        <tr>
          <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-left:1px solid #c8c8c8; font-family:Verdana, Geneva, sans-serif; font-size:13px; padding-left:10px;" height="29"><strong>Total Amount</strong></td>
          <td align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;">{{ $invoice->total_price }}</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="28" colspan="2"> </td>
    </tr>
    <tr>
      <td style="font-family:Verdana, Geneva, sans-serif; font-size:13px;" height="28" colspan="2" align="center">
       <strong>Company Name</strong>
                              <br>
                              ABC AREA
                              <br>
                              Tel: +00 000 000 0000 | Email: info@companyname.com
                              <br>
                              Company Registered in Country Name. Company Reg. 12121212.
                              <br>
                              VAT Registration No. 021021021 | ATOL No. 1234
      </td>
    </tr>
    <tr>
      <td height="28" colspan="2"> </td>
    </tr>
  </table>
