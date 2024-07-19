@extends('layout.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm mới sản phẩm</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('sanpham.store')}}" method="post" enctype="multipart/form-data" class="form">
        @csrf

            <div class="mb-3">
                <label for="tensp" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" placeholder="Nhập tên sản phẩm..." value="">
            </div>
            <div class="mb-3">
                <label for="gia" class="form-label">Giá</label>
                <input type="number" class="form-control" id="gia" name="gia" placeholder="Nhập giá..." value="">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Tải ảnh lên:</label>
                <input type="file" name="hinh_anh" id="hinh_anh" class="form-control-file border">
            </div>
            <div class="mb-3">
                <label for="soluong" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="so_luong" name="so_luong" placeholder="Nhập số lượng..." value="">
            </div>
            <div class="mb-3">
                <label for="mota">Mô tả</label>
                <textarea class="form-control" rows="5" id="mo_ta" name="mo_ta" placeholder="Nhập mô tả..."></textarea>
            </div>
            <div class="mb-3">
                <label for="sel1">Danh mục</label>
                <select class="form-control" id="sel1" name="danhmuc">
                    @foreach($danh_mucs as $danhmuc){
                        <option value="{{$danhmuc->id}}">{{$danhmuc->ten_danh_muc}}</option>
                    }
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                <a href="{{ route('sanpham.index')}}"><button type="button" class="btn btn-success">Quay lại</button></a>
            </div>
        </form>
    </div>
</div>
</div>
<!-- /.container-fluid -->
@endsection