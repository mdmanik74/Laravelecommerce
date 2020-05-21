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
        $product = Product::latest()->where("status",1)->take(8)->get();
        return view('welcome',compact('categories','product'));
    }

    public function shop($slug){

        $product =Product::where('slug',$slug)->first();
        $categories =Category::all();
        $blogKey = 'blog_' . $product->id;

        if (!Session::has($blogKey)) {
            $product->increment('view_count');
            Session::put($blogKey,1);
        }
        $randomposts = Product::where("status",1)->take(3)->inRandomOrder()->get();
        return view('shop',compact('product','randomposts','categories'));
    }
    
}
