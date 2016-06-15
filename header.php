<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package p619
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'p619' ); ?></a>

	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="true"><?php esc_html_e( 'Primary Menu', 'p619' ); ?></button>
	<div class="menu-toggle" aria-controls="primary-menu" aria-expanded="true"><?php esc_html_e( 'Primary Menu', 'p619' ); ?></button>
	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="site-branding">
				<?php
				$corporate_logo = get_theme_mod("corporate_logo", false);
				if ( ! $corporate_logo ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $corporate_logo ?>" id="corporate_logo"></a></h1>
				<?php
				endif;

				$description = get_bloginfo( 'description', false );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="true"><?php esc_html_e( 'Primary Menu', 'p619' ); ?></button>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
