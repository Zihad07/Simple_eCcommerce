<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use PhpOption\None;

class ShoppingController extends Controller
{
    public function addToCart()
    {
//        dd(request()->all());
//        dd();
        $pdt = Product::find(request()->input('pdt_id'));

//        dd($pdt);

        $cartItem = Cart::add([
            'id'=>$pdt->id,
            'name'=>$pdt->name,
            'qty'=>request()->input('quantity'),
            'price'=>$pdt->price,
            'weight'=>0,
            'options'=>[]
        ]);

        Cart::associate($cartItem->rowId,Product::class);


//        dd($cartItem);
//        dd(Cart::content());

        return redirect()->route('cart.show');
    }


    public function cart()
    {
//        Cart::destroy();
        return view('cart');
    }

    public function cartDelete($id) {
        Cart::remove($id);
        return redirect()->back()->with('success','One Cart Item Delete Successully');
    }

    public function incr($id, $qty)
    {
        Cart::update($id,$qty+1);
        return redirect()->back();
    }

    public function decr($id, $qty)
    {

        Cart::update($id,$qty-1);
        return redirect()->back();
    }
}
