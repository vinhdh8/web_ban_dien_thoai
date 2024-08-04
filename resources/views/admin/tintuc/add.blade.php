@extends('layout.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm tin mới</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">

        <form action="{{route('admin.tintuc.store')}}" method="post" enctype="multipart/form-data" class="form">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::User()->id}}">

            <div class="mb-3">
                <label for="tieude" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control @error('tieu_de') is-invalid @enderror " id="tieu_de" name="tieu_de" placeholder="Nhập tiêu đề..." value="{{old('tieu_de')}}">
                @error('tieu_de')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ảnh bìa:</label>
                <input type="file" name="hinh_anh" id="hinh_anh" class="form-control-file border  @error('hinh_anh') is-invalid @enderror ">
                @error('hinh_anh')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="noidung">Nội dung</label>
                <textarea class="form-control @error('noi_dung') is-invalid @enderror " rows="10" id="noi_dung" name="noi_dung" placeholder="Nhập nội dung..." ></textarea>
                @error('noi_dung')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit"  class="btn btn-success">Xác nhận</button>
                <a href="{{route('admin.tintuc.index')}}"><button type="button" class="btn btn-success">Quay lại</button></a>
            </div>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->
@endsection