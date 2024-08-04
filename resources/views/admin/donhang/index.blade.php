@extends('layout.admin')
@section('content')
     <!-- Begin Page Content -->
 <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách đơn hàng</h1>
    <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
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
                        <thead class="thead-light">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Trạng thái thanh toán</th>
                                <th>Tổng tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listDonHang as $item)
                                <tr>
                                    <td class="col-2">
                                        <a href="{{route('admin.donhang.show', $item->id)}}">
                                            <strong>{{$item->ma_don_hang}}</strong>
                                        </a>
                                    </td>
                                    <td class="col-2">
                                        {{$item->created_at->format('d-m-Y')}}
                                    </td>
                                    <td class="col-2">
                                        <form action="{{route('admin.donhang.update', $item->id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <select name="trang_thai" class="form-control" onchange="confirmSubmit(this)" data-default-value="{{$item->trang_thai}}">
                                                @foreach ($trangThaiDonHang as $key => $value)
                                                    <option value="{{$key}}" 
                                                    {{$key == $item->trang_thai ? 'selected' : '' }}
                                                    {{$key == $trangThaiHuyDon ? 'disabled' : '' }}
                                                    {{$key == $trangThaiDaGiaoHang ? 'disabled' : '' }}>{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>
                                    <td class="col-2">
                                        <select name="thanh_toan" class="form-control"  disabled>
                                            @foreach ($trangThaiThanhToan as $key => $value)
                                                <option value="{{$key}}" {{$key == $item->thanh_toan ? 'selected' : '' }}>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="col-2">
                                        <span class="amount">{{number_format($item->tong_tien, 0, '', '.')}} ₫</span>
                                    </td>
                                    <td class="col-2 align-middle">
                                        <a href="{{route('admin.donhang.show', $item->id)}}">
                                            <button type="button" class="btn btn-secondary btn-sm">Chi tiết</button>
                                        </a>
                                        @if ($item->trang_thai === $trangThaiHuyDon)
                                            <form action="{{route('admin.donhang.destroy', $item->id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Bạn có muốn xóa không')">Xóa</button>
                                            </form>
                                        @endif
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
    </div>
    
    
</div>
<!-- /.container-fluid -->
@endsection

@section('js')
    <script>
        function confirmSubmit(selectElement){
            var form = selectElement.form;
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            var defaultValue = selectElement.getAttribute('data-default-value');
            if (confirm('Bạn có chắc chắn thay đổi trạng thái đơn hàng thành "' + selectedOption + '" không?')) {
                form.submit();
            } else {
                selectElement.value = defaultValue;
            }
        }
    </script>
@endsection