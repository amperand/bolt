<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area row">
		<div id="content" class="site-content columns medium-8" role="main">
			<header class="entry-header">
				<h1 class="page-title">Sorry, we can't find what you're looking for.</h1>
			</header>
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', '' ); ?></p>

				<?php get_search_form(); ?>

		</div><!-- #content -->
		<div id="content-sidebar" class="content-sidebar widget-area columns medium-4" role="complementary">
			<?php  dynamic_sidebar('default-sidebar'); ?>
		</div>
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_footer();
