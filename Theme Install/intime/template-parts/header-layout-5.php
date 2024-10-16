<?php
/**
 * Template part for displaying default header layout
 */
$h_style1 = intime_get_page_opt( 'h_style1', 'style1' );
$sticky_on = intime_get_opt( 'sticky_on', false );
$sticky_header_type = intime_get_opt( 'sticky_header_type', 'scroll-to-bottom' );
$sticky_header_type_page = intime_get_page_opt( 'sticky_header_type_page', 'themeoption' );
if(isset($sticky_header_type_page) && !empty($sticky_header_type_page) && $sticky_header_type_page !== 'themeoption') {
    $sticky_header_type = $sticky_header_type_page;
}
$search_icon = intime_get_opt( 'search_icon', false );
$cart_icon = intime_get_opt( 'cart_icon', false );

$custom_header = intime_get_page_opt('custom_header');

$logo_mobile = intime_get_opt( 'logo_mobile', array( 'url' => get_template_directory_uri().'/assets/images/logo-dark.png', 'id' => '' ) );
$p_logo_mobile = intime_get_page_opt('p_logo_mobile');
if($custom_header && !empty($p_logo_mobile['url'])) {
    $logo_mobile['url'] = $p_logo_mobile['url'];
}
?>
<header id="ct-masthead">
    <div id="ct-header-wrap" class="ct-header-layout5 ct-header-trans <?php echo esc_attr($h_style1); ?> fixed-height-h <?php if($sticky_on == 1) { echo 'is-sticky '; echo esc_attr($sticky_header_type); } ?>">

        <div id="ct-header" class="ct-header-main">
            <div class="container">
                <div class="row">
                    <div class="ct-header-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="ct-header-navigation">
                        <nav class="ct-main-navigation">
                            <div class="ct-main-navigation-inner">
                                <?php if ($logo_mobile['url']) { ?>
                                    <div class="ct-logo-mobile">
                                        <a href="<?php esc_url( esc_url( home_url( '/' ) ) ); ?>" title="<?php esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"><img src="<?php echo esc_url( $logo_mobile['url'] ); ?>" alt="<?php esc_attr( get_bloginfo( 'name' ) ); ?>"/></a>
                                    </div>
                                <?php } ?>
                                <?php intime_header_mobile_search(); ?>
                                <?php get_template_part( 'template-parts/header-menu' ); ?>
                            </div>
                        </nav>
                        <div class="ct-header-meta">
                            <?php if($search_icon) : ?>
                                <div class="header-right-item h-btn-search"><i class="fac fac-search"></i></div>
                            <?php endif; ?>
                            <?php if(class_exists('Woocommerce') && $cart_icon) : ?>
                                <div class="header-right-item h-btn-cart">
                                    <i class="fac fac-shopping-basket"></i>
                                    <span class="widget_cart_counter_header"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'intime' ), WC()->cart->cart_contents_count ); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="ct-menu-mobile">
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>
        </div>

    </div>
</header>