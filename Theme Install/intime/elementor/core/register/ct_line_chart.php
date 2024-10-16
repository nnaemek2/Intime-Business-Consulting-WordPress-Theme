<?php

// Register Pie Charts Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_line_chart',
        'title' => esc_html__('Line Chart', 'intime'),
        'icon' => 'fa fa-chart-line',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(
            'chart-js',
            'ct-linecharts-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_line_chart',
                    'label' => esc_html__('Piecharts', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'x_ax',
                            'label' => esc_html__('X-axis values', 'intime'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'default' => '2020;2019;2018;2017;2016;2015',
                        ),
                        array(
                            'name' => 'values',
                            'label' => esc_html__('Values', 'intime'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'intime'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'y_ax',
                                    'label' => esc_html__('Y-axis values', 'intime'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'border_color',
                                    'label' => esc_html__('Border Color', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                ),
                                array(
                                    'name' => 'bg_color',
                                    'label' => esc_html__('Background Color', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                ),
                            ),
                            'default' => [
                                [
                                    'title' => 'Business',
                                    'y_ax' => '5000;7500;4000;14000;9000;24000',
                                ],
                                [
                                    'title' => 'Finance',
                                    'y_ax' => '12500;11000;22000;17000;27000;26500',
                                ],
                                [
                                    'title' => 'Consulting',
                                    'y_ax' => '16000;19000;28000;24000;32000;36500',
                                ],
                            ],
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'values_color',
                            'label' => esc_html__('Values Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);