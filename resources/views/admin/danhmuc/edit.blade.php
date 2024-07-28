@extends('layout.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('admin.danhmuc.update', $danhmuc->id)}}" method="post" class="form">
        @csrf
        @method('PUT')

            <input type="hidden" name="id" value="{{$danhmuc->id}}">
            <div class="mb-3">
                <label for="" class="form-label">Mã loại</label>
                <input type="text" name="id" id="" class="form-control" value="{{$danhmuc->id}}" disabled>
            </div>
            <div class="mb-3">
                <label for="tendm" class="form-label">Danh mục</label>
                <input type="text" name="ten_danh_muc" id="tendm" class="form-control @error('ten_danh_muc') is-invalid @enderror" value="{{$danhmuc->ten_danh_muc}}" placeholder="Nhập tên danh mục...">
                @error('ten_danh_muc')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                <a href="{{route('admin.danhmuc.index')}}"><button type="button" class="btn btn-success">Quay lại</button></a>
            </div>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->
@endsection