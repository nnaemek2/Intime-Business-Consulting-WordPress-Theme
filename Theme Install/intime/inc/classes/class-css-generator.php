<?php
if ( ! class_exists( 'ReduxFrameworkInstances' ) ) {
	return;
}

if(!function_exists('intime_hex_to_rgba')){
    function intime_hex_to_rgba($hex,$opacity = 1) {
        $hex = str_replace("#",null, $hex);
        $color = array();
        if(strlen($hex) == 3) {
            $color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
            $color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
            $color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
            $color['a'] = $opacity;
        }
        else if(strlen($hex) == 6) {
            $color['r'] = hexdec(substr($hex, 0, 2));
            $color['g'] = hexdec(substr($hex, 2, 2));
            $color['b'] = hexdec(substr($hex, 4, 2));
            $color['a'] = $opacity;
        }
        $color = "rgba(".implode(', ', $color).")";
        return $color;
    }
}

class CSS_Generator {
	/**
     * scssc class instance
     *
     * @access protected
     * @var scssc
     */
    protected $scssc = null;

    /**
     * ReduxFramework class instance
     *
     * @access protected
     * @var ReduxFramework
     */
    protected $redux = null;

    /**
     * Debug mode is turn on or not
     *
     * @access protected
     * @var boolean
     */
    protected $dev_mode = true;

    /**
     * opt_name of ReduxFramework
     *
     * @access protected
     * @var string
     */
    protected $opt_name = '';

	/**
	 * Constructor
	 */

	function __construct() {
		$this->opt_name = intime_get_opt_name();
		if ( empty( $this->opt_name ) ) {
			return;
		}
		$this->dev_mode = intime_get_opt( 'dev_mode', '0' ) === '1' ? true : false;
		add_filter( 'ct_scssc_on', '__return_true' );
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 20 );
	}

	/**
	 * init hook - 10
	 */
	function init() {
		if ( ! class_exists( 'scssc' ) ) {
			return;
		}

		$this->redux = ReduxFrameworkInstances::get_instance( $this->opt_name );

		if ( empty( $this->redux ) || ! $this->redux instanceof ReduxFramework ) {
			return;
		}
		add_action( 'wp', array( $this, 'generate_with_dev_mode' ) );
		add_action( "redux/options/{$this->opt_name}/saved", function () {
			$this->generate_file_options();
		} );
	}

	function generate_with_dev_mode() {
		if ( $this->dev_mode === true ) {
			$this->generate_file_options();
			$this->generate_file();
		}
	}

	function generate_file_options() {
		$scss_dir = get_template_directory() . '/assets/scss/';
        $this->scssc = new scssc();
        $this->scssc->setImportPaths( $scss_dir );
        $_options = $scss_dir . 'variables.scss';
        $this->scssc->setFormatter( 'scss_formatter' );
        $this->redux->filesystem->execute( 'put_contents', $_options, array(
            'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->options_output() )
        ) );
	}

	/**
	 * Generate options and css files
	 */
	function generate_file() {
		$scss_dir = get_template_directory() . '/assets/scss/';
		$css_dir  = get_template_directory() . '/assets/css/';

		$this->scssc = new scssc();
		$this->scssc->setImportPaths( $scss_dir );

		$css_file = $css_dir . 'theme.css';

		$this->scssc->setFormatter( 'scss_formatter' );
		$this->redux->filesystem->execute( 'put_contents', $css_file, array(
			'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->scssc->compile( '@import "theme.scss"' ) )
		) );
	}

	protected function print_scss_opt_colors($variable,$param){
        if(is_array($variable)){
            $k = [];
            $v = [];
            foreach ($variable as $key => $value) {
                $k[] = str_replace('-', '_', $key);
                $v[] = 'var(--'.str_replace(['#',' '], [''],$key).'-color)';
            }
            if($param === 'key'){
                return implode(',', $k);
            }else{
                return implode(',', $v);
            }
            
        } else {
            return $variable;
        }
    }

	/**
	 * Output options to _variables.scss
	 *
	 * @access protected
	 * @return string
	 */
	protected function options_output() {
		$theme_colors                    = intime_configs('theme_colors');
        $links                           = intime_configs('link');
        $gradients                           = intime_configs('gradient');
		ob_start();

		printf('$intime_theme_colors_key:(%s);',$this->print_scss_opt_colors($theme_colors,'key'));
        printf('$intime_theme_colors_val:(%s);',$this->print_scss_opt_colors($theme_colors,'val'));
        // color rgb only
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color_hex: %2$s;', str_replace('-', '_', $key), $value['value']); 
        }
        // color
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color: %2$s;', str_replace('-', '_', $key), 'var(--'.str_replace(['#',' '], [''],$key).'-color)' );
        }

        // color rgb only
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color_hex: %2$s;', str_replace('-', '_', $key), $value['value']); 
        }
        // color
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color: %2$s;', str_replace('-', '_', $key), 'var(--'.str_replace(['#',' '], [''],$key).'-color)' );
        }
         
        // link color
        foreach ($links as $key => $value) {
            printf('$link_%1$s: %2$s;', str_replace('-', '_', $key), 'var(--link-'.$key.')');
        }

        // gradient color
        foreach ($gradients as $key => $value) {
            printf('$gradient_%1$s: %2$s;', str_replace('-', '_', $key), 'var(--gradient-'.$key.')');
        }

        // gradient color hex
        /* Gradient Color Main */
        $gradient_color_hex = intime_get_opt( 'gradient_color' );
        if ( !empty($gradient_color_hex['from']) && isset($gradient_color_hex['from']) ) {
            printf( '$gradient_from_hex: %s;', esc_attr( $gradient_color_hex['from'] ) );
        } else {
            echo '$gradient_from_hex: #8d4cfa;';
        }
        if ( !empty($gradient_color_hex['to']) && isset($gradient_color_hex['to']) ) {
            printf( '$gradient_to_hex: %s;', esc_attr( $gradient_color_hex['to'] ) );
        } else {
            echo '$gradient_to_hex: #5f6ffb;';
        }


		/* Font */
		$body_default_font = intime_get_opt( 'body_default_font', 'Roboto' );
		if ( isset( $body_default_font ) ) {
			echo '
                $body_default_font: ' . esc_attr( $body_default_font ) . ';
            ';
		}

		$heading_default_font = intime_get_opt( 'heading_default_font', 'Libre-Caslon-Text' );
		if ( isset( $heading_default_font ) ) {
			echo '
                $heading_default_font: ' . esc_attr( $heading_default_font ) . ';
            ';
		}

		return ob_get_clean();
	}

	/**
	 * Hooked wp_enqueue_scripts - 20
	 * Make sure that the handle is enqueued from earlier wp_enqueue_scripts hook.
	 */
	function enqueue() {
		$css = $this->inline_css();
		if ( ! empty( $css ) ) {
			wp_add_inline_style( 'intime-theme', $css );
		}
	}

	/**
	 * Generate inline css based on theme options
	 */
	protected function inline_css() {
		ob_start();

		/* Logo */
		$logo_maxh = intime_get_opt( 'logo_maxh' );
		$logo_maxh_sticky = intime_get_opt( 'logo_maxh_sticky' );

		if ( ! empty( $logo_maxh['height'] ) && $logo_maxh['height'] != 'px' ) {
			printf( '#ct-header-wrap .ct-header-branding a img { max-height: %s !important; }', esc_attr( $logo_maxh['height'] ) );
		} 
		if ( ! empty( $logo_maxh_sticky['height'] ) && $logo_maxh_sticky['height'] != 'px' ) {
			printf( '#ct-header-wrap #ct-header.h-fixed .ct-header-branding a img { max-height: %s !important; }', esc_attr( $logo_maxh_sticky['height'] ) );
		}

		?>
        @media screen and (max-width: 1199px) {
		<?php
			$logo_maxh_sm = intime_get_opt( 'logo_maxh_sm' );
			if ( ! empty( $logo_maxh_sm['height'] ) && $logo_maxh_sm['height'] != 'px' ) {
				printf( '#ct-header-wrap .ct-header-branding a img { max-height: %s !important; }', esc_attr( $logo_maxh_sm['height'] ) );
			} ?>
        }
        <?php /* End Logo */

		/* Menu */ ?>
		@media screen and (min-width: 1200px) {
		<?php  
			$topbar_bg_color = intime_get_opt( 'topbar_bg_color' );
			$header_bg_color = intime_get_opt( 'header_bg_color' );
			if ( ! empty( $topbar_bg_color ) ) {
				printf( '#ct-header-top, .ct-header-layout2 #ct-header-middle { background-color: %s !important; }', esc_attr( $topbar_bg_color ) );
			}

			if ( ! empty( $header_bg_color ) ) {
				printf( '#ct-header-wrap #ct-header, #ct-header-wrap #ct-header .ct-header-navigation-bg { background-color: %s !important; }', esc_attr( $header_bg_color ) );
				printf( '#ct-header-wrap.ct-header-layout3 #ct-header { background-color: transparent !important; }', esc_attr( $header_bg_color ) );

				printf( '#ct-header-wrap.ct-header-layout3 #ct-header.h-fixed { background-color: %s !important; }', esc_attr( $header_bg_color ) );
				printf( '#ct-header-wrap.ct-header-layout3 #ct-header.h-fixed .ct-header-navigation-bg { background-color: transparent !important; }', esc_attr( $header_bg_color ) );
			}

			$main_menu_color = intime_get_opt( 'main_menu_color' );
			if ( ! empty( $main_menu_color['regular'] ) ) {
				printf( '.ct-main-menu > li > a { color: %s !important; }', esc_attr( $main_menu_color['regular'] ) );
			}
			if ( ! empty( $main_menu_color['hover'] ) ) {
				printf( '.ct-main-menu > li > a:hover { color: %s !important; }', esc_attr( $main_menu_color['hover'] ) );
			}
			if ( ! empty( $main_menu_color['active'] ) ) {
				printf( '.ct-main-menu > li.current_page_item > a, .ct-main-menu > li.current-menu-item > a, .ct-main-menu > li.current_page_ancestor > a, .ct-main-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr( $main_menu_color['active'] ) );
			}
			$sticky_menu_color = intime_get_opt( 'sticky_menu_color' );
			if ( ! empty( $sticky_menu_color['regular'] ) ) {
				printf( '#ct-header.h-fixed .ct-main-menu > li > a { color: %s !important; }', esc_attr( $sticky_menu_color['regular'] ) );
			}
			if ( ! empty( $sticky_menu_color['hover'] ) ) {
				printf( '#ct-header.h-fixed .ct-main-menu > li > a:hover { color: %s !important; }', esc_attr( $sticky_menu_color['hover'] ) );
			}
			if ( ! empty( $sticky_menu_color['active'] ) ) {
				printf( '#ct-header.h-fixed .ct-main-menu > li.current_page_item > a, #ct-header.h-fixed .ct-main-menu > li.current-menu-item > a, #ct-header.h-fixed .ct-main-menu > li.current_page_ancestor > a, #ct-header.h-fixed .ct-main-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr( $sticky_menu_color['active'] ) );
			}
			$sub_menu_color = intime_get_opt( 'sub_menu_color' );
			if ( ! empty( $sub_menu_color['regular'] ) ) {
				printf( '#ct-header .ct-main-menu .sub-menu > li > a { color: %s !important; }', esc_attr( $sub_menu_color['regular'] ) );
			}
			if ( ! empty( $sub_menu_color['hover'] ) ) {
				printf( '#ct-header .ct-main-menu .sub-menu > li > a:hover { color: %s !important; }', esc_attr( $sub_menu_color['hover'] ) );
				printf( '#ct-header .ct-main-menu .sub-menu > li > a:before { background-color: %s !important; }', esc_attr( $sub_menu_color['hover'] ) );
			}
			if ( ! empty( $sub_menu_color['active'] ) ) {
				printf( '#ct-header .ct-main-menu .sub-menu > li.current_page_item > a, #ct-header .ct-main-menu .sub-menu > li.current-menu-item > a, #ct-header .ct-main-menu .sub-menu > li.current_page_ancestor > a, #ct-header .ct-main-menu .sub-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr( $sub_menu_color['active'] ) );
				printf( '#ct-header .ct-main-menu .sub-menu > li.current_page_item > a:before, #ct-header .ct-main-menu .sub-menu > li.current-menu-item > a:before, #ct-header .ct-main-menu .sub-menu > li.current_page_ancestor > a:before, #ct-header .ct-main-menu .sub-menu > li.current-menu-ancestor > a:before { background-color: %s !important; }', esc_attr( $sub_menu_color['active'] ) );
			}
			$menu_icon_color = intime_get_opt( 'menu_icon_color' );
			if ( ! empty( $menu_icon_color ) ) {
				printf( '.ct-main-menu .link-icon { color: %s !important; }', esc_attr( $menu_icon_color ) );
			}
			?>
		}
		<?php /* End Menu */

		/* Page Title */
		$ptitle_bg = intime_get_page_opt( 'ptitle_bg' );
		$custom_pagetitle = intime_get_page_opt( 'custom_pagetitle', 'themeoption' );
		if ( $custom_pagetitle == 'show' && ! empty( $ptitle_bg['background-image'] ) ) {
			echo 'body .site #pagetitle.page-title {
                background-image: url(' . esc_attr( $ptitle_bg['background-image'] ) . ');
            }';
		}
		if ( $custom_pagetitle == 'show' && ! empty( $ptitle_bg['background-color'] ) ) {
			echo 'body .site #pagetitle.page-title {
                background-color: '. esc_attr( $ptitle_bg['background-color'] ) .';
            }';
		}

		/* Preset */
		$p_primary_color = intime_get_page_opt( 'p_primary_color' );
		$p_secondary_color = intime_get_page_opt( 'p_secondary_color' );
		$p_third_color = intime_get_page_opt( 'p_third_color' );
		if ( !empty( $p_primary_color ) ) {
			echo '.ct-showcase1 .ct-showcase-title cite, .ct-fancy-box-layout9 .item--holder h6, .ct-blog-carousel-layout5 .item-author a span, .ct-blog-carousel-layout5 .item--title a:hover, .ct-testimonial-carousel1.style2 .item--position, .ct-video-button.style1, .ct-fancy-box-layout2 .item--icon i, .ct-banner3 .ct-banner-sub-title, .ct-item-meta li, .btn-line-text, .btn-line-text:hover, .ct-blog-grid-layout2 .item--title a:hover, .btn-load-more:hover, .btn-load-more i, #ct-loadding.style11 .loading-spinner, #ct-header-wrap.ct-header-layout4.style3 #ct-header:not(.h-fixed) .ct-main-menu > li > a:hover, #ct-header-wrap.ct-header-layout4.style3 #ct-header:not(.h-fixed) .ct-main-menu > li.current_page_item > a, #ct-header-wrap.ct-header-layout4.style3 #ct-header:not(.h-fixed) .ct-main-menu > li.current-menu-item > a, #ct-header-wrap.ct-header-layout4.style3 #ct-header:not(.h-fixed) .ct-main-menu > li.current_page_ancestor > a, #ct-header-wrap.ct-header-layout4.style3 #ct-header:not(.h-fixed) .ct-main-menu > li.current-menu-ancestor > a, .ct-testimonial-carousel3 .item--inner::before, .ct-progressbar3 .ct-progress-percentage, .ct-recent-news2 .item--title a:hover, #ct-header-wrap.ct-header-layout4 .ct-main-menu > li > a.ct-onepage-active, #ct-header-wrap.ct-header-layout4 .ct-main-menu > li:hover > a, #ct-header-wrap.ct-header-layout4 .ct-main-menu > li.current_page_item:not(.menu-item-type-custom) > a, #ct-header-wrap.ct-header-layout4 .ct-main-menu > li.current-menu-item:not(.menu-item-type-custom) > a, #ct-header-wrap.ct-header-layout4 .ct-main-menu > li.current-menu-parent > a, #ct-header-wrap.ct-header-layout4 .ct-main-menu > li.current_page_ancestor:not(.menu-item-type-custom) > a, #ct-header-wrap.ct-header-layout4 .ct-main-menu > li.current-menu-ancestor:not(.menu-item-type-custom) > a, #ct-header-wrap.ct-header-layout2 #ct-header:not(.h-fixed) .ct-header-meta .header-right-item:hover, .ct-widget-cart-sidebar .widget_shopping_cart .widget_shopping_cart_content ul.cart_list a.remove_from_cart_button, .ct-testimonial-carousel2 .item--position, .ct-blog-carousel-layout3 .grid-item-inner:hover .item--readmore a, .ct-video-button.style3, .ct-service-grid1 .item--holder-hover .item--icon, .ct-portfolio-grid2 .item--category a:hover, .ct-portfolio-grid2 .item--title a:hover, .ct-heading .item--sub-title.style-divider-center, .ct-fancy-box-layout1.style2 .item--icon i, .ct-heading .item--sub-title.style-divider-right, #ct-header-wrap .ct-header-meta .header-right-item:hover, #ct-header-wrap #ct-header-top.ct-header-top1 .ct-header-social a:hover, .site-header-lang .wpml-ls-statics-shortcode_actions.wpml-ls-legacy-dropdown .wpml-ls-slot-shortcode_actions .wpml-ls-sub-menu li a:hover, .site-header-lang .wpml-ls-statics-shortcode_actions.wpml-ls-legacy-dropdown-click .wpml-ls-slot-shortcode_actions .wpml-ls-sub-menu li a:hover, #ct-header-wrap .ct-header-holder.style1 .ct-h-middle-icon i, .ct-blog-carousel-layout2 .item--meta .item-author a span, .ct-blog-carousel-layout2 .item--title a:hover {
                color: '. esc_attr( $p_primary_color ) .';
            }';
            echo '.btn.btn-outline-primary:before, .ct-team-carousel5 .item--meta::before, .ct-portfolio-carousel2 .ct-slick-carousel[data-arrows="true"] .slick-arrow:hover, .ct-accordion.layout2 .ct-ac-title.active, .ct-fancy-box-layout2:hover .item--link a, .slider-video-button .slider-style2, .ct-video-button.style4, .ct-contact-form-layout1.style3, .ct-service-external-grid1 .item--readmore a::before, .ct-service-external-grid1 .item--title::before, .ct-service-external-grid1 .item--inner::before, .ct-counter-layout3 .ct-counter-inner, .ct-progressbar3 .ct-progress-holder, .ct-video-player2 .ct-video-button:hover, .ct-video-player2 .ct-video-button:focus, .ct-fancy-box-layout5 .item--icon, .menu-icon-plus::before, .menu-icon-plus::after, #ct-header-wrap .ct-header-meta .header-right-item.h-btn-cart .widget_cart_counter_header, .ct-icon-close:hover::before, .ct-icon-close:hover::after, .slick-dots li.slick-active button, .ct-blog-carousel-layout3 .grid-item-inner:hover .item--title a, .ct-fancy-box-layout4.style1 .item--icon, .btn-icon-right i, body .mfp-wrap .mfp-container .mfp-content .mfp-close:hover, .ct-progressbar2 .ct-progress-bar, .ct-service-grid1 .item--holder .item--icon, .ct-portfolio-grid2 .grid-item-inner:hover .item--readmore a, .ct-heading .item--sub-title.style-divider-center span::before, .ct-heading .item--sub-title.style-divider-center span::after, .ct-banner2 .ct-banner-number, .ct-heading .item--sub-title.style-divider-right span::before, #ct-loadding .loading-spin .spinner .bar::after, .ct-spinner3 .double-bounce1, .ct-spinner3 .double-bounce2, .ct-fancy-box-layout3 .item--link a, .btn, button, .button, input[type="submit"], .btn.btn-animate:hover, .btn.btn-secondary:before, .btn-dot:hover::before, .ct-video-button.style2, .scroll-top, .ct-spinner5 > div, #ct-header-wrap .ct-header-social.style1 a::before, #ct-menu-mobile, #ct-header-wrap.ct-header-layout1 #ct-header .ct-main-menu > li > a::before, #ct-header-wrap.ct-header-layout2 #ct-header .ct-main-menu > li > a::before,
            .ct-service-external1 .item--inner:hover .item--readmore a::before, .ct-team-carousel3 .item--meta, .ct-showcase1 .ct-showcase-image label, .ct-showcase1 .ct-showcase-button .ct-showcase-link.active {
                background-color: '. esc_attr( $p_primary_color ) .';
            }';
            echo '.ct-mailchimp1.style4 .mc4wp-form input[type="email"]:focus, .ct-mailchimp1.style4 .mc4wp-form input[type="text"]:focus, .btn.btn-outline-primary, .ct-blog-carousel-layout5 .grid-item-inner:hover .item--holder, .ct-testimonial-carousel1.style2 .item--description, .ct-item-meta li, .ct-contact-form-layout1.style4 .wpcf7-form-control:not(.wpcf7-submit):focus, .ct-contact-form-layout1.style4 .wpcf7-form-control:not(.wpcf7-submit):hover, .btn-load-more:hover span, .slider-video-button .slider-style2, .ct-service-external-grid1 .item--icon:after, .ct-secondary-menu .sub-menu, .slick-dots li button::before, .ct-contact-form-layout1.style2 .wpcf7-form-control:not(.wpcf7-submit):focus, .ct-contact-form-layout1.style2 .wpcf7-form-control:not(.wpcf7-submit):hover, .ct-team-carousel3 .item--meta, #ct-loadding .loading-spin .spinner .bar {
                border-color: '. esc_attr( $p_primary_color ) .';
            }';
            echo '.ct-banner2 .ct-banner-number::before {
                border-color: transparent transparent '. esc_attr( $p_primary_color ) .' '. esc_attr( $p_primary_color ) .';
            }';
            echo '.ct-blog-carousel-layout3 .grid-item-inner:hover .item--holder::before {
                border-color: '. esc_attr( $p_primary_color ) .' transparent transparent '. esc_attr( $p_primary_color ) .';
            }';

            echo '#ct-loadding .ct-dual-ring::after {
                border-top-color: '. esc_attr( $p_primary_color ) .';
                border-bottom-color: '. esc_attr( $p_primary_color ) .';
            }';
            
            echo '.btn-line-text span {
                border-color: '. intime_hex_to_rgba( $p_primary_color, 0.57 ) .';
            }';
            echo '#sb_instagram #sbi_images .sbi_item a:before {
                background-color: '. intime_hex_to_rgba( $p_primary_color, 0.8 ) .';
            }';
            echo '.ct-portfolio-carousel2 .item--holder {
                background-color: '. intime_hex_to_rgba( $p_primary_color, 0.86 ) .';
            }';
            echo '.btn-dot::before {
                background-color: '. intime_hex_to_rgba( $p_primary_color, 0.33 ) .';
            }';

            echo '.revslider-initialised .intime-slider-arrow-1 {
                background-color: '. intime_hex_to_rgba( $p_primary_color, 0.35 ) .';
            }';

            echo '.ct-video-button.style4::before {
                background-color: '. intime_hex_to_rgba( $p_primary_color, 0.54 ) .';
            }';

            echo '.ct-blog-carousel-layout5 .item--holder {
                border-color: '. intime_hex_to_rgba( $p_primary_color, 0.45 ) .';
            }';

            echo '.widget_media_gallery .gallery .gallery-item a::before, .elementor-widget-wp-widget-media_gallery .gallery .gallery-item a::before, .elementor-widget-image-gallery .gallery .gallery-item a::before {
                background-color: '. intime_hex_to_rgba( $p_primary_color, 0.75 ) .';
            }';

            echo '#ct-loadding .ct-dual-ring::after {
                border-bottom-color: '. esc_attr( $p_primary_color ) .';
                border-top-color: '. esc_attr( $p_primary_color ) .';
            }';

            echo '.ct-contact-form-layout1.style3 .wpcf7-submit, .ct-service-external-grid1 .item--inner:hover .item--icon::before, .ct-fancy-box-layout5 .item--title-box, .ct-video-player2 .ct-video-button {
                background-color: '. esc_attr( $p_secondary_color ) .';
            }';
            echo '.ct-service-external-grid1 .item--inner:hover .item--readmore a::before {
                background-color: '. intime_hex_to_rgba( $p_secondary_color, 0.5 ) .';
            }';

            echo '.ct-fancy-box-layout8 .item--icon i, .ct-list .ct-list-icon i, .btn.btn-slider-text1:hover, .btn.btn-slider-text1:focus, .ct-counter-layout4 .ct-counter-icon i, .ct-service-grid1.style2 .item-readmore a:hover, .ct-fancy-box-layout4.style2 .item--icon i, .revslider-initialised .btn-slider-text1:hover, #ct-header-wrap.ct-header-trans .ct-header-main:not(.h-fixed) .ct-header-meta .header-right-item:hover, .revslider-initialised cite, .ct-blog-carousel-layout4 .item--title a:hover, .ct-service-external-grid1 .item--icon, .ct-blog-carousel-layout4 .item--meta .item-author a {
                color: '. esc_attr( $p_third_color ) .';
            }';
            echo '.ct-contact-form-layout1.style5 .wpcf7-form-control:not(.wpcf7-submit):focus, .ct-contact-form-layout1.style5 .wpcf7-form-control:not(.wpcf7-submit):hover, .ct-testimonial-carousel1.style2 .slick-dots .slick-active button:before, .ct-blog-carousel-layout5 .slick-dots .slick-active button:before {
                border-color: '. esc_attr( $p_third_color ) .';
            }';
            echo '.ct-fancy-box-layout8:hover .item--icon, .ct-progressbar3.style2 .ct-progress-holder, .ct-video-button.style5, .ct-blog-carousel-layout5 .item-author::before, .ct-blog-carousel-layout5 .item--featured .item--date, .ct-contact-form-layout1.style5 .wpcf7-submit, .ct-team-carousel5 .item--social a:hover:before, .ct-portfolio-carousel2 .item--readmore a:hover, .btn.btn-text2::before, .btn.btn-slider-text1 i, .ct-progressbar5 .ct-progress-bar, .ct-testimonial-carousel1.style2 .slick-dots .slick-active button, .ct-blog-carousel-layout5 .slick-dots .slick-active button, .ct-accordion.layout2 .ct-ac-title::after, .ct-service-grid1.style2 .item-readmore a i, .ct-service-grid1.style2 .item--holder .item--icon, .ct-tabs--horizontal1 .ct-tabs-title .ct-tab-title, .revslider-initialised .btn-slider-text1:hover i, #ct-header-wrap.ct-header-layout5 .ct-header-main .menu-line::before, #ct-header-wrap.ct-header-layout5 .ct-header-main .menu-line::after {
                background-color: '. esc_attr( $p_third_color ) .';
            }';
            echo '.ct-service-external-grid1 .item--icon::before {
                background-color: '. intime_hex_to_rgba( $p_third_color, 0.14 ) .';
            }';
            echo '.ct-testimonial-carousel6 .item--inner svg path {
                fill: '. esc_attr( $p_third_color ) .';
            }';

            echo '.ct-blog-carousel-layout6 .grid-item-inner::before {
                background-image: -webkit-gradient(linear, left top, left bottom, from('.intime_hex_to_rgba( $p_primary_color, 0.8 ).'), to(rgba(194, 11, 11, 0)));
				background-image: -webkit-linear-gradient(bottom, '.intime_hex_to_rgba( $p_primary_color, 0.8 ).', rgba(194, 11, 11, 0));
				background-image: -moz-linear-gradient(bottom, '.intime_hex_to_rgba( $p_primary_color, 0.8 ).', rgba(194, 11, 11, 0));
				background-image: -ms-linear-gradient(bottom, '.intime_hex_to_rgba( $p_primary_color, 0.8 ).', rgba(194, 11, 11, 0));
				background-image: -o-linear-gradient(bottom, '.intime_hex_to_rgba( $p_primary_color, 0.8 ).', rgba(194, 11, 11, 0));
				background-image: linear-gradient(bottom, '.intime_hex_to_rgba( $p_primary_color, 0.8 ).', rgba(194, 11, 11, 0));
            }';
        
            ?>

            @media screen and (min-width: 1200px) { <?php
            	echo '#ct-header-wrap.ct-header-layout3 .ct-header-main:not(.h-fixed) .ct-secondary-menu > li:hover > a, .ct-secondary-menu > li:hover > a, .ct-secondary-menu a:hover, .ct-secondary-menu .sub-menu li a:hover, #ct-header-wrap.ct-header-layout3 .ct-header-main:not(.h-fixed) .ct-secondary-menu > li > a:hover, .ct-secondary-menu > li > a::after, #ct-header-wrap.ct-header-layout3 .ct-header-main:not(.h-fixed) .ct-header-meta .header-right-item, .ct-main-menu > li.menu-item-has-children > a::after, .ct-main-menu > li.page_item_has_children > a::after, .ct-main-menu .sub-menu li > a:hover, .ct-main-menu .children li > a:hover, .ct-main-menu .sub-menu li.current_page_item > a, .ct-main-menu .children li.current_page_item > a, .ct-main-menu .sub-menu li.current-menu-item > a, .ct-main-menu .children li.current-menu-item > a, .ct-main-menu .sub-menu li.current_page_ancestor > a, .ct-main-menu .children li.current_page_ancestor > a, .ct-main-menu .sub-menu li.current-menu-ancestor > a, .ct-main-menu .children li.current-menu-ancestor > a {
	                color: '. esc_attr( $p_primary_color ) .';
	            }';
            	echo '.ct-main-menu .sub-menu li a::before, .ct-main-menu .children li a::before, #ct-header-wrap.ct-header-layout3 .ct-main-menu > li > a::before {
	                background-color: '. esc_attr( $p_primary_color ) .';
	            }';
	            echo '.ct-main-menu .sub-menu, .ct-main-menu .children {
	                border-color: '. esc_attr( $p_primary_color ) .';
	            }';
        	?> }

            @media screen and (max-width: 1199px) { <?php
            	echo '.ct-main-menu > li > a:hover, .ct-main-menu > li > a.current, .ct-main-menu > li.current_page_item > a, .ct-main-menu > li.current-menu-item > a, .ct-main-menu > li.current_page_ancestor > a, .ct-main-menu > li.current-menu-ancestor > a,
            	.ct-main-menu .sub-menu li > a:hover, .ct-main-menu .children li > a:hover, .ct-main-menu .sub-menu li > a.current, .ct-main-menu .children li > a.current, .ct-main-menu .sub-menu li.current_page_item > a, .ct-main-menu .children li.current_page_item > a, .ct-main-menu .sub-menu li.current-menu-item > a, .ct-main-menu .children li.current-menu-item > a, .ct-main-menu .sub-menu li.current_page_ancestor > a, .ct-main-menu .children li.current_page_ancestor > a, 
            	.ct-main-menu .sub-menu li.current-menu-ancestor > a, .ct-main-menu .children li.current-menu-ancestor > a {
	                color: '. esc_attr( $p_primary_color ) .';
	            }';
	            echo '.ct-menu-toggle.toggle-open {
	                background-color: '. esc_attr( $p_primary_color ) .';
	            }';
	            echo '.ct-menu-toggle.toggle-open {
	                border-color: '. esc_attr( $p_primary_color ) .';
	            }';
        	?> } <?php
		}

		/* Custom Css */
		$custom_css = intime_get_opt( 'site_css' );
		if ( ! empty( $custom_css ) ) {
			echo esc_attr( $custom_css );
		}

		return ob_get_clean();
	}
}

new CSS_Generator();