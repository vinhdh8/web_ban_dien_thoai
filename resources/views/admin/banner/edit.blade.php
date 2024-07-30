@extends('layout.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sửa Banner</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{route('admin.banner.update', $banner->id)}}" method="post" enctype="multipart/form-data" class="form">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="" class="form-label">Mã loại</label>
                    <input type="text" name="id" id="" class="form-control" value="{{$banner->id}}" disabled>
                </div>
                <div class="mb-3">
                    <label for="hinh_anh" class="form-label ">Tải ảnh lên</label>
                    <input type="file" name="hinh_anh" id="hinh_anh" class="form-control-file border @error('hinh_anh') is-invalid @enderror">
                    <img src="{{Storage::url($banner->hinh_anh)}}" alt="" style=" height:100px;" >
                    @error('hinh_anh')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="danh_muc_id">Id sản phẩm</label>
                    <select class="form-control @error('san_pham_id') is-invalid @enderror" id="sel1" name="san_pham_id">
                        <option selected>--Chọn id sản phẩm---</option>
                        @foreach($san_phams as $sanpham)
                        <option value="{{$sanpham->id}}" {{$banner->san_pham_id == $sanpham->id ? 'selected' : '' }}>{{$sanpham->id}}-{{$sanpham->ten_san_pham}}</option>
                        @endforeach
                    </select>
                    @error('san_pham_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ngay_dang" class="form-label">Ngày đăng</label>
                    <input type="date" name="ngay_dang" id="ngay_dang" class="form-control @error('ngay_dang') is-invalid @enderror" value="{{$banner->ngay_dang}}">
                    @error('ngay_dang')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                    <a href="{{ route('admin.banner.index')}}"><button type="button" class="btn btn-success">Quay lại</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection