<?php get_header(); ?>	

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?> video">
			<h1><?php wptouch_the_title(); ?></h1>
			<?php
				$base_link = get_permalink();
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 	'post_type' 	=> 'video',
								'showposts' 	=> '10',
								'paged'			=> $paged,
								'order'			=> 'DESC',
								'orderby'		=> 'date'
								 );
				$videos = new WP_Query( $args );?>
				<div class="items"><?php 
					while( $videos->have_posts() ) : $videos->the_post();
							$video_url = get_meta('_video_url', $post->ID);?>
							<div class="item">
								<div class="image left">
									<a href="<?php echo get_permalink($post->ID); ?>"><img src="<?php echo get_youtube_thumbnail($video_url) ?>" width="100" height="83" alt="" /></a>
								</div>
								<div class="info left">
									<h3><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h3>
									<?php echo apply_filters('the_content', $post->post_content); ?>
								</div>
								<div class="cl">&nbsp;</div>
							</div><?php 
						$loopID++;
					endwhile;?>
				</div><?php					
				if ( $videos->max_num_pages > 1 ) : ?>
					<div class="cl">&nbsp;</div> 	
					<div id="nav-below" class="pagination">
						<?php 
						if ( $paged != 1 ) {?>
							<a href="<?php echo $base_link . 'page/' . ($paged - 1);?>" class="text-link-previous">&laquo; Previous</a>
						<?php }
						for( $i=1; $i<=$videos->max_num_pages; $i++ ){?><a href="<?php echo $base_link . 'page/' . $i;?>" <?php echo ($paged==$i)? 'class="active number-link"':'class="number-link"';?>><?php echo $i;?></a>
						<?php }
						if( $paged != $videos->max_num_pages ){?>
							<a href="<?php echo $base_link . 'page/' . ($paged + 1);?>" class="text-link-next">Next &raquo;</a>
						<?php } ?>
					</div><!-- #nav-below -->
				<?php endif; 					
				wp_reset_query();?>	
		</div>
		
	</div><!-- wptouch_posts_classes() -->

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>">
			<?php get_sidebar("left"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>">
			<?php get_sidebar("video"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->


<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>