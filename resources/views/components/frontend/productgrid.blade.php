   <div class="shop-product-item mb-30">
        <div class="shop-thumb">
            <a href="shop-details.html"><img src="{{asset('uploads/product_photo')}}/{{$product->thumbnail}}" alt="img"></a>
            <span>New</span>
        </div>
        <div class="shop-content">
            <ul class="tag">
                <li>Sold by <a href="{{route('vendor.product',$product->vendor_id)}}">{{shopName($product->vendor_id)->shop_name}}</a></li>
            </ul>
            <h2 class="title"><a href="shop-details.html">{{$product->product_title}}</a></h2>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
            <span>Already Sold : 75%</span>
            <div class="progress">
                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="content-bottom">
                <h4 class="price">${{$product->product_price}}</h4>
                <p>0 orders <span>-35%</span></p>
            </div>
        </div>
    </div>
