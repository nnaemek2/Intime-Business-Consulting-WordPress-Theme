<?php
$default_settings = [
    'title' => '',
    'description' => '',
    'item_id' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings); ?>

<?php if(!empty($title) || !empty($description)) : ?>
    <div class="ct-branche1 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
        <?php if(!empty($item_id)) { ?><div class="id-<?php echo esc_attr($item_id); ?>"><?php } ?>
            <?php if(!empty($title)) : ?>
                <div class="ct-branche-title"><span><?php echo esc_attr($title); ?></span></div>
            <?php endif; ?>
            <?php if(!empty($description)) : ?>
                <div class="ct-branche-desc"><?php echo ct_print_html($description); ?></div>
            <?php endif; ?>
        <?php if(!empty($item_id)) { ?></div><?php } ?>
    </div>
<?php endif; ?>