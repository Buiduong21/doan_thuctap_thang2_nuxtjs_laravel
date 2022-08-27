@extends('master.homeAdmin')
@section('noidung')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
tinymce.init({
    selector: '#content',
    plugins: [
        'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
        'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
        'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
        'alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
});
</script>
<form action="{{URL::to('admin/post')}}" method="POST" role="form">
    <legend>Thêm bài đăng sản phẩm</legend>
    @csrf
    <div class="form-group">
        <label for="">Tên bài đăng</label>
        <input type="text" class="form-control" name="title" placeholder="Input field">
        @error('title')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">danh mục bài viết</label>
        <select class="form-control" name="category_id">
            <option selected disabled>-- chọn Danh Mục --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">tag danh mục</label>
        <select name="tag[]" class="form-control" required="required" multiple>
            @foreach ($tags as $tag)
            <option value=" {{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Nội dung</label>

        <textarea class="form-control" id="content" name="content" placeholder="Mô tả">{{old('content')}}</textarea>
        @error('content')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Thêm mới bài đăng</button>
</form>
@stop()