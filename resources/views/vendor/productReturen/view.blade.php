@extends('layouts.vendor_master')
@section('vendor_body_content')
<div class="col-md-9">
    <h5>Return Products</h5>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                    {{-- @if (session('success'))
                        <div class="alert alert-success">
                            <span>{{session('success')}}</span>
                        </div>
                    @endif --}}
                    <div class="row">
                        <form action="{{route('view.return.product.Post',$returnProducts->id)}}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <h5><span class="text-muted">Customer Name:</span>{{$customer->name}}</h5>
                                <h5><span class="text-muted">Customer Email:</span>{{$customer->email}}</h5>
                                @if ($customer->phone_number)
                                    <h5><span class="text-muted">Phone Number:</span>{{$customer->phone_number}}</h5>
                                @endif
                            </div>
                            <hr>
                            <div class="text-start mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input readonly type="text" name="product_name" id="product_name" class="form-control" value="{{$returnProducts->product_name}}">
                            </div>
                            <div class="mb-3 text-start">
                                <label for="return_message" class="form-label">Describe Product Problem</label>
                                <textarea readonly name="return_message" id="return_message" rows="5" class="form-control">{{$returnProducts->return_message}}</textarea>
                            </div>
                            <div class="mb-5">
                                <label for="status" class="form-label">Status*</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="completed">Approve</option>
                                    <option value="rejected">Reject</option>
                                </select>
                            </div>
                            <button class="btn btn-sm btn-primary">Send Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
