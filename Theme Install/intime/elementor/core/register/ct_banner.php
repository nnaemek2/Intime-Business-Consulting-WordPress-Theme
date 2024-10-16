<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_banner',
        'title' => esc_html__('Banner', 'intime'),
        'icon' => 'eicon-posts-ticker',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'ct-counter-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'intime' ),
                            'type' => Case_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_banner/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_banner/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_banner/layout-image/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_banner/layout-image/layout4.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'banner_image',
                            'label' => esc_html__('Image', 'intime' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'banner_sub_title',
                            'label' => esc_html__('Sub Title', 'intime'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'banner_title',
                            'label' => esc_html__('Title', 'intime'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['1','2','3'],
                            ],
                        ),
                        array(
                            'name' => 'banner_number',
                            'label' => esc_html__('Number', 'intime'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['1','2'],
                            ],
                        ),
                        array(
                            'name' => 'banner_number_suffix',
                            'label' => esc_html__('Number Suffix', 'intime'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'banner_label',
                            'label' => esc_html__('Number Label', 'intime'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),

                        array(
                            'name' => 'banner_description',
                            'label' => esc_html__('Description', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'placeholder' => esc_html__('Enter your description', 'intime' ),
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => ['2','3'],
                            ],
                        ),

                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'selected_icon',
                            'label' => esc_html__('Icon', 'intime' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'intime' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'description' => esc_html__('Select image icon.', 'intime'),
                            'condition' => [
                                'icon_type' => 'image',
                                'layout' => '2',
                            ],
                        ),
                        
                        array(
                            'name' => 'sub_title_typography',
                            'label' => esc_html__('Sub Title Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-banner3 .ct-banner-sub-title',
                            'condition' => [
                                'layout' => '3',
                            ],
                        ),

                        array(
                            'name' => 'sub_title_desc',
                            'label' => esc_html__('Description Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-banner3 .ct-banner-desc',
                            'condition' => [
                                'layout' => '3',
                            ],
                        ),

                        array(
                            'name' => 'ct_animate',
                            'label' => esc_html__('Case Animate', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => intime_animate(),
                            'default' => '',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);