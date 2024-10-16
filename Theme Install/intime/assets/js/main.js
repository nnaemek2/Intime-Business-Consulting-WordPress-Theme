;(function ($) {

    "use strict";

    /* ===================
     Page reload
     ===================== */
    var scroll_top;
    var window_height;
    var window_width;
    var scroll_status = '';
    var lastScrollTop = 0;
    $(window).on('load', function () {
        $(".ct-loader").fadeOut("slow");
        window_width = $(window).width();
        intime_col_offset();
        intime_header_sticky();
        intime_scroll_to_top();
        intime_quantity_icon();
        intime_footer_fixed();
        intime_mouse_move();
        setTimeout(function(){
            $('body:not(.elementor-editor-active) .ct-slick-slider').css('height', 'auto');
            $('body:not(.elementor-editor-active) .ct-slick-slider').css('overflow', 'visible');
            $('body:not(.elementor-editor-active) .ct-slick-slider').css('opacity', '1');
        }, 100);
    });
    $(window).on('resize', function () {
        window_width = $(window).width();
        intime_col_offset();
        intime_footer_fixed();
    });

    $(window).on('scroll', function () {
        scroll_top = $(window).scrollTop();
        window_height = $(window).height();
        window_width = $(window).width();
        if (scroll_top < lastScrollTop) {
            scroll_status = 'up';
        } else {
            scroll_status = 'down';
        }
        lastScrollTop = scroll_top;
        intime_header_sticky();
        intime_scroll_to_top();
    });

    $(document).on('click', '.h-btn-search', function () {
        $('.ct-modal-search').addClass('open').removeClass('remove');
        $('body').addClass('ov-hidden');
        setTimeout(function(){
            $('.ct-modal-search .search-field').focus();
        },1000);
    });

    $(document).ready(function () {

        /* =================
         Menu Dropdown
         =================== */
        var $menu = $('.ct-main-navigation');
        $menu.find('.ct-main-menu li').each(function () {
            var $submenu = $(this).find('> ul.sub-menu');
            if ($submenu.length == 1) {
                $(this).hover(function () {
                    if ($submenu.offset().left + $submenu.width() > $(window).width()) {
                        $submenu.addClass('back');
                    } else if ($submenu.offset().left < 0) {
                        $submenu.addClass('back');
                    }
                }, function () {
                    $submenu.removeClass('back');
                });
            }
        });

        /* =================
         Menu Mobile
         =================== */
        $('.ct-main-navigation li.menu-item-has-children').append('<span class="ct-menu-toggle far fac-angle-down"></span>');
        $('.ct-menu-toggle').on('click', function () {
            $(this).toggleClass('toggle-open');
            $(this).parent().find('> .sub-menu').toggleClass('submenu-open');
            $(this).parent().find('> .sub-menu').slideToggle();
        });

        $(".ct-main-menu li a.is-one-page").on('click', function () {
           $(this).parents('.ct-header-navigation').removeClass('navigation-open');
           $(this).parents('.ct-header-main').find('.btn-nav-mobile').removeClass('opened');
        });
        
        $("#ct-menu-mobile .open-menu").on('click', function () {
            $(this).toggleClass('opened');
            $('.ct-header-navigation').toggleClass('navigation-open');
        });

        $(".ct-menu-close").on('click', function () {
            $(this).parents('.header-navigation').removeClass('navigation-open');
            $('.ct-menu-overlay').removeClass('active');
            $('#ct-menu-mobile .open-menu').removeClass('opened');
            $('body').removeClass('ovhidden');
        });

        $(".ct-menu-overlay").on('click', function () {
            $(this).parents('#header-main').find('.header-navigation').removeClass('navigation-open');
            $(this).removeClass('active');
            $('#ct-menu-mobile .open-menu').removeClass('opened');
            $('.header-navigation').removeClass('navigation-open');
            $('body').removeClass('ovhidden');
        });

        if (window_width < 1199) {
            $('.ct-main-menu li.menu-item-has-children > a').on("click", function (e) {
                e.preventDefault();
                $(this).parent().find('> .sub-menu, > .children').toggleClass('submenu-open');
                $(this).parent().find('> .sub-menu, > .children').slideToggle();
                $(this).parent().find('> .ct-menu-toggle').toggleClass('toggle-open');
            });
        }

        /* ===================
         Search Toggle
         ===================== */
        $('.h-btn-form').click(function (e) {
            e.preventDefault();
            $('.ct-modal-contact-form').removeClass('remove').toggleClass('open');
        });

        setTimeout(function(){
            $('.ct-close, .ct-close .ct-icon-close').click(function (e) {
                e.preventDefault();
                $(this).parents('.ct-widget-cart-wrap').removeClass('open');
                $(this).parents('.ct-modal').addClass('remove').removeClass('open');
                $(this).parents('#page').find('.site-overlay').removeClass('open');
                $(this).parents('body').removeClass('ov-hidden');
            });
        }, 300);

        $('.ct-hidden-sidebar-overlay, .ct-widget-cart-overlay').click(function (e) {
            e.preventDefault();
            $(this).parent().toggleClass('open');
            $(this).parents('body').removeClass('ov-hidden');
        });

        /* Video 16:9 */
        $('.entry-video iframe').each(function () {
            var v_width = $(this).width();

            v_width = v_width / (16 / 9);
            $(this).attr('height', v_width + 35);
        });

        /* Video Light Box */
        $('.ct-video-button, .btn-video, .slider-video').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        
        /* ====================
         Scroll To Top
         ====================== */
        $('.scroll-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        /* =================
        Add Class
        =================== */
        $('.wpcf7-select').parent().addClass('wpcf7-menu');
        

        /* =================
         The clicked item should be in center in owl carousel
         =================== */
        var $owl_item = $('.owl-active-click');
        $owl_item.children().each(function (index) {
            $(this).attr('data-position', index);
        });
        $(document).on('click', '.owl-active-click .owl-item > div', function () {
            $owl_item.trigger('to.owl.carousel', $(this).data('position'));
        });

        /* Select */
        $('select:not([id*="ui-id-"]):not(#billing_country):not(#shipping_country):not(#billing_state):not(.gt_selector):not(.wpforms-form)').each(function () {
            $(this).niceSelect();
        });

        /* Search */
        $('.ct-modal-close').on('click', function () {
            $(this).parent().removeClass('open').addClass('remove');
            $(this).parents('body').removeClass('ov-hidden');
        });
        $(document).on('click', function (e) {
            if (e.target.className == 'ct-modal ct-modal-search open')
                $('.ct-modal-search').removeClass('open').addClass('remove');
            if (e.target.className == 'ct-hidden-sidebar open')
                $('.ct-hidden-sidebar').removeClass('open');
        });

        /* Hidden Sidebar */
        $(".h-btn-sidebar").on('click', function (e) {
            e.preventDefault();
            $('.ct-hidden-sidebar-wrap').toggleClass('open');
            $(this).parents('body').addClass('ov-hidden');
        });

        $(".ct-hidden-close").on('click', function (e) {
            e.preventDefault();
            $(this).parents('.ct-hidden-sidebar-wrap').removeClass('open');
            $(this).parents('body').removeClass('ov-hidden');
        });

        /* Cart Sidebar */
        $(".h-btn-cart, .btn-nav-cart").on('click', function (e) {
            e.preventDefault();
            $('.ct-widget-cart-wrap').toggleClass('open');
            $('.ct-header-navigation').removeClass('navigation-open');
            $('#ct-menu-mobile .open-menu').removeClass('opened');
            $(this).parents('body').addClass('ov-hidden');
        });

        /* Year Copyright */
        var _year_footer = $(".ct-footer-year"),
            _year_clone = _year_footer.parents(".site").find('.ct-year');
        _year_clone.after(_year_footer.clone());
        _year_footer.remove();
        _year_clone.remove();

        /* Comment Reply */
        $('.comment-reply a').append( '<i class="fa fa-angle-right"></i>' );

        /* Nav Slider */
        setTimeout(function () {
            $('.revslider-initialised').each(function () {
                $(this).find('.ct-slider-nav .slider-nav-right').on('click', function () {
                    $(this).parents('.revslider-initialised').find('.tp-rightarrow').trigger('click');
                });
                $(this).find('.ct-slider-nav .slider-nav-left').on('click', function () {
                    $(this).parents('.revslider-initialised').find('.tp-leftarrow').trigger('click');
                });
            });
            $('.ct-slider-nav').parents('.revslider-initialised').find('.tparrows').addClass('arrow-hidden');
        }, 300);

        /* Icon Form */
        setTimeout(function () {
            $('.input-filled').each(function () {
                var icon_input = $(this).find(".input-icon"),
                    control_wrap = $(this).find('.wpcf7-form-control');
                control_wrap.before(icon_input.clone());
                icon_input.remove();
            });
        }, 200);

        /* Same Height */
        $('.same-height').matchHeight();
        $('.ct-counter-layout3 .ct-counter-inner').matchHeight();
        $('.ct-client-grid1 .grid-item').matchHeight();

        /* Demo Bar */
        $(".choose-demo").on('click', function () {
            $(this).parents('.ct-demo-bar').toggleClass('active');
        });

        /* Animate Time */
        $('.animate-time').each(function () {
            var eltime = 100;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .grid-item > .wow').each(function (index, obj) {
                $(this).css('animation-delay', eltime + 'ms');
                if (_elt === index) {
                    eltime = 100;
                    _elt = _elt + elt_inner;
                } else {
                    eltime = eltime + 80;
                }
            });
        });

        $('.case-animate-time').each(function () {
            var eltime = 0;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .slide-in-container > .wow').each(function (index, obj) {
                $(this).css('transition-delay', eltime + 'ms');
                if (_elt === index) {
                    eltime = 0;
                    _elt = _elt + elt_inner;
                } else {
                    eltime = eltime + 150;
                }
            });
        });

        /* Showcase */
        $('.ct-showcase-link').each(function () {
            $(this).hover(function () {
                $(this).parents('.ct-showcase-image').find('.ct-showcase-link').removeClass('active');
                $(this).addClass('active');
            });
        });

        /* Blog */
        $( ".ct-blog-grid-layout1 .grid-item-inner, .ct-blog-carousel-layout1 .grid-item-inner" ).hover(
          function() {
            $( this ).find('.item--readmore').slideToggle(300);
            $( this ).find('.item--meta').slideToggle(300);
          }, function() {
            $( this ).find('.item--readmore').slideToggle(300);
            $( this ).find('.item--meta').slideToggle(300);
          }
        );

        /* Team */
        $( ".ct-team-grid1 .item--inner, .ct-team-carousel2 .item--inner" ).hover(
          function() {
            $( this ).find('.item--description').slideToggle(200);
          }, function() {
            $( this ).find('.item--description').slideToggle(200);
          }
        );

        /* Fancy Box */
        $( ".ct-fancy-box-layout5" ).hover(
          function() {
            $( this ).find('.item--title').slideToggle(300);
          }, function() {
            $( this ).find('.item--title').slideToggle(300);
          }
        );

        /* Point Focus */
        $('.ct-point-item, .ct-branche1').each(function () {
            var PointClassName = $(this).children("div").attr('class');
            var BrancheClassName = $(this).children("div").attr('class');
            $( "."+ PointClassName ).hover(
              function() {
                $( this ).parents('.site-content').find(".ct-branche1 ."+ BrancheClassName).addClass('active-point');
              }, function() {
                $( this ).parents('.site-content').find(".ct-branche1 ."+ BrancheClassName).removeClass('active-point');
              }
            );
        });

        /* Page Title Scroll Opacity */
        var fadeStart=240,fadeUntil=440,fading = $('.page-title-inner');
        $(window).bind('scroll', function(){
            var offset = $(document).scrollTop()
                ,opacity=0
            ;
            if( offset<=fadeStart ){
                opacity=1;
            }else if( offset<=fadeUntil ){
                opacity=1-offset/fadeUntil;
            }
            fading.css('opacity',opacity);
        });

        /* Overlay particle */
        setTimeout(function(){
            $('.elementor > .elementor-element, .elementor-section-wrap > .elementor-element').each(function () {
                var _el_particle = $(this).find(".ct-particle-animate"),
                    _row_particle = _el_particle.parents(".elementor-container");
                _row_particle.before(_el_particle.clone());
                _el_particle.remove();
                
                var _el_bg_animate = $(this).find(".ct-background-animate"),
                    _row_bg_animate = _el_bg_animate.parents(".elementor-container");
                _row_bg_animate.before(_el_bg_animate.clone());
                _el_bg_animate.remove();

                var _el_text = $(this).find(".ct-text"),
                    _row_text = _el_text.parents(".elementor-container");
                _row_text.before(_el_text.clone());
                _el_text.remove();
            });
        }, 200);

        /* Mega Menu */
        $('.mega-2-columns').parents('.sub-menu').addClass('ct-mega-2-columns');
        $('.mega-2-columns').parents('li.megamenu').addClass('ct-megamenu-columns');

        var m_h_mega = $('li.megamenu > .sub-menu > li > .container').outerHeight();
        var w_h_mega = $(window).height();
        var w_h_mega_css = w_h_mega - 100;
        if(m_h_mega > w_h_mega && window_width < 1400) {
            $('li.megamenu > .sub-menu > li > .container').css('max-height', w_h_mega_css + 'px');
            $('li.megamenu > .sub-menu > li > .container').css('overflow-x', 'scroll');
        }

        /* Pricing */
        $(".ct-pricing-tab-active .ct-pricing-tab-item").on('click', function () {
            $(this).parent().find('.ct-pricing-tab-item').removeClass('active');
            $(this).addClass('active');
        });
        $(".ct-pricing-tab-active .title-tab-monthly").on('click', function () {
            $(this).parents('.ct-pricing').find('.ct-pricing-monthly').removeClass('ct-pricing-hide');
            $(this).parents('.ct-pricing').find('.ct-pricing-year').addClass('ct-pricing-hide');
        });
        $(".ct-pricing-tab-active .title-tab-year").on('click', function () {
            $(this).parents('.ct-pricing').find('.ct-pricing-year').removeClass('ct-pricing-hide');
            $(this).parents('.ct-pricing').find('.ct-pricing-monthly').addClass('ct-pricing-hide');
        });

    });

    function intime_header_sticky() {
        var offsetTop = $('#ct-header-wrap').outerHeight();
        var offsetTopAnimation = offsetTop + 100;
        if($('#ct-header-wrap').hasClass('is-sticky')) {
            if (scroll_top > offsetTop) {
                $('#ct-header').addClass('h-fixed');
            } else {
                $('#ct-header').removeClass('h-fixed');   
            }
        }

        var h_header_top, h_header_middle, h_header_main;

        if ($('.fixed-height #ct-header-top').length) { 
            h_header_top = $('.fixed-height #ct-header-top').outerHeight();
        } else {
            h_header_top = 0;
        }

        if ($('.fixed-height #ct-header-middle').length) { 
            h_header_middle = $('.fixed-height #ct-header-middle').outerHeight();
        } else {
            h_header_middle = 0;
        }

        if ($('.fixed-height #ct-header').length) { 
            h_header_main = $('.fixed-height #ct-header').outerHeight();
        } else {
            h_header_main = 0;
        }

        var h_header_all = h_header_top + h_header_middle + h_header_main;
        if (window_width > 1200) {
            $('.fixed-height').css({
                'height': h_header_all
            });
        }

        if (window_width > 1200) {
            $('.fixed-height').css({
                'max-height': offsetTop
            });
        }

        if (window_width > 1200) {
            $('.fixed-height-h').css({
                'height': offsetTop
            });
        }

        if (scroll_status == 'up' && scroll_top > 0) {
            $('#ct-header').addClass('scroll-up');
        } else {
            $('#ct-header').removeClass('scroll-up');
        }
        if (scroll_status == 'down') {
            $('#ct-header').addClass('scroll-down');
        } else {
            $('#ct-header').removeClass('scroll-down');
        }
        if (scroll_status == 'down' && scroll_top > offsetTopAnimation) {
            $('#ct-header').addClass('scroll-animate');
        } else {
            $('#ct-header').removeClass('scroll-animate');
        }

        setTimeout(function(){
            $('.md-align-center').parents('.rs-parallax-wrap').addClass('pxl-group-center');
        }, 300);
    }

    /* ====================
     Mouse Move
     ====================== */
    function intime_mouse_move() {
        if ($('#ct-mouse-move').hasClass('ct-mouse-move')) {
            var follower, init, mouseX, mouseY, positionElement, timer;

            follower = document.getElementById('ct-mouse-move');

            mouseX = (event) => {
                return event.clientX;
            };

            mouseY = (event) => {
                return event.clientY;
            };

            positionElement = (event) => {
                var mouse;
                mouse = {
                    x: mouseX(event),
                    y: mouseY(event)
                };

                follower.style.top = mouse.y + 'px';
                return follower.style.left = mouse.x + 'px';
            };

            timer = false;

            window.onmousemove = init = (event) => {
                var _event;
                _event = event;
                    return timer = setTimeout(() => {
                    return positionElement(_event);
                }, 0);
            };
        }
    }

    /* =================
     Column Offset
     =================== */
    function intime_col_offset() {
        var w_vc_row_lg = ($('#content').width() - 1200) / 2;
        if (window_width > 1200) {
            $('body:not(.rtl) .col-offset-left > .elementor-column-wrap > .elementor-widget-wrap, body:not(.rtl) .col-offset-left > .elementor-widget-wrap').css('padding-left', w_vc_row_lg + 'px');
            $('body:not(.rtl) .col-offset-right > .elementor-column-wrap > .elementor-widget-wrap, body:not(.rtl) .col-offset-right > .elementor-widget-wrap').css('padding-right', w_vc_row_lg + 'px');

            $('.rtl .col-offset-left > .elementor-column-wrap > .elementor-widget-wrap, .rtl .col-offset-left > .elementor-widget-wrap').css('padding-right', w_vc_row_lg + 'px');
            $('.rtl .col-offset-right > .elementor-column-wrap > .elementor-widget-wrap, .rtl .col-offset-right > .elementor-widget-wrap').css('padding-left', w_vc_row_lg + 'px');
        }
    }

    /* =================
     Footer Fixed
     =================== */
    function intime_footer_fixed() {
        setTimeout(function(){
            var h_footer = $('.fixed-footer .site-footer-custom').outerHeight() - 1;
            $('.fixed-footer .site-content').css('margin-bottom', h_footer + 'px');
        }, 300);
    }

    /* ====================
     Scroll To Top
     ====================== */
    function intime_scroll_to_top() {
        if (scroll_top < window_height) {
            $('.scroll-top').addClass('off').removeClass('on');
        }
        if (scroll_top > window_height) {
            $('.scroll-top').addClass('on').removeClass('off');
        }
    }

    /* ====================
     WooComerce Quantity
     ====================== */
    function intime_quantity_icon() {
        $('#content .quantity').append('<span class="quantity-icon"><i class="quantity-down fa fa-sort-desc"></i><i class="quantity-up fa fa-sort-asc"></i></span>');
        $('.quantity-up').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepUp();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.quantity-down').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepDown();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.woocommerce-cart-form .actions .button').removeAttr('disabled');
    }

    $( document ).ajaxComplete(function() {
       intime_quantity_icon();
    });

})(jQuery);
