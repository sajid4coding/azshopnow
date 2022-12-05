<?php

namespace App\Http\Livewire;

use App\Models\AttributeSize;
use App\Models\Cart;
use App\Models\Inventory as ModelInventory;
use App\Models\Product as ModelProduct;
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

    public function updatedSizeDropdown($size_id){
        $this->colors= ModelInventory::where('product_id',$this->productID)->where('size',$size_id)->get();
        // $this->visibility='d-none';
    }
    public function updatedColorDropdown($inventoryId){
        $this->inventory=ModelInventory::find($inventoryId);
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
        }else{
            Cart::insert([
                'user_id'=>auth()->id(),
                'venor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'size_id'=>$this->inventory->size,
                'color_id'=>$this->inventory->color,
                'inventory_id'=>$this->inventory->id,
                'quantity'=>$this->quantity,
                'created_at'=>now(),
            ]);
        }
        $this->reset('quantity');
        $this->session="Product added on Cart Page";

    }
    public function addtocart($__inventoryId)
    {
        if(
            Cart::where([
                'user_id'=>auth()->id(),
                'product_id'=>$this->productID,
            ])->exists()
        ){
            Cart::where([
                'user_id'=>auth()->id(),
                'venor_id'=>$this->vendor,
                'product_id'=>$this->productID,
            ])->increment('quantity',$this->quantity);
        }else{

            Cart::insert([
                'user_id'=>auth()->id(),
                'venor_id'=>$this->vendor,
                'product_id'=>$this->productID,
                'quantity'=>$this->quantity,
                'inventory_id'=>$__inventoryId,
                'created_at'=>now(),
            ]);
        }
        $this->reset('quantity');
        $this->session="Product added on Cart Page";

    }

    public function render()
    {
        $this->vendor=ModelProduct::find($this->productID)->vendor_id;
        $productPrice=ModelProduct::find($this->productID);
        $inventories=ModelInventory::where('product_id',$this->productID)->first();
        $sizes=ModelInventory::select('size')->where('product_id',$this->productID)->groupBy('size')->get();
        return view('livewire.add-to-cart', compact('sizes','inventories','productPrice'));
    }
}
