<div class="sidebar">

  <div class="quotes-pages">
  	<div class="rnd-quote">
    <!--
            <div id="slider" class="nivoSlider">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quotes/quote1.png" alt="" />
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <p>The quality of their work was exceptional. They really understood the complexity of the job and were able to provide us with the best result.</p>
                <p>
                Colin Grant<br />
                Operations Manager<br />
                141 Queen Street	
                </p>
            </div>    
    -->
    </div>
                
        <div class="submit1">
	        <?php echo do_shortcode( '[contact-form-7 id="70" title="Contact form 1"]' ); ?>
        </div>
                   

			<div class="eighty-years-pages">
	           <a href="<?php bloginfo('url'); ?>/about-us/">
               	<img src="<?php bloginfo('template_directory'); ?>/images/birthday.gif" alt="Years in business" />
               </a>
            </div>
                
                <div class="four-ps-pages">
	                <a href="<?php bloginfo('url'); ?>/process/"><img src="<?php bloginfo('template_directory'); ?>/images/3ps-pages.jpg" alt="3Ps Process" /></a>
                </div>

                   	<div class="links-pages">
                        <h2>Sort stories by...</h2>
                       
						<ul>
						<?php wp_list_categories('orderby=name&show_count=1&title_li=Topics'); ?> 
                        </ul>                    
                   	</div> 

                
                   	<div class="links-pages">
                        <h2>More Services...</h2>
                       
                            <ul>
                            <li> <a href="<?php bloginfo('url'); ?>/metal-roof-repair-and-maintenance/">Metal roof repair <br/>&amp; maintenance</a></li>
                            <li> <a href="<?php bloginfo('url'); ?>/concrete-roof-repair-and-maintenance/">Concrete roof repair <br/>&amp; maintenance</a> </li>
                            <li> <a href="<?php bloginfo('url'); ?>/tiled-roof-repair-and-maintenance/">Tiled roof repair &amp; maintenance</a> </li>
                            <li> <a href="<?php bloginfo('url'); ?>/waterproofing/">Waterproofing </a></li>
                            <li> <a href="<?php bloginfo('url'); ?>/building-repairs/">Building & Concrete Repair</a> </li>
                        </ul>
                        
                   	</div> 
</div>
</div> <!-- Sidebar End -->

