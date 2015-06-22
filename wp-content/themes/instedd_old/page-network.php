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
					<h2><?php the_title(); ?></h2>
						

	<div class="playable-videos">
						<?php 
							$network = get_posts('post_type=network&showposts=-1');
							$loopID = 0;
							foreach ($network as $v) {
								$network_link = get_meta('_network_link', $v->ID);
								$network_image = get_meta('_network_image', $v->ID);
								$loopID++;
								?>
															       
       <div class="network-item"><a href="<? echo $network_link; ?>">	<h3><?php echo $v->post_title; ?></h3></a><a href="<? echo $network_link; ?>"><img src="<?php echo ecf_get_image_url($network_image); ?>" alt="" align="left" style="margin:5px;"  /></a><?php echo apply_filters('the_content', $v->post_content); ?> </div>
       
       
								
								
								<?php
							}
						?>
					</div>
					

				</div>
				<?php get_sidebar(); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>