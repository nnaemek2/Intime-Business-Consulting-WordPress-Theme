<?php
$widget->add_render_attribute( 'counter', [
    'class' => 'ct-counter-number-value',
    'data-duration' => $settings['duration'],
    'data-to-value' => $settings['ending_number'],
] );

if ( ! empty( $settings['thousand_separator'] ) ) {
    $delimiter = empty( $settings['thousand_separator_char'] ) ? ',' : $settings['thousand_separator_char'];
    $widget->add_render_attribute( 'counter', 'data-delimiter', $delimiter );
}

$widget->add_render_attribute( 'selected_icon', 'class' );
$has_icon = ! empty( $settings['selected_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['selected_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}

$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="ct-counter ct-counter-layout2 <?php echo esc_attr($settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="ct-counter-inner">
        <div class="ct-counter-number">
            <?php if(!empty($settings['prefix'])) : ?>
                <span class="ct-counter-number-prefix"><?php echo ct_print_html($settings['prefix']); ?></span>
            <?php endif; ?>
            <span <?php ct_print_html($widget->get_render_attribute_string( 'counter' )); ?>><?php echo esc_html($settings['starting_number']); ?></span>
            <?php if(!empty($settings['suffix'])) : ?>
                <span class="ct-counter-number-suffix"><?php echo ct_print_html($settings['suffix']); ?></span>
            <?php endif; ?>
        </div>
        <?php if ( $settings['title'] ) : ?>
            <div class="ct-counter-title"><?php echo ct_print_html($settings['title']); ?></div>
        <?php endif; ?>
        <?php if ( $settings['desc'] ) : ?>
            <div class="ct-counter-desc"><?php echo ct_print_html($settings['desc']); ?></div>
        <?php endif; ?>
    </div>
</div>