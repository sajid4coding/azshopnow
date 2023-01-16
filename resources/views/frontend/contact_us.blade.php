@extends('layouts.frontendmaster')
@section('content')

        <!-- main-area -->
        <main>
            <!-- breadcrumb-area -->
            <div class="breadcrumb-area-two">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-wrap">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">contact</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area-end -->

            <!-- contact-area -->
            <section class="contact-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-box-wrap">
                                <div class="row justify-content-center">
                                    <div class="col-7">
                                        <div class="contact-form">
                                              {{-- CONTACT US ERROR MESSAGES SHOW --}}
                                                     @if ($errors->any())
                                                            @foreach ($errors->all() as $error)
                                                                <div class="alert alert-danger" role="alert">
                                                                    <strong>{{ $error }}</strong>
                                                                </div>
                                                            @endforeach
                                                     @endif
                                                {{-- CONTACT US ERROR MESSAGES SHOW --}}
                                                {{-- CONTACT US SUCCESS MESSAGES SHOW --}}
                                                    @if (session('contact_success_message'))
                                                            <div class="alert alert-success" role="alert">
                                                                <strong>{{ session('contact_success_message') }}</strong>
                                                            </div>
                                                    @endif
                                                {{-- CONTACT US SUCCESS MESSAGES SHOW --}}
                                            <span>Contact Us Now</span>
                                            <h3 class="title">Write a Message</h3>
                                            <form action="{{ route('contact.us.post') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="text" name="name" placeholder="Your Name *">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="email" placeholder="Your Email *">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="phone" name="phone_number" placeholder="Your Phone">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="subject" placeholder="Subject">
                                                    </div>
                                                </div>
                                                <textarea name="message" name="message" placeholder="Your Message"></textarea>
                                                <button type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="contact-info-wrap">
                                            <img src="https://www.durbarshop.com/static/durbar_shop/images/contact-banner.jpg" alt="img">
                                            <div class="contact-info-list" data-background="https://www.blogtyrant.com/wp-content/uploads/2019/12/best-contact-us-pages-2.png">
                                                <ul>
                                                    <li>
                                                        <div class="icon">
                                                            <i class="fa-solid fa-phone-volume"></i>
                                                        </div>
                                                        <div class="content">
                                                            <h6 class="title">Phone</h6>
                                                            <a href="tel:12345678">{{ getGeneralValue('phone_number') }}</a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <i class="fa-regular fa-envelope"></i>
                                                        </div>
                                                        <div class="content">
                                                            <h6 class="title">Email</h6>
                                                            <a href="#">{{ getGeneralValue('email') }}</a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <i class="fa-solid fa-location-dot"></i>
                                                        </div>
                                                        <div class="content">
                                                            <h6 class="title">addresss</h6>
                                                            <p>{{ getGeneralValue('address') }}</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

            <!-- contact-map -->
            <div id="contact-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d40.6880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd"
                    allowfullscreen loading="lazy"></iframe>
            </div>
            <!-- contact-map-end -->

@endsection
