<header class="header-area header-responsive-padding">
    <div class="header-bottom sticky-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="logo">
                        <a href="{{ '/' }}">
                            <h1>X-Shop</h1>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block d-flex justify-content-center">
                    <div class="main-menu text-center">
                        <nav>
                            <ul>
                                <li><a href="{{ '/' }}">Trang Chủ</a></li>
                                <li><a href="{{route('client.gioithieu.hienGioiThieu')}}">Giới Thiệu</a></li>
                                <li><a href="{{route('client.sanpham.all')}}">Sản Phẩm <i class="fa-solid fa-chevron-down"></i></a>
                                    <ul class="sub-menu-style">
                                        @foreach ($listDanhMuc as $item)
                                        <li><a href="{{route('client.sanpham.danhmucsanpham', $item->id)}}">{{ $item->ten_danh_muc }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{route('client.tintuc.hienTinTuc')}}">Tin Tức</a></li>
                                <li><a href="{{route('client.lienhe.hienLienHe')}}">Liên Hệ </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="header-action-wrap">
                        <div class="header-action-style header-search-1">
                            <a class="search-toggle" href="#">
                                <i class="pe-7s-search s-open"></i>
                                <i class="pe-7s-close s-close"></i>
                            </a>
                            <div class="search-wrap-1">
                                <form action="#">
                                    <input placeholder="Tìm kiếm" type="text">
                                    <button class="button-search"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="header-action-style main-menu">
                            <nav>
                                <ul>
                                    @if(Auth::check())
                                        <li><a title="{{ Auth::user()->ten_dang_nhap }}" href=""><i class="pe-7s-user"></i></a>
                                            <ul class="sub-menu-style">
                                                <li><a href="{{route('client.profile.index')}}" style="font-size:13px;">Thông tin tài khoản</a></li>
                                                <li><a href="{{route('client.donhang.donhang.index')}}" style="font-size:13px;">Đơn hàng của bạn</a></li>
                                                @if(Auth::user()->vai_tro==1)
                                                    <li><a href="{{route('admin.admin')}}" style="font-size:13px;">Quản trị viên</a></li>
                                                @endif
                                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-size:13px;">
                                                    Đăng xuất
                                                </a>
                                                <form id="logout-form" action="{{route('logout')}}" method="post" style="display: none;">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                    @else   
                                        <li><a title="Đăng nhập" href="{{route('login')}}"><i class="pe-7s-user"></i></a>
                                            <ul class="sub-menu-style">
                                                <li><a href="{{route('login')}}" style="font-size:13px;">Đăng nhập</a></li>
                                                <li><a href="{{route('register')}}" style="font-size:13px;">Đăng ký</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <!-- <div class="header-action-style">
                            <a title="Đăng nhập" href="?act=dangnhap"><i class="pe-7s-user"></i></a>
                        </div> -->
                        <div class="header-action-style header-action-cart">
                            <a href="{{route('client.giohang.list')}}"><i class="pe-7s-shopbag"></i>
                                <span class="product-count bg-black">{{session('cart') ? count(session('cart')) : '0'}}</span>
                            </a>
                        </div>
                        <div class="header-action-style d-block d-lg-none">
                            <a class="mobile-menu-active-button" href="#"><i class="pe-7s-menu"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>