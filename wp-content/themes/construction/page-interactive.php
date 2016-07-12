<?php
/*
Template Name: Interactive Graphic
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

.blurb { /*box-shadow:2px 2px 14px #000; -webkit-box-shadow:2px 2px 14px #000; -moz-box-shadow:2px 2px 14px #000;-o-box-shadow:2px 2px 14px #000;-ms-box-shadow:2px 2px 14px #000;*/ border:2px solid white; background-color:#033163; padding: 10px; color:white; /*box-shadow:2px 2px 24px #333; -moz-box-shadow:2px 2px 24px #333; -webkit-box-shadow:2px 2px 24px #333;*/ }
.blurb { display:none; width:500px; position: absolute; top:300px; left:50%; margin-left:-250px; }
.blurb h2 { color:white; }
.blurb a, .bubble a { color:white; text-decoration: underline; }
.bubble p { color:white; text-decoration: none; }
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
                        color:#FFF;
                    }
</style>
                <div class="action-message">To view our Interactive Pages, please head to our Desktop Site</div>
				<div class="action-picture">
                                <div class="at-a-glance"></div>
                                 <h2>Click on a service to find out more</h2>
                                
                                    <img src="<?php bloginfo('template_directory');?>/images/pa-hospital.jpg"/>
                                        
                                        <a class="bubble flash-seal" href="#">Metal Roof Flashing Seal & Repair</a>
                                        
                                        <div class="blurb flash-seal">
                                            <h2>Metal Roof Flashing Seal & Repair</h2>
                                            <p>A major cause of roof leaks is the deterioration of the flexible sealants used over the joins in flashings, around air-conditioning penetrations and around vent collars. Today’s advanced liquid membrane systems are reinforced with fibreglass, to provide a far longer lasting and durable solution than the original silicone and polyurethane mastic options.</p>
                                            <!--<div class="close"><a href="#">Close window</a></div>-->
                                        </div>

                                        <a class="bubble external-waterproofing" href="#">External Waterproofing Membrane Replacement</a>
                                        <div class="blurb external-waterproofing">
                                            <h2>External Waterproofing Membrane Replacement</h2>
                                            <p>Climatic conditions can age, dry and shrink older waterproofing materials, causing surface cracks to form. Eventually, as the barrier breaks down, moisture begins to seep into these cracks — creating damaging leaks and increasing the possibility of structural damage to the substrate slabs. This becomes evident as concrete spalling or concrete cancer. R&BS specialises in the removal and replacement of these membrane areas to remove water ingress and preserve the longevity of the building structure.</p>
                                            <!--<div class="close"><a href="#">Close window</a></div>-->
                                        </div>
                                        
                                        <a class="bubble roof-repair" href="#">Metal Roof Repair &amp; Maintenance</a>
                                        <div class="blurb roof-repair">
                                            <h2>Metal Roof Repair and Maintenance</h2>
                                            <p>Without regular roof maintenance, an industrial steel roof will oxidise — eventually forming rust. This rust will permeate through the original thin protective layer, causing the roof to leak. R&BS will seek out and replace ineffective fasteners, flashings and downpipes, and re-seal any deteriorated sealants. They have all the right equipment to re-coat, re-seal or, re-colour any commercial or industrial roof and/or wall.</p>
                                            <!--<div class="close"><a href="#">Close window</a></div>-->
                                        </div>
                                        
                                        <a class="bubble trafficable" href="#">Trafficable Waterproof Membrane</a>
                                        <div class="blurb trafficable">
                                            <h2>Trafficable Waterproof Membrane</h2>
                                            <p>Modern hi-tech and high-performance membranes are designed to handle climate-exposed decks and rooftops. But there are also specialised coating systems that have been developed to sustain a high level of vehicle movement, yet retain the flexible and waterproof properties required of a waterproof membrane. Talk to R&BS about the right specification for your complex. </p>
                                            <!--<div class="close"><a href="#">Close window</a></div>-->
                                        </div>
                                        
                                     
                                            <a class="bubble building-waterproof" href="#">Building Waterproofing</a>
                                            <div class="blurb building-waterproof">
                                                <h2>Building Waterproofing</h2>
                                                <p>Modern, high-tech buildings can often experience the ingress of water from many external areas, such as around windows, expansion joints and movement cracks in walls. Other spaces at risk include internal wet areas such as plant rooms, toilets/bathrooms and catering/kitchen areas. R&BS will rectify these spaces using specialised waterproofing systems that are designed to provide the essential protection required.</p>
                                            </div>
                                      
                                        
                                        <a class="bubble landscape-waterproof" href="#">Landscape Waterproofing</a>
                                        <div class="blurb landscape-waterproof">
                                            <h2>Landscape Waterproofing</h2>
                                            <p>R&BS provides landscape waterproofing solutions for a variety of areas, including planter boxes, podium landscapes, water features and rooftop gardens. We will inspect your structure to advise you about whether a positive or negative waterproofing system is right for you. Our team can organise your project from beginning to end — including the removal and re-landscaping of the area.</p>
                                        <!--<div class="close"><a href="#">Close window</a></div>-->
                                        </div>  
                                        
                                        <a class="bubble concrete-roof-repair" href="#">Concrete Roof Repair and Maintenance</a>
                                        <div class="blurb concrete-roof-repair">
                                            <h2>Concrete Roof Repair and Maintenance</h2>
                                            <p>R&BS will focus on thoroughly inspecting your roof, and then plan the most effective waterproofing rectification process, utilising the latest advances in waterproofing technologies. We specialise in the application of all types of roof membranes, including liquid membranes, torch on bituminous membranes, TPO/PVC membranes and protective epoxy coatings.</p>                                        
                                            <!--<div class="close"><a href="#">Close window</a></div>-->
                                        </div>  
                                        
                                        <a class="bubble window-sealing" href="#">External Window Sealing</a>
                                        <div class="blurb window-sealing">
                                            <h2>External Window Sealing</h2>
                                        <p>The rubber and flexible rubber sealants that are used around windows as water stops are constantly exposed to temperature extremes and the elements — often causing them to become inflexible, then deteriorate and crack. As these seals are vital for waterproofing, it is essential that they be inspected regularly to prevent serious water ingress and damage. R&BS will carry out an inspection of your window seals, and advise you on the best course of action to keep your building watertight.</p>
                                        <!--<div class="close"><a href="#">Close window</a></div>-->
                                        </div>  
                                        
                                        <a  class="bubble penetration-sealing" href="#">Metal Roof Penetration Sealing</a>
                                        <div class="blurb penetration-sealing">
                                            <h2>Metal Roof Penetration Sealing</h2>
                                            <p>Large commercial buildings with metal roofs often have rooftop mechanical plant rooms, which result in numerous penetrations of the roofing as well as increased foot traffic from service technicians. This all leads to damage of the roof sheeting and a high potential for water leaks. R&BS is highly experienced in the repair and servicing of these types of roofing applications.</p>
                                        <!--<div class="close"><a href="#">Close window</a></div>-->
                                        </div> 
                                          
                                        <a  class="bubble gutter-maintenance" href="#">Box Gutter Maintenance</a>
                                        <div class="blurb gutter-maintenance">
                                            <h2>Box Gutter Maintenance</h2>
                                            <p>Our extensive experience has shown that box gutter replacement is not necessarily the most cost-effective way of stopping leaks. Almost any leak can be resolved with today’s advanced liquid membrane systems, which are reinforced with fibreglass. These membranes can form an internal lining to the gutter — increasing the lifespan of the box gutters and avoiding the costly and invasive process of replacement.</p>
                                        <!--<div class="close"><a href="#">Close window</a></div>-->
                                        </div>    
                              
                              
                              <div class="imageInsert">
                            
                              </div></div>                  
			</div>

			<?php comments_template( '', true ); ?>
		</article>

		<?php WpvTemplates::right_sidebar() ?>
</div>
<script type="text/javascript">
(function($){
	            
          $('.bubble.flash-seal').fadeIn('slow');
          $('.bubble.roof-repair').delay(200).fadeIn('slow');
          $('.bubble.external-waterproofing').delay(300).fadeIn('slow');
          $('.bubble.trafficable').delay(400).fadeIn('slow');
          $('.bubble.landscape-waterproof').delay(500).fadeIn('slow');
          $('.bubble.building-waterproof').delay(600).fadeIn('slow');
          $('.bubble.concrete-roof-repair').delay(700).fadeIn('slow');
          $('.bubble.window-sealing').delay(800).fadeIn('slow');
          $('.bubble.penetration-sealing').delay(900).fadeIn('slow');
          $('.bubble.gutter-maintenance').delay(1000).fadeIn('slow');
            /*
          $('.bubble.flash-seal').click(function(){
	         $(".blurb.flash-seal").hideme();
			  return false;
          });
          
          $('.bubble.roof-repair').click(function(){
      	      $(".blurb.roof-repair").hideme();
			   return false;
	      });
          
          $('.bubble.external-waterproofing').click(function(){    
	          $(".blurb.external-waterproofing").hideme();	  
			   return false;
          });
          
          $('.bubble.trafficable').click(function(){ 
	          $(".blurb.trafficable").hideme();
			   return false;
          });
          
          $('.bubble.landscape-waterproof').click(function(){
	          $(".blurb.landscape-waterproof").hideme();
			   return false;
          });  
          
          $('.bubble.building-waterproof').hover(
			  function(e) {	
			  	$(this).showBlurb("+=250px","-=250px");
			  }, function() {
				$(this).hideBlurb();
			  }
			);		  
	
          
          $('.bubble.concrete-roof-repair').click(function(){
	          $(".blurb.concrete-roof-repair").hideme();
			   return false;
          });
          
          $('.bubble.window-sealing').click(function(){
	          $(".blurb.window-sealing").hideme();
			   return false;
          });
          
          $('.bubble.penetration-sealing').click(function(){
	          $(".blurb.penetration-sealing").hideme();
			   return false;
          });
          
          $('.bubble.gutter-maintenance').click(function(){
	          $(".blurb.gutter-maintenance").hideme();
			   return true;
          });
          
          
          $('.close').click(function(){
			  $(".blurb").hide();    
			  $(".bubble").show();
			  return false;
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
		   /* */
        /*
		   $.fn.hideme = function() {
			  $(".bubble").hide();
			  $(".blurb").hide();    
			  $(this).slideToggle();	
		  }; 
		  		  
		   $.fn.showme = function() {
			  $(".bubble").hide();
			  $(".blurb").hide();    
			  $(this).slideToggle();	
		  }; 	
		  		 
		   $.fn.showBlurb = function( $width, $height) {
			   	var $element = $(this);
				var $blurb = $(this).next();
				
				$('#holding_pen').append( $element.html() ); //coral the old text
				$element.html(  $blurb.html() );
				
				$element.stop(true, true).animate({
						width: $width,
						left: $height
				},{duration: 50},{queue: true});			   
		  }; 
		  
		   $.fn.hideBlurb = function() {
			   	var $element = $(this);
				$element.removeAttr('style').attr("style", "display:inline");		  
				$element.html(  $('#holding_pen').contents() );
				$('#holding_pen').empty();						   
		  }; 
          */
    $('.bubble.penetration-sealing').hover(
			  function(e) {	
                  e.stopImmediatePropagation();
			  	$(this).stop(true,true).showBlurb("+=250px","-=100px");
                  
			  }, function(e) {
                  e.stopImmediatePropagation();
				$(this).hideBlurb();
			  }
			);
    /*
    $('.bubble.building-waterproof').hover(
			  function(e) {	
                  e.stopImmediatePropagation();
			  	$(this).showBlurb("+=250px","-=0px");
                  
			  }, function(e) {
                  e.stopImmediatePropagation();
				$(this).hideBlurb();
			  }
			);
            */
            $('.bubble').hover(
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
               console.log($height);
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
               $element.css({'z-index': '999'});
		  }; 
		  
		   $.fn.hideBlurb = function(e) {
			   	var $element = $(this);
               console.log($element);
               console.log($('#holding_pen').contents());
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
