(function ($) {
    "use strict";
    
    /*--
    currency active
    -----------------------------------*/
    if ($('.currency-wrap').length) {
        var $body2 = $('body'),
            $urdanDropdown2 = $('.currency-wrap'),
            $urdanDropdownMenu2 = $urdanDropdown2.find('.currency-dropdown');
        $urdanDropdown2.on('click', '.currency-active', function(e) {
            e.preventDefault();
            var $this = $(this);
            if (!$this.parent().hasClass('show')) {
                $this.siblings('.currency-dropdown').addClass('show').slideDown().parent().addClass('show');
            } else {
                $this.siblings('.currency-dropdown').removeClass('show').slideUp().parent().removeClass('show');
            }
        });
        /*Close When Click Outside*/
        $body2.on('click', function(e) {
            var $target = e.target;
            if (!$($target).is('.currency-wrap') && !$($target).parents().is('.currency-wrap') && $urdanDropdown2.hasClass('show')) {
                $urdanDropdown2.removeClass('show');
                $urdanDropdownMenu2.removeClass('show').slideUp();
            }
        });
    }
    
    /*--
    language active
    -----------------------------------*/
    if ($('.language-wrap').length) {
        var $body3 = $('body'),
            $urdanDropdown3 = $('.language-wrap'),
            $urdanDropdownMenu3 = $urdanDropdown3.find('.language-dropdown');
        $urdanDropdown3.on('click', '.language-active', function(e) {
            e.preventDefault();
            var $this = $(this);
            if (!$this.parent().hasClass('show')) {
                $this.siblings('.language-dropdown').addClass('show').slideDown().parent().addClass('show');
            } else {
                $this.siblings('.language-dropdown').removeClass('show').slideUp().parent().removeClass('show');
            }
        });
        /*Close When Click Outside*/
        $body3.on('click', function(e) {
            var $target = e.target;
            if (!$($target).is('.language-wrap') && !$($target).parents().is('.language-wrap') && $urdanDropdown3.hasClass('show')) {
                $urdanDropdown3.removeClass('show');
                $urdanDropdownMenu3.removeClass('show').slideUp();
            }
        });
    }
    
    // Hero slider active old
    // var sliderActive = new Swiper('.slider-active', {
    //     loop: true,
    //     speed: 750,
    //     effect: 'fade',
    //     slidesPerView: 1,
    //     navigation: {
    //         nextEl: '.home-slider-next , .home-slider-next2 , .home-slider-next3',
    //         prevEl: '.home-slider-prev , .home-slider-prev2 , .home-slider-prev3',
    //     }
    // });
    
    //Slider new
    document.addEventListener('DOMContentLoaded', function () {
        var sliderActive = new Swiper('.slider-active', {
            loop: true,
            speed: 750,
            effect: 'fade',
            slidesPerView: 1,
            autoplay: {
                delay: 3000, // 3 giây
                disableOnInteraction: false, // Không dừng autoplay khi tương tác
            },
            navigation: {
                nextEl: '.home-slider-next',
                prevEl: '.home-slider-prev',
            }
        });
    });
    
    /*------ Timer active ----*/
    $('#timer-1-active').syotimer({
        year: 2022,
        month: 12,
        day: 31,
        hour: 23,
        minute: 59,
        layout: 'hms',
        periodic: false,
        periodUnit: 'd'
    });
    
    // Product slider active 1
    var sliderActiveTwo = new Swiper('.product-slider-active-1', {
        loop: true,
        spaceBetween: 30,
        navigation: {
            nextEl: '.product-next-1',
            prevEl: '.product-prev-1',
        },
        breakpoints: {
            320: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2
            },
            768: {
                slidesPerView: 3
            },
            992: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 4
            }
        },
    });
    
    // Brand logo active
    var sliderActiveThree = new Swiper('.brand-logo-active', {
        loop: true,
        spaceBetween: 20,
        breakpoints: {
            320: {
                slidesPerView: 2
            },
            576: {
                slidesPerView: 3
            },
            768: {
                slidesPerView: 4
            },
            992: {
                slidesPerView: 5
            }
        },
    });
    
    
    // Category slider active
    var sliderActiveFour = new Swiper('.category-slider-active', {
        loop: true,
        spaceBetween: 43,
        breakpoints: {
            320: {
                slidesPerView: 2
            },
            576: {
                slidesPerView: 3
            },
            768: {
                slidesPerView: 4
            },
            992: {
                slidesPerView: 5
            }
        },
    });
    
    // Category slider active 2
    var sliderActiveFive = new Swiper('.category-slider-active-2', {
        loop: true,
        spaceBetween: 30,
        slidesPerView: 6,
        breakpoints: {
            320: {
                slidesPerView: 2
            },
            479: {
                slidesPerView: 3
            },
            576: {
                slidesPerView: 3
            },
            768: {
                slidesPerView: 4
            },
            992: {
                slidesPerView: 5
            }
        },
    });
    
    // Product slider active 2
    var sliderActiveSix = new Swiper('.product-slider-active-2', {
        loop: true,
        spaceBetween: 30,
        breakpoints: {
            320: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2
            },
            768: {
                slidesPerView: 3
            },
            992: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 4
            }
        },
    });
    
    // Testimonial active
    var sliderActiveSeven = new Swiper('.testimonial-active', {
        loop: true,
        spaceBetween: 30,
        centeredSlides: true,
        breakpoints: {
            320: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 1
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 3
            }
        },
    });
    
    /*----------------------------
    	Cart Plus Minus Button
    ------------------------------ */
    // $(".qtybutton").on("click", function() {
    //     var $button = $(this);
    //     var oldValue = $button.parent().find("input[name='qtybutton']").val();
    //     var oldgiakm = $button.parent().find("input[name='giakm']").val();
    //     var oldthanhtien = $button.parent().find("input[name='thanhtien']");
    //     var thanhtienText=$button.parent().parent().parent().find(".product-total span");
    //     if ($button.text() === "+") {
    //         var newVal = parseFloat(oldValue) + 1;
    //         //code vao day
    //         //end code
    //     } else {
    //         if (oldValue > 1) {
    //             var newVal = parseFloat(oldValue) - 1;
    //             //code vao day
    //             //end code
    //         } else {
    //             newVal = 1;
    //         }
    //     }
    //     oldthanhtien.val(parseInt(oldgiakm)*parseFloat(newVal));
    //     thanhtienText.text((parseInt(oldgiakm)*parseFloat(newVal)).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }));
    //     $button.parent().find("input[name='qtybutton']").val(newVal);
    //     tongthanhtoan();
    //     var idsp = $button.parent().find("input[name='idsp']").val();
    //     var soluong=$button.parent().find("input[name='qtybutton']").val();
    //     var thanhtien=$button.parent().find("input[name='thanhtien']").val();
    //     $.ajax({
    //         type: "POST",
    //         url: "index.php?act=giohang",
    //         data: {
    //             id: idsp,
    //             soluong: soluong,
    //             thanhtien: thanhtien
    //         },
    //         success: function(response) {
                
    //           },
    //           error: function(error) {
    //             console.error('Lỗi: ', error);
    //             alert('Có lỗi xảy ra');
    //           }
    //     });
        
    // });
    // function tongthanhtoan(){
    //     var tong=0;
    //     var arrTr=document.querySelectorAll(".trgiohang");
    //     arrTr.forEach(function(element){
    //         var thanhtien=element.querySelector("input[name='thanhtien']").value;
    //         tong+=parseInt(thanhtien);
    //     })
    //     var tongthanhtoantext=document.querySelector("#tongthanhtoan");
    //     tongthanhtoantext.innerHTML=tong.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    // }
    /*------ ScrollUp -------- */
    $.scrollUp({
        scrollText: '<i class=" ti-arrow-up "></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    
    /*-----------------
        Menu Stick
    -----------------*/
    var header = $('.sticky-bar');
    var $window = $(window);
    $window.on('scroll', function() {
        var scroll = $window.scrollTop();
        if (scroll < 100) {
            header.removeClass('stick');
        } else {
            header.addClass('stick');
        }
    });
    
    /*-------------------------------
	   Header Search Toggle
    -----------------------------------*/
    var searchToggle = $('.search-toggle');
    searchToggle.on('click', function(e){
        e.preventDefault();
        if($(this).hasClass('open')){
           $(this).removeClass('open');
           $(this).siblings('.search-wrap-1').removeClass('open');
        }else{
           $(this).addClass('open');
           $(this).siblings('.search-wrap-1').addClass('open');
        }
    })
    
    /*====== SidebarCart ======*/
    function miniCart() {
        var navbarTrigger = $('.cart-active'),
            endTrigger = $('.cart-close'),
            container = $('.sidebar-cart-active'),
            wrapper = $('.main-wrapper');
        
        wrapper.prepend('<div class="body-overlay"></div>');
        
        navbarTrigger.on('click', function(e) {
            e.preventDefault();
            container.addClass('inside');
            wrapper.addClass('overlay-active');
        });
        
        endTrigger.on('click', function() {
            container.removeClass('inside');
            wrapper.removeClass('overlay-active');
        });
        
        $('.body-overlay').on('click', function() {
            container.removeClass('inside');
            wrapper.removeClass('overlay-active');
        });
    };
    miniCart();
    
    /*====== product-color-active ======*/
    $(".product-color-active ul li a").on('click', function(e) {
        e.preventDefault();
        $(".product-color-active ul li a").removeClass("active");
        $(this).addClass("active");
    });
    
    /*--------------------------
        Isotope active 1
    ---------------------------- */
    $('.grid').imagesLoaded(function() {
        // init Isotope
        $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            layoutMode: 'masonry',
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.grid-sizer',
            }
        });
    });
    
    /*---------------------
        Price range
    --------------------- */
    
    
    
    /* NiceSelect */
    $('.nice-select').niceSelect();
    
    /*---- CounterUp ----*/
    $('.count').counterUp({
        delay: 10,
        time: 2000
    });
    
    /*---------------------
        Select active
    --------------------- */
    $('.select-two-active').select2();
    $(window).on('resize', function(){
        $('.select-two-active').select2()
    });
    
    /*--- checkout toggle function ----*/
    $('.checkout-click1').on('click', function(e) {
        e.preventDefault();
        $('.checkout-login-info').slideToggle(900);
    });
    
    
    /*--- checkout toggle function ----*/
    $('.checkout-click3').on('click', function(e) {
        e.preventDefault();
        $('.checkout-login-info3').slideToggle(1000);
    });
    
    /*-------------------------
    Create an account toggle
    --------------------------*/
    $('.checkout-toggle2').on('click', function() {
        $('.open-toggle2').slideToggle(1000);
    });
    
    $('.checkout-toggle').on('click', function() {
        $('.open-toggle').slideToggle(1000);
    });
    
    /*-------------------------
    checkout one click toggle function
    --------------------------*/
    var checked = $( '.sin-payment input:checked' )
    if(checked){
        $(checked).siblings( '.payment-box' ).slideDown(900);
    };
	 $( '.sin-payment input' ).on('change', function() {
        $( '.payment-box' ).slideUp(900);
        $(this).siblings( '.payment-box' ).slideToggle(900);
    });
    
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();
    
    /*----------------------------------------
		Product details small img slider 1
    -----------------------------------------*/
    var productDetailsSmallOne = new Swiper('.product-details-small-img-slider-1', {
        loop: false,
        spaceBetween: 12,
        slidesPerView: 4,
        direction: 'vertical',
        navigation: {
            nextEl: '.pd-next',
            prevEl: '.pd-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
            },
            576: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        }
    });
    
    /*----------------------------------------
		Product details big img slider 1
    -----------------------------------------*/
    var productDetailsBigThree = new Swiper('.product-details-big-img-slider-1', {
        autoplay: false,
        delay: 5000,
        slidesPerView: 1,
        loop: false,
        thumbs: {
            swiper: productDetailsSmallOne
        }
    });
    
    /*----------------------------------------
		Product details small img slider 2
    -----------------------------------------*/ 
    var productDetailsSmallTwo = new Swiper('.product-details-small-img-slider-2', {
        loop: false,
        spaceBetween: 20,
        slidesPerView: 4,
        navigation: {
            nextEl: '.pd-next-2',
            prevEl: '.pd-prev-2',
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
            },
            479: {
                slidesPerView: 3,
            },
            576: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        }
    });
    
    /*----------------------------------------
		Product details big img slider 2
    -----------------------------------------*/
    var productDetailsBigTwo = new Swiper('.product-details-big-img-slider-2', {
        autoplay: false,
        delay: 5000,
        slidesPerView: 1,
        loop: false,
        thumbs: {
            swiper: productDetailsSmallTwo
        }
    });
    
    // Related product active
    var relatedProductActive = new Swiper('.related-product-active', {
        loop: true,
        spaceBetween: 30,
        breakpoints: {
            320: {
                slidesPerView: 1
            },
            576: {
                slidesPerView: 2
            },
            768: {
                slidesPerView: 3
            },
            992: {
                slidesPerView: 3
            },
            1200: {
                slidesPerView: 4
            }
        },
    });
    
    /*-----------------------
        Image Popup active
    ------------------------*/
    $('.img-popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    
    /*====== mobile-menu active ======*/
    const slinky = $('#mobile-menu').slinky();
    const slinky2 = $('#mobile-currency').slinky();
    const slinky3 = $('#mobile-language').slinky();
    
    /*====== off canvas active ======*/
    function mobileMainMenu() {
        var navbarTrigger = $('.mobile-menu-active-button'),
            endTrigger = $('.off-canvas-close'),
            container = $('.off-canvas-active'),
            wrapper = $('.main-wrapper-2');
        
        wrapper.prepend('<div class="body-overlay-2"></div>');
        
        navbarTrigger.on('click', function(e) {
            e.preventDefault();
            container.addClass('inside');
            wrapper.addClass('overlay-active-2');
        });
        
        endTrigger.on('click', function() {
            container.removeClass('inside');
            wrapper.removeClass('overlay-active-2');
        });
        
        $('.body-overlay-2').on('click', function() {
            container.removeClass('inside');
            wrapper.removeClass('overlay-active-2');
        });
    };
    mobileMainMenu();
    
    /*-------------------------
      Scroll Animation
    --------------------------*/
    AOS.init({
        once: true,
        duration: 1000,
    });
    
})(jQuery);

