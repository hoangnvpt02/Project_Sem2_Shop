<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['id', 'note', 'user_id', 'address','status'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function order_details() {
        return $this->hasMany(Order_detail::class, 'order_id', 'id');
    }
}
