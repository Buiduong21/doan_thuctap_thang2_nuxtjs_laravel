@extends('master.homeAdmin')
@section('noidung')

<form action="{{ route('category.update', $category -> id ) }}" method="POST" role="form">
    <legend>Chỉnh sửa danh mục</legend>
    @csrf @method('PUT')
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" name="name" value="{{$category->name}}">
        @error('name')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Cập nhập</button>
</form>



@stop()