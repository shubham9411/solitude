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

	/**
	 * Bootstrap Themes
	 */
	$wp_customize->add_setting( 'solitude_bootstrap_themes' , array(
		'default' => 'default',
		'transport' => 'refresh',
		'sanitize_callback' => 'solitude_sanitize_bootstrap_themes',
	) );

	$wp_customize->add_setting( 'solitude_bootstrap_varient' , array(
		'default' => 'default',
		'transport' => 'refresh',
		'sanitize_callback' => 'solitude_sanitize_bootstrap_themes_varient',
	) );

	$wp_customize->add_control( 'solitude_bootstrap_themes' , array(
		'type' => 'radio',
		'label' => __( 'Bootstrap Theme' , 'solitude' ),
		'choices' => array(
			'default' => __( 'Default' , 'solitude' ),
			'paper' => __( 'Paper' , 'solitude' ),
			'darkly' => __( 'Darkly' , 'solitude' ),
			'lumen' => __( 'Lumen' , 'solitude' ),
		),
		'section' => 'solitude_bootstrap_theme_menu',
		'priority' => 5,
	) );

	$wp_customize->add_control( 'solitude_bootstrap_varient' , array(
		'type' => 'radio',
		'label' => __( 'Bootstrap Theme Varient' , 'solitude' ),
		'choices' => array(
			'default' => __( 'Default' , 'solitude' ),
			'inverse' => __( 'Inverse' , 'solitude' ),
		),
		'section' => 'solitude_bootstrap_theme_menu',
		'priority' => 4,
	) );

	$wp_customize->add_section( 'solitude_bootstrap_theme_menu' , array(
		'title' => __( 'Bootstrap Scheme', 'solitude' ),
		'description' => __( 'Select the Bootstrap theme which suits you', 'solitude' ),
		'panel' => '',
		'priority' => 160,
		'capability' => 'edit_theme_options',
	) );

	/**
	 * Header Color
	 */
	$wp_customize->add_setting( 'solitude_header_color' , array(
		'default' => '#b92b27',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'solitude_header_border_size' , array(
		'default' => 2,
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'solitude_sanitize_border_size',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'solitude_header_color', array(
		'label' => __( 'Header Color' , 'solitude' ),
		'section'  => 'colors',
		'settings' => 'solitude_header_color',
	) ) );

	$wp_customize->add_control( 'solitude_header_border_size' , array(
		'type' => 'number',
		'label' => __( 'Header Color\'s Border Size' , 'solitude' ),
		'section' => 'colors',
	) );

	$wp_customize->get_setting( 'solitude_header_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'solitude_header_border_size' )->transport = 'postMessage';

}
add_action( 'customize_register' , 'solitude_customize_register' );

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
 *
 * @since Solitude 1.0
 */
function solitude_customize_preview_js() {
	wp_enqueue_script( 'solitude-customize-preview', get_theme_file_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'solitude_customize_preview_js' );

/**
 * Sanitize the Bootstrap theme
 *
 * @since Solitude 1.0
 *
 * @param string $input Contains the value selected from customizer.
 */
function solitude_sanitize_bootstrap_themes( $input ) {
	$bt_themes = array( 'default' , 'paper' , 'darkly' , 'lumen' );

	if ( in_array( $input , $bt_themes ) ) {
		return $input;
	}

	return 'default';
}

/**
 * Sanitize the Bootstrap theme varients
 *
 * @since Solitude 1.0
 *
 * @param string $input Contains the value selected from customizer.
 */
function solitude_sanitize_bootstrap_themes_varient( $input ) {
	$bt_varient = array( 'default' , 'inverse' );

	if ( in_array( $input , $bt_varient ) ) {
		return $input;
	}

	return 'default';
}

/**
 * Sanitize the border size in the header
 *
 * @since Solitude 1.0
 *
 * @param int $size Value of the Border size.
 */
function solitude_sanitize_border_size( $size ) {
	$size = absint( $size );
	if ( 20 < $size ) {
		return 20;
	}
	return $size;
}
