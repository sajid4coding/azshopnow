@extends('layouts.customermaster')
@section('customermasert_body')
<div>
    <h5 class="text-center pb-3">Account Details</h5>
    <form class="row g-3 p-2">
        <div class="col-md-6">
            <label for="inputnamel4" class="form-label">Name</label>
            <input readonly type="text" class="form-control" id="inputnamel4" value="{{ auth()->user()->name }}">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input readonly type="email" class="form-control" id="inputEmail4" value="{{ auth()->user()->email }}">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Phone Number</label>
            <input readonly type="text" class="form-control" id="inputEmail4" value="{{ auth()->user()->phone_number }}">
        </div>
        {{-- <div class="col-md-12">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4">
        </div> --}}
        <div class="col-12 text-center">
            <a href="{{ route('edit.profile') }}" style="background:#ff4800!important;" type="submit" class="btn btn-primary active">Edit Details</a>
        </div>
     </form>
</div>
@endsection
