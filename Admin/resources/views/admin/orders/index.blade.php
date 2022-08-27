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
        <button type="submit" class="btn btn-primary"><i class="fa fa-search">Tìm kiếm</i></button>
    </form>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã vận đơn</th>
                <th>Tên KH</th>
                <th>Địa chỉ</th>
                <th>Email KH</th>
                <th>Số điện thoại KH</th>
                <th>Ngày mua hàng</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_address }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>{{ $order->customer_phone }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->total }}
                    <td>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" role="form">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có muốn xóa không?')"><i
                                    class="fa fa-trash"></i> Xóa</button>
                        </form>
                    </td>
                    {{-- <td><a class="btn btn-primary" href="">Xóa</a></td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->appends(request()->all())->links() }}
@stop()
