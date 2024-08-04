@extends('layout.client')
@section('content')
@if ( Session::has('registerSuccess') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('registerSuccess') }}</strong>
	</div>
@endif
@if ( Session::has('loginSuccess') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('loginSuccess') }}</strong>
	</div>
@endif
@if ( Session::has('loginError') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('loginError') }}</strong>
	</div>
@endif
@if ($errors->any())
	<div class="alert alert-danger alert-dismissible" role="alert">
		<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
	</div>
@endif
<div class="login-register-area pb-100 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 offset-lg-2">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> Đăng nhập </h4>
                        </a>
                    </div>
                    <div id="lg1" class="tab-pane active">
                        <div class="login-form-container">
                            <div class="login-register-form">
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <label class="form-label" for="">Tên đăng nhập</label>
                                    <input type="text" name="ten_dang_nhap" placeholder="" value="{{old('ten_dang_nhap')}}" autocomplete="ten_dang_nhap">
                                    <label class="form-label" for="">Mật khẩu</label>
                                    <input type="password" name="password" placeholder="" value="{{old('password')}}">
                                    <div class="login-toggle-btn">
                                        <a href="">Quên mật khẩu?</a>
                                    </div>
                                    <div class="button-box btn-hover">
                                        <button type="submit" name="dangnhap">Đăng nhập</button>
                                    </div>
                                    <div class="mt-4">
                                        <span>Bạn chưa có tài khoản? <a href="{{route('register')}}" style="color:red;">Đăng kí ngay</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection