<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infomation_user extends Model
{
    use HasFactory;

    protected $table = 'infomation_users';

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
