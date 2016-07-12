<?php
/**
 * Template Name: case studies
 *
 * @package wpv
 * @subpackage construction
 */

get_header();
?>

<?php if ( have_posts() ) : the_post(); ?>
	<div class="row page-wrapper">
        <?php WpvTemplates::left_sidebar() ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( WpvTemplates::get_layout() ); ?>>
			<?php
			global $wpv_has_header_sidebars;
			if ( $wpv_has_header_sidebars ) {
				WpvTemplates::header_sidebars();
			}
			?>
			<div class="page-content">
                <div class="row">
                    <div class="wpv-grid grid-1-1  wpv-first-level first unextended no-extended-padding" style="padding-top:0.05px;padding-bottom:0.05px;" id="wpv-column-95657b159ded093ce0e55e1e9411d03b"><div class="loop-wrapper clearfix news row small paginated" data-columns="2">
                <?php $args = array(
                'posts_per_page'    => '10',
                'post_type' => 'case_studies'
                );
                $case_query = new WP_Query($args);
                while ($case_query->have_posts()) : if($case_query->have_posts()) : $case_query->the_post(); ?>
                			<div class="page-content post-header grid-1-2 list-item post-320 post type-post status-publish format-standard has-post-thumbnail hentry clearboth">
				<div>
					<div class="post-article has-image-wrapper ">
	<div class="standard-post-format clearfix as-image ">
				    <?php include(locate_template( 'templates/post/main/case-studies.php' )); ?>
                                </div>
                    </div>
                </div>
                        </div>
                <?php endif; endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
		</article>

		<?php WpvTemplates::right_sidebar() ?>

	</div>
<?php endif;

get_footer();