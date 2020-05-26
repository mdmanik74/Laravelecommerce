<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Gloudemans\Shoppingcart\Facades\Cart;

class SaveForLaterController extends Controller
{
    public function switchToCart($id){

        $product = Cart::instance('SaveForLater')->get($id);

        Cart::instance('SaveForLater')->remove($id);

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            Toastr::success('Product has been moved to Cart :)','Success');
            return redirect()->route('cart.index');
        }

        Cart::instance('default')->add($product->id, $product->name, 1, $product->price)
            ->associate('App\Product');
 Toastr::success('Product has been moved to Cart :)','Success');
        return redirect()->route('cart.index');
}
}