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
            'product_name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'descr' => 'required',
            'image' => 'required',
            


        ]);
        $image = $request->file('image');
        $slug = str_slug($request->product_name);
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
        $product->product_name = $request->product_name;
        $product->slug=str_slug($request->product_name);
        $product->image = $imageName;
        $product->price = $request->price;
        $product->descr = $request->descr;
        $product->categories_id=$request->category;
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
         $category=Category::all();
        return view('admin.product.show',compact('category','product'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
          $category=Category::all();
        return view('admin.product.edit',compact('category','product'));
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
         $this->validate($request,[
            'product_name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'descr' => 'required',
            


        ]);
       $image = $request->file('image');
        $slug = str_slug($request->product_name);
        if(isset($image))
        {
//            make unipue name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('product'))
            {
                Storage::disk('public')->makeDirectory('product');
            }

            //            delete old post image
            if (Storage::disk('public')->exists('product/'.$product->image))
        {
            Storage::disk('public')->delete('product/'.$product->image);
        }
            $postImage = Image::make($image)->resize(300,300)->save('foo.jpg');
            Storage::disk('public')->put('product/'.$imageName,$postImage);

        } else {
            $imageName = $product->image;
        }

        $product->product_name = $request->product_name;
        $product->slug=str_slug($request->product_name);
        $product->image = $imageName;
        $product->price = $request->price;
        $product->descr = $request->descr;
        $product->categories_id=$request->category;
        $product->save();
        Toastr::success('Product Succesfully Update :)','Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (Storage::disk('public')->exists('product/'.$product->image))
        {
            Storage::disk('public')->delete('product/'.$product->image);
        }
        $product->delete();
        Toastr::success('Product Succesfully Deleted :)','Success');
        return redirect()->route('admin.product.index');
    }

    // post active unactive
    public function active($id){
   $product=Product::find($id)->where('id',$id)->update(['status'=>1]);
   Toastr::success('Product Succesfully Active :)','Success');
    return redirect()->back();
    }
    public function unactive($id){
   $product=Product::find($id)->where('id',$id)->update(['status'=>0]);
   Toastr::success('Product Succesfully Deactive :)','Success');
    return redirect()->back();
    }
}
