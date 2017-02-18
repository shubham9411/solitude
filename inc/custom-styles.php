<?php
/**
 * Contains all the enqueue functions for all the themes
 *
 * @package WordPress
 * @subpackage Solitude
 * @since 1.0
 */

/**
 * Enqueue the selected Bootstrap Theme
 *
 * @since Solitude 1.0
 */
function solitude_bootstrap_styles() {
	$theme = get_theme_mod( 'solitude_bootstrap_themes' , 'default' );
	$file_path = get_theme_file_uri( '/css/bootstrap/' . $theme . '/bootstrap.css' );
	wp_enqueue_style( 'solitude-bootstrap' , $file_path , array() , '3.3.7' , 'all' );
}

add_action( 'wp_enqueue_scripts' , 'solitude_bootstrap_styles' );

/**
 * Add the Custom CSS for custom colors
 *
 * @since Solitude 1.0
 */
function solitude_custom_css() {
	$header_color = get_theme_mod( 'solitude_header_color' , '#fff' );
	$border_size = get_theme_mod( 'solitude_header_border_size' , '2' );
	$style = '
<style type="text/css" media="screen">
	#header{
		border-top: ' . $border_size . 'px solid ' . $header_color . ';
	}
	#site-header-nav{
		border-top: ' . $border_size . 'px solid ' . $header_color . ';
	}
</style>
	';
	echo $style;
}
add_action( 'wp_head' , 'solitude_custom_css' );