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
        <form action="?act=updatetk" method="post" class="form">
            <input type="hidden" name="id" value="<?=$id?>">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="hovaten" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="hovaten" name="hovaten" placeholder="Nhập họ và tên..."  value="<?=$hovaten?>">
                    <p class="Err mt-1"><?=$hovatenErr?></p>
                </div>
                <div class="col-md-6">
                    <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" placeholder="Nhập tên đăng nhập..." value="<?=$tendangnhap?>">
                    <p class="Err mt-1"><?=$tendangnhapErr?></p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="matkhau" class="form-label">Mật Khẩu</label>
                    <input type="text" class="form-control" id="matkhau" name="matkhau" placeholder="VD: Example123..." value="<?=$matkhau?>">
                    <p class="Err mt-1"><?=$matkhauErr?></p>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="VD: example@gmail.com..." value="<?=$email?>">
                    <p class="Err mt-1"><?=$emailErr?></p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="sodienthoai" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" placeholder="Nhập số điện thoại..." value="<?=$sodienthoai?>">
                    <p class="Err mt-1"><?=$sodienthoaiErr?></p>
                </div>
                <div class="col-md-6">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhập địa chỉ..." value="<?=$diachi?>">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="sel1">Vai Trò</label>
                    <select class="form-control" id="sel1" name="role">
                        <?php
                            if($role==0){
                                echo '<option value="0">Thành viên</option>     
                                      <option value="1">Quản trị viên</option>';
                            }else if($role==1){
                                echo '<option value="1">Quản trị viên</option>
                                    <option value="0">Thành viên</option>';
                            }
                        ?>
                        
                    </select>
                </div>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                <?php
                    if($role==0){
                        echo '<a href="?act=listtv"><button type="button" class="btn btn-success">Thoát</button></a>';
                    }else if($role==1){
                        echo '<a href="?act=listqtv"><button type="button" class="btn btn-success">Thoát</button></a>';
                    }
                ?>
            </div>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->
@endsection