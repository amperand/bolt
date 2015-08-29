<?php /** Template Name: Home Page **/
get_header(); ?>

<?php if(have_rows('billboard')):
	echo '<div class="row"><section class="flexslider slideshow columns large-12"><ul class="slides" data-equalizer>';
		while(have_rows('billboard')):the_row();
			$image = wp_get_attachment_image(get_sub_field('image'), 'billboard');
			$title = get_sub_field('title');
			$text = get_sub_field('text');
			$link = get_sub_field('link');
			echo '<li>'.$image.'<div class="billboard-text" data-equalizer-watch><a href="'.$link.'"><h2>'.$title.'</h2>'.$text.'</a></div></li>';
		
		endwhile;
	echo '</ul></section></div>';
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
					echo '<section class="columns medium-4 small-12 featured"><a href="'.$link.'" title="'.$title.'">'.$image.'</a><h3>'.$title.'</h3>'.$text.'<a href="'.$link.'" title="'.$title.'" class="read-more">'.$linktext.'</a></section>';
				endwhile;
			endif;
			
			if(have_rows('accredidations')) {
			echo '<ul id="accreditations">';
				while(have_rows('accredidations')):the_row();
					$logo = wp_get_attachment_image(get_sub_field('logo', 'full'));
					$link = get_sub_field('link');
					echo '<li class="grayscale"><a target="_blank" href="'.$link.'">'.$logo.'</li>';
				endwhile;
			echo '</ul>';
			}
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- #main-content -->

<?php get_footer();
