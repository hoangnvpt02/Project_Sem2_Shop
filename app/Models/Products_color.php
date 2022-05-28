<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_color extends Model
{
    use HasFactory;

    protected $table = 'products_colors';

    protected $fillable = ['name','color', 'products_id'];

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
