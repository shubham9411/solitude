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
*/?><!DOCTYPE html>
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
			<a class="skip-link sr-only screen-reader-text" href="#content"><?php _e( 'Skip to content', 'solitude' ); ?></a>
			<header id="header" class="">
				<nav class="navbar navbar-fixed-top">
					<div class="container">
						<div class="navbar-header">
							<div class="navbar-inverse nav-icon">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-menu" aria-expanded="false" aria-controls="navbar">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</div>
						<div id="top-menu" class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right">
								
							</ul>
							<?php
							   /**
								* Displays a navigation menu
								* @param array $args Arguments
								*/
								$args = array(
									'theme_location' => 'top',
									'container' => 'ul',
									'menu_class' => 'nav navbar-nav navbar-right',
									'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
									'depth' => 1,
									'walker' => ''
								);
								wp_nav_menu( $args );
								?>
						</div><!--/.nav-collapse -->
					</div>
				</nav>
			</header><!-- /header -->
			<div class="site-content-contain">
				<div id="content" class="site-content">