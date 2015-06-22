<?php
	$taxonomy = get_query_var('taxonomy');
	$taxonomy_term = get_query_var(sanitize_title_with_dashes($taxonomy));
	$term = get_term_by('slug', $taxonomy_term, $taxonomy);
	get_header(); 
?>
	<div id="main" class="inner">
		<?php get_sidebar('left-network'); ?>
		<div class="content network left">
			<h1>Network: <?php echo $term->name; ?></h1>
			<div class="playable-videos">
				<?php 
					$network = query_posts('orderby=menu_order&order=ASC&post_type=network&showposts=-1&' . sanitize_title_with_dashes($taxonomy) . '=' . $term->slug);
					$loopID = 0;
					foreach ($network as $v) {
						$network_link = get_meta('_network_link', $v->ID);
						$network_image = get_meta('_network_image', $v->ID);
						$loopID++;
						?>													   
					<div class="network-item"><?php
						if ( $network_link ) {?>
							<a href="<? echo $network_link; ?>"><h2><?php echo $v->post_title; ?></h2></a><?php
							if ( $network_image ) {?>
								<a href="<? echo $network_link; ?>"><img src="<?php echo ecf_get_image_url($network_image); ?>" alt="" align="left" style="margin:5px;"  /></a><?php
							}
							echo apply_filters('the_content', $v->post_content);
							echo '<p><strong>Website:</strong> <a href="' .$network_link. '">' .$network_link . '</a></p>';
						} else {?>
							<h2><?php echo $v->post_title; ?></h2><?php
							if ( $network_image ) {?>
								<img src="<?php echo ecf_get_image_url($network_image); ?>" alt="" align="left" style="margin: 5px 12px 5px 0;"  /><?php
							}
							echo apply_filters('the_content', $v->post_content);?>
							<div class="cl">&nbsp;</div><?php
						} ?>
					</div>
					<div class="cl">&nbsp;</div><?php
					}
				?>
			</div>
		</div>
		<?php get_sidebar("network"); ?>
		<div class="cl">&nbsp;</div>
	</div>
<?php get_footer(); ?>