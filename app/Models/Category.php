<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name','slug','created_by','updated_by','status'];

    public function banners() {
        return $this->HasMany(Banner::class, 'category_id', 'id');
    }
    public function products() {
        return $this->HasMany(Product::class, 'category_id', 'id');
    }
}
