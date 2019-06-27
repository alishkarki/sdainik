<?php
/**
 * The front-page template file.
 *
 * @package Acme Themes
 * @subpackage SuperMag
 * @since SuperMag 1.1.0
 */
get_header();

dynamic_sidebar('supermag-sidebar-breaker');
dynamic_sidebar('supermag-sidebar-full-width');

/**
 * supermag_action_front_page hook
 * @since SuperMag 1.1.0
 *
 * @hooked supermag_front_page -  10
 */
do_action( 'supermag_action_front_page' );

get_sidebar( 'left' );
get_sidebar();
get_footer();