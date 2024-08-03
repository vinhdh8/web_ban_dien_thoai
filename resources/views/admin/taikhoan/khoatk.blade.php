    @extends('layout.admin')
    @section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách tài khoản đã bị khóa</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
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
                                    <th>MTK</th>
                                    <th>Họ và Tên</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Vai trò</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listTaiKhoan as $index => $item)
                                @if ($item->vai_tro == 1)
                                        @php
                                            $item->vai_tro = "Quản trị viên";
                                        @endphp
                                    @else
                                        @php
                                            $item->vai_tro = "Thành viên";
                                        @endphp
                                    @endif
                                <tr>
                                    <td class="align-middle text-center"><input type="checkbox" name="select[]" value=""></td>
                                    <td class="col-1 align-middle">KTV-{{ $item->id }}</td>
                                    <td class="col-2 align-middle">{{ $item->ho_va_ten }}</td>
                                    <td class="col-1 align-middle">{{ $item->ten_dang_nhap }}</td>
                                    <td class="col-1 align-middle">{{ $item->email }}</td>
                                    <td class="col-1 align-middle">{{ $item->so_dien_thoai }}</td>
                                    <td class="col-2 align-middle">{{ $item->dia_chi }}</td>
                                    <td>{{ $item->vai_tro }}</td>
                                    <td class="col-1 align-middle">
                                        <form action="{{route('admin.taikhoan.openTK', $item->id)}}"  method="POST" onclick="return confirm('Bạn có muốn mở lại tài khoản không')">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary btn-sm">Mở khóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    @endsection