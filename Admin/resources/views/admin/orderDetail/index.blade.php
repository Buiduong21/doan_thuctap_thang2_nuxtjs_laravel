@extends('master.homeAdmin')

@section('noidung')

    @if (Session::has('successs'))
        <div class="alert alert-success" role="alert">
            <strong>Thành công: </strong> {{ Session::get('successs') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Id đơn hàng</th>
                <th>Id sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng giá tiền từng sản phẩm</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetails as $orderDetail)
                <tr>
                    <td>{{ $orderDetail->id }}</td>
                    <td>{{ $orderDetail->order_id }}</td>
                    <td>{{ $orderDetail->product_id }}</td>
                    <td>{{ $orderDetail->price }}</td>
                    <td>{{ $orderDetail->quantity }}</td>
                    <td>{{ $orderDetail->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orderDetails->links() }}
@stop()
