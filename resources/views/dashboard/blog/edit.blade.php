@extends('layouts.dashboardmaster')

@section('header_css')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
<style>

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
    i[class^="flaticon-"]:before, i[class*=" flaticon-"]:before{
        line-height: normal !important;
    }
</style>
@section('content')
    <div class="container">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Blog Edit - {{$blog->blog_title}}</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">Blog-{{$blog->blog_title}}</li>
                            <!--end::Item-->

                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar container-->
            </div>

            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-5">Blog - {{$blog->blog_title}}</h1>
                   @if ($errors->any())
                   <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                   @endif
                    <form action="{{ route('blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10" data-select2-id="select2-data-131-7ecg">
                                    <!--begin::Thumbnail settings-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2>Blog Thumbnail</h2>
                                            </div>
                                            <!--end::Card title-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body text-center pt-0">
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('dashboard_assets')}}/media/svg/avatars/blank.svg')">
                                                <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                    style="background-image: url('{{asset('uploads/blog_photo')}}/{{$blog->blog_photo}}')"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="blog_photo" >
                                                    <input type="hidden" name="blog_photo">
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remove avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Thumbnail settings-->
                                    <!--begin::Status-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2>Category</h2>
                                            </div>
                                            <!--end::Card title-->
                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar">
                                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                                            </div>
                                            <!--begin::Card toolbar-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Select2-->
                                            <select name="category" class="form-select mb-2 select2-hidden-accessible" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select" data-select2-id="select2-data-kt_ecommerce_add_category_status_select" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                @foreach ($categories as $category)
                                                    <option {{$category->category_name == $blog->category ? 'selected' : ''}} value="{{$category->category_name}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Select2-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set the category </div>
                                            <!--end::Description-->
                                            <!--begin::Datepicker-->
                                            <div class="d-none mt-10">
                                                <label for="kt_ecommerce_add_category_status_datepicker" class="form-label">Select publishing date and time</label>
                                                <input class="form-control flatpickr-input" id="kt_ecommerce_add_category_status_datepicker" placeholder="Pick date &amp; time" type="text" readonly="readonly">
                                            </div>
                                            <!--end::Datepicker-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2>Status</h2>
                                            </div>
                                            <!--end::Card title-->
                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar">
                                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status"></div>
                                            </div>
                                            <!--begin::Card toolbar-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Select2-->
                                            <select name="status" class="form-select mb-2 select2-hidden-accessible" data-control="select2" data-hide-search="true" data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select" data-select2-id="select2-data-kt_ecommerce_add_category_status_select" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                <option {{$blog->status =='published' ? 'selected' : ''}} value="published" >Published</option>
                                                <option {{$blog->status =='unpublished' ? 'selected' : ''}} value="unpublished">Unpublished</option>
                                            </select>
                                            <!--end::Select2-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set Status.</div>
                                            <!--end::Description-->
                                            <!--begin::Datepicker-->
                                            <div class="d-none mt-10">
                                                <label for="kt_ecommerce_add_category_status_datepicker" class="form-label">Select publishing date and time</label>
                                                <input class="form-control flatpickr-input" id="kt_ecommerce_add_category_status_datepicker" placeholder="Pick date &amp; time" type="text" readonly="readonly">
                                            </div>
                                            <!--end::Datepicker-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Status-->
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div>
                                    <label for="blog-title" class="form-label">Blog Title</label>
                                    <input class="form-control mb-5" type="text" name="blog_title" id="blog-title" value="{{$blog->blog_title}}">
                                </div>

                                <label class="form-label">Blog Description</label>
                                <textarea id="summernote" class="form-control " name="description" >
                                    @php
                                        echo $blog->description;
                                    @endphp
                                </textarea>
                                <div class="mt-5">
                                    <h2>Meta Options</h2>
                                    <div>
                                        <label for="Meta_Tag_Title" class="form-label">Meta Tag Title</label>
                                        <input class="form-control mb-5" type="text" name="Meta_Tag_Title" id="Meta_Tag_Title" value="{{$blog->Meta_Tag_Title}}">
                                    </div>
                                    <div>
                                        <label class="form-label">Meta Tag Description</label>
                                        <textarea id="Meta_Tag_Description" class="form-control " name="Meta_Tag_Description" >
                                            @php
                                                echo $blog->Meta_Tag_Description;
                                            @endphp
                                        </textarea>
                                    </div>
                                        <label for="Meta_Tag_Keywords" class="form-label mt-5">Meta Tag Keywords</label>
                                        <input class="form-control" type="text" name="Meta_Tag_Keywords" id="Meta_Tag_Keywords" style="width: 100% !important">
                                        <br>
                                </div>
                                <div class="d-grid gap-2 col-4 mx-auto">
                                    <button class="btn btn-primary mt-5" type="submit">Update Blog</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'type description...',
                height: 300,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#Meta_Tag_Description').summernote({
                placeholder: 'type description...',
                height: 200,
            });
        });
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


            var Meta_Tag_Keywords = new TagsInput({
                    selector: 'Meta_Tag_Keywords',
                    duplicate : false,
                    max : 10
                });
                <?php
                $meta_tags=explode(',', $blog->Meta_Tag_Keywords)
                ?>
                // tagInput1.addData(['PHP' , 'JavaScript' , 'CSS'])
                @foreach ($meta_tags as $tag)
                    Meta_Tag_Keywords.addData(["{{$tag}}"])
                @endforeach

    </script>
@endsection

