<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment_product;
use App\Models\Order_detail;
use Illuminate\Http\Request;



class WebController extends Controller
{
    //home
    public function index()
    {
        $categories = Category::where('status', 1)->take(5)->get();
        $products = Product::latest()
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->where('products.status', 1)
        ->where('categories.status', 1)
        ->with('avg_rating_comment')
        ->take(8)
        ->select(
            'products.id',
            'products.name',
            'products.slug',
            'products.price',
            'products.thumb',
            'products.description',
            'products.status',
            'products.category_id',
            'products.created_by',
            'products.updated_by',
            'products.created_at',
            'products.updated_at',
        )
        ->get();

        $banners = Banner::latest()->take(4)->get();

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
        foreach ($list_sell as $key => $value) {
            $i++;
            $top_sell[] = $key;
            if ($i == 6) {
                break;
            }
        }

        $products_top = Product::whereIn('id', $top_sell)->with('avg_rating_comment')->with('category')->take(8)->get();
        

        // dd(json_encode($products_top));
        return view('home', compact('categories', 'products', 'banners', 'products_top',));
    }
    //category
    public function category()
    {
        $categories = Category::where('status', 1)->take(5)->get();
        $products = Product::where('status', 1)->with('avg_rating_comment')->paginate(9);
        $today = date("Y-m-d h:m:s");

        return view('store', compact('categories', 'products'));
    }
    public function category_search($slug)
    {
        $categories = Category::where('status', 1)->take(5)->get();
        $category = Category::where('slug', $slug)->first();

        $products = Product::where('category_id', $category->id)->with('avg_rating_comment')->with('products_images')->paginate(9);
        // dd($products);

        return view('test', compact('products', 'categories', 'category'));
    }


    public function category_search_test($slug)
    {
        $categories = Category::where('status', 1)->take(5)->get();
        $category = Category::where('slug', $slug)->first();

        $products = Product::where('category_id', $category->id)->with('avg_rating_comment')->paginate(9);

        $xd = 0;

        return view('strore_search', compact('products', 'categories', 'category', 'xd'));
    }
    public function category_search_price($price_min, $price_max)
    {
        $categories = Category::where('status', 1)->take(5)->get();
        $products = Product::whereBetween('price', [$price_min, $price_max])->with('avg_rating_comment')->paginate(9);


        $xd = 1;
        return view('strore_search', compact('products', 'categories', 'xd', 'price_min', 'price_max'));
    }
}
