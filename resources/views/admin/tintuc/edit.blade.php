@extends('layout.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật tin tức</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('admin.tintuc.update',$tinTuc->id)}}" method="post" enctype="multipart/form-data" class="form">
            @csrf 
            @method('PUT')
            <input type="hidden" name="id" value="{{Auth::User()->id}}">
            <div class="mb-3">
                <label for="tieu_de" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="tieu_de" name="tieu_de" placeholder="Nhập tiêu đề..." value="{{$tinTuc->tieu_de}}">
            </div>
            <div class="mb-3">
                <label for="hinh_anh" class="form-label">Ảnh bìa:</label>
                <input type="file" name="hinh_anh" id="hinh_anh" class="form-control-file border">
                <img src="{{Storage::url($tinTuc->hinh_anh)}}" alt="" height="100px">
            </div>
            <div class="mb-3">
                <label for="noidung">Nội dung</label>
                <textarea class="form-control" rows="10" id="noi_dung" name="noi_dung" placeholder="Nhập nội dung...">{{$tinTuc->noi_dung}}</textarea>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                <a href="{{route('admin.tintuc.index')}}"><button type="button" class="btn btn-success">Quay lại</button></a>

            </div>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->
@endsection