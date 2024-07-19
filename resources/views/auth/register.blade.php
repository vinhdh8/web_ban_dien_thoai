@extends('layout.client')
@section('content')
@if ( Session::has('errorRegister') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('errorRegister') }}</strong>
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
                        <a data-bs-toggle="tab" class="active" href="#lg2">
                            <h4> Đăng ký </h4>
                        </a>
                    </div>
                    <div id="lg2" class="tab-pane">
                        <div class="login-form-container">
                            <div class="login-register-form">
                                <form action="{{ route('register') }}" method="post">
                                    @csrf
                                    <label class="form-label" for="">Họ và Tên</label>
                                    <input type="text" name="ho_va_ten" placeholder="" value="{{old('ho_va_ten')}}">
                                    <label class="form-label" for="">Tên đăng nhập</label>
                                    <input type="text" name="ten_dang_nhap" placeholder="" value="{{old('ten_dang_nhap')}}">
                                    <label class="form-label" for="">Mật khẩu</label>
                                    <input type="password" name="password" placeholder="" value="">
                                    <label class="form-label" for="">Email</label>
                                    <input name="email" placeholder="" type="text" value="{{old('email')}}">
                                    
                                    <span>Bạn đã có tài khoản? <a href="{{route('login')}}" style="color:red;">Đăng nhập ngay</a></span>
                                    <div class="button-box btn-hover mt-3">
                                        <button type="submit" name="">Đăng ký</button>
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