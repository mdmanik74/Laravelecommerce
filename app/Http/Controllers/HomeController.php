<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $product = Product::orderBy('view_count', 'desc')->where("status",1)->paginate(8);
        return view('welcome',compact('categories','product'));
    }

    public function ByCategory($slug){

        $category = Category::where('slug',$slug)->first();
        $products = $category->products()->orderBy('view_count', 'desc')->where("status",1)->paginate(8);

        return view('category',compact('category','products'));
    }
    public function products(){

        if (request()->sort='low_high') {
            $products=$product->sortBy('price');
        }elseif(request()->sort='high_low'){
             $product=$product->sortByDesc('price');
        }

        return view('welcome',compact('products'));
    }
}
