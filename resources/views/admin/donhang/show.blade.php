@extends('layout.admin')
@section('content')
     <!-- Begin Page Content -->
 <div class="container-fluid">
    @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif
    @if ( Session::has('error') )
        <div class="alert alert-danger alert-dismissible" role="alert">
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card shadow mb-4">
            <div class="card-header text-center donmua">
                <h3>Thông tin sản phẩm</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donHang->chiTietDonHang as $item)
                                <tr>
                                    @php
                                        $sanPham = $item->sanPham;
                                    @endphp
                                    <td class="col-1">
                                        <img src="{{Storage::url($sanPham->hinh_anh)}}" alt="Err" style="width:100px">
                                    </td>
                                    <td class="col-2">
                                        {{$sanPham->ten_san_pham}}
                                    </td>
                                    <td class="col-2">
                                        <span class="amount">{{number_format($item->dong_gia, 0, '', '.')}} ₫</span>
                                    </td>
                                    <td class="col-2">
                                        <span>{{$item->so_luong}}</span>
                                    </td>
                                    <td class="col-2 align-middle">
                                        <span class="amount">{{number_format($item->thanh_tien, 0, '', '.')}} ₫</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="phantrang">

                    </div>
                </div>
            </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header text-center donmua">
            <h3>Thông tin đơn hàng</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Thông tin tài khoản đặt</th>
                            <th>Thông tin người nhận hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-6">
                                <ul>
                                    <li>Họ và tên: <b>{{$donHang->user->ho_va_ten}}</b></li>
                                    <li>Email: <b>{{$donHang->user->email}}</b></li>
                                    <li>Số điện thoại: <b>{{$donHang->user->so_dien_thoai}}</b></li>
                                    <li>Địa chỉ: <b>{{$donHang->user->dia_chi}}</b></li>
                                    <li>Tài khoản: <b>{{$donHang->user->vai_tro == 1 ? 'Quản trị viên' : 'Thành viên'}}</b></li>
                                </ul>
                            </td>
                            <td class="col-6">
                                <ul>
                                    <li>Tên người nhận: <b>{{$donHang->ten_nguoi_nhan}}</b></li>
                                    <li>Email: <b>{{$donHang->email_nguoi_nhan}}</b></li>
                                    <li>Số điẹn thoại: <b>{{$donHang->so_dien_thoai}}</b></li>
                                    <li>Địa chỉ: <b>{{$donHang->dia_chi_nhan}}</b></li>
                                    <li>Trạng thái đơn hàng: <b>{{$trangThaiDonHang[$donHang->trang_thai]}}</b></li>
                                    <li>Trạng thái thanh toán: <b>{{$trangThaiThanhToan[$donHang->thanh_toan]}}</b></li>
                                    <li>Tiền hàng: <b>{{number_format($donHang->tien_hang, 0, '', '.')}} ₫</b></li>
                                    <li>Tiền ship: <b>{{number_format($donHang->tien_ship, 0, '', '.')}} ₫</b></li>
                                    <li>Tổng tiền: <b class="fs-5 text-danger">{{number_format($donHang->tong_tien, 0, '', '.')}} ₫</b></li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table> 
                <div class="phantrang">

                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="{{route('admin.donhang.index')}}">
            <button type="button" class="btn btn-success">Quay lại</button>
        </a>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@section('js')

@endsection