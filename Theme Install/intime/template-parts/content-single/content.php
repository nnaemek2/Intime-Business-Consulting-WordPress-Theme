<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Intime
 */
$post_date_on = intime_get_opt( 'post_date_on', true );
$post_tags_on = intime_get_opt( 'post_tags_on', true );
$post_navigation_on = intime_get_opt( 'post_navigation_on', false );
$post_social_share_on = intime_get_opt( 'post_social_share_on', false );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-hentry'); ?>>
    <div class="entry-blog">
        <?php if (has_post_thumbnail()) {
            echo '<div class="entry-featured">'; ?>
                <?php the_post_thumbnail('intime-large'); ?>
                <?php if($post_date_on) : 
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

            <?php intime_post_meta(); ?>

            <div class="entry-content clearfix">
                <?php
                    the_content();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>

        </div>
    </div>
    <?php if($post_tags_on || $post_social_share_on ) :  ?>
        <div class="entry-footer">
            <?php if($post_tags_on) { intime_entry_tagged_in(); } ?>
            <?php if($post_social_share_on) { intime_socials_share_default(); } ?>
        </div>
    <?php endif; ?>

    <?php if($post_navigation_on) { intime_post_nav_default(); } ?>
</article><!-- #post -->