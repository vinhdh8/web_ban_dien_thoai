@extends('layout.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm mới tài khoản</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{route('admin.taikhoan.store')}}" method="post" class="form">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="hovaten" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control @error('ho_va_ten') is-invalid @enderror" id="ho_va_ten" name="ho_va_ten" placeholder="Nhập họ và tên..." value="{{old('ho_va_ten')}}">
                        @error('ho_va_ten')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control @error('ten_dang_nhap') is-invalid @enderror" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập..." value="{{old('ten_dang_nhap')}}">
                        @error('ten_dang_nhap')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="matkhau" class="form-label">Mật Khẩu</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="VD: Example123!..." value="{{old('password')}}">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="VD: example@gmail.com..." value="{{old('email')}}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sodienthoai" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control @error('so_dien_thoai') is-invalid @enderror" id="so_dien_thoai" name="so_dien_thoai" placeholder="Nhập số điện thoại..." value="{{old('so_dien_thoai')}}">
                        @error('so_dien_thoai')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="diachi" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control @error('dia_chi') is-invalid @enderror" id="dia_chi" name="dia_chi" placeholder="Nhập địa chỉ..." value="{{old('dia_chi')}}">
                        @error('dia_chi')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="sel1">Vai Trò</label>
                        <select class="form-control @error('vai_tro') is-invalid @enderror" id="sel1" name="vai_tro" >
                            <option selected>--Chọn vai trò--</option>
                            <option value="0">Thành viên</option>
                            <option value="1">Quản trị viên</option>
                        </select>
                        @error('vai_tro')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection