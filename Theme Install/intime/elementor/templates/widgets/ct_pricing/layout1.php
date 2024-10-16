<?php
$default_settings = [
    'tab_title_monthly' => '',
    'tab_title_year' => '',
    'col_monthly' => '',
    'col_year' => '',
    'content_monthly' => '',
    'content_year' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="ct-pricing ct-pricing-layout1 <?php if(!empty($tab_title_monthly) || !empty($tab_title_year)) { echo 'ct-pricing-tab-active'; } ?>">
    <?php if(!empty($tab_title_monthly) || !empty($tab_title_year)) : ?>
        <div class="ct-pricing-tab-title">
            <?php if($tab_title_monthly) : ?>
                <div class="ct-pricing-tab-item title-tab-monthly active"><?php echo ct_print_html($tab_title_monthly); ?></div>
            <?php endif; ?>
            <?php if($tab_title_year) : ?>
                <div class="ct-pricing-tab-item title-tab-year"><?php echo ct_print_html($tab_title_year); ?></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="ct-pricing-tab-content">
        <?php if(!empty($content_monthly)) : ?>
            <div class="ct-pricing-body ct-pricing-monthly pricing-<?php echo esc_attr($col_monthly); ?>-column">
                <?php foreach ($content_monthly as $key => $value):
                $popular = isset($value['popular']) ? $value['popular'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
                $price1 = isset($value['price1']) ? $value['price1'] : '';
                $price2 = isset($value['price2']) ? $value['price2'] : '';
                $description = isset($value['description']) ? $value['description'] : '';
                $button_text = isset($value['button_text']) ? $value['button_text'] : '';
                $button_link = isset($value['button_link']) ? $value['button_link'] : '';
                $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                if ( ! empty( $button_link['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $button_link['url'] );

                    if ( $button_link['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $button_link['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key ); 
                
                $icon_type = isset($value['icon_type']) ? $value['icon_type'] : 'icon';
                $selected_icon = isset($value['selected_icon']) ? $value['selected_icon'] : '';
                $icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
                $featured = isset($value['featured']) ? $value['featured'] : '';
                ?>
                <div class="ct-pricing-item <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                    <div class="ct-pricing-item-inner <?php if($featured == 'yes') { echo 'ct-pricing-featured'; } ?>">
                        <div class="item-popular"><?php echo esc_attr($popular); ?></div>
                        <h3 class="ct-pricing-title"><?php echo ct_print_html($title); ?></h3>
                        <div class="ct-pricing-subtitle"><?php echo esc_attr($sub_title ); ?></div>
                        <div class="ct-pricing-price1"><?php echo ct_print_html($price1); ?></div>
                        
                        <?php if ( $icon_type == 'icon' && !empty($selected_icon) ) : ?>
                            <div class="ct-pricing-icon">
                                <?php if($is_new):
                                    \Elementor\Icons_Manager::render_icon( $selected_icon, [ 'aria-hidden' => 'true' ] );
                                    else: ?>
                                    <i class="<?php echo esc_attr($selected_icon); ?>"></i>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( $icon_type == 'image' && !empty($icon_image) ) : ?>
                            <div class="ct-pricing-icon">
                                <?php $img_icon  = ct_get_image_by_size( array(
                                        'attach_id'  => $icon_image['id'],
                                        'thumb_size' => 'full',
                                    ) );
                                    $thumbnail_icon    = $img_icon['thumbnail'];
                                echo wp_kses_post($thumbnail_icon); ?>
                            </div>
                        <?php endif; ?>

                        <div class="ct-pricing-desc"><?php echo ct_print_html($description); ?></div>
                        <div class="ct-pricing-price2"><?php echo ct_print_html($price2); ?></div>

                        <?php if(!empty($button_text)) : ?>
                            <div class="ct-pricing-button">
                                <a class="btn btn-default" <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo esc_attr($button_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($content_year)) : ?>
            <div class="ct-pricing-body ct-pricing-year <?php if(!empty($tab_title_monthly) || !empty($tab_title_year)) { echo 'ct-pricing-hide'; } ?> pricing-<?php echo esc_attr($col_year); ?>-column">
                <?php foreach ($content_year as $key => $value):
                $popular = isset($value['popular']) ? $value['popular'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
                $price1 = isset($value['price1']) ? $value['price1'] : '';
                $price2 = isset($value['price2']) ? $value['price2'] : '';
                $description = isset($value['description']) ? $value['description'] : '';
                $button_text = isset($value['button_text']) ? $value['button_text'] : '';
                $button_link = isset($value['button_link']) ? $value['button_link'] : '';
                $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                if ( ! empty( $button_link['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $button_link['url'] );

                    if ( $button_link['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $button_link['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key ); 
                
                $icon_type = isset($value['icon_type']) ? $value['icon_type'] : 'icon';
                $selected_icon = isset($value['selected_icon']) ? $value['selected_icon'] : '';
                $icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
                $featured = isset($value['featured']) ? $value['featured'] : '';
                ?>
                <div class="ct-pricing-item">
                    <div class="ct-pricing-item-inner <?php if($featured == 'yes') { echo 'ct-pricing-featured'; } ?>">
                        <div class="item-popular"><?php echo esc_attr($popular); ?></div>
                        <h3 class="ct-pricing-title"><?php echo ct_print_html($title); ?></h3>
                        <div class="ct-pricing-subtitle"><?php echo esc_attr($sub_title ); ?></div>
                        <div class="ct-pricing-price1"><?php echo ct_print_html($price1); ?></div>
                        
                        <?php if ( $icon_type == 'icon' && !empty($selected_icon) ) : ?>
                            <div class="ct-pricing-icon">
                                <?php if($is_new):
                                    \Elementor\Icons_Manager::render_icon( $selected_icon, [ 'aria-hidden' => 'true' ] );
                                    else: ?>
                                    <i class="<?php echo esc_attr($selected_icon); ?>"></i>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( $icon_type == 'image' && !empty($icon_image) ) : ?>
                            <div class="ct-pricing-icon">
                                <?php $img_icon  = ct_get_image_by_size( array(
                                        'attach_id'  => $icon_image['id'],
                                        'thumb_size' => 'full',
                                    ) );
                                    $thumbnail_icon    = $img_icon['thumbnail'];
                                echo wp_kses_post($thumbnail_icon); ?>
                            </div>
                        <?php endif; ?>

                        <div class="ct-pricing-desc"><?php echo ct_print_html($description); ?></div>
                        <div class="ct-pricing-price2"><?php echo ct_print_html($price2); ?></div>

                        <?php if(!empty($button_text)) : ?>
                            <div class="ct-pricing-button">
                                <a class="btn btn-default" <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo esc_attr($button_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>