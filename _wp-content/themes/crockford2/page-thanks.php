<?php
/*
Template Name: thanks-page
*/
?>

<?php get_header(); ?>
 <?php get_sidebar(); ?> <!-- call sidebar -->

                <div class="copy">

           <div class="post-image"> <?php
if ( has_post_thumbnail() ) {
	the_post_thumbnail();

} else {
	echo "no feature image";
}
?></div></div>

                    <div class="breadcrumbs">
                       <?php if(function_exists('bcn_display'))
                        {
                            bcn_display();
                        }?>
                    </div>
                    
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="post" id="post-<?php the_ID(); ?>">

			
            <div class="entry">
            
            <div class="content-page">        
             		<?php the_content(); ?>
                    
				
</div>
				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

		</div></div>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>