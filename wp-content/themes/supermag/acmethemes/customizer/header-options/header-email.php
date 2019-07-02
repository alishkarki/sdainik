<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'supermag-email-option', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Email Option', 'supermag' ),
    'panel'          => 'supermag-header-panel'
) );

/*copyright*/
$wp_customize->add_setting( 'supermag_theme_options[supermag-email-info]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supermag-email-info'],
    'sanitize_callback' => 'wp_kses_post'
) );
$wp_customize->add_control( 'supermag_theme_options[supermag-email-info]', array(
    'label'		=> __( 'Address :', 'supermag' ),
    'section'   => 'supermag-email-option',
    'type'	  	=> 'text',
    'priority'  => 2
) );
