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

<form action="{{ route('post.update',$post->id)}}" method="POST" role="form">
    <legend>Chỉnh sửa tin tức</legend>
    @csrf @method('PUT')
    <div class="form-group">
        <label for="">Tên tin tức</label>
        <input type="text" class="form-control" name="title" value="{{$post->title}}">
        @error('title')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">danh mục bài viết</label>
        <select class="form-control" name="category_id">
            <option selected disabled>-- chọn Danh Mục --</option>
            @foreach($categories as $category)
            <option {{$post->category_id == $category->id ? ' selected ' : ''}}value="{{ $category->id }}">
                {{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tag bài viết:</strong></br>
            <select class="form-control" name="tag[]" multiple>
                @foreach($tags as $tag)
                <option @foreach($post->tags as $item) {{ $item->pivot->tag_id == $tag->id ? 'selected' : '' }}
                    @endforeach
                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="">Mô tả cc</label>
        <textarea class="form-control" id="content" name="content" placeholder="Mô tả">{{$post->content}}</textarea>
        @error('content')
        <small class="help block">{{$message}}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhập</button>
</form>



@stop()