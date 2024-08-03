@extends('layout.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách người dùng</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-secondary btn-sm" onclick="">Chọn tất cả</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="">Bỏ chọn tất cả</button>
            <button type="submit" name="xoacacmucchon" class="btn btn-secondary btn-sm">Khóa các tài khoản đã chọn</button>
            <a href="{{route('admin.taikhoan.create')}}"><button type="button" class="btn btn-secondary btn-sm">Nhập thêm</button></a>
            <div class="float-right">
                <div class="input-group">
                    <input type="text" class="form-control" name="kyw" placeholder="Tìm kiếm...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="search">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>MTV</th>
                            <th>Họ và Tên</th>
                            <th>Tên đăng nhập</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Vai trò</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listTaiKhoan as $index => $item)
                        @if ($item->trang_thai==0)
                        @if ($item->vai_tro == 0)
                        @if ($item->vai_tro == 1)
                        @php
                        $item->vai_tro = "Quản trị viên"
                        @endphp
                        @else
                        @php
                        $item->vai_tro = "Thành viên"
                        @endphp
                        @endif
                        <tr>
                            <td class="align-middle text-center"><input type="checkbox" name="select[]" value=""></td>
                            <td class="col-1 align-middle">TV-{{ $index + 1 }}</td>
                            <td class="col-2 align-middle">{{ $item->ho_va_ten }}</td>
                            <td class="col-1 align-middle">{{ $item->ten_dang_nhap }}</td>
                            <td class="col-1 align-middle">{{ $item->email }}</td>
                            <td class="col-1 align-middle">{{ $item->so_dien_thoai }}</td>
                            <td class="col-2 align-middle">{{ $item->dia_chi }}</td>
                            <td>{{ $item->vai_tro }}</td>
                            <td class="col-2 align-middle">
                                <a href="{{route('admin.taikhoan.edit', $item->id)}}"><button type="button" class="btn btn-secondary btn-sm">Sửa</button></a> |
                                <a href="{{ route('admin.taikhoan.lock', $item->id) }}"><button type="button" class="btn btn-secondary btn-sm" onclick="return confirm('Bạn có muốn khóa tài khoản này không')">Khóa</button></a>
                            </td>
                        </tr>
                        @endif
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- <div class="phantrang">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div> -->
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection