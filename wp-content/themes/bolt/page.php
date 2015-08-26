<?php get_header(); ?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		//get_template_part( 'featured-content' );
	}
?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post();
				include('parts/content-page.php' );
			endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar('content'); ?>
</div><!-- #main-content -->

<?php get_footer();
