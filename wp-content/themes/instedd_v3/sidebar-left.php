<?php
	global $post;
	$anc = get_page_ancestor($post->ID);

        $post_type = get_post_type();

	switch( $post_type) {
		case "presentation":
			$anc = get_page_ancestor( 99 );
			break;
		case "publication":
			$anc = get_page_ancestor( 13 );
			break;
		case "video":
			$anc = get_page_ancestor( 95 );
			break;
		case "post":
			$anc = get_page_ancestor( 9 );
			die;
			break;
		case "map_post":
			$anc = get_page_ancestor( 44 );
			break;		
		case "event":
			$anc = get_page_ancestor( 912 );
			break;		
	}	

	if ($anc) {
		$args = array( 
			'sort_column'	=>	'menu_order',
			'depth'			=>	1,
			'child_of'		=>	$anc->ID,
			'title_li'		=>	''
		);
	}
?>
<?php if ($anc): ?>
	<div id="sidebar" class="left">
		<ul>
	        <li class="widget">
				<a href=" <?php echo get_permalink($anc->ID) ?> "><h2 class="widgettitle"><?php echo apply_filters('the_title', $anc->post_title);?></h2></a>
	            <ul>
					<?php 
					// Customized for sections with an "Overview" pseudo-page
					if ( $anc->ID == '910' OR $anc->ID == '921' OR $anc->ID == '23') {
						echo '<li class="page_item';
						if ( $post->ID == '910' OR $post->ID == '921' OR $post->ID == '23' )
							echo ' current_page_item';
						echo '"><a href="../">Overview</a></li>';
					}
					wp_list_pages( $args );?>
	            </ul>
	        </li>
	    </ul>
           		
	</div>
<?php endif; ?>
