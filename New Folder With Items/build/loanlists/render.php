  <?php
    function get_current_page_url()
    {
        global $wp;
        return home_url(add_query_arg(array(), $wp->request));
    }
    $current_page_url = get_current_page_url();
    $current_page_title = get_the_title();
    $term_id = get_field('loan_type');

    $top_banner_title = get_field('top_banner_title');
    $top_banner_text = get_field('top_banner_text');
    $search_filter_id = get_field('search_filter_id');

    // echo $current_page_url;
    ?>

  <main class="main">
      <section class="hero home-loan">
          <div class="hero__top">
              <div class="container">
                  <div class="hero__navigation">
                      <a class="hero__navigation-link" href="<?php echo esc_url($current_page_url) ?>">
                          <?php echo esc_html($current_page_title);  ?>
                      </a>
                  </div>
              </div>
          </div>
          <div class="home-loan-content">
              <div class="container">
                  <div class="hero__inner">
                      <?php if ($top_banner_title != " ") : ?>
                          <h1 class="hero__title">
                              <?php echo $top_banner_title; ?>
                          </h1>
                      <?php endif; ?>
                      <?php if ($top_banner_text != " ") : ?>
                          <p class="hero__descr">
                              <?php echo $top_banner_text ?>
                          </p>
                      <?php endif; ?>
                      <div class="hero__content">
                          <div class="hero__block">
                              <button class="hero__btn btn popup-btn">Get Instant Call Back</button>
                              <p class="hero__date">10:00 AM - 10:00 PM</p>
                          </div>
                          <div class="hero__block">
                              <div class="hero__item">
                                  <div class="hero__item-icon">
                                      <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/google.svg" ?> alt="" />
                                  </div>
                                  <p class="hero__item-grade">4.9</p>
                                  <div class="hero__item-stars">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                          <path d="M5.94039 0.990019L4.46199 4.11842L1.16199 4.62002C0.607594 4.67282 0.330394 5.50442 0.765994 5.94002L3.14199 8.35562L2.58759 11.8272C2.48199 12.4344 3.14199 12.87 3.63039 12.5928L6.60039 11.0484L9.57039 12.5928C10.1248 12.87 10.732 12.4344 10.6132 11.8272L10.072 8.35562L12.4348 5.94002C12.8704 5.50442 12.5932 4.72562 12.052 4.62002L8.75199 4.11842L7.26039 0.990019C6.98319 0.435619 6.21759 0.435619 5.94039 0.990019Z" fill="#FFD028" />
                                      </svg>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                          <path d="M5.94039 0.990019L4.46199 4.11842L1.16199 4.62002C0.607594 4.67282 0.330394 5.50442 0.765994 5.94002L3.14199 8.35562L2.58759 11.8272C2.48199 12.4344 3.14199 12.87 3.63039 12.5928L6.60039 11.0484L9.57039 12.5928C10.1248 12.87 10.732 12.4344 10.6132 11.8272L10.072 8.35562L12.4348 5.94002C12.8704 5.50442 12.5932 4.72562 12.052 4.62002L8.75199 4.11842L7.26039 0.990019C6.98319 0.435619 6.21759 0.435619 5.94039 0.990019Z" fill="#FFD028" />
                                      </svg>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                          <path d="M5.94039 0.990019L4.46199 4.11842L1.16199 4.62002C0.607594 4.67282 0.330394 5.50442 0.765994 5.94002L3.14199 8.35562L2.58759 11.8272C2.48199 12.4344 3.14199 12.87 3.63039 12.5928L6.60039 11.0484L9.57039 12.5928C10.1248 12.87 10.732 12.4344 10.6132 11.8272L10.072 8.35562L12.4348 5.94002C12.8704 5.50442 12.5932 4.72562 12.052 4.62002L8.75199 4.11842L7.26039 0.990019C6.98319 0.435619 6.21759 0.435619 5.94039 0.990019Z" fill="#FFD028" />
                                      </svg>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                          <path d="M5.94039 0.990019L4.46199 4.11842L1.16199 4.62002C0.607594 4.67282 0.330394 5.50442 0.765994 5.94002L3.14199 8.35562L2.58759 11.8272C2.48199 12.4344 3.14199 12.87 3.63039 12.5928L6.60039 11.0484L9.57039 12.5928C10.1248 12.87 10.732 12.4344 10.6132 11.8272L10.072 8.35562L12.4348 5.94002C12.8704 5.50442 12.5932 4.72562 12.052 4.62002L8.75199 4.11842L7.26039 0.990019C6.98319 0.435619 6.21759 0.435619 5.94039 0.990019Z" fill="#FFD028" />
                                      </svg>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                          <path d="M6.74118 0.990019L5.26278 4.11842L1.96277 4.62002C1.40837 4.67282 1.13117 5.50442 1.56677 5.94002L3.94278 8.35562L3.38838 11.8272C3.28278 12.4344 3.94278 12.87 4.43118 12.5928L7.40118 11.0484L10.3712 12.5928C10.9256 12.87 11.5328 12.4344 11.414 11.8272L10.8728 8.35562L13.2356 5.94002C13.6712 5.50442 13.394 4.72562 12.8528 4.62002L9.55278 4.11842L8.06118 0.990019C7.78398 0.435619 7.01838 0.435619 6.74118 0.990019Z" fill="#FFD028" />
                                          <path fill-rule="evenodd" clip-rule="evenodd" d="M12 4.49023V7.20291L13.2355 5.93984C13.6711 5.50424 13.3939 4.72544 12.8527 4.61984L12 4.49023Z" fill="white" />
                                      </svg>
                                  </div>
                                  <p class="hero__item-descr">434 Google Reviews</p>
                              </div>
                              <div class="hero__item">
                                  <div class="hero__item-icon">
                                      <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/jd.svg" ?> alt="" />
                                  </div>
                                  <p class="hero__item-grade">4.8</p>
                                  <div class="hero__item-stars">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                          <path d="M5.94039 0.990019L4.46199 4.11842L1.16199 4.62002C0.607594 4.67282 0.330394 5.50442 0.765994 5.94002L3.14199 8.35562L2.58759 11.8272C2.48199 12.4344 3.14199 12.87 3.63039 12.5928L6.60039 11.0484L9.57039 12.5928C10.1248 12.87 10.732 12.4344 10.6132 11.8272L10.072 8.35562L12.4348 5.94002C12.8704 5.50442 12.5932 4.72562 12.052 4.62002L8.75199 4.11842L7.26039 0.990019C6.98319 0.435619 6.21759 0.435619 5.94039 0.990019Z" fill="#FFD028" />
                                      </svg>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                          <path d="M5.94039 0.990019L4.46199 4.11842L1.16199 4.62002C0.607594 4.67282 0.330394 5.50442 0.765994 5.94002L3.14199 8.35562L2.58759 11.8272C2.48199 12.4344 3.14199 12.87 3.63039 12.5928L6.60039 11.0484L9.57039 12.5928C10.1248 12.87 10.732 12.4344 10.6132 11.8272L10.072 8.35562L12.4348 5.94002C12.8704 5.50442 12.5932 4.72562 12.052 4.62002L8.75199 4.11842L7.26039 0.990019C6.98319 0.435619 6.21759 0.435619 5.94039 0.990019Z" fill="#FFD028" />
                                      </svg>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                          <path d="M5.94039 0.990019L4.46199 4.11842L1.16199 4.62002C0.607594 4.67282 0.330394 5.50442 0.765994 5.94002L3.14199 8.35562L2.58759 11.8272C2.48199 12.4344 3.14199 12.87 3.63039 12.5928L6.60039 11.0484L9.57039 12.5928C10.1248 12.87 10.732 12.4344 10.6132 11.8272L10.072 8.35562L12.4348 5.94002C12.8704 5.50442 12.5932 4.72562 12.052 4.62002L8.75199 4.11842L7.26039 0.990019C6.98319 0.435619 6.21759 0.435619 5.94039 0.990019Z" fill="#FFD028" />
                                      </svg>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                          <path d="M5.94039 0.990019L4.46199 4.11842L1.16199 4.62002C0.607594 4.67282 0.330394 5.50442 0.765994 5.94002L3.14199 8.35562L2.58759 11.8272C2.48199 12.4344 3.14199 12.87 3.63039 12.5928L6.60039 11.0484L9.57039 12.5928C10.1248 12.87 10.732 12.4344 10.6132 11.8272L10.072 8.35562L12.4348 5.94002C12.8704 5.50442 12.5932 4.72562 12.052 4.62002L8.75199 4.11842L7.26039 0.990019C6.98319 0.435619 6.21759 0.435619 5.94039 0.990019Z" fill="#FFD028" />
                                      </svg>
                                      <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                          <path d="M5.7402 1.38943L4.2618 4.51783L0.961798 5.01943C0.407398 5.07223 0.130198 5.90383 0.565798 6.33943L2.9418 8.75503L2.3874 12.2266C2.2818 12.8338 2.9418 13.2694 3.4302 12.9922L6.4002 11.4478L9.3702 12.9922C9.9246 13.2694 10.5318 12.8338 10.413 12.2266L9.8718 8.75503L12.2346 6.33943C12.6702 5.90383 12.393 5.12503 11.8518 5.01943L8.5518 4.51783L7.0602 1.38943C6.783 0.835033 6.0174 0.835033 5.7402 1.38943Z" fill="#FFD028" />
                                          <path d="M9.99924 4.73821V8.62522L12.2346 6.33943C12.6702 5.90383 12.393 5.12503 11.8518 5.01943L9.99924 4.73821Z" fill="white" />
                                      </svg>
                                  </div>
                                  <p class="hero__item-descr">860 Justdial Rating</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <?php if (have_rows('hero_slider')) : ?>
              <div class="hero__scroller">
                  <div class="container">
                      <div class="scrolling-items scrolling-slider">
                          <div class="swiper-wrapper">
                              <?php
                                // Loop through the rows of data
                                while (have_rows('hero_slider')) : the_row();
                                    // Get the sub field values
                                    $hero_icon = get_sub_field('hero_icon');
                                    $slider_heading = get_sub_field('slider_heading');
                                    $slider_sub_text = get_sub_field('slider_sub_text');
                                ?>
                                  <div class="hero__scroller-item swiper-slide">
                                      <div class="hero__scroller-icon">
                                          <?php if ($hero_icon && isset($hero_icon['url'])) : ?>
                                              <img src="<?php echo esc_url($hero_icon['url']); ?>" alt=" " />
                                          <?php endif; ?>
                                      </div>
                                      <div class="hero__scroller-content">
                                          <div class="hero__scroller-name">
                                              <?php echo $slider_heading; ?>
                                          </div>
                                          <div class="hero__scroller-descr">
                                              <?php echo apply_filters('the_content', $slider_sub_text); ?>
                                          </div>
                                      </div>
                                  </div>
                              <?php endwhile; ?>
                          </div>
                      </div>
                  </div>
              </div>
          <?php endif; ?>


      </section>

      <section class="compare">
          <h2 class="compare__title title h2_title">Compare & select best products from 40+ Banks & NBFCs</h2>
          <div class="compare__slider compare__slider-desktop">
              <div class="compare__slider-content">
                  <div class="compare__slider-block">

                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/2.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/3.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/4.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/5.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/6.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/7.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/8.svg" ?> alt="" />
                      </div>
                  </div>
                  <div class="compare__slider-block">
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/2.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/3.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/4.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/5.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/6.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/7.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/8.svg" ?> alt="" />
                      </div>
                  </div>
              </div>
          </div>
          <div class="compare__slider compare__slider-mobile">
              <div class="compare__slider-content">
                  <div class="compare__slider-block">
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/7.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/6.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/2.svg" ?> alt="" />
                      </div>

                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/8.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/3.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/5.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/4.svg" ?> alt="" />
                      </div>
                  </div>
                  <div class="compare__slider-block">
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/7.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/6.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/2.svg" ?> alt="" />
                      </div>

                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/8.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/3.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/5.svg" ?> alt="" />
                      </div>
                      <div class="compare__slider-item">
                          <img src=<?php echo esc_url(get_template_directory_uri()) . "/images/compare/4.svg" ?> alt="" />
                      </div>
                  </div>
              </div>
          </div>
          <div class="container">
              <div class="compare__inner">
                  <?php if ($search_filter_id != '') { ?>
                      <div class="compare__left">

                          <?php
                            if (wp_is_mobile() && $current_page_title == 'Home Loan') {
                                echo '<h3>Select Your Bank</h3>';
                                echo do_shortcode('[searchandfilter id="702"]');
                            } else {
                                echo do_shortcode('[searchandfilter id=' . $search_filter_id . ']');
                            }
                            ?>
                      </div>

                  <?php }
                  if($search_filter_id){
                    $homeLoanPosts = new WP_Query(array(
                        'post_type' => 'loans',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'loan_type',
                                'field' => 'term_id',
                                'terms' => $term_id
                            )
                        ),
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'posts_per_page' => -1,
                        'search_filter_id' => $search_filter_id,
                    ));
                  }else{
                     $homeLoanPosts = new WP_Query(array(
                        'post_type' => 'loans',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'loan_type',
                                'field' => 'term_id',
                                'terms' => $term_id
                            )
                        ),
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'posts_per_page' => -1,
                    ));
                  }
                    
                 
                    ?>

                  <div class="compare__content">
                      <p class="mobile_text">* Onwards</p>
                      <?php
                        if ($homeLoanPosts->have_posts()) :
                            while ($homeLoanPosts->have_posts()) {
                                $homeLoanPosts->the_post();
                                $post_link = get_permalink();
                                $rate_of_interest_for_listing_page = get_field('range_of_interest_rate');
                                $bank_logo = get_field('logo');
                                $processing_fee_range_for_listing_page = get_field('processing_fee_range_for_listing_page');

                        ?>
                              <div class="compare__content-item">
                                  <div class="compare__content-top">
                                      <div class="compare__content-img">
                                          <img src="<?php echo esc_url($bank_logo['url']); ?>" alt=" " />
                                      </div>
                                  </div>
                                  <div class="compare__content-block desktop-content">
                                      <p class="compare__content-descr">
                                          <?php echo "Rate of Interest: " . esc_html($rate_of_interest_for_listing_page); ?>
                                      </p>
                                      <p class="compare__content-descr">
                                          <?php echo "Processing Fees: " . esc_html($processing_fee_range_for_listing_page); ?>
                                      </p>
                                  </div>
                                  <div class="compare__content-block mobile-content">
                                      <p class="compare__content-descr">
                                          <?php echo "ROI: " . esc_html(str_replace('Onwards', '*', $rate_of_interest_for_listing_page)); ?>
                                      </p>
                                      <p class="compare__content-descr">
                                          <?php echo "PF: " . esc_html(str_replace('Onwards', '*', $processing_fee_range_for_listing_page)); ?>
                                      </p>
                                  </div>
                                  <a class="compare__content-btn btn desktop-content" href="<?php echo esc_url($post_link); ?>">Get
                                      Quote</a>
                                  <a class="compare__content-btn btn mobile-content" href="<?php echo esc_url($post_link); ?>">Apply
                                  </a>
                              </div>
                          <?php }
                            wp_reset_postdata();
                        else :
                            // echo 'No home loan posts found.';
                            ?>
                          <div class='search-filter-results-list' data-search-filter-action='infinite-scroll-end'>
                              <span>No results found.</span>
                          </div>
                      <?php endif; ?>
                      <!-- <span data-search-filter-action='infinite-scroll-end'>No more results</span> -->
                      <!-- <a class="compare__content-more" href="#">View More</a> -->
                  </div>


              </div>
          </div>
      </section>

      <?php /*
    <section class="videobanner">
      <div class="container">
        <div class="videobanner__inner">
          <h2 class="videobanner__title title">ज़िम्मेदार लोगों का भरोसेमन साथी</h2>
          <div class="videobanner__video">
            <!-- <img src="images/videobanner.webp" alt=""> -->
            <img
              src=<?php echo esc_url(get_template_directory_uri()) . "/images/videobanner.webp" ?>
      alt="" />
      <button class="videobanner__btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="110" height="110" viewBox="0 0 110 110" fill="none">
              <g opacity="0.8">
                  <rect width="110" height="110" rx="55" fill="#070030" />
                  <path d="M47 39.9915L71.8725 54.4958L47 69V39.9915Z" fill="white" />
              </g>
          </svg>
      </button>
      </div>

      <div class="videobanner-video">
          <div class="videobanner-content">
              <video
                  src=<?php echo esc_url(get_template_directory_uri()) . "/video/Ad-Film-loan-Bazaar-Loan-Easyhomeloan-Notension.mp4" ?>
                  muted controls autoplay></video>
              <div class="videobanner__close">
                  <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                      <path
                          d="M0.94118 0.45305C1.3317 0.0625252 1.96487 0.0625252 2.35539 0.45305L20.0331 18.1307C20.4236 18.5212 20.4236 19.1544 20.0331 19.5449C19.6425 19.9355 19.0094 19.9355 18.6189 19.5449L0.941179 1.86726C0.550655 1.47674 0.550655 0.843574 0.94118 0.45305Z"
                          fill="white" />
                      <path
                          d="M0.933518 19.5488C0.542994 19.1582 0.542994 18.5251 0.933518 18.1345L18.6112 0.456871C19.0017 0.0663466 19.6349 0.0663471 20.0254 0.456871C20.4159 0.847396 20.4159 1.48056 20.0254 1.87108L2.34773 19.5488C1.95721 19.9393 1.32404 19.9393 0.933518 19.5488Z"
                          fill="white" />
                  </svg>
              </div>
          </div>
      </div>
      </div>
      </div>
      </section> */ ?>

      <?php
        // Check rows exists.
        if (have_rows('loan_list_page_faqs')) :
        ?>
          <section class="faq">
              <div class="container">
                  <div class="faq__inner">
                      <h2 class="faq__title h2_title">FAQs</h2>
                      <div class="faq__content">
                          <?php
                            // Loop through the rows of data
                            while (have_rows('loan_list_page_faqs')) : the_row();
                                // Get the sub field values
                                $icon = get_sub_field('questions_icon');
                                $question = get_sub_field('quetions');
                                $answer = get_sub_field('answers');
                            ?>
                              <div class="faq__item">
                                  <div class="faq__item-top">
                                      <span class="faq__item-icon">
                                          <!-- Insert SVG or any other icon HTML here if needed -->
                                          <?php if ($icon && isset($icon['url'])) : ?>
                                              <img src="<?php echo esc_url($icon['url']); ?>" alt=" " />
                                          <?php endif; ?>

                                      </span>
                                      <div class="faq__item-name">
                                          <?php echo esc_html($question); ?>
                                      </div>
                                  </div>
                                  <div class="faq__item-descr">
                                      <?php echo $answer; ?>
                                  </div>
                              </div>
                          <?php endwhile; ?>
                      </div>
                  </div>
              </div>
          </section>
      <?php endif; ?>

      <?php get_template_part('template-parts/google-reviews'); ?>


      <div class="mobile-block">
          <div class="container">
              <div class="mobile-block__inner">
                  <a class="mobile-block-link" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                          <path d="M60 30C60 13.4315 46.5685 0 30 0C13.4315 0 0 13.4315 0 30C0 46.5685 13.4315 60 30 60C46.5685 60 60 46.5685 60 30Z" fill="url(#paint0_linear_32_3283)" />
                          <path d="M41.9477 37.466V41.38C41.9492 41.7434 41.8747 42.1031 41.7292 42.436C41.5836 42.7689 41.3701 43.0678 41.1023 43.3134C40.8346 43.559 40.5185 43.7461 40.1743 43.8625C39.8301 43.9789 39.4654 44.0221 39.1035 43.9894C35.0887 43.5532 31.2323 42.1813 27.8441 39.984C24.6917 37.9809 22.0191 35.3083 20.016 32.1559C17.811 28.7523 16.4388 24.8771 16.0106 20.8443C15.978 20.4835 16.0209 20.1199 16.1365 19.7766C16.2521 19.4333 16.438 19.1178 16.6822 18.8503C16.9264 18.5827 17.2237 18.369 17.5551 18.2226C17.8864 18.0762 18.2447 18.0005 18.6069 18.0001H22.521C23.1541 17.9939 23.768 18.2181 24.248 18.631C24.7281 19.0439 25.0417 19.6172 25.1303 20.2442C25.2955 21.4968 25.6019 22.7266 26.0436 23.9103C26.2191 24.3773 26.2571 24.8848 26.1531 25.3727C26.049 25.8606 25.8073 26.3085 25.4565 26.6632L23.7995 28.3202C25.6568 31.5865 28.3613 34.291 31.6276 36.1483L33.2846 34.4913C33.6393 34.1405 34.0872 33.8988 34.5751 33.7947C35.063 33.6907 35.5705 33.7287 36.0375 33.9042C37.2212 34.3459 38.451 34.6523 39.7036 34.8175C40.3374 34.9069 40.9162 35.2261 41.33 35.7144C41.7437 36.2028 41.9636 36.8261 41.9477 37.466Z" fill="white" />
                          <path d="M31.6562 23.2187C32.9306 23.4674 34.1017 24.0906 35.0198 25.0087C35.9379 25.9267 36.5611 27.0979 36.8097 28.3722M31.6562 18C34.3038 18.2941 36.7727 19.4797 38.6575 21.3622C40.5423 23.2446 41.731 25.712 42.0285 28.3592" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                          <defs>
                              <linearGradient id="paint0_linear_32_3283" x1="30" y1="60" x2="30" y2="0" gradientUnits="userSpaceOnUse">
                                  <stop offset="1" stop-color="#20B038" />
                                  <stop offset="1" stop-color="#60D66A" />
                              </linearGradient>
                          </defs>
                      </svg>
                  </a>
                  <a class="mobile-block-link" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                          <path d="M60 30C60 13.4315 46.5685 0 30 0C13.4315 0 0 13.4315 0 30C0 46.5685 13.4315 60 30 60C46.5685 60 60 46.5685 60 30Z" fill="url(#paint0_linear_32_3288)" />
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M47.9864 29.539C47.9864 39.216 40.0793 47.0637 30.3265 47.0637C27.2283 47.0637 24.3179 46.2727 21.7899 44.8818L12.0107 47.9899L15.198 38.5898C13.5895 35.9497 12.6633 32.8515 12.6633 29.5423C12.6633 19.862 20.5704 12.0176 30.3232 12.0176C40.076 12.0176 47.9831 19.8653 47.9831 29.5423L47.9864 29.539ZM30.3265 14.8027C22.136 14.8027 15.4781 21.4111 15.4781 29.5357C15.4781 32.7592 16.5262 35.7453 18.3061 38.1745L16.4504 43.6458L22.1558 41.833C24.4992 43.3722 27.3074 44.2687 30.3265 44.2687C38.5137 44.2687 45.1749 37.6603 45.1749 29.5357C45.1749 21.4111 38.5137 14.8027 30.3265 14.8027ZM39.2454 33.5733C39.1367 33.3953 38.8466 33.2865 38.4148 33.0723C37.9831 32.8581 35.8506 31.8165 35.455 31.6748C35.0595 31.5331 34.7695 31.4606 34.4827 31.889C34.1927 32.3175 33.3654 33.2865 33.1116 33.5733C32.8611 33.86 32.6073 33.8963 32.1755 33.6821C31.7405 33.4678 30.3463 33.013 28.695 31.5496C27.4096 30.4091 26.5394 29.0051 26.2856 28.5733C26.0351 28.1448 26.2593 27.9108 26.4735 27.6966C26.668 27.5021 26.9086 27.1956 27.1228 26.9451C27.3403 26.6946 27.4129 26.5133 27.5546 26.2265C27.6996 25.9398 27.6271 25.6893 27.5183 25.4751C27.4096 25.2608 26.546 23.1481 26.1835 22.2846C25.8242 21.4276 25.4649 21.4573 25.2111 21.4573C24.9573 21.4573 24.4926 21.5331 24.4926 21.5331C24.4926 21.5331 23.6258 21.6418 23.227 22.0703C22.8314 22.4988 21.7108 23.5403 21.7108 25.653C21.7108 27.7658 23.2599 29.8093 23.4775 30.096C23.695 30.3828 26.4702 34.862 30.8736 36.5825C35.2738 38.303 35.2738 37.7295 36.0681 37.657C36.8591 37.5878 38.6291 36.6188 38.9916 35.6168C39.3542 34.6148 39.3542 33.7546 39.2454 33.5766V33.5733Z" fill="white" />
                          <defs>
                              <linearGradient id="paint0_linear_32_3288" x1="30" y1="60" x2="30" y2="0" gradientUnits="userSpaceOnUse">
                                  <stop offset="1" stop-color="#20B038" />
                                  <stop offset="1" stop-color="#60D66A" />
                              </linearGradient>
                          </defs>
                      </svg>
                  </a>
              </div>
          </div>
      </div>
      <?php get_template_part('template-parts/apply-online'); ?>

  </main>
  <script>
      const videoBtn = document.querySelector('.videobanner__btn');
      const videoBanner = document.querySelector('.videobanner-video');
      const closeBtn = document.querySelector('.videobanner__close');
      videoBtn.addEventListener('click', function() {
          videoBanner.classList.add('active');
          document.body.classList.add('no-scroll');
      });
      closeBtn.addEventListener('click', function() {
          videoBanner.classList.remove('active');
          document.body.classList.remove('no-scroll');
          video.pause();
          video.currentTime = 0;
      });
  </script>