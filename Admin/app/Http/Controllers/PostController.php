<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Str;
use Session;
use Purifier;

class PostController extends Controller
{
    public function index (Request $request) {
        $data = Post::orderBy('id','desc')->paginate(5);
        return view('admin.post.index', compact('data'));    
    }

    public function create()
    {   
        $tags = Tag::all();
        $categories = Category::all(); // all 0ể okelay tat dulieul
        return view('admin.post.create',compact('categories','tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts',
            'content'=>'required',
            'category_id' => 'required' 
        ],[
            'title.required'=> 'Tên bài viết không được để trống',
            'title.unique'=> 'Tên bài viết đã được sử dụng',
            'content.required'=> 'Nội dung bài viết không được để trống',
            'category_id.required'=> 'Danh mục bài viết không được để trống' 
        ]);
        $post = new Post;
        $post->title = $request->title ;
        $post->content = Purifier::clean($request->content);
        $post->slug= Str::slug($request->title);
        $post->category_id = $request->category_id;
        $post->save();
        $tags = $request->input('tag');
        $post->tags()->sync($tags);
        Session::flash('successs', 'Thêm danh mục thành công');
        return redirect('admin/post');
    }
    
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show', compact('post'));
    }

    public function edit ($id) {
        $post = Post::find($id);
        $tags = Tag::all();
        $categories = Category::all(); 
        return view('admin.post.edit', compact('post','categories','tags')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content'=>'required',
            'category_id' => 'required' 
        ],[
            'title.required'=> 'Tên bài viết không được để trống',
            'content.required'=> 'Nội dung bài viết không được để trống',
            'category_id.required'=> 'Danh mục bài viết không được để trống' 
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = Purifier::clean($request->content);;
        $post->slug = Str::slug($request->name);
        $post->category_id = $request->category_id;
        $post->save();
        $tags = $request->input('tag');
        $post->tags()->sync($tags);
        Session::flash('successs', 'Sửa tin tức thành công');
        return redirect('admin/post');
    }

    public function destroy (Post $post) {
        $post ->tags()->detach();
        $post -> delete();
        Session::flash('successs', 'Xóa tin tức thành công');
        return redirect('admin/post');
    } 
}