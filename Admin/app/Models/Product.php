<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'slug', 'category_id', 'image', 'code', 'desr', 'created_at', 'updated_at'];

    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

     public function tags()
    {
       return $this->belongsToMany(Tag::class, 'tag_products','id_product','id_tag');
    }

}