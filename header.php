<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php if ( get_theme_mod( 'site_socials' ) == 1 ): ?>
	<div class="site-socials">
		<?php get_template_part( 'part', 'social-icons' ); ?>
	</div>
<?php endif; ?>

<div id="page">

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<header id="masthead" class="site-header group fixed" role="banner" itemscope="itemscope" itemtype="http://schema.org/Organization">
					<div class="container">
						<div class="site-logo">
							<h1 itemprop="name">
								<a itemprop="url" href="<?php echo esc_url( home_url() ); ?>">
									<?php if ( get_theme_mod( 'logo', get_template_directory_uri() . '/images/logo.png' ) ): ?>
										<img itemprop="logo"
												src="<?php echo esc_url( get_theme_mod( 'logo', get_template_directory_uri() . '/images/logo.png' ) ); ?>"
												alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>
									<?php else: ?>
										<?php bloginfo( 'name' ); ?>
									<?php endif; ?>
								</a>
							</h1>

							<?php if ( get_bloginfo( 'description' ) ): ?>
								<!-- <h2 class="tagline"><?php bloginfo( 'description' ); ?></h2> -->
							<?php endif; ?>
							<?php include 'searchform.php';?>
						</div><!-- /site-logo -->

						<div class="site-bar group">
							<nav class="nav" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
								<?php wp_nav_menu( array(
									'theme_location' => 'main_menu',
									'container'      => '',
									'menu_id'        => '',
									'menu_class'     => 'navigation'
								) ); ?>

								<a class="mobile-nav-trigger" href="#mobilemenu"><i class="fa fa-navicon"></i> <?php esc_html_e( 'Menu', 'olsen-light' ); ?></a>
							</nav>
							<div id="mobilemenu"></div>
						</div><!-- /site-bar -->
					<div>
				</header>

				<?php if ( is_home() ) {
					get_template_part( 'part', 'slider' );
				} ?>

				<div id="site-content">
