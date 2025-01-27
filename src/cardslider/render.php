<?php
$term_slug = isset($_GET['bank']) ? sanitize_text_field($_GET['bank']) : '';
$args = array(
  'post_type' => 'creditcards',
  'posts_per_page' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'bank',
      'field' => 'slug',
      'terms' => $term_slug,
    ),
  ),
);

$query = new WP_Query($args);
?>

<main class="main">
  <section class="axix active">
    <div class="container">
      <div class="axix__inner">
        <span class="axix__slider-btn axix__slider-prev">
          <img
            src=<?php echo esc_url(get_template_directory_uri()) . "/images/arrow-left-circle.svg" ?>
          alt="" />
        </span>
        <div class="axix__content">
          <div class="axix__slider">
            <div class="swiper-wrapper">
              <?php
              if ($query->have_posts()) {
                  while ($query->have_posts()) {
                      $query->the_post();
                      $post_id = get_the_ID();
                      $post_slug = get_post_field('post_name', $post_id);
                      $card_image = get_field('card_image');
                      $title = get_the_title();
                      $features = get_field('features');
                      $trivia = get_field('trivia');
                      $fee__details = get_field('fee__details');
                      if ($fee__details) {
                          $joining_fee = $fee__details['joining_fee'];
                          $annual_fee = $fee__details['annual_fee'];
                      }


                      if ($card_image && isset($card_image['url'])) {
                          $card_image_url = $card_image['url'];
                      }

                      ?>
              <div class="axix__slide swiper-slide"
                data-id="<?php echo $post_slug; ?>">
                <div class="axix__slide-left">
                  <h3 class="axix__title axix__mobile">
                    <?php echo esc_attr($title); ?>
                  </h3>
                  <div class="axix__left-image">

                    <img
                      src="<?php echo esc_url($card_image_url); ?>"
                      alt="<?php echo esc_attr($title); ?>" />

                  </div>
                  <!--
                    <div class="axix__left-about">
                      <div class="axix__left-item">
                        <div class="axix__left-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                            <path
                              d="M3.59735 14.0876L2.07507 12.5653C1.45414 11.9444 1.45414 10.9228 2.07507 10.3019L3.59735 8.77961C3.85774 8.51922 4.06805 8.00844 4.06805 7.6479V5.49465C4.06805 4.61333 4.78914 3.89227 5.67046 3.89227H7.82369C8.18423 3.89227 8.695 3.68199 8.95539 3.42159L10.4777 1.89929C11.0986 1.27836 12.1201 1.27836 12.7411 1.89929L14.2634 3.42159C14.5237 3.68199 15.0345 3.89227 15.3951 3.89227H17.5483C18.4296 3.89227 19.1507 4.61333 19.1507 5.49465V7.6479C19.1507 8.00844 19.361 8.51922 19.6214 8.77961L21.1437 10.3019C21.7646 10.9228 21.7646 11.9444 21.1437 12.5653L19.6214 14.0876C19.361 14.348 19.1507 14.8587 19.1507 15.2193V17.3724C19.1507 18.2537 18.4296 18.9749 17.5483 18.9749H15.3951C15.0345 18.9749 14.5237 19.1852 14.2634 19.4456L12.7411 20.9679C12.1201 21.5888 11.0986 21.5888 10.4777 20.9679L8.95539 19.4456C8.695 19.1852 8.18423 18.9749 7.82369 18.9749H5.67046C4.78914 18.9749 4.06805 18.2537 4.06805 17.3724V15.2193C4.06805 14.8487 3.85774 14.338 3.59735 14.0876Z"
                              stroke="#0070E0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8.61719 14.427L14.6262 8.41797" stroke="#0070E0" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.1172 13.9258H14.1281" stroke="#0070E0" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                            <path d="M9.10938 8.92188H9.12023" stroke="#0070E0" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                          </svg>
                        </div>
                        <p class="axix__left-descr">HDFC Bank is the market leader in Credit Cards with over 20 million
                          active cards as of February 2024</p>
                      </div>
                      <div class="axix__left-item">
                        <div class="axix__left-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                            <path
                              d="M3.59735 14.0876L2.07507 12.5653C1.45414 11.9444 1.45414 10.9228 2.07507 10.3019L3.59735 8.77961C3.85774 8.51922 4.06805 8.00844 4.06805 7.6479V5.49465C4.06805 4.61333 4.78914 3.89227 5.67046 3.89227H7.82369C8.18423 3.89227 8.695 3.68199 8.95539 3.42159L10.4777 1.89929C11.0986 1.27836 12.1201 1.27836 12.7411 1.89929L14.2634 3.42159C14.5237 3.68199 15.0345 3.89227 15.3951 3.89227H17.5483C18.4296 3.89227 19.1507 4.61333 19.1507 5.49465V7.6479C19.1507 8.00844 19.361 8.51922 19.6214 8.77961L21.1437 10.3019C21.7646 10.9228 21.7646 11.9444 21.1437 12.5653L19.6214 14.0876C19.361 14.348 19.1507 14.8587 19.1507 15.2193V17.3724C19.1507 18.2537 18.4296 18.9749 17.5483 18.9749H15.3951C15.0345 18.9749 14.5237 19.1852 14.2634 19.4456L12.7411 20.9679C12.1201 21.5888 11.0986 21.5888 10.4777 20.9679L8.95539 19.4456C8.695 19.1852 8.18423 18.9749 7.82369 18.9749H5.67046C4.78914 18.9749 4.06805 18.2537 4.06805 17.3724V15.2193C4.06805 14.8487 3.85774 14.338 3.59735 14.0876Z"
                              stroke="#0070E0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8.61719 14.427L14.6262 8.41797" stroke="#0070E0" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M14.1172 13.9258H14.1281" stroke="#0070E0" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                            <path d="M9.10938 8.92188H9.12023" stroke="#0070E0" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round" />
                          </svg>
                        </div>
                        <p class="axix__left-descr">HDFC Bank currently has 8776 branches across India serving and
                          assisting its customers</p>
                      </div>
                    </div>
                  -->
                  <button class="axix__left-btn btn credit_apply_online">Apply Now</button>
                </div>
                <div class="axix__slide-content">
                  <h3 class="axix__title">
                    <?php echo esc_attr($title); ?>
                  </h3>
                  <div class="axix__box">
                    <p class="axix__name">Fees Details</p>
                    <div class="axix__block">
                      <div class="axix__block-item">
                        <p class="axix__block-name">Joining Fee</p>
                        <p class="axix__block-descr">
                          <?php echo esc_html($joining_fee); ?>
                        </p>
                      </div>
                      <div class="axix__block-item">
                        <p class="axix__block-name">Annual Fee</p>
                        <p class="axix__block-descr">
                          <?php echo esc_html($annual_fee); ?>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="axix__box">
                    <p class="axix__name">Features</p>

                    <?php
                                if ($features != '') {
                                    echo $features;
                                }

                      ?>

                  </div>
                  <div class="axix__box">
                    <p class="axix__name">Trivia</p>
                    <p class="axix__descr">
                      <?php
                        if ($trivia != '') {
                            echo $trivia;
                        }
                      ?>
                    </p>
                  </div>
                </div>
              </div>

              <?php
                  }
                  wp_reset_postdata();
              } else {
                  echo '<p>No posts found.</p>';
              }
?>
            </div>
          </div>
        </div>
        <span class="axix__slider-btn axix__slider-next">
          <img
            src=<?php echo esc_url(get_template_directory_uri()) . "/images/arrow-right-circle.svg" ?>
          alt="" />
        </span>

        <!-- Mobile blocks moved outside the slider -->
        <div class="axix__mobile-block">
          <?php
          if ($query->have_posts()) {
              while ($query->have_posts()) {
                  $query->the_post();
                  $title = get_the_title();
                  ?>
          <div class="axix__mobile-item">
            <p class="axix__mobile-name">
              <?php echo esc_html($title); ?>
            </p>
            <button class="axix__left-btn axix__mobile btn credit_apply_online">Apply Now</button>
          </div>
          <?php
              }
              wp_reset_postdata(); // Reset post data after loop
          }
?>
        </div>
      </div>
    </div>
  </section>
  <?php //get_template_part('template-parts/contact-button-mobile');
  ?>

  <?php //get_template_part('template-parts/apply-online');
  ?>

  <?php
  // Credit Card Form Start
  // Define the block to be rendered

  //$slidename = $_GET['slide'];

  $credit_card_block = [
    'blockName' => 'ourblocktheme/creditcardform',
    'attrs'     => [
      'content' => 'This is a Credit Card Form block.',
    ],
  ];

// Render the block
$block_content = render_block($credit_card_block);

// Check if the block was rendered successfully
if (empty($block_content)) {
    echo '<div class="my-custom-block">Failed to render nested block</div>';
}

// Return the content, including the rendered block
echo  $block_content;
// Credit Card Form END
?>

</main>

<script>
  // card slider
  document.addEventListener('DOMContentLoaded', function() {
    var axixSwiper = new Swiper(".axix__slider", {
      spaceBetween: 50,
      slidesPerView: 1,
      loop: false,
      speed: 1000,
      navigation: {
        nextEl: '.axix__slider-next',
        prevEl: '.axix__slider-prev',
      },
      on: {
        slideChange: updateActiveSlide,
        slideChangeTransitionEnd: function() {
          // Add side title name in form field.
          const parentElement = document.querySelector('.swiper-slide-active');
          const childText = parentElement.querySelector('.axix__title').innerText;
          document.getElementById("field_credit_card_name").value = childText;

          var activeSlide = axixSwiper.slides[axixSwiper.activeIndex];
          if (activeSlide) {
            var title = activeSlide.getAttribute('data-id');
            var url = new URL(window.location.href);
            url.searchParams.set('slide', title);
            window.history.pushState({}, '', url);
          }
        },
      }
    });


    var urlParams = new URLSearchParams(window.location.search);
    var slideSlug = urlParams.get('slide');

    if (slideSlug) {
      var slideIndex = Array.from(axixSwiper.slides).findIndex(slide => slide.getAttribute('data-id') ===
        slideSlug);
      if (slideIndex !== -1) {
        axixSwiper.slideTo(slideIndex);
      }
    }

    function updateActiveSlide() {
      const slides = document.querySelectorAll('.axix__mobile-item');
      const activeIndex = axixSwiper.activeIndex;

      slides.forEach((slide, index) => {
        slide.classList.toggle('active', index === activeIndex);
      });
    }

    function handleResize() {
      if (window.innerWidth < 481) {
        updateActiveSlide();
      }
    }

    window.addEventListener('resize', handleResize);
    handleResize();
    updateActiveSlide();
  });
</script>