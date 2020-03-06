<form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ) ?>">
		<span class="screen-reader-text"></span>
		<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" />
	<button type="submit" class="search"><i class="fa fa-search"></i></button>
</form>

<!-- Denna kod är funnen på nätet. Visar sökbaren och dess CSS och exporteras till header.php. //David -->