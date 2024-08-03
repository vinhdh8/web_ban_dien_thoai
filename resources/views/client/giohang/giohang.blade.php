@extends('layout.client')
@section('content')
<div class="cart-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('client.giohang.update')}}" method="post">
                    @csrf
                    <div class="cart-table-content">
                        <div class="table-content table-responsive">
                            @if ( Session::has('error') )
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>{{ Session::get('error') }}</strong>
                                </div>
                            @endif
                            <table>
                                <thead>
                                    <tr>
                                        <th class="width-thumbnail"></th>
                                        <th class="width-name">Sản phẩm</th>
                                        <th class="width-price">Đơn giá</th>
                                        <th class="width-quantity">Số lượng</th>
                                        <th class="width-subtotal">Số tiền</th>
                                        <th class="width-remove"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gioHang as $key => $item)
                                        <tr class="trgiohang">
                                            <td class="product-thumbnail">
                                                <a href="{{route('client.sanpham.chitiet', $key)}}">
                                                    <img src="{{Storage::url($item['hinh_anh'])}}" alt="">
                                                    <input type="hidden" name="giohang[{{$key}}][hinh_anh]" value="{{$item['hinh_anh']}}">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <h5><a href="{{route('client.sanpham.chitiet', $key)}}">{{$item['ten_san_pham']}}</a></h5>
                                                <input type="hidden" name="giohang[{{$key}}][ten_san_pham]" value="{{$item['ten_san_pham']}}">
                                            </td>
                                            <td class="product-cart-price">
                                                <span class="amount">{{number_format($item['gia'], 0, '', '.')}} ₫</span>
                                                <input type="hidden" name="giohang[{{$key}}][gia]" value="{{$item['gia']}}">
                                            </td>
                                            <td class="cart-quality">
                                                <div class="product-quality">
                                                    <div  class="dec qtybutton">-</div>
                                                    <input data-price="{{$item['gia']}}" class="cart-plus-minus-box input-text qtyInput text" name="giohang[{{$key}}][so_luong]" value="{{$item['so_luong']}}">
                                                    <div  class="inc qtybutton">+</div>
                                                </div>
                                            </td>
                                            <td class="product-total">
                                                <span class="subtotal">{{number_format($item['gia'] * $item['so_luong'], 0, '', '.')}} ₫</span>
                                            </td>
                                            <td class="product-remove">
                                                <a href=""><i class=" ti-trash "></i></a>
                                            </td>
                                        </tr>   
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update btn-hover">
                                    <a href="{{route('client.sanpham.all')}}">Tiếp tục mua sắm</a>
                                </div>
                                <div class="cart-clear btn-hover">
                                    <button type="submit">Cập nhật giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12" style="width:100%;">
                <div class="grand-total-wrap">
                    <div class="grand-total-content col-lg-6">
                        <div class="grand-total">
                            <h4>Tạm tính <span class="sub-total">{{number_format($subTotal, 0, '', '.')}} đ</span></h4>
                            <hr>
                            <h4>Phí ship <span class="shipping">{{number_format($shipping, 0, '', '.')}} đ</span></h4>
                            <hr>
                            <h4>Tổng thanh toán <span class="sum-total">{{number_format($total, 0, '', '.')}} đ</span></h4>
                        </div>
                    </div>
                    <div class="grand-total-btn btn-hover col-lg-6">
                        <a class="btn theme-color" href="{{route('client.donhang.donhang.create')}}">Tiếp tục đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
    // hàm cập nhật tổng giỏ hàng
    function updateTotal(){
        var subTotal = 0;
        // Tính tổng số tiền của các sản phẩm có trong giỏ hàng
        $('.qtyInput').each(function(){
            var $input = $(this);
            var price = parseFloat($input.data('price'));
            var quantity = parseFloat($input.val());
            subTotal += price*quantity;
        })
        // Lấy số tiền vận chuyển
        var shipping = parseFloat($('.shipping').text().replace(/\./g,'').replace(' đ', ''));
        var total = subTotal+shipping;
        // Cập nhật giá trị
        $('.sub-total').text(subTotal.toLocaleString('vi-VN') +' đ');
        $('.sum-total').text(total.toLocaleString('vi-VN') +' đ');
    }

    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var $input = $button.parent().find("input");
        var oldValue = parseFloat($input.val());
        if($button.hasClass('inc')){
            var newVal = oldValue + 1;
        }else{
            if(oldValue > 1){
                var newVal = oldValue - 1;
            }else{
                var newVal = 1;
            }
        }
        $input.val(newVal); 

        // Cập nhật  lại giá trị của tổng tiền
        var price = parseFloat($input.data('price'));
        var subTotalElement = $input.closest('tr').find('.subtotal');
        var newSubTotal = newVal * price;
        subTotalElement.text(newSubTotal.toLocaleString('vi-VN')+' đ');
        // Upload total
        updateTotal();
    });
    // Nếu người dùng nhập số âm
    $('.qtyInput').on('change', function(){
        var value = parseInt($(this).val(), 10);
        if(isNaN(value)||value<1){
            alert('Số lượng phải lớn hơn hoặc bằng 1')
            $(this).val(1)
        }
        updateTotal();
    })
    // Xử lý xóa sản phẩm trong giỏ hàng
    $('.product-remove').on('click', function(){
        event.preventDefault(); // chặn thao tác mặc định của thẻ <a>
        var $row = $(this).closest('tr');
        $row.remove(); // xóa hàng
        updateTotal();
    })
    updateTotal();
    </script>
@endsection