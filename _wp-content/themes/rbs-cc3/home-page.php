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
<style type="text/css">
.column-left{ float: left; width: 30%; }
.column-center{ display: inline-block; width: 45%; }
.column-right{ float: right; width: 25%; }

.columns{
	display:block;
	position:relative;
}
</style>                            
                                
		<div class="columns">                                
                 
                 <div class="column-left">           
                 
					<?php the_content(); ?>
                     
                </div><!--//column-left -->
                
                <div class="column-center">
                      
                    
                    <div class="eighty-years">
                        <a href="<?php bloginfo('url'); ?>/about-us/"> 
                            <img src="<?php bloginfo('template_directory'); ?>/images/birthday.gif" alt="Years in business" />
                        </a>
                    </div>
                    
                    <div class="four-ps">
                    <a href="<?php bloginfo('url'); ?>/services/aerial-view/">     <img src="<?php bloginfo('template_directory'); ?>/images/interactMain.png" alt="4Ps Process" /></a>
                    </div>
                    
                    <div class="submit">
                    <?php //echo do_shortcode( '[contact-form-7 id="70" title="Contact form 1"]' ); ?>
                        <?php
                        $form_id = 2;
                            gravity_form_enqueue_scripts($form_id, true);
        
                            gravity_form(	$form_id, 
                                            $display_title = false, 
                                            $display_description = false, 
                                            $display_inactive = false,
                                            $field_values= '',
                                            $ajax= true,
                                            $tabindex = 1
                                        ); 
                        ?>                
                    </div>                    
                
                </div><!--//column-center -->
                
                
                <div class="column-right">
                
                    <div class="rnd-quote blue">
                        <?php
                        $quotes = get_field('customer_quotes','options');
                        $quote_no = rand( 0, count($quotes)-1 );
                        echo "<p>" . $quotes[$quote_no]['quote'] ."</p>";
                        ?>
                    </div>
                
                </div><!--//column-right -->
                
        		<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
                
		</div><!--//columns -->
        
		

			</div>

		</div>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>