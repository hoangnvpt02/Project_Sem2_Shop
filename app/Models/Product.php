<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name','slug', 'price', 'thumb','description', 'category_id', 'created_by','updated_by','status'];

    public function discounts() {
        return $this->hasMany(Discount::class, 'product_id', 'id');
    }

    public function discounts_codes() {
        return $this->hasMany(Discounts_code::class, 'product_id', 'id');
    }

    public function product_details() {
        return $this->hasMany(Product_detail::class, 'product_id', 'id');
    }

    public function order_details() {
        return $this->hasMany(Order_detail::class, 'product_id', 'id');
    }

    public function products_color() {
        return $this->hasMany(Products_color::class, 'product_id', 'id');
    }

    public function comment_products() {
        return $this->hasMany(Comment_product::class, 'product_id', 'id');
    }

    public function products_images() {
        return $this->hasMany(Products_image::class, 'product_id', 'id');
    }
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function avg_rating_comment()
    {
        return $this->comment_products()
        ->selectRaw('avg(star) as average_star, product_id')
        ->groupBy('product_id');
    }

}
