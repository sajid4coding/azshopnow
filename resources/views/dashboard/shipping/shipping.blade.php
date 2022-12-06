@extends('layouts.dashboardmaster')

@section('content')
    <div class="container justify-content-center align-items-center">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col" style="margin: 0 5px">
                <div class="card text-start">
                    <form action="{{ route('shipping.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <label class="mb-2 fw-bold" for="shipping_name">Shipping Name</label>
                            <input id="shipping_name" name="shipping_name" class="form-control mb-4" type="text" placeholder="type shipping...">
                            <label class="mb-2 fw-bold" for="shipping_name">Shipping Cost</label>
                            <input name="shipping_cost" class="form-control mb-2" type="number" placeholder="type shipping cost...">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn btn-sm">Add Shipping</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col" style="margin: 0 5px">
                <div class="card text-start">
                    <div class="card-body">
                        <h4 class="card-title mb-2">Shipping List</h4>
                        <div class="table-responsive">
                            <table class="table text-center fw-bold">
                                <thead style="border: 1px solid">
                                    <tr>
                                        <th>Shipping Name</th>
                                        <th>Cost</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid">
                                    @forelse ($shippings as $shipping)
                                        <tr>
                                            <td>{{ $shipping->shipping_name }}</td>
                                            <td>{{ $shipping->cost }}</td>
                                            <td>
                                                <form action="{{ route('shipping.destroy', $shipping->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm menu-link" ><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <span class="text-danger">No Shipping Added Yet</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

