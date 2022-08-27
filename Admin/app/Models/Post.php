<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'slug','created_at','updated_at','category_id'];

    public function category(){
        return $this->belongsto(Category::class);
    }
    public function tags()
    {
       return $this->belongsToMany(Tag::class, 'post_tag','post_id','tag_id');
    }

    public function comments()
    {
       return $this->hasMany(Comment::class);
    }
}