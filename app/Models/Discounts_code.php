<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discounts_code extends Model
{
    use HasFactory;

    protected $table = 'discounts_codes';

    protected $fillable = ['code','price','start_time', 'end_time', 'product_id', 'created_by','updated_by','status'];

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
