	</div><!-- #main -->
  </div><!-- #wrap-->
</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<section class="row">
		<div class="columns large-4 medium-3 small-12">
			<a href="<?= site_url();?>"><img src="<?php bloginfo('stylesheet_directory');?>/img/bolt-express-foot.png" id="logo"></a>
		</div>
		<div class="columns large-8 medium-9 small-12">
			<?php wp_nav_menu( array('theme_location' => 'footer-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'footer-menu')); ?>
		</div>
</footer><!-- #colophon -->


	<?php wp_footer(); ?>
	
	<script type="text/javascript">
		jQuery(document).foundation();
		 
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
		    jQuery('.tabs > li:first, .tabs-content .content:first').addClass('active');
		});
		jQuery(document).ready(function() {

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