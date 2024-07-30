@extends('layout.client')
@section('content')
<!--container-->
<div class="slider-area">
    <div class="slider-active swiper-container">
        <div class="swiper-wrapper">
            @foreach($listBanner as $banner)
            <div class="swiper-slide">
                <div class="intro-section slider-height-1 slider-content-center bg-img single-animation-wrap slider-bg-color-1" style="background-image:url(../assets/giao_dien_home/assets/images/slider/slider-bg-1.jpg)">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="slider-content-1 slider-animated-1">
                                    <h1 class="animated" >{{$banner->sanPham ? $banner->sanPham->ten_san_pham : 'Product Name' }}</h1>
                                    <div class="slider-btn btn-hover">
                                        <a href="{{ route('client.sanpham.chitiet', $banner->san_pham_id) }}" class="btn animated">
                                            Shop Now <i class=" ti-arrow-right "></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="hero-slider-img-1 slider-animated-1">
                                    <img class="animated animated-slider-img-1" src="{{Storage::url($banner->hinh_anh)}}" alt="">
                                    <div class="product-offer animated">
                                        <h5>20%<span>Off</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="home-slider-prev main-slider-nav"><i class="fa fa-angle-left"></i></div>
            <div class="home-slider-next main-slider-nav"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>
</div>
<div class="service-area pb-70 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-img">
                        <img src="{{asset('import/assets/giao_dien_home/assets/images/icon-img/car.png')}}" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Free Shipping</h3>
                        <p>Giao Nhanh Miễn Phí</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-img">
                        <img src="{{asset('import/assets/giao_dien_home/assets/images/icon-img/time.pn')}}g" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Support 24/7</h3>
                        <p>Hỗ Trợ Nhiệt Tình</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-img">
                        <img src="{{asset('import/assets/giao_dien_home/assets/images/icon-img/dollar.')}}png" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Money Return</h3>
                        <p>Chính Sách Đổi Trả </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="800">
                    <div class="service-img">
                        <img src="{{asset('import/assets/giao_dien_home/assets/images/icon-img/discoun')}}t.png" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Order Discount</h3>
                        <p>Giảm Giá Đơn Hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-95">
    <div class="container">
        <div class="section-border section-border-margin-1" data-aos="fade-up" data-aos-delay="200">
            <div class="section-title-timer-wrap bg-white">
                <div class="section-title-1">
                    <h2>Sản phẩm đang Sale</h2>
                </div>

            </div>
        </div>
        <div class="product-slider-active-1 swiper-container">
            <div class="swiper-wrapper">
                @foreach($listsanpham as $product)
                    @if ($product->gia_khuyen_mai > 0)
                        <div class="swiper-slide">
                            <div class="product-wrap" data-aos="fade-up" data-aos-delay="">
                                <div class="product-img img-zoom mb-25">
                                    <a href="{{route('client.sanpham.chitiet', $product->id)}}">
                                        <img src="{{Storage::url($product->hinh_anh)}}" alt="Lỗi">
                                    </a>
                                    <div class="product-action-2-wrap">
                                        @if ($product->so_luong>0)
                                            <form action="{{route('client.giohang.add')}}" method="post">
                                                @csrf
                                                <div class="product-action-2-wrap">
                                                    <input type="hidden" name="sanPhamId" value="{{$product->id}}">
                                                    <input type="hidden" name="soLuong" value="1">
                                                    <button type="submit" data-id="" onclick="" class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                                </div>
                                            </form>
                                        @else
                                            <button class="product-action-btn-2">Đang hết hàng</button>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="">{{$product->ten_san_pham }}</a></h3>
                                    <div class="product-price">
                                        <span class="new-price">{{number_format($product->gia_khuyen_mai, 0, '', '.')}}₫</span>
                                        <span class="old-price">{{number_format($product->gia, 0, '', '.')}}₫</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="product-prev-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i class="fa fa-angle-left"></i></div>
            <div class="product-next-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>
</div>
<div class="product-area pb-60">
    <div class="container">
        <div class="section-title-tab-wrap mb-75">
            <div class="section-title-2" data-aos="fade-up" data-aos-delay="200">
                <h2>Sản Phẩm Nổi Bật</h2>
            </div>
        </div>
        <!--Danh mục-->
        <div id="pro-1" class="tab-pane">
            <div class="row">
            @foreach($sanphamHot as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-img img-zoom mb-25">
                            <a href="{{route('client.sanpham.chitiet', $product->id)}}">
                                <img src="{{Storage::url($product->hinh_anh)}}" alt="Lỗi">
                            </a>
                            <div class="product-action-2-wrap">
                                @if ($product->so_luong>0)
                                    <form action="{{route('client.giohang.add')}}" method="post">
                                        @csrf
                                        <div class="product-action-2-wrap">
                                            <input type="hidden" name="sanPhamId" value="{{$product->id}}">
                                            <input type="hidden" name="soLuong" value="1">
                                            <button type="submit" data-id="" onclick="" class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                        </div>
                                    </form>
                                @else
                                    <button class="product-action-btn-2">Đang hết hàng</button>
                                @endif
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="">{{$product->ten_san_pham}}</a></h3>
                            <div class="product-price">
                                <span class="{{$product->gia_khuyen_mai > 0 ? 'new-price' : 'old-price'}}">{{number_format($product->gia_khuyen_mai, 0, '', '.')}}₫</span>
                                <span class="{{$product->gia_khuyen_mai == 0 ? 'new-price' : 'old-price'}}">{{number_format($product->gia, 0, '', '.')}}₫</span>
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