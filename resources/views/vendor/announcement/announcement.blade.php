@extends('layouts.vendor_master')

@section('vendor_body_content')
<div class="col-lg-9">

    @if ($announcement_count == 0)
        <div class="text-center">
            <span style="font-size: 300px;"><i class="fas fa-bell"></i></span>
            <h2 style="color: #858585;">No Announcement</h2>
        </div>
    @else
        <div class="card">
            <div class="card-header">
                <h4>Announcement</h4>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Announcement Title</th>
                        </tr>
                    </thead>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    <tbody>
                        @foreach ($announcements as $announcement)
                            @if ($announcement->vendor_type == 'All Seller' || $announcement->vendor_type == 'Specific Seller' && $announcement->specific_seller == auth()->id())
                                <tr>
                                    <td>{{ $announcement->created_at->diffForHumans() }}</td>
                                    <td><a href="{{ route('vendor.details.announcement', $announcement->id) }}">{{ $announcement->title }}</a></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>
@endsection
@section('footer_script')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
