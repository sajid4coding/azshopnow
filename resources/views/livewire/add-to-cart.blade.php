<div>
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
                           <button wire:click='addtocartWithSizeColor' class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        {{-- @elseif () --}}
                        @else
                           <button id="selectVariationFirst" class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        @endif
                    @elseif ($inventories->size && $inventories->color==NULL)
                        @if ($justSize)
                            <button wire:click="addcartwithjustSize({{$inventories->id}})" class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        @else
                            <button id="selectVariationFirst" class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        @endif
                    @elseif ($inventories->size==NULL && $inventories->color)
                        @if ($justSize)
                            <button wire:click="addcartwithjustcolor({{$inventories->id}})" class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        @else
                            <button id="selectVariationFirst" class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                        @endif
                    @else
                        <button wire:click='addtocart({{$inventories->id}})' class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                    @endif
                @else
                <button id="not_customer" class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
                @endif
             @else
                 <button id="not_logged_in" class="btn"><i class="fa-solid fa-cart-arrow-down"></i> Add to Cart</button>
             @endauth
             {{-- <a href="shop-details.html" class="cart-btn">Buy now</a> --}}
         </div>
         <div class="shop-details-Wishlist">
            <ul>
                <li>
                    <a wire:click="wishlist({{$inventories->id}})" href="#!"><i class="fa-regular fa-heart"></i>Add to Wishlist</a>
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
{{-- <script>
    @if (session('message'))
     const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })
        Toast.fire({
        icon: 'success',
        title: "{{session('message')}}"
        });
    @endif
</script> --}}
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

