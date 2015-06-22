<?php get_header(); ?>	

<?php if ( wptouch_classic_is_custom_latest_posts_page() ) { ?>
	<?php wptouch_classic_custom_latest_posts_query(); ?>
	<?php include( 'blog-loop.php' ); ?>
<?php } else { ?>
	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post(); ?>
		
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
			
			<div class="<?php wptouch_content_classes(); ?> video single">
				<h1><?php wptouch_the_title(); ?></h1>
				<div class="itemZ">
					<?php $video_url = get_meta('_video_url', $post->ID);
						echo create_embedcode($video_url, 540, 430); ?>
					<?php wptouch_the_content(); ?>	
					<h3>View more of <a href="/multimedia/video/">InSTEDD's videos</a>.</h3>
				</div>
			</div>	
		</div><!-- wptouch_posts_classes() -->

		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
			<div class="<?php wptouch_content_classes(); ?>">
				<?php get_sidebar("left"); ?>
			</div>
		</div><!-- wptouch_posts_classes() -->

		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
			<div class="<?php wptouch_content_classes(); ?>">
				<?php get_sidebar("video"); ?>
			</div>
		</div><!-- wptouch_posts_classes() -->


	<?php } ?>
	
	<?php if ( classic_show_comments_on_pages() ) { ?>
		<?php comments_template(); ?>
	<?php } ?>
<?php } ?>

<?php get_footer(); ?>