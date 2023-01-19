<?php

namespace App\Http\Livewire;

use App\Models\{Cart, Coupon, Inventory, Shipping, Packaging, VendorPackaging, VendorShipping};
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CartPage extends Component
{
    public $coupon='';
    public $coupon_error;
    public $shipping;
    public $shipping_id = 0;

    public function render()
    {
        return view('livewire.cart-page',[
            'carts' => Cart::where('user_id', auth()->id())->get(),
            'vendor_id' => Cart::select('vendor_id')->where('user_id', auth()->id())->groupBy('vendor_id')->get(),
            'shippings' => Shipping::all(),
            'packagings'=> Packaging::all(),
        ]);
    }

    public function quantity_decrement($id){
        Cart::find($id)->decrement('quantity');
    }

    public function quantity_increment($id){
        Cart::find($id)->increment('quantity');
    }

    public function quantity($id, $quantity){
        if($quantity){
            Cart::find($id)->update([
                'quantity' => $quantity
            ]);
        }
    }
    public function cart_row_delete($id){
        Cart::find($id)->delete();
        return back();
    }

    public function apply_coupon($subtotal, $vendor_id){
        if($this->coupon){
            $get_coupon_info = Coupon::where('coupon_code', $this->coupon)->first();
            if(Coupon::where('coupon_code', $this->coupon)->exists()){
                if(Coupon::where('coupon_code', $this->coupon)->whereDate('expire_date', '>', Carbon::now()->format('Y-m-d'))->exists()){
                    $coupon_vendor_id = Coupon::where('coupon_code', $this->coupon)->first()->vendor_id;
                    if($coupon_vendor_id == $vendor_id){
                        if(Coupon::where('coupon_code', $this->coupon)->first()->minimum_price <= $subtotal){
                            session(['coupon_info' => $get_coupon_info]);
                        }else{
                            $minimum_price = Coupon::where('coupon_code', $this->coupon)->first()->minimum_price;
                            $this->coupon_error = "Coupon Minimum Purchase shortage: ".($minimum_price - $subtotal);
                            session(['coupon_info' => '']);
                            $this->coupon='';
                        }
                    }else{
                        $this->coupon_error = 'This Product Vendor Coupon ID Invalid';
                        session(['coupon_info' => '']);
                        $this->coupon='';
                    }
                }else{
                    $this->coupon_error = 'Coupon is expired.';
                    session(['coupon_info' => '']);
                    $this->coupon='';
                }
            }else{
                $this->coupon_error = 'Coupon does not exists.';
                session(['coupon_info' => '']);
                $this->coupon='';
            }
        }else{
            $this->coupon_error = 'Put your Coupon.';
            session(['coupon_info' => '']);
            $this->coupon='';
        }
    }

    public function updatedShipping($id){
        $this->shipping_id = $id;
        if($id == 0){
            session(['shipping_cost' => 0]);
        }else{
            session(['shipping_cost' => Shipping::find($this->shipping_id)->cost]);
        }
    }
    public function packagingSelect($packagingId)
    {
        session(['packagingCost' => Packaging::find($packagingId)]);
    }
}
