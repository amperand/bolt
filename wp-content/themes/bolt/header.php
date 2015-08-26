<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Lora:400,400italic|PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
		<!--[if lt IE 9]>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		  <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
		  <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
		<![endif]-->

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div id="wrap">
	
	<header id="masthead" class="site-header" role="banner">
		<section class="header-main row">
			<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1><?php bloginfo( 'name' ); ?></h1><img src="<?php bloginfo('stylesheet_directory');?>/img/bolt-express.png" alt="Bolt Express"></a>

			<nav id="primary-navigation" class="site-navigation primary-navigation columns medium-7 hide-for-small-only" role="navigation">
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false, 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
			<div class="search-toggle columns medium-1">
				<a href="#search-container" class="screen-reader-text" aria-expanded="false" aria-controls="search-container"><?php _e( 'Search',''); ?></a>
			</div>
			<button class="menu-toggle hide-for-medium-up"><img src="<?php bloginfo('stylesheet_directory');?>/img/menu-toggle.png" alt="Menu Toggle"/></button>
		</section>
		<section class="row">
			<nav id="mobile-navigation" class="site-navigation mobile-navigation columns small-12 small-collapse hide-for-medium-up" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' =>'main-menu', 'container' => false, 'menu_class' => 'nav-menu', 'menu_id' => 'mobile-menu')); ?>
			</nav>
		</section>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
