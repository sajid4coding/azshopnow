@extends('layouts/dashboardmaster')

@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Add Category</h1>
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
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">eCommerce</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Catalog</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid" data-select2-id="select2-data-kt_app_content">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl" data-select2-id="select2-data-kt_app_content_container">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
                @csrf
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10" data-select2-id="select2-data-131-7ecg">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Thumbnail</h2>
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
                                    style="background-image: url('{{asset('uploads/category_photo/default.png')}}')"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="category_photo">
                                    <input type="hidden" name="category_photo">
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
                                <option value="published" selected="selected" data-select2-id="select2-data-11-kaqf">Published</option>
                                <option value="unpublished">Unpublished</option>
                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the category status.</div>
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
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required form-label">Category Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="category_name" class="form-control mb-2" placeholder="Category name" value="">
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A category name is required and recommended to be unique.</div>
                                <!--end::Description-->
                            <div class="fv-plugins-message-container invalid-feedback"></div></div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="form-label">Category Slug</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <input class="form-control" name="category_slug" placeholder="Category slug" type="text">
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a category slug to the category for better visibility.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label">Description</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <textarea class="form-control" name="category_description" cols="10" rows="10"></textarea>
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set a description to the category for better visibility.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            {{-- ICONS START --}}
                            @php
                                $fonts = fonts();
                            @endphp
                            <div style="margin-top:45px">
                                <label for="fact_input" class="form-label">Choose The Fonts Below</label> <span id="icon_viwer"><i></i></span>
                                <input readonly id="fact_input" name="icon" placeholder="Select Icon" type="text" class="form-control form-control-solid-bordered m-b-sm" style="margin-bottom:15px">
                                <div style="overflow-y:scroll; height:200px; width:630px;">
                                    @foreach ($fonts as $font)
                                        <i class="fa-2x {{ $font }} m-1 font_span" id="{{ $font }}" name="icon"></i>
                                    @endforeach
                                </div>
                            </div>
                            {{-- ICONS END --}}
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('category.index') }}" class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Add Category</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
@endsection
@section('footer_script')
<script>
    $(document).ready(function(){
        $('.font_span').click(function(){
            $('#fact_input').val($(this).attr('id'));
            $('#icon_viwer').removeClass();
            $('#icon_viwer').addClass($(this).attr('id'));
        })
    })
</script>
@endsection
