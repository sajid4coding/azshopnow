@extends('layouts/dashboardmaster')
@section('header_css')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Edit Page</h1>
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
                        <li class="breadcrumb-item text-muted"><a href="{{ route('pages.index') }}" class="text-muted text-hover-primary">Pages</a></li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Edit {{ $page->page_title }}</li>
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
                <form class="form d-flex flex-column flex-lg-row form-prevent-multiple-submits" action="{{ route('pages.update',$page->id) }}" method="POST" enctype="multipart/form-data" id="kt_ecommerce_Edit_category_form" class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
                    @csrf
                    @method('PATCH')
                    <!--begin::Aside column-->
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10" data-select2-id="select2-data-131-7ecg">
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
                                    <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_Edit_category_status"></div>
                                </div>
                                <!--begin::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <select name="status" class="form-select mb-2 select2-hidden-accessible" data-control="select2">
                                    <option value="published" @if ($page->status == "published") selected="selected" @endif>Published</option>
                                    <option value="unpublished" @if ($page->status == "unpublished") selected="selected" @endif>Unpublished</option>
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the category status.</div>
                                <!--end::Description-->
                                <!--begin::Datepicker-->
                                <div class="d-none mt-10">
                                    <label for="kt_ecommerce_Edit_category_status_datepicker" class="form-label">Select publishing date and time</label>
                                    <input class="form-control flatpickr-input" id="kt_ecommerce_Edit_category_status_datepicker" placeholder="Pick date &amp; time" type="text" readonly="readonly">
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
                                    <label class="required form-label">Page Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="page_title" class="form-control mb-2" placeholder="Product name" value="{{ $page->page_title }}">
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">A meta title is required and recommended to be unique.</div>
                                    <!--end::Description-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div>
                                    <!--begin::Label-->
                                    <label class="form-label">Description</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <textarea id="description" class="form-control" name="description" cols="10" rows="10">{{ $page->description }}</textarea>
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set a description to the page for better visibility.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Meta Option</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="form-label">Meta title</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="meta_title" class="form-control mb-2" placeholder="Product name" value="{{ $page->meta_title }}">
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">A meta title is required and recommended to be unique.</div>
                                    <!--end::Description-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div>
                                    <!--begin::Label-->
                                    <label class="form-label">Meta Description</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <textarea id="meta_description" class="form-control" name="meta_description" cols="10" rows="10">{{ $page->meta_description }}</textarea>
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set a meta description to the page for better visibility.</div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('pages.index') }}" class="btn btn-light me-5">Back</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" class="btn btn-primary button-prevent-multiple-submits">
                                <span class="indicator-label">Save Changes</span>
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
</div>
@endsection

@section('footer_script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#description').summernote({
            placeholder: 'type description...',
            height: 300,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#meta_description').summernote({
            placeholder: 'type description...',
            height: 200,
        });
    });
</script>
@endsection
