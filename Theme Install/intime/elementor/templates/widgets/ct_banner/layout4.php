<?php
$default_settings = [
    'banner_image' => '',
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
	<div class="ct-banner4 <?php echo esc_attr($ct_animate); ?>">
		<div class="ct-banner-inner">
			<?php echo wp_kses_post($thumbnail); ?>
		</div>
	</div>
<?php endif; ?>