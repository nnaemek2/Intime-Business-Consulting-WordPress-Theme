<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_portfolio_details',
        'title' => esc_html__('Portdolio Details', 'intime'),
        'icon' => 'eicon-library-upload',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'wg_title',
                            'label' => esc_html__('Widget Title', 'intime' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'portfolio_content',
                            'label' => esc_html__('Content', 'intime'),
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
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                            'title_field' => '{{{ label }}}',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);