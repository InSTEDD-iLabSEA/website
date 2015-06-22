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
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.form.js"></script>


<?php /*?><!--[if IE 6]>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/DD_belatedPNG.js" type="text/javascript"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/ie6-png-fix.js" type="text/javascript"></script>
<![endif]-->
<?php */?></head>
<body <?php body_class(); ?>>
<a name="top">&nbsp;</a>
<div class="shell">
	<div id="header">
		<h1 id="logo" class="left"><a href="<?php echo get_option('home'); ?>" class="notext"><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></a></h1>
		<div id="navigation" class="right">
<?php /*?><ul id="menu-main-navigation" class="menu"><li id="menu-item-978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-978"><a href="http://instedd.org/about-us/">ABOUT US</a>

<ul class="sub-menu">
	<li id="menu-item-1380" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1380"><a href="http://instedd.org/about-us/guiding-principles/">GUIDING PRINCIPLES</a></li>
	<li id="menu-item-1382" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1382"><a href="http://instedd.org/about-us/history/">HISTORY</a></li>
	<li id="menu-item-1384" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1384"><a href="http://instedd.org/about-us/team/">TEAM</a></li>
	<li id="menu-item-1385" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1385"><a href="http://instedd.org/about-us/network/">NETWORK</a></li>
	<li id="menu-item-1474" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1474"><a href="http://instedd.org/about-us/press/">PRESS</a></li>
	<li id="menu-item-981" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-981"><a href="http://instedd.org/about-us/contact-us/">Contact Us</a></li>

</ul>
</li>
<li id="menu-item-1394" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1394"><a href="http://instedd.org/our-work/">OUR WORK</a>
<ul class="sub-menu">
	<li id="menu-item-1173" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1173"><a href="http://instedd.org/our-work/overview/">OVERVIEW</a></li>
	<li id="menu-item-1790" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1790"><a href="http://instedd.org/our-work/projects/">PROJECTS</a></li>
	<li id="menu-item-2248" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2248"><a href="http://instedd.org/our-work/ilab/">iLAB</a></li>
	<li id="menu-item-1405" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1405"><a href="http://instedd.org/our-work/consulting/">CONSULTING</a></li>

	<li id="menu-item-1475" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1475"><a href="http://instedd.org/our-work/publications/">PUBLICATIONS</a></li>
</ul>
</li>
<li id="menu-item-1736" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1736"><a href="http://instedd.org/technologies/">TECHNOLOGIES</a>
<ul class="sub-menu">
	<li id="menu-item-975" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-975"><a href="http://instedd.org/technologies/geochat/">GEOCHAT</a></li>
	<li id="menu-item-976" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-976"><a href="http://instedd.org/technologies/riff/">RIFF</a></li>
	<li id="menu-item-2414" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2414"><a href="http://instedd.org/technologies/nuntium/">NUNTIUM</a></li>

	<li id="menu-item-1339" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1339"><a href="http://instedd.org/technologies/mesh4x/">MESH4X</a></li>
	<li id="menu-item-1342" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1342"><a href="http://instedd.org/technologies/seentags/">SEENTAGS</a></li>
	<li id="menu-item-1343" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1343"><a href="http://instedd.org/technologies/resource-map/">RESOURCE MAP</a></li>
	<li id="menu-item-1341" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1341"><a href="http://instedd.org/technologies/geochat-polls/">GEOCHAT POLLS</a></li>
	<li id="menu-item-1338" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1338"><a href="http://instedd.org/technologies/reporting-wheel/">REPORTING WHEEL</a></li>
	<li id="menu-item-1340" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1340"><a href="http://instedd.org/technologies/veegilo/">VEEGILO</a></li>

</ul>
</li>
<li id="menu-item-300" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-300"><a href="http://instedd.org/blog/">Blog</a></li>
<li id="menu-item-373" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-373"><a href="http://instedd.org/multimedia/">Multimedia</a>
<ul class="sub-menu">
	<li id="menu-item-380" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-380"><a href="http://instedd.org/multimedia/photo-essays/">PHOTO ESSAYS</a></li>
	<li id="menu-item-381" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-381"><a href="http://instedd.org/multimedia/images/">IMAGES</a></li>
	<li id="menu-item-382" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-382"><a href="http://instedd.org/multimedia/video/">VIDEO</a></li>
	<li id="menu-item-383" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-383"><a href="http://instedd.org/multimedia/presentations/">PRESENTATIONS</a></li>

</ul>
</li>
</ul>	<?php */?>		
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