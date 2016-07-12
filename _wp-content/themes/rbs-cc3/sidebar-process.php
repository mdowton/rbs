<div class="sidebar">

  <div class="quotes-pages">
  	<div class="rnd-quote red">
		<?php
        $quotes = get_field('customer_quotes','options');
		$quote_no = rand( 0, count($quotes)-1 );
        echo "<p>" . $quotes[$quote_no]['quote'] ."</p>";
        ?>
    </div>

        <div class="submit1">
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
                                
                <div class="eighty-years">
                	<a href="<?php bloginfo('url'); ?>/about-us/"> 
                    	<img src="<?php bloginfo('template_directory'); ?>/images/birthday.gif" alt="Years in business" />
                    </a>
                </div>
                
                                
    <div class="links-pages">
        <h2>More Services...</h2>
       
        	<ul>
            <li> <a href="<?php bloginfo('url'); ?>/metal-roof-repair-and-maintenance/">Metal roof repair <br/>&amp; maintenance</a></li>
            <li> <a href="<?php bloginfo('url'); ?>/concrete-roof-repair-and-maintenance/">Concrete roof repair <br/>&amp; maintenance</a> </li>
            <li> <a href="<?php bloginfo('url'); ?>/tiled-roof-repair-and-maintenance/">Tiled roof repair &amp; maintenance</a> </li>
            <li> <a href="<?php bloginfo('url'); ?>/waterproofing/">Waterproofing </a></li>
            <li> <a href="<?php bloginfo('url'); ?>/building-repairs/">Building and Concrete Repair</a> </li>
        </ul>
        
        </div> 
	</div>
</div>