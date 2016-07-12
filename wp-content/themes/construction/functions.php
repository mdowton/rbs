<?php

/**
 * Theme functions. Initializes the Vamtam Framework.
 *
 * @package  wpv
 */

require_once( 'vamtam/classes/framework.php' );

new WpvFramework( array(
	'name' => 'construction',
	'slug' => 'construction',
) );

// TODO remove next line when the editor is fully functional, to be packaged as a standalone module with no dependencies to the theme
define( 'VAMTAM_EDITOR_IN_THEME', true ); include_once THEME_DIR . 'vamtam-editor/editor.php';

// only for one page home demos
function wpv_onepage_menu_hrefs( $atts, $item, $args ) {
	if ( 'custom' === $item->type && 0 === strpos( $atts['href'], '/#' ) ) {
		$atts['href'] = $GLOBALS['wpv_inner_path'] . $atts['href'];
	}
	return $atts;
}

if ( ( $path = parse_url( get_home_url(), PHP_URL_PATH ) ) !== null ) {
	$GLOBALS['wpv_inner_path'] = untrailingslashit( $path );
	add_filter( 'nav_menu_link_attributes', 'wpv_onepage_menu_hrefs', 10, 3 );
}

//define needed sidebars_widgets
register_sidebar(
	   array(
	   'id' => "who-1",
	   'name' => "who we work with",
	   'description' => "who we work with pages",
	   'before_widget' => '<section id="%1$s" class="widget %2$s">',
	   'after_widget' => '</section>',
	   'before_title' => apply_filters( 'wpv_before_widget_title', '<h4 class="widget-title">', 'footer' ),
	   'after_title' => apply_filters( 'wpv_after_widget_title', '</h4>', 'footer' ),
	   )
			);

$post_args = array(
          'label'   => __('Case Studies'),
          'labels'  => array(
              'name'    => __('Case Studies'),
              'singular_name'   => __('Case Studies'),
              'edit_item'   => __('Edit Case Study'),
              'add_new' => __('Add New Study')
            ),
          'description' => "Case Studies with downloadable pdf.",
          'public'  => true,
          'has_archive' => true,
          'taxonomies'  => array('category', 'post_tag'),
          'rewrite' => array(
              'slug'    => 'project/case_studies',
              'with_front'  => false,
              'feeds'   => true,
              'pages'   => true
            ),
          'supports'    => array('title', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
          'query_var'   => true
        );
       register_post_type( 'case_studies', $post_args);

function register_case_studies_meta($post_type){
    if(in_array($post_type, array('case_studies'))){
        add_meta_box('downloadable_pdf', 'Downloadable Asset', 'render_case_studies_meta', 'case_studies', 'custom', 'high');
    }
}
add_action('add_meta_boxes', 'register_case_studies_meta');

function render_case_studies_meta($post){
    $value_title = get_post_meta($post->ID, 'case_studies_url', true);
    $value_assets = implode(',',get_post_meta($post->ID, 'case_studies_asset_data', true));
?>
    <input type="text" name="case_studies_asset" id="case_studies_asset" value="<?php echo $value_title; ?>" style="width:50%;min-width:200px;max-width:350px;"><input type="button" id="upload_case_study_asset" value="Add Asset"><input type="hidden" name="case_studies_asset_data" id="case_studies_asset_data" value="<?php echo $value_assets; ?>">
<script>
jQuery(document).ready(function($){
    $('#upload_case_study_asset').click(function(e) {
        jQuery.data(document.body, 'prevElement', $(this).prev());
        jQuery.data(document.body, 'nextElement', $(this).next());
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Asset',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            var image_url = uploaded_image.toJSON().url;
            var asset_id = uploaded_image.toJSON().id;
            var asset_title = uploaded_image.toJSON().filename;
            // Let's assign the url value to the input field
            var inputText = jQuery.data(document.body, 'prevElement');
            var inputId = jQuery.data(document.body, 'nextElement');
            //console.log(imgPreview);
            if(inputText != undefined && inputText != '')
            {
                inputText.val(asset_title); 
                inputId.val(asset_id+','+asset_title+','+image_url);
            }
        });
    });
});
</script>
<?php
}
function move_case_meta(){
    global $post, $wp_meta_boxes;
    
    do_meta_boxes(get_current_screen(), 'custom', $post);
    
    unset($wp_meta_boxes['case_studies']['custom']);
}
add_action('edit_form_after_title', 'move_case_meta');

function save_case_meta($post_id){
    if(!isset($_POST['case_studies_asset'])){
        return;
    }
    $asset_url = sanitize_text_field($_POST['case_studies_asset']);
    $asset_data = explode(',',$_POST['case_studies_asset_data']);
    update_post_meta($post_id, 'case_studies_url', $asset_url);
    update_post_meta($post_id, 'case_studies_asset_data', $asset_data);
}
add_action('save_post', 'save_case_meta');