<?php
// Post term options
$post_term_options = ct_get_grid_term_options('service');

// Register Post Grid Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_service_grid',
        'title' => esc_html__('Service Grid', 'intime' ),
        'icon' => 'eicon-posts-justified',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'ct-post-masonry-widget-js',
            'ct-post-grid-widget-js',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'style_layout1',
                            'label' => esc_html__('Layout Styles', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'intime' ),
                            'type' => Case_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_service_grid/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'intime' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_service_grid/layout-image/layout2.jpg'
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
                            'default' => '8',
                        ),
                    ),
                ),
                array(
                    'name' => 'grid_section',
                    'label' => esc_html__('Grid', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Masonry', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'intime' ),
                                'false' => esc_html__('Disable', 'intime' ),
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Filter Default Title', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'intime' ),
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'filter_alignment',
                            'label' => esc_html__('Filter Alignment', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'center',
                            'options' => [
                                'center' => esc_html__('Center', 'intime' ),
                                'left' => esc_html__('Left', 'intime' ),
                                'right' => esc_html__('Right', 'intime' ),
                            ],
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'pagination' => esc_html__('Pagination', 'intime' ),
                                'loadmore' => esc_html__('Loadmore', 'intime' ),
                                'false' => esc_html__('Disable', 'intime' ),
                            ],
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
                            'default' => '4',
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
                            'default' => '4',
                            'options' => [
                                '1' => esc_html__('1', 'intime' ),
                                '2' => esc_html__('2', 'intime' ),
                                '3' => esc_html__('3', 'intime' ),
                                '4' => esc_html__('4', 'intime' ),
                                '6' => esc_html__('6', 'intime' ),
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
                array(
                    'name' => 'display_section',
                    'label' => esc_html__('Display Options', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'show_title',
                            'label' => esc_html__('Show Title', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'intime' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                            'condition' => [
                                'show_excerpt' => 'true',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button Readmore', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'layout' => ['1', '2'],
                            ],
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'show_button' => 'true',
                                'layout' => ['1', '2'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'intime' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-grid .item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-grid .item--title',
                        ),

                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-grid .item--content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'label' => esc_html__('Content Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-grid .item--content',
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Background Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-service-grid1 .item--holder' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'box_overlay_color',
                            'label' => esc_html__('Box Overlay Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-service-grid1 .item--holder-hover::before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);