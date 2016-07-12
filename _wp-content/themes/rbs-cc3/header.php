<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--[if lt IE 7]> <html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>    <html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>    <html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!--> <html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class=""> <!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">

	

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

      

	<?php if (is_search()) { ?>

	   <meta name="robots" content="noindex, nofollow" /> 

	<?php } ?>



	<title><?php if (function_exists('is_tag') && is_tag()) {

		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }

		      elseif (is_archive()) {

		         wp_title(''); echo ' Archive - '; }

		      elseif (is_search()) {

		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }

		      elseif (!(is_404()) && (is_single()) || (is_page())) {

		         wp_title(''); echo ' - '; }

		      elseif (is_404()) {

		         echo 'Not Found - '; }

		      if (is_home()) {

		         bloginfo('name'); echo ' - '; bloginfo('description'); }

		      else {

		          bloginfo('name'); }

		      if ($paged>1) {

		         echo ' - page '. $paged; } ?>

    </title>

	

	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/nivo-slider.css" />  



     <!--[if lt IE 9]>

        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>

    <![endif]-->      

    

    <!--[if IE 7]>

        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie7.css" />

    <![endif]-->     

      

      

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	

        <?php wp_head(); 

		/*      

	<script type="text/javascript">

    

      var _gaq = _gaq || [];

      _gaq.push(['_setAccount', 'UA-36520015-1']);

      _gaq.push(['_trackPageview']);

    

      (function() {

        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

      })();

    </script>

	*/

     ?>

  	

</head>

<?php /*
<script src='http://widget.rlcdn.net/widget/rl_chatwidget.js'></script>
<script>var id ='AUS253887'; var rl_adid='22553'; var rl_key = '122657'; rl_chatinit(id, rl_adid, rl_key) ;</script>
*/ ?>


<!-- Website Chat -->
<script src='http://widget.rlcdn.net/widget/rl_chatwidget.js'></script>
<script>var id ='AUS262889'; var rl_adid='266493'; var rl_key = '366597'; rl_chatinit(id, rl_adid, rl_key) ;</script>
<body <?php body_class(); ?>>

<div id="rbs"> 

		<div class="header-wrap"> 

   			<div class="header"> 

                   <a href="<?php bloginfo('url'); ?>" class="logo"><img src="<?php bloginfo('template_directory'); ?>/images/rbs-logo.png" alt="Roof &amp; Building Service" /></a>

                                        

            	<div class="cta"> 

					<?php wp_nav_menu(); ?>

                    <h3> Ph: 1800 550 037</h3>

                </div>   

            </div>     

       </div> 

    

    

    <div class="clear"></div>

      

    

        <div id="page-wrap">

                <div class="content"> <!-- start main content -->

            

            

              

               