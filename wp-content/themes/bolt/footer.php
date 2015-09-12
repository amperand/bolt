	</div><!-- #main -->
  </div><!-- #wrap-->
</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php $frontpage_id = get_option('page_on_front'); 
	if(have_rows('accredidations', $frontpage_id)) {
	echo '<section class="row"><div class="center-kid"><ul id="accreditations">';
		while(have_rows('accredidations', $frontpage_id)):the_row();
			$logo = get_sub_field('logo', $frontpage_id);
			$link = get_sub_field('link', $frontpage_id);
			echo '<li class="grayscale"><a target="_blank" href="'.$link.'"><img src="'.$logo.'" alt=""></a></li>';
		endwhile;
	echo '</ul></div></section>';
	} ?>
  <header id="foot">
	<section class="row">
		<div class="columns large-4 medium-3 small-12">
			<a href="<?= site_url();?>"><img src="<?php bloginfo('stylesheet_directory');?>/img/bolt-express-foot.png" id="logo"></a>
		</div>
		<div class="columns large-8 medium-9 small-12">
			<?php wp_nav_menu( array('theme_location' => 'footer-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'footer-menu')); ?>
		</div>
	</section>
  </header>
</footer><!-- #colophon -->


	<?php wp_footer(); ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/actions.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/foundation-8-fix/rem.js"></script>
 	 <![endif]-->
</body>
</html>