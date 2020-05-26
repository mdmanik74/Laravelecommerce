<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller
{
    public function switchToCart($id){

       $product = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('SaveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
         toastr()->error('Product  already Saved For Later');
            return redirect()->route('cart.index');

        }

        Cart::instance('SaveForLater')->add($product->id, $product->name, $product->qty, $product->price)
            ->associate('App\Product');
 Toastr::success('Product has been moved to Cart :)','Success');
        return redirect()->route('cart.index');
    }
}
