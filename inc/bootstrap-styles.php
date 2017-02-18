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
