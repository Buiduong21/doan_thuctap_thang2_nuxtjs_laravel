@extends('master.homeAdmin')
@section('noidung')

<form action="{{URL::to('admin/tag')}}" method="POST" role="form">
    <legend>Thêm bài đăng sản phẩm</legend>
    @csrf
    <div class="form-group">
        <label for="">Tên tag</label>
        <input type="text" class="form-control" name="name">
        @error('name')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới tag</button>
</form>
@stop()