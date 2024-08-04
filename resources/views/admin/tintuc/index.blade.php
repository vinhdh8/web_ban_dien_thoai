@extends('layout.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách Tin tức</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-secondary btn-sm" onclick="chontatca()">Chọn tất cả</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="bochontatca()">Bỏ chọn tất cả</button>
            <button type="submit" name="xoacacmucchon" class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
            <a href="{{route('admin.tintuc.create')}}"><button type="button" class="btn btn-secondary btn-sm">Nhập thêm</button></a>
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
                        @foreach($listTinTuc as $item)
                        <tr>
                            <td class="text-center"><input type="checkbox" name="select[]" value=""></td>
                            <td>{{$item->id}}</td>
                            <td class="col-2">{{$item->User->ten_dang_nhap}}</td>
                            <td class="col-1"><img src="{{Storage::url($item->hinh_anh)}}" alt="err" height=60px></td>
                            <td class="col-2">{{ Str::limit($item->tieu_de, 50, '...') }}</td>
                            <td class="col-3">{{ Str::limit($item->noi_dung, 100, '...') }}</td>
                            <td class="col-2">{{$item->created_at}}</td>
                            <td class="col-2 align-middle">
                                <a href="{{route('admin.tintuc.show',$item->id)}}"><button type="button" class="btn btn-secondary btn-sm">Sửa</button></a>|
                                <form action="{{route('admin.tintuc.destroy',$item->id)}}" class="d-inline" method="POST" onclick="return confirm('Ban co muon xoa khong')">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary btn-sm">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection