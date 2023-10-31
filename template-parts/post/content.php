<?php
/**
 * Templae part for displaying posts.
 */
?>
<article id="post-<?php the_ID() ?>">
    <header>
        <?php
            if (is_singular()):
                the_title('<h2 class="entry-title">', '</h2>');
            else:
                the_title('<h2 class="entry-title"><a class="entry-link" href="'.esc_url(get_permalink()).'">', '</a></h2>');
            endif;
        ?>
    </header>

    <!-- Post thumbnail -->
    <?php
        if (has_post_thumbnail()):
            the_post_thumbnail('large'); // full, large, medium
        endif;
    ?>

    <!-- Post Content -->
    <?php if (is_home() || is_archive()): ?> <!-- Show excerpt in home or archive pages -->
        <div class="entry-content">
            <?php the_excerpt() ?>
        </div>
    <?php elseif (is_single()): ?> <!--Show full conent in single page -->
        <div class="entry-content">
            <?php
                the_content();

                wp_link_pages([
                    'before' => 'div class="page-links"' . esc_html__('Pages:', 'ninestars'),
                    'after' => '</div>',
                ]);
            ?>
        </div>
    <?php endif ?>
    
</article>