@extends('master.homeAdmin')
@section('noidung')

<form action="{{ route('comments.update', $comment_edit -> id ) }}" method="POST" role="form">
    <legend>Chỉnh sửa tin tức</legend>
    @csrf @method('PUT')
    <div class="form-group">
        <label for="">Tên người comment</label>
        <input type="text" class="form-control" name="name" value="{{$comment_edit->name}}">
        @error('name')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Email người comment</label>
        <input type="text" class="form-control" name="name" value="{{$comment_edit->email}}">
        @error('email')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Nội dung bình luận</label>
        <textarea class="form-control" id="content" name="comment"
            placeholder="Mô tả">{{$comment_edit->comment}}</textarea>
        @error('comment')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhập</button>
</form>



@stop()