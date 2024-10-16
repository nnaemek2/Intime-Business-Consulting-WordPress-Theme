<?php
//Register Counter Widget
 ct_add_custom_widget(
    array(
        'name' => 'ct_counter',
        'title' => esc_html__('Counter', 'intime'),
        'icon' => 'eicon-counter-circle',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'ct-counter-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'intime' ),
                            'type' => Case_Theme_Core::LAYOUT_CONTROL,
                            'prefix_class' => 'ct-counter-layout',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_counter/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_counter/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_counter/layout-image/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_counter/layout-image/layout4.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_counter',
                    'label' => esc_html__('Counter', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'ct_icon_type',
                            'label' => esc_html__('Icon Type', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                            'condition' => [
                                'layout' => ['3','4'],
                            ],
                        ),
                        array(
                            'name' => 'counter_icon',
                            'label' => esc_html__('Icon', 'intime' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'ct_icon_type' => 'icon',
                                'layout' => ['3','4'],
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'intime' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'description' => esc_html__('Select image icon.', 'intime'),
                            'condition' => [
                                'ct_icon_type' => 'image',
                                'layout' => ['3','4'],
                            ],
                        ),
                        array(
                            'name' => 'starting_number',
                            'label' => esc_html__('Starting Number', 'intime'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'ending_number',
                            'label' => esc_html__('Ending Number', 'intime'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 'prefix',
                            'label' => esc_html__('Number Prefix', 'intime'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'intime'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'duration',
                            'label' => esc_html__('Animation Duration', 'intime'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 2000,
                            'min' => 100,
                            'step' => 100,
                        ),
                        array(
                            'name' => 'thousand_separator',
                            'label' => esc_html__('Thousand Separator', 'intime'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'thousand_separator_char',
                            'label' => esc_html__('Separator', 'intime'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'condition' => [
                                'thousand_separator' => 'true',
                            ],
                            'options' => [
                                '' => 'Default',
                                '.' => 'Dot',
                                ' ' => 'Space',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'intime'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => ['1', '2'],
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
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => '3',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'style_l3',
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
                    'name' => 'section_icon',
                    'label' => esc_html__('Icon', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => '3',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-counter .item--icon i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-counter .item--icon i',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_number',
                    'label' => esc_html__('Number', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'number_color',
                            'label' => esc_html__('Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-counter  .ct-counter-number-value' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'number_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-counter  .ct-counter-number-value',
                        ),
                        array(
                            'name' => 'prefix_color',
                            'label' => esc_html__('Prefix + Suffix Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-counter-number .ct-counter-number-prefix' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .ct-counter-number .ct-counter-number-suffix' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'suffix_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'label' => esc_html__('Prefix + Suffix Typography', 'intime' ),
                            'selector' => '{{WRAPPER}} .ct-counter .ct-counter-number .ct-counter-number-suffix, {{WRAPPER}} .ct-counter .ct-counter-number .ct-counter-number-prefix',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_title',
                    'label' => esc_html__('Title', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-counter-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography_title',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-counter-title',
                        ),
                        array(
                            'name' => 'box_bg_color',
                            'label' => esc_html__('Box Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-counter-layout3 .ct-counter-inner' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '3',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_desc',
                    'label' => esc_html__('Description', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['1', '2'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-counter-desc' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography_desc',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-counter-desc',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);