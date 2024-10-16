<?php
$default_settings = [
    'col_xl' => '4',
    'col_lg' => '4',
    'col_md' => '3',
    'col_sm' => '2',
    'col_xs' => '1',
    'content_list' => '',
    'thumbnail_custom_dimension' => '',
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
    <div class="ct-grid ct-process-grid ct-process-grid1">
        <div class="ct-grid-inner ct-grid-masonry row animate-time" data-gutter="7">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            <?php foreach ($content_list as $key => $value):
    			$title = isset($value['title']) ? $value['title'] : '';
                $desc = isset($value['desc']) ? $value['desc'] : '';
                $icon_type = isset($value['icon_type']) ? $value['icon_type'] : '';
                $selected_icon = isset($value['selected_icon']) ? $value['selected_icon'] : '';
                $icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
            	?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="item--inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                        <?php if ( $icon_type == 'icon' && $has_icon ) : ?>
                            <div class="item--icon">
                                <?php if($is_new):
                                    \Elementor\Icons_Manager::render_icon( $selected_icon, [ 'aria-hidden' => 'true' ] );
                                    else: ?>
                                    <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( $icon_type == 'image' && !empty($icon_image['id']) ) : ?>
                            <div class="item--icon">
                                <?php $img_icon  = ct_get_image_by_size( array(
                                        'attach_id'  => $icon_image['id'],
                                        'thumb_size' => 'full',
                                        'class' => 'no-lazyload',
                                    ) );
                                    $thumbnail_icon    = $img_icon['thumbnail'];
                                echo ct_print_html($thumbnail_icon); ?>
                            </div>
                        <?php endif; ?>
                        <h4 class="item--title">    
                            <?php echo ct_print_html($title); ?>
                        </h4>
                        <span class="flaticon-right-arrow"></span>
                   </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
