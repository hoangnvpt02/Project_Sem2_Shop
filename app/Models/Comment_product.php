<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_product extends Model
{
    use HasFactory;

    protected $table = 'comment_products';

    protected $fillable = ['content', 'like', 'comment_and_reply','user_id', 'product_id'];

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
