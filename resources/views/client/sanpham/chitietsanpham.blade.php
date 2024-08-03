@extends('layout.client')
@section('content')
<div class="product-details-area pb-100 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-details-img-wrap" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-container product-details-big-img-slider-2 pd-big-img-style">
                        <a href="#">
                            <img src="{{Storage::url($chiTietSanPham->hinh_anh)}}" alt="">
                        </a>
                    </div>
                    <div class="product-details-small-img-wrap">
                        <div class="swiper-container product-details-small-img-slider-2 pd-small-img-style pd-small-img-style-modify"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                    <a style="font-size: 25px" href="">{{$chiTietSanPham->ten_san_pham}}</a>
                    <div class="product-details-price">
                        <span class="{{$chiTietSanPham->gia_khuyen_mai > 0 ? 'new-price' : 'old-price'}}">{{number_format($chiTietSanPham->gia_khuyen_mai, 0, '', '.')}}₫</span>
                        <span class="{{$chiTietSanPham->gia_khuyen_mai == 0 ? 'new-price' : 'old-price'}}">{{number_format($chiTietSanPham->gia, 0, '', '.')}}₫</span>
                    </div>
                    <div class="trangthai">
                        @if ($chiTietSanPham->so_luong<1) <p class="hethang">*Tạm thời hết hàng</p>
                            @else
                            <p><span>{{$chiTietSanPham->so_luong}}</span> sản phẩm có sẵn</p>
                            @endif
                    </div>
                    <div class="product-details-meta">
                        <ul>
                            <li><span class="title">Danh mục:</span>
                                <ul>
                                    <li><a href="">{{$chiTietSanPham->danhMuc->ten_danh_muc}}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <form action="{{route('client.giohang.add')}}" method="post">
                        @csrf
                        <div class="product-details-action-wrap">
                            <div class="single-product-cart btn-hover">
                                @csrf
                                <input type="hidden" name="sanPhamId" value="{{$chiTietSanPham->id}}">
                                <input type="hidden" name="soLuong" value="1">
                                <button type="submit" class="product-action-btn-2 theme-color" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-area pb-85">
    <div class="container">
        <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">
            <a class="active" data-bs-toggle="tab" href="#des-details1"> Mô tả </a>
            <a data-bs-toggle="tab" href="#des-details3" class=""> Đánh giá </a>
        </div>
        <div class="tab-content">
            <div id="des-details1" class="tab-pane active">
                <div class="product-description-content text-center">
                    <p data-aos="fade-up" data-aos-delay="400">{{$chiTietSanPham->mo_ta}}</p>
                </div>
            </div>
            <div id="des-details3" class="tab-pane">
                <div id="loadbinhluan" class="review-wrapper">
                    <h3>{{ $binhluans->count() }} đánh giá</h3>
                    @foreach($binhluans as $review)
                    <div class="single-review">
                        <div class="review-img">
                            <img src="{{ Storage::url('uploads/images/userbl.png') }}" alt="">
                        </div>
                        <div class="review-content">
                            <h5><span>{{ $review->user->ho_va_ten }}</span> - {{ $review->created_at ? $review->created_at->format('d/m/Y') :''}}</h5>
                            <p>{{ $review->noi_dung }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                @auth
                <div class="ratting-form-wrapper">
                    <div class="ratting-form">
                        <form action="{{ route('client.review.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="san_pham_id" value="{{ $chiTietSanPham->id }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="rating-form-style mb-15">
                                        <label>Đánh giá của bạn <span>*</span></label>
                                        <textarea name="noi_dung" required></textarea>
                                        @error('noi_dung')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-submit">
                                        <button type="submit" class="btn btn-dark">Gửi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <p><a href="{{ route('login') }}">Đăng nhập</a> để gửi đánh giá.</p>
                @endauth
            </div>
        </div>
    </div>
</div>
<div class="related-product-area pb-95">
    <div class="container">
        <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
            <h2>Sản phẩm liên quan</h2>
        </div>

        <div class="related-product-active swiper-container">
            <div class="swiper-wrapper">
                @foreach ($listSanPham as $item)
                <div class="swiper-slide">
                    <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-img img-zoom mb-25">
                            <a href="{{route('client.sanpham.chitiet', $item->id)}}">
                                <img src="{{Storage::url($item->hinh_anh)}}" alt="">
                            </a>
                            <form action="{{route('client.giohang.add')}}" method="post">
                                @csrf
                                <div class="product-action-2-wrap">
                                    <input type="hidden" name="sanPhamId" value="{{$item->id}}">
                                    <input type="hidden" name="soLuong" value="1">
                                    <button type="submit" data-id="" onclick="" class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                </div>
                            </form>
                        </div>
                        <div class="product-content">
                            <h3><a href="">{{$item->ten_san_pham}}</a></h3>
                            <div class="product-price">
                                <span class="{{$item->gia_khuyen_mai > 0 ? 'new-price' : 'old-price'}}">{{number_format($item->gia_khuyen_mai, 0, '', '.')}}₫</span>
                                <span class="{{$item->gia_khuyen_mai == 0 ? 'new-price' : 'old-price'}}">{{number_format($item->gia, 0, '', '.')}}₫</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection