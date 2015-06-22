<?php get_header(); ?>	

<?php if ( wptouch_classic_is_custom_latest_posts_page() ) { ?>
	<?php wptouch_classic_custom_latest_posts_query(); ?>
	<?php include( 'blog-loop.php' ); ?>
<?php } else { ?>
	<?php if ( wptouch_have_posts() ) { ?>
	
		<?php wptouch_the_post(); ?>
		
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
			
			<div class="<?php wptouch_content_classes(); ?> presentations single">
				<h1><?php wptouch_the_title(); ?></h1>
				<div class="item">
					<?php $presentation_embed = get_post_meta($post->ID, '_presentation_embed', TRUE);?>
					<?php $presentation_id = get_post_meta($post->ID, '_presentation_id', TRUE);?>
						<iframe style="border:none;width:280px;height:233px;" src="/slideshare/embed.php?url=http://www.slideshare.net/InSTEDD/<?php echo $presentation_id;?>&width=256¤t=1"></iframe>					
					<p>Can't see presentation? View at <a href="http://www.slideshare.net/InSTEDD/<?php echo $presentation_id;?>">slideshare.net</a></p>
					<h3 style="margin-top: 12px;">View more of <a href="/multimedia/presentations/">InSTEDD's presentations</a>.</h3>
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
				<?php get_sidebar("presentations"); ?>
			</div>
		</div><!-- wptouch_posts_classes() -->


	<?php } ?>
	
	<?php if ( classic_show_comments_on_pages() ) { ?>
		<?php comments_template(); ?>
	<?php } ?>
<?php } ?>

<?php get_footer(); ?>