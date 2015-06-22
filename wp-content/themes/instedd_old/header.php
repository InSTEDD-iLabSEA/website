<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/aller.font.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.jcarousel.pack.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/func.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/mailchimp.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/slidingboxes.js" type="text/javascript"></script>
<script type="text/javascript" src="http://downloads.mailchimp.com/js/jquery.validate.js"></script>
<script type="text/javascript" src="http://downloads.mailchimp.com/js/jquery.form.js"></script>


<!--[if IE 6]>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/DD_belatedPNG.js" type="text/javascript"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/ie6-png-fix.js" type="text/javascript"></script>
<![endif]-->
</head>
<body <?php body_class(); ?>>
<div class="shell">
	<div id="header">
		<h1 id="logo" class="left"><a href="<?php echo get_option('home'); ?>" class="notext"><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></a></h1>
		<div id="navigation" class="right">
			<?php wp_nav_menu('theme_location=main-menu&depth=0&fallback_cb=&container='); ?>
		</div>
		<div class="cl">&nbsp;</div>
		<div class="holder">
			<div class="left">
				<?php get_search_form(); ?>
			</div>
			<a href="<?php echo get_option('donate_button_url'); ?>" class="btn-donate-big notext right">Donate</a>
			<div class="cl">&nbsp;</div>
		</div>
	</div>