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
		        start: function(){
		          jQuery('.slideshow').removeClass('loading');
		          jQuery('.slideshow .slides').first('li').fadeIn();
		          jQuery('.slideshow .slides > li').show();
		          jQuery(document).foundation('equalizer', 'reflow');
		        },
		    });
		});
		jQuery(document).ready(function() {
			
			jQuery('[placeholder]').focus(function() {
			  var input = jQuery(this);
			  if (input.val() == input.attr('placeholder')) {
			    input.val('');
			    input.removeClass('placeholder');
			  }
			}).blur(function() {
			  var input = jQuery(this);
			  if (input.val() == '' || input.val() == input.attr('placeholder')) {
			    input.addClass('placeholder');
			    input.val(input.attr('placeholder'));
			  }
			}).blur();

			
			jQuery(document).foundation('equalizer', 'reflow');
			jQuery('.menu-toggle').click(function(){
				jQuery('.mobile-navigation').toggleClass('active');
				jQuery('#mobile-navigation .nav-menu').slideToggle();
			});
			function setMainMargin() {
				$mastheadHeight = jQuery('#masthead .header-main').height()+40;
				jQuery('#main').css('margin-top',$mastheadHeight);
			}
			setMainMargin();
			jQuery(window).resize(function() {
				setMainMargin();
			});
			jQuery('iframe').wrap('<div class="iframe-contain"></div>');
			jQuery('.accordion > li').on('click', function() {
			  jQuery('li.active').find('.content').slideUp('slow', function() {
			    jQuery(document).foundation('equalizer', 'reflow');
			  });
			  if(!jQuery(this).hasClass('active')) {
			    jQuery(this).find('.content').slideToggle('slow', function() {
			      jQuery(document).foundation('equalizer', 'reflow');
			    });
			  };
			});
		});