@extends('layout.client')
@section('content')
<div class="blog-area pb-70">
    <div class="container">
        <div class="map mb-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.868088396546!2d105.74435187508114!3d21.0379634806137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455305afd834b%3A0x17268e09af37081e!2sT%C3%B2a%20nh%C3%A0%20FPT%20Polytechnic.!5e0!3m2!1svi!2s!4v1701953681942!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="guilienhe">
            <div class="bentrai">
                <h2>Liên hệ với chúng tôi</h2><br>
                <div class="thongtinlienhe">
                    <h3>X-Mobile - TP. Hà Nội</h3>
                    <p><span>Địa chỉ:</span> Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô,
                        <br> Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam
                    </p>
                    <p><span>Hotline:</span> 0123.456.789</p>
                    <p><span>Email:</span> nhom4@gmail.com</p>
                </div>
            </div>
            <div class="benphai">
                <form action="{{route('client.lienhe.storeLienHe')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="hovaten" class="form-label ">Họ và Tên</label>
                        <input type="text" id="ho_va_ten" class="form-control @error('ho_va_ten') is-invalid @enderror" name="ho_va_ten" placeholder="Nhập họ và tên..." value="{{old('ho_va_ten')}}">
                        @error('ho_va_ten')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email: </label>
                        <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Nhập email..." value="{{old('email')}}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sodienthoai" class="form-label">Số điện thoại</label>
                        <input type="number" id="so_dien_thoai" name="so_dien_thoai" class="form-control @error('so_dien_thoai') is-invalid @enderror" placeholder="Nhập số điện thoại..." value="{{old('so_dien_thoai')}}">
                        @error('so_dien_thoai')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="noi_dung" class="form-label">Nội dung</label>
                        <textarea class="form-control @error('noi_dung') is-invalid @enderror" rows="5" id="noi_dung" name="noi_dung" placeholder="Nhập nội dung liên hệ..." value="{{old('noi_dung')}}"></textarea>
                        @error('noi_dung')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="w" class="form-label">Ngày gửi</label>
                        <input type="date" id="ngay_gui" name="ngay_gui" class="form-control @error('ngay_gui') is-invalid @enderror" value="{{old('ngay_gui')}}">
                        @error('ngay_gui')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <button type="submit" class="btn btn-success">Gửi liên hệ</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection