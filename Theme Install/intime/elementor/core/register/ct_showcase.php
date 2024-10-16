<?php
// Register Banner Box Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_showcase',
        'title' => esc_html__('Showcase', 'intime' ),
        'icon' => 'eicon-gallery-grid',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'ct-post-masonry-widget-js',
            'ct-post-grid-widget-js',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_list',
                            'label' => esc_html__('Showcase', 'intime'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'btn_text1',
                                    'label' => esc_html__('Button Text 1', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'button_link1',
                                    'label' => esc_html__('Button Link 1', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                                array(
                                    'name' => 'btn_text2',
                                    'label' => esc_html__('Button Text 2', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'button_link2',
                                    'label' => esc_html__('Button Link 2', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'default' => [
                                        'url' => '#',
                                    ],
                                ),
                                array(
                                    'name' => 'category',
                                    'label' => esc_html__('Category', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'coming',
                                    'label' => esc_html__('Coming Soon', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => 'no',
                                    'options' => [
                                        'no' => esc_html__('No', 'intime' ),
                                        'yes' => esc_html__('Yes', 'intime' ),
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'grid_section',
                    'label' => esc_html__('Grid', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Masonry', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'intime' ),
                                'false' => esc_html__('Disable', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'thumbnail',
                            'type' => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default' => 'full',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '4',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '4',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
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