@extends('layout.admin')
@section('content')
<div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách bình luận</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-secondary btn-sm" onclick="chontatca()">Chọn tất cả</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="bochontatca()">Bỏ chọn tất cả</button>
            <button type="submit" name="xoacacmucchon" class="btn btn-secondary btn-sm">Ẩn các mục đã chọn</button>
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
                            <th>Họ và Tên</th>
                            <th>Tài khoản</th>
                            <th>Sản phẩm</th>
                            <th>Nội dung</th>
                            <th>Ngày bình luận</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($binhluans as $binhluan)
                        <tr>
                            <td class="text-center align-middle"><input type="checkbox" name="select[]" value="{{ $binhluan->id }}"></td>
                            <td class="col-2 align-middle">{{ $binhluan->id }}</td>
                            <td class="col-1 align-middle">{{ $binhluan->user->ten_dang_nhap }}</td>
                            <td class="col-3 align-middle">{{ $binhluan->sanpham->ten_san_pham }}</td>
                            <td class="col-3 align-middle">{{ $binhluan->noi_dung }}</td>
                            <td class="col-2 align-middle">{{ $binhluan->created_at }}</td>
                            <td class="col-1 align-middle">
                                @if ($binhluan->trang_thai)
                                <a href="{{ route('admin.binhluan.toggleHide', $binhluan->id) }}">
                                    <button type="button" class="btn btn-secondary btn-sm">Ẩn</button>
                                </a>
                                @else
                                <a href="{{ route('admin.binhluan.toggleHide', $binhluan->id) }}">
                                    <button type="button" class="btn btn-success btn-sm">Hiện</button>
                                </a>
                                @endif
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