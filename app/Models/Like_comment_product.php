<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like_comment_product extends Model
{
    use HasFactory;

    protected $table = 'like_comment_products';

    protected $fillable = ['comment_product_id','user_id'];

    public function comment_products() {
        return $this->hasMany(Comment_product::class, 'comment_product_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
