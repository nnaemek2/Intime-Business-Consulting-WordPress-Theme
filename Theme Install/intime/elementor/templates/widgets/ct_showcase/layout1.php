<?php
$default_settings = [
    'col_xl' => '4',
    'col_lg' => '4',
    'col_md' => '3',
    'col_sm' => '2',
    'col_xs' => '1',
    'content_list' => '',
    'thumbnail_size' => '',
    'thumbnail_custom_dimension' => '',
    'ct_animate' => '',
    'filter' => 'false',
    'style' => 'style1',
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
if($thumbnail_size != 'custom'){
    $img_size = $thumbnail_size;
}
elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
    $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
}
else{
    $img_size = 'full';
}
?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
    <div class="ct-grid ct-showcase1">
        <?php if($filter == 'true') : ?>
            <div class="grid-filter-wrap">
                <span class="filter-item active" data-filter="*">All</span>
                
                <?php $cat_list = array();
                foreach ( $content_list as $item ) {
                    $g_category = isset($item['category']) ? $item['category'] : '';
                    $c_a = explode(',', $g_category);
                    foreach ( $c_a as $c){
                        $r_c = str_replace(' ', '-', strtolower(trim($c)));
                        $cat_list[$r_c] = $c;
                    }
                } ?>
                <?php foreach ($cat_list as $key => $value):
                    $key_result = preg_replace('#[&]*#', '', $key); ?>
                        <?php if(!empty($value)) : ?>
                            <span class="filter-item" data-filter="<?php echo esc_attr('.' . $key_result); ?>">
                                <?php echo esc_attr($value); ?>
                            </span>
                        <?php endif; ?>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>
        <div class="ct-grid-inner ct-grid-masonry row animate-time" data-gutter="8">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            <?php foreach ($content_list as $key => $value):
            	$link_key1 = $widget->get_repeater_setting_key( 'link_key1', 'value', $key );
            	if ( ! empty( $value['button_link1']['url'] ) ) {
    			    $widget->add_render_attribute( $link_key1, 'href', $value['button_link1']['url'] );

    			    if ( $value['button_link1']['is_external'] ) {
    			        $widget->add_render_attribute( $link_key1, 'target', '_blank' );
    			    }

    			    if ( $value['button_link1']['nofollow'] ) {
    			        $widget->add_render_attribute( $link_key1, 'rel', 'nofollow' );
    			    }
    			}
    			$link_attributes1 = $widget->get_render_attribute_string( $link_key1 );

                $link_key2 = $widget->get_repeater_setting_key( 'link_key2', 'value', $key );
                if ( ! empty( $value['button_link2']['url'] ) ) {
                    $widget->add_render_attribute( $link_key2, 'href', $value['button_link2']['url'] );

                    if ( $value['button_link2']['is_external'] ) {
                        $widget->add_render_attribute( $link_key2, 'target', '_blank' );
                    }

                    if ( $value['button_link2']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key2, 'rel', 'nofollow' );
                    }
                }
                $link_attributes2 = $widget->get_render_attribute_string( $link_key2 );

    			$coming = isset($value['coming']) ? $value['coming'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $label = isset($value['label']) ? $value['label'] : '';
                $btn_text1 = isset($value['btn_text1']) ? $value['btn_text1'] : '';
                $btn_text2 = isset($value['btn_text2']) ? $value['btn_text2'] : '';
                $category = isset($value['category']) ? $value['category'] : '';
    			$image = isset($value['image']) ? $value['image'] : '';
    			$img = ct_get_image_by_size( array(
                    'attach_id'  => $image['id'],
                    'thumb_size' => $img_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];

                $c_l = explode(',',$category);
                $filter_class_a = array();
                foreach ( $c_l as $c_c ) {
                    $filter_class_a[] = str_replace(' ','-',trim(strtolower($c_c)));
                }
                $filter_class = implode(' ',$filter_class_a);
                $filter_class_result = preg_replace('#[&]*#', '', $filter_class);
            	?>
                <div class="<?php echo esc_attr($item_class.' '.$filter_class_result); ?>">
                    <div class="item--inner <?php echo esc_attr($ct_animate); ?>">
                        <?php if(!empty($image['id'])) : ?>
                            <div class="ct-showcase-image <?php if($coming == 'yes') { echo 'is-coming'; } ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                                <div class="ct-showcase-overlay"></div>
                                <?php if($coming == 'yes') { ?>
                                    <div class="ct-showcase-coming"><?php echo esc_html__('Coming soon...', 'intime'); ?></div>
                                <?php } else { ?>
                                    <div class="ct-showcase-button">
                                        <?php if(!empty($btn_text1)) : ?>
                                            <a <?php echo implode( ' ', [ $link_attributes1 ] ); ?> class="ct-showcase-link"><?php echo esc_attr($btn_text1); ?></a>
                                        <?php endif; ?>
                                        <?php if(!empty($btn_text2)) : ?>
                                            <a <?php echo implode( ' ', [ $link_attributes2 ] ); ?> class="ct-showcase-link active"><?php echo esc_attr($btn_text2); ?></a>
                                        <?php endif; ?>
                                    </div>
                                <?php } ?>
                                <?php if(!empty($label)) : ?>
                                    <label><?php echo esc_attr($label); ?></label>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($title)) : ?>
                            <div class="ct-showcase-title">
                                <?php echo wp_kses_post($title); ?>
                            </div>
                        <?php endif; ?>
                   </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
