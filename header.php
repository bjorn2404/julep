<?php
/**
 * Theme header
 *
 * @package julep
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>
<div id="page" class="page hfeed site">

	<header id="masthead" class="site__header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<div class="site__header__branding">
			<div class="site__header__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
			<div class="site__header__description"><?php bloginfo( 'description' ); ?></div>
		</div>

		<nav id="primary-nav" class="site__header__nav" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<?php
			wp_nav_menu( array( 'theme_location' => 'primary-navigation' ) );
			?>

		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<main id="main" class="site__main" role="main">
