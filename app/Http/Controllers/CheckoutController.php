<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function pay() {
//        dd(request()->all());

//        \Stripe\Stripe::setApiKey('sk_test_wYEc2N1msTgVtLOfvvqSderh00DrOOnnxa');
//        $customer = \Stripe\Customer::create([
//            'description' => 'Simple Ecommerce Buy Your Fvourite Books',
//            'email' => request()->stripeEmail,
//            'payment_method' => 'pm_card_visa',
//            'balance'=>Cart::total()*100,
////            'currency'=>'usd',
//            'source'=>request()->stripeToken
//        ]);

        \Stripe\Stripe::setApiKey("sk_test_wYEc2N1msTgVtLOfvvqSderh00DrOOnnxa");

        $charge = \Stripe\Charge::create([
            "amount" => Cart::total()*100,
            "currency" => "usd",
            "source" => request()->stripeToken, // obtained with Stripe.js
            "description" => "'Simple Ecommerce Buy Your Fvourite Books'"
        ]);

//        dd($customer);
        dd('Your card was charged succesfully.');
    }
}
