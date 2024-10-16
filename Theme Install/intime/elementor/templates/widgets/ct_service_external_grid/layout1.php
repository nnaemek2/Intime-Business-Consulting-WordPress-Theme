<?php
$default_settings = [
    'col_xl' => '4',
    'col_lg' => '4',
    'col_md' => '3',
    'col_sm' => '2',
    'col_xs' => '1',
    'content_list' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
    <div class="ct-grid ct-service-external-grid1">
        <div class="ct-grid-inner ct-grid-masonry row animate-time" data-gutter="7">
            <?php foreach ($content_list as $key => $value):
    			$title = isset($value['title']) ? $value['title'] : '';
                $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
                $description = isset($value['description']) ? $value['description'] : '';

                $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                if ( ! empty( $value['btn_link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $value['btn_link']['url'] );

                    if ( $value['btn_link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $value['btn_link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );

                $icon_type = isset($value['icon_type']) ? $value['icon_type'] : '';
                $selected_icon = isset($value['selected_icon']) ? $value['selected_icon'] : '';
                $icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
                $has_icon = ! empty( $selected_icon );
                if ( $has_icon ) {
                    $widget->add_render_attribute( 'i', 'class', $selected_icon );
                    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
                } ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="item--inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                        <div class="item--meta">
                            <?php if ( $icon_type == 'icon' && $has_icon ) : ?>
                                <div class="item--icon icon-psb">
                                    <?php if($is_new):
                                        \Elementor\Icons_Manager::render_icon( $selected_icon, [ 'aria-hidden' => 'true' ] );
                                        else: ?>
                                        <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $icon_type == 'image' && !empty($icon_image['id']) ) : ?>
                                <div class="item--icon icon-psb">
                                    <?php $img_icon  = ct_get_image_by_size( array(
                                            'attach_id'  => $icon_image['id'],
                                            'thumb_size' => 'full',
                                            'class' => 'no-lazyload',
                                        ) );
                                        $thumbnail_icon    = $img_icon['thumbnail'];
                                    echo ct_print_html($thumbnail_icon); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="item--title">    
                                <?php echo esc_attr($title); ?>
                            </h3>
                        </div>
                        <div class="item--description"><?php echo esc_html($description); ?></div>
                        <?php if(!empty($btn_text)) : ?>
                            <div class="item--readmore">
                                <a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo esc_attr($btn_text); ?></a>
                            </div>
                        <?php endif; ?>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
