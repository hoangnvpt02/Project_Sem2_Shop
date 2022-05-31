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
        return $this->belongsTo(Order_detail::class, 'product_id', 'id');
    }

    public function Products_color() {
        return $this->belongsTo(Order_detail::class, 'product_id', 'id');
    }

    public function products_images() {
        return $this->belongsTo(Products_image::class, 'product_id', 'id');
    }
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
