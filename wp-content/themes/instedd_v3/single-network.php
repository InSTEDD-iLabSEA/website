<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left-network'); ?>
				<div class="content press left publications single">
					<h1><?php the_title(); ?></h1>
					<div class="item"><?php 
						$network_image = get_meta('_network_image', $post->ID);
						$network_link = get_meta('_network_link', $post->ID);
						if ( $network_link ) {?>
							<a href="<? echo $network_link; ?>"><img src="<?php echo ecf_get_image_url($network_image); ?>" alt="" align="left" style="margin:5px;"  /></a><?php
							the_content(); 
							echo '<p><strong>Website:</strong> <a href="' .$network_link. '">' .$network_link . '</a></p>';
							echo "<p><strong>Category:</strong> " . get_the_term_list( $post->ID, 'network_group', '', ', ', '' ) . "</p>";
						} elseif ( $network_image ) {?>
							<img src="<?php echo ecf_get_image_url($network_image); ?>" alt="" align="left" style="margin: 5px 12px 5px 0;"  /><?php
							the_content(); 
							echo "<p><strong>Category:</strong> " . get_the_term_list( $post->ID, 'network_group', '', ', ', '' ) . "</p>";
						} else {
							the_content(); 
							echo "<p><strong>Category:</strong> " . get_the_term_list( $post->ID, 'network_group', '', ', ', '' ) . "</p>";
						}?>
					</div>
				</div>
				<?php get_sidebar("network"); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>