<div class="search-form">
	<form action="<?php echo get_option('home'); ?>" method="get">
		<fieldset>
			<input type="text" id="search-box" class="search field left" value="<?php echo get_search_query(); //$search_query = get_search_query(); if ($search_query) { echo get_search_query();} else { echo "SEARCH";}?>" name="s" />
			<input type="submit" class="button right search-submit-button" value="SEARCH" />
		</fieldset>
	</form>
</div>