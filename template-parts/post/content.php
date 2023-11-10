<?php
/**
 * Template part for displaying posts.
 */

if (is_home() || is_archive()): ?> <!-- Show excerpt in home or archive pages -->
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
                the_title('<a href="'.esc_url(get_permalink()).'">', '</a>');
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
                                <?php echo get_comments_number(); ?>
                            </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="content">
            <p><?php the_excerpt(); ?></p>
        </div>

        <div class="read-more mt-auto align-self-end">
            <?php printf('<a href="%1$s">Read More</a>', esc_url(get_permalink())); ?>
        </div>

    </article>
</div><!-- End post list item -->
<?php elseif (is_single()): ?>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog: <?php the_title(); ?></h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><?php the_title(); ?></li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">
          <div class="col-lg-8">
            <article class="blog-details">

              <div class="post-img">
                <?php
                if (has_post_thumbnail()):
                    the_post_thumbnail('large'); // full, large, medium
                endif;
                ?>
              </div>

              <?php
                the_title('<h2 class="title">', '</h2>')
              ?>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-person"></i>
                        <?php the_author() ?>
                  </li>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-clock"></i>
                        <?php echo get_the_date(); ?>
                    </li>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-chat-dots"></i>
                        <?php echo get_comments_number() ?>
                  </li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <?php
                    the_content();
                ?>

              </div><!-- End post content -->

              <div class="meta-bottom">
                <?php $cats = get_the_category();
                    if (count($cats) > 0):
                ?>
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li>
                    <?php
                        printf(
                            '<a href="#">%1$s</a>',
                            $cats[0]->name
                        );
                    ?>
                  </a>
                </ul>
                <?php endif; ?>

                <?php $tags = get_the_tags();
                    if (count($tags) > 0):
                ?>
                <i class="bi bi-tags"></i>
                <ul class="tags">
                    <?php
                        foreach ($tags as $tag):
                            printf(
                                '<li><a href="#">%1$s</a></li>',
                                $tag->name,
                            );
                        endforeach;
                    ?>
                </ul>
                <?php endif; ?>
              </div><!-- End meta bottom -->

            </article><!-- End blog post -->

            <div class="post-author d-flex align-items-center">
              <?php echo get_avatar(get_the_author_meta('ID')); ?>
              <div>
                <h4><?php echo get_the_author_meta('display_name'); ?></h4>
                <!-- <div class="social-links">
                  <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                </div> -->
                <p>
                    <?php echo get_the_author_meta('description'); ?>
                </p>
              </div>
            </div><!-- End post author -->

            <?php
              if (comments_open() || get_comments_number() > 0):
                comments_template();
              endif;
            ?>
          </div>

          <!-- Sidebar starts -->
          <div class="col-lg-4">
            <?php get_sidebar(); ?>
          </div>
          <!-- Sidebar end -->
        </div>

      </div>
    </section><!-- End Blog Details Section -->

<?php endif; ?>
