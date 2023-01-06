@extends('layouts.vendor_master')
@section('vendor_body_content')
<div class="col-lg-9 col-md-9">

        <div class="tab-pane" >
            <div class="product-upload-wrap">
                <form class=" form-prevent-multiple-submits" action="{{ route('vendor.update.info') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="container">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input @if (membership()) type='file' @else placeholder="No able to upload Banner Photo" @endif id="imageUpload" name="profile_photo" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url({{ asset('uploads/vendor_profile/'.auth()->user()->profile_photo) }});">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                             <div class="form-grp">
                                 <label >Banner Photo : </label>
                                <input @if (membership()) type='file' @else placeholder="No able to upload Banner Photo" @endif name="banner" accept=".png, .jpg, .jpeg" />
                             </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label>Name</label>
                                <input @if (!membership()) readonly @endif type="text" name="name" value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label >Email</label>
                                <input @if (!membership()) readonly @endif type="email" name="email" value="{{ auth()->user()->email }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label >Phone Number</label>
                                <input @if (!membership()) readonly @endif type="phone" name="phone_number" value="{{ auth()->user()->phone_number }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label >shop Name</label>
                                <input @if (!membership()) readonly @endif type="text" name="shop_name" value="{{ auth()->user()->shop_name }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-grp">
                                <label >Bio</label>
                                <textarea @if (!membership()) readonly @endif name="bio" id="" cols="30" rows="10">{{ auth()->user()->bio  }}</textarea>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-grp">
                                <label >Address</label>
                                <input @if (!membership()) readonly @endif type="text" name="address" value="{{ auth()->user()->address }}">
                            </div>
                        </div>
                    </div>
                    @if (membership())
                        {{-- <button type="submit">Update Info</button> --}}
                        <button class=" button-prevent-multiple-submits" type="submit">Update Info</button>
                    @endif
                </form>


                {{-- CHANGE PASSWORD START --}}
                <form class=" form-prevent-multiple-submits" action="{{ route('vendor.change.password') }}"  method="POST" class="mt-5">
                      @csrf
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label>Current Password</label>
                                <input type="password"  name="current_password" placeholder="Current password">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label >New Password</label>
                                <input type="password" name="password" placeholder="New password">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-grp">
                                <label >Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="confirm password">
                            </div>
                        </div>

                    </div>

                    @if (session('change_message'))

                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('change_message') }}</strong>
                    </div>
                      @endif

                     @if (session('change_error_message'))

                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ session('change_error_message') }}</strong>
                                </div>
                     @endif

                     @if ($errors->any())
                          @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $error }}</strong>
                                </div>
                          @endforeach
                     @endif

                    <button class=" button-prevent-multiple-submits" type="submit">Change Password</button>
                </form>
            </div>
        </div>

</div>
@endsection

