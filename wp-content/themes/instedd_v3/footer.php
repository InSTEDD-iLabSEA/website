	<div id="footer">
		<div id="sitemap">
			<a class="logo" href="/">&nbsp;</a>
			<?php wp_nav_menu( array(
				'theme_location'	=> 'main-menu',
				'depth'				=> '0')
				); ?>
			<div id="sitemap-misc">
				<?php wp_nav_menu( array(
					'theme_location'	=> 'main-menu',
					'menu'				=> 'Footer',
					'depth'				=> '0')
					); ?>
			</div>
			<br />
			<div id="sitemap-socials">
				<?php dynamic_sidebar('tertiary-menu'); ?>
				<p class="copyright">&copy; 2006-<? print date("Y");?> InSTEDD</p>
			</div>
			<div class="cl">&nbsp;</div>
		</div>
	</div>
</div>

<?php 
// Since some custom post types live beneath pages, use jQuery to highlight current page parent in menu
$post_type = get_post_type();
switch( $post_type ) {
	case "event":
		highlight_page_parent("978");
		break;
	case "network":
	case "map_post":
		highlight_page_parent("1394");
		break;
	case "post":
	case "publication":
	case "presentation":
	case "video":
		highlight_page_parent("373");
		break;
}

// Since some custom post types live beneath pages, use jQuery to highlight current page parent in submenu
$post_type = get_post_type();
switch( $post_type ) {
	case "event":
		highlight_page_parent_submenu("912");
		break;
/*	case "post":
		break;
*/	case "map_post":
		highlight_page_parent_submenu_cats("3325");
		break;
	case "network":
		highlight_page_parent_submenu_cats("3341");
		break;
	case "publication":
		highlight_page_parent_submenu("948");
		break;
	case "presentation":
		highlight_page_parent_submenu("99");
		break;
	case "video":
		highlight_page_parent_submenu("95");
		// Special case for blog post paged archives; custom post type "video" 
		// is being incorrectly applied
		highlight_page_parent_submenu_cats("3439");	 
		break;
}
?>
<script type="text/javascript">	
	Cufon.now();
</script>
<?php wp_footer(); ?>
</body> 
</html>