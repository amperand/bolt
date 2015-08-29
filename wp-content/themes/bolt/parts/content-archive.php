<article id="post-<?php the_ID(); ?>" class="post-excerpt">
	<?php $featuredImage = wp_get_attachment_image(get_field('featured_image'), 'featuredImage');
		if($featuredImage) {
			echo '<div class="columns medium-12">'.$featuredImage.'</div>';
		} ?>
	<div class="entry-content columns medium-12">
		<header class="excerpt-header">
			<a href="<?php the_permalink();?>" title="<?php the_title();?>">
				<h2><?php the_title();?></h2>
			</a>
		</header>
		<?php the_excerpt();?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
