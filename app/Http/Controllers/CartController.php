<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cart_products = Cart::content();
        return view('cart',compact('cart_products','savecart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

$duplicates=Cart::search(function($cartItem, $rowId) use ($request){
        return $cartItem->id===$request->id;
        });
    if($duplicates->isNotEmpty()){
   
         toastr()->error('Product already added to cart. Please Update Qty');
       return redirect()->route('cart.index');
    }

        $inputs = $request->except('_token');
        $rules = [
          'id' => 'required | integer',
          'name' => 'required',
          'qty' => 'required',
          'price' => 'required',
        ];
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = $request->input('id');
        $name = $request->input('name');
        $qty = $request->input('qty');
        $price = $request->input('price');

        $add = Cart::add(['id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price, 'weight' => 1 ]);
        if ($add)
        {
        Toastr::success('Product successfully added to cart :)','Success');
    return redirect()->back();


        } else {
Toastr::success('Product successfully added to cart :)','Success');

            return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        $qty = $request->input('qty');
        Cart::update($rowId, $qty);
Toastr::success('Product successfully update cart :)','Success');
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        Toastr::success('Product Successfully Remove Cart :)','Success');
        return redirect()->back();
    }

    public function saveforlatter($id){

       $product=Cart::get($id);
       Cart::remove($id);


       Cart::instance('saveforlatter')->add($product->id, $product->name, $product->qty, $product->price)->associate('App\Product');

Toastr::success('Product has been Saved Cart :)','Success');
return redirect()->route('cart.index');
    }
 public function savefordestroy($rowId)
    {
        Cart::remove($rowId);
        Toastr::success('Product Successfully Remove Cart :)','Success');
        return redirect()->back();

    }
     
}
