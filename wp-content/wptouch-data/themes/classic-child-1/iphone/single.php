<?php get_header(); ?>	

<?php if ( wptouch_classic_is_custom_latest_posts_page() ) { ?>
	<?php wptouch_classic_custom_latest_posts_query(); ?>
	<?php include( 'blog-loop.php' ); ?>
<?php } else { ?>
	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post(); ?>
		
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px blog-content single">
			
			<div class="<?php wptouch_content_classes(); ?>">
				<h1><?php wptouch_the_title(); ?></h1>
				<p class="publication-author"><?php the_time('F j, Y'); ?></p>								
				<?php wptouch_the_content(); ?>
				<p><strong><a href="/news-media/blog/">View more of InSTEDD's blog posts.</a></strong></p>			
			</div>
			
		</div><!-- wptouch_posts_classes() -->

		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
			<div class="<?php wptouch_content_classes(); ?>">
				<?php get_sidebar("blog-post"); ?>
			</div>
		</div><!-- wptouch_posts_classes() -->


	<?php } ?>
	
	<?php if ( classic_show_comments_on_pages() ) { ?>
		<?php comments_template(); ?>
	<?php } ?>
<?php } ?>

<?php get_footer(); ?>