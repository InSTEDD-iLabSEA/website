<?php
/*
	Template Name: Team Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content press left">
					<h1><?php the_title(); ?></h1>			
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
					<?php endwhile;  ?>
          
          <?php
					wp_reset_query();					
					
					echo '<h3 class="midlevel">Consultants</h3>';
					$board_staff = new WP_Query();
					$board_staff->query( 'showposts=-1&post_parent=3917&post_type=page&orderby=menu_order&order=ASC' );
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
					<?php endwhile;  ?>
          
          <?php
					wp_reset_query();					
					
					echo '<h3 class="midlevel">Executive team</h3>';
					$board_staff = new WP_Query();
					$board_staff->query( 'showposts=-1&post_parent=5305&post_type=page&orderby=menu_order&order=ASC' );
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
					<?php endwhile;  ?>
          
          
          
				  <?php	wp_reset_query();	?>
				</div>
				<?php get_sidebar(); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>