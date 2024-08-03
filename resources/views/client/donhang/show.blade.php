@extends('layout.client')
@section('content')
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div style="width: 100%; font-size: 20px" class="col-lg-12 col-xl-8">
                <div class="cart-table-content card mb-3">
                    <div class="card-header text-center donmua">
                        <h3>Thông tin sản phẩm</h3>
                    </div>
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th class="width-name">Tên sản phẩm</th>
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
                                        <td>
                                            <img src="{{Storage::url($sanPham->hinh_anh)}}" alt="Err" style="width:100px">
                                        </td>
                                        <td>
                                            <a href="">{{$sanPham->ten_san_pham}}</a>
                                        </td>
                                        <td>{{number_format($item->dong_gia, 0, '', '.')}} ₫</td>
                                        <td>{{$item->so_luong}}</td>
                                        <td>{{number_format($item->thanh_tien, 0, '', '.')}} ₫</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header text-center donmua">
                        <h3>Thông tin đơn hàng</h3>
                    </div>
                    <div id="tap1" class="card-body p-4 bg-light an">
                        <div class="card shadow-0 border mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div style="margin-top: 30px; width: 99%;" class="mb-1 thongtinmuahang">
                                        <p class="text-muted small mb-5">
                                            Trạng thái đơn hàng: 
                                            <span class="thongtinmuahang3">{{$trangThaiDonHang[$donHang->trang_thai]}}</span>
                                        </p>
                                        <p class="text-muted small mb-5">
                                            Trạng thái thanh toán: 
                                            <span class="thongtinmuahang3">{{$trangThaiThanhToan[$donHang->thanh_toan]}}</span>
                                        </p>
                                        <p>Mã đơn hàng: <span class="thongtinmuahang4">{{$donHang->ma_don_hang}}</span></p>
                                        <p>Tên người nhận: <span class="thongtinmuahang1">{{$donHang->ten_nguoi_nhan}}</span></p>
                                        <p>Số điện thoại: <span class="thongtinmuahang1">{{$donHang->so_dien_thoai}}</span></p>
                                        <p>Địa chỉ nhận hàng: <span class="thongtinmuahang2">{{$donHang->dia_chi_nhan}}</span></p>
                                        <p>Ngày đặt hàng: <span class="thongtinmuahang2">{{$donHang->created_at->format('d-m-Y')}}</span></p>
                                        <p>Tổng tiền hàng: <span class="thongtinmuahang1">{{number_format($donHang->tien_hang, 0, '', '.')}} ₫</span></p>
                                        <p>Tổng tiền ship: <span class="thongtinmuahang1">{{number_format($donHang->tien_ship, 0, '', '.')}} ₫</span></p>
                                        <p>Tổng tiền phải thanh toán: <span class="thongtinmuahang1"><strong>{{number_format($donHang->tong_tien, 0, '', '.')}} ₫</strong></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-shiping-update-wrapper">
                            <div class="cart-shiping-update btn-hover">
                                <a href="{{route('client.donhang.donhang.index')}}">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection