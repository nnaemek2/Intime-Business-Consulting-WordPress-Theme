<?php
$default_settings = [
    'sub_title' => '',
    'title' => '',
    'description' => '',
    'box_image' => '',
    'style' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

if(class_exists('MC4WP_Container')) : ?>
	<?php
		switch ($style) {
			case 'style4': ?>
				<div class="ct-mailchimp ct-mailchimp1 style4">
					<?php echo do_shortcode('[mc4wp_form]'); ?>
				</div>
				<?php break;

			case 'style3': ?>
				<div class="ct-mailchimp ct-mailchimp1 bg-image style3" <?php if(!empty($box_image['id'])) : ?>style="background-image: url(<?php echo esc_url($box_image['url']); ?>);"<?php endif; ?>>
			    	<?php if(!empty($title) || !empty($sub_title)) : ?>
				    	<div class="ct-mailchimp-meta">
				    		<?php if(!empty($sub_title)) : ?>
				    			<h6><?php echo esc_attr($sub_title); ?></h6>
				    		<?php endif; ?>
				    		<?php if(!empty($title)) : ?>
				    			<h3><?php echo esc_attr($title); ?></h3>
				    		<?php endif; ?>
				    	</div>
			    	<?php endif; ?>
				    <?php echo do_shortcode('[mc4wp_form]'); ?>
			    </div>
				<?php break;

			case 'style2': ?>
				<div class="ct-mailchimp ct-mailchimp1 bg-image style2" <?php if(!empty($box_image['id'])) : ?>style="background-image: url(<?php echo esc_url($box_image['url']); ?>);"<?php endif; ?>>
			    	<?php if(!empty($title) || !empty($description)) : ?>
				    	<div class="ct-mailchimp-meta">
				    		<?php if(!empty($title)) : ?>
				    			<h4><?php echo esc_attr($title); ?></h4>
				    		<?php endif; ?>
				    		<?php if(!empty($description)) : ?>
				    			<p><?php echo esc_attr($description); ?></p>
				    		<?php endif; ?>
				    	</div>
			    	<?php endif; ?>
				    <?php echo do_shortcode('[mc4wp_form]'); ?>
			    </div>
				<?php break;
			
			default: ?>
				<div class="ct-mailchimp ct-mailchimp1 style1">
					<?php echo do_shortcode('[mc4wp_form]'); ?>
				</div>
				<?php break;
		}
	?>
<?php endif; ?>
