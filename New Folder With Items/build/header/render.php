<?php
$site_url = home_url();
?>
<header class="header">
    <div class="container">
        <div class="header__top">
            <a class="header__logo"
                href="<?php echo esc_url($site_url); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()) . "/images/logo.svg" ?>"
                    alt="Logo" />
            </a>
            <div class="header__block">
                <div class="header__block-left">
                    <div class="header__block-scrolling">
                        <div class="header__scrolling-content">
                            <p class="header__scrolling-get">
                                Get Instant Call Back
                            </p>
                            <p class="header__scrolling-get">
                                Get Instant Call Back
                            </p>
                        </div>
                    </div>
                    <p class="header__date">Mon-Sat, 10:00 AM - 10:00 PM</p>
                </div>
                <div class="header__phones">
                    <div class="header__phones-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                            <path
                                d="M11.5415 4.16634C12.3555 4.32515 13.1035 4.72322 13.6899 5.30962C14.2763 5.89602 14.6744 6.64406 14.8332 7.45801M11.5415 0.833008C13.2326 1.02087 14.8095 1.77815 16.0134 2.98051C17.2173 4.18287 17.9765 5.75885 18.1665 7.44967M17.3332 14.0997V16.5997C17.3341 16.8318 17.2866 17.0615 17.1936 17.2741C17.1006 17.4868 16.9643 17.6777 16.7933 17.8346C16.6222 17.9915 16.4203 18.1109 16.2005 18.1853C15.9806 18.2596 15.7477 18.2872 15.5165 18.2663C12.9522 17.9877 10.489 17.1115 8.32486 15.708C6.31139 14.4286 4.60431 12.7215 3.32486 10.708C1.91651 8.53401 1.04007 6.05884 0.76653 3.48301C0.745705 3.25256 0.773092 3.02031 0.846947 2.80103C0.920801 2.58175 1.03951 2.38025 1.1955 2.20936C1.3515 2.03847 1.54137 1.90193 1.75302 1.80844C1.96468 1.71495 2.19348 1.66656 2.42486 1.66634H4.92486C5.32929 1.66236 5.72136 1.80557 6.028 2.06929C6.33464 2.333 6.53493 2.69921 6.59153 3.09967C6.69705 3.89973 6.89274 4.68528 7.17486 5.44134C7.28698 5.73961 7.31125 6.06377 7.24479 6.37541C7.17832 6.68705 7.02392 6.9731 6.79986 7.19967L5.74153 8.25801C6.92783 10.3443 8.65524 12.0717 10.7415 13.258L11.7999 12.1997C12.0264 11.9756 12.3125 11.8212 12.6241 11.7548C12.9358 11.6883 13.2599 11.7126 13.5582 11.8247C14.3143 12.1068 15.0998 12.3025 15.8999 12.408C16.3047 12.4651 16.6744 12.669 16.9386 12.9809C17.2029 13.2928 17.3433 13.691 17.3332 14.0997Z"
                                stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="header__phones-content">
                        <a class="header__tel" href="tel:+917039407177">+91 7039407177</a>
                        <a class="header__tel" href="tel:+917039197177">+91 7039197177</a>
                    </div>
                </div>
            </div>
            <span class="header__burger">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
    </div>
    <div class="header__botom">
        <div class="container">
            <!-- #site-navigation -->
            <nav id="site-navigation" class="main-navigation header__menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'menu_id'        => 'header-menu',
                    'menu_class'     => 'header-menu',
                ));
                ?>
            </nav>
            <!-- #site-navigation -->
            <div class="header__box">
                <a href="<?php echo esc_url($site_url) . '/creditscore/'; ?>"
                    class="header__box-know">
                    <div class="header__know-animate">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none"
                            class="rotate-animation">
                            <path
                                d="M7.57422 2.00259C7.87886 3.00831 8.19759 4.01084 8.48108 5.02134C8.92281 6.58246 9.34246 8.14577 9.75859 9.70988C9.86569 10.1093 9.95963 10.5146 9.99437 10.9248C10.0912 12.0617 8.92726 12.9927 7.43127 12.9999C5.94422 13.0107 4.80298 12.0848 5.02851 10.9536C5.29824 9.61874 5.64951 8.28793 6.00971 6.9607C6.45744 5.30785 6.95052 3.66438 7.42574 2.01373C7.47343 2.00855 7.52559 2.00517 7.57328 2L7.57422 2.00259Z"
                                fill="#2F2F2F" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="22" viewBox="0 0 38 22" fill="none">
                            <path
                                d="M33.0389 6.17676C36.243 9.78507 37.9216 13.9866 37.9999 18.8694H31.2852C31.2168 15.8576 30.2487 13.1815 28.3027 10.9161C29.8771 9.33852 31.4352 7.78045 33.0356 6.17676H33.0389Z"
                                fill="#5AAB61" class="color-animation" />
                            <path
                                d="M4.96103 6.17676C1.75689 9.78833 0.078229 13.9866 0 18.8727H6.71466C6.78311 15.8609 7.7512 13.1848 9.69714 10.9194C8.12278 9.34177 6.56472 7.78371 4.96429 6.18002L4.96103 6.17676Z"
                                fill="#E82B3F" class="color-animation" />
                            <path
                                d="M10.991 9.7004C9.4101 8.113 7.85203 6.55168 6.27441 4.96754C9.6513 1.92965 13.6084 0.267283 18.2043 0V6.7277C15.4794 6.94935 13.0608 7.93047 10.991 9.7004Z"
                                fill="#FFD140" class="color-animation" />
                            <path
                                d="M31.8326 4.98058C30.2322 6.57776 28.6807 8.1293 27.1063 9.70692C25.0365 7.92395 22.6114 6.95261 19.8799 6.73096V0C24.4661 0.264023 28.4264 1.91335 31.8326 4.98058Z"
                                fill="#9ACC2D" class="color-animation" />
                        </svg>
                    </div>
                    Free Credit Score
                </a>
                <span></span>
                <p class="header__box-calc"><a
                        href="<?php echo get_site_url(); ?>/#emi-calculator-block">
                        <svg width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="15.6963" height="21.19" rx="2" fill="#0070E0" />
                            <rect x="1" y="1" width="14" height="6" rx="1" fill="white" />
                            <circle cx="3.33544" cy="9.53552" r="1.53039" fill="white" />
                            <circle cx="3.3355" cy="13.7735" r="1.53039" fill="white" />
                            <circle cx="7.88738" cy="9.53552" r="1.53039" fill="white" />
                            <circle cx="7.88738" cy="13.7735" r="1.53039" fill="white" />
                            <circle cx="12.3608" cy="9.53552" r="1.53039" fill="white" />
                            <circle cx="12.3608" cy="13.7735" r="1.53039" fill="white" />
                            <circle cx="12.3608" cy="18.0115" r="1.53039" fill="white" />
                            <rect x="1.80505" y="16.4811" width="7.6127" height="3.06078" rx="1.53039" fill="#F3AE00" />
                        </svg>
                        EMI Calculator
                    </a></p>
            </div>
        </div>
    </div>
</header>