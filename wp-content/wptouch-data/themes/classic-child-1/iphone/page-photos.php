<?php get_header(); ?>	

<?php if ( wptouch_have_posts() ) { ?>

	<?php wptouch_the_post(); ?>
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">
		
		<div class="<?php wptouch_content_classes(); ?> presentation">
			<h1><?php wptouch_the_title(); ?></h1>
			<?php 
				$photos = get_posts('post_type=page&showposts=-1&post_parent=91&orderby=date&order=ASC');
				$photos = array_reverse( $photos );
				$loopID = 0;
				foreach ($photos as $v) {
					if ( $loopID == 0 ) {?>
						<h2><?php echo $v->post_title; ?></h2><?php
							$post_date = date( 'F d, Y', strtotime( $v->post_date ) );?>
							<p class="photos-date"><?php echo $post_date; ?></p>
						<?php echo $v->post_content;?>
						<div class="cl">&nbsp;</div>
						<?php echo do_shortcode('[gallery id="'.$v->ID.'" columns="1" order="DESC" link="file" size="medium"]'); ?>
						<?php
						$loopID++;
					}
				}?>
			<div class="items">
				<h2>Recent Photo Essays</h2>
				<?php $loopID = 0;
				foreach ($photos as $v): 
					if ( $loopID > 0 ) { 
					// Skip the most recent photo essay, since it's featured above ?>
					<div class="item">
						<?php if ( get_the_post_thumbnail($v->ID) ): ?>
							<div class="image left">
								<a href="<?php echo get_permalink($v->ID); ?>"><?php echo get_the_post_thumbnail( $v->ID, 'thumbnail', array( 'class' => 'alignleft' ) );?></a>
							</div>
						<?php endif; ?>
						<div class="info left">
							<h3><a href="<?php echo get_permalink($v->ID); ?>"><?php echo $v->post_title; ?></a></h3><?php
							$post_date = date( 'F d, Y', strtotime( $v->post_date ) );?>
							<p class="photos-date"><?php echo $post_date; ?></p>
						</div>
						<div class="cl">&nbsp;</div>
					</div><?php
				}
				$loopID++;
				endforeach; ?>
			</div>		
		</div>
	</div><!-- wptouch_posts_classes() -->
	
	<div class="<?php wptouch_post_classes(); ?> rounded-corners-8px">		
		<div class="<?php wptouch_content_classes(); ?>">
			<?php get_sidebar("left"); ?>
		</div>
	</div><!-- wptouch_posts_classes() -->

<?php } ?>

<?php if ( classic_show_comments_on_pages() ) { ?>
	<?php comments_template(); ?>
<?php } ?>

<?php get_footer(); ?>