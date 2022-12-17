@extends('layouts.vendor_master')

<style>
    /* gallery images upload */

.upload__box {
    padding: 40px;
  }
  .upload__box p{
    color: #ffffff !important;
    margin: 0;
    padding: 0 10px;
  }
  .upload__inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  .upload__btn {
    display: inline-block;
    font-weight: 800;
    color: #fff;
    text-align: center;
    min-width: 116px;
    padding: 3px;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid;
    background-color: #4045ba;
    border-color: #4045ba;
    border-radius: 20px;
    line-height: 26px;
    font-size: 10px;
  }
  .upload__btn:hover {
    background-color: #FF4800;
    border-color: #FF4800;
    color: #4045ba;
    transition: all 0.3s ease;
  }
  .upload__btn-box {
    margin-bottom: 10px;
  }
  .upload__img-wrap {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -10px;
  }
  .upload__img-box {
    width: 100px;
    padding: 0 10px;
    margin-bottom: 12px;
  }
  .upload__img-close {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 10px;
    right: 10px;
    text-align: center;
    line-height: 24px;
    z-index: 1;
    cursor: pointer;
  }
  .upload__img-close:after {
    content: "✖";
    font-size: 14px;
    color: white;
  }

  .img-bg {
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    position: relative;
    padding-bottom: 100%;
  }
</style>

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

                        <div class="col-lg-6 col-md-6">

                               <label class="picture" for="picture__input" tabIndex="0">
                                <span class="picture__image"></span>
                              </label>

                              <input type="file" name="thumbnail" id="picture__input">

                        </div>
                        {{-- <div class="col-lg-3 col-md-3"></div> --}}
                        <div class="col-lg-6 col-md-6">
                            <div class="upload__box">
                                <div class="upload__img-wrap"></div>
                                <div class="upload__btn-box">
                                <label class="upload__btn">
                                    <p>Gallery Images</p>
                                    <input name="gellery[]" type="file" multiple data-max_length="20" class="upload__inputfile">
                                </label>
                                </div>
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
