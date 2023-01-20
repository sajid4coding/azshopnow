@extends('layouts.vendor_master')
@section('vendor_body_content')
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
        font-weight: 600;
        color: #fff;
        text-align: center;
        min-width: 116px;
        padding: 5px;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid;
        background-color: #4045ba;
        border-color: #4045ba;
        border-radius: 10px;
        line-height: 26px;
        font-size: 14px;
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
    .product-upload-wrap form button:hover{
        background: #ffffff !important;
        color: #FF4800 !important;
        border:1px solid #FF4800 !important;
    }
    /* gallery images upload end */

    /* Tag css start */
    .tags-input-wrapper{
        background: transparent;
        padding: 10px;
        border-radius: 4px;
        /* max-width: 400px; */
        border: 1px solid #ccc
    }
    .tags-input-wrapper input{
        border: none;
        background: transparent;
        outline: none;
        /* width: 100%; */
        margin-left: 8px;
    }
    .tags-input-wrapper .tag{
        display: inline-block;
        background-color: #ff4800;
        color: white;
        border-radius: 40px;
        padding: 0px 3px 0px 7px;
        margin-right: 5px;
        margin-bottom:5px;
        /* box-shadow: 0 5px 15px -2px rgba(250 , 14 , 126 , .7) */
    }
    .tags-input-wrapper .tag a {
        margin: 0 7px 3px;
        display: inline-block;
        cursor: pointer;
    }
    /* Tag css end */

</style>


<div class="col-lg-9 col-md-9">

    <div class="tab-pane" id="productSection">
        <div class="product-upload-wrap">
            @if (session('product_add_success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('product_add_success') }}</strong>
                </div>

            @endif
            <div class="row product-upload-box text-center">
                <div class="col-md-4">
                    @if ($products->thumbnail)
                        <div class="col-md-6">
                            {{-- <form action="{{route('thumbnailImg.Delete',$products->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="padding: 2px; display:inline-block">X</button>
                            </form> --}}
                            <img style="width:200px" src="{{asset('uploads/product_photo')}}/{{$products->thumbnail}}" alt="">
                            <span class="text-muted" style="font-size: 12px">Current Thumbnail Image</span>
                        </div>
                    @endif
                </div>
                <div class="col-md-8" style="display: flex; align-item:center; height:200px">
                    @if ($productGalleries->count() !=0)
                            <div>
                                @foreach ($productGalleries as $productGallery)
                                <div style="display: inline-block; ">
                                    <form action="{{route('galleryImg.Delete',$productGallery->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button class="p-1">x</button>
                                        <img style="width:100px" src="{{asset('uploads/product_gellery_photo')}}/{{$productGallery->product_gallery}}" alt="">
                                    </form>
                                </div>
                                @endforeach
                                <br>
                                <span class="text-muted" style="font-size: 12px">Current Gallery Images</span>
                            </div>
                    @endif
                </div>
            </div>
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
                @php
                    $tags=explode(',', $products->tag);
                @endphp

                <label>Product Tag</label>
                <input type="text" class="form-control" name="product_tag" id="tag-input1" >
                <span class="text-muted">Add tags for a product</span>
                <br>
                <hr style="height: 2px">
                <h6>Optional (For SEO)</h6>
                <div class="col-lg-12">
                    <div class="form-grp">
                        <label for="meta_title">Meta Title</label>
                        <input type="text"name="meta_title" id="meta_title" value="{{$products->meta_title}}">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-grp">
                        <label for="meta_description">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" rows="5">{{$products->meta_description}}</textarea>
                    </div>
                </div>
                @php
                    $meta_tag1=explode(',', $products->meta_tag1);
                @endphp
                <label for="meta_tag1" class="form-label">Meta Tag</label>
                <input type="text" class="form-control" name="meta_tag" id="meta_tag1">
                <span class="text-muted">Add meta tag for SEO</span>
                <br>
                <div class="form-grp mt-3">
                    <label for="description">Status</label>
                    <select name="vendorProductStatus" id="" class="form-select w-50">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>

                <button type="submit">Update Product</button>
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
<script>
    @if (session('success'))
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
        title: "{{session('success')}}"
        });
    @endif
</script>


<script>
        (function(){

    "use strict"


    // Plugin Constructor
    var TagsInput = function(opts){
        this.options = Object.assign(TagsInput.defaults , opts);
        this.init();
    }

    // Initialize the plugin
    TagsInput.prototype.init = function(opts){
        this.options = opts ? Object.assign(this.options, opts) : this.options;

        if(this.initialized)
            this.destroy();

        if(!(this.orignal_input = document.getElementById(this.options.selector)) ){
            console.error("tags-input couldn't find an element with the specified ID");
            return this;
        }

        this.arr = [];
        this.wrapper = document.createElement('div');
        this.input = document.createElement('input');
        init(this);
        initEvents(this);

        this.initialized =  true;
        return this;
    }

    // Add Tags
    TagsInput.prototype.addTag = function(string){

        if(this.anyErrors(string))
            return ;

        this.arr.push(string);
        var tagInput = this;

        var tag = document.createElement('span');
        tag.className = this.options.tagClass;
        tag.innerText = string;

        var closeIcon = document.createElement('a');
        closeIcon.innerHTML = '&times;';

        // delete the tag when icon is clicked
        closeIcon.addEventListener('click' , function(e){
            e.preventDefault();
            var tag = this.parentNode;

            for(var i =0 ;i < tagInput.wrapper.childNodes.length ; i++){
                if(tagInput.wrapper.childNodes[i] == tag)
                    tagInput.deleteTag(tag , i);
            }
        })


        tag.appendChild(closeIcon);
        this.wrapper.insertBefore(tag , this.input);
        this.orignal_input.value = this.arr.join(',');

        return this;
    }

    // Delete Tags
    TagsInput.prototype.deleteTag = function(tag , i){
        tag.remove();
        this.arr.splice( i , 1);
        this.orignal_input.value =  this.arr.join(',');
        return this;
    }

    // Make sure input string have no error with the plugin
    TagsInput.prototype.anyErrors = function(string){
        if( this.options.max != null && this.arr.length >= this.options.max ){
            console.log('max tags limit reached');
            return true;
        }

        if(!this.options.duplicate && this.arr.indexOf(string) != -1 ){
            console.log('duplicate found " '+string+' " ')
            return true;
        }

        return false;
    }

    // Add tags programmatically
    TagsInput.prototype.addData = function(array){
        var plugin = this;

        array.forEach(function(string){
            plugin.addTag(string);
        })
        return this;
    }

    // Get the Input String
    TagsInput.prototype.getInputString = function(){
        return this.arr.join(',');
    }


    // destroy the plugin
    TagsInput.prototype.destroy = function(){
        this.orignal_input.removeAttribute('hidden');

        delete this.orignal_input;
        var self = this;

        Object.keys(this).forEach(function(key){
            if(self[key] instanceof HTMLElement)
                self[key].remove();

            if(key != 'options')
                delete self[key];
        });

        this.initialized = false;
    }

    // Private function to initialize the tag input plugin
    function init(tags){
        tags.wrapper.append(tags.input);
        tags.wrapper.classList.add(tags.options.wrapperClass);
        tags.orignal_input.setAttribute('hidden' , 'true');
        tags.orignal_input.parentNode.insertBefore(tags.wrapper , tags.orignal_input);
    }

    // initialize the Events
    function initEvents(tags){
        tags.wrapper.addEventListener('click' ,function(){
            tags.input.focus();
        });


        tags.input.addEventListener('keydown' , function(e){
            var str = tags.input.value.trim();

            if( !!(~[9 , 13 , 188].indexOf( e.keyCode ))  )
            {
                e.preventDefault();
                tags.input.value = "";
                if(str != "")
                    tags.addTag(str);
            }

        });
    }


    // Set All the Default Values
    TagsInput.defaults = {
        selector : '',
        wrapperClass : 'tags-input-wrapper',
        tagClass : 'tag',
        max : null,
        duplicate: false
    }

    window.TagsInput = TagsInput;

    })();

    var tagInput1 = new TagsInput({
            selector: 'tag-input1',
            duplicate : false,
            max : 10
        });
        // tagInput1.addData(['PHP' , 'JavaScript' , 'CSS'])
        <?php
        $tag=explode(',', $products->tag)
        ?>
        @foreach ($tags as $tag)
        tagInput1.addData(["{{$tag}}" ])
        @endforeach
</script>
<script>
        (function(){

    "use strict"


    // Plugin Constructor
    var TagsInput = function(opts){
        this.options = Object.assign(TagsInput.defaults , opts);
        this.init();
    }

    // Initialize the plugin
    TagsInput.prototype.init = function(opts){
        this.options = opts ? Object.assign(this.options, opts) : this.options;

        if(this.initialized)
            this.destroy();

        if(!(this.orignal_input = document.getElementById(this.options.selector)) ){
            console.error("tags-input couldn't find an element with the specified ID");
            return this;
        }

        this.arr = [];
        this.wrapper = document.createElement('div');
        this.input = document.createElement('input');
        init(this);
        initEvents(this);

        this.initialized =  true;
        return this;
    }

    // Add Tags
    TagsInput.prototype.addTag = function(string){

        if(this.anyErrors(string))
            return ;

        this.arr.push(string);
        var tagInput = this;

        var tag = document.createElement('span');
        tag.className = this.options.tagClass;
        tag.innerText = string;

        var closeIcon = document.createElement('a');
        closeIcon.innerHTML = '&times;';

        // delete the tag when icon is clicked
        closeIcon.addEventListener('click' , function(e){
            e.preventDefault();
            var tag = this.parentNode;

            for(var i =0 ;i < tagInput.wrapper.childNodes.length ; i++){
                if(tagInput.wrapper.childNodes[i] == tag)
                    tagInput.deleteTag(tag , i);
            }
        })


        tag.appendChild(closeIcon);
        this.wrapper.insertBefore(tag , this.input);
        this.orignal_input.value = this.arr.join(',');

        return this;
    }

    // Delete Tags
    TagsInput.prototype.deleteTag = function(tag , i){
        tag.remove();
        this.arr.splice( i , 1);
        this.orignal_input.value =  this.arr.join(',');
        return this;
    }

    // Make sure input string have no error with the plugin
    TagsInput.prototype.anyErrors = function(string){
        if( this.options.max != null && this.arr.length >= this.options.max ){
            console.log('max tags limit reached');
            return true;
        }

        if(!this.options.duplicate && this.arr.indexOf(string) != -1 ){
            console.log('duplicate found " '+string+' " ')
            return true;
        }

        return false;
    }

    // Add tags programmatically
    TagsInput.prototype.addData = function(array){
        var plugin = this;

        array.forEach(function(string){
            plugin.addTag(string);
        })
        return this;
    }

    // Get the Input String
    TagsInput.prototype.getInputString = function(){
        return this.arr.join(',');
    }


    // destroy the plugin
    TagsInput.prototype.destroy = function(){
        this.orignal_input.removeAttribute('hidden');

        delete this.orignal_input;
        var self = this;

        Object.keys(this).forEach(function(key){
            if(self[key] instanceof HTMLElement)
                self[key].remove();

            if(key != 'options')
                delete self[key];
        });

        this.initialized = false;
    }

    // Private function to initialize the tag input plugin
    function init(tags){
        tags.wrapper.append(tags.input);
        tags.wrapper.classList.add(tags.options.wrapperClass);
        tags.orignal_input.setAttribute('hidden' , 'true');
        tags.orignal_input.parentNode.insertBefore(tags.wrapper , tags.orignal_input);
    }

    // initialize the Events
    function initEvents(tags){
        tags.wrapper.addEventListener('click' ,function(){
            tags.input.focus();
        });


        tags.input.addEventListener('keydown' , function(e){
            var str = tags.input.value.trim();

            if( !!(~[9 , 13 , 188].indexOf( e.keyCode ))  )
            {
                e.preventDefault();
                tags.input.value = "";
                if(str != "")
                    tags.addTag(str);
            }

        });
    }


    // Set All the Default Values
    TagsInput.defaults = {
        selector : '',
        wrapperClass : 'tags-input-wrapper',
        tagClass : 'tag',
        max : null,
        duplicate: false
    }

    window.TagsInput = TagsInput;

    })();

    var tagInput1 = new TagsInput({
            selector: 'meta_tag1',
            duplicate : false,
            max : 10
        });
        // tagInput1.addData(['PHP' , 'JavaScript' , 'CSS'])
        <?php
        $meta_tags=explode(',', $products->meta_tag)
        ?>
        @foreach ($meta_tags as $meta_tag)
        tagInput1.addData(["{{$meta_tag}}" ])
        @endforeach
</script>


{{-- <script>
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

    document.getElementById('readUrl').addEventListener('change', function(){
  if (this.files[0] ) {
        var picture = new FileReader();
        picture.readAsDataURL(this.files[0]);
        picture.addEventListener('load', function(event) {
        document.getElementById('uploadedImage').setAttribute('src', event.target.result);
        document.getElementById('uploadedImage').style.display = 'block';
        });
    }
    });






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
</script> --}}
@endsection
