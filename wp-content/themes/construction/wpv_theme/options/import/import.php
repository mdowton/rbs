<?php

/**
 * Theme options / Import / Quick Import
 *
 * @package wpv
 * @subpackage construction
 */

$revslider = function_exists( 'is_plugin_active' ) && is_plugin_active( 'revslider/revslider.php' );

return array(

array(
	'name'   => __( 'Quick Import', 'construction' ),
	'type'   => 'start',
	'nosave' => true,
),

array(
	'name'    => __( 'What is included in the content import?', 'construction' ),
	'desc'    => __( 'Importing the demo content will give you slider, pages, posts, theme options, widgets, sidebars and other settings. This will replicate the live demo website. Please make sure you have the plugins that come with the theme installed and activated to receive their portion of the demo content. It can take up to a minute to complete after clicking on the button, so please do not click more than once.', 'construction' ),
	'type'    => 'info',
	'visible' => true,
),

array(
	'name'  => __( 'Content Import', 'construction' ),
	'desc'  => __( 'You are advised to use this importer only on new WordPress sites.', 'construction' ),
	'title' => __( 'Import Dummy Content', 'construction' ),
	'link'  => wp_nonce_url( admin_url( 'admin.php?import=wpv&step=2&file=' . WPV_THEME_SAMPLE_CONTENT ), 'wpv-import' ),
	'type'  => 'button',
),

array(
	'name'  => __( 'Widget Import', 'construction' ),
	'desc'  => __( 'Using this importer will overwrite your current sidebar settings', 'construction' ),
	'title' => __( 'Import Widgets', 'construction' ),
	'link'  => wp_nonce_url( admin_url( 'admin.php?import=wpv_widgets&file=' . WPV_THEME_SAMPLE_WIDGETS ), 'wpv-import' ), // xss ok
	'type'  => 'button',
),

array(
	'name'         => __( 'Slider Revolution', 'construction' ),
	'title'        => __( 'Import Slider Revolution Samples', 'construction' ),
	'link'         => $revslider ? wp_nonce_url( 'admin.php?import=wpv_revslider', 'wpv-import-revslider' ) : 'javascript:void( 0 )',
	'type'         => 'button',
	'button_class' => $revslider ? '' : 'disabled',
),
	array(
		'type' => 'end',
	),

);
