<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::where('status',1)->take(5)->get();

        $products = [];
        $products_colors = [];
        $products_relateds = [];
        $products_comments = [];
        $products_comments_star = [];
        $categories = Category::take(5)->get();

        $products = Product::query()
        ->where('id', $request->id)
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

        if (!empty($products)) {
            $products_comments = Comment_product::query()
            ->leftJoin('users', 'users.id', 'comment_products.user_id')
            ->where('comment_products.product_id', $products->id)
            ->select([
                'comment_products.id',
                'comment_products.content',
                'comment_products.star',
                'comment_products.name as fullname',
                'comment_products.created_at',
                'users.id',
                'users.name',
                'users.email',
                'users.name',
            ])
            ->paginate(3);

            $products_relateds = Product::query()
            ->where([ ['id', '!=', $products->id], ['category_id', $products->category_id] ])
            ->take(4)
            ->get();

            if ($products_comments->items() != null && !empty($products_comments->items())) {
                for ($i = 0; $i < count($products_comments->items()); $i++) {
                    if ($products_comments->items()[$i]->star == 0 || $products_comments->items()[$i]->star == null) {
                        continue;
                    }
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
                'categories' => $categories,
            ]);
        }

        return redirect()->back();
    }

    public function commentProduct(Request $request) 
    {
        $comment_product = new Comment_product();
        $comment_product->content = $request->content;
        $comment_product->star = $request->star;
        if (Auth::check()) {
            $comment_product->user_id = 1;
        } else {
            $comment_product->name = $request->name;
            $comment_product->email = $request->email;
        }
        $comment_product->product_id = $request->product_id;
        $comment_product->save();
    }
}