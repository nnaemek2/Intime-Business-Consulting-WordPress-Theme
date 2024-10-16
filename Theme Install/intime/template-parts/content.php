<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Intime
 */
$archive_date_on = intime_get_opt( 'archive_date_on', true );
$archive_categories_on = intime_get_opt( 'archive_categories_on', false );
$archive_readmore_text = intime_get_opt( 'archive_readmore_text' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-hentry archive'); ?>>
    
    <?php if (has_post_thumbnail()) {
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
        echo '<div class="entry-featured">'; ?>
            <a href="<?php echo esc_url( get_permalink()); ?>"><?php the_post_thumbnail('intime-large'); ?></a>
            <?php if($archive_date_on) : 
                $year = get_the_date('Y', get_the_ID());
                $year = substr( $year, -2);
                ?>
                <div class="entry-date ct-date-box">
                    <div class="entry-date-inner">
                        <span><?php echo get_the_date('d', get_the_ID()); ?></span>
                        <span><?php echo get_the_date('M', get_the_ID()); ?>, <?php echo esc_attr($year); ?></span>
                    </div>
                </div>
            <?php endif; ?>
        <?php echo '</div>';
    } ?>
    <div class="entry-body">
        <?php intime_archive_meta(); ?>
        <h2 class="entry-title">
            <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title(); ?>">
                <?php if(is_sticky()) { ?>
                    <i class="fa fa-thumb-tack"></i>
                <?php } ?>
                <?php the_title(); ?>
            </a>
        </h2>
        <div class="entry-excerpt">
            <?php
                intime_entry_excerpt();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </div>
        <div class="entry-holder">
            <div class="entry-readmore">
                <a class="btn btn-animate" href="<?php echo esc_url( get_permalink()); ?>">
                    <span><?php if(!empty($archive_readmore_text)) { echo esc_attr($archive_readmore_text); } else { echo esc_html__('Read more', 'intime'); } ?></span>
                    <i class="flaticon flaticon-next"></i>
                </a>
            </div>
        </div>
    </div>
</article><!-- #post -->