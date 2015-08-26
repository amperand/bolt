<?php /** Template Name: Home Page **/
get_header(); ?>

<?php if(have_rows('billboard')):
	echo '<section class="flexslider slideshow"><ul class="slides">';
		while(have_rows('billboard')):the_row();
			$image = wp_get_attachment_image(get_sub_field('image'), 'billboard');
			$title = get_sub_field('title');
			$text = get_sub_field('text');
			$link = get_sub_field('link');
			echo '<li><div class="row"><div class="columns large-7"><a href="'.$link.'"><h2>'.$title.'</h2><p>'.$text.'</p></a></div></div><a href="'.$link.'">'.$image.'</a></li>';
		
		endwhile;
	echo '</ul></section>';
endif; ?>



<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content row" role="main">
			<?php if(have_rows('featured_sections')):
				while(have_rows('featured_sections')):the_row();
					$image = wp_get_attachment_image(get_sub_field('pic', 'thumbnail'));
					$title = get_sub_field('title');
					$text = get_sub_field('text');
					$link = get_sub_field('link');
					$linktext = get_sub_field('link_text');
					echo '<section class="columns small-4"><a href="'.$link.'" title="'.$title.'">'.$image.'</a><h3>'.$title.'</h3>'.$text.'<a href="'.$link.'" title="'.$title.'" class="read-more">'.$linktext.'</a></section>';
				endwhile;
			endif;?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_footer();
