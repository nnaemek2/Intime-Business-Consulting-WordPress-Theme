<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  CT_Post_Metabox $metabox
 */

/**
 * Get list menu.
 * @return array
 */
function intime_get_nav_menu(){

    $menus = array(
        '' => esc_html__('Default', 'intime')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->term_id] = $obj_menu->name;
    }

    return $menus;
}

add_action( 'ct_post_metabox_register', 'intime_page_options_register' );

function intime_page_options_register( $metabox ) {

	if ( ! $metabox->isset_args( 'post' ) ) {
		$metabox->set_args( 'post', array(
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'intime' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'product' ) ) {
		$metabox->set_args( 'product', array(
			'opt_name'            => 'product_option',
			'display_name'        => esc_html__( 'Product Settings', 'intime' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'page' ) ) {
		$metabox->set_args( 'page', array(
			'opt_name'            => intime_get_page_opt_name(),
			'display_name'        => esc_html__( 'Page Settings', 'intime' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_audio' ) ) {
		$metabox->set_args( 'ct_pf_audio', array(
			'opt_name'     => 'post_format_audio',
			'display_name' => esc_html__( 'Audio', 'intime' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_link' ) ) {
		$metabox->set_args( 'ct_pf_link', array(
			'opt_name'     => 'post_format_link',
			'display_name' => esc_html__( 'Link', 'intime' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_quote' ) ) {
		$metabox->set_args( 'ct_pf_quote', array(
			'opt_name'     => 'post_format_quote',
			'display_name' => esc_html__( 'Quote', 'intime' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_video' ) ) {
		$metabox->set_args( 'ct_pf_video', array(
			'opt_name'     => 'post_format_video',
			'display_name' => esc_html__( 'Video', 'intime' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_gallery' ) ) {
		$metabox->set_args( 'ct_pf_gallery', array(
			'opt_name'     => 'post_format_gallery',
			'display_name' => esc_html__( 'Gallery', 'intime' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/* Extra Post Type */

	if ( ! $metabox->isset_args( 'service' ) ) {
		$metabox->set_args( 'service', array(
			'opt_name'            => 'service_option',
			'display_name'        => esc_html__( 'Service Settings', 'intime' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'portfolio' ) ) {
		$metabox->set_args( 'portfolio', array(
			'opt_name'            => 'portfolio_option',
			'display_name'        => esc_html__( 'Portfolio Settings', 'intime' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'case-study' ) ) {
		$metabox->set_args( 'case-study', array(
			'opt_name'            => 'case_study_option',
			'display_name'        => esc_html__( 'Case Study Settings', 'intime' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config post meta options
	 *
	 */
	$metabox->add_section( 'post', array(
		'title'  => esc_html__( 'Post Settings', 'intime' ),
		'icon'   => 'el el-refresh',
		'fields' => array(
			array(
				'id'             => 'post_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-post #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'intime' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'intime' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'intime' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_post',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Sidebar', 'intime' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_post_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'intime' ),
				'options'      => array(
					'left'  => esc_html__('Left', 'intime'),
	                'right' => esc_html__('Right', 'intime'),
	                'none'  => esc_html__('Disabled', 'intime')
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_post', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
		)
	) );

	/**
	 * Config page meta options
	 *
	 */
	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Header', 'intime' ),
		'desc'   => esc_html__( 'Header settings for the page.', 'intime' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Layout', 'intime' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'header_layout',
				'type'         => 'image_select',
				'title'        => esc_html__( 'Layout', 'intime' ),
				'subtitle'     => esc_html__( 'Select a layout for header.', 'intime' ),
				'options'      => array(
					'0' => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
					'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
					'2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
					'3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
					'4' => get_template_directory_uri() . '/assets/images/header-layout/h4.jpg',
					'5' => get_template_directory_uri() . '/assets/images/header-layout/h5.jpg',
				),
				'default'      => intime_get_option_of_theme_options( 'header_layout' ),
				'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
			),
			array(
	            'id'       => 'sticky_header_type_page',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Sticky Header Type', 'intime'),
	            'options'  => array(
	                'themeoption'  => esc_html__('Theme Option', 'intime'),
	                'scroll-to-bottom'  => esc_html__('Scroll To Bottom', 'intime'),
	                'scroll-to-top'  => esc_html__('Scroll To Top', 'intime'),
	            ),
	            'default'  => 'themeoption',
	        ),
			array(
	            'id'       => 'h_style1',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Header Style', 'intime'),
	            'options'  => array(
	                'style1'  => esc_html__('Style 1', 'intime'),
	                'style2'  => esc_html__('Style 2', 'intime'),
	                'style3'  => esc_html__('Style 3 (Fixed Transparent)', 'intime'),
	                'style4'  => esc_html__('Style 4 (Fixed Transparent)', 'intime'),
	            ),
	            'default'  => 'style1',
	            'required'     => array( 0 => 'header_layout', 1 => 'equals', 2 => '4' ),
				'force_output' => true
	        ),
			array(
	            'title' => esc_html__('Button Navigation', 'intime'),
	            'type'  => 'section',
	            'id' => 'button_navigation_page',
	            'indent' => true
	        ),
	        array(
	            'id'       => 'h_btn_on_page',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Show/Hide Button', 'intime'),
	            'options'  => array(
	                'themeoption'  => esc_html__('Theme Option', 'intime'),
	                'show'  => esc_html__('Show', 'intime'),
	                'hide'  => esc_html__('Hide', 'intime')
	            ),
	            'default'  => 'themeoption',
	            'required'     => array( 0 => 'header_layout', 1 => 'equals', 2 => '4' ),
				'force_output' => true
	        ),
	        array(
	            'id' => 'h_btn_text_page',
	            'type' => 'text',
	            'title' => esc_html__('Button Text', 'intime'),
	            'subtitle' => esc_html__( 'Applicable to a few layouts.', 'intime' ),
	            'default' => '',
	        ),
	        array(
	            'id' => 'h_btn_link_page',
	            'type' => 'text',
	            'title' => esc_html__('Button Link', 'intime'),
	            'default' => '',
	            'required'     => array( 0 => 'header_layout', 1 => 'equals', 2 => '4' ),
				'force_output' => true
	        ),
			array(
	            'title' => esc_html__('Logo', 'intime'),
	            'type'  => 'section',
	            'id' => 'logo_page',
	            'indent' => true,
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
			array(
	            'id'       => 'p_logo_dark',
	            'type'     => 'media',
	            'title'    => esc_html__('Custom Logo Dark', 'intime'),
	            'default' => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
	            'id'       => 'p_logo_light',
	            'type'     => 'media',
	            'title'    => esc_html__('Custom Logo Light', 'intime'),
	            'default' => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
	            'id'       => 'p_logo_mobile',
	            'type'     => 'media',
	            'title'    => esc_html__('Custom Logo Tablet & Mobile', 'intime'),
	            'default' => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
	            'title' => esc_html__('Main Menu', 'intime'),
	            'type'  => 'section',
	            'id' => 'main_menu_page',
	            'indent' => true
	        ),
	        array(
	            'id'       => 'icon_has_children_page',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Icon Has Children', 'intime'),
	            'options'  => array(
	                'themeoption'  => esc_html__('Theme Option', 'intime'),
	                'plus'  => esc_html__('Plus', 'intime'),
	                'arrow'  => esc_html__('Arrow', 'intime')
	            ),
	            'default'  => 'themeoption',
	        ),
	        array(
                'id'       => 'h_custom_menu',
                'type'     => 'select',
                'title'    => esc_html__( 'Custom Menu', 'intime' ),
                'subtitle' => esc_html__( 'Custom menu for current page.', 'intime' ),
                'options'  => intime_get_nav_menu(),
                'default' => '',
            ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Page Title', 'intime' ),
		'icon'   => 'el el-indent-left',
		'fields' => array(
			array(
				'id'           => 'custom_pagetitle',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Page Title', 'intime' ),
				'options'      => array(
					'themeoption'  => esc_html__( 'Theme Option', 'intime' ),
					'show'  => esc_html__( 'Custom', 'intime' ),
					'hide'  => esc_html__( 'Hide', 'intime' ),
				),
				'default'      => 'themeoption',
			),
			array(
				'id'           => 'custom_title',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Title', 'intime' ),
				'subtitle'     => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'intime' ),
				'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
			),
			array(
	            'id'       => 'ptitle_bg',
	            'type'     => 'background',
	            'background-color'     => true,
	            'background-repeat'     => false,
	            'background-size'     => false,
	            'background-attachment'     => false,
	            'background-position'     => false,
	            'transparent'     => false,
	            'title'    => esc_html__('Background', 'intime'),
	            'subtitle' => esc_html__('Page title background image.', 'intime'),
	            'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
	        ),
	        array(
				'id'       => 'ptitle_bg_overlay',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color Overlay', 'intime' ),
				'subtitle' => esc_html__( 'Page title background color overlay.', 'intime' ),
				'output'   => array( 'background-color' => 'body #pagetitle:before' ),
				'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
			),
	        array(
	            'id'             => 'ptitle_padding',
	            'type'           => 'spacing',
	            'output'         => array('.site #pagetitle.page-title'),
	            'right'   => false,
	            'left'    => false,
	            'mode'           => 'padding',
	            'units'          => array('px'),
	            'units_extended' => 'false',
	            'title'          => esc_html__('Page Title Padding', 'intime'),
	            'default'            => array(
	                'padding-top'   => '',
	                'padding-bottom'   => '',
	                'units'          => 'px',
	            ),
	            'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
	        ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Content', 'intime' ),
		'desc'   => esc_html__( 'Settings for content area.', 'intime' ),
		'icon'   => 'el-icon-pencil',
		'fields' => array(
	        array(
				'id'           => 'loading_page',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Loading', 'intime' ),
				'options'      => array(
					'themeoption'  => esc_html__( 'Theme Option', 'intime' ),
					'custom' => esc_html__( 'Cuttom', 'intime' ),
				),
				'default'      => 'themeoption',
			),
			array(
	            'id'       => 'loading_type',
	            'type'     => 'select',
	            'title'    => esc_html__('Loading Type', 'intime'),
	            'options'  => array(
	                'style1'  => esc_html__('Style 1', 'intime'),
	                'style2'  => esc_html__('Style 2', 'intime'),
	                'style3'  => esc_html__('Style 3', 'intime'),
	                'style4'  => esc_html__('Style 4', 'intime'),
	                'style5'  => esc_html__('Style 5', 'intime'),
	                'style6'  => esc_html__('Style 6', 'intime'),
	                'style7'  => esc_html__('Style 7', 'intime'),
	                'style8'  => esc_html__('Style 8', 'intime'),
	                'style9'  => esc_html__('Style 9', 'intime'),
	                'style10'  => esc_html__('Style 10', 'intime'),
	                'style11'  => esc_html__('Style 11', 'intime'),
	                'style12'  => esc_html__('Style 12', 'intime'),
	            ),
	            'default'  => 'style1',
	            'required'     => array( 0 => 'loading_page', 1 => '=', 2 => 'custom' ),
				'force_output' => true
	        ),
			array(
				'id'       => 'content_bg_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'intime' ),
				'subtitle' => esc_html__( 'Content background color.', 'intime' ),
				'output'   => array( 'background-color' => 'body .site-content' )
			),
			array(
				'id'             => 'content_padding',
				'type'           => 'spacing',
				'output'         => array( '#content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'intime' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'intime' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_page',
				'type'    => 'switch',
				'title'   => esc_html__( 'Show Sidebar', 'intime' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_page_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'intime' ),
				'options'      => array(
					'left'  => esc_html__( 'Left', 'intime' ),
					'right' => esc_html__( 'Right', 'intime' ),
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_page', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
			array(
				'id'           => 'heading_default_font_page',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Heading Default Font', 'intime' ),
				'options'      => array(
					'default_page'  => esc_html__( 'Default', 'intime' ),
					'custom_page'  => esc_html__( 'Custom Page', 'intime' ),
				),
				'default'      => 'default_page',
			),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Footer', 'intime' ),
		'desc'   => esc_html__( 'Settings for footer area.', 'intime' ),
		'icon'   => 'el el-website',
		'fields' => array(
			array(
				'id'      => 'custom_footer',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Layout', 'intime' ),
				'default' => false,
				'indent'  => true
			),
	        array(
	            'id'          => 'footer_layout_custom',
	            'type'        => 'select',
	            'title'       => esc_html__('Layout', 'intime'),
	            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','intime'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
	            'options'     =>intime_list_post('footer'),
	            'default'     => '',
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	    )
	) );	

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Colors', 'intime' ),
		'icon'   => 'el-icon-file-edit',
		'fields' => array(
			array(
	            'id'          => 'p_primary_color',
	            'type'        => 'color',
	            'title'       => esc_html__('Primary Color', 'intime'),
	            'transparent' => false,
	            'default'     => ''
	        ),
	        array(
	            'id'          => 'p_secondary_color',
	            'type'        => 'color',
	            'title'       => esc_html__('Secondary Color', 'intime'),
	            'transparent' => false,
	            'default'     => ''
	        ),
	        array(
	            'id'          => 'p_third_color',
	            'type'        => 'color',
	            'title'       => esc_html__('Third Color', 'intime'),
	            'transparent' => false,
	            'default'     => ''
	        ),
		)
	) );

	/**
	 * Config post format meta options
	 *
	 */

	$metabox->add_section( 'ct_pf_video', array(
		'title'  => esc_html__( 'Video', 'intime' ),
		'fields' => array(
			array(
				'id'    => 'post-video-url',
				'type'  => 'text',
				'title' => esc_html__( 'Video URL', 'intime' ),
				'desc'  => esc_html__( 'YouTube or Vimeo video URL', 'intime' )
			),

			array(
				'id'    => 'post-video-file',
				'type'  => 'editor',
				'title' => esc_html__( 'Video Upload', 'intime' ),
				'desc'  => esc_html__( 'Upload video file', 'intime' )
			),

			array(
				'id'    => 'post-video-html',
				'type'  => 'textarea',
				'title' => esc_html__( 'Embadded video', 'intime' ),
				'desc'  => esc_html__( 'Use this option when the video does not come from YouTube or Vimeo', 'intime' )
			)
		)
	) );

	$metabox->add_section( 'ct_pf_gallery', array(
		'title'  => esc_html__( 'Gallery', 'intime' ),
		'fields' => array(
			array(
				'id'       => 'post-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox?', 'intime' ),
				'subtitle' => esc_html__( 'Enable lightbox for gallery images.', 'intime' ),
				'default'  => true
			),
			array(
				'id'       => 'post-gallery-images',
				'type'     => 'gallery',
				'title'    => esc_html__( 'Gallery Images ', 'intime' ),
				'subtitle' => esc_html__( 'Upload images or add from media library.', 'intime' )
			)
		)
	) );

	$metabox->add_section( 'ct_pf_audio', array(
		'title'  => esc_html__( 'Audio', 'intime' ),
		'fields' => array(
			array(
				'id'          => 'post-audio-url',
				'type'        => 'text',
				'title'       => esc_html__( 'Audio URL', 'intime' ),
				'description' => esc_html__( 'Audio file URL in format: mp3, ogg, wav.', 'intime' ),
				'validate'    => 'url',
				'msg'         => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'ct_pf_link', array(
		'title'  => esc_html__( 'Link', 'intime' ),
		'fields' => array(
			array(
				'id'       => 'post-link-url',
				'type'     => 'text',
				'title'    => esc_html__( 'URL', 'intime' ),
				'validate' => 'url',
				'msg'      => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'ct_pf_quote', array(
		'title'  => esc_html__( 'Quote', 'intime' ),
		'fields' => array(
			array(
				'id'    => 'post-quote-cite',
				'type'  => 'text',
				'title' => esc_html__( 'Cite', 'intime' )
			)
		)
	) );

	/**
	 * Config service meta options
	 *
	 */
	$metabox->add_section( 'service', array(
		'title'  => esc_html__( 'General', 'intime' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
	            'id'       => 'icon_type',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Icon Type', 'intime'),
	            'options'  => array(
	                'icon'  => esc_html__('Icon', 'intime'),
	                'image'  => esc_html__('Image', 'intime'),
	            ),
	            'default'  => 'icon'
	        ),
			array(
	            'id'       => 'service_icon',
	            'type'     => 'ct_iconpicker',
	            'title'    => esc_html__('Icon', 'intime'),
	            'required' => array( 0 => 'icon_type', 1 => 'equals', 2 => 'icon' ),
            	'force_output' => true
	        ),
	        array(
	            'id'       => 'service_icon_img',
	            'type'     => 'media',
	            'title'    => esc_html__('Icon Image', 'intime'),
	            'default' => '',
	            'required' => array( 0 => 'icon_type', 1 => 'equals', 2 => 'image' ),
            	'force_output' => true
	        ),
			array(
				'id'       => 'service_except',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Excerpt', 'intime' ),
				'validate' => 'no_html'
			),
			array(
				'id'             => 'service_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-service #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'intime' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'intime' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'intime' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
		)
	) );

	/**
	 * Config portfolio meta options
	 *
	 */
	$metabox->add_section( 'portfolio', array(
		'title'  => esc_html__( 'General', 'intime' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
	            'id'       => 'icon_type',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Icon Type', 'intime'),
	            'options'  => array(
	                'icon'  => esc_html__('Icon', 'intime'),
	                'image'  => esc_html__('Image', 'intime'),
	            ),
	            'default'  => 'icon'
	        ),
			array(
	            'id'       => 'portfolio_icon',
	            'type'     => 'ct_iconpicker',
	            'title'    => esc_html__('Icon', 'intime'),
	            'required' => array( 0 => 'icon_type', 1 => 'equals', 2 => 'icon' ),
            	'force_output' => true
	        ),
	        array(
	            'id'       => 'portfolio_icon_img',
	            'type'     => 'media',
	            'title'    => esc_html__('Icon Image', 'intime'),
	            'default' => '',
	            'required' => array( 0 => 'icon_type', 1 => 'equals', 2 => 'image' ),
            	'force_output' => true
	        ),
			array(
				'id'       => 'portfolio_except',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Excerpt', 'intime' ),
				'validate' => 'no_html'
			),
			array(
				'id'             => 'portfolio_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-portfolio #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'intime' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'intime' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'intime' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
		)
	) );

	/**
	 * Config case study meta options
	 *
	 */
	$metabox->add_section( 'case-study', array(
		'title'  => esc_html__( 'General', 'intime' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'             => 'case_study_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-case-study #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'intime' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'intime' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'intime' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
		)
	) );

	/**
     * Config product meta options
     *
     */
    $metabox->add_section('product', array(
        'title'  => esc_html__('Product Settings', 'intime'),
        'icon'   => 'el el-briefcase',
        'fields' => array(
            array(
                'id'       => 'product_feature',
                'type'     => 'multi_text',
                'title'    => esc_html__('Feature', 'intime'),
                'validate' => 'html',
            ),
        )
    ));

}

function intime_get_option_of_theme_options( $key, $default = '' ) {
	if ( empty( $key ) ) {
		return '';
	}
	$options = get_option( intime_get_opt_name(), array() );
	$value   = isset( $options[ $key ] ) ? $options[ $key ] : $default;

	return $value;
}