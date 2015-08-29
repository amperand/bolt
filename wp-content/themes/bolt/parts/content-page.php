<header class="entry-header">
	<h1 class="page-title"><?php the_title();?></h1>
	<?php $subtitle = get_field('sub-title');
	if ($subtitle) {
		echo '<p>'.$subtitle.'</p>';
	} ?>
</header>
<div class="entry-content">
	<?php $standOutText = get_field('stand_out_text_header');
	if ($standOutText) {
		echo '<p class="callout">'.$standOutText.'</p>';
	} 
	the_content();
	if( have_rows('page_content') ):
	    while ( have_rows('page_content') ) : the_row();			
	        if( get_row_layout() == 'content' ):
	        	the_sub_field('content_text');
	        elseif(get_row_layout() == 'button'):
	        	$buttonLink = get_sub_field('button_link');
	        	$buttonText = get_sub_field('button_text');
	        	echo '<a class="button radius" href="'.$buttonLink.'">'.$buttonText.'</a>';
	        elseif(get_row_layout() == 'add_file'):
	        	$fileTitle = get_sub_field('title');
	        	$file = get_sub_field('file_upload');
	        	$fileDesc = get_sub_field('file_description');
	        	echo '<article class="file"><h2>'.$fileTitle.'</h2>'.$fileDesc;
	        	echo '<a class="secondary tiertiary button radius" href="'.$file.'" target="_blank">View '.$fileTitle.'</a></article>';
	        elseif(get_row_layout() == 'team_members_block'):
	        	if(have_rows('team_members'))?>
					<section class="team-members" data-equalizer>
						<?php 
						while(have_rows('team_members')): the_row();
							$picSrc = get_sub_field('pic');
							$pic = wp_get_attachment_image($picSrc, 'thumbnail');
							$name = get_sub_field('name');
							$lastname = get_sub_field('last_name');
							$title = get_sub_field('title');
							$email = get_sub_field('email');
							$bio = get_sub_field('bio');
							?><div class="columns medium-4 small-6 member" data-equalizer-watch><?php echo $pic;?><p><strong><?php echo $name;?>&nbsp;<?php echo $lastname;?></strong></br/><i><?php echo $title;?></i><br/><a class="email-member" href="mailto:<?php echo $email;?>" target="_blank">Email <?php echo $name;?></a></p><?php echo $bio;?></div>
						<?php endwhile;
					echo '</section>';
	        elseif( get_row_layout() == 'accordion_block' ): 
				if(have_rows('accordion'))?>
					<ul class="accordion" data-accordion>
						<?php $i=0;
						while(have_rows('accordion')): the_row();
							$title = get_sub_field('accordion_title');
							$text = get_sub_field('accordion_text');
							echo '<li class="accordion-navigation"><a href="#accordion-'.$i.'">'.$title.'</a><div id="accordion-'.$i.'" class="content">'.$text.'</div></li>';
							$i++;
						endwhile;
					echo '</ul>';
	        endif;
	    endwhile;
	else :
	    // no layouts found
	endif;?>
	
	<?php $subPreview = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );
		//$ti = get_title();
	if($subPreview) { ?>
		<section id="tab-container">
			<ul class="tabs vertical show-for-medium-up" data-tab>
			<?php
			$x=1;
			foreach($subPreview as $page) {
				$ti = get_the_title($page->ID);
				echo '<li class="tab-title"><a href="#panel'.$x.'">'.$ti.'</a></li>';
				$x++;
			}
			echo '</ul>';
			$z=1;
			echo '<div class="tabs-content show-for-medium-up">';
			foreach($subPreview as $page) {
				$perma = get_permalink($page->ID);
				$ti = get_the_title($page->ID);
				$featuredText = get_field('stand_out_text', $page->ID);
				$text = get_field('parent_page_preview_text', $page->ID);?>
				<div id="panel<?php echo $z;?>" class="content">
					<h2><?php echo $ti;?></h2>
					<p class="callout"><?php echo $featuredText;?></p>
					<?php echo $text;?>
					<a class="secondary tiertiary button radius" href="<?php echo $perma;?>">Learn More</a>
				</div>
				<?php $z++;
			}
			echo '</div>';
			
/*
			echo '<section class="show-for-small-only" id="pages-preview">';
			foreach($subPreview as $page) {
				$featuredImage = wp_get_attachment_image(get_field('featured_image', $page->ID), 'thumbnail');
				$perma = get_permalink($page->ID);
				$ti = get_the_title($page->ID);
				$featuredText = get_field('stand_out_text', $page->ID);
				$text = get_field('parent_page_preview_text', $page->ID);?>
				<div class="content preview">
					<div class="columns small-4"><?php echo $featuredImage;?></div>
					<div class="columns small-8">
						<h2><?php echo $ti;?></h2>
						<p class="callout"><?php echo $featuredText;?></p>
						<?php echo $text;?>
						<a class="read-more" href="<?php echo $perma;?>">Learn More</a>
					</div>
				<?php
			}
			echo '</section>';
*/
		
		echo '</section>';
	}?>
</div><!-- .entry-content -->
