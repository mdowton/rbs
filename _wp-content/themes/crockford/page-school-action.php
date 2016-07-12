<?php
/*
Template Name: school-action-page
*/
?>

<?php get_header(); ?>

                    <div class="breadcrumbs">
                       <?php //if(function_exists('bcn_display'))
                        //{
                         //   bcn_display();
                        //}?>
                    </div>
                    
                    <div class="post">
                            <div class="action-picture">
                                

                                <div class="at-a-glance"></div>
                                 <h1>Click on a service to find out more</h1>
                                
                                    <img src="<?php bloginfo('template_directory');?>/images/school.jpg"/>
                                        
                                        <a href="#"class="bubble tiled-roof-repair">Tiled Roof Repairs</a>
                                        <div class="blurb tiled-roof-repair">
                                            <h2>Tiled Roof Repairs</h2>
                                            <p>To safeguard against unwanted water damage, R&BS will check your roof for broken or loose tiles and damaged flashing. It’s also extremely important to have the pointing checked and rectified on the ridge capping.</p>
                                            <div class="close"><a href="#">Close window</a></div>
                                        </div>
                                        
                                        <a href="#" class="bubble expansion-joints">Expansion Joints</a>
                                        <div class="blurb expansion-joints">
                                            <h2>Expansion Joints</h2>
                                            <p>Expansion joints and movement cracks are highly susceptible to water ingress, due to their purpose in the building structure. The highly cyclical nature of expansion and contraction that is absorbed by these areas results in the potential failure of the sealants. R&BS uses hi-tech and high-performance jointing systems in these applications, to extend the effectiveness of the watertight seal.</p>
                                            <div class="close"><a href="#">Close window</a></div>
                                        </div>
                                        
                                        <a href="#" class="bubble flashing">Flashings</a>
                                        <div class="blurb flashing">
                                            <h2>Flashings</h2>
                                            <p>The installation of new flashings, sarking membranes and valley gutters are all vital steps that R&BS will address in an inspection and report about the maintenance and longevity of your tiled roof areas. Our professional tradesmen will replace or repair these areas, should they require attention.</p>
                                            <div class="close"><a href="#">Close window</a></div>
                                        </div>
                                        
                                        <a href="#" class="bubble spalling-repair">Concrete Spalling Repair</a>
                                        <div class="blurb spalling-repair">
                                            <h2>Concrete Spalling Repair</h2>
                                            <p>Concrete spalling is a common issue in our climate due to the levels of carbonation and chloride in the air. R&BS specialises in the investigation, specification and repair of all areas of concrete spalling (concrete cancer). We work closely with engineers and architects, from the initial investigation of the repairs right through to the final inspection, to ensure that work is carried out to the highest of standards.</p>
                                            <div class="close"><a href="#">Close window</a></div>
                                        </div>
                                        
                                        <a href="#" class="bubble facade-waterproofing">Building Façade Waterproofing</a>
                                        <div class="blurb facade-waterproofing">
                                            <h2>Building Façade Waterproofing</h2>
                                            <p>Building facades have a wide diversity — from low-rise suburban office and warehouse facilities to high-rise, landmark structures. Therefore, the most efficient way of planning the rectification of façade areas is to carry out a comprehensive report detailing its condition. We believe this assessment is a critical starting point for any facade rehabilitation, in order to identify a realistic scope of work and cost estimate. </p>
                                            <div class="close"><a href="#">Close window</a></div>
                                        </div>
                                        
                                        <a href="#" class="bubble external-window-sealing">External Window Sealing</a>
                                        <div class="blurb external-window-sealing">
                                            <h2>External Window Sealing</h2>
                                            <p>The flexible rubber sealants that are used around windows as water stops are constantly exposed to temperature extremes and the elements — often causing them to become inflexible, and then deteriorate and crack. As these seals are vital for waterproofing windows, it is essential that they be inspected regularly to prevent serious water ingress and damage. R&BS will carry out an inspection of your window seals, and advise you on the best course of action to keep your building watertight.</p>
                                            <div class="close"><a href="#">Close window</a></div>
                                        </div>
                                        
                                        <a href="#" class="bubble facade-rendering">Façade Rendering</a>
                                        <div class="blurb facade-rendering">
                                            <h2>Façade Rendering</h2>
                                            <p>Colours add interest to buildings, and one cost effective way to achieve enhanced building vitality is through new technology renders. With today’s specially formulated polymers, a building’s appearance can be reinvigorated as well as waterproofed.</p>
                                            <div class="close"><a href="#">Close window</a></div>
                                        </div>
                                        
                                        <a href="#" class="bubble landscape-waterproofing2">Landscape Waterproofing</a>
                                        <div class="blurb landscape-waterproofing2">
                                            <h2>Landscape Waterproofing</h2>
                                            <p>Garden beds and landscaped areas contain salts, fertilizers and other chemicals that can be extremely corrosive. When your landscaped area begins to leak, it can have a very serious effect on the structural integrity of the reinforcing steel in the concrete slabs — which is why we always recommend an early intervention. This prevents any further damage being done, and saves you from carrying out larger, more complicated waterproofing and structural concrete repairs in the future.</p>
                                        <div class="close"><a href="#">Close window</a></div>
                                        </div>
                            	
                                
                            <div class="imageInsert2">
       <a href="<?php bloginfo('url'); ?>/services/aerial-view/"><img src="<?php bloginfo('template_directory');?>/images/aerial.png"/></a>
                              </div>
                              </div>
                                                          
                    </div>

<script type="text/javascript">
    		
          $('.bubble.tiled-roof-repair').fadeIn('slow');
          $('.bubble.expansion-joints').delay(200).fadeIn('slow');
          $('.bubble.flashing').delay(300).fadeIn('slow');
          $('.bubble.spalling-repair').delay(400).fadeIn('slow');
          $('.bubble.facade-waterproofing').delay(500).fadeIn('slow');
          $('.bubble.external-window-sealing').delay(600).fadeIn('slow');
          $('.bubble.facade-rendering').delay(700).fadeIn('slow');
          $('.bubble.landscape-waterproofing2').delay(800).fadeIn('slow');
    
          $('.bubble.tiled-roof-repair').click(function(){
          $(".bubble").hide();
          $(".blurb").hide();
          $(".blurb.tiled-roof-repair").slideToggle();
          });
          
          $('.bubble.expansion-joints').click(function(){
          $(".bubble").hide();
          $(".blurb").hide();    
          $(".blurb.expansion-joints").slideToggle();
          });
          
          $('.bubble.flashing').click(function(){
          $(".bubble").hide();
          $(".blurb").hide();    
          $(".blurb.flashing").slideToggle();
          });
          
          $('.bubble.spalling-repair').click(function(){
          $(".bubble").hide();
          $(".blurb").hide();    
          $(".blurb.spalling-repair").slideToggle();
          });
          
          $('.bubble.facade-waterproofing').click(function(){
          $(".bubble").hide();
          $(".blurb").hide();    
          $(".blurb.facade-waterproofing").slideToggle();
          });  
          
          $('.bubble.external-window-sealing').click(function(){
          $(".bubble").hide();
          $(".blurb").hide();    
          $(".blurb.external-window-sealing").slideToggle();
          });
          
          $('.bubble.facade-rendering').click(function(){
          $(".bubble").hide();
          $(".blurb").hide();    
          $(".blurb.facade-rendering").slideToggle();
          });
          
          $('.bubble.landscape-waterproofing2').click(function(){
          $(".bubble").hide();
          $(".blurb").hide();    
          $(".blurb.landscape-waterproofing2").slideToggle();
          });
          
          $('.close').click(function(){
          $(".blurb").hide();    
          $(".bubble").show();
          });
          
           $(document).mouseup(function (e)
            {
                var container = $(".blurb");

                if (container.has(e.target).length === 0)
                {
                    container.hide();
                    $(".bubble").show();
                }
            });

</script>

<?php get_footer(); ?>