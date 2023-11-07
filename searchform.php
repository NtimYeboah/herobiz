<!-- <form role="search" method="get" action="<?php //echo esc_url(home_url('/')); ?>">
    <input type="search" value="<?php //echo get_search_query(); ?>" name="s" />
    <input type="submit" value="Search" />
</form> -->

<form class="mt-3" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" name="s" value="<?php echo get_search_query(); ?>" />
    <button type="submit" value="Search"><i class="bi bi-search"></i></button>
</form>
