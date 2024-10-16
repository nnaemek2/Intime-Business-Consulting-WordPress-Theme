<?php
// Register Video Player Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_particle_animate',
        'title' => esc_html__('Particle Animate', 'intime' ),
        'icon' => 'eicon-barcode',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Source Settings', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_list',
                            'label' => esc_html__('Images', 'intime'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'particle',
                                    'label' => esc_html__( 'Particle', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'particle_animate',
                                    'label' => esc_html__('Animate', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'animate-none' => 'None',
                                        'shape-parallax' => 'Parallax',
                                        'shape-animate1' => 'Animate 1',
                                        'shape-animate2' => 'Animate 2',
                                        'shape-animate3' => 'Animate 3',
                                        'shape-animate4' => 'Animate 4',
                                    ],
                                    'default' => 'animate-none',
                                ),
                                array(
                                    'name' => 'type_position',
                                    'label' => esc_html__('Position', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'top-left' => 'Top Left',
                                        'top-right' => 'Top Right',
                                        'bottom-right' => 'Bottom Right',
                                    ],
                                    'default' => 'top-left',
                                ),
                                array(
                                    'name' => 'top_positioon',
                                    'label' => esc_html__('Top Position', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-left', 'top-right'],
                                    ],
                                ),
                                array(
                                    'name' => 'left_positioon',
                                    'label' => esc_html__('Left Position', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => 'top-left',
                                    ],
                                ),
                                array(
                                    'name' => 'bottom_positioon',
                                    'label' => esc_html__('Bottom Position', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => ['bottom-right'],
                                    ],
                                ),
                                array(
                                    'name' => 'right_positioon',
                                    'label' => esc_html__('Right Position', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-right', 'bottom-right'],
                                    ],
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);