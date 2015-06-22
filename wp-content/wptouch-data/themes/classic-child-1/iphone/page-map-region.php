<?php get_header(); ?>

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?>">
			<h1><?php
				$custom_header = get_post_meta($post->ID, 'custom-header', TRUE);
				if ( $custom_header ) { echo $custom_header;} else { the_title();}?>
			</h1>
			<div class="item">			
				<?php wptouch_the_content(); ?>	
				<?php
					$slug = basename(get_permalink());
					$loop = new WP_Query( array(
						'post_type'			=>	'map_post',
						'orderby'			=> 'menu_order',
						'order'				=> 'ASC',
						'category_name'		=>	$slug ) );
					while ( $loop->have_posts() ) : $loop->the_post(); ?> 
						<div class="project-item">			
							<h2 id="<?php the_id(); ?>" name="<?php the_id(); ?>" ><?php the_title(); ?></h2><?php
							$map_date = get_post_meta($post->ID, 'map_date', TRUE);
							if ( $map_date ) {
								echo '<div class="map_date"><strong>' .$map_date. '</strong></div>';
							}?>														
							<?php the_content(); ?>
						</div>
					<?php endwhile;	?>
				</div>					
				
		</div><!-- wptouch_posts_classes() -->
	</div>

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>" style="padding-bottom: 0;">
			<?php get_sidebar('left-projects'); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->

	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>">
			<?php get_sidebar("projects"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->


<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>

<?php
get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left-projects'); ?>
				<div class="content press left">
					<h1><?php the_title();?></h1>
					<div class="item">
						<div class="entry-content" style="padding-top: 24px;">
							<?php the_content(); ?>
						</div>
						<?php
							$slug = basename(get_permalink());
							$loop = new WP_Query( array(
								'post_type'			=>	'map_post',
								'orderby'			=> 'menu_order',
								'order'				=> 'ASC',
								'category_name'		=>	$slug ) );
							while ( $loop->have_posts() ) : $loop->the_post(); ?> 
								<div class="project-item">			
									<h2 id="<?php the_id(); ?>" name="<?php the_id(); ?>" ><?php the_title(); ?></h2><?php
									$map_date = get_post_meta($post->ID, 'map_date', TRUE);
									if ( $map_date ) {
										echo '<div class="map_date"><strong>' .$map_date. '</strong></div>';
									}?>														
									<?php the_content(); ?>
								</div>
							<?php endwhile;	?>					
					</div>
				</div>
				<?php get_sidebar("projects"); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>