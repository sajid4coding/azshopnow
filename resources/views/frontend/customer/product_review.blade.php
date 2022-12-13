@extends('layouts.customermaster')
<style>
    .rating { font-size: 6em; }
    .rating input {
    display: none;
    }
    .rating label {
    transition: all 0.2s;
    display: inline-block;
    margin: 0;
    float: right;
    font-size: 35px;
    }

    .rating > input:checked ~ label, /* show gold star when clicked */
    .rating:not(:checked) > label:hover, /* hover current star */
    .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

    .rating > input:checked + label:hover, /* hover current star when changing rating */
    .rating > input:checked ~ label:hover,
    .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
    .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
</style>
@section('customermasert_body')
<div class="card">
    <div class="card-header">
        <h5 class="text-center">Review Section</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('product.review.post', $id) }}" method="POST">
            @csrf
            <div class="rating" style="display: inline-block;">
                <input type="radio" value="5" name="rating" id="rating-5"/>
                <label for="rating-5" title="5 stars">★</label>
                <input type="radio" value="4" name="rating" id="rating-4"/>
                <label for="rating-4" title="4 stars">★</label>
                <input type="radio" value="3" name="rating" id="rating-3"/>
                <label for="rating-3" title="3 stars">★</label>
                <input type="radio" value="2" name="rating" id="rating-2"/>
                <label for="rating-2" title="2 stars">★</label>
                <input type="radio" value="1" name="rating" id="rating-1"/>
                <label for="rating-1" title="1 star">★</label>
            </div>
            <div class="form_item">
                <textarea class="form-control mb-3" name="comment" placeholder="Your Opinion*"></textarea>
            </div>
            <button type="submit" class="btn btn_primary py-2 px-4">Submit Review</button>
        </form>
    </div>
@endsection
