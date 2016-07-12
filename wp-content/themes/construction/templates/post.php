<?php

/**
 * The common code for the single and looped post template
 *
 * @package wpv
 */

	global $post;

	extract( WpvPostFormats::post_layout_info() );
	$format = get_post_format();
	$format = empty($format)? 'standard' : $format;

	if ( defined( 'WPV_ARCHIVE_TEMPLATE' ) ) {
		$show_content = false;
	}

	$post_data = array_merge(
	 array(
	 'p'       => $post,
	 'format'  => $format,
	 'content' => is_single() ? get_the_content() :
			             ( $show_content && ! $news ? get_the_content( __( 'Read more', 'construction' ), false ) : get_the_excerpt() ),
	), WpvPostFormats::post_layout_info() );

	if ( has_post_format( 'quote' ) && ! is_single() && ($news || ! $show_content) ) {
		$post_data['content'] = '';
	}

	$post_data = WpvPostFormats::process( $post_data );

	$has_media = isset($post_data['media']) ? 'has-image' : 'no-image';
?>
<div class="post-article <?php echo esc_attr( $has_media ) ?>-wrapper <?php echo esc_attr( is_single() ? 'single' : '' ) ?>">
	<div class="<?php echo esc_attr( $format ) ?>-post-format clearfix <?php echo esc_attr( isset( $post_data['act_as_image'] ) ? 'as-image' : 'as-normal' ) ?> <?php echo esc_attr( isset($post_data['act_as_standard']) ? 'as-standard-post-format' : '' ) ?>">
		<?php
			if ( is_single() ) {
				include(locate_template( 'templates/post/main/single.php' ));
			} elseif ( $news ) {
				include(locate_template( 'templates/post/main/news.php' ));
			} else {
				include(locate_template( 'templates/post/main/loop.php' ));
			}
		?>
	</div>
</div>
