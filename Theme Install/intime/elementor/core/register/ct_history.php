<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

// Register History List Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_history',
        'title' => esc_html__('History Carousel', 'intime'),
        'icon' => 'eicon-flip-box',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(
            'jquery-slick',
            'ct-post-carousel-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_list',
                    'label' => esc_html__('History', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'history',
                            'label' => esc_html__('Add Item', 'intime'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'intime'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'year',
                                    'label' => esc_html__('Year', 'intime'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'year_box_color',
                                    'label' => esc_html__('Year Box Color', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .ct-fancy-box .item--title' => 'color: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'description',
                                    'label' => esc_html__('Description', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-history .item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'description_color',
                            'label' => esc_html__('Description Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-history .item--description' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel Settings', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'ct_animate',
                            'label' => esc_html__('Case Animate', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => intime_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'intime'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'dots',
                            'label' => esc_html__('Show Dots', 'intime'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'intime'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'intime'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'intime'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'intime'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'intime'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);