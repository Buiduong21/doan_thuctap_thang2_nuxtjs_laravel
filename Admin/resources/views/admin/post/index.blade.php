@extends('master.homeAdmin')

@section('noidung')

@if (Session::has('successs'))
<div class="alert alert-success" role="alert">
    <strong>Thành công: </strong> {{Session::get('successs')}}
</div>
@endif

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Slug tin tức</th>
            <th>Tên danh mục</th>
            <th>Thẻ tag</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $post)
        <tr>
            <td>{{$loop->iteration}}</td>
            <!-- <td>{{$post->title}}</td> -->
            <td><a href="{{route('blog.getslug', $post->slug)}}">{{$post->title}}</a> </td>
            <td>{{$post->category->name}}</td>
            <td>
                @foreach ($post->tags as $item)
                {{$item->name}}<br>
                @endforeach
            </td>
            <!-- <td>{!!$post->content!!}</td> -->
            <td width:50px>{{Str::words(strip_tags($post->content), 1)}}</td>
            <td>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
            <td>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</td>
            <td class="text-right">
                <form action="{{route('post.destroy', $post -> id)}}" method="POST" role="form">
                    @csrf @method('DELETE')
                    <a href="{{route('post.edit', $post -> id)}}" class="btn btn-sm btn-primary"><i
                            class="fa fa-edit"></i>Sửa</a>
                    <a href="{{route('post.show', $post -> id)}}" class="btn btn-sm btn-primary"><i
                            class="fa fa-edit"></i>Chi tiết</a>
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i
                            class="fa fa-trash"></i> Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$data->links()}}
@stop()