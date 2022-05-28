<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $fillable = ['title','price','start_time', 'end_time', 'created_by','updated_by','status'];

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
