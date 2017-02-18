<?php
/**
 * Solitude : Customizer
 * 
 * @package WordPress
 * @subpackage Solitude
 * @since 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function solitude_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title',
		'render_callback' => 'solitude_customize_partial_blogname',
	) );
}
add_action( 'customize_register', 'solitude_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Solitude 1.0
 * @see solitude_customize_register()
 *
 * @return void
 */
function solitude_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function solitude_customize_preview_js() {
	wp_enqueue_script( 'solitude-customize-preview', get_theme_file_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'solitude_customize_preview_js' );
