@extends('master.homeUse')
@section('title', 'Giỏ hàng')

@section('noidungsp')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if (session('fail'))
        <div class="alert alert-danger">
            {{ session()->get('fail') }}
        </div>
    @endif
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Hồ sơ</h4>
                <form action="{{ route('changePasswordForm',auth()->guard('')->user()->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Current Password</label>
                            <div class="form-group pass_show">
                                <input type="password" value="" name="password" class="form-control"
                                    placeholder="Current Password">
                                @error('password')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <label>New Password</label>
                            <div class="form-group pass_show">
                                <input type="password" value="" name="new_password" class="form-control"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <label>Confirm Password</label>
                            <div class="form-group pass_show">
                                <input type="password" value="" name="re_password" class="form-control"
                                    placeholder="Confirm Password">
                                @error('re_password')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </section>
@stop()
