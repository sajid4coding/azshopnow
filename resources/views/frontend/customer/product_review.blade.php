@extends('layouts.customermaster')
<style>
    .rating { font-size: 6em; }
    .rating input {
    display: none;
    }
    .rating label {
    transition: all 0.2s;
    display: inline-block;
    margin: 0;
    float: right;
    font-size: 35px;
    }

    .rating > input:checked ~ label, /* show gold star when clicked */
    .rating:not(:checked) > label:hover, /* hover current star */
    .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

    .rating > input:checked + label:hover, /* hover current star when changing rating */
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
    .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }



    /* gallery images upload */

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
            color: #fff !important;
            text-align: center;
            /* min-width: 116px; */
            padding: 3px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            /* border-radius: 20px; */
            line-height: 26px;
            font-size: 15px;
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

@section('customermasert_body')
<div class="card">
    <div class="card-header">
        <h5 class="text-center">Review Section</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li >{{$error}}</li>
                @endforeach
            </div>
        @endif
        <form action="{{ route('product.review.post', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="upload__box">
                <div class="upload__img-wrap"></div>
                <div class="upload__btn-box">
                  <label class="upload__btn">
                    <p><i class="fas fa-camera"></i></p>
                    <input name="review_images[]" type="file" multiple data-max_length="4" class="upload__inputfile">
                  </label>
                  <span>1/4 Upload Image</span>
                </div>
            </div>
            <div class="rating" style="display: inline-block;">
                <input type="radio" value="5" name="rating" id="rating-5"/>
                <label for="rating-5" title="5 stars">★</label>
                <input type="radio" value="4" name="rating" id="rating-4"/>
                <label for="rating-4" title="4 stars">★</label>
                <input type="radio" value="3" name="rating" id="rating-3"/>
                <label for="rating-3" title="3 stars">★</label>
                <input type="radio" value="2" name="rating" id="rating-2"/>
                <label for="rating-2" title="2 stars">★</label>
                <input type="radio" value="1" name="rating" id="rating-1"/>
                <label for="rating-1" title="1 star">★</label>
            </div>
            <div class="form_item">
                <textarea class="form-control mb-3" name="comment" placeholder="Your Opinion*"></textarea>
            </div>
            <button type="submit" class="btn btn_primary py-2 px-4">Submit Review</button>
        </form>
    </div>


    <script>
    jQuery(document).ready(function () {
      ImgUpload();
    });

    function ImgUpload() {
      var imgWrap = "";
      var imgArray = [];

      $('.upload__inputfile').each(function () {
        $(this).on('change', function (e) {
          imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
          var maxLength = $(this).attr('data-max_length');

          var files = e.target.files;
          var filesArr = Array.prototype.slice.call(files);
          var iterator = 0;
          filesArr.forEach(function (f, index) {

            if (!f.type.match('image.*')) {
              return;
            }

            if (imgArray.length > maxLength) {
              return false
            } else {
              var len = 0;
              for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i] !== undefined) {
                  len++;
                }
              }
              if (len > maxLength) {
                return false;
              } else {
                imgArray.push(f);

                var reader = new FileReader();
                reader.onload = function (e) {
                  var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                  imgWrap.append(html);
                  iterator++;
                }
                reader.readAsDataURL(f);
              }
            }
          });
        });
      });

      $('body').on('click', ".upload__img-close", function (e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
          if (imgArray[i].name === file) {
            imgArray.splice(i, 1);
            break;
          }
        }
        $(this).parent().parent().remove();
      });
    }
    </script>

@endsection
