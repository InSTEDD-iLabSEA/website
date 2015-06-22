<?php get_header(); ?>	

<?php if ( wptouch_classic_is_custom_latest_posts_page() ) { ?>
	<?php wptouch_classic_custom_latest_posts_query(); ?>
	<?php include( 'blog-loop.php' ); ?>
<?php } else { ?>
	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post(); ?>
		
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
			
			<div class="<?php wptouch_content_classes(); ?>">
				<h1><?php wptouch_the_title(); ?></h1>
				<?php wptouch_the_content(); ?>
			</div>
			
			
					<?php wp_link_pages( 'before=<div class="post-page-nav">' . __( "Pages", "wptouch-pro" ) . ':&after=</div>&next_or_number=number&pagelink=page %&previouspagelink=&raquo;&nextpagelink=&laquo;' ); ?>          

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
<?php } ?>

<?php get_footer(); ?>