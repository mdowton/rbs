<?php
	$mobile_top_bar = wpv_get_option( 'mobile-top-bar' );
	if ( ! empty( $mobile_top_bar ) ):
?>
		<div class="mobile-top-bar"><?php echo do_shortcode( $mobile_top_bar ) // xss ok ?></div>
<?php endif ?>
<div class="logo-wrapper">
	<a href="#" id="mp-menu-trigger" class="icon-b" data-icon="<?php wpv_icon( 'menu1' ) ?>"><?php _e( 'Open/Close Menu', 'construction' ) ?></a>
	<?php
		$logo_type  = wpv_get_option( 'header-logo-type' );
		$logo       = wpv_get_option( 'custom-header-logo' );
		$logo_trans = wpv_get_option('custom-header-logo-transparent');

		$upload_dir  = wp_upload_dir();
		$logo_editor = wp_get_image_editor( wpv_get_attachment_file( $logo ) );
		$logo_size   = is_wp_error( $logo_editor ) ? array( 'height'=>0, 'width'=>0 ) : $logo_editor->get_size();

		$padding    = $max_height = 0;
		$logo_style = '';
		if ( ! empty( $logo_size['height'] ) ) {
			if ( wpv_get_option( 'header-layout' ) == 'logo-menu' ) {
				$padding = ( wpv_get_option( 'header-height' ) - $logo_size['height']/2 )/2;
				$max_height = $logo_size['height'] / 2;

				$logo_style = "padding: {$padding}px 0; max-height: {$max_height}px;";
			} else {
				$max_height = $logo_size['height'] / 2;
				$logo_style = "max-height: {$max_height}px;";
			}
		}
	?>
	<a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" class="logo <?php if ( empty( $logo ) || $logo_type === 'site-title' ) echo 'text-logo' //xss ok ?>" style="min-width:<?php echo intval( $logo_size['width'] / 2 ) ?>px"><?php
		if ( $logo && $logo_type === 'image' ):
		?>
			<img src="<?php echo esc_url( $logo ) ?>" alt="<?php bloginfo( 'name' )?>" class="normal-logo" height="<?php if ( ! empty( $logo_size['height'] ) ) echo intval( $logo_size['height']/2 )  ?>" style="<?php echo esc_attr( $logo_style ) ?>"/>
			<?php if ( ! empty( $logo_trans ) ) : ?>
				<img src="<?php echo esc_url( $logo_trans ) ?>" alt="<?php esc_attr( bloginfo( 'name' ) ) ?>" class="alternative-logo" height="<?php if ( ! empty( $logo_size['height'] ) ) echo esc_attr( $logo_size['height'] ) ?>" style="<?php echo esc_attr( $logo_style ) ?>"/>
			<?php endif ?>
		<?php
		else:
			bloginfo( 'name' );
		endif;
		?>
	</a>
	<?php
		$description = get_bloginfo( 'description' );
		if ( ! empty( $description ) ):
	?>
			
	<?php endif ?>
	<div class="mobile-logo-additions">
		<?php if ( wpv_has_woocommerce() ): ?>
			<?php global $woocommerce; ?>
			<a class="vamtam-cart-dropdown-link icon theme no-dropdown" href="<?php echo esc_attr( $woocommerce->cart->get_cart_url() ) ?>">
				<span class="icon theme"><?php wpv_icon( 'theme-handbag' ) ?></span>
				<span class="products cart-empty">...</span>
			</a>
		<?php endif ?>
		<?php if ( wpv_get_option( 'mobile-search-in-header' ) ): ?>
			<button class="header-search icon wpv-overlay-search-trigger"><?php wpv_icon( 'search1' ) ?></button>
		<?php endif ?>
	</div>
</div>