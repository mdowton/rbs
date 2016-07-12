<?php

/**
 * Displays social sharing buttons
 *
 * @package wpv
 */

global $post;

$networks = array(
	'facebook' => array(
		'link'  => 'https://www.facebook.com/sharer/sharer.php?u=',
		'title' => __( 'Share on Facebook', 'construction' ),
		'text'  => __( 'Like', 'construction' ),
	),
	'twitter' => array(
		'link'  => 'https://twitter.com/intent/tweet?text=',
		'title' => __( 'Share on Twitter', 'construction' ),
		'text'  => __( 'Tweet', 'construction' ),
	),
	'googleplus' => array(
		'link'  => 'https://plus.google.com/share?url=',
		'title' => __( 'Share on Google Plus', 'construction' ),
		'text'  => __( '+1', 'construction' ),
	),
	'pinterest' => array(
		'link'  => '#',
		'title' => __( 'Share on Pinterest', 'construction' ),
		'text'  => __( 'Pin it', 'construction' ),
	),
);

if ( WpvTemplates::has_share( $context ) ) :
?>
<div class="clearfix <?php echo esc_attr( apply_filters( 'wpv_share_class', 'share-btns' ) ) ?>">
	<div class="sep-3"></div>
	<ul class="socialcount" data-url="<?php esc_attr_e( get_permalink() ) ?>" data-share-text="<?php esc_attr_e( get_the_title() ) ?>" data-media="">
		<?php foreach ( $networks as $slug => $cfg ) : ?>
			<?php if ( wpv_get_option( "share-$context-$slug" ) ) : ?>
				<li class="<?php echo esc_attr( $slug ) ?>">
					<a href="<?php echo esc_url( $cfg['link'] . urlencode( get_permalink() ) ) ?>" title="<?php esc_attr_e( $cfg['title'] ) ?>">
						<?php echo do_shortcode( "[icon name='$slug']" ) ?>
						<span class="count"><?php echo $cfg['text'] // xss ok ?></span>
					</a>
				</li>&nbsp;
			<?php endif ?>
		<?php endforeach ?>
	</ul>
</div>
<?php
endif;