<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_contact_info',
        'title' => esc_html__('Contact Info', 'intime'),
        'icon' => 'eicon-info-circle-o',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_contact_info',
                    'label' => esc_html__('Contact Info', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'contact_info',
                            'label' => esc_html__('Info List', 'intime'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'intime'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
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
                                    'name' => 'ct_icon',
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
                            ),
                            'title_field' => '{{{ content }}}',
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color Main', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-contact-info .ct-contact-icon i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_gradient',
                            'label' => esc_html__('Icon Color Gradient', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'intime' ),
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
                                '{{WRAPPER}} .ct-contact-info1 i' => 'font-size: {{SIZE}}{{UNIT}};',
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
                                '{{WRAPPER}} .ct-contact-info1 .ct-contact-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-contact-info' => 'color: {{VALUE}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'content_typography',
                            'label' => esc_html__('Content Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-contact-info',
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Space', 'intime' ),
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
                                '{{WRAPPER}} .ct-contact-info1 li + li' => 'margin-top: {{SIZE}}{{UNIT}};',
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