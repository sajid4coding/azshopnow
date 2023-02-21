@extends('layouts.vendor_master')

@section('vendor_body_content')

<div class="col-lg-9 col-md-9">

    <div class="card">
        <div class="card-header">
            <h3>Create Custom Invoice</h3>
        </div>
        <div class="card-body">
            <form action="{{route('custom.invoice.post')}}" method="POST">
                @csrf
                <div class="mt-3">
                    <label class="form-label" for="name">Customer Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mt-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="mt-3">
                    <label class="form-label" for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="mt-3">
                    <label class="form-label" for="phone_number">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control">
                </div>
                <h6 class="mt-3">Product Details</h6>
                <div>
                    <label class="form-label" for="Title">Product Title</label>
                    <select class="form-select" name="product_title" id="Title">
                        <option value="">- Select Product -</option>
                        @foreach ($vendorProducts as $product)
                            <option value="{{$product->product_title}}">{{$product->product_title}}</option>
                        @endforeach
                    </select>
                </div>
               <div class="mt-3">
                    <label for="price" class="form-label">Product Price</label>
                    <input type="text" name="price" id="price" class="form-control">
               </div>
               <div class="mt-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control">
               </div>

               <h6 class="mt-3">For Variable Product ( Optional )</h6>
               <div>
                    <label for="size" class="form-label">Size</label>
                    <input type="text" name="size" id="size" class="form-control">
               </div>
               <div class="mt-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" name="color" id="color" class="form-control">
               </div>
               <h6 class="mt-3">Payment Option</h6>
               <div class="mt-3">
                        <label for="tax" class="form-label">Tax</label>
                        <input type="number" name="tax" id="tax" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="delivery_charge" class="form-label">Delivery Charge</label>
                    <input type="number" name="delivery_charge" id="delivery_charge" class="form-control">
               </div>
               <div class="mt-3">
                <label for="payment_status" class="form-label"> Payment Method: </label>
                <select name="payment_status" id="payment_status" class="form-select">
                    {{-- <option value="">- Select Payment Method -</option> --}}
                    <option value="paid">Paid</option>
                    <option value="cash on delivery">Cash on Delivery</option>
                </select>
           </div>
               <div class="text-center mt-5">
                <button class="btn btn-sm btn-primary">Create Invoice</button>
               </div>

            </form>
        </div>
    </div>

</div>

@endsection
