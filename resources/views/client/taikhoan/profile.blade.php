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
                            <form action="" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="role" value="{{Auth::user()->vai_tro}}">
                                <input type="hidden" name="matkhau" value="{{Auth::user()->password}}">

                                <label for="" class="form-label">Tên đăng nhập:</label>
                                <input type="text" name="tendangnhap" value="{{Auth::user()->ten_dang_nhap}}">
                                <p style="color:red;"></p>

                                <label for="" class="form-label">Họ và tên:</label>
                                <input type="text" name="hovaten" value="{{Auth::user()->ho_va_ten}}">
                                <p style="color:red;"></p>

                                <label for="" class="form-label">Số điện thoại:</label>
                                <input type="text" name="sodienthoai" value="{{ isset(Auth::user()->so_dien_thoai) ? Auth::user()->so_dien_thoai : ''}}">
                                <p style="color:red;"></p>
                                <label for="" class="form-label">Email:</label>
                                <input type="text" value="{{Auth::user()->email}}">
                                <input type="hidden" name="email" value="{{Auth::user()->email}}">

                                <label for="" class="form-label">Địa chỉ:</label>
                                <input type="text" name="diachi" value="{{ isset(Auth::user()->dia_chi) ? Auth::user()->dia_chi : ''}}">
                                <p style="color:red;"></p>
                                
                                <div class="login-toggle-btn mb-5">
                                    <a href="?act=quenmatkhau">Quên mật khẩu?</a>
                                    <a href="?act=doimatkhau" style="margin-right:378px;">Đổi mật khẩu</a>
                                </div>
                                <div class="button-box btn-hover">
                                    <button type="submit" name="luu">Lưu</button>
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