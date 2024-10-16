<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_pricing',
        'title' => esc_html__('Pricing', 'intime'),
        'icon' => 'eicon-settings',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_list_monthly',
                    'label' => esc_html__('Pricing Monthly', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'tab_title_monthly',
                            'label' => esc_html__('Tab Title', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'col_monthly',
                            'label' => esc_html__('Column', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                            ],
                            'default' => '4',
                        ),
                        array(
                            'name' => 'ct_animate',
                            'label' => esc_html__('Case Animate', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => intime_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'content_monthly',
                            'label' => esc_html__('Content', 'intime'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'featured',
                                    'label' => esc_html__('Featured', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'no' => 'No',
                                        'yes' => 'Yes',
                                    ],
                                    'default' => 'no',
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'sub_title',
                                    'label' => esc_html__('Sub Title', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'price1',
                                    'label' => esc_html__('Price', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
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
                                ),
                                array(
                                    'name' => 'selected_icon',
                                    'label' => esc_html__('Icon', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'condition' => [
                                        'icon_type' => 'icon',
                                    ],
                                ),
                                array(
                                    'name' => 'icon_image',
                                    'label' => esc_html__( 'Icon Image', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'description' => esc_html__('Select image icon.', 'intime'),
                                    'condition' => [
                                        'icon_type' => 'image',
                                    ],
                                ),
                                array(
                                    'name' => 'description',
                                    'label' => esc_html__('Description', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'price2',
                                    'label' => esc_html__('Price', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'button_text',
                                    'label' => esc_html__('Button Text', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => '',
                                ),
                                array(
                                    'name' => 'button_link',
                                    'label' => esc_html__('Button Link', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                                array(
                                    'name' => 'popular',
                                    'label' => esc_html__('Popular Text', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_list_year',
                    'label' => esc_html__('Pricing Year', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'tab_title_year',
                            'label' => esc_html__('Tab Title', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'col_year',
                            'label' => esc_html__('Column', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                            ],
                            'default' => '4',
                        ),
                        array(
                            'name' => 'content_year',
                            'label' => esc_html__('Content', 'intime'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'featured',
                                    'label' => esc_html__('Featured', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'no' => 'No',
                                        'yes' => 'Yes',
                                    ],
                                    'default' => 'no',
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'sub_title',
                                    'label' => esc_html__('Sub Title', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'price1',
                                    'label' => esc_html__('Price', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
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
                                ),
                                array(
                                    'name' => 'selected_icon',
                                    'label' => esc_html__('Icon', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'condition' => [
                                        'icon_type' => 'icon',
                                    ],
                                ),
                                array(
                                    'name' => 'icon_image',
                                    'label' => esc_html__( 'Icon Image', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'description' => esc_html__('Select image icon.', 'intime'),
                                    'condition' => [
                                        'icon_type' => 'image',
                                    ],
                                ),
                                array(
                                    'name' => 'description',
                                    'label' => esc_html__('Description', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'price2',
                                    'label' => esc_html__('Price', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'button_text',
                                    'label' => esc_html__('Button Text', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => '',
                                ),
                                array(
                                    'name' => 'button_link',
                                    'label' => esc_html__('Button Link', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                                array(
                                    'name' => 'popular',
                                    'label' => esc_html__('Popular Text', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);