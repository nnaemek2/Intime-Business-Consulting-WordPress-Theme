<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Intime
 */
$page_404 = intime_get_opt( 'page_404', 'default' );
$page_custom_404 = intime_get_opt( 'page_custom_404' );
get_header(); ?>
    
    <div class="container content-container">
        <div class="row content-row">
            <div id="primary" class="content-area col-12">
                <main id="main" class="site-main">
                    <?php if($page_404 == 'default') { ?>
                        <section class="error-404">
                            <div class="error-404-content">
                                <div class="error-404-image"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/image-404.jpg'); ?>" alt="<?php echo esc_attr__('404 Error', 'intime'); ?>" /></div>
                                <h3 class="error-404-title">
                                    <?php echo esc_html__('Sorry... Page Not Found!', 'intime'); ?>
                                </h3>
                                <a class="btn btn-animate" href="<?php echo esc_url(home_url('/')); ?>">
                                    <i class="fac fac-home"></i>
                                    <?php echo esc_html__('Go back home', 'intime'); ?>
                                </a>
                            </div>
                        </section>
                    <?php } else { ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content clearfix">
                                <?php $post = get_post($page_custom_404);
                                if (!is_wp_error($post) && $post->ID == $page_custom_404 && class_exists('Case_Theme_Core') && function_exists('ct_print_html')){
                                    $content = \Elementor\Plugin::$instance->frontend->get_builder_content( $page_custom_404 );
                                    ct_print_html($content);
                                } ?>
                            </div>
                        </article>
                    <?php } ?>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>

<?php
get_footer();
