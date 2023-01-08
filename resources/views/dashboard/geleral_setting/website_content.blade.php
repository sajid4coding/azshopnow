@extends('layouts.dashboardmaster')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">

    <div class="card">
         <form action="{{ route('general.website.centent.post') }}" method="post">
            @csrf
             <div class="input-group mb-5">
                <span class="input-group-text">Website Title</span>
                <input type="text" class="form-control" placeholder="title" name="website_title" value="{{ $general->website_title }}">
              </div>
            <div class="input-group mb-5">
                <span class="input-group-text">Copyright Text</span>
                <input type="text" class="form-control"  placeholder="copyright" value="{{ $general->copyright_text }}" name="copyright_text">
              </div>

             <div class="input-group mb-5">
                <label class="input-group-text">Capcha</label>
                <select name="capcha" class="form-select" id="">
                    <option @if ($general->capcha_status == 'active')
                      selected
                    @endif value="active">Active</option>
                    <option  @if ($general->capcha_status == 'deactive')
                        selected
                      @endif value="deactive">Deactive</option>
                </select>
              </div>
             <div class="input-group mb-5">
                <label class="input-group-text">Twak.io</label>
                <select name="twak_io_status" class="form-select" id="">
                    <option  @if ($general->twak_io_status == 'active')
                        selected
                      @endif value="active">Active</option>
                    <option  @if ($general->twak_io_status == 'deactive')
                        selected
                      @endif value="deactive">Deactive</option>
                </select>
              </div>
              <div class="input-group mb-5">
                <span class="input-group-text">Twak.io ID</span>
                <input type="text" name="twak_io_id" class="form-control" placeholder="copyright" value="{{$general->twak_io_id}}">
              </div>
              <button type="submit" class="btn btn-primary mb-2">Save Change</button>
         </form>
     </div>

    </div>
  </div>
</div>
@endsection

