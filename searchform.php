<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/'));?>">
    <div class="field has-addons">
        <label for="search-site" class="sr-only">Search</label>
        <div class="control">
            <input type="search" class="search-field input" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'silencio');?>" value="<?php echo esc_attr(get_search_query());?>" name="s" id="search-site">
        </div>
         <div class="control">
            <input type="submit" class="search-submit button" value="<?php echo esc_attr_x('Search', 'submit button', 'silencio');?>">
        </div>
    </div>
</form>
