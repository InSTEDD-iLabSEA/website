<?php

function shortcode_press_releases($atts, $content) {
	ob_start();
	query_posts('post_type=press-release&showposts=-1&orderby=menu_order&order=DESC');
	if (have_posts()) {
		$loopID = 0;
		echo '<div class="logos">';
		while (have_posts()) {
			the_post();
			$link = get_meta('_press_release_link');
			$image = get_meta('_press_release_image');
			if (!$image) {
				continue;
			}
			$loopID++;
			?>
				            	
	              <div class="boxgrid captionfull">
	<a target="_blank" href="<?php echo ($link) ? $link : '#'; ?>" class="<?php echo ($loopID % 4 == 0) ? 'last ' : ''; ?>left"><img class="1logobox" src="<?php echo ecf_get_image_url($image); ?>" alt="" /></a>
	<div class="cover boxcaption">
	<p>	<a target="_blank" href="<?php echo ($link) ? $link : '#'; ?>" class="<?php echo ($loopID % 4 == 0) ? 'last ' : ''; ?>left"><? the_title(); ?></a></p>
	</div>
</div>
	
			<?php
			if ($loopID % 4 == 0) {
				echo '<div class="cl">&nbsp;</div>';
			}
		}
		echo '</div>';
	}
	wp_reset_query();
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode('press-releases', 'shortcode_press_releases');

?>