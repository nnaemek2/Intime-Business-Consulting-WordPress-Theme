<?php
/**
 * Template part for displaying the primary menu of the site
 */
$h_custom_menu = intime_get_page_opt('h_custom_menu');
$icon_has_children = intime_get_opt('icon_has_children', 'plus');
$icon_has_children_page = intime_get_page_opt('icon_has_children_page', 'themeoption');
if($icon_has_children_page != 'themeoption' && !empty($icon_has_children_page)) {
    $icon_has_children = $icon_has_children_page;
}
if ( has_nav_menu( 'primary' ) )
{
    $attr_menu = array(
        'theme_location' => 'primary',
        'container'  => '',
        'menu_id'    => 'ct-main-menu',
        'menu_class' => 'ct-main-menu children-'.$icon_has_children.' clearfix',
        'link_before'     => '<span>',
        'link_after'      => '</span><span class="menu-line"></span><span class="menu-icon-plus"></span>',
        'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
    );
    if(isset($h_custom_menu) && !empty($h_custom_menu)) {
        $attr_menu['menu'] = $h_custom_menu;
    }
    wp_nav_menu( $attr_menu );
} else { ?>
    <ul class="ct-main-menu">
        <?php wp_list_pages( array(
            'depth'        => 0,
            'show_date'    => '',
            'date_format'  => get_option( 'date_format' ),
            'child_of'     => 0,
            'exclude'      => '',
            'title_li'     => '',
            'echo'         => 1,
            'authors'      => '',
            'sort_column'  => 'menu_order, post_title',
            'link_before'  => '',
            'link_after'   => '',
            'item_spacing' => 'preserve',
            'walker'       => '',
        ) ); ?>
    </ul>
<?php }