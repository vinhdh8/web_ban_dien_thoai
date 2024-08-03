@extends('layout.client')
@section('content')
<div class="cart-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-body cart-table-content">
                    <div class="table table-content table-responsive">
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
                        <table class="table table-bordered" width="100%" cellspacing="0"> 
                            <thead class="thead-light">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng tiền</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donHangs as $item)
                                    <tr>
                                        <td class="col-2">
                                            <a href="{{route('client.donhang.donhang.show', $item->id)}}">
                                                <strong>{{$item->ma_don_hang}}</strong>
                                            </a>
                                        </td>
                                        <td class="col-2">
                                            {{$item->created_at->format('d-m-Y')}}
                                        </td>
                                        <td class="col-2">
                                            {{$trangThaiDonHang[$item->trang_thai]}}
                                        </td>
                                        <td class="col-2">
                                            <span class="amount">{{number_format($item->tong_tien, 0, '', '.')}} ₫</span>
                                        </td>
                                        <td class="col-4 align-middle text-center">
                                            <a href="{{route('client.donhang.donhang.show', $item->id)}}">
                                                <button type="button" class="btn btn-secondary btn-sm">Chi tiết</button>
                                            </a>
                                            <form action="{{route('client.donhang.donhang.update', $item->id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('put')
                                                @if ($item->trang_thai === $typeChoXacNhan)
                                                    <input type="hidden" name="huy_don_hang" value="1">
                                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Bạn có xác nhận hủy đơn hàng không?')">Hủy đơn hàng</button>
                                                @elseif ($item->trang_thai === $typeDangVanChuyen)
                                                    <input type="hidden" name="da_giao_hang" value="1">
                                                    <button class="btn btn-success btn-sm" type="submit" onclick="return confirm('Xác nhận đã nhận hàng')">Đã nhận hàng</button>
                                                @endif
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
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-shiping-update-wrapper">
                    <div class="cart-shiping-update btn-hover">
                        <a href="{{route('client.sanpham.all')}}">Tiếp tục mua sắm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection