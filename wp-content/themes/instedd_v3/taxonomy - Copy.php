<?php
	$taxonomy = get_query_var('taxonomy');
	$taxonomy_term = get_query_var(sanitize_title_with_dashes($taxonomy));
	$term = get_term_by('slug', $taxonomy_term, $taxonomy);
	get_header(); 
?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content video left">
					<h2><?php echo $term->name; ?></h2>
						

	<div class="playable-videos">
						<?php 
							$network = query_posts('orderby=menu_order&order=ASC&post_type=network&showposts=-1&' . sanitize_title_with_dashes($taxonomy) . '=' . $term->slug);
							$loopID = 0;
							foreach ($network as $v) {
								$network_link = get_meta('_network_link', $v->ID);
								$network_image = get_meta('_network_image', $v->ID);
								$loopID++;
								?>
															       
       <div class="network-item"><a href="<? echo $network_link; ?>">	<h3><?php echo $v->post_title; ?></h3></a><a href="<? echo $network_link; ?>"><img src="<?php echo ecf_get_image_url($network_image); ?>" alt="" align="left" style="margin:5px;"  /></a><?php echo apply_filters('the_content', $v->post_content); ?> </div>
       <div class="cl">&nbsp;</div>
       
								
								
								<?php
							}
						?>
					</div>
					

				</div>
				<?php get_sidebar(); ?>
				<div class="cl">&nbsp;</div>
			</div>
<?php get_footer(); ?>