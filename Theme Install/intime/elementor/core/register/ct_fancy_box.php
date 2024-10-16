<?php
// Register Icon Box Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_fancy_box',
        'title' => esc_html__('Fancy Box', 'intime' ),
        'icon' => 'eicon-icon-box',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(

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
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout5.jpg'
                                ],
                                '6' => [
                                    'label' => esc_html__('Layout 6', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout6.jpg'
                                ],
                                '7' => [
                                    'label' => esc_html__('Layout 7', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout7.jpg'
                                ],
                                '8' => [
                                    'label' => esc_html__('Layout 8', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout8.jpg'
                                ],
                                '9' => [
                                    'label' => esc_html__('Layout 9', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout9.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
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
                            'name' => 'selected_icon',
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
                        array(
                            'name' => 'title_text',
                            'label' => esc_html__('Title', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Enter your title', 'intime' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['9'],
                            ],
                        ),
                        array(
                            'name' => 'description_text',
                            'label' => esc_html__('Description', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'placeholder' => esc_html__('Enter your description', 'intime' ),
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => ['1','2','3','4','6','7','8','9'],
                            ],
                        ),

                        array(
                            'name' => 'item_link',
                            'label' => esc_html__('Link', 'intime' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'layout' => ['2', '5', '8'],
                            ],
                        ),

                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['3', '7'],
                            ],
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'intime' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'layout' => ['3', '7'],
                            ],
                        ),
                        array(
                            'name' => 'item_image',
                            'label' => esc_html__('Choose Image', 'intime' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['5', '8'],
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition' => [
                                'layout' => ['5', '8'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
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
                                'layout' => ['1','4'],
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-fancy-box .item--title',
                        ),
                        array(
                            'name' => 'title_space_top',
                            'label' => esc_html__('Title Top Spacer', 'intime' ),
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
                                '{{WRAPPER}} .ct-fancy-box .item--title' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_space_bottom',
                            'label' => esc_html__('Title Bottom Spacer', 'intime' ),
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
                                '{{WRAPPER}} .ct-fancy-box .item--title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--description' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1','2','3','4','7','8','9'],
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Description Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-fancy-box .item--description',
                            'condition' => [
                                'layout' => ['1','2','3','4','7','8','9'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--icon i' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_animate',
                    'label' => esc_html__('Animate', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
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