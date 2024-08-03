@extends('layout.admin')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách Liên hệ</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
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
                                <th>Mã loại</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Nội dung</th>
                                <th>Ngày gửi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listLienHe as $index => $item)
                                <tr>
                                    <td class="col-1 text-center"><input type="checkbox" name="select[]" value=""></td>
                                    <td class="col-1">{{ $item->id}}</td>
                                    <td class="col-2">{{ $item->ho_va_ten}}</td>
                                    <td class="col-2">{{ $item->email}}</td>
                                    <td class="col-2">{{ $item->so_dien_thoai}}</td>
                                    <td class="col-2">{{ $item->noi_dung}}</td>
                                    <td class="col-2">{{ $item->ngay_gui }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection
