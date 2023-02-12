@extends('layouts.customermaster')
@section('customermasert_body')
<div class="tab-pane  active text-center" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
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
                        <form action="{{route('return.product.post',['id'=>$product->id,'invoiceID'=>$invoiceID])}}" method="POST">
                            @csrf
                            <div class="text-start mb-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input readonly type="text" name="product_name" id="product_name" class="form-control" value="{{$product->product_title}}">
                            </div>
                            <div class="mb-5 text-start">
                                <label for="return_message" class="form-label">Describe Product Problem</label>
                                <textarea name="return_message" id="return_message" rows="5" class="form-control"></textarea>
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
