<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from htmldemo.net/urdan/urdan/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 10:10:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>X-Shop - Uy tín tạo nên thương hiệu</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Urdan Minimal eCommerce Bootstrap 5 Template is a stunning eCommerce website template that is the best choice for any online store.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="https://htmldemo.hasthemes.com/urdan/index.html" />

    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Urdan - Minimal eCommerce HTML Template" />
    <meta property="og:url" content="https://htmldemo.hasthemes.com/urdan/index.html" />
    <meta property="og:site_name" content="Urdan - Minimal eCommerce HTML Template" />
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#" />
    <meta property="og:description" content="Urdan Minimal eCommerce Bootstrap 5 Template is a stunning eCommerce website template that is the best choice for any online store." />
    <!-- Add site Favicon -->
    <link rel="icon" href="{{ asset('import/assets/giao_dien_home/assets/images/favicon/cropped-favicon-32x32.png" sizes="32x32')}}" />
    <link rel="icon" href="{{ asset('import/assets/giao_dien_home/assets/images/favicon/cropped-favicon-192x192.png" sizes="192x192')}}" />
    <link rel="apple-touch-icon" href="{{ asset('import/assets/giao_dien_home/assets/images/favicon/cropped-favicon-180x180.png')}}" />
    <meta name="msapplication-TileImage" content="{{ asset('import/assets/giao_dien_home/assets/images/favicon/cropped-favicon-270x270.png')}}" />

    <!-- All CSS is here
	============================================ -->
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/vendor/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/vendor/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/vendor/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/plugins/aos.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/plugins/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/plugins/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/plugins/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/plugins/nice-select.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/plugins/select2.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/plugins/easyzoom.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/plugins/slinky.css')}}" />
    <link rel="stylesheet" href="{{ asset('import/assets/giao_dien_home/assets/css/style.css')}}" />
    <link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>




<body>
    <div class="main-wrapper main-wrapper-2">
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
                                        <li><a href="?act=gioithieu">Giới Thiệu</a></li>
                                        <li><a href="?act=sanpham">Sản Phẩm <i class="fa-solid fa-chevron-down"></i></a> 
                                            <ul class="sub-menu-style">
                                                {{-- @foreach ($danh_mucs as $index => $item)
                                                    <li><a href="">{{ $item->ten_danh_muc }}</a></li>
                                                @endforeach --}}
                                            </ul>
                                        </li>
                                        <li><a href="?act=tintuc">Tin Tức</a></li>
                                        <li><a href="?act=lienhe">Liên Hệ </a></li>
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
                                                        <li><a href="" style="font-size:13px;">Thông tin tài khoản</a></li>
                                                        <li><a href="" style="font-size:13px;">Đơn mua</a></li>
                                                        @if(Auth::user()->vai_tro==1)
                                                            <li><a href="{{route('admin')}}" style="font-size:13px;">Quản trị viên</a></li>
                                                        @endif
                                                        <form action="{{route('logout')}}" method="post">
                                                            @csrf
                                                            <li><a href="" style="font-size:13px;"><button type="submit" class="btn btn-tertiary">Đăng xuất</button></a></li>
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
                                    <a class="cart-active" href="#"><i class="pe-7s-shopbag"></i>
                                        <?php
                                            // if(isset($countgh)){
                                            //     echo '<span id="countgh" class="product-count bg-black">'.$countgh['COUNT(*)'].'</span>';
                                            // }
                                        ?>
                                        
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
        <!-- mini cart start -->
        <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class="pe-7s-close"></i></a>
                <div class="cart-content">
                    <h3>Giỏ hàng</h3>
                    <ul id="minicartajax">
                        <?php
                        // $tongthanhtoan=0;
                        // if(isset($minicart)){
                        //     foreach ($minicart as $mini) {
                        //         extract($mini);
                        //         echo '<li>
                        //                 <div class="cart-img">
                        //                     <a href="?act=chitietsp&id='.$idsp.'"><img src="../uploads/'.$image.'" alt=""></a>
                        //                 </div>
                        //                 <div class="cart-title">
                        //                     <h4><a href="?act=chitietsp&id='.$idsp.'">'.$tensp.'</a></h4>
                        //                     <span> '.$soluong.' × '.number_format($giakm, 0, ',', '.').'₫</span>
                        //                 </div>
                        //                 <div class="cart-delete">
                        //                     <a href="?act=xoagiohang&id='.$idsp.'">×</a>
                        //                 </div>
                        //             </li>';
                        //             $tongthanhtoan+=$thanhtien;
                        //     }
                        // }else{
                        //     echo '<p style="color:red;">Quý khách vui lòng đăng nhập tài khoản để có thể mua sản phẩm hoặc thêm vào giỏ hàng !</p>';
                        // }
                        ?>
                    </ul>
                    <div class="cart-total">
                        <h4>Thành tiền: <span>đ</span></h4>
                    </div>
                    <div class="cart-btn btn-hover">
                        <a class="theme-color" href="?act=giohang">Xem giỏ hàng</a>
                    </div>
                    <?php
                        // if($tongthanhtoan>0){
                        //     echo '<div class="checkout-btn btn-hover">
                        //             <a class="theme-color" href="?act=tieptucdathang">Thanh toán</a>
                        //         </div>';
                        // }
                    ?>
                </div>
            </div>
        </div>
        <div class="message-container" id="thongbaothemgiohang">
            <div id="cart-message">Sản phẩm đã được thêm vào giỏ hàng !</div>
        </div>
        <div>
            @yield('content')
        </div>
        <footer class="footer-area">
            <div class="bg-gray-2">
                <div class="container">
                    <div class="footer-top pt-80 pb-35">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-about mb-40">
                                    <div class="footer-logo">
                                        <h1>X-Shop</h1>
                                    </div>
                                    <p>Đã bán là không lom dom</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-widget-margin-1 footer-list mb-40">
                                    <h3 class="footer-title">Thông tin</h3>
                                    <ul>
                                        <li><a href="#">Tin tức</a></li>
                                        <li><a href="#">Giới thiệu</a></li>
                                        <li><a href="#">Bảo hành</a></li>
                                        <li><a href="#">Đánh giá chất lượng</a></li>
                                        <li><a href="#">Phương thức thanh toán</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-list mb-40">
                                    <h3 class="footer-title">Chính sách</h3>
                                    <ul>
                                        <li><a href="#">Thu cũ đổi mới</a></li>
                                        <li><a href="#">Giao hàng</a></li>
                                        <li><a href="#">Đổi trả</a></li>
                                        <li><a href="#">Bảo hành</a></li>
                                        <li><a href="#">Bảo mật thông tin</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="footer-widget footer-widget-margin-2 footer-address mb-40">
                                    <h3 class="footer-title">Địa chỉ liên hệ</h3>
                                    <ul>
                                        <li><span>Địa chỉ: </span>Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam</li>
                                        <li><span>Liên hệ:</span> (012) 345 6789</li>
                                        <li><span>Email: </span>xshop@gmail.com</li>
                                    </ul>
                                    <div class="open-time">
                                        <p>Giờ mở cửa : <span>8:00 AM</span> <br> Giờ đóng cửa : <span>20:00 PM</span></p>
                                        <p>Thứ bảy - Chủ nhật : Đóng cửa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Product Modal end -->
    </div>
    <!-- All JS is here -->
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/wow.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/aos.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/swiper.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/jquery-ui-touch-punch.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/waypoints.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/jquery.counterup.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/easyzoom.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/slinky.min.js')}}"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/plugins/ajax-mail.js')}}"></script>
    <!--SLIDER RANGER-->
    {{-- <script>
        $(".giaspdau").val(1000);
        $(".giaspcuoi").val(100000000);
        $(function() {
            $('#slider-range').slider({
                min: <?=$spmin['giaspmin']?>,
                max: <?=$spmax['giaspmax']?>,
                values: [<?= isset($giadau) ? ($giadau) : $spmin['giaspmin'] ?>, <?= isset($_POST['giaspcuoi']) ? ($_POST['giaspcuoi']) : ($spmax['giaspmax']/2) ?>],
                slide: function(event, ui) {
                    $('#amount').val("đ" + addPlus(ui.values[0]) + " - đ" + addPlus(ui.values[1]));
                    $(".giaspdau").val(ui.values[0]);
                    $(".giaspcuoi").val(ui.values[1]);
                }
            });
            $('#amount').val("đ" + addPlus($('#slider-range').slider("values", 0)) +
                " - đ" + addPlus($('#slider-range').slider("values", 1)));
        }); 
        function addPlus(nStr){
            nStr+='';
            x=nStr.split('.');
            x1=x[0];
            x2= x.length > 1 ? '.' + x[1] : '';
            var rgx=/(\d+)(\d{3})/;
            while(rgx.test(x1)){
                x1 = x1.replace(rgx, '$1' + '.' + '$2');

            }
            return x1 + x2;
        }
    </script> --}}
    
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <script src="{{ asset('import/assets/giao_dien_home/assets/js/main.js')}}"></script>
    <script src="{{ asset('import/assets/js/cuong.js')}}"></script>
</body>

</html>