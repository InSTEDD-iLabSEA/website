<?php 
/*
	Template Name: Team Member Page
*/
get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<?php get_sidebar('left'); ?>
				<div class="content press left single">
					<h1><?php
					$custom_header = get_post_meta($post->ID, 'custom-header', TRUE);
					if ( $custom_header ) { echo $custom_header;} else { the_title();}?>
					</h1><?php
					$subhead = get_post_meta($post->ID, '_page_subhead', TRUE);
					if ( $subhead ) {
						print '<div class="subhead">' . $subhead . '</div>';
					} ?>
					<div class="item">
						<?php the_content(); ?>
					</div>
				</div>
				<?php get_sidebar(); ?>
				<div class="cl">&nbsp;</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>