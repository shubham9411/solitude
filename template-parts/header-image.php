<?php
/**
 * Display Custom Header images
 *
 * @package WordPress
 * @subpackage Solitude
 * @since 1.0
 * @version 1.0
 */

?><div class="custom-header-media">

	<img src="<?php header_image(); ?>" class="img-responsive custom-header-image" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

</div>
