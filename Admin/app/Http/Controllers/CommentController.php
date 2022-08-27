<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Session;


class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $post_id)
    {
        $this->validate($request, [
            'name'=>'required|max:255',
            'email'=> 'required|email|max:255',
            'comment'=>'required|min:5|max:2000',
        ],
        [
            'name.required'=>'Tên không được để trống',
            'name.max'=>'Tên không được vượt quá 255 ký tự',
            'email.required'=>'Email không được để trống',
            'email.email'=>'Email không đúng định dạng',
            'email.max'=>'Email không vượt quá 255 ký tự',
            'comment.required'=>'Comment không được để trống',
            'comment.min'=>'Comment phải ít nhất 5 ký tự',
            'comment.max'=>'Comment không được vượt quá 2000 ký tự',
        ]);
      
        $post = Post::find($post_id);
        $commen = new Comment();
        $commen->name = $request->name;
        $commen->email = $request->email;
        $commen->comment = $request->comment;
        $commen->approved = true;
        $commen->post()->associate($post);
        $commen->save();
        Session::flash('successs', 'Thêm comment thành công');
        return redirect()->route('blog.getslug',[$post->slug]);
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
        $comment_edit = Comment::find($id);
        return view('admin.comments.edit', compact('comment_edit')); 
    }

    public function update(Request $request, $id)
    {
        $ccomment = Comment::find($id);
        $request->validate([
            'comment'=>'required'
        ],[
            'comment.required' => 'Nội dung bình luận không được để trống'
        ]);
        
        $ccomment->comment = $request->comment;
        $ccomment->save();
        Session::flash('successs', 'Sửa bình luận thành công');
        return redirect()->route('post.show', $ccomment->post->id);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment -> delete();
        Session::flash('successs', 'Xóa danh mục thành công');
        return redirect()->route('post.show', $post_id);
    }
}