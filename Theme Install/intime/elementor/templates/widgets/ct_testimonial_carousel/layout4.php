<?php
$widget->add_render_attribute( 'inner', [
    'class' => 'ct-carousel-inner',
] );

if (is_rtl()) {
    $carousel_dir = 'true';
} else {
    $carousel_dir = 'false';
}
$autoplay = $widget->get_setting('autoplay_l4', '');
$widget->add_render_attribute( 'carousel', [
    'class' => 'ct-slick-carousel',
    'data-colxs' => 1,
    'data-colsm' => 1,
    'data-colmd' => 1,
    'data-collg' => 1,
    'data-colxl' => 1,
    'data-dir' => $carousel_dir,
    'data-slidesToScroll' => 1,
    'data-centerMode' => 'true',
    'data-infinite' => 'true',
    'data-autoplay' => $autoplay,
] );
$gradient_color = intime_get_opt( 'gradient_color' );
if ( !empty($gradient_color['from']) && isset($gradient_color['from']) )
{
    $gradient_color_from = $gradient_color['from'];
} else {
   $gradient_color_from = '#ffa200';
}
if ( !empty($gradient_color['to']) && isset($gradient_color['to']) )
{
    $gradient_color_to = $gradient_color['to'];
} else {
    $gradient_color_to = '#fb5850';
}
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="ct-testimonial ct-testimonial-carousel4 ct-slick-slider">
        <div class="ct-testimonial-inner">
            <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <?php foreach ($settings['testimonial'] as $value): 
                    $description = isset($value['description']) ? $value['description'] : '';
                    ?>
                        <div class="slick-slide">
                            <div class="item--inner <?php echo esc_attr($settings['ct_animate']); ?>">
                                <div class="item--description">
                                    <svg fill="url(#ct-svg-gradient)" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 508.044 508.044" style="enable-background:new 0 0 508.044 508.044;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M0.108,352.536c0,66.794,54.144,120.938,120.937,120.938c66.794,0,120.938-54.144,120.938-120.938
                                                    s-54.144-120.937-120.938-120.937c-13.727,0-26.867,2.393-39.168,6.61C109.093,82.118,230.814-18.543,117.979,64.303
                                                    C-7.138,156.17-0.026,348.84,0.114,352.371C0.114,352.426,0.108,352.475,0.108,352.536z"/>
                                                <path d="M266.169,352.536c0,66.794,54.144,120.938,120.938,120.938s120.938-54.144,120.938-120.938S453.9,231.599,387.106,231.599
                                                    c-13.728,0-26.867,2.393-39.168,6.61C375.154,82.118,496.875-18.543,384.04,64.303C258.923,156.17,266.034,348.84,266.175,352.371
                                                    C266.175,352.426,266.169,352.475,266.169,352.536z"/>
                                            </g>
                                        </g>
                                        <defs>
                                            <linearGradient id="ct-svg-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                              <stop offset="0%" style="stop-color:<?php echo esc_attr($gradient_color_to); ?>;stop-opacity:1" />
                                              <stop offset="100%" style="stop-color:<?php echo esc_attr($gradient_color_from); ?>;stop-opacity:1" />
                                            </linearGradient>
                                          </defs>
                                    </svg>
                                    <?php echo ct_print_html($description); ?>
                                </div>
                           </div>
                        </div>
                <?php endforeach; ?>
            </div>
            <div class="ct-slick-divider"><span></span></div>
            <div class="ct-slick-nav slider-dot-line slider-dot-boxed" data-dir="<?php echo esc_attr($carousel_dir); ?>" data-nav="<?php echo esc_attr($settings['nav']); ?>">
                <?php foreach ($settings['testimonial'] as $value_nav): 
                    $title = isset($value_nav['title']) ? $value_nav['title'] : '';
                    $position = isset($value_nav['position']) ? $value_nav['position'] : '';
                    $image = isset($value_nav['image']) ? $value_nav['image'] : '';
                    ?>
                        <div class="slick-slide">
                            <div class="item--inner <?php echo esc_attr($settings['ct_animate']); ?>">
                                <div class="item--holder">
                                    <?php if(!empty($image['id'])) { 
                                        $img = ct_get_image_by_size( array(
                                            'attach_id'  => $image['id'],
                                            'thumb_size' => '90x90',
                                        ));
                                        $thumbnail = $img['thumbnail']; 
                                        ?>
                                        <div class="item--image">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="item--meta">
                                        <h3 class="item--title">    
                                            <?php echo esc_attr($title); ?>
                                        </h3>
                                        <div class="item--position"><?php echo esc_attr($position); ?></div>
                                    </div>
                                </div>
                           </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>