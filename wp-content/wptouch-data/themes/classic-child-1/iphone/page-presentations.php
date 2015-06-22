<?php get_header(); ?>	

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?> presentation">
			<h1><?php wptouch_the_title(); ?></h1>
			<?php
				$base_link = get_permalink();
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 	'post_type' 	=> 'presentation',
								'showposts' 	=> '10',
								'paged'			=> $paged,
								'order'			=> 'DESC',
								'orderby'		=> 'date'
								 );
				$presentations = new WP_Query( $args );?>
					<div class="items"><?php 
						while( $presentations->have_posts() ) : $presentations->the_post();?>
							<div class="item">
								<?php if ( get_the_post_thumbnail($post->ID) ): ?>
									<div class="image left">
										<a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'alignleft' ) );?></a>
									</div>
								<?php endif; ?>
								<div class="info left">
									<h3><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h3>
								</div>
								<div class="cl">&nbsp;</div>
							</div><?php 
							$loopID++;
						endwhile;?>
					</div><?php					
				if ( $presentations->max_num_pages > 1 ) : ?>
					<div class="cl">&nbsp;</div> 	
					<div id="nav-below" class="pagination">
						<?php 
						if ( $paged != 1 ) {?>
							<a href="<?php echo $base_link . 'page/' . ($paged - 1);?>" class="text-link-previous">&laquo; Previous</a>
						<?php }
						for( $i=1; $i<=$presentations->max_num_pages; $i++ ){?><a href="<?php echo $base_link . 'page/' . $i;?>" <?php echo ($paged==$i)? 'class="active number-link"':'class="number-link"';?>><?php echo $i;?></a>
						<?php }
						if( $paged != $presentations->max_num_pages ){?>
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
			<?php get_sidebar("presentations"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->


<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>