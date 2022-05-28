<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = ['quantity','price', 'product_id','infomation_user_id', 'discounts_code_id','status'];

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
