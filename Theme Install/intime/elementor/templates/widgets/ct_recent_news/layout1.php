<?php

$html_id = ct_get_element_id($settings);
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
extract(ct_get_posts_of_grid('post', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$show_date = $widget->get_setting('show_date');

$thumbnail_size = $widget->get_setting('thumbnail_size', 'full');
$thumbnail_custom_dimension = $widget->get_setting('thumbnail_custom_dimension', '');
if($thumbnail_size != 'custom'){
    $img_size = $thumbnail_size;
}
elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
    $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
}
else{
    $img_size = '80x75';
}

?>
<?php if (is_array($posts)): ?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-recent-news ct-recent-news1">
    <?php
        foreach ($posts as $post):
        $img_id       = get_post_thumbnail_id( $post->ID );
        $img          = ct_get_image_by_size( array(
            'attach_id'  => $img_id,
            'thumb_size' => $img_size,
        ) );
        $thumbnail    = $img['thumbnail']; ?>
        <div class="ct-recent-new-item">
            <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                <div class="item--image">
                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                </div>
            <?php endif; ?>
            <div class="item--meta">
                <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                <?php if($show_date == 'true'): ?>
                    <div class="item--date"><i class="fac fac-calendar-alt"></i><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>