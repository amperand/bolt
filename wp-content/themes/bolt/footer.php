	</div><!-- #main -->
  </div><!-- #wrap-->
</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<section class="row">
		<div class="columns medium-4">
			<a href="<?= site_url();?>"><img src="<?php bloginfo('stylesheet_directory');?>/img/bolt-express-foot.png"></a>
		</div>
		<div class="columns medium-8">
			<?php wp_nav_menu( array('theme_location' => 'footer-menu', 'menu_class' => 'nav-menu', 'menu_id' => 'footer-menu')); ?>
		</div>
</footer><!-- #colophon -->


	<?php wp_footer(); ?>
	
	<script type="text/javascript">
		jQuery(document).foundation();
		 
		jQuery(window).load(function(){
		    jQuery('.flexslider.slideshow').flexslider({
			  	animation: "slide",
		        controlNav: false,
		        //slideshow: false,
		        animationLoop: true,
		        start: function(slider){
		          jQuery('body').removeClass('loading');
		          var thisSlide = slider.slides.eq(slider.currentSlide + 1);
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

			jQuery('.menu-toggle').click(function(){
				jQuery('.mobile-navigation').toggleClass('active');
				jQuery('#mobile-navigation .nav-menu').slideToggle();
			})

		});
/*
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > 1){  
			    jQuery('#masthead').addClass("sticky");
			    jQuery('#masthead .hide-for-large-up .menu-main-container').slideUp('fast');
			  }
			  else{
			    jQuery('#masthead').removeClass("sticky");
			  }
		});
*/

	</script>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/foundation-8-fix/rem.js"></script>
 	 <![endif]-->
</body>
</html>