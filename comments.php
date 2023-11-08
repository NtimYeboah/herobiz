<?php
/**
 * Template for displaying comments
 */
if (post_password_required()) {
    return;
}
?>

<div class="comments">

    <?php if (get_comments_number() > 0): ?>
    <h4 class="comments-count"><?php echo esc_html(get_comments_number())?> Comment<?php if (get_comments_number() > 1): echo 's'; endif;?></h4>
    <?php endif; ?>

    <?php function comments_walker() { ?>
    <div id="comment-<?php comment_ID(); ?>" class="comment">
        <div class="d-flex">
        <div class="comment-img">
            <?php
            $commentEmail = get_comment_author_email();
            $gravatar = get_avatar($commentEmail);
            ?>
            <img src="<?php if ($gravatar): echo esc_url($gravatar); else: echo '#'; endif; ?>" alt="">
        </div>
        <div>
            <h5>
            <a href=""><?php echo get_comment_author(); ?></a>
            <?php
                comment_reply_link([
                'add_below' => true,
                'depth' => 20,
                'max_depth' => 200,
                'before' => '<a href="#" class="reply"><i class="bi bi-reply-fill"></i>',
                'after' => '</a>',
                ]);
            ?>
            </h5>
            <time datetime=""><?php echo get_comment_date(); ?></time>
            <p>
            <?php echo get_comment_text(); ?>
            </p>
        </div>
        </div>
    </div>
    <?php } ?>

    <?php
    wp_list_comments([
        'type' => 'comment',
        'reverse_top_level' => true,
        'max_depth' => 20,
        'callback' => 'comments_walker',
    ]);
    ?>


    <div class="reply-form">
        <h4>Leave a Comment</h4>
        <?php if (!is_user_logged_in()): ?>
        <p>Your email address will not be published. Required fields are marked * </p>
        <p>Having trouble posting comment? <a href="<?php echo wp_login_url(); ?>">Log in</a>.</p>
        <?php endif; ?>
        <form action="<?php echo esc_url_raw(home_url() . '/wp-comments-post.php'); ?>" method="post" id="commentform">
            <?php if (is_user_logged_in()):
            global $wp;
            $currentUrl = home_url(add_query_arg([], $wp->request));
            printf(
                '<p>Logged in as %1$s. <a href="%2$s">Log out?</a></p>',
                wp_get_current_user()->display_name,
                wp_logout_url($currentUrl),
            )
            ?>
            <?php else: ?>
            <div class="row">
                <div class="col-md-6 form-group">
                <input name="author" value="" type="text" class="form-control" size="30" placeholder="Your Name*" aria-required="true">
                </div>
                <div class="col-md-6 form-group">
                <input name="email" type="email" value="" class="form-control" size="30" placeholder="Your Email*" aria-required="true">
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                <input name="url" type="url" class="form-control" size="30" placeholder="Your Website">
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
            <div class="col form-group">
                <textarea name="comment" class="form-control" cols="45" rows="8" aria-required="true">
                </textarea>
            </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Post Comment</button>
            <input type="hidden" name="comment_post_ID" value="<?php the_ID(); ?>" id="comment_post_ID">
            <input type="hidden" name="comment_parent" id="comment_parent" value="0"><!-- Get the comment's parent id -->

        </form>

    </div>

</div><!-- End blog comments -->
