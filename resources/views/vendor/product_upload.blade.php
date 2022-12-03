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

                               <label class="picture" for="picture__input" tabIndex="0">
                                <span class="picture__image"></span>
                              </label>

                              <input type="file" name="thumbnail" id="picture__input">

                        </div>
                        <div class="col-lg-3 col-md-3"></div>
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
                            <input type="text" name="product_title" id="title">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-grp">
                            <label for="sku">Product SKU</label>
                            <input type="text" name="sku" id="sku">
                        </div>
                    </div>

                    @php
                        $categories=category()
                    @endphp
                    <div class="col-lg-6">
                        <div class="form-grp">
                            <label for="parent_category">Category</label>
                            <select name="parent_category" id="categoryDropDown" class="form-control">
                                <option value="0">- Select Category -</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->slug}}">{{$category->category_name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

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
                            <input type="text"name="product_price" id="price" placeholder="0.00$">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-grp">
                            <label for="discount_price">Price After Discount</label>
                            <input type="text" name="discount_price" id="discount_price" placeholder="0.00$">
                        </div>
                    </div>

                </div>
                <div class="form-grp">
                    <label for="description">Short Description</label>
                    <textarea style=" min-height: 80px !important"  name="short_description"></textarea>
                </div>

                <div class="form-grp">
                    <label for="description">Description</label>
                    <textarea id="summernote" name="description"></textarea>
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
         $('#categoryDropDown').change(function(){
             var category_id = $(this).val()
            if(category_id){
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             $.ajax({
                type: 'post',
                url: '/getIDFromCategory',
                data: {
                    category_id:category_id
                },
                success: function (data) {
                    $( "#SubCategory" ).html(data);
                }
            });
        }

         })

    })

    $(document).ready(function() {
        $('#summernote').summernote();
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
