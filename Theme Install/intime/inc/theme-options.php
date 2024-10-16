<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = intime_get_opt_name();
$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => class_exists('Case_Theme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'intime'),
    'page_title'           => esc_html__('Theme Options', 'intime'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => class_exists('Case_Theme_Core') ? $theme->get('TextDomain') : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
    'templates_path'       => get_template_directory() . '/inc/templates/redux/'
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'intime'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'intime'),
            'default' => '',
            'url' => false
        ),
        array(
            'id'       => 'mouse_move_animation',
            'type'     => 'switch',
            'title'    => esc_html__('Mouse Move Animation', 'intime'),
            'default'  => false
        ),
        array(
            'id'       => 'dev_mode',
            'type'     => 'switch',
            'title'    => esc_html__('Dev Mode (not recommended)', 'intime'),
            'description' => 'Scss generate css',
            'default'  => false
        ),
        array(
            'title' => esc_html__('Newsletter Popup', 'intime'),
            'type'  => 'section',
            'id' => 'newsletter',
            'indent' => true
        ),
        array(
            'id'       => 'newsletter_popup',
            'type'     => 'switch',
            'title'    => esc_html__('Newsletter Popup', 'intime'),
            'default'  => false
        ),
        array(
            'id'      => 'newslette_title',
            'type'    => 'text',
            'title'   => esc_html__('Title', 'intime'),
            'default' => '',
            'required' => array( 0 => 'newsletter_popup', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'=> 'newslette_desc',
            'type' => 'textarea',
            'title' => esc_html__('Description', 'intime'),
            'validate' => 'html_custom',
            'default' => '',
            'required' => array( 0 => 'newsletter_popup', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'newslette_image',
            'type'     => 'media',
            'title'    => esc_html__('Image', 'intime'),
            'default' => '',
            'required' => array( 0 => 'newsletter_popup', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'title' => esc_html__('Page Loading', 'intime'),
            'type'  => 'section',
            'id' => 'page_lading',
            'indent' => true
        ),
        array(
            'id'       => 'show_page_loading',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Page Loading', 'intime'),
            'subtitle' => esc_html__('Enable page loading effect when you load site.', 'intime'),
            'default'  => false
        ),
        array(
            'id'       => 'loading_type',
            'type'     => 'select',
            'title'    => esc_html__('Loading Style', 'intime'),
            'options'  => array(
                'style-image'  => esc_html__('Image', 'intime'),
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
                'style13'  => esc_html__('Style 13', 'intime'),
            ),
            'default'  => 'style1',
            'required' => array( 0 => 'show_page_loading', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'logo_loader',
            'type'     => 'media',
            'title'    => esc_html__('Logo Loader', 'intime'),
            'default' => '',
            'required' => array( 0 => 'loading_type', 1 => 'equals', 2 => 'style-image' ),
            'force_output' => true,
            'url' => false
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'intime'),
    'icon'   => 'el el-indent-left',
    'fields' => array(
        array(
            'id'       => 'header_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Layout', 'intime'),
            'subtitle' => esc_html__('Select a layout for header.', 'intime'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
                '3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
                '4' => get_template_directory_uri() . '/assets/images/header-layout/h4.jpg',
                '5' => get_template_directory_uri() . '/assets/images/header-layout/h5.jpg',
            ),
            'default'  => '1'
        ),
        array(
            'id'          => 'header_bg_color',
            'type'        => 'color',
            'title'       => esc_html__('Header Main Background Color', 'intime'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'       => 'sticky_on',
            'type'     => 'switch',
            'title'    => esc_html__('Sticky Header', 'intime'),
            'subtitle' => esc_html__('Header will be sticked when applicable.', 'intime'),
            'default'  => false
        ),

        array(
            'id'       => 'sticky_header_type',
            'type'     => 'button_set',
            'title'    => esc_html__('Sticky Header Type', 'intime'),
            'options'  => array(
                'scroll-to-bottom'  => esc_html__('Scroll To Bottom', 'intime'),
                'scroll-to-top'  => esc_html__('Scroll To Top', 'intime'),
            ),
            'default'  => 'scroll-to-bottom',
            'required' => array( 0 => 'sticky_on', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),

        array(
            'id'       => 'search_icon',
            'type'     => 'switch',
            'title'    => esc_html__('Search Icon Header', 'intime'),
            'default'  => false
        ),
        array(
            'id'       => 'cart_icon',
            'type'     => 'switch',
            'title'    => esc_html__('Cart Icon Header', 'intime'),
            'default'  => false,
        ),
        array(
            'id'       => 'language_switch',
            'type'     => 'switch',
            'title'    => esc_html__('Language Switch', 'intime'),
            'default'  => false,
            'desc'    => esc_html__('Apply header layout 3.', 'intime'),
            'subtitle' => esc_html__('Will display in some header layouts.', 'intime'),
        ),

        array(
            'title' => esc_html__('Button Navigation', 'intime'),
            'type'  => 'section',
            'id' => 'button_navigation1',
            'indent' => true
        ),
        array(
            'id'       => 'h_btn_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Show/Hide Button', 'intime'),
            'options'  => array(
                'show'  => esc_html__('Show', 'intime'),
                'hide'  => esc_html__('Hide', 'intime')
            ),
            'default'  => 'hide',
        ),
        array(
            'id' => 'h_btn_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'intime'),
            'default' => '',
            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'h_btn_link_type',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Link Type', 'intime'),
            'options'  => array(
                'page'  => esc_html__('Page', 'intime'),
                'custom'  => esc_html__('Custom', 'intime')
            ),
            'default'  => 'page',
            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'    => 'h_btn_link',
            'type'  => 'select',
            'title' => esc_html__( 'Page Link', 'intime' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'page' ),
            'force_output' => true
        ),
        array(
            'id' => 'h_btn_link_custom',
            'type' => 'text',
            'title' => esc_html__('Custom Link', 'intime'),
            'default' => '',
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
        array(
            'id'       => 'h_btn_target',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Target', 'intime'),
            'options'  => array(
                '_self'  => esc_html__('Self', 'intime'),
                '_blank'  => esc_html__('Blank', 'intime')
            ),
            'default'  => '_self',
            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Top Bar', 'intime'),
    'icon'       => 'el el-credit-card',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'h_topbar',
            'type'     => 'button_set',
            'title'    => esc_html__('Topbar', 'intime'),
            'options'  => array(
                'show'  => esc_html__('Show', 'intime'),
                'hide'  => esc_html__('Hide', 'intime')
            ),
            'default'  => 'show',
        ),
        array(
            'id'          => 'topbar_bg_color',
            'type'        => 'color',
            'title'       => esc_html__('Topbar Background Color', 'intime'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id' => 'wellcome',
            'type' => 'text',
            'title' => esc_html__('Wellcome', 'intime'),
            'default' => '',
        ),
        array(
            'id' => 'h_phone_label',
            'type' => 'text',
            'title' => esc_html__('Phone Number Label', 'intime'),
            'default' => '',
        ),
        array(
            'id' => 'h_phone',
            'type' => 'text',
            'title' => esc_html__('Phone Number', 'intime'),
            'default' => '',
        ),
        array(
            'id' => 'h_phone_link',
            'type' => 'text',
            'title' => esc_html__('Phone Link', 'intime'),
            'default' => '',
        ),
        array(
            'id' => 'h_email_label',
            'type' => 'text',
            'title' => esc_html__('Email Label', 'intime'),
            'default' => '',
        ),
        array(
            'id' => 'h_email',
            'type' => 'text',
            'title' => esc_html__('Email', 'intime'),
            'default' => '',
        ),
        array(
            'id' => 'h_email_link',
            'type' => 'text',
            'title' => esc_html__('Email Link', 'intime'),
            'default' => '',
        ),
        array(
            'id' => 'h_address_label',
            'type' => 'text',
            'title' => esc_html__('Address Label', 'intime'),
            'default' => '',
        ),
        array(
            'id' => 'h_address',
            'type' => 'text',
            'title' => esc_html__('Address', 'intime'),
            'default' => '',
        ),
        array(
            'id' => 'h_address_link',
            'type' => 'text',
            'title' => esc_html__('Address Link', 'intime'),
            'default' => '',
        ),
        array(
            'id' => 'h_time_label',
            'type' => 'text',
            'title' => esc_html__('Time Label', 'intime'),
            'default' => '',
        ),
        array(
            'id' => 'h_time',
            'type' => 'text',
            'title' => esc_html__('Time', 'intime'),
            'default' => '',
        ),
        array(
            'title' => esc_html__('Social', 'intime'),
            'type'  => 'section',
            'id' => 'header_social',
            'indent' => true,
        ),

        array(
            'id'      => 'h_social_facebook_url',
            'type'    => 'text',
            'title'   => esc_html__('Facebook URL', 'intime'),
            'default' => '#',
        ),
        array(
            'id'      => 'h_social_twitter_url',
            'type'    => 'text',
            'title'   => esc_html__('Twitter URL', 'intime'),
            'default' => '#',
        ),
        array(
            'id'      => 'h_social_dribbble_url',
            'type'    => 'text',
            'title'   => esc_html__('Dribbble URL', 'intime'),
            'default' => '#',
        ),
        array(
            'id'      => 'h_social_behance_url',
            'type'    => 'text',
            'title'   => esc_html__('Behance URL', 'intime'),
            'default' => '#',
        ),
        array(
            'id'      => 'h_social_inkedin_url',
            'type'    => 'text',
            'title'   => esc_html__('Linkedin URL', 'intime'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_instagram_url',
            'type'    => 'text',
            'title'   => esc_html__('Instagram URL', 'intime'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_google_url',
            'type'    => 'text',
            'title'   => esc_html__('Google URL', 'intime'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_skype_url',
            'type'    => 'text',
            'title'   => esc_html__('Skype URL', 'intime'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_pinterest_url',
            'type'    => 'text',
            'title'   => esc_html__('Pinterest URL', 'intime'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_vimeo_url',
            'type'    => 'text',
            'title'   => esc_html__('Vimeo URL', 'intime'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_youtube_url',
            'type'    => 'text',
            'title'   => esc_html__('Youtube URL', 'intime'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_yelp_url',
            'type'    => 'text',
            'title'   => esc_html__('Yelp URL', 'intime'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_tumblr_url',
            'type'    => 'text',
            'title'   => esc_html__('Tumblr URL', 'intime'),
            'default' => '',
        ),
        array(
            'id'      => 'h_social_tripadvisor_url',
            'type'    => 'text',
            'title'   => esc_html__('Tripadvisor URL', 'intime'),
            'default' => '',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Logo', 'intime'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__('Logo Dark', 'intime'),
             'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-dark.png'
            ),
            'url' => false
        ),
        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => esc_html__('Logo Light', 'intime'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-light.png'
            ),
            'url' => false
        ),
        array(
            'id'       => 'logo_mobile',
            'type'     => 'media',
            'title'    => esc_html__('Logo Tablet & Mobile', 'intime'),
             'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-mobile.png'
            ),
            'url' => false
        ),
        array(
            'id'       => 'logo_maxh',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max Height', 'intime'),
            'subtitle' => esc_html__('Enter number.', 'intime'),
            'width'    => false,
            'unit'     => 'px'
        ),
        array(
            'id'       => 'logo_maxh_sticky',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max Height Sticky', 'intime'),
            'subtitle' => esc_html__('Enter number.', 'intime'),
            'width'    => false,
            'unit'     => 'px'
        ),
        array(
            'id'       => 'logo_maxh_sm',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max Height for Tablet & Mobile', 'intime'),
            'subtitle' => esc_html__('Enter number.', 'intime'),
            'width'    => false,
            'unit'     => 'px'
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Navigation', 'intime'),
    'icon'       => 'el el-lines',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'font_menu',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Google Font', 'intime'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'font-style'  => false,
            'font-weight'  => true,
            'text-align'  => false,
            'font-size'  => false,
            'line-height'  => false,
            'color'  => false,
            'output'      => array('body #ct-header-wrap #ct-header .ct-main-menu > li > a, body #ct-header-wrap #ct-header .ct-main-menu .sub-menu li a, #ct-header-wrap.ct-header-layout4.style4 #ct-header:not(.h-fixed) .ct-main-menu > li > a'),
            'units'       => 'px',
        ),
        array(
            'title' => esc_html__('Main Menu', 'intime'),
            'type'  => 'section',
            'id' => 'main_menu',
            'indent' => true
        ),
        array(
            'id'       => 'icon_has_children',
            'type'     => 'button_set',
            'title'    => esc_html__('Icon Has Children', 'intime'),
            'options'  => array(
                'plus'  => esc_html__('Plus', 'intime'),
                'arrow'  => esc_html__('Arrow', 'intime')
            ),
            'default'  => 'plus',
        ),
        array(
            'id'      => 'main_menu_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Item Color', 'intime'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'id'          => 'menu_icon_color',
            'type'        => 'color',
            'title'       => esc_html__('Icon Color', 'intime'),
            'transparent' => false,
        ),
        array(
            'title' => esc_html__('Sticky Menu', 'intime'),
            'type'  => 'section',
            'id' => 'sticky_menu',
            'indent' => true
        ),
        array(
            'id'      => 'sticky_menu_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Item Color', 'intime'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'title' => esc_html__('Sub Menu', 'intime'),
            'type'  => 'section',
            'id' => 'sub_menu',
            'indent' => true
        ),
        array(
            'id'      => 'sub_menu_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Item Color', 'intime'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'intime'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array(

        array(
            'id'           => 'pagetitle',
            'type'         => 'button_set',
            'title'        => esc_html__( 'Page Title', 'intime' ),
            'options'      => array(
                'show'  => esc_html__( 'Show', 'intime' ),
                'hide'  => esc_html__( 'Hide', 'intime' ),
            ),
            'default'      => 'show',
        ),

        array(
            'id'       => 'ptitle_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'intime'),
            'subtitle' => esc_html__('Page title background.', 'intime'),
            'output'   => array('body #pagetitle'),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true,
            'background-image' => true,
            'background-color' => false,
            'background-position' => false,
            'background-repeat' => false,
            'background-size' => false,
            'background-attachment' => false,
            'transparent' => false,
        ),
        array(
            'id'       => 'ptitle_bg_overlay',
            'type'     => 'color_rgba',
            'title'    => esc_html__( 'Background Color Overlay', 'intime' ),
            'subtitle' => esc_html__( 'Page title background color overlay.', 'intime' ),
            'output'   => array( 'background-color' => '#pagetitle:before' ),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true,
        ),
        array(
            'id'             => 'page_title_padding',
            'type'           => 'spacing',
            'output'         => array('body #pagetitle'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Page Title Space Top/Bottom', 'intime'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_breadcrumb_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Breadcrumb', 'intime'),
            'options'  => array(
                'show'  => esc_html__('Show', 'intime'),
                'hidden'  => esc_html__('Hidden', 'intime'),
            ),
            'default'  => 'show',
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'          => 'breadcrumb_color',
            'type'        => 'color',
            'title'       => esc_html__('Breadcrumb Color', 'intime'),
            'transparent' => false,
            'default'     => '',
            'output'         => array('.ct-breadcrumb, .ct-breadcrumb li a:after'),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
    )
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Content', 'intime'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array(
        array(
            'id'       => 'content_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'intime'),
            'subtitle' => esc_html__('Content background.', 'intime'),
            'output'   => array( 'background-color' => '.single-post .site-content, body.blog .site-content, body.archive .site-content, body.search .site-content, body.page-template-blog-classic .site-content' ),
            'force_output' => true,
            'background-image' => true,
            'background-color' => true,
            'background-position' => true,
            'background-repeat' => true,
            'background-size' => true,
            'background-attachment' => true,
            'transparent' => false,
            'default'  => array(
                'background-color' => '#f5f3f0',
            )
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('#content'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'intime'),
            'desc'           => esc_html__('Default: Top-95px, Bottom-70px', 'intime'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'      => 'search_field_placeholder',
            'type'    => 'text',
            'title'   => esc_html__('Search Form - Text Placeholder', 'intime'),
            'default' => '',
            'desc'           => esc_html__('Default: Search', 'intime'),
        ),
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Archive', 'intime'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'archive_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'intime'),
            'subtitle' => esc_html__('Select a sidebar position for blog home, archive, search...', 'intime'),
            'options'  => array(
                'left'  => esc_html__('Left', 'intime'),
                'right' => esc_html__('Right', 'intime'),
                'none'  => esc_html__('Disabled', 'intime')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'archive_date_on',
            'title'    => esc_html__('Date', 'intime'),
            'subtitle' => esc_html__('Show date posted on each post.', 'intime'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_categories_on',
            'title'    => esc_html__('Categories', 'intime'),
            'subtitle' => esc_html__('Show category names on each post.', 'intime'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_author_on',
            'title'    => esc_html__('Author', 'intime'),
            'subtitle' => esc_html__('Show author names on each post.', 'intime'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_comment_on',
            'title'    => esc_html__('Comment', 'intime'),
            'subtitle' => esc_html__('Show comment names on each post.', 'intime'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'      => 'archive_readmore_text',
            'type'    => 'text',
            'title'   => esc_html__('Read More Text', 'intime'),
            'default' => '',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'intime'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'post_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'intime'),
            'subtitle' => esc_html__('Select a sidebar position', 'intime'),
            'options'  => array(
                'left'  => esc_html__('Left', 'intime'),
                'right' => esc_html__('Right', 'intime'),
                'none'  => esc_html__('Disabled', 'intime')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'post_date_on',
            'title'    => esc_html__('Date', 'intime'),
            'subtitle' => esc_html__('Show date on single post.', 'intime'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_author_on',
            'title'    => esc_html__('Author', 'intime'),
            'subtitle' => esc_html__('Show author name on single post.', 'intime'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_comment_on',
            'title'    => esc_html__('Comment', 'intime'),
            'subtitle' => esc_html__('Show comment name on single post.', 'intime'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_categories_on',
            'title'    => esc_html__('Categories', 'intime'),
            'subtitle' => esc_html__('Show category names on single post.', 'intime'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_tags_on',
            'title'    => esc_html__('Tags', 'intime'),
            'subtitle' => esc_html__('Show tag names on single post.', 'intime'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_navigation_on',
            'title'    => esc_html__('Navigation', 'intime'),
            'subtitle' => esc_html__('Show navigation on single post.', 'intime'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'post_social_share_on',
            'title'    => esc_html__('Social Share', 'intime'),
            'subtitle' => esc_html__('Show social share on single post.', 'intime'),
            'type'     => 'switch',
            'default'  => false,
        ),
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'intime'),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            array(
                'id'       => 'sidebar_shop',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Position', 'intime'),
                'subtitle' => esc_html__('Select a sidebar position for archive shop.', 'intime'),
                'options'  => array(
                    'left'  => esc_html__('Left', 'intime'),
                    'right' => esc_html__('Right', 'intime'),
                    'none'  => esc_html__('Disabled', 'intime')
                ),
                'default'  => 'right'
            ),
            array(
                'title' => esc_html__('Products displayed per page', 'intime'),
                'id' => 'product_per_page',
                'type' => 'slider',
                'subtitle' => esc_html__('Number product to show', 'intime'),
                'default' => 12,
                'min'  => 4,
                'step' => 1,
                'max' => 50,
                'display_value' => 'text'
            ),
        )
    ));
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'intime'),
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'          => 'footer_layout_custom',
            'type'        => 'select',
            'title'       => esc_html__('Layout', 'intime'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','intime'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     =>intime_list_post('footer'),
            'default'     => '',
        ),
        array(
            'id'       => 'back_totop_on',
            'type'     => 'switch',
            'title'    => esc_html__('Back to Top Button', 'intime'),
            'subtitle' => esc_html__('Show back to top button when scrolled down.', 'intime'),
            'default'  => false,
        ),
        array(
            'id'       => 'fixed_footer',
            'type'     => 'switch',
            'title'    => esc_html__('Fixed Footer', 'intime'),
            'default'  => false,
        ),
    )
));

/* 404 Page /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('404 Page', 'intime'),
    'icon'   => 'el-cog-alt el',
    'fields' => array(
        array(
            'id'       => 'page_404',
            'type'     => 'button_set',
            'title'    => esc_html__('Select 404 Page', 'intime'),
            'options'  => array(
                'default'  => esc_html__('Default', 'intime'),
                'custom'  => esc_html__('Custom', 'intime'),
            ),
            'default'  => 'default'
        ),
        array(
            'id'          => 'page_custom_404',
            'type'        => 'select',
            'title'       => esc_html__('Page', 'intime'),
            'options'     => intime_list_post('page'),
            'default'     => '',
            'required' => array( 0 => 'page_404', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
    ),
));

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'intime'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'intime'),
            'transparent' => false,
            'default'     => '#c20b0b'
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'intime'),
            'transparent' => false,
            'default'     => '#191919'
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Third Color', 'intime'),
            'transparent' => false,
            'default'     => '#ff4b16'
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'intime'),
            'default' => array(
                'regular' => '#c20b0b',
                'hover'   => '#880c0c',
                'active'  => '#880c0c'
            ),
            'output'  => array('a')
        ),
        array(
            'id'          => 'dark_color',
            'type'        => 'color',
            'title'       => esc_html__('Dark Color', 'intime'),
            'transparent' => false,
            'default'     => '#000'
        ),
        array(
            'id'          => 'gradient_color',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color', 'intime'),
            'transparent' => false,
            'default'  => array(
                'from' => '#fb5850',
                'to'   => '#ffa200', 
            ),
        ),
    )
));

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
$custom_font_selectors_1 = Redux::get_option($opt_name, 'custom_font_selectors_1');
$custom_font_selectors_1 = !empty($custom_font_selectors_1) ? explode(',', $custom_font_selectors_1) : array();
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'intime'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'body_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Body Default Font', 'intime'),
            'options'  => array(
                'Roboto'  => esc_html__('Default', 'intime'),
                'Google-Font'  => esc_html__('Google Font', 'intime'),
            ),
            'default'  => 'Roboto',
        ),
        array(
            'id'          => 'font_main',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'intime'),
            'subtitle'    => esc_html__('This will be the default font of your website.', 'intime'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'       => 'heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Heading Default Font', 'intime'),
            'options'  => array(
                'Libre-Caslon-Text'  => esc_html__('Default', 'intime'),
                'Google-Font'  => esc_html__('Google Font', 'intime'),
            ),
            'default'  => 'Libre-Caslon-Text',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('H1', 'intime'),
            'subtitle'    => esc_html__('This will be the default font for all H1 tags of your website.', 'intime'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h1', '.h1', '.text-heading'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('H2', 'intime'),
            'subtitle'    => esc_html__('This will be the default font for all H2 tags of your website.', 'intime'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h2', '.h2'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('H3', 'intime'),
            'subtitle'    => esc_html__('This will be the default font for all H3 tags of your website.', 'intime'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h3', '.h3'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('H4', 'intime'),
            'subtitle'    => esc_html__('This will be the default font for all H4 tags of your website.', 'intime'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h4', '.h4'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('H5', 'intime'),
            'subtitle'    => esc_html__('This will be the default font for all H5 tags of your website.', 'intime'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h5', '.h5'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('H6', 'intime'),
            'subtitle'    => esc_html__('This will be the default font for all H6 tags of your website.', 'intime'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h6', '.h6'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Fonts Selectors', 'intime'),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Font', 'intime'),
            'subtitle'    => esc_html__('This will be the font that applies to the class selector.', 'intime'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => $custom_font_selectors_1,
            'units'       => 'px',

        ),
        array(
            'id'       => 'custom_font_selectors_1',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Selectors', 'intime'),
            'subtitle' => esc_html__('Add class selectors to apply above font.', 'intime'),
            'validate' => 'no_html'
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Extra Post Type', 'intime'),
    'icon'       => 'el el-briefcase',
    'fields'     => array(
        array(
            'title' => esc_html__('Portfolio', 'intime'),
            'type'  => 'section',
            'id' => 'post_portfolio',
            'indent' => true,
        ),
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'intime'),
            'default' => '',
            'desc'     => 'Default: portfolio',
        ),
        array(
            'id'      => 'portfolio_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Name', 'intime'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
        ),
        array(
            'id'      => 'portfolio_category_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Category Slug', 'intime'),
            'default' => '',
            'desc'     => 'Default: portfolio-category',
        ),
        array(
            'id'      => 'portfolio_category_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Category Name', 'intime'),
            'default' => '',
            'desc'     => 'Default: Portfolio Categories',
        ),
        array(
            'id'    => 'archive_portfolio_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'intime' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
        ),
        
        array(
            'title' => esc_html__('Service', 'intime'),
            'type'  => 'section',
            'id' => 'post_service',
            'indent' => true,
        ),
        array(
            'id'      => 'service_slug',
            'type'    => 'text',
            'title'   => esc_html__('Service Slug', 'intime'),
            'default' => '',
            'desc'     => 'Default: service',
        ),
        array(
            'id'      => 'service_name',
            'type'    => 'text',
            'title'   => esc_html__('Service Name', 'intime'),
            'default' => '',
            'desc'     => 'Default: Service',
        ),
        array(
            'id'      => 'service_category_slug',
            'type'    => 'text',
            'title'   => esc_html__('Service Category Slug', 'intime'),
            'default' => '',
            'desc'     => 'Default: service-category',
        ),
        array(
            'id'      => 'service_category_name',
            'type'    => 'text',
            'title'   => esc_html__('Service Category Name', 'intime'),
            'default' => '',
            'desc'     => 'Default: Service Categories',
        ),
        array(
            'id'    => 'archive_service_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'intime' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
        ),
    )
));

/* Custom Code /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom Code', 'intime'),
    'icon'   => 'el-icon-edit',
    'fields' => array(

        array(
            'id'       => 'site_header_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Header Custom Codes', 'intime'),
            'subtitle' => esc_html__('It will insert the code to wp_head hook.', 'intime'),
        ),
        array(
            'id'       => 'site_footer_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Footer Custom Codes', 'intime'),
            'subtitle' => esc_html__('It will insert the code to wp_footer hook.', 'intime'),
        ),

    ),
));

/* Custom CSS /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom CSS', 'intime'),
    'icon'   => 'el-icon-adjust-alt',
    'fields' => array(

        array(
            'id'   => 'customcss',
            'type' => 'info',
            'desc' => esc_html__('Custom CSS', 'intime')
        ),

        array(
            'id'       => 'site_css',
            'type'     => 'ace_editor',
            'title'    => esc_html__('CSS Code', 'intime'),
            'subtitle' => esc_html__('Advanced CSS Options. You can paste your custom CSS Code here.', 'intime'),
            'mode'     => 'css',
            'validate' => 'css',
            'theme'    => 'chrome',
            'default'  => ""
        ),

    ),
));