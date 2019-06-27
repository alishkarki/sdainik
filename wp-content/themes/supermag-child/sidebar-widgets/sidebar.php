<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
 
function supermag_widget_init_child(){

    register_sidebar(array(
        'name' => __('Breaker News Sidebar Area', 'supermag'),
        'id'   => 'supermag-sidebar-breaker',
        'description' => __('Displays news on breaker section sidebar.', 'supermag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
	
	 register_sidebar(array(
        'name' => __('Full Width Sidebar', 'supermag'),
        'id'   => 'supermag-sidebar-full-width',
        'description' => __('Displays news on full width sidebar.', 'supermag'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
}
add_action('widgets_init', 'supermag_widget_init_child');


