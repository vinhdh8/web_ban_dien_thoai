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
        <form action="?act=updatetintuc" method="post" enctype="multipart/form-data" class="form">
            <input type="hidden" name="id" value="<?= $id;?>">
            <input type="hidden" name="oldImage" value="<?= $oldImage;?>">
            <div class="mb-3">
                <label for="tieude" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="tieude" name="tieude" placeholder="Nhập tiêu đề..." value="<?= $tieude?>">
                <p class="Err mt-1"><?= $tieudeErr?></p>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Ảnh bìa:</label>
                <input type="file" name="image" id="image" class="form-control-file border">
                <p class="Err mt-1"><?= $imageErr?></p>
                <img src="../uploads/tintuc/<?=$oldImage?>" alt="" height="100px">
            </div>
            <div class="mb-3">
                <label for="noidung">Nội dung</label>
                <textarea class="form-control" rows="10" id="noidung" name="noidung" placeholder="Nhập nội dung..."><?= $noidung?></textarea>
                <p class="Err mt-1"><?= $noidungErr?></p>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                <a href="?act=qltintuc"><button type="button" class="btn btn-success">Quay lại</button></a>
            </div>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->
@endsection