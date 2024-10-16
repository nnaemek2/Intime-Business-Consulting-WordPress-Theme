<?php

// Register Progress Bar Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_progressbar',
        'title' => esc_html__( 'Progress Bar', 'intime' ),
        'icon' => 'eicon-skill-bar',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(
            'progressbar',
            'ct-progressbar-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__( 'Source Settings', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'progressbar_list',
                            'label' => esc_html__( 'Progress Bar Lists', 'intime' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__( 'Title', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'percent',
                                    'label' => esc_html__( 'Percentage', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'default' => [
                                        'size' => 50,
                                        'unit' => '%',
                                    ],
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Layout 1',
                                '2' => 'Layout 2',
                                '3' => 'Layout 3',
                                '4' => 'Layout 4',
                                '5' => 'Layout 5',
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_title',
                    'label' => esc_html__( 'Style', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-progressbar .ct-progress-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__( 'Title Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-progressbar .ct-progress-title',
                        ),
                        array(
                            'name' => 'percent_color',
                            'label' => esc_html__( 'Percentage Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-progressbar .ct-progress-percentage' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__( 'Bar Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-progressbar .ct-progress-bar' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_bg_color',
                            'label' => esc_html__( 'Bar Background Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-progressbar .ct-progress-holder' => 'background: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);