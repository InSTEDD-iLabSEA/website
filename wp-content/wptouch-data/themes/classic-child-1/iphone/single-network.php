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
				<div class="item"><?php 
					$network_image = get_meta('_network_image', $post->ID);
					$network_link = get_meta('_network_link', $post->ID);
					if ( $network_link ) {?>
						<a href="<? echo $network_link; ?>"><img src="<?php echo ecf_get_image_url($network_image); ?>" alt="" align="left" style="margin:5px;"  /></a><?php
						the_content(); 
						echo '<p><strong>Website:</strong> <a href="' .$network_link. '">' .$network_link . '</a></p>';
						echo "<p><strong>Category:</strong> " . get_the_term_list( $post->ID, 'network_group', '', ', ', '' ) . "</p>";
					} elseif ( $network_image ) {?>
						<img src="<?php echo ecf_get_image_url($network_image); ?>" alt="" align="left" style="margin: 5px 12px 5px 0;"  /><?php
						the_content(); 
						echo "<p><strong>Category:</strong> " . get_the_term_list( $post->ID, 'network_group', '', ', ', '' ) . "</p>";
					} else {
						the_content(); 
						echo "<p><strong>Category:</strong> " . get_the_term_list( $post->ID, 'network_group', '', ', ', '' ) . "</p>";
					}?>
				</div>
			</div>	
		</div><!-- wptouch_posts_classes() -->

		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
			<div class="<?php wptouch_content_classes(); ?>" style="padding-bottom: 0;">
				<?php get_sidebar('left-network'); ?>
			</div>
		</div><!-- wptouch_posts_classes() -->
	
		<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
			<div class="<?php wptouch_content_classes(); ?>">
				<?php get_sidebar("network"); ?>
			</div>
		</div><!-- wptouch_posts_classes() -->

	<?php } ?>
	
	<?php if ( classic_show_comments_on_pages() ) { ?>
		<?php comments_template(); ?>
	<?php } ?>
<?php } ?>

<?php get_footer(); ?>