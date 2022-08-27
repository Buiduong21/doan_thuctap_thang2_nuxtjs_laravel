@extends('master.homeAdmin')

@section('noidung')

<div class="row">
    <h1>Tên tin tức: {{$post->title}}</h1>
    <h4>Nội dung tin tức: {!!$post->content!!}</h4>
    <h4>Tên danh mục: {{$post->category->name}}</h4>
</div>

<div class="row mb-5">
    <div class="col-md-8">
        @foreach($post->comments as $com)
        <p><strong>name: </strong>{{$com->name}}</p>
        <p><strong>comment: </strong>{{$com->comment}}</p>
        @endforeach
    </div>
</div>

<form action="{{route('comments.store',$post->id)}}" method="POST" role="form">
    @csrf
    <h2>Mời bạn thêm bình luận của mình</h2>
    <div class="form-group">
        <label for="">Tên</label>
        <input type="text" class="form-control" name="name">
        @error('name')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email">
        @error('email')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Nội dung comment</label>
        <input type="text" class="form-control" name="comment">
        @error('comment')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Thêm comment</button>
</form>
@stop()