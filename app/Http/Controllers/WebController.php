<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;



class WebController extends Controller
{
    //home
    public function index(){
        $categories = Category::where('status',1)->take(5)->get();
        $products = Product::latest()->take(5)->get();
        $banners = Banner::latest()->take(3)->get();

        return view('home',compact('categories','products','banners',));
    }
    //category
    public function category(){
        $categories = Category::where('status',1)->take(5)->get();
        $products = Product::where('status',1)->paginate(9);
        $today = date("Y-m-d h:m:s");

        return view('store',compact('categories','products'));
    }
    public function category_search($slug){
        $categories = Category::where('status',1)->take(5)->get();
        $category = Category::where('slug',$slug)->first();
        
        $products = Product::where('category_id',$category->id)->paginate(9);
       
        return view('test',compact('products','categories','category'));
    }


    public function category_search_test($slug){
        $categories = Category::where('status',1)->take(5)->get();
        $category = Category::where('slug',$slug)->first();
        
        $products = Product::where('category_id',$category->id)->paginate(9);
        
        $xd = 0;
       
        return view('strore_search',compact('products','categories','category','xd'));
    }
    public function category_search_price($price_min,$price_max){
        $categories = Category::where('status',1)->take(5)->get();
        $products = Product::whereBetween('price',[$price_min,$price_max])->paginate(9);
      

        $xd = 1;
        return view('strore_search',compact('products','categories','xd','price_min','price_max'));
    }

   
}
