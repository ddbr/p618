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

	$wp_customize->add_setting( 'corporate_logo',
		array(
			'transport'		=> 'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corporate_logo',
			array(
				'settings'		=> 'corporate_logo',
				'section'		=> 'title_tagline',
				'label'			=> __( 'Corporate Logo', 'theme-slug' ),
				'description'	=> __( 'Select the logo image for your page', 'theme-slug' )
	) ) );

	$wp_customize->add_setting( 'footer_text',
		array(
			'transport'		=> 'postMessage'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_text',
			array(
				'settings'		=> 'footer_text',
				'section'		=> 'title_tagline',
				'type' => 'text',
				'label'			=> __( 'Footer Text', 'theme-slug' ),
				'description'	=> __( 'Enter text for footer line', 'theme-slug' )
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
