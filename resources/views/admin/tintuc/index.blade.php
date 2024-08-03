@extends('layout.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách danh mục</h1>
    <form action="?act=qltintuc" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-secondary btn-sm" onclick="chontatca()">Chọn tất cả</button>
                <button type="button" class="btn btn-secondary btn-sm" onclick="bochontatca()">Bỏ chọn tất cả</button>
                <button type="submit" name="xoacacmucchon" class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
                <a href="?act=addtintuc"><button type="button" class="btn btn-secondary btn-sm">Nhập thêm</button></a>
                <div class="float-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="kyw" placeholder="Tìm kiếm...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="search">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>STT</th>
                                <th>Người đăng</th>
                                <th>Image</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listtintuc as $tintuc) {
                                extract($tintuc);
                                if(strlen($tieude)>50) $tieude=substr($tieude,0,50)."...";
                                if(strlen($noidung)>100) $noidung=substr($noidung,0,100)."...";
                                echo '<tr>
                                        <td class="text-center"><input type="checkbox" name="select[]" value="'.$idtt.'"></td>
                                        <td>'.$idtt.'</td>
                                        <td class="col-2">'.$tendangnhap.'</td>
                                        <td class="col-1"><img src="../uploads/tintuc/'.$image.'" alt="err" height=60px></td>
                                        <td class="col-2">'.$tieude.'</td>
                                        <td class="col-3">'.$noidung.'</td>
                                        <td class="col-1">'.$ngaydang.'</td>
                                        <td class="col-2"><a href="?act=updatetintuc&id='.$idtt.'"><button type="button" class="btn btn-secondary btn-sm">Sửa</button></a> | 
                                            <a href="?act=xoatintuc&id='.$idtt.'"><button type="button" class="btn btn-secondary btn-sm">Xóa</button></a></td>
                                    </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="phantrang">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
@endsection