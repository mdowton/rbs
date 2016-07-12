<?php

/**
 * Scrollable blog
 *
 * @package wpv
 */

?>
<div class="scrollable-wrapper">
	<div class="woocommerce woocommerce-scrollable scroll-x">
		<ul class="clearfix products" data-columns="<?php echo intval( $columns ) ?>">
			<?php
				if($products->have_posts()) while($products->have_posts()): $products->the_post();
					$GLOBALS['product'] = new WC_Product( $GLOBALS['post'] );
				?>
					<li class="product">
						<div>
							<?php get_template_part( 'templates/woocommerce-scrollable/item' );	?>
						</div>
					</li>
				<?php
					unset( $GLOBALS['product'] );
				endwhile;
			?>
		</ul>
	</div>
</div>