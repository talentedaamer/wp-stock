<?php
/**
 * The header for our theme.
 * @package wp-stock
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wp--stock--topbar">
	<div class="container container__topbar">
		<div class="row row__topbar">
			<div class="col-sm-6 col__left__topbar">
				<?php
				$message = 'Demo Store ! all product are for demo purpose';
				if ( !empty($message))
					echo "<p>{$message}</p>";
				?>
			</div>
			<div class="col-sm-6 col__right__topbar">
				<div class="topbar__menu">
					<ul class="nav nav-pills navbar-right">
						<li role="presentation" class="active"><a href="#">My Account</a></li>
						<li role="presentation"><a href="#">Wishlist</a></li>
						<li role="presentation"><a href="#">Cart [ 2 items - $50 ]</a></li>
					</ul>
				</div>
				<!--topbar__menu-->
			</div>
		</div>
		<!--row__topbar-->
	</div>
	<!--container__topbar-->
</div>
<!--wp--stock--topbar-->

<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wp-stock' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
