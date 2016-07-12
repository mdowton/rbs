</div><!-- end of copy -->
</div><!-- end of content area-->     
        
<div class="clear"></div>

        <div class="footer-wrap">
              <div class="footer">
              
<div class="address">&copy; <?php echo date("Y"); echo " "; ?> Roof &amp; Building Service. | 15 Ferrett St Eagle Farm Qld 4009 | 27 Mangrove Ln Taren Point NSW 2229 
<br/>

                <a href="http://roofandbuildingservice.com.au/terms-conditions/">Terms Of Use</a> |
                <a href="http://roofandbuildingservice.com.au/sitemap.xml"> Sitemap  </a> |
                <a href="http://roofandbuildingservice.com.au/privacy-policy">Privacy Policy</a> | 
                <a href="http://roofandbuildingservice.com.au/contact-us">Contact Us</a><br/>
                  
     <div class="footer-right">  
     <a href="http://www.crockfordcarlisle.com.au/" onclick="target='_blank';">Site by CC</a></div>
                  
                  
              </div>
	</div>

<?php wp_footer(); ?>

</div> <!-- END OF PAGE WRAP -->

<!-- Clear form field when clicked -->
<script type="text/javascript">
$(function() {
	$('.wpcf7-form').find('.field, .wpcf7-textarea').focus(function(){  $(this).val('');	});
});
</script>

<script type="text/JavaScript" src="<?php bloginfo('template_directory'); ?>/js/curvycorners.js"></script>

<script type="text/JavaScript"> 
  window.onload = function() {
    var settings = {
      tl: { radius: 15 },
      tr: { radius: 15 },
      bl: { radius: 15 },
      br: { radius: 15 },
      antiAlias: true
    }

    var divObj = document.getElementByClass("submit2, submit");
    curvyCorners(settings, divObj);

    // or, equivalently:
    curvyCorners(settings, '.submit2, submit');
  }

</script>

<script type="text/JavaScript"> 
  window.onload = function() {
    var settings = {
      tl: { radius: 6 },
      tr: { radius: 6 },
      bl: { radius: 6 },
      br: { radius: 6 },
      antiAlias: true
    }

    var divObj = document.getElementByClass("wpcf7-submit");
    curvyCorners(settings, divObj);

    // or, equivalently:
    curvyCorners(settings, '.wpcf7-submit');
  }

</script>

<script type="text/javascript">
$(function () {
    $('#menu-nav li').hover(function () {
        $(this).children('ul').delay(200).slideDown(200);
    }, function () {
        $(this).children('ul').delay(100).fadeOut("slow")
    });
});
</script>

<script type="text/JavaScript"> 
  window.onload = function() {
    var settings = {
      tl: { radius: 60 },
      tr: { radius: 60 },
      bl: { radius: 60 },
      br: { radius: 60 },
      antiAlias: true
    }

    var divObj = document.getElementByClass("sub-menu");
    curvyCorners(settings, divObj);

    // or, equivalently:
    curvyCorners(settings, '.sub-menu');
  }

</script>

<script type="text/javascript">
$(function() {
    $('.imageHover').hover(function() {
		
		var alt = $('img', this).attr('alt');
		var title = $('img', this).attr('title');
     		 
		$('img',this).after('<div class="enter"><a href="http://roofandbuildingservice.com.au/rbs/'+alt+'"> <div class="linkP"><h2>'+title+'</h2></div></a></div>');
		
	}, function() {
		$('.enter, .linkP').fadeOut('Xslow');
		$('.enter').remove(); 
    });
});


</script>

<script type="text/javascript">
var images = ['quote1.png', 'quote2.png', 'quote3.png', 'quote4.png'];

$('.rnd-quote').css({'background-image': 'url(<?php bloginfo('template_directory'); ?>/images/quotes/' + images[Math.floor(Math.random() * images.length)] + ')'});

$('.bubble').attr('title', 'Click to Read More');

$('#name').attr('placeholder','Name');
$('#company').attr('placeholder','Company');
$('#phone').attr('placeholder','Phone');
$('#email').attr('placeholder','Email');
$('#enquiry').attr('placeholder','Enquiry');

</script>

</div>
</body>
</html>