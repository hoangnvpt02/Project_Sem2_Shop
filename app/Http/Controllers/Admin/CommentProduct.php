<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\models\Comment_product;
use Illuminate\Http\Request;

class CommentProduct extends Controller
{
    public function index() 
    {
        $comment_products = Comment_product::orderBy('id', 'desc')->with('users')->paginate(10);
        return view('admin.comment.index', [
            'comment_products' => $comment_products,
        ]);
    }

    public function show($id) 
    {
        $comment_products = Comment_product::find($id);
        if (empty($comment_products)) {
            return response()->json([
                'error' => true,
                'message' => 'Lỗi comment không tồn tại',
            ]);
        }
        return view('admin.comment.detail', [
            'comment_products' => $comment_products,
        ]);
    }

    public function delete($id) 
    {
        $comment_products = Comment_product::find($id);
        if (!empty($comment_products)) {
            $comment_products->delete();
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Lỗi comment không tồn tại',
            ]);
        }
        return redirect()->back();
    }
}
