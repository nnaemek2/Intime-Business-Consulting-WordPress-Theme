<?php
/**
 * Custom template tags for this theme.
 *
 * @package Intime
 */

/**
 * Header layout
 **/
function intime_page_loading()
{
    $page_loading = intime_get_opt( 'show_page_loading', false );
    $loading_type = intime_get_opt( 'loading_type', 'style1');
    $logo_loader = intime_get_opt( 'logo_loader', array( 'url' => get_template_directory_uri().'/assets/images/logo-loader.gif', 'id' => '' ) );

    $loading_page = intime_get_page_opt( 'loading_page', 'themeoption');
    $loading_type_page = intime_get_page_opt( 'loading_type', 'style1');

    if($loading_page == 'custom') {
        $loading_type = $loading_type_page;
    }

    if($page_loading) { ?>
        <div id="ct-loadding" class="ct-loader <?php echo esc_attr($loading_type); ?>">
            <?php switch ( $loading_type )
            {
                case 'style-image': ?>
                    <?php if ($logo_loader['url']) { ?>
                        <div class="loading-image">
                            <?php 
                                printf(
                                    '<img src="%3$s" alt="%2$s"/>',
                                    esc_url( home_url( '/' ) ),
                                    esc_attr( get_bloginfo( 'name' ) ),
                                    esc_url( $logo_loader['url'] )
                                );
                            ?>
                        </div>
                    <?php } ?>
                <?php break;

                case 'style2': ?>
                    <div class="ct-spinner2"></div>
                    <?php break;

                case 'style3': ?>
                    <div class="ct-spinner3">
                      <div class="double-bounce1"></div>
                      <div class="double-bounce2"></div>
                    </div>
                    <?php break;

                case 'style4': ?>
                    <div class="ct-spinner4">
                      <div class="rect1"></div>
                      <div class="rect2"></div>
                      <div class="rect3"></div>
                      <div class="rect4"></div>
                      <div class="rect5"></div>
                    </div>
                    <?php break;

                case 'style5': ?>
                    <div class="ct-spinner5">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                    </div>
                    <?php break;

                case 'style6': ?>
                    <div class="ct-cube-grid">
                      <div class="ct-cube ct-cube1"></div>
                      <div class="ct-cube ct-cube2"></div>
                      <div class="ct-cube ct-cube3"></div>
                      <div class="ct-cube ct-cube4"></div>
                      <div class="ct-cube ct-cube5"></div>
                      <div class="ct-cube ct-cube6"></div>
                      <div class="ct-cube ct-cube7"></div>
                      <div class="ct-cube ct-cube8"></div>
                      <div class="ct-cube ct-cube9"></div>
                    </div>
                    <?php break;

                case 'style7': ?>
                    <div class="ct-folding-cube">
                      <div class="ct-cube1 ct-cube"></div>
                      <div class="ct-cube2 ct-cube"></div>
                      <div class="ct-cube4 ct-cube"></div>
                      <div class="ct-cube3 ct-cube"></div>
                    </div>
                    <?php break;

                case 'style8': ?>
                    <div class="ct-loading-stairs">
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-ball"></div>
                    </div>
                    <?php break;

                case 'style9': ?>
                    <div class="ct-dual-ring">
                    </div>
                    <?php break;

                case 'style10': ?>
                    <div class="ct-dot-square">
                    </div>
                    <?php break;

                case 'style11': ?>
                    <div class="loading-spinner">
                    </div>
                    <?php break;

                case 'style12': ?>
                    <div class="loading-ring">
                    </div>
                    <?php break;

                case 'style13': ?>
                    <div class="loading-infinity">
                        <div>
                            <span></span>
                        </div>
                        <div>
                            <span></span>
                        </div>
                        <div>
                            <span></span>
                        </div>
                    </div>
                    <?php break;

                default: ?>
                    <div class="loading-spin">
                        <div class="spinner">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                        <div class="spinner color-2">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                    </div>
                    <?php break;
            } ?>
        </div>
    <?php }
}

/**
 * Header layout
 **/
function intime_header_layout()
{
    $header_layout = intime_get_opt( 'header_layout', '1' );
    $custom_header = intime_get_page_opt( 'custom_header', '0' );

    if ( $custom_header == '1' )
    {
        $page_header_layout = intime_get_page_opt('header_layout');
        $header_layout = $page_header_layout;
        if($header_layout == '0') {
            return;
        }
    }

    get_template_part( 'template-parts/header-layout', $header_layout );
}

/**
 * Page title layout
 **/
function intime_page_title_layout()
{
    get_template_part( 'template-parts/page-title', '' );
}

/**
 * Footer
 **/
function intime_footer()
{
    if(is_singular('elementor_library')) return;
    $footer_layout_custom = intime_get_opt('footer_layout_custom');
    if( !class_exists('ReduxFramework') || empty($footer_layout_custom) ) {
        get_template_part( 'template-parts/footer-layout', 'default' );
    } else {
        get_template_part( 'template-parts/footer-layout', 'custom' );
    }
}

/**
 * Set primary content class based on sidebar position
 *
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function intime_primary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) || class_exists( 'WooCommerce' ) && (is_shop()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array( trim( $extra_class ) );
        switch ( $sidebar_pos )
        {
            case 'left':
                $class[] = 'content-has-sidebar float-right col-xl-8 col-lg-8 col-md-12 col-sm-12';
                break;

            case 'right':
                $class[] = 'content-has-sidebar float-left col-xl-8 col-lg-8 col-md-12 col-sm-12';
                break;

            default:
                $class[] = 'content-full-width col-12';
                break;
        }

        $class = implode( ' ', array_filter( $class ) );

        if ( $class )
        {
            echo ' class="' . esc_html($class) . '"';
        }
    } else {
        echo ' class="content-area col-12"'; 
    }
}

/**
 * Set secondary content class based on sidebar position
 *
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function intime_secondary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array(trim($extra_class));
        switch ($sidebar_pos) {
            case 'left':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-4 col-lg-4 col-md-12 col-sm-12';
                break;

            case 'right':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-4 col-lg-4 col-md-12 col-sm-12';
                break;

            default:
                break;
        }

        $class = implode(' ', array_filter($class));

        if ($class) {
            echo ' class="' . esc_html($class) . '"';
        }
    }
}


/**
 * Prints HTML for breadcrumbs.
 */
function intime_breadcrumb()
{
    if ( ! class_exists( 'CT_Breadcrumb' ) )
    {
        return;
    }

    $breadcrumb = new CT_Breadcrumb();
    $entries = $breadcrumb->get_entries();

    if ( empty( $entries ) )
    {
        return;
    }

    ob_start();

    foreach ( $entries as $entry )
    {
        $entry = wp_parse_args( $entry, array(
            'label' => '',
            'url'   => ''
        ) );

        if ( empty( $entry['label'] ) )
        {
            continue;
        }

        echo '<li>';

        if ( ! empty( $entry['url'] ) )
        {
            printf(
                '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                esc_url( $entry['url'] ),
                esc_attr( $entry['label'] )
            );
        }
        else
        {
            printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
        }

        echo '</li>';
    }

    $output = ob_get_clean();

    if ( $output )
    {
        printf( '<ul class="ct-breadcrumb">%s</ul>', wp_kses_post($output));
    }
}


function intime_entry_link_pages()
{
    wp_link_pages( array(
        'before'      => '<div class="page-links">',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
    ) );
}


if ( ! function_exists( 'intime_entry_excerpt' ) ) :
    /**
     * Print post excerpt based on length.
     *
     * @param  integer $length
     */
    function intime_entry_excerpt( $length = 55 )
    {
        $ct_the_excerpt = get_the_excerpt();
        if(!empty($ct_the_excerpt)) {
            echo esc_html($ct_the_excerpt);
        } else {
            echo wp_kses_post(intime_get_the_excerpt( $length ));
        }
    }
endif;


if(!function_exists('intime_ajax_paginate_links')){
    function intime_ajax_paginate_links($link){
        $parts = parse_url($link);
        if( !isset($parts['query']) ) return $link;
        parse_str($parts['query'], $query);
        if(isset($query['page']) && !empty($query['page'])){
            return '#' . $query['page'];
        }
        else{
            return '#1';
        }
    }
}

add_action( 'wp_ajax_intime_get_pagination_html', 'intime_get_pagination_html' );
add_action( 'wp_ajax_nopriv_intime_get_pagination_html', 'intime_get_pagination_html' );
if(!function_exists('intime_get_pagination_html')){
    function intime_get_pagination_html(){
        try{
            if(!isset($_POST['query_vars'])){
                throw new Exception(__('Something went wrong while requesting. Please try again!', 'intime'));
            }
            $query = new WP_Query($_POST['query_vars']);
            ob_start();
            intime_posts_pagination( $query,  true );
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => esc_attr__('Load Successfully!', 'intime'),
                    'data' => array(
                        'html' => $html,
                        'query_vars' => $_POST['query_vars'],
                        'post' => $query->have_posts()
                    ),
                )
            );
        }
        catch (Exception $e){
            wp_send_json(array('status' => false, 'message' => $e->getMessage()));
        }
        die;
    }
}

/**
 * Prints posts pagination based on query
 *
 * @param  WP_Query $query     Custom query, if left blank, this will use global query ( current query )
 * @return void
 */
function intime_posts_pagination( $query = null, $ajax = false )
{
    if($ajax){
        add_filter('paginate_links', 'intime_ajax_paginate_links');
    }

    $classes = array();

    if ( empty( $query ) )
    {
        $query = $GLOBALS['wp_query'];
    }

    if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
    {
        return;
    }

    $paged = $query->get( 'paged', '' );

    if ( ! $paged && is_front_page() && ! is_home() )
    {
        $paged = $query->get( 'page', '' );
    }

    $paged = $paged ? intval( $paged ) : 1;

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) )
    {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $html_prev = '<i class="fac fac-angle-left"></i>';
    $html_next = '<i class="fac fac-angle-right"></i>';
    $paginate_links_args = array(
        'base'     => $pagenum_link,
        'total'    => $query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => $html_prev,
        'next_text' => $html_next,
    );
    if($ajax){
        $paginate_links_args['format'] = '?page=%#%';
    }
    $links = paginate_links( $paginate_links_args );
    if ( $links ):
    ?>
    <nav class="ct-posts-pagination <?php echo esc_attr($ajax?'ajax':''); ?>">
        <div class="posts-page-links">
            <?php
                printf($links);
            ?>
        </div>
    </nav>
    <?php
    endif;
}

if ( ! function_exists( 'intime_post_meta' ) ) :
    function intime_post_meta() {
        $post_category_on = intime_get_opt( 'post_category_on', true );
        $post_author_on = intime_get_opt( 'post_author_on', true );
        $post_comment_on = intime_get_opt( 'post_comment_on', true );
        if($post_author_on || $post_date_on || $post_comment_on) : ?>
            <ul class="entry-meta ct-item-meta">
                <?php if($post_author_on) : ?>
                    <li class="item-author"><?php echo esc_html__('By', 'intime'); ?> <?php the_author_posts_link(); ?></li>
                <?php endif; ?>
                <?php if($post_category_on) : ?>
                    <li class="item-category"><?php the_terms( get_the_ID(), 'category', '', ', ', '' ); ?></li>
                <?php endif; ?>
                <?php if($post_comment_on) : ?>
                    <li class="item-comment"><a href="#comments"><?php echo comments_number(esc_attr__('0 Comments', 'intime'),esc_attr__('Comment: 1', 'intime'),esc_attr__('Comments: %', 'intime')); ?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; }
endif;

if ( ! function_exists( 'intime_archive_meta' ) ) :
    function intime_archive_meta() {
        $archive_categories_on = intime_get_opt( 'archive_categories_on', true );
        $archive_author_on = intime_get_opt( 'archive_author_on', true );
        $archive_comment_on = intime_get_opt( 'archive_comment_on', true );
        if($archive_author_on || $archive_categories_on || $archive_comment_on) : ?>
            <ul class="entry-meta ct-item-meta">
                <?php if($archive_author_on) : ?>
                    <li class="item-author"><?php echo esc_html__('By', 'intime'); ?> <?php the_author_posts_link(); ?></li>
                <?php endif; ?>
                <?php if($archive_categories_on) : ?>
                    <li class="item-category"><?php the_terms( get_the_ID(), 'category', '', ', ', '' ); ?></li>
                <?php endif; ?>
                <?php if($archive_comment_on) : ?>
                    <li class="item-comment"><a href="#comments"><?php echo comments_number(esc_attr__('0 Comments', 'intime'),esc_attr__('Comment: 1', 'intime'),esc_attr__('Comments: %', 'intime')); ?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; }
endif;

/**
 * Prints tag list
 */
if ( ! function_exists( 'intime_entry_tagged_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function intime_entry_tagged_in()
    {
        $tags_list = get_the_tag_list( '<label class="label">'.esc_attr__('Tags:', 'intime'). '</label>', ' ' );
        if ( $tags_list )
        {
            echo '<div class="entry-tags">';
            printf('%2$s', '', $tags_list);
            echo '</div>';
        }
    }
endif;

/**
 * List socials share for post.
 */
function intime_socials_share_default() { 
    $img_url = '';
    if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
        $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
    }
    ?>
    <div class="entry-social">
        <label><?php echo esc_html__('Share:', 'intime'); ?></label>
        <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'intime'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fac-facebook-f"></i></a>
        <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'intime'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="fab fac-twitter"></i></a>
        <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'intime'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="fab fac-pinterest-p"></i></a>
        <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'intime'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="fab fac-linkedin-in"></i></a>
    </div>
    <?php
}

/**
 * Related Post
 */
function intime_related_post()
{
    $post_related_on = intime_get_opt( 'post_related_on', false );

    if($post_related_on) {
        global $post;
        $current_id = $post->ID;
        $posttags = get_the_category($post->ID);
        if (empty($posttags)) return;

        $tags = array();

        foreach ($posttags as $tag) {

            $tags[] = $tag->term_id;
        }
        $post_number = '6';
        $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
        if (count($query_similar->posts) > 1) {
            wp_enqueue_script( 'owl-carousel' );
            wp_enqueue_script( 'intime-carousel' );
            ?>
            <div class="ct-related-post">
                <h4 class="widget-title"><?php echo esc_html__('Related Posts', 'intime'); ?></h4>
                <div class="ct-related-post-inner owl-carousel" data-item-xs="1" data-item-sm="2" data-item-md="3" data-item-lg="3" data-item-xl="3" data-item-xxl="3" data-margin="30" data-loop="false" data-autoplay="false" data-autoplaytimeout="5000" data-smartspeed="250" data-center="false" data-arrows="false" data-bullets="false" data-stagepadding="0" data-stagepaddingsm="0" data-rtl="false">
                    <?php foreach ($query_similar->posts as $post):
                        $thumbnail_url = '';
                        if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                            $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'intime-blog-small', false);
                        endif;
                        if ($post->ID !== $current_id) : ?>
                            <div class="grid-item">
                                <div class="grid-item-inner">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div class="item-featured">
                                            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" /></a>
                                        </div>
                                    <?php } ?>
                                    <h3 class="item-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                </div>
                            </div>
                        <?php endif;
                    endforeach; ?>
                </div>
            </div>
        <?php }
    }

    wp_reset_postdata();
}

/**
 * Header Search Mobile
 */
function intime_header_mobile_search()
{
    $search_field_placeholder = intime_get_opt( 'search_field_placeholder' );
    $search_icon = intime_get_opt( 'search_icon', false );
    if($search_icon) : ?>
        <div class="header-mobile-search">
            <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                <input type="text" placeholder="<?php if(!empty($search_field_placeholder)) { echo esc_attr( $search_field_placeholder ); } else { esc_attr_e('Search...', 'intime'); } ?>" name="s" class="search-field" />
                <button type="submit" class="search-submit"><i class="fac fac-search"></i></button>
            </form>
        </div>
<?php endif; }

/**
 * Header Search Popup
 */
function intime_search_popup()
{
    $search_icon = intime_get_opt( 'search_icon', false );
    if($search_icon) { ?>
        <div class="ct-modal ct-modal-search">
            <div class="ct-modal-close"><i class="ct-icon-close"></i></div>
            <div class="ct-modal-overlay"></div>
            <div class="ct-modal-content">
                <form role="search" method="get" class="search-form-popup" action="<?php echo esc_url(home_url( '/' )); ?>">
                    <div class="searchform-wrap">
                        <input type="text" placeholder="<?php echo esc_attr__('Enter Keywords...', 'intime'); ?>" id="search" name="s" class="search-field" />
                        <button type="submit" class="search-submit"><i class="fac fac-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    <?php }
}

/**
 * Sidebar Hidden
 */
function intime_sidebar_hidden()
{
    $hidden_sidebar_icon = intime_get_opt( 'hidden_sidebar_icon', false );
    if($hidden_sidebar_icon && is_active_sidebar('sidebar-hidden')) { ?>
        <div class="ct-hidden-sidebar-wrap">
            <div class="ct-hidden-sidebar-overlay"></div>
            <div class="ct-hidden-sidebar">
                <div class="ct-hidden-close"><i class="zmdi zmdi-close"></i></div>
                <div class="ct-hidden-sidebar-inner">
                    <div class="ct-hidden-sidebar-holder">
                        <?php dynamic_sidebar( 'sidebar-hidden' ); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

/**
 * Cart Sidebar
 */
function intime_cart_sidebar() { 
    $cart_icon = intime_get_opt( 'cart_icon', false ); ?>
    <?php if(class_exists('Woocommerce')) : 
        global $woocommerce; ?>
        <div class="ct-widget-cart-wrap">
            <div class="ct-widget-cart-overlay"></div>
            <div class="ct-widget-cart-sidebar">
                <div class="ct-close"><i class="ct-icon-close"></i></div>
                <div class="widget_shopping_cart">
                    <div class="widget_shopping_head">
                        <div class="widget_shopping_title">
                            <?php echo esc_html__( 'Cart', 'intime' ); ?>
                        </div>
                    </div>
                    <div class="widget_shopping_cart_content">
                        <?php
                            $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
                        ?>
                        <ul class="cart_list product_list_widget">

                        <?php if ( ! WC()->cart->is_empty() ) : ?>

                            <?php
                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                        $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                        $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                        $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                        ?>
                                        <li>
                                            <?php if(!empty($thumbnail)) : ?>
                                                <div class="cart-product-image">
                                                    <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
                                                        <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="cart-product-meta">
                                                <h3><a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo esc_html($product_name); ?></a></h3>
                                                <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                                                <?php
                                                    echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                                        '<a href="%s" class="remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="zmdi zmdi-close-circle-o"></i></a>',
                                                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                        esc_attr__( 'Remove this item', 'intime' ),
                                                        esc_attr( $product_id ),
                                                        esc_attr( $cart_item_key ),
                                                        esc_attr( $_product->get_sku() )
                                                    ), $cart_item_key );
                                                ?>
                                            </div>  
                                        </li>
                                        <?php
                                    }
                                }
                            ?>

                            <?php else : ?>

                                <li class="empty">
                                    <i class="fal fac-shopping-bag"></i>
                                    <span><?php esc_html_e( 'Your cart is empty', 'intime' ); ?></span>
                                    <a class="btn btn-animate" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php echo esc_html__('Browse Shop', 'intime'); ?></a>
                                </li>

                            <?php endif; ?>

                        </ul><!-- end product list -->
                    </div>
                    <?php if ( ! WC()->cart->is_empty() ) : ?>
                        <div class="widget_shopping_cart_footer">
                            <p class="total"><strong><?php esc_html_e( 'Subtotal', 'intime' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

                            <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

                            <p class="buttons">
                                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-secondary btn-animate wc-forward"><?php esc_html_e( 'View Cart', 'intime' ); ?></a>
                                <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-animate checkout wc-forward"><?php esc_html_e( 'Checkout', 'intime' ); ?></a>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php }
/**
 * User custom fields.
 */
add_action( 'show_user_profile', 'intime_user_fields' );
add_action( 'edit_user_profile', 'intime_user_fields' );
function intime_user_fields($user){

    $user_facebook = get_user_meta($user->ID, 'user_facebook', true);
    $user_twitter = get_user_meta($user->ID, 'user_twitter', true);
    $user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
    $user_skype = get_user_meta($user->ID, 'user_skype', true);
    $user_google = get_user_meta($user->ID, 'user_google', true);
    $user_youtube = get_user_meta($user->ID, 'user_youtube', true);
    $user_vimeo = get_user_meta($user->ID, 'user_vimeo', true);
    $user_tumblr = get_user_meta($user->ID, 'user_tumblr', true);
    $user_pinterest = get_user_meta($user->ID, 'user_pinterest', true);
    $user_instagram = get_user_meta($user->ID, 'user_instagram', true);
    $user_yelp = get_user_meta($user->ID, 'user_yelp', true);

    ?>
    <h3><?php esc_html_e('Social', 'intime'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_facebook"><?php esc_html_e('Facebook', 'intime'); ?></label></th>
            <td>
                <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_twitter"><?php esc_html_e('Twitter', 'intime'); ?></label></th>
            <td>
                <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'intime'); ?></label></th>
            <td>
                <input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_skype"><?php esc_html_e('Skype', 'intime'); ?></label></th>
            <td>
                <input id="user_skype" name="user_skype" type="text" value="<?php echo esc_attr(isset($user_skype) ? $user_skype : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_google"><?php esc_html_e('Google', 'intime'); ?></label></th>
            <td>
                <input id="user_google" name="user_google" type="text" value="<?php echo esc_attr(isset($user_google) ? $user_google : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_youtube"><?php esc_html_e('Youtube', 'intime'); ?></label></th>
            <td>
                <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_vimeo"><?php esc_html_e('Vimeo', 'intime'); ?></label></th>
            <td>
                <input id="user_vimeo" name="user_vimeo" type="text" value="<?php echo esc_attr(isset($user_vimeo) ? $user_vimeo : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_tumblr"><?php esc_html_e('Tumblr', 'intime'); ?></label></th>
            <td>
                <input id="user_tumblr" name="user_tumblr" type="text" value="<?php echo esc_attr(isset($user_tumblr) ? $user_tumblr : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_pinterest"><?php esc_html_e('Pinterest', 'intime'); ?></label></th>
            <td>
                <input id="user_pinterest" name="user_pinterest" type="text" value="<?php echo esc_attr(isset($user_pinterest) ? $user_pinterest : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_instagram"><?php esc_html_e('Instagram', 'intime'); ?></label></th>
            <td>
                <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_yelp"><?php esc_html_e('Yelp', 'intime'); ?></label></th>
            <td>
                <input id="user_yelp" name="user_yelp" type="text" value="<?php echo esc_attr(isset($user_yelp) ? $user_yelp : ''); ?>" />
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save user custom fields.
 */
add_action( 'personal_options_update', 'intime_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'intime_save_user_custom_fields' );
function intime_save_user_custom_fields( $user_id )
{
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    if(isset($_POST['user_facebook']))
        update_user_meta( $user_id, 'user_facebook', $_POST['user_facebook'] );
    if(isset($_POST['user_twitter']))
        update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
    if(isset($_POST['user_linkedin']))
        update_user_meta( $user_id, 'user_linkedin', $_POST['user_linkedin'] );
    if(isset($_POST['user_skype']))
        update_user_meta( $user_id, 'user_skype', $_POST['user_skype'] );
    if(isset($_POST['user_google']))
        update_user_meta( $user_id, 'user_google', $_POST['user_google'] );
    if(isset($_POST['user_youtube']))
        update_user_meta( $user_id, 'user_youtube', $_POST['user_youtube'] );
    if(isset($_POST['user_vimeo']))
        update_user_meta( $user_id, 'user_vimeo', $_POST['user_vimeo'] );
    if(isset($_POST['user_tumblr']))
        update_user_meta( $user_id, 'user_tumblr', $_POST['user_tumblr'] );
    if(isset($_POST['user_pinterest']))
        update_user_meta( $user_id, 'user_pinterest', $_POST['user_pinterest'] );
    if(isset($_POST['user_instagram']))
        update_user_meta( $user_id, 'user_instagram', $_POST['user_instagram'] );
    if(isset($_POST['user_yelp']))
        update_user_meta( $user_id, 'user_yelp', $_POST['user_yelp'] );
}
/* Author Social */
function intime_get_user_social() {

    $user_facebook = get_user_meta(get_the_author_meta( 'ID' ), 'user_facebook', true);
    $user_twitter = get_user_meta(get_the_author_meta( 'ID' ), 'user_twitter', true);
    $user_linkedin = get_user_meta(get_the_author_meta( 'ID' ), 'user_linkedin', true);
    $user_skype = get_user_meta(get_the_author_meta( 'ID' ), 'user_skype', true);
    $user_google = get_user_meta(get_the_author_meta( 'ID' ), 'user_google', true);
    $user_youtube = get_user_meta(get_the_author_meta( 'ID' ), 'user_youtube', true);
    $user_vimeo = get_user_meta(get_the_author_meta( 'ID' ), 'user_vimeo', true);
    $user_tumblr = get_user_meta(get_the_author_meta( 'ID' ), 'user_tumblr', true);
    $user_pinterest = get_user_meta(get_the_author_meta( 'ID' ), 'user_pinterest', true);
    $user_instagram = get_user_meta(get_the_author_meta( 'ID' ), 'user_instagram', true);
    $user_yelp = get_user_meta(get_the_author_meta( 'ID' ), 'user_yelp', true);

    ?>
    <ul class="user-social">
        <?php if(!empty($user_facebook)) { ?>
            <li><a href="<?php echo esc_url($user_facebook); ?>"><i class="fab fac-facebook-f"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_twitter)) { ?>
            <li><a href="<?php echo esc_url($user_twitter); ?>"><i class="fab fac-twitter"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_linkedin)) { ?>
            <li><a href="<?php echo esc_url($user_linkedin); ?>"><i class="fab fac-linkedin-in"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_instagram)) { ?>
            <li><a href="<?php echo esc_url($user_instagram); ?>"><i class="fab fac-instagram"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_google)) { ?>
            <li><a href="<?php echo esc_url($user_google); ?>"><i class="fab fac-google-plus"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_skype)) { ?>
            <li><a href="<?php echo esc_url($user_skype); ?>"><i class="fab fac-skype"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_pinterest)) { ?>
            <li><a href="<?php echo esc_url($user_pinterest); ?>"><i class="fab fac-pinterest"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_vimeo)) { ?>
            <li><a href="<?php echo esc_url($user_vimeo); ?>"><i class="fab fac-vimeo"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_youtube)) { ?>
            <li><a href="<?php echo esc_url($user_youtube); ?>"><i class="fab fac-youtube"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_yelp)) { ?>
            <li><a href="<?php echo esc_url($user_yelp); ?>"><i class="fab fac-yelp"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_tumblr)) { ?>
            <li><a href="<?php echo esc_url($user_tumblr); ?>"><i class="fab fac-tumblr"></i></a></li>
        <?php } ?>

    </ul> <?php
}

function intime_social_share_product() { ?>
    <a class="fb-social hover-effect" title="Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="zmdi zmdi-facebook"></i></a>
    <a class="tw-social hover-effect" title="Twitter" target="_blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="zmdi zmdi-twitter"></i></a>
    <a class="g-social hover-effect" title="Google Plus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-google-plus"></i></a>
    <a class="pin-social hover-effect" title="Pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(the_post_thumbnail_url( 'full' )); ?>&media=&description=<?php the_title(); ?>"><i class="zmdi zmdi-pinterest"></i></a>
    <?php
}

function intime_product_nav() {
    global $post;
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="product-previous-next">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <a class="nav-link-prev" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="fa fa-long-arrow-left"></i></a>
            <?php } ?>
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <a class="nav-link-next" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><i class="fa fa-long-arrow-right"></i></a>
            <?php } ?>
        </div>
    <?php }
}

/**
 * Social Icon
 */
function intime_social_header() {
    $social_facebook_url = intime_get_opt( 'h_social_facebook_url' );
    $social_twitter_url = intime_get_opt( 'h_social_twitter_url' );
    $social_dribbble_url = intime_get_opt( 'h_social_dribbble_url' );
    $social_behance_url = intime_get_opt( 'h_social_behance_url' );
    $social_inkedin_url = intime_get_opt( 'h_social_inkedin_url' );
    $social_instagram_url = intime_get_opt( 'h_social_instagram_url' );
    $social_google_url = intime_get_opt( 'h_social_google_url' );
    $social_skype_url = intime_get_opt( 'h_social_skype_url' );
    $social_pinterest_url = intime_get_opt( 'h_social_pinterest_url' );
    $social_vimeo_url = intime_get_opt( 'h_social_vimeo_url' );
    $social_youtube_url = intime_get_opt( 'h_social_youtube_url' );
    $social_yelp_url = intime_get_opt( 'h_social_yelp_url' );
    $social_tumblr_url = intime_get_opt( 'h_social_tumblr_url' );
    $social_tripadvisor_url = intime_get_opt( 'h_social_tripadvisor_url' );
    if(!empty($social_facebook_url) || !empty($social_dribbble_url) || !empty($social_behance_url) || !empty($social_twitter_url) || !empty($social_inkedin_url) || !empty($social_instagram_url) || !empty($social_google_url) || !empty($social_skype_url) || !empty($social_pinterest_url) || !empty($social_vimeo_url) || !empty($social_youtube_url) || !empty($social_yelp_url) || !empty($social_tumblr_url) || !empty($social_tripadvisor_url)) : ?>
        <?php
        if(!empty($social_facebook_url)) :
            echo '<a href="'.esc_url($social_facebook_url).'" target="_blank"><i class="fab fac-facebook-f"></i></a>';
        endif;
        if(!empty($social_twitter_url)) :
            echo '<a href="'.esc_url($social_twitter_url).'" target="_blank"><i class="fab fac-twitter"></i></a>';
        endif;
        if(!empty($social_dribbble_url)) :
            echo '<a href="'.esc_url($social_dribbble_url).'" target="_blank"><i class="fab fac-dribbble"></i></a>';
        endif;
        if(!empty($social_behance_url)) :
            echo '<a href="'.esc_url($social_behance_url).'" target="_blank"><i class="fab fac-behance"></i></a>';
        endif;
        if(!empty($social_inkedin_url)) :
            echo '<a href="'.esc_url($social_inkedin_url).'" target="_blank"><i class="fab fac-linkedin-in"></i></a>';
        endif;
        if(!empty($social_instagram_url)) :
            echo '<a href="'.esc_url($social_instagram_url).'" target="_blank"><i class="fab fac-instagram"></i></a>';
        endif;
        if(!empty($social_google_url)) :
            echo '<a href="'.esc_url($social_google_url).'" target="_blank"><i class="fab fac-google-plus"></i></a>';
        endif;
        if(!empty($social_skype_url)) :
            echo '<a href="'.esc_url($social_skype_url).'" target="_blank"><i class="fab fac-skype"></i></a>';
        endif;
        if(!empty($social_pinterest_url)) :
            echo '<a href="'.esc_url($social_pinterest_url).'" target="_blank"><i class="fab fac-pinterest"></i></a>';
        endif;
        if(!empty($social_vimeo_url)) :
            echo '<a href="'.esc_url($social_vimeo_url).'" target="_blank"><i class="fab fac-vimeo"></i></a>';
        endif;
        if(!empty($social_youtube_url)) :
            echo '<a href="'.esc_url($social_youtube_url).'" target="_blank"><i class="fab fac-youtube"></i></a>';
        endif;
        if(!empty($social_yelp_url)) :
            echo '<a href="'.esc_url($social_yelp_url).'" target="_blank"><i class="fab fac-yelp"></i></a>';
        endif;
        if(!empty($social_tumblr_url)) :
            echo '<a href="'.esc_url($social_tumblr_url).'" target="_blank"><i class="fab fac-tumblr"></i></a>';
        endif; 
        if(!empty($social_tripadvisor_url)) :
            echo '<a href="'.esc_url($social_tripadvisor_url).'" target="_blank"><i class="fab fa-tripadvisor"></i></a>';
        endif;
        ?>
    <?php endif; ?>
<?php }

if(!function_exists('intime_get_post_grid_layout1')){
    function intime_get_post_grid_layout1($posts = [], $settings = []){
        extract($settings);
        if($thumbnail_size != 'custom'){
            $img_size = $thumbnail_size;
        }
        elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
            $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
        }
        else {
            $img_size = '370x300';
        }
        if (is_array($posts)):
            foreach ($posts as $post):
                $img_id = get_post_thumbnail_id($post->ID);
                $img = ct_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                $author = get_user_by('id', $post->post_author);
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                            <div class="item--featured image-effect-white">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                <?php if($show_date == 'true'): 
                                    $year = get_the_date('Y', $post->ID);
                                    $year = substr( $year, -2); ?>
                                    <div class="item--date ct-date-box">
                                        <div class="item--date-inner">
                                            <span><?php echo get_the_date('d', $post->ID); ?></span>
                                            <span><?php echo get_the_date('M', $post->ID); ?>, <?php echo esc_attr($year); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="item--body">
                            <?php if($show_category == 'true' || $show_author == 'true' ) : ?>
                                <ul class="item--meta ct-item-meta">
                                    <?php if($show_author == 'true'): ?>
                                        <li class="item-author">
                                            <a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>"><?php echo esc_html($author->display_name); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($show_category == 'true') : ?>
                                        <li class="item--category">
                                            <?php the_terms( $post->ID, 'category', '', ', ' ); ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                            <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                            <?php if($show_excerpt == 'true'): ?>
                                <div class="item--content">
                                    <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($show_button == 'true') : ?>
                                <div class="item--readmore">
                                    <a class="btn-line-text" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                        <span><?php if(!empty($button_text)) {
                                            echo esc_attr($button_text);
                                        } else {
                                            echo esc_html__('Read more', 'intime');
                                        } ?></span>
                                        <i>+</i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}

if(!function_exists('intime_get_post_grid_layout2')){
    function intime_get_post_grid_layout2($posts = [], $settings = []){
        extract($settings);
        if($thumbnail_size != 'custom'){
            $img_size = $thumbnail_size;
        }
        elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
            $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
        }
        else {
            $img_size = '350x292';
        }
        if (is_array($posts)):
            foreach ($posts as $post):
                $img_id = get_post_thumbnail_id($post->ID);
                $img = ct_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                $author = get_user_by('id', $post->post_author);
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                            <div class="item--featured image-effect-white">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                <?php if($show_date == 'true'): 
                                    $year = get_the_date('Y', $post->ID);
                                    $year = substr( $year, -2); ?>
                                    <div class="item--date ct-date-box">
                                        <div class="item--date-inner">
                                            <span><?php echo get_the_date('d', $post->ID); ?></span>
                                            <span><?php echo get_the_date('M', $post->ID); ?>/<?php echo esc_attr($year); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="item--body">
                            <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                            <?php if($show_excerpt == 'true'): ?>
                                <div class="item--content">
                                    <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                </div>
                            <?php endif; ?>
                            <div class="item--holder">
                                <?php if($show_comment == 'true' || $show_author == 'true' ) : ?>
                                    <ul class="item--meta ct-item-meta">
                                        <?php if($show_author == 'true'): ?>
                                            <li class="item-author">
                                                <a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>"><?php echo esc_html($author->display_name); ?></a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if($show_comment == 'true') : ?>
                                            <li class="item--comment">
                                                <?php echo get_comments_number($post->ID).' '.esc_html__('Comments', 'intime'); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif; ?>
                                <?php if($show_button == 'true') : ?>
                                    <div class="item--readmore">
                                        <a class="btn-line-text" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <span><?php if(!empty($button_text)) {
                                                echo esc_attr($button_text);
                                            } else {
                                                echo esc_html__('Read more', 'intime');
                                            } ?></span>
                                            <i>+</i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}


if(!function_exists('intime_get_service_layout1')){
    function intime_get_service_layout1($posts = [], $settings = []){
        extract($settings);
        if (is_array($posts)):

            foreach ($posts as $key => $post):
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                $service_except = get_post_meta($post->ID, 'service_except', true);
                $icon_type = get_post_meta($post->ID, 'icon_type', true);
                $service_icon = get_post_meta($post->ID, 'service_icon', true);
                $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                if(!empty($service_icon_img['id'])) {
                    $icon_img = ct_get_image_by_size( array(
                        'attach_id'  => $service_icon_img['id'],
                        'thumb_size' => 'full',
                    ));
                    $icon_thumbnail = $icon_img['thumbnail'];
                }
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="grid-item-inner <?php if($key == 0) { echo 'active'; } ?> <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s"> 
                        <div class="item--holder">
                            <div class="item--holder-inner">
                                <?php if($icon_type == 'icon' && !empty($service_icon)) : ?>
                                    <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                                <?php endif; ?>
                                <?php if($icon_type == 'image' && !empty($service_icon_img)) : ?>
                                    <div class="item--icon icon-psb">
                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_title == 'true'): ?>
                                    <h3 class="item--title"><?php echo esc_attr(get_the_title($post->ID)); ?></h3>
                                <?php endif; ?>
                                <?php if($show_excerpt == 'true' && !empty($service_except)): ?>
                                    <div class="item--content">
                                        <?php echo wp_trim_words( $service_except, $num_words, $more = null ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="item--holder-hover bg-image" <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) { $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'intime-service'); ?>style="background-image: url(<?php echo esc_url($thumbnail_url[0]); ?>);"<?php } ?>>
                            <div class="item--meta">
                                <?php if($icon_type == 'icon' && !empty($service_icon)) : ?>
                                    <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                                <?php endif; ?>
                                <?php if($icon_type == 'image' && !empty($service_icon_img)) : ?>
                                    <div class="item--icon icon-psb">
                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_title == 'true'): ?>
                                    <h3 class="item--title"><?php echo esc_attr(get_the_title($post->ID)); ?></h3>
                                <?php endif; ?>
                            </div>
                            <?php if($show_excerpt == 'true' && !empty($service_except)): ?>
                                <div class="item--content">
                                    <?php echo wp_trim_words( $service_except, $num_words, $more = null ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($show_button == 'true') : ?>
                                <div class="item-readmore">
                                    <?php if($style_layout1 == 'style1') : ?>
                                        <a class="btn btn-animate" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <span>
                                                <?php if(!empty($button_text)) {
                                                    echo esc_attr($button_text);
                                                } else {
                                                    echo esc_html__('Read more', 'intime');
                                                } ?>
                                            </span>
                                            <i>+</i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if($style_layout1 == 'style2') : ?>
                                        <a class="btn btn-text2" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <span class="ct-button-icon"></span>
                                            <?php if(!empty($button_text)) {
                                                echo esc_attr($button_text);
                                            } else {
                                                echo esc_html__('Read more', 'intime');
                                            } ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}

if(!function_exists('intime_get_service_layout2')){
    function intime_get_service_layout2($posts = [], $settings = []){
        extract($settings);
        if (is_array($posts)):

            foreach ($posts as $key => $post):
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                $service_except = get_post_meta($post->ID, 'service_except', true);
                $icon_type = get_post_meta($post->ID, 'icon_type', true);
                $service_icon = get_post_meta($post->ID, 'service_icon', true);
                $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                if(!empty($service_icon_img['id'])) {
                    $icon_img = ct_get_image_by_size( array(
                        'attach_id'  => $service_icon_img['id'],
                        'thumb_size' => 'full',
                    ));
                    $icon_thumbnail = $icon_img['thumbnail'];
                }
                $img_id = get_post_thumbnail_id($post->ID);
                $img = ct_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => '270x210',
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="grid-item-inner <?php if($key == 0) { echo 'active'; } ?> <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s"> 
                        <div class="item--holder">
                            <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                                <div class="item--image">
                                    <?php echo ct_print_html($thumbnail); ?>
                                    <?php if($icon_type == 'icon' && !empty($service_icon)) : ?>
                                        <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                                    <?php endif; ?>
                                    <?php if($icon_type == 'image' && !empty($service_icon_img)) : ?>
                                        <div class="item--icon icon-psb">
                                            <?php echo wp_kses_post($icon_thumbnail); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($show_title == 'true'): ?>
                                <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                            <?php endif; ?>
                        </div>
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                            <div class="item--holder-hover bg-image" <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) { $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'intime-service'); ?>style="background-image: url(<?php echo esc_url($thumbnail_url[0]); ?>);"<?php } ?>>
                                <div class="item--meta">
                                    <?php if($icon_type == 'icon' && !empty($service_icon)) : ?>
                                        <div class="item--icon"><i class="text-gradient <?php echo esc_attr($service_icon); ?>"></i></div>
                                    <?php endif; ?>
                                    <?php if($icon_type == 'image' && !empty($service_icon_img)) : ?>
                                        <div class="item--icon">
                                            <?php echo wp_kses_post($icon_thumbnail); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($show_title == 'true'): ?>
                                        <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                                    <?php endif; ?>
                                </div>
                                <?php if($show_excerpt == 'true' && !empty($service_except)): ?>
                                    <div class="item--content">
                                        <?php echo wp_trim_words( $service_except, $num_words, $more = null ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_button == 'true') : ?>
                                    <div class="item--readmore">
                                        <a class="btn btn-animate" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <span>
                                                <?php if(!empty($button_text)) {
                                                    echo esc_attr($button_text);
                                                } else {
                                                    echo esc_html__('Read more', 'intime');
                                                } ?>
                                            </span>
                                            <i>+</i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}

if(!function_exists('intime_get_portfolio_layout1')){
    function intime_get_portfolio_layout1($posts = [], $settings = []){
        extract($settings);
        $default_size = '370x423'; 
        if(!empty($img_size)) {
            $default_size = $img_size;
        }
        if (is_array($posts)):
            foreach ($posts as $key => $post):

                $img_id = get_post_thumbnail_id($post->ID);
                $img = ct_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $default_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                            <div class="item--featured">
                                <?php echo ct_print_html($thumbnail); ?>
                                <?php if($show_button == 'true') : ?>
                                    <div class="item--readmore">
                                        <a class="btn btn-animate" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <span><?php if(!empty($button_text)) {
                                                echo esc_attr($button_text);
                                            } else {
                                                echo esc_html__('Read more', 'intime');
                                            } ?></span>
                                            <i>+</i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="item--holder">
                            <?php if($show_title == 'true'): ?>
                                <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                            <?php endif; ?>
                            <?php if($show_category == 'true'): ?>
                                <div class="item--category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}

if(!function_exists('intime_get_portfolio_layout2')){
    function intime_get_portfolio_layout2($posts = [], $settings = []){
        extract($settings);
        $default_size = '435x502'; 
        if(!empty($img_size)) {
            $default_size = $img_size;
        }
        if (is_array($posts)):
            foreach ($posts as $key => $post):

                $img_id = get_post_thumbnail_id($post->ID);
                $img = ct_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $default_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                            <div class="item--featured">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo ct_print_html($thumbnail); ?></a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="item--holder">
                            <?php if($show_category == 'true'): ?>
                                <div class="item--category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($show_title == 'true'): ?>
                                <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                            <?php endif; ?>
                            <?php if($show_button == 'true') : ?>
                                <div class="item--readmore">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><span>+</span></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}

if(!function_exists('intime_get_portfolio_layout3')){
    function intime_get_portfolio_layout3($posts = [], $settings = []){
        extract($settings);
        if (is_array($posts)):
            foreach ($posts as $key => $post):
                $img_size = '579x432';
                if($key == 1) {
                    $img_size = '579x288';
                }
                if($key == 3 || $key == 4) {
                    $img_size = '284x288';
                }
                $img_id = get_post_thumbnail_id($post->ID);
                $img = ct_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="grid-item <?php echo esc_attr($filter_class); ?>">
                        <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                            <div class="item--featured">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo ct_print_html($thumbnail); ?></a>
                            </div>
                            <div class="item--holder">
                                <div class="item--category">
                                    <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                </div>
                                <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                            </div>
                        </div>
                    </div>
            <?php endif;
            endforeach;
        endif;
    }
}

if(!function_exists('intime_get_post_grid')){
    function intime_get_post_grid($posts = [], $settings = []){
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['template_type']) {
            case 'post_grid_layout1':
                intime_get_post_grid_layout1($posts, $settings);
                break;

            case 'post_grid_layout2':
                intime_get_post_grid_layout2($posts, $settings);
                break;

            case 'service_layout1':
                intime_get_service_layout1($posts, $settings);
                break;

            case 'service_layout2':
                intime_get_service_layout2($posts, $settings);
                break;

            case 'portfolio_layout1':
                intime_get_portfolio_layout1($posts, $settings);
                break;

            case 'portfolio_layout2':
                intime_get_portfolio_layout2($posts, $settings);
                break;

            case 'portfolio_layout3':
                intime_get_portfolio_layout3($posts, $settings);
                break;

            default:
                return false;
                break;
        }
    }
}

add_action( 'wp_ajax_intime_load_more_post_grid', 'intime_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_intime_load_more_post_grid', 'intime_load_more_post_grid' );
if(!function_exists('intime_load_more_post_grid')){
    function intime_load_more_post_grid(){
        try{
            if(!isset($_POST['settings'])){
                throw new Exception(__('Something went wrong while requesting. Please try again!', 'intime'));
            }
            $settings = $_POST['settings'];
            set_query_var('paged', $settings['paged']);
            extract(ct_get_posts_of_grid($settings['posttype'], [
                'source' => isset($settings['source'])?$settings['source']:'',
                'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
                'order' => isset($settings['order'])?$settings['order']:'desc',
                'limit' => isset($settings['limit'])?$settings['limit']:'6',
                'post_ids' => '',
            ]));
            ob_start();
            intime_get_post_grid($posts, $settings);
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => esc_attr__('Load Successfully!', 'intime'),
                    'data' => array(
                        'html' => $html,
                        'paged' => $settings['paged'],
                        'posts' => $posts,
                        'max' => $max,
                    ),
                )
            );
        }
        catch (Exception $e){
            wp_send_json(array('status' => false, 'message' => $e->getMessage()));
        }
        die;
    }
}

/**
* Display navigation to next/previous post when applicable.
*/
function intime_post_nav_default() {
    global $post;
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="post-previous-next">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <div class="post-previous">
                    <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                        <i class="fac fac-angle-double-left"></i>
                        <span><?php echo esc_html__('Previous Post', 'intime'); ?></span>
                    </a>
                </div>
            <?php } ?>
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <div class="post-next">
                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
                        <span><?php echo esc_html__('Newer Post', 'intime'); ?></span>
                        <i class="fac fac-angle-double-right"></i>
                    </a>
                </div>
            <?php } ?>
        </div>
    <?php }
}

/**
 * Custom Widget Categories
 */
add_filter('wp_list_categories', 'intime_cat_count_span');
function intime_cat_count_span($output) {
    $dir = is_rtl() ? 'left' : 'right';
    $output = str_replace("\t", '', $output);
    $output = str_replace(")\n</li>", ')</li>', $output);
    $output = str_replace('</a> ', '<span class="count">', $output);
    $output = str_replace("</li>", "</span></li>", $output);
    $output = str_replace("\n<ul", "</span></a>\n<ul", $output);
    return $output;
}


/**
 * Custom Widget Archive
 */
add_filter('get_archives_link', 'intime_archive_count_span');
function intime_archive_count_span($links) {
    $dir = is_rtl() ? 'left' : 'right';
    $links = str_replace('</a>&nbsp;(', ' <span class="count">(', $links);
    $links = str_replace(')', ')</span></a>', $links);
    return $links;
}

/**
 * Custom Widget Product Categories 
 */
add_filter('wp_list_categories', 'intime_wc_cat_count_span');
function intime_wc_cat_count_span($links) {
    $dir = is_rtl() ? 'left' : 'right';
    $links = str_replace('</a> <span class="count">(', ' <span class="count">', $links);
    $links = str_replace('</span>', '</span></a>', $links);
    return $links;
}

/* Favicon */
function intime_site_favicon(){
    
    $favicon = intime_get_opt( 'favicon' );
    
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}
add_action('wp_head', 'intime_site_favicon');

/**
 * Add Template Woocommerce
 */
if(class_exists('Woocommerce')){
    require_once( get_template_directory() . '/woocommerce/wc-function-hooks.php' );
}

/**
 * Show Cart Sidebar Hidden
 */
add_action('wp_ajax_nopriv_item_added', 'intime_addedtocart_sweet_message');
add_action('wp_ajax_item_added', 'intime_addedtocart_sweet_message');
function intime_addedtocart_sweet_message() {
    echo isset($_POST['id']) && $_POST['id'] > 0 ? (int) esc_attr($_POST['id']) : false;
    die();
}
add_action('wp_footer', 'intime_product_count_check');
function intime_product_count_check() {
    if (class_exists('Woocommerce') && is_checkout())
        return;
    ?>
    <script type="text/javascript">
        jQuery( function($) {
            if ( typeof wc_add_to_cart_params === 'undefined' )
                return false;

            $(document.body).on( 'added_to_cart', function( event, fragments, cart_hash, $button ) {
                var $pid = $button.data('product_id');

                $.ajax({
                    type: 'POST',
                    url: wc_add_to_cart_params.ajax_url,
                    data: {
                        'action': 'item_added',
                        'id'    : $pid
                    },
                    success: function (response) {
                        $('.ct-widget-cart-wrap').addClass('open');
                    }
                });
            });
        });
    </script>
    <?php
}

/**
 * Animate
*/

function intime_animate() {
    $ct_animate = array(
        '' => 'None',
        'wow bounce' => 'bounce',
        'wow flash' => 'flash',
        'wow pulse' => 'pulse',
        'wow rubberBand' => 'rubberBand',
        'wow shake' => 'shake',
        'wow swing' => 'swing',
        'wow tada' => 'tada',
        'wow wobble' => 'wobble',
        'wow bounceIn' => 'bounceIn',
        'wow bounceInDown' => 'bounceInDown',
        'wow bounceInLeft' => 'bounceInLeft',
        'wow bounceInRight' => 'bounceInRight',
        'wow bounceInUp' => 'bounceInUp',
        'wow bounceOut' => 'bounceOut',
        'wow bounceOutDown' => 'bounceOutDown',
        'wow bounceOutLeft' => 'bounceOutLeft',
        'wow bounceOutRight' => 'bounceOutRight',
        'wow bounceOutUp' => 'bounceOutUp',
        'wow fadeIn' => 'fadeIn',
        'wow fadeInDown' => 'fadeInDown',
        'wow fadeInDownBig' => 'fadeInDownBig',
        'wow fadeInLeft' => 'fadeInLeft',
        'wow fadeInLeftBig' => 'fadeInLeftBig',
        'wow fadeInRight' => 'fadeInRight',
        'wow fadeInRightBig' => 'fadeInRightBig',
        'wow fadeInUp' => 'fadeInUp',
        'wow fadeInUpBig' => 'fadeInUpBig',
        'wow fadeOut' => 'fadeOut',
        'wow fadeOutDown' => 'fadeOutDown',
        'wow fadeOutDownBig' => 'fadeOutDownBig',
        'wow fadeOutLeft' => 'fadeOutLeft',
        'wow fadeOutLeftBig' => 'fadeOutLeftBig',
        'wow fadeOutRight' => 'fadeOutRight',
        'wow fadeOutRightBig' => 'fadeOutRightBig',
        'wow fadeOutUp' => 'fadeOutUp',
        'wow fadeOutUpBig' => 'fadeOutUpBig',
        'wow flip' => 'flip',
        'wow flipInX' => 'flipInX',
        'wow flipInY' => 'flipInY',
        'wow flipOutX' => 'flipOutX',
        'wow flipOutY' => 'flipOutY',
        'wow lightSpeedIn' => 'lightSpeedIn',
        'wow lightSpeedOut' => 'lightSpeedOut',
        'wow rotateIn' => 'rotateIn',
        'wow rotateInDownLeft' => 'rotateInDownLeft',
        'wow rotateInDownRight' => 'rotateInDownRight',
        'wow rotateInUpLeft' => 'rotateInUpLeft',
        'wow rotateInUpRight' => 'rotateInUpRight',
        'wow rotateOut' => 'rotateOut',
        'wow rotateOutDownLeft' => 'rotateOutDownLeft',
        'wow rotateOutDownRight' => 'rotateOutDownRight',
        'wow rotateOutUpLeft' => 'rotateOutUpLeft',
        'wow rotateOutUpRight' => 'rotateOutUpRight',
        'wow hinge' => 'hinge',
        'wow rollIn' => 'rollIn',
        'wow rollOut' => 'rollOut',
        'wow zoomIn' => 'zoomIn',
        'wow zoomInDown' => 'zoomInDown',
        'wow zoomInLeft' => 'zoomInLeft',
        'wow zoomInRight' => 'zoomInRight',
        'wow zoomInUp' => 'zoomInUp',
        'wow zoomOut' => 'zoomOut',
        'wow zoomOutDown' => 'zoomOutDown',
        'wow zoomOutLeft' => 'zoomOutLeft',
        'wow zoomOutRight' => 'zoomOutRight',
        'wow zoomOutUp' => 'zoomOutUp',
    );
    return $ct_animate;
}

function intime_animate_case() {
    $ct_animate = array(
        '' => 'None',
        'case-fade-in-up' => 'Case Fade In Up',
        'bounce' => 'bounce',
        'flash' => 'flash',
        'pulse' => 'pulse',
        'rubberBand' => 'rubberBand',
        'shake' => 'shake',
        'swing' => 'swing',
        'tada' => 'tada',
        'wobble' => 'wobble',
        'bounceIn' => 'bounceIn',
        'bounceInDown' => 'bounceInDown',
        'bounceInLeft' => 'bounceInLeft',
        'bounceInRight' => 'bounceInRight',
        'bounceInUp' => 'bounceInUp',
        'bounceOut' => 'bounceOut',
        'bounceOutDown' => 'bounceOutDown',
        'bounceOutLeft' => 'bounceOutLeft',
        'bounceOutRight' => 'bounceOutRight',
        'bounceOutUp' => 'bounceOutUp',
        'fadeIn' => 'fadeIn',
        'fadeInDown' => 'fadeInDown',
        'fadeInDownBig' => 'fadeInDownBig',
        'fadeInLeft' => 'fadeInLeft',
        'fadeInLeftBig' => 'fadeInLeftBig',
        'fadeInRight' => 'fadeInRight',
        'fadeInRightBig' => 'fadeInRightBig',
        'fadeInUp' => 'fadeInUp',
        'fadeInUpBig' => 'fadeInUpBig',
        'fadeOut' => 'fadeOut',
        'fadeOutDown' => 'fadeOutDown',
        'fadeOutDownBig' => 'fadeOutDownBig',
        'fadeOutLeft' => 'fadeOutLeft',
        'fadeOutLeftBig' => 'fadeOutLeftBig',
        'fadeOutRight' => 'fadeOutRight',
        'fadeOutRightBig' => 'fadeOutRightBig',
        'fadeOutUp' => 'fadeOutUp',
        'fadeOutUpBig' => 'fadeOutUpBig',
        'flip' => 'flip',
        'flipInX' => 'flipInX',
        'flipInY' => 'flipInY',
        'flipOutX' => 'flipOutX',
        'flipOutY' => 'flipOutY',
        'lightSpeedIn' => 'lightSpeedIn',
        'lightSpeedOut' => 'lightSpeedOut',
        'rotateIn' => 'rotateIn',
        'rotateInDownLeft' => 'rotateInDownLeft',
        'rotateInDownRight' => 'rotateInDownRight',
        'rotateInUpLeft' => 'rotateInUpLeft',
        'rotateInUpRight' => 'rotateInUpRight',
        'rotateOut' => 'rotateOut',
        'rotateOutDownLeft' => 'rotateOutDownLeft',
        'rotateOutDownRight' => 'rotateOutDownRight',
        'rotateOutUpLeft' => 'rotateOutUpLeft',
        'rotateOutUpRight' => 'rotateOutUpRight',
        'hinge' => 'hinge',
        'rollIn' => 'rollIn',
        'rollOut' => 'rollOut',
        'zoomIn' => 'zoomIn',
        'zoomInDown' => 'zoomInDown',
        'zoomInLeft' => 'zoomInLeft',
        'zoomInRight' => 'zoomInRight',
        'zoomInUp' => 'zoomInUp',
        'zoomOut' => 'zoomOut',
        'zoomOutDown' => 'zoomOutDown',
        'zoomOutLeft' => 'zoomOutLeft',
        'zoomOutRight' => 'zoomOutRight',
        'zoomOutUp' => 'zoomOutUp',
    );
    return $ct_animate;
}

/* Addd shortcode Gallery */
if(function_exists( 'ct_register_shortcode' )) {
    function intime_gallery_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'link' => '#',
         'images_id' => '',
         'cols' => '2',
        ), $atts));

        ob_start();
        ?>
        <div class="ct-gallery gallery-<?php echo esc_attr($cols); ?>-columns">
        <?php
        $ct_images = explode( ',', $images_id );
        foreach ($ct_images as $key => $img_id) :
            $img = ct_get_image_by_size( array(
                'attach_id'  => $img_id,
                'thumb_size' => '453x400',
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="ct-gallery-item">
                <?php echo ct_print_html($thumbnail); ?>
                <?php if($key == 0) : ?>
                    <a href="<?php echo esc_url($link); ?>" class="btn-video"><i class="fac fac-play"></i></a>
                <?php endif; ?>
            </div>
            <?php
        endforeach;
        ?>
        </div>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    ct_register_shortcode('ct_gallery', 'intime_gallery_shortcode');
}


/* Addd shortcode Video button */
if(function_exists( 'ct_register_shortcode' )) {
    function intime_video_button_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'btn_link' => 'https://www.youtube.com/watch?v=SF4aHwxHtZ0',
         'btn_text' => '',
         'btn_style' => 'slider-style1',
        ), $atts));

        ob_start();
        ?>
        <div class="slider-video-button">
            <a href="<?php echo esc_url($btn_link); ?>" class="slider-video <?php echo esc_attr($btn_style); ?>">
                <i class="fac fac-play"></i>
                <span class="line-video-animation line-video-1"></span>
                <span class="line-video-animation line-video-2"></span>
                <span class="line-video-animation line-video-3"></span>
            </a>
            <?php if(!empty($btn_text)) : ?>
                <span class="slider-video-title"><?php echo esc_attr($btn_text); ?></span>
            <?php endif; ?>
        </div>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    ct_register_shortcode('ct_video_button', 'intime_video_button_shortcode');
}

/**
 * Demo Bar
 */
function intime_demo_bar() { ?>
    <div class="ct-demo-bar">
        <div class="ct-demo-option">
            <a class="choose-demo" href="javascript:;">
                <span>Choose Theme Styling</span>
                <i class="far fac-cog"></i>
            </a>
            <a href="https://casethemes.ticksy.com/submit/" target="_blank">
                <span>Submit a Ticket</span>
                <i class="far fac-life-ring"></i>
            </a>
            <a href="https://themeforest.net/cart/add_items?ref=case-themes&item_ids=26053893" target="_blank">
                <span>Purchase Theme</span>
                <i class="far fac-shopping-cart"></i>
            </a>
        </div>
        <div class="ct-demo-bar-inner">
            <div class="ct-demo-bar-meta">
                <h4>Pre-Built Demos Collection</h4>
                <p>Intime comes with a beautiful collection of modern, easily importable, and highly customizable demo layouts. Any of which can be installed via one click.</p>
            </div>
            <div class="ct-demo-bar-list">
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo1.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Demo 01</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/intime" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo2.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Demo 02</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/intime/home-4/" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo3.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Demo 03</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/intime/home-2/" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo4.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Demo 04</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/intime/home-3/" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo5.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Demo 05</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/intime/home-5/" target="_blank">View Demo</a>
                    </div>
                </div>
                <div class="ct-demo-bar-item">
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home-demo/demo6.jpg'); ?>" alt="Demo" />
                    <div class="ct-demo-bar-holder">
                        <h6>Demo 06</h6>
                        <a class="btn btn-default" href="http://demo.casethemes.net/intime/home-6/" target="_blank">View Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

/* Post Type Support */
function intime_add_cpt_support() {
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'post', 'portfolio', 'service', 'footer', 'ct-mega-menu' ];
        update_option( 'elementor_cpt_support', $cpt_support );
    }
    
    else if( ! in_array( 'portfolio', $cpt_support ) ) {
        $cpt_support[] = 'portfolio';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'service', $cpt_support ) ) {
        $cpt_support[] = 'service';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'footer', $cpt_support ) ) {
        $cpt_support[] = 'footer';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'ct-mega-menu', $cpt_support ) ) {
        $cpt_support[] = 'ct-mega-menu';
        update_option( 'elementor_cpt_support', $cpt_support );
    }
}
add_action( 'after_switch_theme', 'intime_add_cpt_support');

/* Custom Archive Post Type Link */
add_filter( 'post_type_archive_link', 'intime_get_post_type_archive_link', 10, 2 );
function intime_get_post_type_archive_link($link, $post_type){

    if( $post_type == 'portfolio'){
        $archive_portfolio_link = intime_get_opt( 'archive_portfolio_link' );
            if( !empty($archive_portfolio_link) ){ 
            $link = get_permalink($archive_portfolio_link);
        }
    }

    if( $post_type == 'service'){
        $archive_service_link = intime_get_opt( 'archive_service_link' );
            if( !empty($archive_service_link) ){ 
            $link = get_permalink($archive_service_link);
        }
    }

  return $link;
}

/* Mouse Move Animation */
function intime_mouse_move_animation() { 
    $mouse_move_animation = intime_get_opt( 'mouse_move_animation', false );
    if($mouse_move_animation == true) : ?>  
        <div id="ct-mouse-move" class="ct-mouse-move">
            <div class="circle-cursor circle-cursor--outer"></div>
            <div class="circle-cursor circle-cursor--inner"></div>
        </div>
<?php endif; }

/* Nesletter Popup */
function intime_newsletter_popup() { 
    $newsletter_popup = intime_get_opt( 'newsletter_popup', false );
    $newslette_title = intime_get_opt( 'newslette_title' );
    $newslette_desc = intime_get_opt( 'newslette_desc' );
    $newslette_image = intime_get_opt( 'newslette_image' );
    if($newsletter_popup && class_exists('MC4WP_Container')) : 
        wp_enqueue_script('ct-cookie');
        wp_enqueue_script('newsletter-popup', get_template_directory_uri() . '/assets/js/newsletter-popup.js', array('jquery'), 'all', true);
        ?>  
        <div id="ct-newsletter-popup">
            <div class="ct-newsletter-content">
                <div class="ct-newsletter-content-inner">
                    <div class="ct-newsletter-close ct-icon-close"></div>
                    <div class="ct-newsletter-holder">
                        <?php if(!empty($newslette_image['url'])) : ?>
                            <div class="ct-newsletter-image"><img src="<?php echo esc_url($newslette_image['url']); ?>" alt="<?php echo esc_attr($newslette_title); ?>" /></div>
                        <?php endif; ?>
                        <h4 class="ct-newsletter-title">
                            <?php if(!empty($newslette_title)) {
                                echo esc_attr($newslette_title); 
                            } else {
                                echo esc_html__('Subscribe to our newsletter', 'intime');
                            } ?>
                        </h4>
                        <div class="ct-newsletter-desc">
                            <?php if(!empty($newslette_desc)) {
                                echo esc_attr($newslette_desc); 
                            } else {
                                echo esc_html__('Sign up to receive latest news, updates, promotions, and special offers delivered directly to your inbox.', 'intime');
                            } ?>
                        </div>
                        <?php echo do_shortcode('[mc4wp_form]'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php }