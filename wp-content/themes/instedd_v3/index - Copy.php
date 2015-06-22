<?php get_header(); ?>
	<div id="main" class="inner">
		<?php get_sidebar('left'); ?>
		<div class="content blog-content left">
			<h1><?php the_title(); ?></h1><?php
				$base_link = get_permalink();
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 	'post_type' 	=> 'post',
								'showposts' 	=> '10',
								'paged'			=> $paged,
								'order'			=> 'DESC',
								'orderby'		=> 'date'
								 );
				$posts = new WP_Query( $args );		
				if ( $paged == 1 ) {		
					the_featured_blog_posts();?>
					<h2>Recent Posts</h2><?php 
				}?>
			<?php $loopID = 0;
			while ($posts->have_posts()) : $posts->the_post(); 
				if ( $loopID > 0 ) { 
					// Skip the most recent post, since it's featured above	?>
					<div class="item">
						<?php $image = get_meta('_post_blog_image'); ?>
						<?php if ($image): ?>
							<div class="image">
								<a href="<?php the_permalink(); ?>"><img src="<?php echo ecf_get_image_url($image); ?>" alt="" class="alignleft" /></a>
							</div>
						<?php endif ?>
						<div class="excerpt">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="publication-author"><?php the_time('F j, Y'); ?></p>
							<?php the_excerpt(); ?>
						</div>
					</div>
					<div class="cl">&nbsp;</div><?php
				}
				$loopID++;
			endwhile; 
			if ( $posts->max_num_pages > 1 ) : ?>
				<div class="cl">&nbsp;</div> 	
				<div id="nav-below" class="pagination">
					<?php 
					if ( $paged != 1 ) {?>
						<a href="<?php echo $base_link . 'page/' . ($paged - 1);?>" class="text-link-previous">&laquo; Newer posts</a>
					<?php }
					for( $i=1; $i<=$posts->max_num_pages; $i++ ){?><a href="<?php echo $base_link . 'page/' . $i;?>" <?php echo ($paged==$i)? 'class="active number-link"':'class="number-link"';?>><?php echo $i;?></a>
					<?php }
					if( $paged != $posts->max_num_pages ){?>
						<a href="<?php echo $base_link . 'page/' . ($paged + 1);?>" class="text-link-next">Older posts &raquo;</a>
					<?php } ?>
				</div><!-- #nav-below -->
			<?php endif; 								
			wp_reset_query();?>
		</div>
		<?php get_sidebar("blog"); ?>
		<div class="cl">&nbsp;</div>
	</div>
<?php get_footer(); ?>