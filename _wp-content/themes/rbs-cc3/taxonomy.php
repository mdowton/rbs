<?php get_header(); ?>

            <div class="post">
                <div class="entry">
                    
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
                        <div class="product_item">
                            
                                <!-- output thumbnail -->
                                <a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' ); ?></a>
                                <!-- output content for product -->    
                               
                                <div class="product_entry">
                                    <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                                </div>
                        </div>
             
                <?php endwhile; endif; ?>  
                    
                </div>
             </div>

<?php get_footer(); ?>