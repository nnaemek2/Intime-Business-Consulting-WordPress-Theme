<?php
// Register Point Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_point',
        'title' => esc_html__('Point', 'intime' ),
        'icon' => 'eicon-cursor-move',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'ct-counter-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Source Settings', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'bg_image',
                            'label' => esc_html__( 'Background Image', 'intime' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'item_list',
                            'label' => esc_html__('Items', 'intime'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'point_type',
                                    'label' => esc_html__('Point Types', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'default' => 'Default',
                                        'icon' => 'Icon Image',
                                        'highlight' => 'Highlight',
                                    ],
                                    'default' => 'default',
                                ),
                                array(
                                    'name' => 'icon',
                                    'label' => esc_html__( 'Icon Image', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'condition' => [
                                        'point_type' => 'icon'
                                    ],
                                ),
                                array(
                                    'name' => 'number',
                                    'label' => esc_html__('Number', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'condition' => [
                                        'point_type' => 'highlight'
                                    ],
                                ),
                                array(
                                    'name' => 'number_suffix',
                                    'label' => esc_html__('Number Suffix', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'condition' => [
                                        'point_type' => 'highlight'
                                    ],
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'condition' => [
                                        'point_type' => 'highlight'
                                    ],
                                ),
                                array(
                                    'name' => 'top_positioon',
                                    'label' => esc_html__('Top Position', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ '%' ],
                                    'default' => [
                                        'size' => 0,
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                ),
                                array(
                                    'name' => 'left_positioon',
                                    'label' => esc_html__('Left Position', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ '%' ],
                                    'default' => [
                                        'size' => 0,
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                ),
                                array(
                                    'name' => 'item_id',
                                    'label' => esc_html__('Item ID', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
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