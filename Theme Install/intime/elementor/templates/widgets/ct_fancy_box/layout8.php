<?php
$widget->add_render_attribute( 'selected_icon', 'class' );
$has_icon = ! empty( $settings['selected_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['selected_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
$widget->add_inline_editing_attributes( 'title_text', 'none' );
$widget->add_inline_editing_attributes( 'description_text' );
$widget->add_render_attribute( 'description_text', 'class', 'item--description' );
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$img_size = '370x192';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
}
if ( ! empty( $settings['item_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['item_link']['url'] );

    if ( $settings['item_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['item_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="ct-fancy-box ct-fancy-box-layout8 <?php echo esc_attr($settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <?php if(!empty($settings['item_image']['id'])) : 
        $img  = ct_get_image_by_size( array(
            'attach_id'  => $settings['item_image']['id'],
            'thumb_size' => $img_size,
        ) );
        $thumbnail    = $img['thumbnail']; ?>
        <div class="item--image">
            <?php if ( ! empty( $settings['item_link']['url'] ) ) { ?><a <?php ct_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php } ?>
                <?php echo wp_kses_post($thumbnail); ?>
            <?php if ( ! empty( $settings['item_link']['url'] ) ) { ?></a><?php } ?>
            <?php if ( $settings['icon_type'] == 'icon' && $has_icon ) : ?>
                <div class="item--icon icon-psb">
                    <?php if($is_new):
                        \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
                        else: ?>
                        <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
                <div class="item--icon icon-psb">
                    <?php $img_icon  = ct_get_image_by_size( array(
                            'attach_id'  => $settings['icon_image']['id'],
                            'thumb_size' => 'full',
                        ) );
                        $thumbnail_icon    = $img_icon['thumbnail'];
                    echo ct_print_html($thumbnail_icon); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="item--holder">
        <h3 class="item--title">
            <?php echo ct_print_html($settings['title_text']); ?>
        </h3>
        <div <?php ct_print_html($widget->get_render_attribute_string( 'description_text' )); ?>><?php echo ct_print_html($settings['description_text']); ?></div>
    </div>
</div>