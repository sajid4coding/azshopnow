@if (!membership())
    @extends('layouts.vendor_master')

    @section('vendor_body_content')
        <div class="col-lg-9">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col" style="margin: 0 5px">
                    <a href="{{ route('vendor-shipping.index') }}"><i class="fa-solid fa-arrow-left fa-2x mb-2"></i></a>
                    <h4 class="card-title mb-2">Edit Shipping</h4>
                    <div class="card text-start">
                        <form class="form d-flex flex-column flex-lg-row form-prevent-multiple-submits" action="{{ route('vendor-shipping.update', $shipping_data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <label class="mb-2 fw-bold" for="shipping_name">Shipping Name</label>
                                <input id="shipping_name" name="shipping_name" class="form-control mb-4 @error('shipping_name') is-invalid @enderror" type="text" placeholder="Ex.inside city" value="{{ $shipping_data->shipping_name }}">
                                <label class="mb-2 fw-bold" for="shipping_cost">Shipping Cost</label>
                                <input id="shipping_cost" name="shipping_cost" class="form-control mb-2 @error('shipping_cost') is-invalid @enderror" type="number" placeholder="type shipping cost..." value="{{ $shipping_data->shipping_cost }}">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary btn btn-sm button-prevent-multiple-submits">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
