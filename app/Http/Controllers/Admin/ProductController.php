<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $product=Product::latest()->get();
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $category=Category::all();
        return view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'name' => 'required',
            'cat_id' => 'required',
            'price' => 'required',
            'descr' => 'required',
            'image' => 'required',
            


        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('product'))
            {
                Storage::disk('public')->makeDirectory('product');
            }

            $postImage = Image::make($image)->resize(300,300)->save('foo.jpg');
            Storage::disk('public')->put('product/'.$imageName,$postImage);

        } else {
            $imageName = "";
        }
        $product = new Product();
        $product->name = $request->name;
        $product->slug=str_slug($request->name);
        $product->image = $imageName;
        $product->price = $request->price;
        $product->descr = $request->descr;
        $product->cat_id=$request->cat_id;
        $product->save();
        Toastr::success('Product Succesfully Saved :)','Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
