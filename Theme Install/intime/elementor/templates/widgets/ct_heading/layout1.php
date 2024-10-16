<?php
$default_settings = [
    'title' => '',
    'title_tag' => 'h3',
    'style' => 'st-default',
    'sub_title' => '',
    'sub_title_style' => '',
    'text_align' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
    'ct_icon' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings); 
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$primary_color = intime_get_opt( 'primary_color' );
$secondary_color = intime_get_opt( 'secondary_color' );
?>
<div class="ct-heading h-align-<?php echo esc_attr($text_align); ?> item-<?php echo esc_attr($style); ?>">
	<?php if(!empty($sub_title)) : ?>
		<div class="item--sub-title <?php echo esc_attr($sub_title_style); ?>">
            <span>
                <?php echo esc_attr($sub_title); ?>
            </span>
        </div>
	<?php endif; ?>
    <<?php echo esc_attr($title_tag); ?> class="item--title case-animate-time <?php echo esc_attr($style); ?> <?php if($ct_animate != 'case-fade-in-up') { echo esc_attr($ct_animate); } ?>" data-wow-delay="<?php echo esc_attr($ct_animate_delay); ?>ms">
        <?php if($ct_animate == 'case-fade-in-up') {
            $arr_str = explode(' ', $title);
            foreach ($arr_str as $index => $value) {
                $arr_str[$index] = '<span class="slide-in-container"><span class="d-inline-block wow '.$ct_animate.'">' . $value . '</span></span>';
            }
            $str = implode(' ', $arr_str);
            echo ct_print_html($str);
        } else {
            echo '<span>';
            echo wp_kses_post($title);
            echo '</span>';
        } ?>
    </<?php echo esc_attr($title_tag); ?>>
</div>

