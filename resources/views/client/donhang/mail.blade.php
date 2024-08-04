@component('mail::message')
    # Xác nhận đơn hàng

    Xin chào {{$donHang->ten_nguoi_nhan}},

    Cảm ơn bạn đã đặt hàng của chúng tôi, Đây là thông tin đơn hàng của bạn

    ***Mã đơn hàng: **{{$donHang->ma_don_hang}}

    ***Sản phẩm đã đạt: **
    @foreach ($donHang->chiTietDonHang as $chitiet)
        - {{$chitiet->sanPham->ten_san_pham}} x {{$chitiet->so_luong}}: {{number_format($chitiet->thanh_tien)}} VND
    @endforeach

    *** Tổng tiền: ** {{number_format($donHang->tong_tien)}}

    Chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận thông tin giao hàng.

    Cảm ơn các bạn đã mua sắm tại cửa hàng chúng tôi!

    Trân trọng.
@endcomponent