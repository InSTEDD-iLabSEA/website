<?php
/*
	Template Name: Press Index
*/
?>
<?php get_header(); ?>
<div id="main" class="inner">
	<?php get_sidebar('left'); ?>
	<div class="content video left">
		<h1><?php the_post(); the_title(); ?></h1>
		<div class="entry">
			<?php 
				$temp = $wp_query;
				$args = array( 	'post_type' 	=> 'press-release',
								'showposts' 	=> '-1',
								'paged'			=> $paged,
								'order'			=> 'DESC',
								'orderby'		=> 'date'
								 );
				$press_items = new WP_Query( $args );											

				$loopID = 0;
				while( $press_items->have_posts() ) : $press_items->the_post();
					if ( $loopID == 0 ) {?>
						<div class="press-container"><?php
								//$image = get_post_meta( $post->ID, '_press_release_image', TRUE );
								$link = get_post_meta( $post->ID, '_press_release_link', TRUE );?>
							<h2><a href="<?php echo $link;?>" target="_blank"><?php the_title(); ?></a></h2>
							<p class="publication-author"><?php echo get_the_date( 'F d, Y' );?></p>
								<a href="<?php echo $link;?>" target="_blank"><?php echo get_the_post_thumbnail($id, '', array('class' => 'alignright'))?></a>
								<?php the_content();?>
								<p style="margin-bottom: 0;"><a href="<?php echo $link;?>" target="_blank">Read the complete article&nbsp;&raquo;</a></p>
							<div class="cl">&nbsp;</div>
						</div>
					<?php
					$loopID++;
					}
				endwhile;	

				$loopID = 0;?>
				<h2>Recent Press About InSTEDD</h2><?php
				while( $press_items->have_posts() ) : $press_items->the_post();
					if ( $loopID > 0 ) { 
					// Skip the most recent press link, since it's featured above ?>
						<div class="press-item">
							<div class="press-item-image"><?php
								$image = get_post_meta( $post->ID, '_press_release_image', TRUE );
								$link = get_post_meta( $post->ID, '_press_release_link', TRUE );?>
								<a href="<?php echo $link;?>" target="_blank"><img src="/wp-content/uploads/<?php echo $image;?>"></a>
							</div>
							<div class="press-item-link">
								<h3><a href="<?php echo $link;?>" target="_blank"><?php the_title();?></a></h3>
								<p class="publication-author"><?php echo get_the_date( 'F d, Y' );?></p>
							</div>
						</div><?php
					}
				$loopID++;
					
				endwhile;	
//						echo "navigation";			
				previous_posts_link('Older Entries', 0);
				next_posts_link('Older Entries', 0);
				if (  $press_items->max_num_pages > 1 ) : ?>
					<div id="nav-below" class="navigation">
						<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older links', 'instedd_v2' ) ); ?></div>
						<div class="nav-next"><?php previous_posts_link( __( 'Newer links <span class="meta-nav">&rarr;</span>', 'instedd_v2' ) ); ?></div>
					</div><!-- #nav-below -->
				<?php endif; 
				wp_reset_query()
					//wp_reset_postdata(); ?>

				
		</div>
	</div>
	<?php get_sidebar("press"); ?>
	<div class="cl">&nbsp;</div>
</div>
<?php get_footer(); ?>