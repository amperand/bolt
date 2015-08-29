<?php get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area row">
		<?php $featuredImage = wp_get_attachment_image(get_field('featured_image'), 'featuredImage');
		if($featuredImage) {
			echo '<div class="columns large-12">'.$featuredImage.'</div>';
		}?>
		<div id="content" class="site-content columns medium-8" role="main">HELLO
			<?php
				while ( have_posts() ) : the_post();
					include('parts/content-single.php');
				endwhile;
			?>
		</div><!-- #content -->
		<?php get_sidebar('content'); ?>
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_footer();
