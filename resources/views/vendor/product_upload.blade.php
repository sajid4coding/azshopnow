@extends('layouts.vendor_master')
@section('vendor_body_content')
<div class="col-lg-9 col-md-9">

    <div class="tab-pane" id="productSection">
        <div class="product-upload-wrap">
            @if (session('product_add_success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('product_add_success') }}</strong>
                </div>

            @endif
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="product-upload-box text-center">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="center">
                                <div class="form-input">
                                <div class="preview">
                                    <img id="file-ip-1-preview" >
                                </div>
                                <label for="file-ip-1">Thumbnail</label>
                                <input type="file" name="thumbnail" id="file-ip-1" accept="image/*" onchange="showPreview(event);">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4"></div>
                        <div class="col-lg-5 col-md-5">
                            <div class="upload__box">
                                <div class="upload__btn-box">
                                <label class="upload__btn">
                                    <p>Gallery Images</p>
                                    <input name="gellery[]" type="file" multiple data-max_length="20" class="upload__inputfile">
                                </label>
                                </div>
                                <div class="upload__img-wrap"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li >{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="col-lg-6">
                        <div class="form-grp">
                            <label for="title">Product Title</label>
                            <input type="text" name="product_title" id="title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-grp">
                            <label for="price">Product Price</label>
                            <input type="text"name="product_price" id="price" placeholder="$ -">
                        </div>
                    </div>
                    @php
                        $categories=category()
                    @endphp
                    <div class="col-lg-6">
                        <div class="form-grp">
                            <label for="brand">Parent Category</label>
                            <select name="parent_category" class="form-select" id="brand">
                                <option value="0">- Select Category -</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        {{-- <div class="form-grp">
                            <label for="weight">Weight</label>
                            <input type="text" id="weight">
                        </div> --}}
                        <div class="form-grp">
                            <label for="discount">Price After Discount %</label>
                            <input type="text" name="discount_price" id="discounted_price" placeholder="% -">
                        </div>
                    </div>
                </div>
                {{-- <div class="form-grp">
                    <label for="discount">Product Discount %</label>
                    <input type="text" id="discount" placeholder="% -">
                </div> --}}
                <div class="form-grp">
                    <label for="description">Product Description</label>
                    <textarea id="summernote" name="description"></textarea>
                </div>
                <button type="submit">Upload Product</button>
            </form>
        </div>
    </div>

</div>
@endsection
