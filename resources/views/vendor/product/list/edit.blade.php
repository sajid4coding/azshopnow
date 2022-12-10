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
            <form action="{{route('product.update',$products->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="product-upload-box text-center">
                    <div class="row">

                        <div class="col-lg-5 col-md-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <label style="width: 200px" class="picture" for="picture__input" tabIndex="0">
                                        <span  class="picture__image"></span>

                                    </label>
                                      <input type="file" name="thumbnail" id="picture__input">
                                </div>
                                <div class="col-md-6">
                                    <img style="width:200px" src="{{asset('uploads/product_photo')}}/{{$products->thumbnail}}" alt="">
                                    <span class="text-muted" style="font-size: 12px">Current Product Thumbnail</span>
                                </div>
                            </div>
                            {{-- <label style="width: 200px" class="picture" for="picture__input" tabIndex="0">
                                <span  class="picture__image"></span>
                                <img style="" src="{{asset('uploads/product_photo')}}/{{$products->thumbnail}}" alt="">
                            </label>
                              <input type="file" name="thumbnail" id="picture__input"> --}}
                        </div>
                        <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-6 col-md-6">
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
                            <input type="text" name="product_title" id="title" value="{{$products->product_title}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-grp">
                            <label for="sku">Product SKU</label>
                            <input type="text" name="sku" id="sku" value="{{$products->sku }}">
                        </div>
                    </div>

                    @php
                        $categories=category()
                    @endphp
                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label for="parent_category">Category</label>
                                <select name="parent_category" id="EditcategoryDropDown" class="form-control">
                                    <option value="0">- Select Category -</option>
                                    @foreach ($categories as $category)
                                        <option @if ($products->parent_category_slug == $category->slug)
                                            selected
                                        @endif value="{{$category->slug}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @php
                       $subCategoryUpdate= subCategoryUpdate($products->parent_category_slug)
                    @endphp


                    <div class="col-lg-6">
                        <div class="form-grp">
                            <label for="subcategory">Sub Category </label>
                            <select name="subcategory" id="SubCategory" class="form-control">
                                <option value="0">- Select Category -</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-grp">
                            <label for="price">Product Price</label>
                            <input type="text"name="product_price" id="price" value="{{$products->product_price}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-grp">
                            <label for="discount_price">Price After Discount</label>
                            <input type="text" name="discount_price" id="discount_price" value="{{$products->discount_price}}" >
                        </div>
                    </div>

                </div>
                <div class="form-grp">
                    <label for="description">Short Description</label>
                    <textarea style=" min-height: 80px !important"  name="short_description">@if($products->short_description){{$products->short_description}}@endif</textarea>
                </div>

                <div class="form-grp">
                    <label for="description">Description</label>
                    <textarea id="summernote" name="description">@if($products->description){{$products->description}}@endif</textarea>
                </div>
                <div class="form-grp">
                    <label for="description">Status</label>
                    <select name="vendorProductStatus" id="" class="form-select w-50">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>




                <button type="submit">Upload Product</button>
            </form>
        </div>
    </div>

</div>
@endsection
@section('footer_script')
<script>



    $(document).ready(function(){
         $('#EditcategoryDropDown').change(function(){
             var category_id = $(this).val()
            if(category_id){
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             $.ajax({
                type: 'post',
                url: '/getIDFromCategoryForEdit',
                data: {
                    category_id:category_id,
                    // sub_category_id: $products->sub_category_id
                },
                success: function (data) {
                    $( "#SubCategory" ).html(data);
                }
            });
        }

         })

    })

    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200,
        });
    });













//     document.getElementById('readUrl').addEventListener('change', function(){
//   if (this.files[0] ) {
//     var picture = new FileReader();
//     picture.readAsDataURL(this.files[0]);
//     picture.addEventListener('load', function(event) {
//       document.getElementById('uploadedImage').setAttribute('src', event.target.result);
//       document.getElementById('uploadedImage').style.display = 'block';
//     });
//   }
// });






const inputFile = document.querySelector("#picture__input");
const pictureImage = document.querySelector(".picture__image");
const pictureImageTxt = "Choose an thumnail";
pictureImage.innerHTML = pictureImageTxt;

inputFile.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;

      const img = document.createElement("img");
      img.src = readerTarget.result;
      img.classList.add("picture__img");

      pictureImage.innerHTML = "";
      pictureImage.appendChild(img);
    });

    reader.readAsDataURL(file);
  } else {
    pictureImage.innerHTML = pictureImageTxt;
  }
});

</script>
@endsection
