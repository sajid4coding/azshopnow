<div>

    <style>
    .heart-stroke {
  fill: none;
  stroke: #ddd;
  stroke-width: 3px;
  opacity: 1;
  transform-origin: center center;
}
.button.active .heart-stroke {
  opacity: 0;
}
.heart-full {
  opacity: 0;
  transform-origin: 50% 50%;
}
.button.active .heart-full {
  opacity: 1;
}
.heart-lines {
  stroke-width: 2px;
  display: none;
}

.button:not(.active):hover .heart-stroke {
  -webkit-animation: pulse 1s ease-out infinite;
          animation: pulse 1s ease-out infinite;
}

.button.animate .heart-full {
  -webkit-animation: heart 0.35s;
          animation: heart 0.35s;
}
.button.animate .heart-lines {
  -webkit-animation: lines 0.2s ease-out forwards;
          animation: lines 0.2s ease-out forwards;
  display: block;
}

@-webkit-keyframes lines {
  0% {
    stroke-dasharray: 6;
    stroke-dashoffset: 16;
  }
  100% {
    stroke-dasharray: 13;
    stroke-dashoffset: 18;
  }
}

@keyframes lines {
  0% {
    stroke-dasharray: 6;
    stroke-dashoffset: 16;
  }
  100% {
    stroke-dasharray: 13;
    stroke-dashoffset: 18;
  }
}
@-webkit-keyframes heart {
  0% {
    transform: scale(1);
    transform-origin: center center;
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  10% {
    transform: scale(1.2);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  35% {
    transform: scale(1);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  75% {
    transform: scale(1.1);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  100% {
    transform: scale(1);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
}
@keyframes heart {
  0% {
    transform: scale(1);
    transform-origin: center center;
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  10% {
    transform: scale(1.2);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  35% {
    transform: scale(1);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  75% {
    transform: scale(1.1);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  100% {
    transform: scale(1);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
}
@-webkit-keyframes pulse {
  0% {
    opacity: 1;
    transform-origin: center center;
    transform: scale(1);
  }
  50% {
    opacity: 0.6;
    transform: scale(1.15);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}
@keyframes pulse {
  0% {
    opacity: 1;
    transform-origin: center center;
    transform: scale(1);
  }
  50% {
    opacity: 0.6;
    transform: scale(1.15);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}
      </style>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    {{-- @if ($session)
        <div class="alert alert-success text-center">
            {{ $session }}
        </div>
    @endif --}}

   @if ($inventories)

   <div class="shop-details-price">
             @if ($productPrice->discount_price)
                @if ($inventoryPrice == 0)
                    <h2 class="title">${{$productPrice->discount_price * $quantity}}</h2>
                    @if ($justQuantity)
                        @if ($justQuantity->quantity > 0)
                            <h4 class="stock-status bg-primary p-1 text-light">- IN Stock</h4>
                        @else
                            <h4 class="stock-status bg-warning p-1 text-dark">- Stock Out</h4>
                        @endif
                    @endif
                @else
                    @if ($inventory->price == 0)
                    <h2 class="title">${{$productPrice->discount_price * $quantity}}</h2>
                    @if ($justQuantity)
                        @if ($justQuantity->quantity > 0)
                            <h4 class="stock-status bg-primary p-1 text-light">- IN Stock</h4>
                        @else
                            <h4 class="stock-status bg-warning p-1 text-dark">- Stock Out</h4>
                        @endif
                    @endif
                    @else
                        <h2 class="title">${{$inventory->price * $quantity}}</h2>
                        @if ($justQuantity)
                            @if ($justQuantity->quantity > 0)
                                <h4 class="stock-status bg-primary p-1 text-light">- IN Stock</h4>
                            @else
                                <h4 class="stock-status bg-warning p-1 text-dark">- Stock Out</h4>
                            @endif
                        @endif
                    @endif
                @endif
            @else
                @if ($inventoryPrice == 0)
                    <h2 class="title">${{$productPrice->product_price * $quantity}}</h2>
                    @if ($justQuantity)
                        @if ($justQuantity->quantity > 0)
                            <h4 class="stock-status bg-primary p-1 text-light">- IN Stock</h4>
                        @else
                            <h4 class="stock-status bg-warning p-1 text-dark">- Stock Out</h4>
                        @endif
                    @endif
                @else
                    @if ($inventory->price == 0)
                        <h2 class="title">${{$productPrice->product_price * $quantity}}</h2>
                        @if ($justQuantity)
                            @if ($justQuantity->quantity > 0)
                                <h4 class="stock-status bg-primary p-1 text-light">- IN Stock</h4>
                            @else
                                <h4 class="stock-status bg-warning p-1 text-dark">- Stock Out</h4>
                            @endif
                        @endif
                    @else
                        <h2 class="title">${{$inventory->price * $quantity}}</h2>
                        @if ($justQuantity)
                            @if ($justQuantity->quantity > 0)
                                <h4 class="stock-status bg-primary p-1 text-light">- IN Stock</h4>
                            @else
                                <h4 class="stock-status bg-warning p-1 text-dark">- Stock Out</h4>
                            @endif
                        @endif
                    @endif
                @endif
            @endif

        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
     @if ($inventories && $inventories->size && $inventories->color )
              @if ($inventories->size != NULL)
                  <div class="shop-details-color">
                      <span>Size :</span>
                      <select wire:model="size_dropdown" id="" class="form-select w-50">
                          <option value="">- Select Size -</option>
                          @foreach ($sizes as $size)
                              <option value="{{$size->relationwithsize->id}}">{{$size->relationwithsize->size}}</option>
                          @endforeach
                      </select>
                  </div>
              @endif
          {{-- @endif --}}
          <div class="shop-details-color">
              @if ($inventories->color != NULL)
                  <span>Color :</span>
                      <select wire:model="color_dropdown" id="" class="form-select w-50">
                            {{-- <option value=""disabled selected>- Select Size First -</option> --}}
                          @if ($colors)
                            <option value="0">- Select Color -</option>
                              @foreach ($colors as $color)
                                  <option value="{{$color->id}}">{{$color->relationwithcolor->color_name}}</option>
                              @endforeach
                          @else
                          <option value="0">- Select Size First -</option>
                          @endif
                      </select>
              @endif
          </div>

    @elseif ($inventories && $inventories->size && $inventories->color== NULL )
        <div class="shop-details-color">

            <span>Size :</span>
            <select wire:model="justSize" id="" class="form-select w-50">
                <option value="">- Select Size -</option>
                @foreach ($sizes as $size)
                    <option value="{{$size->relationwithsize->id}}">{{$size->relationwithsize->size}}</option>
                @endforeach
            </select>
        </div>
    @elseif ($inventories && $inventories->size==NULL && $inventories->color )
        <div class="shop-details-color">
            <span>Color :</span>
            <select wire:model="justColor" id="" class="form-select w-50">
                <option value="">- Select Color -</option>
                @foreach ($justColors as $justColor)
                    <option value="{{$justColor->relationwithcolor->id}}">{{$justColor->relationwithcolor->color_name}}</option>
                @endforeach
            </select>
        </div>
    @else
    @foreach ($JustQuantity as $Quantity)
        @if ($Quantity->quantity >0)
            <span class="stock-status bg-primary p-1 text-light" style="font-size: 12px">- IN Stock</span>
        @else
            <span class="stock-status bg-warning p-1 text-dark" style="font-size: 12px">- Stock Out</span>
        @endif
    @endforeach
    @endif
         <div class="shop-details-quantity">
             <span>Quantity :</span>
             <div>
                 <span class=" mx-2" wire:click="decrement_quantity">
                     <button class="p-2" style="border: none">
                         <i class="fa fa-minus"></i>
                     </button>
                 </span>
                         <input readonly class="p-2 text-center" style="width:15%" type="text" value="{{$quantity}}">
                 <span class=" mx-2  " wire:click="increment_quantity">
                     <button class="p-2" style="border: none">
                         <i class="fal fa-plus"></i>
                     </button>
                 </span>
             </div>
             @auth
                 @if (auth()->user()->role=='customer')
                    @if ($inventories->size && $inventories->color)
                        @if ($inventoryPrice == 1)
                           <button wire:click='addtocartWithSizeColor' class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        {{-- @elseif () --}}
                        @else
                           <button id="selectVariationFirst" class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        @endif
                    @elseif ($inventories->size && $inventories->color==NULL)
                        @if ($justSize)
                            <button wire:click="addcartwithjustSize({{$inventories->id}})" class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        @else
                            <button id="selectVariationFirst" class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        @endif
                    @elseif ($inventories->size==NULL && $inventories->color)
                        @if ($justColor)
                            <button wire:click="addcartwithjustcolor({{$inventories->id}})" class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        @else
                            <button id="selectVariationFirst" class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        @endif
                    @else
                        <button wire:click='addtocart({{$inventories->id}})' class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                    @endif
                @else
                <button id="not_customer" class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                @endif
             @else
                 <button id="not_logged_in" class="btn btn-primary"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
             @endauth
             {{-- <a href="shop-details.html" class="cart-btn">Buy now</a> --}}
         </div>
         <div class="shop-details-Wishlist">
            <ul>

                <li>
                    @auth
                        <div class="4"  wire:click="wishlist({{$inventories->id}})">
                            <a class="button
                                @foreach (getWishListProduct() as $product)
                                    @if ($product->product_id  == $productID)
                                    animate active text-danger
                                    @else
                                        text-info
                                    @endif
                                @endforeach" style="cursor: pointer" >
                                <svg width="35px" height="25px" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                    <path class="heart-stroke" d="M13.0185191,4.25291223 L12.9746137,4.25291223 C10.1097846,4.25291223 8.67188189,6.6128289 8.5182129,8.92335198 C8.39747298,10.6740809 8.73225185,12.8528876 14.0777375,18.4782704 C14.7127154,19.1080239 15.5654911,19.4695694 16.4596069,19.4880952 C17.3247917,19.4700909 18.1444718,19.0969678 18.7262246,18.4563177 C19.3189478,17.9074999 24.5052763,12.5894551 24.3570955,8.98921012 C24.2363556,6.42623084 22.123407,4.25291223 19.7525139,4.25291223 C18.5053576,4.22947431 17.3125171,4.76253118 16.4980242,5.70727948 C15.6177331,4.73767759 14.354699,4.20555668 13.04596,4.25291223 L13.0185191,4.25291223 Z" fill="#FF4800"/>
                                    <path class="heart-full" d="M13.0185191,4.25291223 L12.9746137,4.25291223 C10.1097846,4.25291223 8.67188189,6.6128289 8.5182129,8.92335198 C8.39747298,10.6740809 8.73225185,12.8528876 14.0777375,18.4782704 C14.7127154,19.1080239 15.5654911,19.4695694 16.4596069,19.4880952 C17.3247917,19.4700909 18.1444718,19.0969678 18.7262246,18.4563177 C19.3189478,17.9074999 24.5052763,12.5894551 24.3570955,8.98921012 C24.2363556,6.42623084 22.123407,4.25291223 19.7525139,4.25291223 C18.5053576,4.22947431 17.3125171,4.76253118 16.4980242,5.70727948 C15.6177331,4.73767759 14.354699,4.20555668 13.04596,4.25291223 L13.0185191,4.25291223 Z" fill="#FF4800"/>
                                    <path class="heart-lines" d="M26,4 L30.6852129,0.251829715" stroke="#FF4800" stroke-width="2" stroke-linecap="round"/>
                                    <path class="heart-lines"d="M2.314788,4 L7.00000086,0.251829715" stroke="#FF4800" stroke-width="2" stroke-linecap="round" transform="matrix(-1 0 0 1 10.314788 1)"/>
                                    <path class="heart-lines" d="M27,12 L33,12" stroke="#FF4800" stroke-width="2" stroke-linecap="round" />
                                    <path class="heart-lines" d="M0,12 L6,12" stroke="#FF4800" stroke-width="2" stroke-linecap="round" transform="matrix(-1 0 0 1 7 1)"/>
                                    <path class="heart-lines" d="M24,19 L28.6852129,22.7481703" stroke="#FF4800" stroke-width="2" stroke-linecap="round"/>
                                    <path class="heart-lines" d="M4.314788,19 L9.00000086,22.7481703" stroke="#FF4800" stroke-width="2" stroke-linecap="round" transform="matrix(-1 0 0 1 14.314788 1)"/>
                                    </g>
                                </svg>
                                Add to Wishlist
                            </a>
                        </div>
                    @endauth
                    @guest
                        <div class="4" id="wishlist_without_logged_in">
                            <a style="cursor: pointer" >
                                <svg width="35px" height="25px" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none" fill-rule="evenodd">
                                    <path class="heart-stroke" d="M13.0185191,4.25291223 L12.9746137,4.25291223 C10.1097846,4.25291223 8.67188189,6.6128289 8.5182129,8.92335198 C8.39747298,10.6740809 8.73225185,12.8528876 14.0777375,18.4782704 C14.7127154,19.1080239 15.5654911,19.4695694 16.4596069,19.4880952 C17.3247917,19.4700909 18.1444718,19.0969678 18.7262246,18.4563177 C19.3189478,17.9074999 24.5052763,12.5894551 24.3570955,8.98921012 C24.2363556,6.42623084 22.123407,4.25291223 19.7525139,4.25291223 C18.5053576,4.22947431 17.3125171,4.76253118 16.4980242,5.70727948 C15.6177331,4.73767759 14.354699,4.20555668 13.04596,4.25291223 L13.0185191,4.25291223 Z" fill="#FF4800"/>
                                    <path class="heart-full" d="M13.0185191,4.25291223 L12.9746137,4.25291223 C10.1097846,4.25291223 8.67188189,6.6128289 8.5182129,8.92335198 C8.39747298,10.6740809 8.73225185,12.8528876 14.0777375,18.4782704 C14.7127154,19.1080239 15.5654911,19.4695694 16.4596069,19.4880952 C17.3247917,19.4700909 18.1444718,19.0969678 18.7262246,18.4563177 C19.3189478,17.9074999 24.5052763,12.5894551 24.3570955,8.98921012 C24.2363556,6.42623084 22.123407,4.25291223 19.7525139,4.25291223 C18.5053576,4.22947431 17.3125171,4.76253118 16.4980242,5.70727948 C15.6177331,4.73767759 14.354699,4.20555668 13.04596,4.25291223 L13.0185191,4.25291223 Z" fill="#FF4800"/>
                                    <path class="heart-lines" d="M26,4 L30.6852129,0.251829715" stroke="#FF4800" stroke-width="2" stroke-linecap="round"/>
                                    <path class="heart-lines"d="M2.314788,4 L7.00000086,0.251829715" stroke="#FF4800" stroke-width="2" stroke-linecap="round" transform="matrix(-1 0 0 1 10.314788 1)"/>
                                    <path class="heart-lines" d="M27,12 L33,12" stroke="#FF4800" stroke-width="2" stroke-linecap="round" />
                                    <path class="heart-lines" d="M0,12 L6,12" stroke="#FF4800" stroke-width="2" stroke-linecap="round" transform="matrix(-1 0 0 1 7 1)"/>
                                    <path class="heart-lines" d="M24,19 L28.6852129,22.7481703" stroke="#FF4800" stroke-width="2" stroke-linecap="round"/>
                                    <path class="heart-lines" d="M4.314788,19 L9.00000086,22.7481703" stroke="#FF4800" stroke-width="2" stroke-linecap="round" transform="matrix(-1 0 0 1 14.314788 1)"/>
                                    </g>
                                </svg>
                                Add to Wishlist
                            </a>
                        </div>
                    @endguest
                </li>
                {{-- <li><a href="#"><i class="fa-solid fa-chart-column"></i>Compare</a></li> --}}
            </ul>
        </div>
     @else
     <div class="alert alert-danger">
        <span>This product inventory is not updated yet!</span>
     </div>
   @endif

</div>


@section('footer_script')
<script>
$(".button").click(function() {
  $(this).toggleClass("animate");
  $(this).toggleClass("active");
});


</script>
<script>
    $(document).ready(function(){
        $('#not_logged_in').click(function(){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You have to need Login first!',
            footer: '<a href="{{route('customer.login')}}">Click here to login</a>'
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#not_customer').click(function(){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'You are not a Customer!',
            footer: 'Please, Create a customer account then try to shopping'
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#selectVariationFirst').click(function(){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please, Select variation first!',
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
    $('#wishlist_without_logged_in').click(function(){
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'You have to need Login first!',
        footer: '<a href="{{route('customer.login')}}">Click here to login</a>'
        });
        });
    });
</script>
@once
    <script>
        window.addEventListener('msg', function(e) {
            let data = e.detail;
            let title = data.title;
            let message = data.message;
            let type = data.type;

            Swal.fire(title, message, type);
        });
    </script>
@endonce
@endsection

