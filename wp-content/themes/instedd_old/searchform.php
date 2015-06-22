<div class="search-form">
	<form action="<?php echo get_option('home'); ?>" method="get">
		<fieldset>
			<input type="text" class="field left" value="<?php echo get_search_query(); ?>" name="s" />
			<input type="submit" class="button notext right" value="Search" />
		</fieldset>
	</form>
</div>