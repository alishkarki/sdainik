<?php
/*adding sections for header date*/
$wp_customize->add_section( 'supermag-header-date', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Enable Date', 'supermag' ),
    'panel'          => 'supermag-header-panel'
) );

/*show date*/
$wp_customize->add_setting( 'supermag_theme_options[supermag-show-date]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['supermag-show-date'],
    'sanitize_callback' => 'supermag_sanitize_checkbox',
) );

$wp_customize->add_control( 'supermag_theme_options[supermag-show-contact]', array(
    'label'		=> __( 'Show Contact', 'supermag' ),
    'section'   => 'supermag-header-contact',
    'settings'  => 'supermag_theme_options[supermag-show-contact]',
    'type'	  	=> 'checkbox',
    'priority'  => 7,
) );

/*date format*/
$wp_customize->add_setting( 'supermag_theme_options[supermag-contact-info]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['supermag-contact-info'],
	'sanitize_callback' => 'supermag_sanitize_select'
) );

$wp_customize->add_control( 'supermag_theme_options[supermag-header-date-format]', array(
		'label'		=> __( 'Contact Number', 'supermag' ),
	'section'   => 'supermag-contact-info',
	'settings'  => 'supermag_theme_options[supermag-conact-info]',
	'type'	  	=> 'select',
	'priority'  => 20
) );