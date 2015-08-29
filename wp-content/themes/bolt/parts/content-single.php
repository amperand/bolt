<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php $titlePreamble = get_field('title-preamble');
		if($titlePreamble) {
			echo '<h2 class="title-preamble">'.$titlePreamble.'</h2>';
		} ?>
		<h1 class="page-title"><?php the_title();?></h1>
	</header>
	<div class="entry-content">
		<?php the_content();
			edit_post_link( __( 'Edit', '' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->