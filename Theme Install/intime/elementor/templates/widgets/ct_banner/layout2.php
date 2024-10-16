<?php
$default_settings = [
    'banner_image' => '',
    'banner_title' => '',
    'banner_number' => '',
    'banner_label' => '',
    'banner_description' => '',
    'icon_type' => '',
    'selected_icon' => '',
    'icon_image' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if(!empty($banner_image['id'])) : 

	$size = 'full';

	$img = ct_get_image_by_size( array(
		'attach_id'  => $banner_image['id'],
		'thumb_size' => $size,
		'class' => 'ct-banner-image1'
	));
	$thumbnail = $img['thumbnail'];
	?>
	<div class="ct-banner2 <?php echo esc_attr($ct_animate); ?>">
		<div class="ct-banner-inner">
			<?php echo wp_kses_post($thumbnail); ?>
			<div class="ct-banner-number">
				<span class="ct-counter-number-value" data-duration="2000" data-to-value="<?php echo esc_attr($banner_number); ?>" data-delimiter=".">0</span>
				<?php if(!empty($banner_label)) : ?>
					<span class="ct-number-label"><?php echo esc_attr($banner_label); ?></span>
				<?php endif; ?>
				<span class="banner-dots">
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
					<i></i>
				</span>
			</div>
			<div class="ct-banner-holder">
				<div class="ct-banner-holder-inner">
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
			                    ) );
			                    $thumbnail_icon    = $img_icon['thumbnail'];
			                echo ct_print_html($thumbnail_icon); ?>
			            </div>
			        <?php endif; ?>
					<div class="ct-banner-meta">
						<h4 class="ct-banner-title"><?php echo esc_attr($banner_title); ?></h4>
						<div class="ct-banner-desc"><?php echo ct_print_html($banner_description); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>