@extends('layouts.customermaster')
@section('customermasert_body')
<div>
    <div class="col-lg-9 col-md-9">

            <div class="tab-pane" >
                <div class="product-upload-wrap">
                    <form  class="form d-flex flex-column flex-lg-row form-prevent-multiple-submits" action="{{ route('customer.profile.submit') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" name="profile_photo" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url({{ asset('uploads/customer_profile/'.auth()->user()->profile_photo) }});">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                 <div class="form-grp">
                                     <label >Banner Photo : </label>
                                    <input type='file'  name="banner" accept=".png, .jpg, .jpeg" />
                                 </div>
                            </div>
                            <div class="">
                                <button class ="button-prevent-multiple-submits" type="submit">Update</button>
                            </div>

                    </form>
                </div>
            </div>

    </div>

 {{-- ============================== --}}
    <h5 class="text-center pb-3 mt-5">Account Details</h5>
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
