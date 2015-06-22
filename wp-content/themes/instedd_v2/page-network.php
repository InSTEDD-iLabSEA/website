<?php
/*
	Template Name: Network Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content video left">
	<div class="playable-videos">
	<h2>Network</h2><br/>
	
	<?php 
							$all_categories = sort_categories(get_terms(array('Network Type'))); 
						?>
						<?php foreach ($all_categories as $c): ?>
						
							<div class="network-category-nav"><a href="#<?php echo $c->slug; ?>"><?php echo $c->name; ?></a></div>
							<?php
								$network = get_posts('orderby=menu_order&order=ASC&post_type=network&showposts=-1&network-type=' . $c->slug);
								$loopID = 0;
								foreach ($network as $v) {
									$network_link = get_meta('_network_link', $v->ID);
									$network_image = get_meta('_network_image', $v->ID);
									$loopID++;
									?>
																       
	
	
									<?php
								}
							?>
						
						<?php endforeach ?>
						
						
	<div style="clear:both;">&nbsp;</div>
	
	
	
	
	
	
	
						<?php 
							$all_categories = sort_categories(get_terms(array('Network Type'))); 
						?>
						<?php foreach ($all_categories as $c): ?>
							<h1><a name="<?php echo $c->slug; ?>"></a><?php echo $c->name; ?></h1>
							<span class="network-cat-back"><a href="#top">Back to Top</a></span>
							<?php
								$network = get_posts('orderby=menu_order&order=ASC&post_type=network&showposts=-1&network-type=' . $c->slug);
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
							<br />
						<?php endforeach ?>
					</div>

				</div>
				<?php // get_sidebar(); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>