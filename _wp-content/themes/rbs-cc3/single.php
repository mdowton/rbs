<?php get_header(); ?>
	
<?php get_sidebar(); ?>

                <div class="copy">

<?php
		if ( has_post_thumbnail() ) {
			echo "<div class='post-image'>";
			the_post_thumbnail();
		 echo "</div>";
		} else { }?>
		
					
</div>

 <div class="breadcrumbs">
                       <?php if(function_exists('bcn_display'))
                        {
                            bcn_display();
                        }?>
                    </div>

<div class="post">
	
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
                    <div class="entry">
                        
                        
                            
                            <h1><?php the_title(); ?></h1>
			
                            <?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
                        
                       
				
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				<hr/>
                <div class="metaTags">
				 Posted in <?php the_category(', ') ?> | <?php the_tags( 'Tags: ', ', ', ''); ?>
				
			<?php edit_post_link('- Edit this entry','','.'); ?></div>
                
                    </div>
		
                </div>

	
              
     
    
	<?php endwhile; endif; ?>
    
</div>

<?php get_footer(); ?>