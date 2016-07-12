<?php
/*
Template Name: Interactive Graphic School
*/

get_header();
?>
<?php if ( have_posts() ) : the_post(); ?>

	<div class="row page-wrapper">
		<?php WpvTemplates::left_sidebar() ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( WpvTemplates::get_layout() ); ?>>
			<?php
			global $wpv_has_header_sidebars;
			if ( $wpv_has_header_sidebars ) {
				WpvTemplates::header_sidebars();
			}
			?>
			<div class="page-content">
<style>

/****** blurbs and bubble ******/
.action-picture { position: relative; }
.action-picture h2 {color:black; font-size: 24px; /*margin-left: 110px;*/}

.at-a-glance { background-image:url(<?php bloginfo('template_directory');?>/images/at-a-glance.jpg); background-repeat: no-repeat; width:75px; height:395px; position: absolute; top: 0px; left: 20px;/*box-shadow:2px 2px 14px #000; -webkit-box-shadow:2px 2px 14px #000; -moz-box-shadow:2px 2px 14px #000;-o-box-shadow:2px 2px 14px #000;-ms-box-shadow:2px 2px 14px #000;*/ border:2px solid white;  }
a.at-a-glance-back { float:right; color: white; margin-top: 10px; text-decoration: underline; }
a.at-a-glance:hover { color:white; text-decoration: none; }

.bubble { display:none; }
a.bubble {
	position: absolute;
	background: #033163;
        padding:10px;
        color: white;
         -o-transition:.15s;
        -ms-transition:.15s;
        -moz-transition:.15s;
        -webkit-transition:.15s;
        /* ...and now for the proper property */
        transition:.15s;
        text-align:center;
        
        
}

a.bubble:after {
	top: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
         -o-transition:.15s;
        -ms-transition:.15s;
        -moz-transition:.15s;
        -webkit-transition:.15s;
        /* ...and now for the proper property */
        transition:.15s;
}

a.bubble:after {
	border-color: rgba(3, 49, 99, 0);
	border-top-color: #033163;
	border-width: 20px;
	left: 50%;
	margin-left: -20px;
        -o-transition:.15s;
        -ms-transition:.15s;
        -moz-transition:.15s;
        -webkit-transition:.15s;
        /* ...and now for the proper property */
        transition:.15s;
}

a.bubble:hover { margin-top:-4px;background-color: #BB1237; border-color: #BB1237; text-decoration:none; }
a.bubble:hover:after { border-color: rgba(3, 49, 99, 0); border-top-color: #BB1237; text-decoration:none; }

/** PA HOSPITAL BUBBLES **/
a.bubble.flash-seal  { position: absolute; top: 388px; left: 625px; width: 175px; }
a.bubble.roof-repair { position: absolute; top: 390px; left: 255px; width: 105px; }
a.bubble.external-waterproofing { position: absolute; top: 210px; left: 520px; width: 140px; }
a.bubble.trafficable { position: absolute; top: 550px; left: 340px; width: 125px; }
a.bubble.building-waterproof { position: absolute; top: 325px; left: 940px; width: 125px; }
a.bubble.landscape-waterproof { position: absolute; top: 730px; left: 460px; width: 145px; }
a.bubble.concrete-roof-repair { position: absolute; top: 450px; left: 410px; width: 150px; }
a.bubble.window-sealing { position: absolute; top: 660px; left: 200px; width: 140px; }
a.bubble.penetration-sealing { position: absolute; top: 180px; left: 110px; width: 140px; }
a.bubble.gutter-maintenance { position: absolute; top: 180px; left: 860px; width: 140px; }

/** SCHOOL BUBBLES **/
a.bubble.tiled-roof-repair { position: absolute; top: 240px; left: 570px; width: 101px; }
a.bubble.expansion-joints { position: absolute; top: 330px; left: 532px; width: 96px; }
a.bubble.flashing { position: absolute; top: 320px; left: 420px; width: 55px; }
a.bubble.spalling-repair { position: absolute; top: 350px; left: 750px; width: 140px; }
a.bubble.facade-waterproofing { position: absolute; top: 465px; left: 675px; width: 175px; }
a.bubble.external-window-sealing { position: absolute; top: 498px; left: 955px; width: 140px; }
a.bubble.facade-rendering { position: absolute; top: 600px; left: 955px; width: 140px; }
a.bubble.landscape-waterproofing2 { position: absolute; top: 700px; left: 310px; width: 145px; }
.bubble p{
    color:#FFF;
}
.blurb { /*box-shadow:2px 2px 14px #000; -webkit-box-shadow:2px 2px 14px #000; -moz-box-shadow:2px 2px 14px #000;-o-box-shadow:2px 2px 14px #000;-ms-box-shadow:2px 2px 14px #000;*/ border:2px solid white; background-color:#033163; padding: 10px; color:white; /*box-shadow:2px 2px 24px #333; -moz-box-shadow:2px 2px 24px #333; -webkit-box-shadow:2px 2px 24px #333;*/ }
.blurb { display:none; width:500px; position: absolute; top:300px; left:50%; margin-left:-250px; }
.blurb h2 { color:white; }
.blurb a, .bubble a { color:white !important; text-decoration: underline; }
.blurb a:hover {text-decoration: none;}

.servicesPromo { float: right; margin-right: 30px; margin-top: 20px; }

.imageInsert { 
position: absolute;
top: 628px;
left: 837px;}

.imageInsert2 { 
position: absolute;
top: 50px;
left: 107px;}

.entry H1:first-child{
	color:#B81236;
	font-size:28px;
}
a.bubble.expander{
	width:450px;
}
                    div.blurb p{
                        color:#FFF !important;
                    }
</style>
                <div class="action-message">To view our Interactive Pages, please head to our Desktop Site</div>
<div class="action-picture">
                                

                                <div class="at-a-glance"></div>
                                 <h1 style="padding-left:100px;">Use your mouse to find out more</h1>
                                
                                    <img src="/wp-content/uploads/2015/09/school.jpg"/>
                                        
                                        <a href="#"class="bubble tiled-roof-repair">Tiled Roof Repairs</a>
                                        <div class="blurb tiled-roof-repair">
                                            <h2>Tiled Roof Repairs</h2>
                                            <p>To safeguard against unwanted water damage, R&BS will check your roof for broken or loose tiles and damaged flashing. It’s also extremely important to have the pointing checked and rectified on the ridge capping.</p>
                                            
                                        </div>
                                        
                                        <a href="#" class="bubble expansion-joints">Expansion Joints</a>
                                        <div class="blurb expansion-joints">
                                            <h2>Expansion Joints</h2>
                                            <p>Expansion joints and movement cracks are highly susceptible to water ingress, due to their purpose in the building structure. The highly cyclical nature of expansion and contraction that is absorbed by these areas results in the potential failure of the sealants. R&BS uses hi-tech and high-performance jointing systems in these applications, to extend the effectiveness of the watertight seal.</p>
                                            
                                        </div>
                                        
                                        <a href="#" class="bubble flashing">Flashings</a>
                                        <div class="blurb flashing">
                                            <h2>Flashings</h2>
                                            <p>The installation of new flashings, sarking membranes and valley gutters are all vital steps that R&BS will address in an inspection and report about the maintenance and longevity of your tiled roof areas. Our professional tradesmen will replace or repair these areas, should they require attention.</p>
                                            
                                        </div>
                                        
                                        <a href="#" class="bubble spalling-repair">Concrete Spalling Repair</a>
                                        <div class="blurb spalling-repair">
                                            <h2>Concrete Spalling Repair</h2>
                                            <p>Concrete spalling is a common issue in our climate due to the levels of carbonation and chloride in the air. R&BS specialises in the investigation, specification and repair of all areas of concrete spalling (concrete cancer). We work closely with engineers and architects, from the initial investigation of the repairs right through to the final inspection, to ensure that work is carried out to the highest of standards.</p>
                                            
                                        </div>
                                        
                                        <a href="#" class="bubble facade-waterproofing">Building Façade Waterproofing</a>
                                        <div class="blurb facade-waterproofing">
                                            <h2>Building Façade Waterproofing</h2>
                                            <p>Building facades have a wide diversity — from low-rise suburban office and warehouse facilities to high-rise, landmark structures. Therefore, the most efficient way of planning the rectification of façade areas is to carry out a comprehensive report detailing its condition. We believe this assessment is a critical starting point for any facade rehabilitation, in order to identify a realistic scope of work and cost estimate. </p>
                                            
                                        </div>
                                        
                                        <a href="#" class="bubble external-window-sealing">External Window Sealing</a>
                                        <div class="blurb external-window-sealing">
                                            <h2>External Window Sealing</h2>
                                            <p>The flexible rubber sealants that are used around windows as water stops are constantly exposed to temperature extremes and the elements — often causing them to become inflexible, and then deteriorate and crack. As these seals are vital for waterproofing windows, it is essential that they be inspected regularly to prevent serious water ingress and damage. R&BS will carry out an inspection of your window seals, and advise you on the best course of action to keep your building watertight.</p>
                                            
                                        </div>
                                        
                                        <a href="#" class="bubble facade-rendering">Façade Rendering</a>
                                        <div class="blurb facade-rendering">
                                            <h2>Façade Rendering</h2>
                                            <p>Colours add interest to buildings, and one cost effective way to achieve enhanced building vitality is through new technology renders. With today’s specially formulated polymers, a building’s appearance can be reinvigorated as well as waterproofed.</p>
                                            
                                        </div>
                                        
                                        <a href="#" class="bubble landscape-waterproofing2">Landscape Waterproofing</a>
                                        <div class="blurb landscape-waterproofing2">
                                            <h2>Landscape Waterproofing</h2>
                                            <p>Garden beds and landscaped areas contain salts, fertilizers and other chemicals that can be extremely corrosive. When your landscaped area begins to leak, it can have a very serious effect on the structural integrity of the reinforcing steel in the concrete slabs — which is why we always recommend an early intervention. This prevents any further damage being done, and saves you from carrying out larger, more complicated waterproofing and structural concrete repairs in the future.</p>
                                        
                                        </div>
                              </div>
                                                                      
			</div>

			<?php comments_template( '', true ); ?>
		</article>

		<?php WpvTemplates::right_sidebar() ?>
</div>
<script type="text/javascript">
(function($){    		
          $('.bubble.tiled-roof-repair').fadeIn('slow');
          $('.bubble.expansion-joints').delay(200).fadeIn('slow');
          $('.bubble.flashing').delay(300).fadeIn('slow');
          $('.bubble.spalling-repair').delay(400).fadeIn('slow');
          $('.bubble.facade-waterproofing').delay(500).fadeIn('slow');
          $('.bubble.external-window-sealing').delay(600).fadeIn('slow');
          $('.bubble.facade-rendering').delay(700).fadeIn('slow');
          $('.bubble.landscape-waterproofing2').delay(800).fadeIn('slow');
    
          $('.bubble.tiled-roof-repair').hover(
			  function(e) {	
			  	$(this).showBlurb("+=250px","-=250px");
			  }, function() {
				$(this).hideBlurb();
			  }
			);
          
          $('.bubble.expansion-joints').hover(
			  function(e) {	
			  	$(this).showBlurb("+=250px","-=250px");
			  }, function() {
				$(this).hideBlurb();
			  }
			);
          
          $('.bubble.flashing').hover(
			  function(e) {	
			  	$(this).showBlurb("+=250px","-=250px");
			  }, function() {
				$(this).hideBlurb();
			  }
			);
          
          $('.bubble.spalling-repair').hover(
			  function(e) {	
			  	$(this).showBlurb("+=250px","-=250px");
			  }, function() {
				$(this).hideBlurb();
			  }
			);
          
          $('.bubble.facade-waterproofing').hover(
			  function(e) {	
			  	$(this).showBlurb("+=250px","-=250px");
			  }, function() {
				$(this).hideBlurb();
			  }
			);  
          
          $('.bubble.external-window-sealing').hover(
			  function(e) {	
			  	$(this).showBlurb("+=250px","-=250px");
			  }, function() {
				$(this).hideBlurb();
			  }
			);
          
          $('.bubble.facade-rendering').hover(
			  function(e) {	
			  	$(this).showBlurb("+=250px","-=250px");
			  }, function() {
				$(this).hideBlurb();
			  }
			);
          
          $('.bubble.landscape-waterproofing2').hover(
			  function(e) {	
			  	$(this).showBlurb("+=250px","-=250px");
			  }, function() {
				$(this).hideBlurb();
			  }
			);
          
          $('.close').hover(
			  function(e) {	
			  	$(this).showBlurb("+=250px","-=250px");
			  }, function() {
				$(this).hideBlurb();
			  }
			);
          
           $(document).mouseup(function (e)
            {
                var container = $(".blurb");

                if (container.has(e.target).length === 0)
                {
                    container.hide();
                    $(".bubble").show();
                }
            });
			
		   $.fn.showBlurb = function( $width, $height) {
			   	var $element = $(this);
				var $blurb = $(this).next();
				
				$('#holding_pen').append( $element.html() ); //coral the old text
				$element.html(  $blurb.html() );
				$('.bubble').hide();
				$element.addClass('hideArrow');
				$element.show();
				$element.find('after').hide();
				$element.stop(true, true).animate({
						width: $width,
						left: $height
				},{duration: 50},{queue: true});			   
		  }; 
		  
		   $.fn.hideBlurb = function() {
			   	var $element = $(this);
				$('.bubble').show();				
				$element.removeAttr('style').attr("style", "display:inline");
				$element.removeClass('hideArrow');		  
				$element.html(  $('#holding_pen').contents() );
				$('#holding_pen').empty();						   
		  }; 
	  		  
			  			
})(jQuery);
</script>
<div id="holding_pen" style="display:none;"></div>
<?php endif;  ?>
<?php 
get_footer();
