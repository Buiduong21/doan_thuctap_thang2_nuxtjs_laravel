<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Session;

class TagController extends Controller
{
    public function index (Request $request) {
        $data = Tag::paginate(5);
        return view('admin.tag.index', compact('data'));    
    }

     public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags'
        ],[
            'name.required'=> 'Tên tag không được để trống',
            'name.unique'=> 'Tên tag đã được sử dụng',
        ]);
        $tag = new Tag;
        $tag->name = $request->name ;
        $tag->save();
        Session::flash('successs', 'Thêm tag thành công');
        return redirect('admin/tag');
    }
    
    public function edit ($id) {
        $tag = Tag::find($id);
        return view('admin.tag.edit', compact('tag')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:tags'
        ],[
            'name.required'=> 'Tên tag không được để trống',
            'name.unique'=> 'Tên tag đã được sử dụng',
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        Session::flash('successs', 'Sửa tag thành công');
        return redirect('admin/tag');
    }

    public function destroy (Tag $tag) {
        $tag -> delete();
        Session::flash('successs', 'Xóa tin tức thành công');
        return redirect('admin/tag');
    } 
}