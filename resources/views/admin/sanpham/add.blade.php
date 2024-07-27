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
        <form action="{{route('admin.sanpham.store')}}" method="post" enctype="multipart/form-data" class="form">
        @csrf

            <div class="mb-3">
                <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control @error('ten_san_pham') is-invalid @enderror " id="ten_san_pham" name="ten_san_pham" placeholder="Nhập tên sản phẩm..." value="{{old('ten_san_pham')}}">
                @error('ten_san_pham')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gia" class="form-label ">Giá</label>
                <input type="number" class="form-control @error('gia') is-invalid @enderror" id="gia" name="gia" placeholder="Nhập giá..." value="{{old('gia')}}">
                @error('gia')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gia_khuyen_mai" class="form-label ">Giá khuyến mãi</label>
                <input type="number" class="form-control @error('gia_khuyen_mai') is-invalid @enderror" id="gia_khuyen_mai" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi..." value="{{old('gia_khuyen_mai')}}">
                @error('gia_khuyen_mai')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="hinh_anh" class="form-label ">Tải ảnh lên:</label>
                <input type="file" name="hinh_anh" id="hinh_anh" class="form-control-file border @error('hinh_anh') is-invalid @enderror">
                @error('hinh_anh')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="so_luong" class="form-label">Số lượng</label>
                <input type="number" class="form-control @error('so_luong') is-invalid @enderror" id="so_luong" name="so_luong" placeholder="Nhập số lượng..." value="{{old('so_luong')}}">
                @error('so_luong')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="mo_ta">Mô tả</label>
                <textarea class="form-control @error('mo_ta') is-invalid @enderror" rows="5" id="mo_ta" name="mo_ta" placeholder="Nhập mô tả..." ></textarea>
                @error('mo_ta')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="danh_muc_id">Danh mục</label>
                <select class="form-control @error('danh_muc_id') is-invalid @enderror" id="sel1" name="danh_muc_id">
                <option selected>--Chọn danh mục---</option>
                    @foreach($danh_mucs as $danhmuc)
                        <option value="{{$danhmuc->id}}" {{ old('danh_muc_id') == $danhmuc->id ?'selected': '' }}> {{$danhmuc->ten_danh_muc}} </option>
                    @endforeach
                </select>
                @error('danh_muc_id')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                <a href="{{ route('admin.sanpham.index')}}"><button type="button" class="btn btn-success">Quay lại</button></a>
            </div>
        </form>
    </div>
</div>
</div>
<!-- /.container-fluid -->
@endsection