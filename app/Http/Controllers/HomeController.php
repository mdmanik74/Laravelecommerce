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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
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
         $products = $category->products()->get();
        return view('category',compact('category','products','categories'));
    }
}
