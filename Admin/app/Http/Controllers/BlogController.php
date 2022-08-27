<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function getslug($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('admin.blog.getslug', compact('post'));
    }
}