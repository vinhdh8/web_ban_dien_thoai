@extends('layout.client')
  
@section('content')
<div class="login-register-area pb-100 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 offset-lg-2">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a data-bs-toggle="tab" class="active" href="#lg2">
                            <h4> Đổi mật khẩu </h4>
                        </a>
                    </div>
                    <div id="lg2" class="tab-pane">
                        <div class="login-form-container">
                            <div class="login-register-form">
                                <form action="{{ route('reset.password.post') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="mb-3">
                                        <label for="email_address" class="form-label">Nhập địa chỉ E-mail</label>
                                        <input type="text" id="email_address" class="form-control" name="email" value="{{old('email')}}" autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <input type="password" id="password" class="form-control" name="password" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">Nhập lại mật khẩu</label>
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" autofocus>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                        @if ($errors->has('password'))
                                          <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="button-box btn-hover mt-3">
                                        <button type="submit" name="">Đổi mật khẩu</button>
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