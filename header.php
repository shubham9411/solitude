<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Solitude
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<a class="skip-link sr-only screen-reader-text" href="#content"><?php _e( 'Skip to content', 'solitude' ); // WPCS: xss ok. ?></a> 
			<header id="header" class="">

				<?php if ( has_nav_menu( 'top' ) ):
					get_template_part( 'template-parts/header' , 'navigation' );
				endif; ?>

			</header><!-- /header -->

			<div class="site-content-contain">
				<div id="content" class="site-content">
