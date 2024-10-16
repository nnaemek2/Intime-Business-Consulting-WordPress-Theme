<?php
// Post term options
$post_term_options = ct_get_grid_term_options('post');
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
// Register Post Carousel Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_blog_carousel',
        'title' => esc_html__('Blog Carousel', 'intime' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(
            'jquery-slick',
            'ct-post-carousel-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'prefix_class' => 'ct-post-carousel-layout',
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'intime' ),
                            'type' => Case_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout5.jpg'
                                ],
                                '6' => [
                                    'label' => esc_html__('Layout 6', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_blog_carousel/layout-image/layout6.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source',
                            'label' => esc_html__('Select Categories', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'multiple' => true,
                            'options' => $post_term_options,
                        ),
                        array(
                            'name' => 'orderby',
                            'label' => esc_html__('Order By', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'date',
                            'options' => [
                                'date' => esc_html__('Date', 'intime' ),
                                'ID' => esc_html__('ID', 'intime' ),
                                'author' => esc_html__('Author', 'intime' ),
                                'title' => esc_html__('Title', 'intime' ),
                                'rand' => esc_html__('Random', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'order',
                            'label' => esc_html__('Sort Order', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'desc',
                            'options' => [
                                'desc' => esc_html__('Descending', 'intime' ),
                                'asc' => esc_html__('Ascending', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'limit',
                            'label' => esc_html__('Total items', 'intime' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => '6',
                        ),
                    ),
                ),
                array(
                    'name' => 'display_section',
                    'label' => esc_html__('Display Options', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'thumbnail',
                            'type' => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default' => 'custom',
                        ),
                        array(
                            'name' => 'show_date',
                            'label' => esc_html__('Show Date', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Category', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['1', '2'],
                            ],
                        ),
                        array(
                            'name' => 'show_author',
                            'label' => esc_html__('Show Author', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['1', '2', '4', '5'],
                            ],
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button Readmore', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['1', '3', '5', '6'],
                            ],
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'show_button' => 'true',
                                'layout' => ['1', '3', '5', '6'],
                            ],
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['1', '3'],
                            ],
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'intime' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                            'condition' => [
                                'show_excerpt' => 'true',
                                'layout' => ['1', '3'],
                            ],
                            'separator' => 'after',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel', 'intime'),
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
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'intime'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'dots',
                            'label' => esc_html__('Show Dots', 'intime'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'intime'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'intime'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'intime'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'false'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'intime'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'intime'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);