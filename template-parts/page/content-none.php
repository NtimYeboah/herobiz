<?php
/**
 * Template for displaying if there's no post or category
 */
?>

<section>
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nothing Found', 'herobiz'); ?></h1>
    </header>

    <div class="page-content">
        <?php
            if (is_home() && current_user_can('publish_posts')):
                printf(
                    '<p>'. wp_kses(
                        __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'herobiz'),
                        [
                            'a' => [
                                'href' => [],
                            ],
                        ]
                    ) . '</p>',
                    esc_url(admin_url('post-new.php'))
                );
            elseif (is_search()):
        ?>
            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different search term') ?>
            <?php get_search_form();
            else :
        ?>
        <p><?php  esc_html_e('It seems we can&rsquo;t find what you&rquo;re looking for. Perhaps searching can help') ?></p>
        <?php get_search_form();
        endif; ?>
    </div>
</section>