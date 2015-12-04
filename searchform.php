<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/'));?>">
    <label for="search-site" class="sr-only">Search</label>
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'silencio');?>" value="<?php echo esc_attr(get_search_query());?>" name="s" id="search-site">
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button', 'silencio');?>">
</form>
