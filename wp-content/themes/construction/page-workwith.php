<?php
/**
 * Template Name: who we work with
 *
 * @package wpv
 * @subpackage construction
 */

get_header();
?>

<?php if ( have_posts() ) : the_post(); ?>
	<div class="row page-wrapper">
        <div class="left" style="float:left">
		<?php dynamic_sidebar('who-1'); ?>
        </div>
		<article id="post-<?php the_ID(); ?>" <?php post_class( WpvTemplates::get_layout() ); ?>>
			<?php
			global $wpv_has_header_sidebars;
			if ( $wpv_has_header_sidebars ) {
				WpvTemplates::header_sidebars();
			}
			?>
			<div class="page-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'construction' ), 'after' => '</div>' ) ); ?>
				<?php WpvTemplates::share( 'page' ) ?>
			</div>

			<?php comments_template( '', true ); ?>
		</article>

		<?php //WpvTemplates::right_sidebar() ?>

	</div>
<?php endif;

get_footer();
