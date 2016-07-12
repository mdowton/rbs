<div class="header-content-wrapper">
	<div class="first-row limit-wrapper">
		<div class="first-row-wrapper">
			<div class="first-row-left">
				<?php get_template_part( 'templates/header/top/logo' ) ?>
			</div>
			<div class="first-row-right">
				<div class="first-row-right-inner">
					<?php
						$header_text_main  = wpv_get_option( 'header-text-main' );
						$header_text_right = wpv_get_option( 'header-text-right' );

						$has_header_text_main  = ! ( ctype_space( $header_text_main ) || ! strlen( $header_text_main ) );
						$has_header_text_right = ! ( ctype_space( $header_text_right ) || ! strlen( $header_text_right ) );
					?>
					<?php if ( $has_header_text_main ): ?>
						<div id="header-text"><div class="clearfix">
							<?php if ( ! $has_header_text_right ) : ?>
								<?php echo do_shortcode( $header_text_main ) // xss ok ?>
							<?php else :  ?>
								<div class="row">
									<div class="row">
										<div class="grid-1-2"><?php echo do_shortcode( $header_text_main ) // xss ok ?></div>
										<div class="grid-1-2"><?php echo do_shortcode( $header_text_right ) // xss ok ?></div>
									</div>
								</div>
							<?php endif ?>
						</div></div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="second-row header-content-wrapper">
	<div class="limit-wrapper">
		<div class="second-row-columns">
			<div class="header-center">
				<div id="menus">
					<?php get_template_part( 'templates/header/top/main-menu' ) ?>
				</div>
			</div>

			<?php do_action( 'wpv_header_cart' ) ?>

			<?php if ( wpv_get_option( 'enable-header-search' ) ): ?>
				<div class="search-wrapper">
					<?php get_template_part( 'templates/header/top/search-button' ) ?>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>
