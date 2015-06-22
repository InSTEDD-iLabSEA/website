<?php get_header(); ?>	

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?> video">
			<h1><?php
				$custom_header = get_post_meta($post->ID, 'custom-header', TRUE);
				if ( $custom_header ) { echo $custom_header;} else { the_title();}?>
			</h1>
			<?php 
				$base_link = get_permalink();
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 	'post_type' 	=> 'press-release',
								'showposts' 	=> '10',
								'paged'			=> $paged,
								'order'			=> 'DESC',
								'orderby'		=> 'date'
								 );
				$press_items = new WP_Query( $args );?>
				<div class="items"><?php
				while( $press_items->have_posts() ) : $press_items->the_post();?>
					<div class="press-item">
						<div class="press-item-image"><?php
							$image = get_post_meta( $post->ID, '_press_release_image', TRUE );
							$link = get_post_meta( $post->ID, '_press_release_link', TRUE );?>
							<a href="<?php echo $link;?>" target="_blank"><img src="/wp-content/uploads/<?php echo $image;?>"></a>
						</div>
						<div class="press-item-link">
							<h3><a href="<?php echo $link;?>" target="_blank"><?php the_title();?></a></h3>
							<p class="publication-author"><?php echo get_the_date( 'F j, Y' );?></p>
						</div>
					</div><?php
				endwhile;?>
				</div><?php	
				if ( $press_items->max_num_pages > 1 ) : ?>
					<div class="cl">&nbsp;</div> 	
					<div id="nav-below" class="pagination">
						<?php 
						if ( $paged != 1 ) {?>
							<a href="<?php echo $base_link . 'page/' . ($paged - 1);?>" class="text-link-previous">&laquo; Previous</a>
						<?php }
						for( $i=1; $i<=$press_items->max_num_pages; $i++ ){?><a href="<?php echo $base_link . 'page/' . $i;?>" <?php echo ($paged==$i)? 'class="active number-link"':'class="number-link"';?>><?php echo $i;?></a>
						<?php }
						if( $paged != $press_items->max_num_pages ){?>
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
			<?php get_sidebar("press"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->


<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>