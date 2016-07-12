<?php
/**
 * Header template
 *
 * @package wpv
 * @subpackage construction
 */
?><!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-ie no-js"> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title(); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php wpvge( 'favicon_url' )?>"/>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<?php wp_head(); ?>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-36520015-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Website Chat -->
<script src='http://widget.rlcdn.net/widget/rl_chatwidget.js'></script>
<script>var id ='AUS262889'; var rl_adid='266493'; var rl_key = '366597'; rl_chatinit(id, rl_adid, rl_key) ;</script>
<script type="text/javascript">var rl_siteid = "2acfb29f-a546-44d2-8ee5-d3ef6bf51f1b";</script>
<script type="text/javascript" src="//cdn.rlets.com/capture_static/mms/mms.js" async="async"></script>
</head>
<body <?php body_class( 'layout-'.WpvTemplates::get_layout() ); ?>>
	<span id="top"></span>
	<?php do_action( 'wpv_body' ) ?>
	<div id="page" class="main-container">

		<?php include( locate_template( 'templates/header/top.php' ) );?>

		<?php do_action( 'wpv_after_top_header' ) ?>

		<div class="boxed-layout">
			<div class="pane-wrapper clearfix">
				<?php include( locate_template( 'templates/header/middle.php' ) );?>
				<div id="main-content">
					<?php include( locate_template( 'templates/header/sub-header.php' ) );?>
					<!-- #main ( do not remove this comment ) -->
					<div id="main" role="main" class="wpv-main layout-<?php echo esc_attr( WpvTemplates::get_layout() ) ?>">
						<?php do_action( 'wpv_inside_main' ) ?>

						<?php if ( WPV_Columns::had_limit_wrapper() ): ?>
							<div class="limit-wrapper">
						<?php endif ?>
