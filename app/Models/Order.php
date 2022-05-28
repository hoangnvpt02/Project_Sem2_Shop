<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = ['note','delivery_time', 'product_id','user_id', 'infomation_user_id','status'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
