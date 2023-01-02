@extends('layouts.customermaster')
@section('customermasert_body')
<div class="">
    <h5 class="text-center pb-3">Your purchased product list</h5>
    <table class="table table-breviewed">
        <tr>
            <th>SL</th>
            <th>Product</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        @php
            $sl = 1;
        @endphp
            @forelse ($reviews as $review)
                <tr>
                    <td>{{ $sl++ }}</td>
                    <td style="gap: 20px;">
                        <img width="70px" height="70px" src="{{ asset('uploads/product_photo') }}/{{ $review->relationwithproduct->thumbnail }}" alt="">

                        <span>
                            <a  style="font-size: 16px; color:rgb(255, 38, 0);font-weight:500" href="{{ route('single.product', ['id'=>$review->relationwithproduct->id,'title'=>$review->relationwithproduct->product_title]) }}">{{ $review->relationwithproduct->product_title }}</a> <br>
                            @if ($review->size_id && $review->color_id)
                                <span style="font-size: 12px; color:#3a3a3a;font-weight:500" >Size: {{ $review->relationwithsize->size }}</span><br>
                                <span style="font-size: 12px; color:#3a3a3a;font-weight:500" >Color: {{ $review->relationwithcolor->color_name }}</span>

                            @elseif($review->size_id)
                                <span style="font-size: 12px; color:#3a3a3a;font-weight:500" >Size: {{ $review->relationwithsize->size }}</span>

                            @elseif($review->color_id)
                                <span style="font-size: 12px; color:#3a3a3a;font-weight:500" >Color: {{ $review->relationwithcolor->color_name }}</span>
                            @endif
                        </span>
                    </td>
                    <td>
                        <span>{{ $review->created_at }}</span>
                    </td>
                    <td>
                        <div class="rating">
                            @for ($x = 1; $x <= 5; $x++)
                                @if ($x <= $review->rating)
                                    <i class="fas fa-star text-warning"></i>
                                @else
                                    <i class="far fa-star"></i><!--Empty star-->
                                @endif
                            @endfor
                            <textarea readonly class="form-control" cols="5" rows="2" style="overflow-y: scroll;  height: 70px;resize:none">{{ $review->comment }}</textarea>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="50" class="text-center text-danger">
                        <span>No Data Available</span>
                    </td>
                </tr>
            @endforelse
    </table>
</div>
@endsection
