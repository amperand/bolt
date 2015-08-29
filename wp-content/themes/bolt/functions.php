<?php
	
function my_custom_login_logo() {
    echo '<style type="text/css">
        .login h1 a { background-image:url('.get_bloginfo('stylesheet_directory').'/img/custom-login-logo.png) !important;width:203px;height:44px;background-size:203px 44px;padding-left:11px; }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');

// load scripts and styles
function wpb_adding_scripts() {	
	wp_register_script('foundation',get_stylesheet_directory_uri().'/js/foundation.min.js',array('jquery'));
	wp_register_script('equalizer',get_stylesheet_directory_uri().'/js/foundation/foundation.equalizer.js',array('jquery'));
	wp_register_script('flexslide', get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'));
	//wp_register_script('modal',get_stylesheet_directory_uri().'/js/foundation/foundation.reveal.js', array('jquery'));
	
	wp_enqueue_script('foundation');
	wp_enqueue_script('equalizer');
	wp_enqueue_script('flexslide');
	//wp_enqueue_script('modal');
	
    wp_register_style('normalize',get_stylesheet_directory_uri().'/css/normalize.css');
    wp_register_style('foundation',get_stylesheet_directory_uri().'/css/foundation.min.css');
    wp_register_style('flexsliderstyle',get_stylesheet_directory_uri().'/css/flexslider.css');
    wp_register_style('stylefonts',get_stylesheet_directory_uri().'/fonts/stylesheet.css');
    wp_register_style('style',get_stylesheet_directory_uri().'/css/style.css');

    wp_enqueue_style('normalize');
    wp_enqueue_style('foundation');
    wp_enqueue_style('stylefonts');
    wp_enqueue_style('flexsliderstyle');
    wp_enqueue_style('style');
}

add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' ); 

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __('Footer Menu')
    )
  );
}
add_action( 'init', 'register_my_menus' );

// set number of archive  months to show
function my_limit_archives( $args ) {
    $args['limit'] = 5;
    return $args;
}
add_filter( 'widget_archives_args', 'my_limit_archives' );

function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( '... Read More', 'your-text-domain' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// add ACF Options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}

// create dynamic sidebars
function sidebar_widgets_init() { //Register the default sidebar
	register_sidebar( array(
		 'name' => 'Default Sidebar',
		 'id' => 'default-sidebar',
		 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		 'after_widget' => '</aside>',
		 'before_title' => '<h3 class="widget-title">',
		 'after_title' => '</h3>',
	));
	 
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
	if (is_plugin_active('advanced-custom-fields-pro/acf.php')){ //Check to see if ACF is installed
		 	if (have_rows('sidebars','options')){
		 		while (have_rows('sidebars','options')):the_row(); //Loop through sidebar fields to generate custom sidebars
					 $s_name = get_sub_field('sidebar_name','options');
					 $s_id = str_replace(" ", "-", $s_name); // Replaces spaces in Sidebar Name to dash
					 $s_id = strtolower($s_id); // Transforms edited Sidebar Name to lowercase
					 register_sidebar( array(
						 'name' => $s_name,
						 'id' => $s_id,
						 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						 'after_widget' => '</aside>',
						 'before_title' => '<h3 class="widget-title">',
						 'after_title' => '</h3>',
					 ));
 				endwhile;
 			};
 	}
}
add_action( 'widgets_init', 'sidebar_widgets_init' );

/*
* ACF Sidebar Loader
*/
function my_acf_load_sidebarRepeater( $field ) {
 // reset choices
 $field['choices'] = array();
 $field['choices']['default-sidebar'] = 'Default Sidebar';
 $field['choices']['none'] = 'No Sidebar';
 // load repeater from the options page
 if(get_field('sidebars', 'options')) {
	 // loop through the repeater and use the sub fields "value" and "label"
	 while(has_sub_field('sidebars', 'options')) {
		 $label = get_sub_field('sidebar_name');
		 $value = str_replace(" ", "-", $label);
		 $value = strtolower($value);
		 $field['choices'][ $value ] = $label;
	}
 }
 // Important: return the field
 return $field;
}
add_filter('acf/load_field/name=multi_select_a_sidebar', 'my_acf_load_sidebarRepeater');

////// Creating the widget 
class Custom_Text_Link extends WP_Widget {
	function Custom_Text_Link() {
		parent::WP_Widget(false, "Title, Picture, Text and Link Widget");
	}
	function update($new_instance, $old_instance) {  
		return $new_instance;  
	}  
	function form($instance){  
		$title = esc_attr($instance["title"]);  
		echo "<br />";
	}
	function widget($args, $instance) {
		$widget_id = "widget_" . $args["widget_id"];
		$title = get_field('title', $widget_id);
		$text = get_field('text',  $widget_id);
		$imageSrc = get_field('picture', $widget_id);
		$imageSize = get_field('image_size',$widget_id);
		$image = wp_get_attachment_image($imageSrc,$imageSize);
		$useLink = get_field('add_link', $widget_id);
		$btnStyle = get_field('choose_button_style', $widget_id);
		$linkText = get_field('link_text', $widget_id);
		$link = get_field('link', $widget_id);?>
		<article class="widget title-text-pic" id="<?php echo $widget_id;?>">
			<?php if($title) { echo '<h3 class="widget-title">'.$title.'</h3>';}
			if($imageSrc) {echo $image;}
			if($text) {echo $text;}
			if($useLink == "Yes") {
				echo '<a class="'.$btnStyle.'" href="'.$link.'">'.$linkText.'</a>';
			} ?>
		</article>
 	<?php }
}
register_widget("Custom_Text_Link");

class BigButton extends WP_Widget {
	function BigButton() {
		parent::WP_Widget(false, "Big Button");
	}
	function update($new_instance, $old_instance) {  
		return $new_instance;  
	}  
	function form($instance){  
		$title = esc_attr($instance["title"]);  
		echo "<br />";
	}
	function widget($args, $instance) {
		$widget_id = "widget_" . $args["widget_id"];?>
		<article class="widget secondary-button" id="<?php echo $widget_id;?>">
			<?php $title = get_field('widget_title',$widget_id);
			if($title) {
				echo '<h3 class="widget-title">'.$title.'</h3>';
			}
			while(have_rows('button',$widget_id)):the_row();
				$linkText = get_sub_field('link_text');
				$linkTo = get_sub_field('link_to');	
				$link = get_sub_field('link');
				$linkoffsite = get_sub_field('link_offsite');
				if($linkTo = 'Page on this website') {
					echo '<a class="button radius secondary" href="'.$link.'">'.$linkText.'</a>';
				} else {
					echo '<a class="button radius secondary" href="'.$linkoffsite.'" target="_blank">'.$linkText.'</a>';
				}		
			endwhile;?>
		</article>
 	<?php }
}
register_widget("BigButton");


// unregister widgets 
function unregister_default_widgets() {     
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Recent_Comments');    
	unregister_widget('WP_Widget_RSS');     
	unregister_widget('WP_Widget_Tag_Cloud'); 
	unregister_widget('WP_Widget_Meta');
	unregister_widget('Advanced_Pages_Widget_widgetized'); //advanced pages
	unregister_widget('Button_Creator_Widget_widgetized'); //advanced button
} 
add_action('widgets_init', 'unregister_default_widgets', 11);



// deliver responsive images
function custom_theme_setup() {
    add_theme_support( 'advanced-image-compression' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' ); 


add_image_size('billboard', 1000, 487, true );
add_image_size('featuredImage', 1000, 391, true );