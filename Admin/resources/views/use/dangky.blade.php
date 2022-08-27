@extends('master.homeUse')

@section('noidungdk')

<section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Đăng ký tài khoản
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container contact-form">
            <form method="post" action="{{route('use.formdangky')}}">
              @csrf
              <div>
                <label for="contact">Họ và tên</label>
                <input type="text" name="name" placeholder="Your Name" />
                @error('name')
                <small class="help block">{{$message}}</small>
                @enderror
              </div>
              <div>
                <label for="contact">Email</label>
                <input type="email" name="email" placeholder="Email" />
                @error('email')
                <small class="help block">{{$message}}</small>
                @enderror
              </div>
               <div>
                <label for="contact">Mật khẩu</label>
                <input type="password" name="password" >
                @error('password')
                <small class="help block">{{$message}}</small>
                @enderror
              </div>
               <div>
                <label for="contact">Xác nhận mật khẩu</label>
                <input type="password" name="confirm_password" >
                @error('confirm_password')
                <small class="help block">{{$message}}</small>
                @enderror
              </div>
              
              <div class="btn_box">
                <button>
                  Đăng ký
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@stop
