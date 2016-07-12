<?php get_header(); ?>
	<?php get_sidebar(); ?> <!-- call sidebar -->
    
    
    <div class="copy">
    

        
                            <div class="post-image">
                                
                                 <img src="<?php bloginfo ('template_url'); ?>/images/CoastApartments2_832x328.jpg"? />
                            
                            </div>
                    
  


                            <div class="breadcrumbs">
                               <?php if(function_exists('bcn_display'))
                                {
                                    bcn_display();
                                }?>
                            </div>
    
	      <h1>News</h1>
    
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			
            <div class="post" id="post-<?php the_ID(); ?>">

				<div class="entry">
            
            			<div class="content-page">
                            
                            <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                            
                            <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
                            
                            <img src=" <?php echo catch_that_image() ?> " />
                            
                                    <?php the_content(); ?>
                                    
                                   

                            <div class="postmetadata">
                                     
                                   Posted in <?php the_category(', ') ?> | <?php the_tags( 'Tags: ', ', ', ''); ?>
                            </div>
                            
                        </div>
                    </div>
		</div>
                
	<?php endwhile; ?></div>

	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>
                
<?php get_footer(); ?>
