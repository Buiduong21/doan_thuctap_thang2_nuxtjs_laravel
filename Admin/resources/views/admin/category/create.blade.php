@extends('master.homeAdmin')
@section('noidung')

<form action="{{URL::to('admin/category')}}" method="POST" role="form">
    <legend>Thêm mới sản phẩm</legend>
    @csrf
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" name="name" placeholder="Input field">
        @error('name')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
</form>
@stop()