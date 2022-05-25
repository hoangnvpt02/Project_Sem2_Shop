<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like_comment_product extends Model
{
    use HasFactory;

    protected $table = 'like_comment_products';

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
