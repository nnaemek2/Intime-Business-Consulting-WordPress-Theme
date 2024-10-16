<?php

$files = scandir(get_template_directory() . '/elementor/core/register');

foreach ($files as $file){
    $pos = strrpos($file, ".php");
    if($pos !== false){
        require_once get_template_directory() . '/elementor/core/register/' . $file;
    }
}

if(!function_exists('intime_register_custom_icon_library')){
    add_filter('elementor/icons_manager/native', 'intime_register_custom_icon_library');
    function intime_register_custom_icon_library($tabs){
        $custom_tabs = [
            'extra_icon1' => [
                'name' => 'material',
                'label' => esc_html__( 'Material Design Iconic', 'intime' ),
                'url' => get_template_directory_uri() . '/assets/css/font-material-design.min.css',
                'enqueue' => [  ],
                'prefix' => 'zmdi zmdi-',
                'displayPrefix' => 'material',
                'labelIcon' => 'zmdi zmdi-collection-text',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/elementor-icon/materialdesign.js',
                'native' => true,
            ],

            'extra_icon2' => [
                'name' => 'flaticon',
                'label' => esc_html__( 'Flaticon Version 1', 'intime' ),
                'url' => get_template_directory_uri() . '/assets/css/flaticon.css',
                'enqueue' => [  ],
                'prefix' => 'flaticon-',
                'displayPrefix' => 'flaticon',
                'labelIcon' => 'flaticon-business-presentation',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/elementor-icon/flaticon.js',
                'native' => true,
            ],

            'extra_icon3' => [
                'name' => 'flaticon-v2',
                'label' => esc_html__( 'Flaticon Version 2', 'intime' ),
                'url' => get_template_directory_uri() . '/assets/css/flaticon-v2.css',
                'enqueue' => [  ],
                'prefix' => 'flaticon-v2-',
                'displayPrefix' => 'flaticon-v2',
                'labelIcon' => 'flaticon-v2-finance',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/elementor-icon/flaticon-v2.js',
                'native' => true,
            ],

        ];

        $tabs = array_merge($custom_tabs, $tabs);

        return $tabs;
    }
}