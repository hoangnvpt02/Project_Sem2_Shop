<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class SearchControllerClient extends Controller
{
    public function search($text){
        $product = Product::where('name', 'like', '%' . $text . '%')->get();
        return $product;
        
    }
}
