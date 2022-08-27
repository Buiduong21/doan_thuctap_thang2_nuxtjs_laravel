@extends('master.homeUse')

@section('noidungsp')

    <section class="checkout spad">
        <div class="container">
            <div class="demo5" style="display: flex; justify-content:space-between">
                <h4>Hồ sơ</h4>
                <a href="{{ route('changePasswordPage') }}" class="btn btn-primary">Thay đổi mật khẩu</a>
            </div>
            <div class="checkout__form">
                <form action="{{ route('use.postProfile',auth()->guard('')->user()->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @if (auth()->guard('')->check())
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout__input">
                                    <p>Tên</p>
                                    <input type="text" value="{{ $user->name }}" name="name">
                                </div>
                                <div class="checkout__input">
                                    <p>Email</p>
                                    <input type="email" value="{{ $user->email }}" name="email">
                                </div>
                                <div class=""style="display: flex; margin-bottom: 20px;">
                                    <div class="demo1" style="margin-right: 60px ;">
                                        <input style="padding-right: 20px" type="radio"
                                            {{ $user->gender == 0 ? 'checked' : '' }} name="gender" value="0"
                                            checked="checked"> Nam
                                    </div>
                                    <div class="demo2">
                                        <input type="radio" {{ $user->gender == 1 ? 'checked' : '' }} name="gender"
                                            value="1" checked="checked"> Nữ
                                    </div>


                                </div>
                                <div class=" form-group">
                                    <label for="">Ảnh</label>
                                    <input type="file" class="form-control" name="avatar_url">
                                    <img src="{{ URL::to('upload/' . $user->avatar_url) }}" alt="">

                                </div>
                                <div class="checkout__input">
                                    <p>Học vấn</p>
                                    <input type="text" name="education" value="{{ $user->education }}">
                                </div>
                                <div class="checkout__input">
                                    <p>Địa chỉ</p>
                                    <input type="text" name="location" value="{{ $user->location }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout__input">
                                    <p>Kỹ năng</p>
                                    <input type="text" name="skills" value="{{ $user->skills }}">
                                </div>
                                <div class="checkout__input">
                                    <p>Ghi chú</p>
                                    <input type="text" name="notes" value="{{ $user->notes }}">
                                </div>
                                <div class="checkout__input">
                                    <p>Sinh nhật</p>
                                    <input type="date" name="birthday" value="{{ $user->birthday }}">
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Chưa đăng nhập.....</strong> <a href="{{ route('use.login') }}">Click vào đây
                            </a>để
                            đăng nhập
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary btn-block">Lưu lại hồ sơ</button>
                </form>
            </div>
        </div>
    </section>
@stop()
