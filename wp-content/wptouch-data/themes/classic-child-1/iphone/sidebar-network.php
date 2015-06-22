<div class="sidebar-r network">
	<ul><?php 
		$all_categories = sort_categories(get_terms(array('network_group'))); 
		foreach ($all_categories as $c) { ?>
			<li>
				<h3 class="widgettitle"><?php echo $c->name; ?></h3>
				<ul><?php
				
				$args = array( 	'post_type' 	=> 'network',
								'showposts' 	=> '-1',
								'order'			=> 'ASC',
								'orderby'		=> 'menu_order',
								'network_group'	=>	$c->slug
								 );
				$network_items = new WP_Query( $args );											
				while( $network_items->have_posts() ) : $network_items->the_post();?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li><?php		
				endwhile;
				wp_reset_query();?>											   
				</ul>
			</li><?php
		}?>
    </ul>
</div>