<?php
$default_settings = [
    'bg_image' => '',
    'item_list' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
?>
<?php if(isset($item_list) && !empty($item_list) && count($item_list)): ?>
	<div class="ct-point">
		<?php if(!empty($bg_image['id'])) {
	        $img = ct_get_image_by_size( array(
	            'attach_id'  => $bg_image['id'],
	            'thumb_size' => 'full',
	        ));
	        $thumbnail = $img['thumbnail']; ?>
	        <div class="ct-point-image">
	        	<?php echo wp_kses_post($thumbnail); ?>
	        	<?php foreach ($item_list as $key => $value): ?>
				    <div id="<?php echo esc_attr($html_id.$key); ?>" class="ct-point-item">
				        <?php if($value['point_type'] == 'default') : ?>
				        	<?php if(!empty($value['item_id'])) { ?><div class="id-<?php echo esc_attr($value['item_id']); ?>"><?php } ?>
				    			<div class="ct-point-default <?php echo esc_attr($ct_animate); ?>"><span></span></div>
				    		<?php if(!empty($value['item_id'])) { ?></div><?php } ?>
				    	<?php endif; ?>

				    	<?php if($value['point_type'] == 'icon' && !empty($value['icon']['id'])) : 
				    		$icon  = ct_get_image_by_size( array(
				                'attach_id'  => $value['icon']['id'],
				                'thumb_size' => 'full',
				            ) );
				            $point_icon    = $icon['thumbnail'];
				    		?>
				    		<?php if(!empty($value['item_id'])) { ?><div class="id-<?php echo esc_attr($value['item_id']); ?>"><?php } ?>
						    	<div class="ct-point-icon <?php echo esc_attr($ct_animate); ?>">
						    		<?php echo wp_kses_post($point_icon); ?>
						    	</div>
						    <?php if(!empty($value['item_id'])) { ?></div><?php } ?>
					    <?php endif; ?>

					    <?php if($value['point_type'] == 'highlight') : ?>
					    	<?php if(!empty($value['item_id'])) { ?><div class="id-<?php echo esc_attr($value['item_id']); ?>"><?php } ?>
						    	<div class="ct-point-meta">
						    		<div class="ct-point-meta-inner">
							    		<?php if(!empty($value['number'])) : ?>
							    			<div class="ct-point-number">
							    				<span class="ct-counter-number-value" data-duration="2000" data-to-value="<?php echo ct_print_html($value['number']); ?>" data-delimiter=",">0</span>
							    				<span><?php echo ct_print_html($value['number_suffix']); ?></span>
							    				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20"><g><path d="M0,15l16,5L3,0Z"/></g></svg>
							    			</div>
							    		<?php endif; ?>
							    		<?php if(!empty($value['title'])) : ?>
							    			<div class="ct-point-title"><?php echo ct_print_html($value['title']); ?></div>
							    		<?php endif; ?>
							    	</div>
						    	</div>
						    <?php if(!empty($value['item_id'])) { ?></div><?php } ?>
				    	<?php endif; ?>
				    	<div class="ct-inline-css"  data-css="
				            .ct-point #<?php echo esc_attr($html_id.$key) ?> {
				                left: <?php echo esc_attr($value['left_positioon']['size']); ?>%;
				                top: <?php echo esc_attr($value['top_positioon']['size']); ?>%;
				            }">
				        </div>
				    </div>
				<?php endforeach; ?>
	        </div>
	    <?php } ?>
	</div>
<?php endif; ?>
