<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = ['image','category_id','created_by','updated_by','status'];

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function urlImage(){
        return '/image/post/'.$this->image;
   }
}
