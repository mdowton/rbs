<div class="post-media-date">
	
		<div class="thumbnail">
			<?php if( has_post_thumbnail() ): ?>
				<?php the_post_thumbnail(); ?>
			<?php else: ?>
				<?php echo $post_data['media']; // xss ok ?>
			<?php endif ?>
		</div>
	
	<div class="post-actions-wrapper clearfix">
		<?php if ( wpv_get_optionb( 'meta_posted_on' ) ) : ?>
			<div class="post-date">
				<?php the_time( get_option( 'date_format' ) ); ?>
			</div>
		<?php endif ?>
		<?php if ( ! post_password_required() ): ?>
			<?php if ( wpv_get_optionb( 'meta_comment_count' ) && comments_open() ): ?>
				<div class="comment-count">
					<?php
						$comment_icon = '<span class="icon">' . wpv_get_icon( 'bubble' ) . '</span>';
						comments_popup_link(
							$comment_icon . __( '0 <span class="comment-word visuallyhidden">Comments</span>', 'construction' ),
							$comment_icon . __( '1 <span class="comment-word visuallyhidden">Comment</span>', 'construction' ),
							$comment_icon . __( '% <span class="comment-word visuallyhidden">Comments</span>', 'construction' )
						); // xss ok
					?>
				</div>
			<?php endif; ?>

			<?php edit_post_link( '<span class="icon">' . wpv_get_icon( 'pencil' ) . '</span><span class="visuallyhidden">'. __( 'Edit', 'construction' ) .'</span>' ) ?>
		<?php endif ?>
	</div>

</div>

	<div class="post-content-wrapper">
        		<header class="single">
			<div class="content">
				<h3>
                    <?php $value_assets = get_post_meta(get_the_ID(), 'case_studies_asset_data', true);
                    $asset_data = wp_get_attachment_url($value_assets[0]); ?>
                    <a href="<?php echo esc_url( $asset_data ) ?>" title="<?php the_title_attribute()?>" class="entry-title" target="_blank"><?php the_title(); ?></a>
				</h3>
			</div>
		</header>

		<div class="post-content-outer">
			<?php echo $post_data['content']; // xss ok ?>
		</div>

		<?php if ( wpv_get_optionb( 'show-post-author' ) ) : ?>
			<div class="author"><span><?php _e( 'Author:', 'construction' ) ?></span> <?php the_author_posts_link() ?></div>
		<?php endif ?>

		<?php if ( wpv_get_optionb( 'meta_posted_in' ) ) : ?>
			<div class="post-content-meta">
				<div>
					<?php _e( 'Posted in: ', 'construction' ) ?> <?php the_category( ', ' ); ?>
				</div>
				<?php the_tags( '<div class="the-tags">'.__( 'Tags: ', 'construction' ), ', ', '</div>' ) ?>
			</div>
		<?php endif ?>
	</div>
