<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
