<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'jquery-bxslider','font-awesome' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

/*
* Including sidebars and custom widgets
*/

require_once(get_stylesheet_directory() . '/sidebar-widgets/sidebar.php');
require_once(get_stylesheet_directory() . '/sidebar-widgets/breaker.php');
require_once(get_stylesheet_directory() . '/sidebar-widgets/hover-widget.php');
require_once(get_stylesheet_directory() . '/sidebar-widgets/three-category-widget.php');
require_once(get_stylesheet_directory() . '/sidebar-widgets/four-news-display-widget.php');
require_once(get_stylesheet_directory() . '/sidebar-widgets/two-big-news-widget.php');