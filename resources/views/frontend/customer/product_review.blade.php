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
            border-radius: 20px;
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
      .w_100{
        width: 100% !important;
        border: #ff480049 !important;
      }

.camera_icon_css{
    width: 20px !important;
    height: 20px !important;
    text-align: center  !important;
    line-height: 20px  !important;
    padding: 0  !important;

}
.camera_icon_css i{
    margin: 0 !important;
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

                      @if ($error == 'The review images must not be greater than 4 characters.')
                         <li >The review images must not be greater than 4 Images.</li>
                      @else
                         <li >{{$error}}</li>
                      @endif
                @endforeach
            </div>
        @endif
        <form class="form  form-prevent-multiple-submits" action="{{ route('product.review.post', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="upload__box">
                <div class="upload__img-wrap"></div>
                <div class="upload__btn-box">
                  <label class="upload__btn">
                    <p class="camera_icon_css"><i class="fas fa-camera"></i></p>
                    <input name="review_images[]" type="file" multiple data-max_length="4" class="upload__inputfile">
                  </label>
                  <span>Max 4 Image Upload</span>
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
                <textarea class="form-control mb-3" rows="4" name="comment" style="resize: none" placeholder="Your Opinion*"></textarea>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-4 button-prevent-multiple-submits">Submit Review</button>
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

    // Gallery Image Upload
    var imuplFilesMax = 4;
var imuplMaxDimension = 1200;
var imuplJpgQuality = 0.75;
var imuplMaxEditorSize = 0.8;

var imuplFilesCurrent = 0;
var imuplOffset = 1;
var imuplFiles = [];
var imuplEditorLoaded = 0;
var imuplCropperDragging = 0;
var imuplEditorRatio = 1;

var $imuplFilesList = $('.imupl-files-list'),
		$imuplFilesCurrent = $('.imupl-files-current'),
		$imuplFilesMax = $('.imupl-files-max'),
		$imuplEditorImg = $('.imupl-edit-overlay .thumbnail .img'),
		$imuplEditorOverlay = $('.imupl-edit-overlay'),
		$imuplCropWrapper = $('.imupl-crop-wrapper'),
		$imuplCropper = $('.imupl-cropper'),
		$imuplCropperStart = $('.imupl-cropper-start'),
		$imuplCropperEnd = $('.imupl-cropper-end');

$imuplFilesList.sortable();

function imuplUpdateFileCount() {
		$imuplFilesCurrent.html(imuplFilesCurrent);
		$imuplFilesMax.html(imuplFilesMax);
}
imuplUpdateFileCount();

function imuplRender(offset) {
		var img = imuplFiles[offset];
		var thisElement = $('div[data-imupl-offset="' + offset + '"]');

		var cropWidth = img.cropEndX - img.cropStartX;
		var cropHeight = img.cropEndY - img.cropStartY;
		var finalWidth = 0;
		var finalHeight = 0;
		if (cropWidth <= imuplMaxDimension && cropHeight <= imuplMaxDimension) {
				finalWidth = cropWidth;
				finalHeight = cropHeight;
		} else if (cropWidth > cropHeight) {
				finalWidth = imuplMaxDimension;
				finalHeight = cropHeight * (imuplMaxDimension / cropWidth);
		} else {
				finalHeight = imuplMaxDimension;
				finalWidth = cropWidth * (imuplMaxDimension / cropHeight);
		}

		var canvas = document.createElement('canvas');
		canvas.width = finalWidth;
		canvas.height = finalHeight;
		var context = canvas.getContext('2d');

		context.drawImage(img.imgObj, img.cropStartX, img.cropStartY, cropWidth, cropHeight, 0, 0, finalWidth, finalHeight);
		img.resultData = canvas.toDataURL('image/jpeg', imuplJpgQuality);

		thisElement.css('background-image', 'url(' + img.resultData + ')');
		$('input', thisElement).val(img.resultData);
		thisElement.removeClass('loading');
}

function imuplRotateCW(offset) {
		var img = imuplFiles[offset];
		var newWidth = img.origHeight,
				newHeight = img.origWidth;
		var oldCropStartX = img.cropStartX,
				oldCropEndX = img.cropEndX,
				oldCropStartY = img.cropStartY,
				oldCropEndY = img.cropEndY;

		img.cropStartX = img.origHeight - oldCropEndY;
		img.cropStartY = oldCropStartX;
		img.cropEndX = img.origHeight - oldCropStartY;
		img.cropEndY = oldCropEndX;
		img.origHeight = newHeight;
		img.origWidth = newWidth;

		var canvas = document.createElement('canvas');
		canvas.width = newWidth;
		canvas.height = newHeight;
		var context = canvas.getContext('2d');

		context.save();
		context.translate(newWidth / 2, newHeight / 2);
		context.rotate(90 * Math.PI / 180);
		context.drawImage(img.imgObj, -(newHeight / 2), -(newWidth / 2));
		context.restore();

		img.rawData = canvas.toDataURL();
		var imgObj = new Image;
		imgObj.onload = function() {
				img.imgObj = imgObj;
				imuplRender(offset);
		};
		imgObj.src = img.rawData;
}

function imuplRotateCCW(offset) {
		var img = imuplFiles[offset];
		var newWidth = img.origHeight,
				newHeight = img.origWidth;
		var oldCropStartX = img.cropStartX,
				oldCropEndX = img.cropEndX,
				oldCropStartY = img.cropStartY,
				oldCropEndY = img.cropEndY;

		img.cropStartX = oldCropStartY;
		img.cropStartY = img.origWidth - oldCropEndX;
		img.cropEndX = oldCropEndY;
		img.cropEndY = img.origWidth - oldCropStartX;
		img.origHeight = newHeight;
		img.origWidth = newWidth;

		var canvas = document.createElement('canvas');
		canvas.width = newWidth;
		canvas.height = newHeight;
		var context = canvas.getContext('2d');

		context.save();
		context.translate(newWidth / 2, newHeight / 2);
		context.rotate(-90 * Math.PI / 180);
		context.drawImage(img.imgObj, -(newHeight / 2), -(newWidth / 2));
		context.restore();

		img.rawData = canvas.toDataURL();
		var imgObj = new Image;
		imgObj.onload = function() {
				img.imgObj = imgObj;
				imuplRender(offset);
		};
		imgObj.src = img.rawData;
}



function imuplCloseEditor() {
	$imuplEditorOverlay.removeClass('active');
	var img = imuplFiles[imuplEditorLoaded];
	img.cropStartX = parseInt($imuplCropper.css('left'))/imuplEditorRatio;
	img.cropStartY = parseInt($imuplCropper.css('top'))/imuplEditorRatio;
	img.cropEndX = ($imuplCropWrapper.width()-parseInt($imuplCropper.css('right')))/imuplEditorRatio;
	img.cropEndY = ($imuplCropWrapper.height()-parseInt($imuplCropper.css('bottom')))/imuplEditorRatio;
	console.log(img);
	setTimeout(function() {
		imuplRender(imuplEditorLoaded);
		imuplEditorLoaded=0;
	}, 1);
}

function imuplOpenEditor(offset) {
		var img = imuplFiles[offset];
		imuplEditorLoaded = offset;
		imuplCropperDragging = 0;

		$imuplEditorImg.attr('style', '');
		$imuplEditorImg.css('background-image', 'url(' + img.rawData + ')');

		var imgWidth = img.origWidth,
				imgHeight = img.origHeight,
				ratio=1;
		if (imgWidth > $(window).width() * imuplMaxEditorSize) {
				ratio *= $(window).width() * imuplMaxEditorSize / imgWidth;
		}
		if (imgHeight > $(window).height() * imuplMaxEditorSize) {
				ratio *= $(window).height() * imuplMaxEditorSize / imgHeight;
		}
		imgWidth = img.origWidth * ratio;
		imgHeight = img.origHeight * ratio;

		$imuplEditorImg.css('width', imgWidth);
		$imuplEditorImg.css('height', imgHeight);

		$imuplCropper.css('left',img.cropStartX*ratio).css('top',img.cropStartY*ratio);
		$imuplCropper.css('right',imgWidth - img.cropEndX*ratio).css('bottom',imgHeight - img.cropEndY*ratio);

		imuplEditorRatio = ratio;
		$imuplEditorOverlay.addClass('active');
}

function imuplAddFile(f) {
		if (imuplFilesCurrent >= imuplFilesMax ||  f.type.indexOf("image") !== 0) {
				return;
		}
		var thisOffset = imuplOffset++;
		var thisElement = $('<div class="imupl-file-item loading" data-imupl-offset="' + thisOffset + '"><div class="imupl-button-remove"><i class="fa fa-trash-o"></i></div><div class="imupl-button-edit"><i class="fa fa-crop"></i></div><div class="imupl-button-rotate-ccw"><i class="fa fa-rotate-left"></i></div><div class="imupl-button-rotate-cw"><i class="fa fa-rotate-right"></i></div><input type="hidden" name="imupl-payload[]" value="" /></div>');
		var reader = new FileReader();
		reader.onload = function(e) {
				var img = new Image;
				img.onload = function() {
						var newImage = {
								rawData: e.target.result,
								resultData: e.target.result,
								imgObj: img,
								origWidth: img.width,
								origHeight: img.height,
								cropStartX: 0,
								cropStartY: 0,
								cropEndX: img.width,
								cropEndY: img.height
						};
						imuplFiles[thisOffset] = newImage;
						imuplRender(thisOffset);
				};
				img.src = e.target.result;
		}
		reader.readAsDataURL(f);
		thisElement.appendTo($imuplFilesList);
		$('.imupl-button-remove', thisElement).click(function() {
				var o = $(this).parent().attr('data-imupl-offset');
				delete imuplFiles[o];
				$(this).parent().remove();
				imuplFilesCurrent--;
				imuplUpdateFileCount();
		});
		$('.imupl-button-rotate-cw', thisElement).click(function() {
				var o = $(this).parent().attr('data-imupl-offset');
				$('div[data-imupl-offset="' + o + '"]').addClass('loading').css('background-image', '');
				setTimeout(function() {
						imuplRotateCW(o);
				}, 1);
		});
    $('.imupl-button-rotate-ccw', thisElement).click(function() {
                var o = $(this).parent().attr('data-imupl-offset');
                $('div[data-imupl-offset="' + o + '"]').addClass('loading').css('background-image', '');
                setTimeout(function() {
                        imuplRotateCCW(o);
                }, 1);
        });
		$('.imupl-button-edit', thisElement).click(function() {
				var o = $(this).parent().attr('data-imupl-offset');
				$('div[data-imupl-offset="' + o + '"]').addClass('loading').css('background-image', '');
				imuplOpenEditor(o);
		});
		imuplFilesCurrent++;
		imuplUpdateFileCount();
}

$('.imupl-button-choose').click(function(e)  {
		e.preventDefault();
		$('.imupl-fileinput').trigger('click');
});

$('.imupl-fileinput').on('change', function(e) {
		e.preventDefault();
		e.stopPropagation();
		var files = e.target.files;
		for (var i = 0, f; f = files[i]; i++) {
				imuplAddFile(f);
		}
});

$('body').on('drop', function(e) {
		e.preventDefault();
		e.stopPropagation();
		if (imuplFilesCurrent >= imuplFilesMax ||  imuplEditorLoaded != 0) {
				return;
		}
		$('.imupl-dragdrop-hover').removeClass('active');
		var files = e.originalEvent.dataTransfer.files;
		for (var i = 0, f; f = files[i]; i++) {
				imuplAddFile(f);
		}
});

function imuplMoveCropper(e) {
	if(!imuplCropperDragging) {
		return;
	}
	e.preventDefault();
	if(imuplCropperDragging == 1) {
		var posX = e.pageX - $imuplCropWrapper.offset().left;
		var posY = e.pageY - $imuplCropWrapper.offset().top;
		posX = Math.max(0,posX);
		posY = Math.max(0,posY);
		posX = Math.min(posX,$imuplCropWrapper.width()-parseInt($imuplCropper.css('right'))-40);
		posY = Math.min(posY,$imuplCropWrapper.height()-parseInt($imuplCropper.css('bottom'))-40);
		$imuplCropper.css('left',posX);
		$imuplCropper.css('top',posY);
	}
	if(imuplCropperDragging == 2) {
		var posX = e.pageX - $imuplCropWrapper.offset().left;
		var posY = e.pageY - $imuplCropWrapper.offset().top;
		posX = Math.min($imuplCropWrapper.width(),posX);
		posY = Math.min($imuplCropWrapper.height(),posY);
		posX = Math.max(posX,parseInt($imuplCropper.css('left'))+40);
		posY = Math.max(posY,parseInt($imuplCropper.css('top'))+40);
		posX = $imuplCropWrapper.width() - posX;
		posY = $imuplCropWrapper.height() - posY;
		$imuplCropper.css('right',posX);
		$imuplCropper.css('bottom',posY);
	}
}
$('body').mousemove(imuplMoveCropper);

$imuplCropperStart.mousedown(function(e) {
	e.preventDefault();
	imuplCropperDragging=1;
});

$imuplCropperEnd.mousedown(function(e) {
	e.preventDefault();
	imuplCropperDragging=2;
});

$('body').mouseup(function(){
	imuplCropperDragging=0;
});

$('.imupl-button-edit-save').click(imuplCloseEditor);

$('body').on('dragover', function(e) {
		e.preventDefault();
		e.stopPropagation();
		if (imuplFilesCurrent >= imuplFilesMax ||  imuplEditorLoaded != 0) {
				return;
		}
		$('.imupl-dragdrop-hover').addClass('active');
});

$('body').on('dragleave', function(e) {
		e.preventDefault();
		e.stopPropagation();
		$('.imupl-dragdrop-hover').removeClass('active');
});
    </script>

@endsection
