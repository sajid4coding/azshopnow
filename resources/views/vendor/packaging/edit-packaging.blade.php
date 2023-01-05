@if (!membership())
    @extends('layouts.vendor_master')

    @section('vendor_body_content')
        <div class="col-lg-9">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col" style="margin: 0 5px">
                    <a href="{{ route('vendor-packaging.index') }}"><i class="fa-solid fa-arrow-left fa-2x mb-2"></i></a>
                    <h4 class="card-title mb-2">Edit Packaging</h4>
                    <div class="card text-start">
                        <form class="form d-flex flex-column flex-lg-row form-prevent-multiple-submits" action="{{ route('vendor-packaging.update', $packaging_data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <label class="mb-2 fw-bold" for="packaging_name">Shipping Name</label>
                                <input id="packaging_name" name="packaging_name" class="form-control mb-4 @error('packaging_name') is-invalid @enderror" type="text" placeholder="Ex.inside city" value="{{ $packaging_data->packaging_name }}">
                                <label class="mb-2 fw-bold" for="packaging_cost">Shipping Cost</label>
                                <input id="packaging_cost" name="packaging_cost" class="form-control mb-2 @error('packaging_cost') is-invalid @enderror" type="number" placeholder="type shipping cost..." value="{{ $packaging_data->packaging_cost }}">
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
