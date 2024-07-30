@extends('layout.client')
@section('content')
<div class="product-details-area pb-100 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-details-img-wrap" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-container product-details-big-img-slider-2 pd-big-img-style">
                        <a href="#">
                            <img src="" alt="">
                        </a>
                    </div>
                    <div class="product-details-small-img-wrap">
                        <div class="swiper-container product-details-small-img-slider-2 pd-small-img-style pd-small-img-style-modify"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                    <a style="font-size: 25px" href=""></a>
                    <div class="product-details-price">
                        <span class="old-price">đ</span>
                        <span class="new-price">đ</span>
                    </div>
                    <div class="trangthai">
                    </div>
                    <div class="product-details-meta">
                        <ul>
                            <li><span class="title">Category:</span>
                                <ul>
                                    <li><a href=""></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="product-details-action-wrap">
                        <div class="single-product-cart btn-hover">
                            <button onclick="themgiohang()" class="product-action-btn-2 theme-color" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                        </div>
                        <div class="single-product-cart btn-hover">
                            <form action="" method="post">
                                <button type="submit" name="datngayct" class="product-action-btn-2 theme-color">Mua ngay</button>
                            </form>
                        </div>
                    </div>
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
                    <p data-aos="fade-up" data-aos-delay="400"></p>
                </div>
            </div>
            <div id="des-details3" class="tab-pane">
                <div id="loadbinhluan" class="review-wrapper">
                    <h3><span id="countbl"></span> đánh giá</h3>


                </div>
                <div class="ratting-form-wrapper">
                    <div class="ratting-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="rating-form-style mb-15">
                                    <label>Đánh giá của bạn <span>*</span></label>
                                    <textarea id="noidung"></textarea>
                                    <p id="binhluanErr" style="color:red;"></p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-submit">
                                    <input id="ngaybinhluan" type="hidden" value="">
                                    <button class="btn btn-dark" onclick="">Gửi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

                <div class="swiper-slide">
                    <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-img img-zoom mb-25">
                            <a href="">
                                <img src="" alt="">
                            </a>
                            <div class="product-badge badge-top badge-right badge-pink">
                                <span>-%</span>
                            </div>
                            <div class="product-action-2-wrap">
                                <input type="hidden" name="id" value="">
                                <input type="hidden" name="tensp" value="">
                                <input type="hidden" name="image" value="">
                                <input type="hidden" name="giasp" value="">
                                <button data-id="" onclick="themgiohang()" class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href=""></a></h3>
                            <div class="product-price">
                                <span class="old-price">₫</span>
                                <span class="new-price">₫</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection