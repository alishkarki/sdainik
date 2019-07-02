<?php
/*adding sections for footer options*/
$wp_customize->add_section( 'supermag-contact-option', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Contact Option', 'supermag' ),
    'panel'          => 'supermag-header-panel'
) );

/*copyright*/
$wp_customize->add_setting( 'supermag_theme_options[supermag-contact-info]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supermag-contact-info'],
    'sanitize_callback' => 'wp_kses_post'
) );
$wp_customize->add_control( 'supermag_theme_options[supermag-contact-info]', array(
    'label'		=> __( 'Address :', 'supermag' ),
    'section'   => 'supermag-contact-option',
    'type'	  	=> 'text',
    'priority'  => 2
) );
