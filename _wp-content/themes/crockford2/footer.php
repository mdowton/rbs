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
(function($){

$.fn.exists = function(callback) {
  var args = [].slice.call(arguments, 1);

  if (this.length) {
    callback.call(this, args);
  }

  return this;
};

	$('.wpcf7-form').find('.field, .wpcf7-textarea').focus( function(){
			$(this).val('');
	});

/*
$('.wpcf7-submit').exists(function(){
    var settings = {
      tl: { radius: 6 },
      tr: { radius: 6 },
      bl: { radius: 6 },
      br: { radius: 6 },
      antiAlias: true
    }

    var divObj = $(".wpcf7-submit");
    curvyCorners(settings, divObj);

    // or, equivalently:
    curvyCorners(settings, '.wpcf7-submit');	
}
	
$('.submit').exists(function(){	
	
  var settings2 = {
      tl: { radius: 15 },
      tr: { radius: 15 },
      bl: { radius: 15 },
      br: { radius: 15 },
      antiAlias: true
    }

    var divObj2 = $(".submit2, .submit");
    curvyCorners(settings2, divObj2);

    // or, equivalently:
    curvyCorners(settings2, '.submit2, submit');	
}
*/
    $('#menu-nav li').hover(function () {
        $(this).children('ul').delay(200).slideDown(200);
    }, function () {
        $(this).children('ul').delay(100).fadeOut("slow")
    });	
	
    $('.imageHover').hover(function() {
		var backgroundColor = 'background-color: rgba(184, 18, 56, 0.9)';
		var alt = $('img', this).attr('alt');
		var title = $('img', this).attr('title');
     	//console.log('title: ' + title + ' --- ' + 'alt: ' + alt);
		$('img',this).after('<div class="enter"><a href="http://roofandbuildingservice.com.au/rbs/'+alt+'"><div class="linkP"><h2>'+title+'</h2></div></a></div>');
		
	}, function() {
		$('.enter, .linkP').fadeOut(1500, function() { $(this).remove(); });;
    });


	var images = ['quote1.png', 'quote2.png', 'quote3.png', 'quote4.png'];
	
	$('.rnd-quote').css({'background-image': 'url(<?php bloginfo('template_directory'); ?>/images/quotes/' + images[Math.floor(Math.random() * images.length)] + ')'});
	
	$('.bubble').attr('title', 'Click to Read More');
	
	$('#name').attr('placeholder','Name');
	$('#company').attr('placeholder','Company');
	$('#phone').attr('placeholder','Phone');
	$('#email').attr('placeholder','Email');
	$('#enquiry').attr('placeholder','Enquiry');
	
	
	
	
	
var calculateAge = function(birthday) {
    var now = new Date();
    var past = new Date(birthday);
    var nowYear = now.getFullYear();
    var pastYear = past.getFullYear();
    var age = nowYear - pastYear;

    return age;
};
    var $birthday = calculateAge('1928-12-30');
    $('.eighty-years').append( '<div class="heritage"> <span class="birthday" >' + $birthday + '</span> years </div>');
	
	$('.eighty-years-pages').append( '<div class="heritage"> <span class="birthday" >' + $birthday + '</span> years </div>');
	
	$('.page-template-page-about-php .content-page h1, .page-template-page-about-php .content-page p').each(function() {
		var text = $(this).text();
		text = text.replace("80", $birthday);
		$(this).text(text);
	});
	
	
	$(window).load(function() {
        //$('.rnd-quote').nivoSlider();
    });
	
	
	
})(jQuery);
</script>

 
    

</div>
</body>
</html>