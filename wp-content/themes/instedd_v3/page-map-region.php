<?php
/*
	Template Name: Projects Region Page
*/
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