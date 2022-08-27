@extends('master.homeAdmin')
@section('noidung')

<form action="{{ route('tag.update', $tag -> id ) }}" method="POST" role="form">
    <legend>Chỉnh sửa tin tức</legend>
    @csrf @method('PUT')
    <div class="form-group">
        <label for="">Tên tags</label>
        <input type="text" class="form-control" name="name" value="{{$tag->name}}">
        @error('name')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhập</button>
</form>



@stop()