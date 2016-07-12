<?php

/**
 * Declare plugin dependencies
 *
 * @package wpv
 */

/**
 * Declare plugin dependencies
 */
function wpv_register_required_plugins() {
	$plugins = array(
		array(
			'name' => 'Contact Form 7',
			'slug' => 'contact-form-7',
			'required' => false,
		),

		array(
			'name' => 'WP Retina 2x',
			'slug' => 'wp-retina-2x',
			'required' => false,
		),

		array(
			'name' => 'MailPoet Newsletters (formerly Wysija)',
			'slug' => 'wysija-newsletters',
			'required' => false,
		),

		array(
			'name' => 'Tiled Galleries Carousel Without Jetpack',
			'slug' => 'tiled-gallery-carousel-without-jetpack',
			'required' => false,
		),

		array(
			'name' => 'WooCommerce',
			'slug' => 'woocommerce',
			'required' => false,
		),

		array(
			'name' => 'WooCommerce Product Archive Customizer',
			'slug' => 'woocommerce-product-archive-customiser',
			'required' => false,
		),

		array(
			'name' => 'Vamtam Push Menu',
			'slug' => 'vamtam-push-menu',
			'source' => WPV_PLUGINS . 'vamtam-push-menu.zip',
			'required' => false,
			'version' => '1.3.0',
		),

		array(
			'name' => 'Vamtam Portfolio Core',
			'slug' => 'vamtam-portfolio',
			'source' => WPV_PLUGINS . 'vamtam-portfolio.zip',
			'required' => false,
			'version' => '1.0.0',
		),

		array(
			'name' => 'Vamtam Testimonials Core',
			'slug' => 'vamtam-testimonials',
			'source' => WPV_PLUGINS . 'vamtam-testimonials.zip',
			'required' => false,
			'version' => '1.0.0',
		),

		array(
			'name' => 'Vamtam Importers',
			'slug' => 'vamtam-importers',
			'source' => WPV_PLUGINS . 'vamtam-importers.zip',
			'required' => false,
			'version' => '1.0.0',
		),

		array(
			'name' => 'Vamtam Twitter',
			'slug' => 'vamtam-twitter',
			'source' => WPV_PLUGINS . 'vamtam-twitter.zip',
			'required' => false,
			'version' => '1.0.0',
		),

		array(
			'name' => 'Revolution Slider',
			'slug' => 'revslider',
			'source' => WPV_PLUGINS . 'revslider.zip',
			'required' => false,
			'version' => '4.3.3',
		),
	);

	$config = array(
		'domain'       		=> 'wpv',						// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',							// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'domain' => THEME_NAME,
			'skin_update_failed_error' => __( 'Skin update failed', 'construction' ),
			'page_title'                       			=> __( 'Install Required Plugins', 'construction' ),
			'menu_title'                       			=> __( 'Required Plugins', 'construction' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'construction' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'construction' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'construction' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'construction' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'construction' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'wpv_register_required_plugins' );