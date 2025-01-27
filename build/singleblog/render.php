<main class="main single-blog-page">
  <section class=" home-loan about">
    <div class="hero__top" style="background:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');background-size:cover;background-repeat:no-repeat;background-position:50% 50%">
      <div class="container">

      </div>
    </div>

  </section>
  <div class="head__section">
    <div class="container">
      <div class="category"><?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                              foreach ($categories as $category) {
                                echo esc_html($category->name);
                              }
                            }
                            ?></div>
      <div class="post_date"><?php echo get_the_date(); ?></div>
      <div class="title">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
  </div>

  <div class="container container--narrow page-section blog__content">

    <div class="col-md-3">
      <h2 class="h2_title">Recent Articles</h2>
      <?php

      $args = array(
        'post_type' => 'post',  // Specify the post type, e.g., 'post', 'page', or any custom post type
        'posts_per_page' => 4, // Number of posts to display
        'orderby' => 'date',    // Order by date
        'order' => 'DESC'       // Sort in descending order
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post(); ?>
          <div class="blogs__item">
            <div class="blogs-image">
              <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>
            </div>

            <div class="blogs__item__content">
              <h3 class="blogs__item-name">
                <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
              </h3>
              <p class="date"><span><?php echo get_the_date(); ?></span></p>
            </div>
          </div>

      <?php }
      } else {
        echo 'No posts found.';
      }
      wp_reset_postdata(); ?>
    </div>
    <div class="col-md-9">

      <div class="blog__desc"><?php the_content(); ?></div>
    </div>
  </div>
</main>