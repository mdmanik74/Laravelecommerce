<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ShopController extends Controller
{
    public function shop($slug){

        $product =Product::where('slug',$slug)->first();
        $blogKey = 'blog_' . $product->id;

        if (!Session::has($blogKey)) {
            $product->increment('view_count');
            Session::put($blogKey,1);
        }
        
        
        $randomposts = Product::where("status",1)->take(4)->inRandomOrder()->get();
        return view('shop',compact('product','randomposts'));
    }
}
