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
	$border_size = absint( get_theme_mod( 'solitude_header_border_size' , '2' ) );
	$css = '
/**
 * Solitude: Color Patterns
 *
 */
 #header{
	border-top: ' . $border_size . 'px solid ' . $header_color . ';
}
#site-header-nav{
	border-top: ' . $border_size . 'px solid ' . $header_color . ';
}'; 
	/**
	 * Filters Solitude custom colors CSS.
	 *
	 * @since Solitude 1.0
	 *
	 * @param $border_size int The user's selected color hue.
	 * @param $css         string Base theme colors CSS.
	 */
	return apply_filters( 'solitude_custom_css' , $border_size , $css );
}

/**
 * Display custom color CSS.
 */
function solitude_colors_css_wrap() {
?>
	<style type="text/css">
		<?php echo solitude_custom_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'solitude_colors_css_wrap' );
