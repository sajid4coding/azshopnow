@extends('layouts/dashboardmaster')
@section('content')
<style>
    #review_section{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width:100%;
    }
    #review_section .testimonial-heading{
        letter-spacing: 1px;
        margin: 30px 0px;
        padding: 10px 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #review_section .testimonial-heading span{
        font-size: 1.3rem;
        color: #252525;
        margin-bottom: 10px;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    #review_section .testimonial-box-container{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        width:100%;
    }
    #review_section .testimonial-box{
        width:500px;
        box-shadow: 2px 2px 30px rgba(0,0,0,0.1);
        background-color: #ffffff;
        padding: 20px;
        margin: 15px;
        cursor: pointer;
    }
    #review_section .profile-img{
        width:50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 10px;
    }
    #review_section .profile-img img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
    #review_section .profile{
        display: flex;
        align-items: center;
    }
    #review_section .name-user{
        display: flex;
        flex-direction: column;
    }
    #review_section .name-user strong{
        color: #3d3d3d;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
    }
    #review_section .name-user span{
        color: #979797;
        font-size: 0.8rem;
    }
    #review_section .reviews{
        color: #f9d71c;
    }
    #review_section .box-top{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    #review_section .client-comment p{
        font-size: 0.9rem;
        color: #4b4b4b;
    }
    #review_section .testimonial-box:hover{
        transform: translateY(-10px);
        transition: all ease 0.3s;
    }

    @media(max-width:1060px){
        #review_section .testimonial-box{
            width:45%;
            padding: 10px;
        }
    }
    @media(max-width:790px){
        #review_section .testimonial-box{
            width:100%;
        }
        #review_section .testimonial-heading h1{
            font-size: 1.4rem;
        }
    }
    @media(max-width:340px){
        #review_section .box-top{
            flex-wrap: wrap;
            margin-bottom: 10px;
        }
        #review_section .reviews{
            margin-top: 10px;
        }
    }
</style>


<section id="review_section">
    <!--testimonials-box-container------>
    <div class="testimonial-box-container">
        <!--BOX-1-------------->
        @foreach ($view_reviews as $view_review)
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        <!--img---->
                        <div class="profile-img">
                            <img src="{{ asset('uploads/profile_photo') }}/{{ $view_review->relationwithuser->profile_photo }}" />
                        </div>
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>{{ $view_review->relationwithuser->name }}</strong>
                        </div>
                    </div>
                    <!--reviews------>
                    {{-- <div class="reviews">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i><!--Empty star-->
                    </div> --}}
                    <div class="reviews">
                        @for ($x = 1; $x <= 5; $x++)
                            @if ($x <= $view_review->rating)
                                <i class="fas fa-star text-warning"></i>
                            @else
                                <i class="far fa-star"></i><!--Empty star-->
                            @endif
                        @endfor
                    </div>
                </div>
                <!--Comments---------------------------------------->
                <div class="client-comment">
                    <p>{{ $view_review->comment }}</p>
                    @php
                        $product_galleries = App\Models\ReviewGallery::where('product_review_id', $view_review->id)->get();
                    @endphp
                    @if ($product_galleries)
                        @foreach ($product_galleries as $product_gallery)
                            <img class="m-2" height="100" src="{{ asset('uploads/product_review_images') }}/{{ $product_gallery->review_image }}" alt="azshopshow">
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
