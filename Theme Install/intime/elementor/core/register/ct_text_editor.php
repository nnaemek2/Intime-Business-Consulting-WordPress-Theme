<?php
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
$text_columns = range( 1, 10 );
$text_columns = array_combine( $text_columns, $text_columns );
$text_columns[''] = __( 'Default', 'intime' );
ct_add_custom_widget(
    array(
        'name' => 'ct_text_editor',
        'title' => esc_html__( 'Text Editor', 'intime' ),
        'icon' => 'eicon-text',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(

        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'editor_section',
                    'label' => esc_html__( 'Text Editor', 'intime' ),
                    'tab' => Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text_editor',
                            'label' => '',
                            'type' => Controls_Manager::WYSIWYG,
                            'default' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'intime' ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_content',
                    'label' => esc_html__( 'Content Alignment', 'intime' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                    'controls' => array(
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
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'intime' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-text-editor' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__( 'Text Color', 'intime' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ct-text-editor' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'text_color_gradient',
                            'label' => esc_html__( 'Text Color Gradient', 'intime' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                        ),
                        array(
                            'name' => 'gradient_direction',
                            'label' => esc_html__('Gradient Direction', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'vertical' => 'Vertical',
                                'horizontal' => 'Horizontal',
                            ],
                            'default' => 'vertical',
                        ),
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__( 'Link Color', 'intime' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ct-text-editor a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .ct-text-editor a.link-underline' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_color_hover',
                            'label' => esc_html__( 'Link Color Hover', 'intime' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .ct-text-editor a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'type' => Group_Control_Typography::get_type(),
                            'label' => esc_html__( 'Text Typography', 'intime' ),
                            'control_type' => 'group',
                        ),
                        array(
                            'name' => 'link_typography',
                            'type' => Group_Control_Typography::get_type(),
                            'label' => esc_html__( 'Link Typography', 'intime' ),
                            'selector' => '{{WRAPPER}} .ct-text-editor a',
                            'control_type' => 'group',
                        ),
                        array(
                            'name' => 'dropcap',
                            'label' => esc_html__('Dropcap', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no' => 'No',
                                'yes' => 'Yes',
                            ],
                            'default' => 'no',
                        ),
                        array(
                            'name' => 'dropcap_style',
                            'label' => esc_html__('Dropcap Style', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'dropcap' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'dropcap_color',
                            'label' => esc_html__( 'Dropcap Text Color', 'intime' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'condition' => [
                                'dropcap' => 'yes',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-text-editor .first-letter' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'dropcap_color_bg',
                            'label' => esc_html__( 'Dropcap Background Color', 'intime' ),
                            'type' => Controls_Manager::COLOR,
                            'default' => '',
                            'condition' => [
                                'dropcap' => 'yes',
                                'dropcap_style' => ['style2', 'style3'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-text-editor .first-letter' => 'background-color: {{VALUE}};',
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