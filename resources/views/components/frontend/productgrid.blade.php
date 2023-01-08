   <div class="shop-product-item mb-30">
        <div class="shop-thumb">
            <a href="{{route('single.product', ['id'=>$product->id,'title'=>Str::slug($product->product_title)] )}}"><img src="{{asset('uploads/product_photo')}}/{{$product->thumbnail}}" alt="img"></a>
            @if ($product->created_at->diffInDays(\Carbon\Carbon::now()) < 2)
                <span>New</span>
            @endif
        </div>
        <div class="shop-content">
            <ul class="tag">
                <li>Sold by <a href="{{route('vendor.product',['id'=>$vendor->id ,'shopname'=>Str::slug($vendor->shop_name)])}}">{{shopName($product->vendor_id)->shop_name}}</a></li>
            </ul>
            <h2 class="title"><a href="{{route('single.product', ['id'=>$product->id,'title'=>Str::slug($product->product_title)])}}">{{$product->product_title}}</a></h2>
            {{-- <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div> --}}
            <div class="rating">
                @if (review($product->id))
                    @for ($x = 1; $x <= 5; $x++)
                        @if ($x <= review($product->id))
                            <i class="fas fa-star"></i>
                        @else
                            <i class="far fa-star"></i><!--Empty star-->
                        @endif
                    @endfor
                    <span style="font-size: 10px;">({{ count_review($product->id) }})</span>
                @else
                    <span class="text-danger">No Review Yet</span> 
                @endif
            </div>
            <span>Already Sold : 75%</span>
            <div class="progress">
                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="content-bottom">
                @if ($product->discount_price)
                    <h4>
                        ${{$product->discount_price}}
                        <span class="price text-muted">
                            <del> ${{$product->product_price}}</del>
                         </span>
                    </h4>
                    <p>0 orders <span>-{{Floor(((100*$product->product_price)-(100*$product->discount_price))/$product->product_price)}}%</span></p>
                @else
                    <h4 class="price">${{$product->product_price}}</h4>
                    <p>{{orderCount($product->id)}} orders</p>
                @endif
            </div>
        </div>
    </div>
