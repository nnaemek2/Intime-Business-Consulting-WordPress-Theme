<?php
// Register Video Player Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_image',
        'title' => esc_html__('Image Single', 'intime' ),
        'icon' => 'eicon-image',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(

        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Choose Image', 'intime' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_type',
                            'label' => esc_html__('Image Type', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => 'Image',
                                'bg' => 'Background',
                            ],
                            'default' => 'img',
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'image_max_height',
                            'label' => esc_html__('Image Max Height', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'intime' ),
                            'condition' => [
                                'image_type' => 'img',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .ct-image-single img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_height',
                            'label' => esc_html__('Image Height', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'intime' ),
                            'condition' => [
                                'image_type' => 'bg',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .ct-image-single .ct-image-bg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_align',
                            'label' => esc_html__('Image Alignment', 'intime' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
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
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-image-single' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'image_link',
                            'label' => esc_html__('Link', 'intime' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'img_tilt',
                            'label' => esc_html__('Image Parallax', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no' => 'No',
                                'yes' => 'Yes',
                            ],
                            'default' => 'no',
                            'condition' => [
                                'image_type' => 'img',
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