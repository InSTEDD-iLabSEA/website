<?php
/*
	Template Name: Page With No Sidebar
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div id="main" class="inner">
				<div class="content press left widecolumn">
					<h1><?php the_title(); ?></h1>
					<?php $subhead = get_post_meta( $post->ID, '_page_subhead', TRUE );
					if ( $subhead ) {
						print '<div class="subhead index">' . $subhead . '</div>';
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