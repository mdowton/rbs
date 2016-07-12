<?php
/*
Template Name: Home page
*/
?>
    <?php get_header(); ?>

<div class="home-hover">
    
    <div class="image-set1">
        <div class="imageHover">
         <img src="<?php bloginfo('template_directory'); ?>/images/img10.jpg" alt="concrete-roof-repair-and-maintenance" title="Concrete roof repair &amp; maintenance" />
        </div>
    </div>
    
    <div class="image-set2">
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img2.jpg" alt="building-repairs" title="Building Repairs"/>
        </div>
     <br/>
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img3.jpg" alt="concrete-roof-repair-and-maintenance" title="Concrete roof repair &amp; maintenance" />
        </div>
    </div>
    
    <div class="image-set3">
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img4.jpg" alt="building-repairs" title="Building Repairs"/>
        </div>
    <br/>
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img5.jpg" alt="waterproofing" title="Waterproofing" />
        </div>
    </div>
    
    <div class="image-set4">
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img6.jpg" alt="tiled-roof-repair-and-maintenance" title="Tiled roof repair &amp; maintenance" />
        </div>
    <br/>
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img7.jpg" alt="concrete-roof-repair-and-maintenance" title="Concrete roof repair &amp; maintenance" />
        </div>
    <br/>
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img8.jpg" alt="metal-roof-repair-and-maintenance" title="Metal roof repair &amp; maintenance" />
        </div>
    </div>
    
     <div class="image-set5">
     	<div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img9.jpg" alt="waterproofing" title="Waterproofing" />
        </div>
    <br/>
         <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img1.jpg" alt="metal-roof-repair-and-maintenance" title="Metal roof repair &amp; maintenance" />
        </div>
    <br/>
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img11.jpg" alt="waterproofing" title="Waterproofing" />
    	</div>
    </div>
    
     <div class="image-set6">
         <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img12.jpg" alt="building-repairs" title="Building Repairs" />
        </div>
    <br/>
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img13.jpg" alt="concrete-roof-repair-and-maintenance" title="Concrete roof repair &amp; maintenance" />
        </div>
    </div>
    
    <div class="image-set7">
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img14.jpg" alt="metal-roof-repair-and-maintenance" title="Metal roof repair &amp; maintenance" />
        </div>
    <br/>
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img15.jpg" alt="waterproofing" title="Waterproofing" />
        </div>
    </div>
    
   <div class="image-set8">
        <div class="imageHover">
        <img src="<?php bloginfo('template_directory'); ?>/images/img16.jpg" alt="tiled-roof-repair-and-maintenance" title="Tiled roof repair &amp; maintenance" />
        </div>
    </div>
    
    </div>

        
    
    
    

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="post" id="post-<?php the_ID(); ?>">

			<div class="entry2">
                            
                                
                 
                 <div class="content-home">           
                 
				<?php the_content(); ?> 
                </div>
                
                <div class="eighty-years">
                <a href="<?php bloginfo('url'); ?>/about-us/"> <img src="<?php bloginfo('template_directory'); ?>/images/80year.jpg" alt="80 years" /></a>
                </div>
                
                <div class="four-ps">
                <a href="<?php bloginfo('url'); ?>/services/aerial-view/">     <img src="<?php bloginfo('template_directory'); ?>/images/interactMain.png" alt="4Ps Process" /></a>
                </div>
                
               <div class="quotes">
                <img src="<?php bloginfo('template_directory'); ?>/images/quote1.png" alt="Testimonial" />
                </div>
               
                <div class="submit">
                <?php echo do_shortcode( '[contact-form-7 id="70" title="Contact form 1"]' ); ?>
                </div>
                
                

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

		</div>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>