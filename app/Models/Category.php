<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categorys';

    public function banners() {
        return $this->HasMany(Banner::class, 'category_id', 'id');
    }
}
