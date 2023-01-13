<?php

namespace App\Http\Livewire;

use App\Models\AttributeSize;
use App\Models\Cart;
use App\Models\Inventory as ModelInventory;
use App\Models\Product as ModelProduct;
use App\Models\Wishlist;
use Livewire\Component;

class AddToCart extends Component
{
    public $productID;
    public $size_dropdown;
    public $color_dropdown;
    public $colors;
    public $inventory;
    public $inventoryPrice=0;
    public $quantity=1;
    public $increment_quantity;
    public $decrement_quantity;
    public $price;
    public $vendor;
    public $justSize;
    public $justColor;
    public $justQuantity;
    public $wishlist;
    public $wishlistIcon = false;

    public function decrement_quantity()
    {
        if($this->quantity >1){
            $this->quantity --;
        }
    }
    public function increment_quantity()
    {
        $this->quantity ++;
    }

    public function updatedJustSize($size_id){
        $this->justQuantity= ModelInventory::where('product_id',$this->productID)->where('size',$size_id)->first();
        // $this->justSizeQuantity=10;
        // $this->visibility='d-none';
    }
    public function updatedJustColor($color_id){
        $this->justQuantity= ModelInventory::where('product_id',$this->productID)->where('color',$color_id)->first();
        // $this->justSizeQuantity=10;
        // $this->visibility='d-none';
    }
    public function updatedSizeDropdown($size_id){
        $this->colors= ModelInventory::where('product_id',$this->productID)->where('size',$size_id)->get();
        // $this->visibility='d-none';
    }
    public function updatedColorDropdown($inventoryId){
        $this->inventory=ModelInventory::find($inventoryId);
        $this->justQuantity=ModelInventory::find($inventoryId);
        $this->inventoryPrice=1;
    }

    public function addtocartWithSizeColor()
    {
        if(
            Cart::where([
                'user_id'=>auth()->id(),
                'product_id'=>$this->productID,
                'size_id'=>$this->inventory->size,
                'color_id'=>$this->inventory->color,
            ])->exists()
        ){
            Cart::where([
                'user_id'=>auth()->id(),
                'product_id'=>$this->productID,
                'size_id'=>$this->inventory->size,
                'color_id'=>$this->inventory->color,
            ])->increment('quantity',$this->quantity);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }elseif(Cart::where([
            'user_id'=>auth()->id(),
            'vendor_id'=>$this->vendor,
        ])->exists()){
            Cart::insert([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'size_id'=>$this->inventory->size,
                'color_id'=>$this->inventory->color,
                'inventory_id'=>$this->inventory->id,
                'quantity'=>$this->quantity,
                'created_at'=>now(),
            ]);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }elseif(cart()==0){
            Cart::insert([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'size_id'=>$this->inventory->size,
                'color_id'=>$this->inventory->color,
                'inventory_id'=>$this->inventory->id,
                'quantity'=>$this->quantity,
                'created_at'=>now(),
            ]);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }else{
            $swalData = [
                'type' => 'error',
                'title' => 'Sorry',
                'message' => "You can't purchase multiple vendors product in a same time",];
        }
        $this->reset('quantity');
        $this->dispatchBrowserEvent('msg', $swalData);
    }
    public function addcartwithjustSize($__inventoryId)
    {
        if(
            Cart::where([
                'user_id'=>auth()->id(),
                'product_id'=>$this->productID,
                'size_id'=>$this->justSize,
            ])->exists()
        ){
            Cart::where([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'size_id'=>$this->justSize,
            ])->increment('quantity',$this->quantity);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }elseif(Cart::where([
            'user_id'=>auth()->id(),
            'vendor_id'=>$this->vendor,
        ])->exists()){
            Cart::insert([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'size_id'=>$this->justSize,
                'quantity'=>$this->quantity,
                'inventory_id'=>$__inventoryId,
                'created_at'=>now(),
            ]);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }elseif(cart()==0){
            Cart::insert([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'size_id'=>$this->justSize,
                'quantity'=>$this->quantity,
                'inventory_id'=>$__inventoryId,
                'created_at'=>now(),
            ]);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }else{
            $swalData = [
                'type' => 'error',
                'title' => 'Sorry',
                'message' => "You can't purchase multiple vendors product in a same time",];
        }

        $this->reset('quantity');
        $this->dispatchBrowserEvent('msg', $swalData);

    }
    public function addcartwithjustcolor($__inventoryId)
    {
        if(
            Cart::where([
                'user_id'=>auth()->id(),
                'product_id'=>$this->productID,
                'color_id'=>$this->justColor,
            ])->exists()
        ){
            Cart::where([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'color_id'=>$this->justColor,
            ])->increment('quantity',$this->quantity);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }elseif(Cart::where([
            'user_id'=>auth()->id(),
            'vendor_id'=>$this->vendor,
        ])->exists()){
            Cart::insert([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'color_id'=>$this->justColor,
                'quantity'=>$this->quantity,
                'inventory_id'=>$__inventoryId,
                'created_at'=>now(),
            ]);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }elseif(cart()==0){
            Cart::insert([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'color_id'=>$this->justColor,
                'quantity'=>$this->quantity,
                'inventory_id'=>$__inventoryId,
                'created_at'=>now(),
            ]);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }else{
            $swalData = [
                'type' => 'error',
                'title' => 'Sorry',
                'message' => "You can't purchase multiple vendors product in a same time",];
        }
        $this->reset('quantity');
        $this->dispatchBrowserEvent('msg', $swalData);

    }
    public function addtocart($__inventoryId)
    {
        if(
            Cart::where([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
            ])->exists()
        ){
            Cart::where([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
            ])->increment('quantity',$this->quantity);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }elseif(Cart::where([
            'user_id'=>auth()->id(),
            'vendor_id'=>$this->vendor,
        ])->exists()){
            Cart::insert([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'quantity'=>$this->quantity,
                'inventory_id'=>$__inventoryId,
                'created_at'=>now(),
            ]);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }elseif(cart()==0){
            Cart::insert([
                'user_id'=>auth()->id(),
                'vendor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'quantity'=>$this->quantity,
                'inventory_id'=>$__inventoryId,
                'created_at'=>now(),
            ]);
            $swalData = [
                'type' => 'success',
                'title' => 'Successfully',
                'message' => 'Product added on Cart',];
        }else{
                $swalData = [
                    'type' => 'error',
                    'title' => 'Sorry',
                    'message' => "You can't purchase multiple vendors product in a same time",];
        }
        $this->reset('quantity');
        $this->dispatchBrowserEvent('msg', $swalData);

    }

    public function render()
    {
        $this->vendor=ModelProduct::find($this->productID)->vendor_id;
        $productPrice=ModelProduct::find($this->productID);
        $inventories=ModelInventory::where('product_id',$this->productID)->first();
        $this->JustQuantity=ModelInventory::where('product_id',$this->productID)->get();
        // $this->justQuantity= ModelInventory::where('product_id',$this->productID)->where('color',$color_id)->first();
        // $this->inventoriesQuantity=$inventories->quantity;
        $sizes=ModelInventory::select('size')->where('product_id',$this->productID)->groupBy('size')->get();
        $justColors=ModelInventory::select('color')->where('product_id',$this->productID)->groupBy('color')->get();
        return view('livewire.add-to-cart', compact('sizes','inventories','productPrice','justColors'));
    }

    public function wishlist($id){
        $inventory = ModelInventory::find($id);


        if(Wishlist::where([
            'user_id' => auth()->id(),
            'vendor_id' => $inventory->vendor_id,
            'product_id' => $inventory->product_id,
            'inventory_id' => $inventory->id,
        ])->exists()){
            $this->wishlistIcon = false;
            Wishlist::where([
                'user_id' => auth()->id(),
                'vendor_id' => $inventory->vendor_id,
                'product_id' => $inventory->product_id,
                'inventory_id' => $inventory->id,
            ])->delete();
        }else{
            Wishlist::insert([
                'user_id' => auth()->id(),
                'vendor_id' => $inventory->vendor_id,
                'product_id' => $inventory->product_id,
                'inventory_id' => $inventory->id,
                'created_at' => now()
            ]);
            $this->wishlistIcon = true;
        }
    }
}
