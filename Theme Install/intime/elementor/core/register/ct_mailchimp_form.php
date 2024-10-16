<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_mailchimp_form',
        'title' => esc_html__('Mailchimp Sign-Up Form', 'intime'),
        'icon' => 'eicon-email-field',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Color Settings', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'intime' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                                'style4' => 'Style 4',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'style' => ['style3'],
                            ],
                        ),
                        array(
                            'name' => 'sub_title_typography',
                            'label' => esc_html__('Sub Title Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-mailchimp1.style3 .ct-mailchimp-meta h6',
                            'condition' => [
                                'style' => ['style3'],
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'style' => ['style2','style3'],
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'intime' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-mailchimp1.style3 .ct-mailchimp-meta h3',
                            'condition' => [
                                'style' => ['style3'],
                            ],
                        ),
                        array(
                            'name' => 'description',
                            'label' => esc_html__('Description', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'style' => 'style2',
                            ],
                        ),
                        array(
                            'name' => 'box_image',
                            'label' => esc_html__( 'Box Image', 'intime' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'style' => ['style2', 'style3'],
                            ],
                        ),
                        array(
                            'name' => 'box_bg_color',
                            'label' => esc_html__('Box Background Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp1.style3' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style3'],
                            ],
                        ),
                        array(
                            'name' => 'input_color',
                            'label' => esc_html__('Input Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp.ct-mailchimp1 .mc4wp-form .mc4wp-form-fields input' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'input_bg_color',
                            'label' => esc_html__('Input Background Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp.ct-mailchimp1 .mc4wp-form .mc4wp-form-fields input' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'input_border_color',
                            'label' => esc_html__('Input Focus Border Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp1.style1 .mc4wp-form .mc4wp-form-fields input[type="email"], {{WRAPPER}} .ct-mailchimp1.style1 .mc4wp-form .mc4wp-form-fields input[type="text"]' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'input_focus_border_color',
                            'label' => esc_html__('Input Focus Border Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp1.style1 .mc4wp-form .mc4wp-form-fields input[type="email"]:focus, {{WRAPPER}} .ct-mailchimp1.style1 .mc4wp-form .mc4wp-form-fields input[type="text"]:focus' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_icon_color',
                            'label' => esc_html__('Button Icon Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp1.style1 .mc4wp-form .mc4wp-form-fields::after' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'button_bg_color',
                            'label' => esc_html__('Button Background Color', 'intime' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp.ct-mailchimp1 .mc4wp-form .mc4wp-form-fields:before' => 'background: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);