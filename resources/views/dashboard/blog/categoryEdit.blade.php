@extends('layouts.dashboardmaster')

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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Blog Category - {{$category->category_name}}</h1>
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
                            <li class="breadcrumb-item text-muted">Blog-Category - {{$category->category_name}}</li>
                            <!--end::Item-->

                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center mb-5">Edit - {{$category->category_name}} - Blog Category</h1>
                            <form action="{{ route('blog.category.edit.post',$category->id) }}" method="POST">
                                @csrf
                                <div>
                                    <label for="category_name" class="form-label">Category Name</label>
                                    <input class="form-control mb-5" type="text" name="category_name" id="category_name" value="{{$category->category_name}}">
                                </div>
                                <div>
                                    <label for="select" class="form-label">Status</label>
                                    <select name="status" id="select" class="form-select">
                                        <option {{$category->status == 'published' ? 'selected' : ''}} value="published">Published</option>
                                        <option {{$category->status == 'unpublished' ? 'selected' : ''}} value="unpublished">Unpublished</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-primary mt-5" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
@endsection
