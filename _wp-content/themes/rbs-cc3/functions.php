<?php
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(  837, 330, true ); // Normal post thumbnails
	add_image_size( 'single-post-thumbnail', 837 , 330 ); // Permalink thumbnail size

if(!is_admin()){
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery'), '1.0.0', false );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'), '1.3.0', false );
	wp_enqueue_script( 'curvy-corners', get_template_directory_uri() . '/js/curvycorners.js', array('jquery'), '1.0.0', false );
}

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "";
  }
  return $first_img;
}

	
	// Add RSS links to <head> section
	automatic_feed_links();
	/*
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	*/
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Newsletters',
		'menu_title'	=> 'Newsletters',
		'menu_slug' 	=> 'newsletters',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
		
	
}

add_action('wp_head','popcorn_js');

function popcorn_js()
{ // break out of php ?>
<script type="text/javascript">
function _pcm(u){
setTimeout(function(){
 var d=document, p="//desv383oqqc0.cloudfront.net/",
 s=d.createElement("script");s.type="text/javascript";s.async=true;s.src=p+u+".js";
 var e = d.getElementsByTagName("script")[0]; e.parentNode.insertBefore(s,e);
}, 1);}_pcm("54be0f2d2d2c8c030000001d");
</script>
<?php } // break back into php



add_action('wp_head','ga_js');

function ga_js()
{ // break out of php ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-36520015-1', 'auto');
  ga('send', 'pageview');

</script>
<?php } // break back into php


function mv_browser_body_class($classes) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if($is_lynx) $classes[] = 'lynx';
        elseif($is_gecko) $classes[] = 'gecko';
        elseif($is_opera) $classes[] = 'opera';
        elseif($is_NS4) $classes[] = 'ns4';
        elseif($is_safari) $classes[] = 'safari';
        elseif($is_chrome) $classes[] = 'chrome';
        elseif($is_IE) {
                $classes[] = 'ie';
                if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
                $classes[] = 'ie'.$browser_version[1];
        } else $classes[] = 'unknown';
        if($is_iphone) $classes[] = 'iphone';
        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
                 $classes[] = 'osx';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
                 $classes[] = 'linux';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
                 $classes[] = 'windows';
           }
        return $classes;
}
add_filter('body_class','mv_browser_body_class');

?>