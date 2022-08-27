@extends('master.homeAdmin')

@section('noidung')

    @if (Session::has('successs'))
        <div class="alert alert-success" role="alert">
            <strong>Thành công: </strong> {{ Session::get('successs') }}
        </div>
    @endif

    <form action="" method="Get" class="form-inline mb-3" role="form">
        <div class="form-group mr-2">
            <input class="form-control" name="key" id="" placeholder="Nhập nội dung tìm kiếm">
        </div>
        <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-search">Tìm kiếm</i></button>
        <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm mới<i class="fa fa-plus"> </i></a>
    </form>

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
            @foreach ($data as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</a> </td>
                    <td>{{ date('M j, Y h:ia', strtotime($category->created_at)) }}</td>
                    <td>{{ date('M j, Y h:ia', strtotime($category->updated_at)) }}</td>
                    <td class="text-right">
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-edit"></i>Sửa</a>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i
                                    class="fa fa-trash"></i> Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->appends(request()->all())->links() }}
@stop()
