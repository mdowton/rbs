<?php
/**
 * Catch-all template
 *
 * @package wpv
 * @subpackage construction
 */



$format = get_query_var( 'format_filter' );
$wpv_title = $format ? sprintf( __( 'Post format: %s', 'construction' ), $format ) : __( 'Blog', 'construction' );
get_header();
?>
<div class="row page-wrapper">
	<?php WpvTemplates::left_sidebar() ?>

	<article <?php post_class( WpvTemplates::get_layout() ) ?>>
		<?php
		global $wpv_has_header_sidebars;
		if ( $wpv_has_header_sidebars ) {
			WpvTemplates::header_sidebars();
		}
		?>
		<div class="page-content">
			<?php get_template_part( 'loop', 'index' ); ?>
		</div>
	</article>

	<?php WpvTemplates::right_sidebar() ?>
</div>
<?php get_footer(); ?>
