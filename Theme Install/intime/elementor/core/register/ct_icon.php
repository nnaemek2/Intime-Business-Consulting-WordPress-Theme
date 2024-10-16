<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_icon',
        'title' => esc_html__('Icons', 'intime'),
        'icon' => 'eicon-alert',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_icon',
                    'label' => esc_html__('Icons', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icons',
                            'label' => esc_html__('Icons', 'intime'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'ct_icon',
                                    'label' => esc_html__('Icon', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'default' => [
                                        'value' => 'fas fa-star',
                                        'library' => 'fa-solid',
                                    ],
                                ),
                                array(
                                    'name' => 'icon_link',
                                    'label' => esc_html__('Icon Link', 'intime'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'icon_color',
                                    'label' => esc_html__('Icon Color', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                ),
                                array(
                                    'name' => 'icon_color_hover',
                                    'label' => esc_html__('Icon Color Hover', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'intime' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'intime' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'intime' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'intime' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-icon1' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__( 'Link Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ct-icon1 a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__( 'Link Color Hover', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ct-icon1 a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_typography',
                            'label' => esc_html__('Icon Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-icon1 a',
                        ),
                        array(
                            'name' => 'icon_space',
                            'label' => esc_html__('Icon Spacer', 'intime' ),
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
                                '{{WRAPPER}} .ct-icon1 a' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);