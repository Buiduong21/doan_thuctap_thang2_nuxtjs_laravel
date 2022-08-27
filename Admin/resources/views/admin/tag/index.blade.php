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
            <th>Tên danh mục</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
            <td>{{ date('M j, Y h:ia', strtotime($tag->created_at)) }}</td>
            <td>{{ date('M j, Y h:ia', strtotime($tag->updated_at)) }}</td>
            <td class="text-right">
                <form action="{{route('tag.destroy', $tag -> id)}}" method="POST" role="form">
                    @csrf @method('DELETE')
                    <a href="{{route('tag.edit', $tag -> id)}}" class="btn btn-sm btn-primary"><i
                            class="fa fa-edit"></i>Sửa</a>
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