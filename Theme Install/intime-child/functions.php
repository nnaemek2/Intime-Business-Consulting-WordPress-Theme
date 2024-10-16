<?php

/**
 * Add child styles.
 * 
 * @author CaseThemes
 */
function intime_enqueue_styles()
{
    $parent_style = 'intime-style';
    
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(
        $parent_style
    ));
}

add_action('wp_enqueue_scripts', 'intime_enqueue_styles');