@extends('layouts/frontendmaster')

@section('content')

<!-- breadcrumb-area -->
            <section class="breadcrumb-area-four breadcrumb-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="breadcrumb-content">
                                <h2 class="title">Customer dashbord</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('customerhome') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Customer dashbord</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="breadcrumb-img text-end">
                                <img src="{{ asset('frontend_assets') }}/img/images/breadcrumb_img.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->


                <div class="container  my-5">
                    <div class="row my-5">
                        <div class="col-lg-3 account_menu ">
                            <div class="nav account_menu_list flex-column nav-pills me-3 " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button style=" border:1px solid #ff4800" font-size: 14px;font-weight: 400; font-style: normal; color: #052840 font-family:"Aktiv grotesk", sans-serif;text-rendering: optimizelegibility;" class="nav-link text-start active w-100 my-2" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Account Dashboard </button>
                                <button style=" border:1px solid #ff4800" class="nav-link  text-start w-100 my-2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Acount</button>
                                <button style=" border:1px solid #ff4800" class="nav-link  text-start w-100 my-2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">My Orders</button>
                            </div>
                        <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                 <a style="background:#ff4800!important;" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="menu-link px-5 btn btn-sm bg-danger my-2">Sign Out</a>
                            </form>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                                <div class="tab-pane fade show active text-center" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <h5>Welcome to Account</h5>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
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
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <h5 class="text-center pb-3">Your Orders</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>SL</th>
                                            <th>Order No</th>
                                            <th>Sub Total</th>
                                            <th>Discount</th>
                                            <th>Delivery Charge</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>#120</td>
                                            <td>52500</td>
                                            <td>200</td>
                                            <td>100</td>
                                            <td>52400</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Download Invoice</a>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
