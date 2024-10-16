<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_pagination_single',
        'title' => esc_html__('Pagination Single', 'intime'),
        'icon' => 'eicon-apps',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'archive_link',
                            'label' => esc_html__('Archive Link', 'intime'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);