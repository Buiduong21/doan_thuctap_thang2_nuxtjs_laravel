@extends('master.homeUse')

@section('noidungsp')

    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Thông tin người đặt hàng</h4>
                <form action="{{ route('cart.posthoaDon') }}" method="post">
                    @csrf
                    <div class="row">
                        @if (auth()->guard('')->check())
                            <div class="col-lg-8 col-md-6">

                                <div class="checkout__input">
                                    <p>Tên</p>
                                    <input type="text" value="{{ auth()->guard('')->user()->name }}" name="customer_name">
                                </div>
                                <div class="checkout__input">
                                    <p>Email</p>
                                    <input type="email" value="{{ auth()->guard('')->user()->email }}"
                                        name="customer_email">
                                </div>
                                <div class="checkout__input">
                                    <p>Số điện thoại</p>
                                    <input type="number" name="customer_phone">
                                </div>
                                <div class="checkout__input">
                                    <p>Địa chỉ</p>
                                    <input type="text" name="customer_address">
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <strong>Chưa đăng nhập.....</strong> <a href="{{ route('use.login') }}">Click vào đây </a>để
                                đăng nhập
                            </div>
                        @endif
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                <?php $total = 0;
                                $total_quantity = 0; ?>

                                <div class="checkout__order__products">Products <span>Total</span></div>
                                @foreach ($carts as $item)
                                    <?php
                                    $total += $item->quantity * $item->price;
                                    $total_quantity += $item->quantity;
                                    ?>
                                    <ul>

                                        <li>{{ $item->name }}<span> {{ $item->quantity * $item->price }}₫</span></li>

                                    </ul>
                                @endforeach
                                <input type="hidden" name="total" value="{{ $total }}">
                                <div class="checkout__order__total">Total <span name="total">{{ $total }}</span>
                                </div>
                                <button type="submit" class="site-btn">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop()
