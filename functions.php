<?php
/**
 * Solitude functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Solitude
 * @since 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Solitude 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 700;
}

if ( ! function_exists( 'solitude_scripts' ) ) {
	/**
	 * Enqueue scripts and styles
	 */
	function solitude_scripts() {
		wp_enqueue_style( 'solitude-style' , get_stylesheet_uri() , array( 'solitude-bootstrap' ) , '1.0' , 'all' );
		wp_enqueue_script( 'solitude-main' , get_theme_file_uri( '/js/main.js' ) , array( 'jquery' ) , '1.0' , true );
		wp_enqueue_script( 'solitude-bootstrap-js' , get_theme_file_uri( '/js/bootstrap.js' ) , array( 'jquery' ) , '3.3.7' , true );
	}

	add_action( 'wp_enqueue_scripts' , 'solitude_scripts' );

}


if ( ! function_exists( 'solitude_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 *
	 * @since Solitude 1.0
	 */
	function solitude_setup() {

		load_theme_textdomain( 'solitude' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'custom-background' );

		register_nav_menus( array(
			'top'    => __( 'Top Menu', 'solitude' ),
			'social' => __( 'Social Links Menu', 'solitude' ),
		) );

		// Add theme support for Custom Logo.
		add_theme_support( 'custom-logo', array(
			'width'          => 100,
			'height'         => 100,
			'flex-width'     => true,
			'flex-height'    => true,
		) );

		add_image_size( 'solitude-thumbnail-avatar', 100, 100, true );

		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
		) );

		$args = array(
			'default-image'          => get_template_directory_uri() . '/img/default-header.png',
			'width'                  => 2000,
			'height'                 => 1200,
			'video'                  => false,
			'flex-width'             => true,
			'flex-height'            => true,
			'header-text'            => false,
		);

		$args = apply_filters( 'mr_robot_custom_header_args', $args );

		add_theme_support( 'custom-header' , $args );

		add_editor_style( array( 'css/editor-style.css' ) );

	}

	add_action( 'after_setup_theme', 'solitude_setup' );

endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function solitude_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'solitude' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'solitude' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'solitude_widgets_init' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Solitude 1.0
 */
function solitude_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'solitude_javascript_detection', 0 );

/**
 * Include Walker Classes for the Navigation
 */
require( get_template_directory() . '/inc/walker-nav.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Bootstrap Themes
 */
require get_parent_theme_file_path( '/inc/custom-styles.php' );

/**
 * Bootstrap Themes
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );
