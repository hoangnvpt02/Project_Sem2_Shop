<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Comment_product;
use App\Models\Products_color;
use Illuminate\Support\Facades\DB;


class ProductClientController extends Controller
{
    public function indexProduct(Request $request)
    {
        $products = [];
        $products_colors = [];
        $products_relateds = [];
        $products_comments = [];
        $products_comments_star = [];

        $products = Product::query()
        ->where('slug', 'laptop-dell-vostro-3510')
        ->with('avg_rating_comment')
        ->with('products_images')
        ->with('products_color')
        ->select([
            'products.id',
            'products.category_id',
            'products.name',
            'products.price',
            'products.thumb',
            'products.description',
            'products.name',
        ])
        ->first();

        $products_comments = Comment_product::query()
        ->where('product_id', $products->id)
        ->with('users')
        ->paginate(3);
        $products_relateds = Product::query()
        ->where('category_id', $products->category_id)
        ->take(4)
        ->get();

        if ($products_comments->items() != null && !empty($products_comments->items())) {
            for ($i = 0; $i < count($products_comments->items()); $i++) {
                $products_comments_star[$i] = $products_comments->items()[$i]->star;
            }
            $products_comments_star = array_count_values($products_comments_star);
        }

        return view('product', [
            'products' => $products,
            'products_relateds' => $products_relateds,
            'products_comments' => $products_comments,
            'products_comments_star' => $products_comments_star,
            'products_colors' => $products_colors,
        ]);
    }

    public function commentProduct(Request $request) 
    {
        $Comment_product = new Comment_product();
        $Comment_product->content = $request->content;
        $Comment_product->star = $request->star;
        $Comment_product->user_id = Auth::id();
        $Comment_product->product_id = $request->product_id;
        $Comment_product->save();

        return response('', 200);
    }
}