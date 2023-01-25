{{-- @component('mail::message')

@component('mail::panel')
# {{$billingName}}, order a product.

Product Name: <b>{{$productName['']}}</b>

Check the product's Invoice.
@endcomponent

Thanks <br>
{{ config('app.name') }}
@endcomponent --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD SHOP</title>

    <style>
        body{
            overflow-x: hidden;
        }
       table tbody td{
            border: 1px solid #ff774d5b;
            padding: 5px;
        }
        th{
            padding: 5px;
        }
        h2{
            margin: 0;
            padding: 0;
            padding-bottom: 20px;
        }
    </style>

</head>

<body style="margin: 0; padding:0">
    <!-- TABLE START  -->
         <table style="width: 1056px;margin:0 auto;" bgcolor="#222831" cellpadding="0" border="0" cellspacing="0" >
             <thead style="background: #df4719;display: flex;color: white; font-family: Arial, Helvetica, sans-serif;margin-bottom: 50px;">
                 <tr style="width:100%">
                     <td colspan="3" style="width: 200px !important;background: rgb(56, 0, 0);padding: 10px;border-bottom-right-radius: 250px;border-top-right-radius: 250px;">
                        <picture>
                            <img style="width: 40px;margin-left: 50px;" src="https://i.postimg.cc/7hHcYhKz/kisspng-logo-font-flame-logo-5b4b2d7c7630f8-6261563915316535004841.png" alt="logo">
                        </picture>
                     </td>
                     <td colspan="3" style="width: 70%;border-radius: 10px;">
                        {{-- <img src="https://i.postimg.cc/DyZGddrW/sagor.jpg" width="700" height="90" /><hr /> --}}
                            {{ env('APP_NAME') }}
                     </td>
                </tr>
             </thead>
             <tbody style="padding: 50px;display: inline-table;color:#ffffff;">
                <!-- COMPANY INFO START -->
                <tr>
                    <td colspan="3" style="width: 70%;padding-left: 20px;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-weight:200">
                        <h2 style="font-size: 28px;"><span style="color: #df4719;font-family:Verdana, Geneva, Tahoma, sans-serif;">I</span>nvoice</h2>

                        <span  style="display: block; font-size: 16px;">
                             <span style="padding-right: 6px; font-weight: 700;">Invoice No. : </span> <span style="color:#ffffffbd"> #{{$invoice->id}}</span>
                        </span>

                        <span style="display: block;margin-top: 10px;font-size: 16px;">
                             <span style="padding-right: 6px; font-weight: 700;">Issue Date. : </span> <span style="color:#ffffffbd"> {{$invoice->created_at->now()->format('Y-m-d')}}</span>
                        </span>

                    </td>
                    <td colspan="2" style="width: 30%;padding-left: 20px;line-height: 1.4;font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;font-weight:200">
                        <h2 style="font-size: 28px;"><span style="color: #df4719;font-family:Verdana, Geneva, Tahoma, sans-serif;">To</span></h2>
                        <span  style="display: inline-table; font-size: 16px;">
                             <span style="padding-right: 6px; font-weight: 700;">Name : </span> <span style="color:#ffffffbd"> {{$invoice->billing_first_name}}</span>
                        </span>
                        <span  style="display: inline-table; font-size: 16px;">
                             <span style="padding-right: 6px; font-weight: 700;">Email : </span> <span style="color:#ffffffbd"> {{$invoice->billing_email}}</span>
                        </span>
                        <span style="display: inline-table;margin-top: 10px;font-size: 16px;">
                             <span style="padding-right: 6px; font-weight: 700;">Aaddress : </span> <span style="color:#ffffffbd;"> {{$invoice->billing_address}} </span>
                        </span>
                        <span style="display: inline-table;margin-top: 10px;font-size: 16px;">
                             <span style="padding-right: 6px; font-weight: 700;">Phone : </span> <span style="color:#ffffffbd;"> {{$invoice->billing_phone}} </span>
                        </span>
                        <span style="display: inline-table;margin-top: 10px;font-size: 16px;">
                             <span style="padding-right: 6px; font-weight: 700;">Shop Name : </span> <span style="color:#ffffffbd;"> {{ $invoice->relationwithuser->shop_name }} </span>
                        </span>
                    </td>
                </tr>
                <!-- COMPANY INFO END -->
                <!-- COMPANY INVOICE INFO START -->
                <tr>
                    <td colspan="5">
                        <table style="width:100%;padding: 50px;" border="0" cellpadding="0" cellspacing="0">
                            <thead style="text-align: left;background: #c53104;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                <tr >
                                    <th style="padding: 10px;">NO</th>
                                    <th >Details</th>
                                    <th >Quantity</th>
                                    <th >Price</th>
                                    <th >Total</th>
                                </tr>
                            </thead>
                          <tbody style="text-align: left; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                            @foreach ($orders as $order)
                                <tr>
                                    <td style="padding: 10px;">{{$loop->index+1}}</td>
                                    <td>{{$order->relationwithproduct->product_title}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->total_price}}</td>
                                    <td>{{$order->quantity * $order->total_price}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" style="text-align: right;padding-right: 50px;box-sizing: border-box;font-weight: 600;">Sub Total : </td>
                                <td colspan="1">${{$invoice->subtotal}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;padding-right: 50px;box-sizing: border-box;font-weight: 600;">Tax (+) : </td>
                                <td colspan="1">${{$invoice->tax_amount}}</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;padding-right: 50px;box-sizing: border-box;font-weight: 600;">Delivery Change (+) : </td>
                                <td colspan="1">${{$invoice->delivery_change}}</td>
                            </tr>
                            <tr style="background: #df4719;">
                                <td colspan="4" style="text-align: right;padding-right: 50px;box-sizing: border-box;font-weight: 600;">Total : </td>
                                <td colspan="1">${{$invoice->total_price}}</td>
                            </tr>
                          </tbody>
                        </table>
                    </td>
                </tr>

                <!-- COMPANY INVOICE INFO END -->
             </tbody>
             <tfoot style="padding: 50px;display: inline-table;color:#ffffff;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                <tr>
                    <td colspan="2"  style="width: 40%;">

                        <span  style="display: inline-table; font-size: 24px;font-weight: 200;color: #c531047e;">
                           Payment Information
                       </span>


                       <span style="display: block;margin-top: 10px;font-size: 16px;">
                            <span style="padding-right: 6px; font-weight: 700;">Account : </span> <span style="color:#ffffffbd">   1234567890</span>
                       </span>

                       <span style="display: block;margin-top: 10px;font-size: 16px;">
                            <span style="padding-right: 6px; font-weight: 700;">A/C Name : </span> <span style="color:#ffffffbd">    Add your details</span>
                       </span>

                       <span style="display: block;margin-top: 10px;font-size: 16px;">
                            <span style="padding-right: 6px; font-weight: 700;">Bank Details : </span> <span style="color:#ffffffbd">    Add your details</span>
                       </span>

                    </td>
                    <td colspan="2" style="width: 30%;">
                        <span  style="display: inline-table; font-size: 24px;font-weight: 200;color: #c531047e;">
                            Terms & Conditions
                       </span>
                       <span style="display: inline-table;margin-top: 10px;font-size: 16px;">
                           <span style="color:#ffffffbd">   Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                       </span>

                    </td>
                    <td colspan="1"  style="width: 30%;text-align: right;">
                        <p>
                        <span style="display: inline-table;margin-top: 10px;font-size: 16px;">
                            <p><span style="color:#ffffffbd;display: inline-table;">   ________________</span></p>
                            <span style="padding-right: 6px; font-weight: 700;"-> Authorised Sign  </span>
                       </span>
                    </p>
                    </td>
                </tr>
             </tfoot>
         </table>
    <!-- TABLE END -->
</body>
</html>
