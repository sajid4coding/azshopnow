@extends('layouts.vendor_master')
@section('vendor_body_content')
<div class="col-lg-9">
    <div class="container">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

            <div class="card">
                <div class="card-header">
                    <h4>{{ $announcement->title }}</h4>
                </div>
                <div class="card-body">
                    <p>{!! $announcement->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
