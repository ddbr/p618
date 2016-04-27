<?php
/**
 * p619 Theme Customizer.
 *
 * @package p619
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function p619_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'image_control', array(
	  'label' => __( 'Company Logo Image', 'theme_textdomain' ),
	  'section' => 'header_image',
	  'mime_type' => 'image',
	) ) );
}
add_action( 'customize_register', 'p619_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function p619_customize_preview_js() {
	wp_enqueue_script( 'p619_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'p619_customize_preview_js' );
