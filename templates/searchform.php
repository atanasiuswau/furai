<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
  <div class="row collapse">
  	<label class="show-for-small-only"><?php _e('Search for:', 'roots'); ?></label>
  	<div class="small-8 large-9 columns">
  		<input type="search" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" class="search-field" placeholder="<?php _e('Search', 'roots'); ?> <?php bloginfo('name'); ?>">
  	</div>
    <div class="small-4 large-3 columns">
      <button type="submit" class="search-submit button postfix"><?php _e('Search', 'roots'); ?></button>
    </div>
  </div>
</form>
