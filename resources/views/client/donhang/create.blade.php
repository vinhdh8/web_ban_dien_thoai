@extends('layout.client')
@section('content')
<div class="checkout-main-area pb-100 pt-100">
    <div class="container">
        <div class="checkout-wrap pt-30">
            <form action="{{route('client.donhang.donhang.store')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Chi tiết thanh toán</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label for="ten_nguoi_nhan">Họ và Tên<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="ten_nguoi_nhan" id="ten_nguoi_nhan" value="{{Auth::user()->ho_va_ten}}">
                                        @error('ten_nguoi_nhan')
                                            <p style="color:red;">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label for="email_nguoi_nhan">Email<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="email_nguoi_nhan" id="email_nguoi_nhan" value="{{Auth::user()->email}}">
                                        @error('email_nguoi_nhan')
                                            <p style="color:red;">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label for="so_dien_thoai">Số điện thoại<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="so_dien_thoai" id="so_dien_thoai" value="{{Auth::user()->so_dien_thoai}}">
                                        @error('so_dien_thoai')
                                            <p style="color:red;">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label for="dia_chi_nhan">Địa chỉ<abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="dia_chi_nhan" id="dia_chi_nhan" value="{{Auth::user()->dia_chi}}">
                                        @error('dia_chi_nhan')
                                            <p style="color:red;">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="your-order-area">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-info-wrap">
                                    <div class="your-order-info">
                                        <ul>
                                            <li>Sản phẩm <span>Tổng cộng</span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            @foreach ($cart as $key => $item)
                                                <li>
                                                    <a href="{{route('client.sanpham.chitiet', $key)}}">{{$item['ten_san_pham']}} <strong> x {{$item['so_luong']}}</strong></a>
                                                    <span><strong>{{number_format($item['gia'] * $item['so_luong'], 0, '', '.')}}đ</strong></span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Tạm tính
                                                <span>{{number_format($subtotal, 0, '', '.')}}đ</span>
                                                <input type="hidden" name="tien_hang" value="{{$subtotal}}">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li>Tiền Ship
                                                <p>{{number_format($shipping, 0, '', '.')}}đ</p>
                                                <input type="hidden" name="tien_ship" value="{{$shipping}}">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <li>Thành tiền 
                                                <span>{{number_format($total, 0, '', '.')}}đ</span>
                                                <input type="hidden" name="tong_tien" value="{{$total}}">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="pay-top sin-payment">
                                        <input id="payment-method-3" class="input-radio" type="radio" value="0" name="" checked>
                                        <label for="payment-method-3">THANH TOÁN KHI GIAO HÀNG</label>
                                        <!-- <div class="payment-box payment_method_bacs">

                                        </div> -->
                                    </div>
                                    <div class="pay-top sin-payment">
                                        <input id="payment_method_1" class="input-radio" type="radio" value="1" name="">
                                        <label for="payment_method_1">CHUYỂN KHOẢN</label>
                                    </div>
                                </div>
                            </div>
                            <div class="Place-order btn-hover">
                                <button type="submit" name="" class="btn btn-danger" style="width:100%;">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection