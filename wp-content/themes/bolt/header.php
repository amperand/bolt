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
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic%7CRoboto+Condensed:400,700' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
<!--[if lt IE 9]>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		  <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
		  <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
		   <link href='<?php echo get_template_directory_uri();?>/css/my-ie8.css' rel='stylesheet' type='text/css'>
		<![endif]-->

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<div id="wrap">
<header id="masthead" class="site-header" role="banner">
    <section class="header-main row"> <a class="site-title columns medium-3 small-6" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <h1>
            <?php bloginfo( 'name' ); ?>
        </h1>
        <img src="<?php bloginfo('stylesheet_directory');?>/img/bolt-express.png" alt="Bolt Express"></a>
        <nav id="primary-navigation" class="site-navigation primary-navigation columns medium-9 hide-for-small-only hide-for-medium-only" role="navigation"> <a class="screen-reader-text skip-link" href="#content">
            <?php _e( 'Skip to content', '' ); ?>
            </a> <span id="phplive_btn_1441730106" onclick="phplive_launch_chat_0(0)" style="color: #0000FF; text-decoration: underline; cursor: pointer;" class="right chat-btn"></span> 
            <script type="text/javascript">
 
(function() {
var phplive_e_1441730106 = document.createElement("script") ;
phplive_e_1441730106.type = "text/javascript" ;
phplive_e_1441730106.async = true ;
phplive_e_1441730106.src = "//www.bolt-express.com/phplive/js/phplive_v2.js.php?v=0|1441730106|0|" ;
document.getElementById("phplive_btn_1441730106").appendChild( phplive_e_1441730106 ) ;
})() ;
 
</script> 
            <a href="#" data-reveal-id="modal-1" class="button radius secondary right">Track</a>
            <div id="modal-1" class="reveal-modal" data-reveal aria-labelledby="modalTitle1" aria-hidden="true" role="dialog">
                <iframe src="https://www11.sylectus.com/V10_anonorderview.asp?mabcode=610&amp;pronum=" frameborder="0" width="100%" height="100%"></iframe>
            </div>
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false, 'menu_class' => 'nav-menu right', 'menu_id' => 'primary-menu' ) ); ?>
        </nav>
        <button class="menu-toggle hide-for-large-up"><img src="<?php bloginfo('stylesheet_directory');?>/img/menu-toggle.png" alt="Menu Toggle"/></button>
    </section>
    <section class="row">
        <nav id="mobile-navigation" class="site-navigation mobile-navigation columns small-12 small-collapse hide-for-large-up" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' =>'main-menu', 'container' => false, 'menu_class' => 'nav-menu', 'menu_id' => 'mobile-menu')); ?>
        </nav>
    </section>
</header>
<!-- #masthead -->

<div id="main" class="site-main">
