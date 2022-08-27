<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name','created_at','updated_at'];

     // join 3 bảng tag-post_tab-post 
    public function posts()
    {
       return $this->belongsToMany(Post::class, 'post_tag','tag_id','post_id');
    }

      // join 3 bảng tag-post_tab-post 
    public function products()
    {
       return $this->belongsToMany(Product::class, 'tag_products','id_tag','id_product');
    }
}