<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order_detail;
use Illuminate\Http\Request;



class WebController extends Controller
{
    //home
    public function index(){
        $categories = Category::where('status',1)->take(5)->get();
        $products = Product::latest()->take(5)->get();
        $banners = Banner::latest()->take(3)->get();

        $list_sell = [];
        $order_details = Order_detail::all();
        foreach ($order_details as $order_detail) {
            if (!isset($list_sell[$order_detail->product_id])) {
                $list_sell[$order_detail->product_id] = $order_detail->quantity;
                continue;
            }
            $list_sell[$order_detail->product_id] += $order_detail->quantity;
        }
        // $price = array();
        // foreach ($list_sell as $key => $row)
        // {
        //     $price[$key] = $row['quantity'];
        // }
        // array_multisort($price, SORT_DESC, $list_sell);
        // $price = array_column($list_sell, 'quantity');
        // array_multisort($price, SORT_DESC, $list_sell);
        arsort($list_sell);
        $top_sell = [];
        $i = 0;
        foreach($list_sell as $key => $value) {
            $i++;
            $top_sell[] = $key;
            if ($i == 6) {
                break;
            }
        }

        $products_top = Product::whereIn('id', $top_sell)->get();

           
        // dd(json_encode($products_top));
        return view('home',compact('categories','products','banners','products_top',));
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
        
        $products = Product::where('category_id',$category->id)->with('products_images')->paginate(9);
        // dd($products);
       
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
