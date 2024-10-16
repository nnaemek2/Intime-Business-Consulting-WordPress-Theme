<?php
$default_settings = [
    'banner_image' => '',
    'banner_title' => '',
    'banner_number' => '',
    'banner_number_suffix' => '',
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
	<div class="ct-banner1">
		<div class="ct-banner-inner">
			<?php echo wp_kses_post($thumbnail); ?>
			<div class="ct-banner-meta">
				<div class="ct-banner-meta-inner <?php echo esc_attr($ct_animate); ?>">
					<div class="ct-banner-number">
						<span class="ct-counter-number-value" data-duration="2000" data-to-value="<?php echo esc_attr($banner_number); ?>" data-delimiter=".">0</span>
						<?php if(!empty($banner_number_suffix)) : ?>
							<span><?php echo esc_attr($banner_number_suffix); ?></span>
						<?php endif; ?>
					</div>
					<div class="ct-banner-title"><?php echo esc_attr($banner_title); ?></div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>