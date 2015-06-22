<?php
	global $post;
	$anc = get_page_by_path('news-media');
	$args = array( 
		'menu'			=>	119
	);
?>
<div id="sidebar" class="section-nav">
	<ul>
		<li class="widget">
			<a href=" <?php echo get_permalink($anc->ID) ?> "><h2 class="widgettitle"><?php echo apply_filters('the_title', $anc->post_title); ?></h2></a>
			<ul>
				<?php wp_nav_menu( $args );?>
			</ul>
		</li>
	</ul>
</div>