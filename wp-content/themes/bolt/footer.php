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
	
	<script type="text/javascript">
		jQuery(document).foundation({
			equalizer: {
				equalize_on_stack:true
			}
		});
		jQuery('.tabs > li:first, .tabs-content .content:first').addClass('active');
		jQuery(window).load(function(){
		    jQuery('.flexslider.slideshow').flexslider({
			  	animation: "slide",
		        //slideshow: false,
		        animationLoop: true,
		        start: function(slider){
		          jQuery('body').removeClass('loading');
		          var thisSlide = slider.slides.eq(slider.currentSlide + 1);
		        },
		        start: function(slider){
		          jQuery('body').removeClass('loading');
		          jQuery('.slideshow .slides').first('li').fadeIn();
		          jQuery('.slideshow .slides > li').show();
		          jQuery(document).foundation('equalizer', 'reflow');
		        },
				before: function(slider){
					var thisSlide = slider.slides.eq(slider.currentSlide);
					jQuery(thisSlide).removeClass('fromRight');
					
			    	var animateSlide = slider.slides.eq(slider.animatingTo);
					jQuery(animateSlide).addClass('fromRight');
				},
				after: function(slider){
					var thisSlide = slider.slides.eq(slider.currentSlide);
					jQuery(slider).find('li').not(thisSlide).removeClass('toLeft');
				},
		    });
		});
		jQuery(document).ready(function() {
			jQuery(document).foundation('equalizer', 'reflow');
			jQuery('.menu-toggle').click(function(){
				jQuery('.mobile-navigation').toggleClass('active');
				jQuery('#mobile-navigation .nav-menu').slideToggle();
			})
			function setMainMargin() {
				$mastheadHeight = jQuery('#masthead .header-main').height()+40;
				jQuery('#main').css('margin-top',$mastheadHeight);
			}
			setMainMargin();
			jQuery(window).resize(function() {
				setMainMargin();
			});
			jQuery('iframe').wrap('<div class="iframe-contain"></div>');
		});


	</script>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/foundation-8-fix/rem.js"></script>
 	 <![endif]-->
</body>
</html>