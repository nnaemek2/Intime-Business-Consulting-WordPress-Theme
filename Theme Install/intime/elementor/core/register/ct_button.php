<?php
// Register Button Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_button',
        'title' => esc_html__('Button', 'intime' ),
        'icon' => 'eicon-button',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default btn-animate',
                            'options' => [
                                'btn-default btn-animate' => esc_html__('Default', 'intime' ),
                                'btn-text1' => esc_html__('Text White Divider', 'intime' ),
                                'btn-text2' => esc_html__('Text Primary Icon Round', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click here', 'intime'),
                            'placeholder' => esc_html__('Click here', 'intime'),
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'intime' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'intime' ),
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'intime' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'intime' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'intime' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'intime' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'intime' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .ct-button-wrapper' => 'text-align: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'intime' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-button-wrapper .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'condition' => [
                                'style' => ['btn-default btn-animate'],
                            ],
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'intime' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-button-wrapper .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => ['btn-default btn-animate'],
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-button-wrapper .btn',
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'intime' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'style' => ['btn-default btn-animate'],
                            ],
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Before', 'intime' ),
                                'right' => esc_html__('After', 'intime' ),
                            ],
                            'condition' => [
                                'btn_icon!' => '',
                                'style' => ['btn-default btn-animate'],
                            ],
                        ),
                        array(
                            'name' => 'icon_space_left',
                            'label' => esc_html__('Icon Space Left', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-button-wrapper .ct-button-icon.ct-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['left'],
                                'style' => ['btn-default btn-animate'],
                            ],
                        ),
                        array(
                            'name' => 'icon_space_right',
                            'label' => esc_html__('Icon Space Right', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-button-wrapper .ct-button-icon.ct-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['right'],
                                'style' => ['btn-default btn-animate'],
                            ],
                        ),
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Text Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-button-wrapper .btn' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color Main', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-button-wrapper .btn' => 'background: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'style' => ['btn-default btn-animate'],
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_gradient',
                            'label' => esc_html__('Background Color Gradient', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'style' => ['btn-default btn-animate'],
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Background Color Hover', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-button-wrapper .btn:not(.btn-animate):hover, {{WRAPPER}} .ct-button-wrapper .btn:not(.btn-animate):focus, {{WRAPPER}} .btn.btn-animate:before' => 'background: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'style' => ['btn-default btn-animate'],
                            ],
                        ),
                        array(
                            'name' => 'btn_color_hover',
                            'label' => esc_html__('Text Color Hover', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-button-wrapper .btn:hover' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'intime' ),
                                'solid' => esc_html__( 'Solid', 'intime' ),
                                'double' => esc_html__( 'Double', 'intime' ),
                                'dotted' => esc_html__( 'Dotted', 'intime' ),
                                'dashed' => esc_html__( 'Dashed', 'intime' ),
                                'groove' => esc_html__( 'Groove', 'intime' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-button-wrapper .btn' => 'border-style: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'style' => ['btn-default btn-animate'],
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'intime' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .ct-button-wrapper .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                                'style' => ['btn-default btn-animate'],
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ct-button-wrapper .btn' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                                'style' => ['btn-default btn-animate'],
                            ],
                        ),
                        array(
                            'name' => 'ct_animate',
                            'label' => esc_html__('Case Animate', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => intime_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'ct_animate_delay',
                            'label' => esc_html__('Animate Delay', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);