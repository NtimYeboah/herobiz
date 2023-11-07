<?php
/**
 * This is template for achieve posts (tags, categories etc)
 */
get_header();
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php the_archive_title(); ?></h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Blog</li>
            <li><?php the_archive_title(); ?></li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">
          <div class="col-lg-8">
            <?php if (have_posts()):
                while (have_posts()):
            ?>
            <article class="blog-details" style="margin-bottom: 3%">
              <?php the_post(); ?>
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
                    the_excerpt();
                ?>
              </div><!-- End post content -->

              <div class="read-more mt-auto align-self-end">
                <?php printf('<a href="%1$s">Read More</a>', esc_url(get_permalink())); ?>
              </div>
            </article><!-- End blog post -->
            <?php
                endwhile;
                else:
                    printf('<h1>No post available</h1>');
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

<?php
get_footer();