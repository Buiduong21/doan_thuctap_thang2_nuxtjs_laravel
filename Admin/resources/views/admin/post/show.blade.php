@extends('master.homeAdmin')

@section('noidung')
<div class="row">
    <h1>Tên tin tức: {{$post->title}}</h1>
    <h4>Nội dung tin tức: {{$post->content}}</h4>
    <h4>Tên danh mục: {{$post->category->name}}</h4>
</div>
<div class="tags">
    @foreach($post->tags as $tag)
    <span class="btn btn-sm btn-primary">{{$tag->name}}</span>
    @endforeach
</div>


<div class="bankend_comment">
    <h3>Tổng có: <small>{{$post->comments()->count()}} bình luận</small></h3>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Tên</th>
            <th>Email</th>
            <th>Bình luận</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($post->comments as $pcm)
        <tr>
            <td>{{$pcm->name}}</td>
            <td>{{$pcm->email}}</td>

            <td>{{$pcm->comment}} 44444</td>
            <td class="text-right">
                <form action="{{route('comments.destroy', $pcm -> id)}}" method="POST" role="form">
                    @csrf @method('DELETE')
                    <a href="{{route('comments.edit', $pcm -> id)}}" class="btn btn-sm btn-primary"><i
                            class="fa fa-edit"></i>Sửa</a>
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i
                            class="fa fa-trash"></i> Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop()