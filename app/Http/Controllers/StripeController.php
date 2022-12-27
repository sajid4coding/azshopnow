<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    // public function index(){
    //       return view('index');
    // }
    public function checkout(){

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $total_price = Invoice::find(session('invoice_id'))->total_price;

        $session = \Stripe\Checkout\Session::create([
            'line_items' =>[
               [
                'price_data' =>[
                    'currency' =>'USD',

                    'product_data' => [
                        'name' => 'Total Price',
                    ],
                    'unit_amount' => $total_price * 100,
                ],
                'quantity' => 1,
               ],
            ],
            'mode' => 'payment',

            'success_url' => route(name:'success'),
            'cancel_url' => route(name:'checkout'),

        ]);
        return redirect()->away($session->url)->with('invoice_id', session('invoice_id'));
    }
    public function success(){
        Invoice::where('id', session('invoice_id'))->update([
            'payment' => 'paid',
        ]);
        Cart::where('user_id', auth()->id())->delete();
        return redirect('customer/profile/invoice');
    }

}
