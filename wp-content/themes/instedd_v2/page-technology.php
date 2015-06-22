<?php
/*
	Template Name: Technology Page
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content tech left">
					<h2><?php the_title(); ?></h2>
					<?php 
						$technology_image = get_meta('_technology_image');
						$technology_description = get_meta('_technology_description');
					?>
					<?php if ($technology_image || $technology_description): ?>
						<div class="head">
							<?php if ($technology_image): ?>
								<img src="<?php echo ecf_get_image_url($technology_image); ?>" class="left" alt="" />
							<?php endif; ?>
							<?php if ($technology_description): ?>
								<?php echo apply_filters('the_content', $technology_description); ?>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					
					<?php the_content(); ?>
				</div>
				<?php get_sidebar('technologies-right'); ?>
				<div class="cl">&nbsp;</div>
				
				<?php 
					$used_by = get_post_meta(get_the_id(), '_technology_used_by', 0); 
					$used = array();
					if ($used_by) {
						foreach ($used_by as $u) {
							$used[] = parse_custom_field($u);
						}
					}
				?>
				<?php if ($used_by): ?>
					<div class="hor-bar">
						<h3>Who's using it</h3>
						<ul>
							<?php foreach ($used as $u): ?>
							    <li class="widget">
							    	<img src="<?php echo $u['image']; ?>" alt="" class="left" />
							    	<p class="right"><?php echo $u['text']; ?></p>
							    	<div class="cl">&nbsp;</div>
							    </li>
							<?php endforeach; ?>
						</ul>
						<div class="cl">&nbsp;</div>
					</div>
				<?php endif ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>