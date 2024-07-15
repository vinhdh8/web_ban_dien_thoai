@extends('layout.admin')
@section('content')
     <!-- Begin Page Content -->
 <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách đơn hàng</h1>
    <form action="" method="post">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-secondary btn-sm" onclick="">Chọn tất cả</button>
                <button type="button" class="btn btn-secondary btn-sm" onclick="">Bỏ chọn tất cả</button>
                <button type="submit" name="xoacacmucchon" class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
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
                                <th>Mã đơn hàng</th>
                                <th>Khách hàng</th>
                                <th>Số lượng</th>
                                <th>Giá trị đơn hàng</th>
                                <th>Tình trạng đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Thanh toán</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($don_hangs as $index => $item)
                                @if ($item->trang_thai==1)
                                    @php
                                        $item->trang_thai = "Đơn hàng mới"
                                    @endphp
                                @endif
                                @if ($item->thanh_toan==0)
                                    @php
                                        $item->thanh_toan = "Chưa thanh toán"
                                    @endphp
                                @else
                                    @php
                                        $item->thanh_toan = "Đã thanh toán"
                                    @endphp
                                @endif
                                <tr>
                                    <td class="text-center align-middle"><input type="checkbox" name="select[]" id="" value=""></td>
                                    <td class="col-1 align-middle">GT-{{ $index + 1 }}</td>
                                    <td class="col-3 align-middle">
                                        {{ $item->ten_nguoi_nhan }} </br>
                                        {{ $item->so_dien_thoai }} </br>
                                        {{ $item->email }} </br>
                                        {{ $item->dia_chi_nhan }} </br>
                                    </td>
                                    <td class="text-center align-middle">{{ $item->chi_tiet_so_luong }}</td>
                                    <td  class="col-1 align-middle">{{ $item->thanh_tien }}</td>
                                    <td  class="col-2 align-middle">{{ $item->trang_thai }}</td>
                                    <td class="col-2 align-middle">{{ $item->ngay_dat_hang }}</td>
                                    <td  class="col-2 align-middle">{{ $item->thanh_toan }}</td>
                                    <td class="col-2 align-middle"><a href=""><button type="button" class="btn btn-secondary btn-sm">Cập nhật</button></a> <br><br>
                                        <a href=""><button type="button" class="btn btn-secondary btn-sm">Hủy</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="phantrang">
                        {{-- <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">Next</a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </form> 
    </div>
    
</div>
<!-- /.container-fluid -->
@endsection