<?php

/**
 * Catch-all post loop
 */

// display full post/image or thumbs
if ( ! isset( $called_from_shortcode ) ) {
	$image = 'true';
	$show_content = true;
	$nopaging = false;
	$width = 'full';
	$news = false;
	$layout = 'normal';
	$column = 1;
}

global $wpv_loop_vars;
$old_wpv_loop_vars = $wpv_loop_vars;
$wpv_loop_vars = array(
	'image' => $image,
	'show_content' => $show_content,
	'width' => $width,
	'news' => $news,
	'column' => $column,
	'layout' => $layout,
);

$wrapper_class = array();

$wrapper_class[] = $news ? 'news row' : 'regular';
$wrapper_class[] = $layout;
$wrapper_class[] = $nopaging ? 'not-paginated' : 'paginated';

?>
<div class="loop-wrapper clearfix <?php echo esc_attr( implode( ' ', $wrapper_class ) ) ?>" data-columns="<?php echo esc_attr( $column ) ?>">
<?php

	do_action( 'wpv_before_main_loop' );

	$i = 0;
	global $wp_query;
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$post_class   = array();
			$post_class[] = 'page-content post-header';
			$post_class[] = $column > 1 || $news ? "grid-1-$column" : 'clearfix';

			if ( $news && 0 === $i % $column ) {
				$post_class[] = 'clearboth';
			}

			if ( ! is_single() ) {
				$post_class[] = 'list-item';
			}
?>
			<div <?php post_class( implode( ' ', $post_class ) ) ?> >
				<div>
					<?php get_template_part( 'templates/post', get_post_type() );	?>
				</div>
			</div>
<?php
			$i++;
		endwhile;
	endif;

	do_action( 'wpv_after_main_loop' );
?>
</div>

<?php $wpv_loop_vars = $old_wpv_loop_vars; ?>
<?php
	if ( ! $nopaging ) {
		WpvTemplates::pagination();
	}
?>
