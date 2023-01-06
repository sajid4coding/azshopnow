@if (!membership())
    @extends('layouts.vendor_master')

    @section('vendor_body_content')
    <div class="col-lg-9">

        <div class="row justify-content-center align-items-center g-2">
            <div class="col" style="margin: 0 5px">
                <div class="card text-start">
                    <form class="form d-flex flex-column flex-lg-row form-prevent-multiple-submits" action="{{ route('vendor-packaging.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <label class="mb-2 fw-bold" for="packaging_name">Packaging Name</label>
                            <input id="packaging_name" name="packaging_name" class="form-control mb-4 @error('packaging_name') is-invalid @enderror" type="text" placeholder="type packaging name..." value="{{ old('packaging_name') }}">
                            <label class="mb-2 fw-bold" for="packaging_cost">Packaging Cost</label>
                            <input id="packaging_cost" name="packaging_cost" class="form-control mb-2 @error('packaging_cost') is-invalid @enderror" type="number" placeholder="type packaging cost..." value="{{ old('packaging_cost') }}">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn btn-sm button-prevent-multiple-submits">Add Packaging</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col" style="margin: 0 5px">
                <div class="card text-start">
                    <div class="card-body">
                        <h4 class="card-title mb-2">Packaging List</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center fw-bold">
                                <thead style="border: 1px solid">
                                    <tr>
                                        <th>Packaging Name</th>
                                        <th>Cost</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 1px solid">
                                    @forelse ($packaging_lists as $packaging)
                                        <tr>
                                            <td>{{ $packaging->packaging_name }}</td>
                                            <td>${{ $packaging->packaging_cost }}</td>
                                            <td>
                                                <a href="{{ route('vendor-packaging.edit', $packaging->id) }}"><i class="fa-solid fa-pen-to-square" aria-hidden="true"></i></a>
                                                <form action="{{ route('vendor-packaging.destroy', $packaging->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" style="border: none"><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <span class="text-danger">No Packaging Added Yet</span>
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
