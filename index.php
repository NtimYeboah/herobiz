<?php
/**
 * This is the main template file
 */
get_header();
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">
            <div class="col-lg-8">
                <?php if (have_posts()): ?>
                <div class="row gy-4 posts-list">
                    <?php
                        while (have_posts()):
                            the_post();
                            get_template_part('template-parts/post/content');
                        endwhile;

                        $links = numeric_post_pagination();
                    ?>
                    <?php if (count($links) > 0): ?>
                    <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <?php
                                foreach ($links as $num => $meta) {
                                    printf(
                                        '<li class="%1$s"><a href="%2$s">%3$s</a></li>',
                                        $meta['class'],
                                        $meta['url'],
                                        $num
                                    );
                                }
                            ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div><!-- End blog posts list -->
                <?php else: ?>
                    <h1>No post available</h1>
                <?php endif; ?>
          </div>

          <!-- Put sidebar here -->
          <div class="col-lg-4">
            <?php get_sidebar(); ?>
          </div>
          <!-- End put sidebar here -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

<?php
get_footer();
