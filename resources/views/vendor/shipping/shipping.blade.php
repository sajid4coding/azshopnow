@if (!membership())
    @extends('layouts.vendor_master')

    @section('vendor_body_content')
    <div class="col-lg-9">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col" style="margin: 0 5px">
                <div class="card text-start">
                    <form class="form d-flex flex-column flex-lg-row form-prevent-multiple-submits" action="{{ route('vendor-shipping.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <label class="mb-2 fw-bold" for="shipping_name">Shipping Name</label>
                            <input id="shipping_name" name="shipping_name" class="form-control mb-4 @error('shipping_name') is-invalid @enderror" type="text" placeholder="Ex.inside city" value="{{ old('shipping_name') }}">
                            <label class="mb-2 fw-bold" for="shipping_cost">Shipping Cost</label>
                            <input id="shipping_cost" name="shipping_cost" class="form-control mb-2 @error('shipping_cost') is-invalid @enderror" type="number" placeholder="type shipping cost..." value="{{ old('shipping_cost') }}">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn btn-sm button-prevent-multiple-submits">Add Shipping</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col" style="margin: 0 5px">
                <div class="card text-start">
                    <div class="card-body">
                        <h4 class="card-title mb-2 text-center">Shipping List</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center fw-bold">
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
                                            <td>${{ $shipping->shipping_cost }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a href="{{ route('vendor-shipping.edit', $shipping->id) }}"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                                                <form action="{{ route('vendor-shipping.destroy', $shipping->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" style="border: none"><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
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
    @section('footer_script')
    @if (session('create_success'))
        <script>
            $( document ).ready(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'success',
                title: '{{ session('create_success') }}'
                })
            });
        </script>
    @endif
    @if (session('update_success'))
        <script>
            $( document ).ready(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'success',
                title: '{{ session('update_success') }}'
                })
            });
        </script>
    @endif
    @if (session('delete_success'))
        <script>
            $( document ).ready(function() {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'error',
                title: '{{ session('delete_success') }}'
                })
            });
        </script>
    @endif
    @endsection
@endif
