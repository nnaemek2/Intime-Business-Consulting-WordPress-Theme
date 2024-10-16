<?php
$default_settings = [
    'banner_image' => '',
    'banner_sub_title' => '',
    'banner_title' => '',
    'banner_description' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
if(!empty($banner_image['id'])) : 

	$size = 'full';

	$img = ct_get_image_by_size( array(
		'attach_id'  => $banner_image['id'],
		'thumb_size' => $size,
		'class' => 'ct-banner-image1'
	));
	$thumbnail = $img['thumbnail'];
	?>
	<div class="ct-banner3 <?php echo esc_attr($ct_animate); ?>">
		<div class="ct-banner-inner">
			<?php echo wp_kses_post($thumbnail); ?>
			<div class="ct-banner-holder">
				<div class="ct-banner-meta">
					<div class="ct-banner-sub-title"><?php echo esc_attr($banner_sub_title); ?></div>
					<h4 class="ct-banner-title"><?php echo esc_attr($banner_title); ?></h4>
					<div class="ct-banner-desc"><?php echo ct_print_html($banner_description); ?></div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>