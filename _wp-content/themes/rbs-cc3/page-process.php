<?php
/*
Template Name: process page
*/
?>

<?php get_header(); ?>
 <?php get_sidebar('process'); ?> <!-- call sidebar -->

                <div class="copy">

                
                <?php if ( has_post_thumbnail() ) { ?>
                    
                    <div class="post-image">
                        
                        <?php the_post_thumbnail(); ?>
                        
                    </div>
                   
                
               <?php }
                else { ?>
                
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.nivo.slider.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.min.js"></script>	
               
             			<div class="slider nivoSlider">
                            <img src="<?php bloginfo('template_directory'); ?>/images/slide-golf.jpg" />
                            <img src="<?php bloginfo('template_directory'); ?>/images/slide-city.jpg" width="832" height="328px"/>
                            <img src="<?php bloginfo('template_directory'); ?>/images/slide-river.jpg" width="832" height="328px" />
                       	</div>
					
                        
                         <script type="text/javascript">
                        $(window).load(function() {
                            $('.slider').nivoSlider();
                            
                        });
                        </script>

                <?php } ?>
                
                

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