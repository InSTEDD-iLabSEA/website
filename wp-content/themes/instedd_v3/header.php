<?php ini_set('display_errors', '0');
error_reporting(E_ALL | E_STRICT); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>InSTEDD iLab Southeast Asia</title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style-v3.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" type="text/css" media="print" />
<!--[if IE 6]>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/DD_belatedPNG.js" type="text/javascript"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/ie6-png-fix.js" type="text/javascript"></script>
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie7-only.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie7.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 8]>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie7.css" type="text/css" media="screen" />
<![endif]-->
<!--[if gte IE 9]>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie9.css" type="text/css" media="screen" />
<![endif]-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />
<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-precomposed.png" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-48438324-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</head>
<body <?php body_class(); ?>>
<a name="top">&nbsp;</a>
<div class="shell">
	<div id="header">
		<?php if ( is_front_page() ) {?>
			<h1 id="logo" class="left"><a href="<?php echo get_option('home'); ?>" class="notext"><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></a></h1>
		<?php } else { ?>
			<div id="logo" class="left"><a href="<?php echo get_option('home'); ?>" class="notext"><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></a></div>
		<?php } ?>
		<div id="secondary-menu">
			<?php dynamic_sidebar('secondary-menu'); ?>
		</div>
		<div id="tertiary-menu">
			<?php dynamic_sidebar('tertiary-menu'); ?>
		</div>
	</div>
	<div id="navigation">
		<?php wp_nav_menu('theme_location=main-menu&depth=0&fallback_cb=&container='); ?>
		<?php get_search_form(); ?> 
	</div>
	<div id="header_print_container">	
		<div id="header_print"><img src="/wp-content/themes/instedd_v3/images/InSTEDD-Logo-v2.png" /><? print $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"] ?></div>
	</div>