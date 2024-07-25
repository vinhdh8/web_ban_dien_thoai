@extends('layout.admin')
@section('content')
    <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Thêm mới danh mục</h1>
        <form action="{{ route('danhmuc.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" name="ten_danh_muc">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-danger" href="{{ route('danhmuc.index') }}">Quay về trang danh sách</a>
        </form>
    </div>
@endsection