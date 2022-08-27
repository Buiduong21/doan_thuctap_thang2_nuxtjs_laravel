@extends('master.homeAdmin')
@section('noidung')

    @if (Session::has('successs'))
        <div class="alert alert-success" role="alert">
            <strong>Thành công: </strong> {{ Session::get('successs') }}
        </div>
    @endif

    <form action="" method="Get" class="form-inline" role="form">
        <div class="form-group mr-1">
            <input class="form-control" name="key" id="" placeholder="Input key">
        </div>
        <button type="submit" class="btn btn-primary mr-1"><i class="fa fa-search"></i></button>
        <a href="{{ route('product.create') }}" class="btn btn-primary">Thêm mới<i class="fa fa-plus"> </i></a>
    </form>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Thẻ tag</th>
                <th>Ảnh</th>
                <th>Mô tả</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $model)
                <tr>
                    <td>{{ $model->id }}</td>
                    <td>{{ $model->cat->name }}</td>
                    <td>{{ $model->name }}</td>
                    <td>{{ $model->price }}</td>

                    <td>
                        @foreach ($model->tags as $tag)
                            {{ $tag->name }}<br>
                        @endforeach
                    </td>

                    <td><img src="{{ URL::to('/upload/' . $model->image) }}" alt="" width="45"></td>
                    <td width:50px>{{ Str::words(strip_tags($model->desr), 10) }}</td>


                    <td class="text-right">
                    <td class="text-right">
                        <form action="{{ route('product.destroy', $model->id) }}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <a href="{{ route('product.edit', $model->id) }}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-edit"></i>Sửa</a>
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i
                                    class="fa fa-trash"></i> Xóa</button>
                        </form>
                    </td>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $data->links() }}

@stop()
