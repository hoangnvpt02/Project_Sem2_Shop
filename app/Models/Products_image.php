<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_image extends Model
{
    use HasFactory;

    protected $table = 'products_images';

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
