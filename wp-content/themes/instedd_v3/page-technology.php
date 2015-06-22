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
					<h1><?php
					$custom_header = get_post_meta($post->ID, 'custom-header', TRUE);
					if ( $custom_header ) { echo $custom_header;} else { the_title();}?>
					</h1>
					<?php
						$excerpt = preg_replace('/(<a.+?)+(<\/a>)/i', '', get_the_excerpt() ); 
						echo '<div class="technology-description">'.$excerpt."</div>";?>					
					<?php the_content(); ?>
				</div>
				<?php get_sidebar('technologies-right'); ?>
				<div class="cl">&nbsp;</div>
				
				<?php 
/*					$used_by = get_post_meta(get_the_id(), '_technology_used_by', 0); 
					$used = array();
					if ($used_by) {
						foreach ($used_by as $u) {
							$used[] = parse_custom_field($u);
						}
					}
*/				?>
<?php /*?>				<?php if ($used_by): ?>
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
<?php */?>			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>