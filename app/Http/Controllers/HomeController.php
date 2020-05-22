<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $product = Product::orderBy('view_count', 'desc')->where("status",1)->paginate(8);
        return view('welcome',compact('categories','product'));
    }

    public function ByCategory($slug){


        $category=Category::where('slug',$slug)->first();
         $categories = Category::all();
         $products = $category->products()->orderBy('view_count', 'desc')->where("status",1)->get();
        return view('category',compact('category','products','categories'));
    }

    
    
}
