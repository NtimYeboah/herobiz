<?php
/**
 * Single page template
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
            while(have_posts()):
                the_post();
                get_template_part('template-parts/post/content');
            endwhile;
        ?>
    </main>
    <?php get_sidebar() ?>
</div>
<?php
get_footer();
?>