<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_download',
        'title' => esc_html__('Download', 'intime'),
        'icon' => 'eicon-file-download',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'intime'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'download',
                            'label' => esc_html__('Download List', 'intime'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'intime'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'ct_icon',
                                    'label' => esc_html__('Icon', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'intime' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'wg_title',
                            'label' => esc_html__('Widget Title', 'intime'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'box_bg_image',
                            'label' => esc_html__('Box Background Image', 'intime' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);