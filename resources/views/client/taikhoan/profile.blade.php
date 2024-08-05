@extends('layout.client')
@section('content')
<div class="login-register-area pb-100 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 offset-lg-2">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> Thông tin tài khoản </h4>
                        </a>
                    </div>
                    <div class="login-form-container">
                        <div class="login-register-form">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <form action="" method="post">
                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="role" value="{{Auth::user()->vai_tro}}">
                                <input type="hidden" name="matkhau" value="{{Auth::user()->password}}">

                                <label for="" class="form-label">Tên đăng nhập:</label>
                                <input type="text" name="tendangnhap" value="{{Auth::user()->ten_dang_nhap}}" disabled>
                                <p style="color:red;"></p>

                                <label for="" class="form-label">Họ và tên:</label>
                                <input type="text" name="hovaten" value="{{Auth::user()->ho_va_ten}}" disabled>
                                <p style="color:red;"></p>

                                <label for="" class="form-label">Số điện thoại:</label>
                                <input type="text" name="sodienthoai" value="{{ isset(Auth::user()->so_dien_thoai) ? Auth::user()->so_dien_thoai : ''}}" disabled>
                                <p style="color:red;"></p>
                                <label for="" class="form-label">Email:</label>
                                <input type="text" value="{{Auth::user()->email}}" disabled>
                                <div class="login-toggle-btn mb-5">
                                    <a href="{{route('forget.password.get')}}">Đổi mật khẩu?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection