@extends('layouts.frontendmaster')
@section('content')
   <!-- main-area -->
   <main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area-four" style="padding:50px 0;background: url(https://static05.cminds.com/wp-content/uploads/WordPress_multivendorstor_rectangle_2_Illustrative_Banner_Blog.jpg) no-repeat center; background-size:cover" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="breadcrumb-content">
                        <h2 class="title">become a Vendor</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">become a vendor</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="breadcrumb-img text-end">
                        <img src="" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- vendor-registration-area -->
    <section class="vendor-registration-area pt-90 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="vr-form-box">
                        <h3 class="title">Vendor Registration Form</h3>

                        @if ($errors->any())
                              @foreach ($errors->all() as $error)
                                  <div class="alert alert-danger" role="alert">
                                    <strong>{{ $error }}</strong>
                                  </div>

                              @endforeach
                        @endif

                        <form method="POST" action="{{ route('vendor.post') }}">
                            @csrf
                            <div class="form-grp">
                                <label for="name">User Name *</label>
                                <input name="name" value='{{ old('name') }}' type="text" id="name">
                            </div>
                            <div class="form-grp">
                                <label for="email">Email address *</label>
                                <input name="email" value='{{ old('email') }}' type="email" id="email">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <label for="password">Password *</label>
                                        <input   name="password" value='{{ old('password') }}' type="password" id="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <label for="re-password">Re-Password *</label>
                                        <input  name="password_confirmation" type="password" id="re-password">
                                    </div>
                                </div>
                            </div>

                            <button type="submit">REGISTER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- vendor-registration-area-end -->


</main>
<!-- main-area-end -->
@endsection
