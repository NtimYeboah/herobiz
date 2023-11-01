<?php
/**
 * This is the main template file
 */

get_header();
    if (have_posts()):
        while(have_posts()):
            the_post();
            get_template_part('template-parts/post/content');
        endwhile;

        echo paginate_links([
            'prev_text' => esc_html__('Prev', 'herobiz'),
            'next_text' => esc_html__('Next', 'herobiz'),
        ]);
    endif;
get_footer();