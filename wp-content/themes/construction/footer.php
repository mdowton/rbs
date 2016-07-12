<?php
/**
 * Footer template
 *
 * @package wpv
 * @subpackage construction
 */
$page_id     = get_queried_object_id();
?>

<?php if ( ! defined( 'WPV_NO_PAGE_CONTENT' ) ) : ?>
	<?php if ( WPV_Columns::had_limit_wrapper() ): ?>
					</div> <!-- .limit-wrapper -->
	<?php endif ?>
				</div><!-- / #main ( do not remove this comment ) -->

			</div><!-- #main-content -->
<?php if($page_id == '63'){ ?>
<div class="form-for-bottom-pages <?php echo $page_id; ?>"><?php echo do_shortcode('[contact-form-7 id="229" title="Main Contact"]'); ?></div>
<?php } ?>
			<?php if ( ! is_page_template( 'page-blank.php' ) ) : ?>
				<footer class="main-footer">
					<?php if ( wpv_get_optionb( 'has-footer-sidebars' ) ) : ?>
						<div class="footer-sidebars-wrapper">
							<div id="footer-sidebars" data-rows="4">
								<div class="row" data-num="0">
									<?php for ( $i = 1; $i <= 3; $i++ ) : ?>

											<aside class="cell-1-4  fit">
												<?php dynamic_sidebar( "footer-sidebars-$i" ); ?>
											</aside>

									<?php endfor ?>
										<aside class="cell-1-4  fit">
												<div style="">
												<p style="display:inline-block;margin-right:15px;margin-top: 0px;"><?php echo do_shortcode('[icon name="theme-envelope-open" style="" color="accent4" size="40" ]'); ?></p><p style="display:inline-block;margin-top: 0px;">TALK TO OUR EXPERT TEAM<br/>
												<a href="/contact-us/"><strong>REQUEST A PROPOSAL</strong></a></p>
												</div>
												<div><p style="display:inline-block;margin-right:15px;"><?php echo do_shortcode('[icon name="theme-call-end" float="left" margin-right="15px" color="accent4" size="32" ]'); ?></p><p style="display:inline-block;">CALL US NOW <br/>
<a href="tel:1800550037"><strong>1800-550-037</strong></a></p>
</div>
										</aside>
								</div>
							</div>
						</div>
					<?php endif ?>
				</footer>

				<?php do_action( 'wpv_before_sub_footer' ) ?>

				<?php if ( wpv_get_option( 'credits' ) != '' ) : ?>
					<div class="copyrights">
						<div class="<?php echo esc_attr( wpv_get_option( 'full-width-header' ) ? '' : 'limit-wrapper' ) ?>">
							<div class="row">
								<?php
									$left   = do_shortcode( wpv_get_option( 'subfooter-left' ) );
									$center = do_shortcode( wpv_get_option( 'subfooter-center' ) );
									$right  = do_shortcode( wpv_get_option( 'subfooter-right' ) );
								?>
								<?php if ( empty( $left ) && empty( $right ) ) : ?>
									<div class="grid-1-1 textcenter"><?php echo $center // xss ok ?></div>
								<?php else : ?>
									<div class="grid-1-3"><?php echo $left // xss ok ?></div>
									<div class="grid-1-3 textcenter"><?php echo $center // xss ok ?></div>
									<div class="grid-1-3 textright"><?php echo $right // xss ok ?></div>
								<?php endif ?>
							</div>
						</div>
					</div>
				<?php endif ?>
			<?php endif ?>

		</div><!-- / .pane-wrapper -->

<?php endif // WPV_NO_PAGE_CONTENT ?>
	</div><!-- / .boxed-layout -->
</div><!-- / #page -->

<div id="wpv-overlay-search">
	<form action="<?php echo esc_url( home_url() ) ?>/" class="searchform" method="get" role="search" novalidate="">
		<input type="text" required="required" placeholder="<?php esc_attr_e( 'Search...', 'construction' ) ?>" name="s" value="" />
		<button type="submit" class="icon theme"><?php wpv_icon( 'theme-search2' ) ?></button>
		<?php if ( defined( 'ICL_LANGUAGE_CODE' ) ) : ?>
			<input type="hidden" name="lang" value="<?php echo esc_attr( ICL_LANGUAGE_CODE ) ?>"/>
		<?php endif ?>
	</form>
</div>

<?php get_template_part( 'templates/side-buttons' ) ?>
<?php wp_footer(); ?>
<!-- W3TC-include-js-head -->
<script>
jQuery(document).ready(function($){
   $('.thank-you-block a').click(function(){
      window.history.go(-1);
       
   });
    
});
</script>
</body>
</html>
