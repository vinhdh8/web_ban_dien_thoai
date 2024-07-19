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
        <form action="{{route('danhmuc.edit', $item->id)}}" method="post" class="form">
            <input type="hidden" name="id" value="{{$item->id}}">
            <div class="mb-3">
                <label for="" class="form-label">Mã loại</label>
                <input type="text" name="maloai" id="" class="form-control" value="" disabled>
            </div>
            <div class="mb-3">
                <label for="tendm" class="form-label">Danh mục</label>
                <input type="text" name="tendm" id="tendm" class="form-control" value="<?=$tendm?>" placeholder="Nhập tên danh mục...">
                <p class="Err mt-1"><?=$tendmErr?></p>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                <a href="?act=listdm"><button type="button" class="btn btn-success">Quay lại</button></a>
            </div>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->
@endsection