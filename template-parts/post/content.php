<?php
/**
 * Templae part for displaying posts.
 */
?>

<div class="col-lg-6" id="post-<?php the_ID() ?>">
    <article class="d-flex flex-column">
        <div class="post-img">
            <?php
            if (has_post_thumbnail()):
                the_post_thumbnail('large'); // full, large, medium
            endif;
            ?>
        </div>

        <h2 class="title">
            <?php
            if (is_singular()):
                the_title('<span>', '</span>');
            else:
                the_title('<a href="'.esc_url(get_permalink()).'">', '</a>');
            endif;
            ?>
        </h2>

        <div class="meta-top">
            <ul>
                <li class="d-flex align-items-center">
                    <i class="bi bi-person"></i>
                        <a href="blog-details.html">
                            <?php the_author(); ?>
                        </a>
                </li>
                <li class="d-flex align-items-center">
                    <i class="bi bi-clock"></i>
                        <a href="blog-details.html">
                            <?php echo get_the_date(); ?>
                        </a>
                </li>
                <?php if (have_comments()): ?>
                    <li class="d-flex align-items-center">
                        <i class="bi bi-chat-dots"></i>
                            <a href="blog-details.html">
                                <?php get_comments_number(); ?>
                            </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="content">
            <?php if (is_home() || is_archive()): ?> <!-- Show excerpt in home or archive pages -->
                <p><?php the_excerpt(); ?></p>
            <?php elseif (is_single()): ?> <!--Show full conent in single page -->
                <p>
                    <?php
                    the_content();

                    /* wp_link_pages([
                        'before' => 'div class="page-links"' . esc_html__('Pages:', 'ninestars'),
                        'after' => '</div>',
                    ]); */
                    ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="read-more mt-auto align-self-end">
            <?php printf('<a href="%1$s">Read More</a>', esc_url(get_permalink())); ?>
        </div>

    </article>
</div><!-- End post list item -->
