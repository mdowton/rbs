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
	
    $('.imageHover').on({
		mouseover:function()
		{
			var backgroundColor = 'background-color: rgba(184, 18, 56, 0.9)';
			var alt = $('img', this).attr('alt');
			var title = $('img', this).attr('title');
			//console.log('title: ' + title + ' --- ' + 'alt: ' + alt);
			$('img',this).after('<div class="enter"><a href="http://roofandbuildingservice.com.au/rbs/'+alt+'"><div class="linkP"><h2>'+title+'</h2></div></a></div>');
		},
		mouseleave:function() 
		{
			$('.enter, .linkP').fadeOut(1500, function() { $(this).remove(); } );
    	}
	});

	$('#name').attr('placeholder','Name');
	$('#company').attr('placeholder','Company');
	$('#phone').attr('placeholder','Phone');
	$('#email').attr('placeholder','Email');
	$('#enquiry').attr('placeholder','Enquiry');
	
	
	
	
	
    var $birthday = "<?php the_field('years_in_business','options'); ?>";
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
	
	<?php
	// Comment out as the code errors in chrome
	// And I can't see if it does anthying important
	/*


	var ua = navigator.userAgent;
	var b = jQuery.browser;
	b.engine = '';
	b.mobile = false;
 
	if(/Windows/.test(ua)){
		b.os = 'win';
		b.win = true;
	}else if(/Mac/.test(ua)){
		b.os = 'mac';
		b.mac = true;
	}else if(/iPhone/.test(ua)){
		b.os = 'iphone';
		b.iphone = true;
	}
 
	if(/Chrome/.test(ua)){
		b.safari = false;
		b.chrome = true;
	}
 
	if(/Gecko/.test(ua)){
		b.gecko = true;
		b.engine = 'gecko'
	}if(/WebKit/.test(ua)){
		b.gecko = false;
		b.webkit = true;
		b.engine = 'webkit'
	}
 
	if(/Mobile/i.test(ua)){
		b.mobile = true;
	}
	
	if(b.msie){
		b.name = 'msie';
	}else if(b.opera){
		b.name = 'opera';
	}else if(b.safari){
		b.name = 'safari';
	}else if(b.chrome){
		b.name = 'chrome';
	}else if(b.mozilla){
		b.name = 'mozilla';
	}
 
	if(b.msie){
		b.ver = /MSIE (\d(.\d+)?)/.exec(ua)[1];
	}else if(b.mozilla){
		b.ver = /Firefox\/(\d(.\d+)?)/.exec(ua)[1];
	}else if(b.opera){
		b.ver = /Opera\/? ?(\d(\.\d+)?)/.exec(ua)[1];
	}else if(b.safari){
		b.ver = /Version\/(\d(\.\d+)+)/.exec(ua)[1];
	}else if(b.chrome){
		b.ver = /Chrome\/(\d(\.\d+)+)/.exec(ua)[1];
	}
 
$.fn.addEnvClass = function() {
	return this.each(function(){
		var self = jQuery(this);
		var b = jQuery.browser;
		self
			.addClass('js')
			.addClass(b.os)
			.addClass(b.name)
			.addClass(b.engine)
			.addClass('ver'+b.ver);
	
		if(b.mozilla){
			self.addClass('ff' + parseInt(b.ver));
		}
	})
};
 
$('html').addEnvClass();
 */
 ?>
})(jQuery);
</script>

 
    

</div>
<!-- ReachLocal - Tracking Code  -->
<script type="text/javascript">var rl_siteid = "2acfb29f-a546-44d2-8ee5-d3ef6bf51f1b";</script>
<script type="text/javascript" src="//cdn.rlets.com/capture_static/mms/mms.js" async="async"></script>
</body>
</html>