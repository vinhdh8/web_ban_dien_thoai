@extends('layout.admin')
@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách sản phẩm</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-secondary btn-sm" onclick="">Chọn tất cả</button>
                <button type="button" class="btn btn-secondary btn-sm" onclick="">Bỏ chọn tất cả</button>
                <button type="submit" name="xoacacmucchon" class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
                <a href="{{ route('sanpham.create') }}"><button type="button" class="btn btn-secondary btn-sm">Nhập thêm</button></a>
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
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Ảnh</th>
                                <th>Số lượng</th>
                                <th>Danh mục</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($san_phams as $index => $item)
                                <tr>
                                    <td class="align-middle text-center"><input type="checkbox" name="select[]" id="" value=""></td>
                                    <td class=" align-middle">{{ $index + 1 }}</td>
                                    <td class="col-2 align-middle">{{ $item->ten_san_pham }}</td>
                                    <td class="col-2 align-middle">{{ $item->gia }}</td>
                                    <td  class="col-1 align-middle"><img src="{{Storage::url($item->hinh_anh) }}" alt="err" height="60px"></td>
                                    <td  class="align-middle">{{ $item->so_luong }}</td>
                                    <td  class="col-1 align-middle">{{ $item->ten_danh_muc }}</td>
                                    <td class="col-2 align-middle">
                                        <a href="{{route('sanpham.show', $item->id)}}"><button type="button" class="btn btn-secondary btn-sm">Sửa</button></a>|

                                        <form action="{{route('sanpham.destroy', $item->id)}}" class="d-inline" method="POST" onclick="return confirm('Ban co muon xoa khong')">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" class="btn btn-secondary btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                    <div class="phantrang">
                        <ul>

                        </ul>
                    </div>  
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->
@endsection