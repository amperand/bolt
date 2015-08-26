<header class="entry-header">
	<?php 
	if($post->post_parent){
		$parentTitle = get_the_title($post->post_parent);
		$parentLink = get_permalink($post->post_parent); ?>
		<nav id="breadcrumbs">
			<ul>
				<li><a href="<?= site_url();?>">Home</a></li>
				<li><a href="<?php echo $parentLink;?>"><?php echo $parentTitle;?></a></li>
				<li><a href="#"><?php the_title();?></a></li>
			</ul>
		</nav>
	<?php } else { ?>
	  <nav id="breadcrumbs">
	  	<ul>
		  	<li><a href="<?php echo site_url();?>">Home</a></li>
		  	<li><a href="#"><?php the_title();?></a></li>
		</ul>
	  </nav>
	<?php }	?>
	<h1 class="page-title"><?php the_title();?></h1>
</header>
<?php $featuredImage = wp_get_attachment_image(get_field('featured_image'), 'featuredImage');
if($featuredImage) {
	echo $featuredImage;
} 
$subtitle = get_field('sub_title');
if ($subtitle) {
	echo '<p class="subtitle">'.$subtitle.'</p>';
}
?>
<div class="entry-content">
	<?php the_content();
	if( have_rows('page_content') ):
	    while ( have_rows('page_content') ) : the_row();			
	        if( get_row_layout() == 'content' ):
	        	the_sub_field('content_text');
	        elseif(get_row_layout() == 'button'):
	        	$buttonLink = get_sub_field('button_link');
	        	$buttonText = get_sub_field('button_text');
	        	echo '<a class="button round" href="'.$buttonLink.'">'.$buttonText.'</a>';
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
</div><!-- .entry-content -->
