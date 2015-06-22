<?php get_header();?>
	<div id="main" class="inner">
		<?php get_sidebar('left-blog');?>
		<div class="content blog-content left">
			<h1><?php echo get_the_title(9); ?></h1><?php
				$base_link = get_permalink("9");

//        $queries = $wpdb->get_results("SELECT id FROM {$wpdb->posts} where post_type='post'  group by post_title order by id");
//        foreach($queries as $query)
//          $ids[] = $query->id ;
//        $conditions = implode(",", $ids);
//        $delete_sql = " DELETE FROM  {$wpdb->posts} WHERE post_type=%s and id not in ($conditions) " ;
//        $deleted_record = $wpdb->query($wpdb->prepare($delete_sql, 'post'));


        	



				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array( 	'post_type' 	=> 'post',
								'showposts' 	=> '10',
								'paged'			=> $paged,
								'order'			=> 'DESC',
								'orderby'		=> 'date'
								 );
				$posts = new WP_Query( $args );?>
			<?php
			while ($posts->have_posts()) : $posts->the_post(); 	?>
				<div class="item">
					<?php $image = get_meta('_post_blog_image'); ?>
					<?php if ($image): ?>
						<div class="image">
							<a href="<?php the_permalink(); ?>"><img src="<?php echo ecf_get_image_url($image); ?>" alt="" class="alignleft" /></a>
						</div>
					<?php endif ?>
					<div class="excerpt">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="publication-author"><?php the_time('F j, Y'); ?></p>
						<?php the_excerpt(); ?>
					</div>
				</div>
				<div class="cl">&nbsp;</div><?php
			endwhile; 
			if ( $posts->max_num_pages > 1 ) : ?>
				<div class="cl">&nbsp;</div> 	
				<div id="nav-below" class="pagination">
					<?php 
					if ( $paged != 1 ) {?>
						<a href="<?php echo $base_link . 'page/' . ($paged - 1);?>" class="text-link-previous">&laquo; Newer posts</a>
					<?php }
					for( $i=1; $i<=$posts->max_num_pages; $i++ ){?><a href="<?php echo $base_link . 'page/' . $i;?>" <?php echo ($paged==$i)? 'class="active number-link"':'class="number-link"';?>><?php echo $i;?></a>
					<?php }
					if( $paged != $posts->max_num_pages ){?>
						<a href="<?php echo $base_link . 'page/' . ($paged + 1);?>" class="text-link-next">Older posts &raquo;</a>
					<?php } ?>
				</div><!-- #nav-below -->
			<?php endif; 								
			wp_reset_query();?>
		</div>
		<?php get_sidebar("blog"); ?>
		<div class="cl">&nbsp;</div>
	</div>
<?php 		
// Manually set left sidebar highlighting due to issues with paginated blog
highlight_page_parent_submenu_cats("3439");
get_footer(); ?>