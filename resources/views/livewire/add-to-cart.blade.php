<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    {{-- @if ($session)
        <div class="alert alert-success text-center">
            {{ $session }}
        </div>
    @endif --}}

   @if ($inventories)

   <div class="shop-details-price">
             {{-- @if (!$inventory->price) --}}
             @if ($productPrice->discount_price)
                @if ($inventoryPrice == 0)
                    <h2 class="title">${{$productPrice->discount_price * $quantity}}</h2>
                    <h4 class="stock-status">- IN Stock</h4>
                @else
                    @if ($inventory->price == 0)
                    <h2 class="title">${{$productPrice->discount_price * $quantity}}</h2>
                    <h4 class="stock-status">- IN Stock</h4>
                    @else
                        <h2 class="title">${{$inventory->price * $quantity}}</h2>
                        <h4 class="stock-status">- IN Stock</h4>
                    @endif
                @endif
            @else
                @if ($inventoryPrice == 0)
                    <h2 class="title">${{$productPrice->product_price * $quantity}}</h2>
                    <h4 class="stock-status">- IN Stock</h4>
                @else
                    @if ($inventory->price == 0)
                        <h2 class="title">${{$productPrice->product_price * $quantity}}</h2>
                        <h4 class="stock-status">- IN Stock</h4>
                    @else
                        <h2 class="title">${{$inventory->price * $quantity}}</h2>
                        <h4 class="stock-status">- IN Stock</h4>
                    @endif
                @endif
            @endif

     </div>
     {{-- <form wire:submit.prevent="cart"> --}}
         {{-- @if ($inventory->size) --}}
     @if ($inventories)
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
              {{-- <ul>
                  <li class="active"></li>
                  <li class="black"></li>
                  <li class="green"></li>
                  <li class="blue"></li>
              </ul> --}}
          </div>
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
                 @if ($inventories->size && $inventories->color)
                    @if ($colors)
                        <button wire:click='addtocartWithSizeColor' class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                    @else
                        <button id="selectVariationFirst" class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                    @endif
                 @else
                     <button wire:click='addtocart({{$inventories->id}})' class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                 @endif
             @else
                 <button id="not_logged_in" class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
             @endauth
             {{-- <a href="shop-details.html" class="cart-btn">Buy now</a> --}}
         </div>
     @else
     <div class="alert alert-danger">
        <span>This product inventory is not updated yet!</span>
     </div>
   @endif

</div>
@section('footer_script')
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
        $('#selectVariationFirst').click(function(){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please, Select variation first!',
            });
        });
    });
</script>
@endsection

