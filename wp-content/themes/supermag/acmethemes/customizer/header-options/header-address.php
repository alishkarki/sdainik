<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'supermag-address-option', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Address Option', 'supermag' ),
    'panel'          => 'supermag-header-panel'
) );

/*copyright*/
$wp_customize->add_setting( 'supermag_theme_options[supermag-address-info]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supermag-address-info'],
    'sanitize_callback' => 'wp_kses_post'
) );
$wp_customize->add_control( 'supermag_theme_options[supermag-address-info]', array(
    'label'		=> __( 'Address Number:', 'supermag' ),
    'section'   => 'supermag-address-option',
    'type'	  	=> 'text',
    'priority'  => 2
) );
