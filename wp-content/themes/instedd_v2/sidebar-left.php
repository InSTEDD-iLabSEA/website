<?php
	global $post;
	if (is_tax('Network Type')) {
		$anc = get_page_by_path('about-us');
	} else {
		$anc = get_page_ancestor(get_the_id());
	}
	
	$children = array();
	if ($anc) {
		$children = get_pages('sort_column=menu_order&parent=' . $anc->ID . '&child_of=' . $anc->ID);
	}
?>
<?php if ($children): ?>
	<div id="sidebar" class="left">
		<ul>
	        <li class="widget">
	       <a href=" <?php echo get_permalink($anc->ID) ?> ">   <h2 class="widgettitle"><?php echo apply_filters('the_title', $anc->post_title); ?></h2></a>
	            <ul>
	            	<?php foreach ($children as $key => $c): ?>
	            		<li class="<?php echo ($key == count($children) - 1) ? 'last' : ''; ?> <?php echo (is_page($c->ID)) ? 'current_page_item' : ''; ?>"><a href="<?php echo get_permalink($c->ID) ?>"><?php echo apply_filters('the_title', $c->post_title); ?></a>
	            			<?php $subchildren = get_pages('sort_column=menu_order&parent=' . $c->ID . '&child_of=' . $c->ID); ?>
	            			<?php if ($subchildren): ?>
	            				<ul>
	            					<?php foreach ($subchildren as $s): ?>
	            						<li <?php echo (is_page($s->ID)) ? 'class="current_page_item"' : ''; ?>><a href="<?php echo get_permalink($s->ID); ?>"><?php echo apply_filters('the_title', $s->post_title); ?></a></li>
	            					<?php endforeach; ?>
	            				</ul>
	            			<?php endif; ?>
	            		</li>
	            	<?php endforeach; ?>
	            	<script type="text/javascript">
	            		(function($) {
	            			$('#sidebar .widget ul ul li.current_page_item').parent().parent().addClass('current_page_item');
	            		})(jQuery);
	            	</script>
	            </ul>
	        </li>
	    </ul>
	</div>
<?php endif; ?>