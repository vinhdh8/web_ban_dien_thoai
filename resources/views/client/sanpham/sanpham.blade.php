    @extends('layout.client')
    @section('content')
    <div class="shop-area pt-100 pb-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-12 col-md-9">
                    <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row">
                                @foreach($sanpham as $product)
                                    
                                        <div class="col-lg-4 col-sm-5">
                                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                                <div class="product-img img-zoom mb-25">
                                                    <a href="{{'/sanphamclient/'.$product->id}}">
                                                        <img src="{{Storage::url($product->hinh_anh) }}" alt="{{$product->ten_san_pham}}">
                                                    </a>
                                                    <div class="product-badge badge-top badge-right badge-pink">
                                                        <span>-20%</span>
                                                    </div>
                                                    <div class="product-action-2-wrap">
                                    
                                                            <button data-id="{{$product->id}}" onclick="" class="product-action-btn-2" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                                        
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="">{{$product->ten_san_pham}}</a></h3>
                                                    <div class="product-price">
                                                        <span class="old-price">{{$product->gia}}</span>
                                                        <span class="new-price">{{$product->gia}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                </div>
                                  <!-- Hiển thị các liên kết phân trang -->
                            <div class="pagination-wrap">
                                {{ $sanpham->links()}}
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar-wrapper">
                        <div class="sidebar-widget mb-40" data-aos="fade-up" data-aos-delay="200">
                            <div class="search-wrap-2">
                                <form class="search-2-form" method="post" action="?act=sanpham">
                                    <input placeholder="Tìm kiếm*" type="text" name="timkiem" value="">
                                    <button class="button-search" type="submit" name="submittimkiem"><i class=" ti-search "></i></button>
                                </form>
                            </div>
                        </div>
                        <form action="?act=sanpham" method="post">
                            <div class="sidebar-widget  mb-40 pb-35" data-aos="fade-up" data-aos-delay="200">
                                <div class="sidebar-widget-title mb-30">
                                    <h3>Lọc giá</h3>
                                </div>
                                <div class="price-filter">
                                    <div id="slider-range"></div>
                                    <div class="price-slider-amount">
                                        <div class="label-input">
                                            <label>Giá:</label>
                                            <input type="text" id="amount" placeholder="Tìm theo giá" />
                                            <input type="hidden" name="giaspdau" class="giaspdau">
                                            <input type="hidden" name="giaspcuoi" class="giaspcuoi">
                                        </div>
                                        <button type="submit" name="submitlocgia">Lọc</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="sidebar-widget mb-40 pb-35" data-aos="fade-up" data-aos-delay="200">
                            <div class="sidebar-widget-title mb-25">
                                <h3>Danh mục sản phẩm <span><a style="padding-left:35px;" href="{{'/sanphamclient'}}">Tất cả</a></span></h3>
                            </div>
                            <div class="sidebar-list-style">
                                <ul>
                                @foreach($danhmuc as $cate)
                                <li><a href="">{{ $cate->ten_danh_muc }} </a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection