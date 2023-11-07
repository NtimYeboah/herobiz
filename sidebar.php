<?php
/**
 * Template for sidebar.php
 */
?>

<div class="col-lg-4">
    <div class="sidebar">
        <div class="sidebar-item search-form">
            <h3 class="sidebar-title">Search</h3>
            <?php get_search_form(); ?>
        </div><!-- End sidebar search formn-->

        <?php
            $cats = get_categories();
            if (count($cats) > 0):
        ?>
        <div class="sidebar-item categories">
            <h3 class="sidebar-title">Categories</h3>

            <ul class="mt-3">
                <?php foreach ($cats as $cat):
                    printf(
                        '<li><a href="%1$s">%2$s <span>(%3$s)</span></a></li>',
                        esc_url_raw(home_url() . '/category/'. $cat->slug),
                        $cat->name,
                        $cat->count
                    );
                endforeach; ?>
            </ul>
        </div><!-- End sidebar categories-->
        <?php endif; ?>

        <?php
            $args = [
                'order' => 'ID',
                'orderby' => 'DESC',
            ];

            $recent = new WP_Query($args);

            if ($recent->have_posts()):
        ?>
        <div class="sidebar-item recent-posts">
            <h3 class="sidebar-title">Recent Posts</h3>

            <div class="mt-3">
                <?php
                    while ($recent->have_posts()):
                        $recent->the_post();
                ?>
                <div class="post-item mt-3">
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php esc_url(the_post_thumbnail_url()); ?>" alt="" class="flex-shrink-0">
                    <?php endif; ?>
                    <div>
                        <?php the_title('<h4><a href="'. esc_url(get_permalink()).'">', '</a></h4>') ?>
                        <time><?php echo get_the_date(); ?></time>
                    </div>
                </div><!-- End recent post item-->
                <?php endwhile; ?>
            </div>

        </div><!-- End sidebar recent posts-->
        <?php
            endif;
            wp_reset_postdata();
        ?>

        <?php
            $tags = get_tags();
            if (count($tags) > 0):
        ?>
        <div class="sidebar-item tags">
            <h3 class="sidebar-title">Tags</h3>
            <ul class="mt-3">
                <?php foreach ($tags as $tag):
                    printf(
                        '<li><a href="%1$s">%2$s</a></li>',
                        esc_url_raw(home_url() . '/tag/' . $tag->slug),
                        $tag->name
                    );
                endforeach; ?>
            </ul>
        </div><!-- End sidebar tags-->
        <?php endif; ?>
    </div><!-- End Blog Sidebar -->
</div>
