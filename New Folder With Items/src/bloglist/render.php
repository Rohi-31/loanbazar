<main class="main">
  <section class=" home-loan about">
    <div class="hero__top">
      <div class="container">
        <div class="hero__navigation">
          <a class="hero__navigation-link">Blogs</a>
        </div>
      </div>
    </div>

  </section>


  <div class="container container--narrow page-section blog-page">
    <div class="blogs__content">
      <?php

      $args = array(
        'post_type' => 'post',  // Specify the post type, e.g., 'post', 'page', or any custom post type
        'posts_per_page' => 100, // Number of posts to display
        'orderby' => 'date',    // Order by date
        'order' => 'DESC'       // Sort in descending order
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post(); ?>
          <div class="blogs__item">
            <div class="blogs__item-image">
              <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
            </div>
            <p class="blogs__item-date"><span><?php echo get_the_date('j'); ?></span><?php echo get_the_date('M'); ?></p>
            <div class="blogs__item__content">
              <h3 class="blogs__item-name">
                <?php the_title(); ?>
              </h3>
              <div class="blogs__item-descr">
                <?php the_excerpt(); ?>
              </div>
              <a class="blogs__item-link" href="<?php the_permalink(); ?>">Read More</a>
            </div>
          </div>

      <?php }
      } else {
        echo 'No posts found.';
      }
      wp_reset_postdata();
      echo paginate_links();
      ?>
    </div>
  </div>
</main>