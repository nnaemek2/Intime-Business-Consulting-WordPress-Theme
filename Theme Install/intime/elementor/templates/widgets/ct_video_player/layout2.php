<?php 
$default_settings = [
    'image' => '',
    'image_2' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

if ( ! empty( $button_link['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $button_link['url'] );

    if ( $button_link['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $button_link['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="ct-video-player2">
    <?php if( ! empty( $image['url'] ) ) : 
        $img  = ct_get_image_by_size( array(
            'attach_id'  => $image['id'],
            'thumb_size' => '370x455',
        ) );
        $thumbnail    = $img['thumbnail'];
        ?>
        <div class="ct-video-image1 <?php echo esc_attr($settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
            <?php echo wp_kses_post($thumbnail); ?>
        </div>
    <?php endif; ?>


    <?php if( ! empty( $image_2['url'] ) ) : 
        $img_2  = ct_get_image_by_size( array(
            'attach_id'  => $image_2['id'],
            'thumb_size' => '350x270',
        ) );
        $thumbnail_2    = $img_2['thumbnail'];
        ?>
        <div class="ct-video-image2 <?php echo esc_attr($settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
            <?php echo wp_kses_post($thumbnail_2); ?>
        </div>
    <?php endif; ?>
    <?php if(!empty($settings['video_link'])) : ?>
        <a class="ct-video-button <?php echo esc_attr($settings['ct_animate']); ?>" href="<?php echo esc_url($settings['video_link']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
            <i class="flaticon-play-button"></i>
        </a>
    <?php endif; ?>
</div>