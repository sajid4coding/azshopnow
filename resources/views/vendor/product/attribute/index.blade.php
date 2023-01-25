@extends('layouts.vendor_master')

@section('vendor_body_content')
    <div class="col-lg-9">
        {{-- THIS IS FOR ADD SIZE START--}}
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <span>Add Size Attributes</span>
                    </div>
                    <div class="card-body">
                        @if (session('size_success_message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('size_success_message') }}
                        </div>
                        @endif
                        @if (session('size_danger_message'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('size_danger_message') }}
                        </div>
                        @endif
                        <form class=" form-prevent-multiple-submits" action="{{ route('attributes.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control @error('size') is-invalid @enderror" placeholder="Size Attributes Name" name="size">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center m-3">
                                        <button type="submit" class="btn btn-outline-primary text-black btn-sm py-2 px-3 item-certer button-prevent-multiple-submits">Add Size</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <span>Size Attributes List</span>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Size</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($attributesizes as $attributesize)
                                        <tr>
                                            <td>
                                                {{ $attributesize->size }}
                                            </td>
                                            <td>
                                                {{ $attributesize->created_at->diffForHumans(); }}
                                            </td>
                                            <td>
                                                <form action="{{ route('attributes.destroy', $attributesize->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="border: none"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="50" class="text-center">
                                                <span class="text-danger">No Data Available</span>
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
        {{-- THIS IS FOR ADD SIZE END--}}

        {{-- THIS IS FOR ADD COLOR START--}}
        <div class="row align-items-center mt-3">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <span>Add Color Attribute</span>
                    </div>
                    <div class="card-body">
                        @if (session('color_success_message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('color_success_message') }}
                            </div>
                        @endif
                        @if (session('color_danger_message'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('color_danger_message') }}
                        </div>
                        @endif
                        <form class=" form-prevent-multiple-submits" action={{ route('store_color') }} method="POST">
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-sm-12">
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-4 col-form-label">Color Name</label>
                                        <div class="col-sm-8 mb-3">
                                            <input type="text" class="@error('color_name') is-invalid @enderror form-control" name="color_name">
                                        </div>
                                        <label class="col-sm-4 col-form-label">Color</label>
                                        <div class="col-sm-8 mb-3">
                                            <input type="color" class="@error('color') is-invalid @enderror" name="color">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-outline-primary text-black btn-sm py-2 px-3 item-certer button-prevent-multiple-submits">Add Color</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <span>Add Color List</span>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Color Name</th>
                                        <th>Color</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($attributecolors as $attributecolor)
                                        <tr>
                                            <td>
                                                {{ $attributecolor->color_name }}
                                            </td>
                                            <td>
                                                <input disabled type="color" value="{{ $attributecolor->color }}">
                                            </td>
                                            <td>
                                                {{ $attributecolor->created_at->diffForHumans() }}
                                            </td>
                                            <td>
                                                <a href="{{ route('destroy_color', $attributecolor->id) }}" style="border: none"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="50" class="text-center">
                                                <span class="text-danger">No Data Available</span>
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
        {{-- THIS IS FOR ADD COLOR END--}}
    </div>
@endsection

