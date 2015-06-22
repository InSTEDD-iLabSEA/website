<?php get_header(); ?>

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?>">
			<h1><?php
				$custom_header = get_post_meta($post->ID, 'custom-header', TRUE);
				if ( $custom_header ) { echo $custom_header;} else { the_title();}?>
			</h1>
					<?php
					echo '<h3 class="midlevel">Staff</h3>';
					$team_staff = new WP_Query();
					$team_staff->query( 'showposts=-1&post_parent=3061&post_type=page&orderby=menu_order&order=ASC' );
					while ( $team_staff->have_posts() ) : $team_staff->the_post(); ?>
						<div class="item team">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<?php $subhead = get_post_meta( $post->ID, '_page_subhead', TRUE );
							if ( $subhead ) {
								print '<div class="subhead index">' . $subhead . '</div>';
							} ?>
							<a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail( $page->ID, 'thumbnail', array('class' => 'alignleft') );?></a>
							<?php 
							// Allow the "More" link
							global $more;
							$more = 0;
							// Remove images from the "More" content
							$content = preg_replace('/<img[^>]+./','',get_the_content( 'Read&nbsp;more&nbsp;&raquo;' ));
							// Remove <p></p> from the "More" content
							$content = preg_replace('/<(\/)*p>/','',$content);?>
							<p><?php echo $content; ?></p>
							<div class="cl">&nbsp;</div>			
						</div>
					<?php endwhile; 
					wp_reset_query();
					
					echo '<h3 class="midlevel">Outside Board Members</h3>';
					
					$board_staff = new WP_Query();
					$board_staff->query( 'showposts=-1&post_parent=3066&post_type=page&orderby=menu_order&order=ASC' );
					while ( $board_staff->have_posts() ) : $board_staff->the_post(); ?>
						<div class="item team">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<?php $subhead = get_post_meta( $post->ID, '_page_subhead', TRUE );
							if ( $subhead ) {
								print '<div class="subhead index">' . $subhead . '</div>';
							} ?>
							<a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail( $page->ID, 'thumbnail', array('class' => 'alignleft') );?></a>
							<?php 
							// Allow the "More" link
							global $more;
							$more = 0;
							// Remove images from the "More" content
							$content = preg_replace('/<img[^>]+./','',get_the_content( 'Read&nbsp;more&nbsp;&raquo;' ));
							// Remove <p></p> from the "More" content
							$content = preg_replace('/<(\/)*p>/','',$content);?>
							<p><?php echo $content; ?></p>
							<div class="cl">&nbsp;</div>			
						</div>
					<?php endwhile; 
					wp_reset_query();					?>
		</div>
		
	</div><!-- wptouch_posts_classes() -->

		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
			<div class="<?php wptouch_content_classes(); ?>" style="padding-bottom: 0;">
				<?php get_sidebar('left'); ?>
			</div>
		</div><!-- wptouch_posts_classes() -->

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->


<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>