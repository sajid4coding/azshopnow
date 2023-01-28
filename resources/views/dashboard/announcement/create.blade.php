@extends('layouts.dashboardmaster')

@section('header_css')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

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
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Announcement</h1>
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
                            <li class="breadcrumb-item text-muted">Announcement</li>
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
                    <h1 class="text-center mb-5">Create Announcement</h1>
                    <form action="{{ route('announcement.store') }}" method="POST">
                        @csrf
                        <input class="form-control mb-5" type="text" placeholder="type title..." name="title">

                        <textarea id="summernote" class="form-control " name="description"></textarea>

                        <div class="mt-5">
                            <input type="radio" id="all_seller" name="drone" value="All Seller" checked>
                            <label for="all_seller">All Seller</label>
                        </div>

                        <div class="mb-5">
                            <input type="radio" id="specific_seller" name="drone" value="Specific Seller">
                            <label for="specific_seller">Specific Seller</label>
                        </div>

                        <div id="vendor_list" style="display: none">
                            <select name="specific_seller[]" class="form-control mb-5 js-example-tags" multiple="multiple">
                                {{-- <option selected="selected">orange</option>
                                <option selected="selected">purple</option> --}}
                                @foreach ($all_seller as $seller)
                                    <option value="{{ $seller->id }}">{{ $seller->shop_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid gap-2 col-4 mx-auto">
                            <button class="btn btn-primary mt-5" type="submit">Create Announcement</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script>
        $(".js-example-tags").select2({
            tags: true
        });
    </script>

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
        $('#specific_seller').click(function(){
            $("#vendor_list").slideDown();})
        $('#all_seller').click(function(){
            $("#vendor_list").slideUp();
        })
    </script>
@endsection

