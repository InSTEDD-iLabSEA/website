<?php
/*
	Template Name: Presentations Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content video left presentation">
					<h1><?php the_title(); ?></h1>
<?php
					$base_link = get_permalink();
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array( 	'post_type' 	=> 'presentation',
									'showposts' 	=> '10',
									'paged'			=> $paged,
									'order'			=> 'DESC',
									'orderby'		=> 'date'
									 );
					$presentations = new WP_Query( $args );

					$loopID = 0;
					if ( $paged == 1 ) {
						// First page of results ?>
						<div class="playable-videos"><?php
							while( $presentations->have_posts() ) : $presentations->the_post();
								if ( $loopID == 0 ) {?>
									<div class="presentation-container">
										<div style="float: left; width: 435px;"><h2><?php the_title(); ?></h2></div>
										<div style="float: right;"><a style="color: #51832e;" href="<?php echo get_permalink($post->ID); ?>">Permalink</a></div>
										<div class="image left">
											<?php $presentation_embed = get_post_meta($post->ID, '_presentation_embed', TRUE);?>
											<iframe src="http://www.slideshare.net/slideshow/embed_code/<?php echo $presentation_embed;?>" width="510" height="417" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
										</div>
										<div class="cl">&nbsp;</div>
									</div><?php
									$loopID++;	
								}
							endwhile;	
							addthis_share_button(); ?>
						</div>
						<div class="items">
							<h2>Recent Presentations</h2><?php 
							$loopID = 0;
							while( $presentations->have_posts() ) : $presentations->the_post();
								if ( $loopID > 0 ) { 
									// Skip the most recent presentation, since it's featured above	?>	
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
								}
								$loopID++;
							endwhile;?>
						</div><?php
					} else {
						// Subsequent pages of results?>
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
					}
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
				<?php get_sidebar("presentations"); ?>
				<div class="cl">&nbsp;</div>							
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>