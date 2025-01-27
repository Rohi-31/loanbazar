<?php
$site_url = home_url();
?>
<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__top">
                <div id="logo-container-bottom">
                    <a class="footer__logo" href="#">
                            <img
                                src=<?php echo esc_url(get_template_directory_uri()) . "/images/logo.svg" ?>
                                alt="" />
                        </a>

                        <div>
                        <div class="header__know-animate">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="50" viewBox="0 0 15 15" fill="none"
                                    class="rotate-animation">
                                    <path
                                        d="M7.57422 2.00259C7.87886 3.00831 8.19759 4.01084 8.48108 5.02134C8.92281 6.58246 9.34246 8.14577 9.75859 9.70988C9.86569 10.1093 9.95963 10.5146 9.99437 10.9248C10.0912 12.0617 8.92726 12.9927 7.43127 12.9999C5.94422 13.0107 4.80298 12.0848 5.02851 10.9536C5.29824 9.61874 5.64951 8.28793 6.00971 6.9607C6.45744 5.30785 6.95052 3.66438 7.42574 2.01373C7.47343 2.00855 7.52559 2.00517 7.57328 2L7.57422 2.00259Z"
                                        fill="#fff" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="118" height="72" viewBox="0 0 38 22" fill="none"> <!-- Increased size -->
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

                        </div>
                        <a href="<?php echo esc_url($site_url) . '/creditscore//'; ?>"
                            class="header__box-know">

                            Free Credit Score
                        </a> 
        </div>

                <div class="footer__content">
                    <div class="footer__block">
                        <h3 class="footer__title">Products</h3>
                        <ul class="footer__menu">
                            <li>
                                <a class="footer__link"
                                    href="<?php echo get_site_url(); ?>/home-loan/">Home
                                    Loan</a>
                            </li>
                            <li>
                                <a class="footer__link"
                                    href="<?php echo get_site_url(); ?>/mortgage-loan/">Mortgage
                                    Loan / LAP </a>
                            </li>
                            <li>
                                <a class="footer__link popup-btn working_capital" href="#">Working Capital Loan</a>
                            </li>
                            <li>
                                <a class="footer__link popup-btn balance" href="#">Balance Transfer</a>
                            </li>
                            <li>
                                <a class="footer__link"
                                    href="<?php echo get_site_url(); ?>/personal-loan/">Personal
                                    Loan</a>
                            </li>
                            <li>
                                <a class="footer__link"
                                    href="<?php echo get_site_url(); ?>/business-loan/">Business
                                    Loan</a>
                            </li>
                            <li>
                                <a class="footer__link popup-btn overdraft" href="#">Overdraft</a>
                            </li>
                            <li>
                                <a class="footer__link"
                                    href="<?php echo get_site_url(); ?>/cards">Credit
                                    Card</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__block">
                        <h3 class="footer__title">Company</h3>
                        <ul class="footer__menu">
                            <li>
                                <a class="footer__link" href="/">Home</a>
                            </li>
                            <li>
                                <a class="footer__link"
                                    href="<?php echo get_site_url(); ?>/about">About
                                    Us</a>
                            </li>

                            <li>
                                <a class="footer__link scroll-link" data-target="g-review"
                                    href="<?php echo get_site_url(); ?>/#g-review">Reviews</a>
                            </li>
                            <li>
                                <a class="footer__link"
                                    href="<?php echo get_site_url(); ?>/blogs">Blog</a>
                            </li>

                        </ul>
                    </div>
                    <div class="footer__box">
                        <!-- <p class="footer__name"><a href="/creditscore/">Check your CREDIT SCORE</a></p>
                        <a class="footer__name footer__box-link" href="/#emi-calculator-block">EMI Calculator</a> -->
                        <div class="footer__map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15072.525467143952!2d72.9526862!3d19.1894638!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b90bafd39ea7%3A0xac3c101133da2c46!2sLOAN%20BAZAAR%20-%20Best%20Home%20Loan%2C%20Business%20Loan%2C%20Builder%20Finance%2C%20Project%20Finance%2C%20Mortgage%20Loan%20in%20Mumbai%20%26%20Thane.!5e0!3m2!1sen!2sin!4v1726318962768!5m2!1sen!2sin"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <!--   <img src=<?php //echo esc_url(get_template_directory_uri()) . "/images/map.jpg"
                                            ?> alt="map" /> -->
                        </div>
                        <div class="footer__contact">
                            <h3 class="footer__contact-name">Contact Us</h3>
                            <div class="footer__contact-item">
                                <div class="footer__contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15" viewBox="0 0 12 15"
                                        fill="none">
                                        <path
                                            d="M5.46045 13.8171C1.48746 8.05749 0.75 7.46637 0.75 5.34961C0.75 2.45011 3.1005 0.0996094 6 0.0996094C8.8995 0.0996094 11.25 2.45011 11.25 5.34961C11.25 7.46637 10.5125 8.05749 6.53955 13.8171C6.27882 14.1938 5.72115 14.1938 5.46045 13.8171ZM6 7.53711C7.20813 7.53711 8.1875 6.55774 8.1875 5.34961C8.1875 4.14148 7.20813 3.16211 6 3.16211C4.79187 3.16211 3.8125 4.14148 3.8125 5.34961C3.8125 6.55774 4.79187 7.53711 6 7.53711Z"
                                            fill="#FFD140" />
                                    </svg>
                                </div>
                                <p class="footer__contact-descr">
                                    <b>Head Office : </b>B 307, Lodha Supremus 2, Thane - 400604.
                                </p>
                            </div>
                            <div class="footer__contact-item">
                                <div class="footer__contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15" viewBox="0 0 12 15"
                                        fill="none">
                                        <path
                                            d="M5.46045 13.8171C1.48746 8.05749 0.75 7.46637 0.75 5.34961C0.75 2.45011 3.1005 0.0996094 6 0.0996094C8.8995 0.0996094 11.25 2.45011 11.25 5.34961C11.25 7.46637 10.5125 8.05749 6.53955 13.8171C6.27882 14.1938 5.72115 14.1938 5.46045 13.8171ZM6 7.53711C7.20813 7.53711 8.1875 6.55774 8.1875 5.34961C8.1875 4.14148 7.20813 3.16211 6 3.16211C4.79187 3.16211 3.8125 4.14148 3.8125 5.34961C3.8125 6.55774 4.79187 7.53711 6 7.53711Z"
                                            fill="#FFD140" />
                                    </svg>
                                </div>
                                <p class="footer__contact-descr">
                                    <b>Branch Office : </b>701, Corporate Avenue, Goregaon - East. Mumbai - 400063
                                </p>
                            </div>
                            <div class="footer__contact-item">
                                <div class="footer__contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15" viewBox="0 0 12 15"
                                        fill="none">
                                        <path
                                            d="M5.46045 13.8171C1.48746 8.05749 0.75 7.46637 0.75 5.34961C0.75 2.45011 3.1005 0.0996094 6 0.0996094C8.8995 0.0996094 11.25 2.45011 11.25 5.34961C11.25 7.46637 10.5125 8.05749 6.53955 13.8171C6.27882 14.1938 5.72115 14.1938 5.46045 13.8171ZM6 7.53711C7.20813 7.53711 8.1875 6.55774 8.1875 5.34961C8.1875 4.14148 7.20813 3.16211 6 3.16211C4.79187 3.16211 3.8125 4.14148 3.8125 5.34961C3.8125 6.55774 4.79187 7.53711 6 7.53711Z"
                                            fill="#FFD140" />
                                    </svg>
                                </div>
                                <p class="footer__contact-descr">
                                    <b>Branch Office : </b>810, B4, Spaze iTech Park, Sector 49, Gurugram
                                </p>
                            </div>
                            <div class="footer__contact-block">
                                <a class="footer__contact-item" href="tel:+917039407177">
                                    <div class="footer__contact-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                            viewBox="0 0 14 15" fill="none">
                                            <path
                                                d="M13.6005 10.5822L10.538 9.26967C10.4072 9.21392 10.2618 9.20217 10.1237 9.2362C9.98562 9.27022 9.86232 9.34819 9.77238 9.45835L8.41613 11.1154C6.28762 10.1118 4.57466 8.39885 3.57109 6.27034L5.22812 4.91409C5.33851 4.82431 5.41663 4.70102 5.45067 4.56287C5.48472 4.42472 5.47283 4.27925 5.4168 4.14846L4.1043 1.08596C4.0428 0.944981 3.93405 0.829874 3.79678 0.76049C3.65951 0.691106 3.50233 0.671794 3.35234 0.705885L0.508594 1.36213C0.363992 1.39553 0.234977 1.47695 0.142607 1.5931C0.0502374 1.70926 -3.33104e-05 1.8533 1.65599e-08 2.00171C1.65599e-08 9.01538 5.68477 14.6892 12.6875 14.6892C12.836 14.6893 12.9801 14.6391 13.0963 14.5467C13.2125 14.4543 13.2939 14.3253 13.3273 14.1806L13.9836 11.3369C14.0175 11.1861 13.9977 11.0283 13.9278 10.8906C13.8579 10.7529 13.7422 10.6438 13.6005 10.5822Z"
                                                fill="#FFD140" />
                                        </svg>
                                    </div>
                                    <p class="footer__contact-descr">+91 7039407177</p> |
                                </a>
                                <a class="footer__contact-item" href="tel:+917039197177">
                                    <p class="footer__contact-descr">&nbsp; +91 7039197177 </p>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <ul class="footer__bottom-menu">
                    <li>
                        <p class="footer__bottom-link">Copyright © 2024 Loan Bazaar</p>
                    </li>
                    <li>
                        <a class="footer__bottom-link"
                            href="<?php echo get_site_url(); ?>/terms-of-use">Terms</a>
                    </li>

                    <li>
                        <a class="footer__bottom-link"
                            href="<?php echo get_site_url(); ?>/privacy-policy">Privacy
                            Policy</a>
                    </li>
                </ul>
                <ul class="footer__bottom-social">
                    <li>
                        <a href="https://www.facebook.com/loanbazaarbyupstream">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                                fill="none">
                                <path
                                    d="M14.5312 7.45312C14.5312 3.43945 11.2793 0.1875 7.26562 0.1875C3.25195 0.1875 0 3.43945 0 7.45312C0 11.0795 2.65693 14.0854 6.13037 14.6309V9.55342H4.28467V7.45312H6.13037V5.85234C6.13037 4.03154 7.21436 3.02578 8.87461 3.02578C9.66973 3.02578 10.5012 3.16758 10.5012 3.16758V4.95469H9.58477C8.68242 4.95469 8.40088 5.51484 8.40088 6.08936V7.45312H10.4159L10.0937 9.55342H8.40088V14.6309C11.8743 14.0854 14.5312 11.0795 14.5312 7.45312Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.instagram.com/loanbazaar/">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                fill="none">
                                <path
                                    d="M7.33325 3.38599C5.46997 3.38599 3.96704 4.88892 3.96704 6.7522C3.96704 8.61548 5.46997 10.1184 7.33325 10.1184C9.19653 10.1184 10.6995 8.61548 10.6995 6.7522C10.6995 4.88892 9.19653 3.38599 7.33325 3.38599ZM7.33325 8.94067C6.12915 8.94067 5.14478 7.95923 5.14478 6.7522C5.14478 5.54517 6.12622 4.56372 7.33325 4.56372C8.54028 4.56372 9.52173 5.54517 9.52173 6.7522C9.52173 7.95923 8.53735 8.94067 7.33325 8.94067ZM11.6223 3.24829C11.6223 3.68481 11.2708 4.03345 10.8372 4.03345C10.4006 4.03345 10.052 3.68188 10.052 3.24829C10.052 2.8147 10.4036 2.46313 10.8372 2.46313C11.2708 2.46313 11.6223 2.8147 11.6223 3.24829ZM13.8518 4.04517C13.802 2.99341 13.5618 2.06177 12.7913 1.29419C12.0237 0.526611 11.092 0.286377 10.0403 0.233643C8.9563 0.172119 5.70728 0.172119 4.62329 0.233643C3.57446 0.283447 2.64282 0.523682 1.87231 1.29126C1.10181 2.05884 0.864502 2.99048 0.811768 4.04224C0.750244 5.12622 0.750244 8.37524 0.811768 9.45923C0.861572 10.511 1.10181 11.4426 1.87231 12.2102C2.64282 12.9778 3.57153 13.218 4.62329 13.2708C5.70728 13.3323 8.9563 13.3323 10.0403 13.2708C11.092 13.2209 12.0237 12.9807 12.7913 12.2102C13.5588 11.4426 13.7991 10.511 13.8518 9.45923C13.9133 8.37524 13.9133 5.12915 13.8518 4.04517ZM12.4514 10.6223C12.2229 11.1965 11.7805 11.6389 11.2034 11.8704C10.3391 12.2131 8.28833 12.134 7.33325 12.134C6.37817 12.134 4.32446 12.2102 3.46313 11.8704C2.88892 11.6418 2.44653 11.1995 2.21509 10.6223C1.87231 9.75806 1.95142 7.70728 1.95142 6.7522C1.95142 5.79712 1.87524 3.74341 2.21509 2.88208C2.4436 2.30786 2.88599 1.86548 3.46313 1.63403C4.32739 1.29126 6.37817 1.37036 7.33325 1.37036C8.28833 1.37036 10.342 1.29419 11.2034 1.63403C11.7776 1.86255 12.22 2.30493 12.4514 2.88208C12.7942 3.74634 12.7151 5.79712 12.7151 6.7522C12.7151 7.70728 12.7942 9.76099 12.4514 10.6223Z"
                                    fill="white" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/loan-bazaar01/" target="_blank">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="14"
                                width="14" version="1.1" viewBox="0 0 1010.1 1008">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fff;
                                            stroke-width: 0px;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-1"
                                    d="M235.1,324H32.3c-9,0-16.3,7.3-16.3,16.3v651.4c0,9,7.3,16.3,16.3,16.3h202.8c9,0,16.3-7.3,16.3-16.3V340.3c0-9-7.3-16.3-16.3-16.3h0Z" />
                                <path class="cls-1"
                                    d="M133.8.1C60,.1,0,60.1,0,133.7s60,133.7,133.8,133.7,133.7-60,133.7-133.7S207.6,0,133.8,0h0Z" />
                                <path class="cls-1"
                                    d="M750.9,307.7c-81.4,0-141.7,35-178.2,74.8v-42.3c0-9-7.3-16.3-16.3-16.3h-194.2c-9,0-16.3,7.3-16.3,16.3v651.4c0,9,7.3,16.3,16.3,16.3h202.4c9,0,16.3-7.3,16.3-16.3v-322.4c0-108.6,29.5-150.9,105.2-150.9s89,67.8,89,156.6v316.7c0,9,7.3,16.3,16.3,16.3h202.4c9,0,16.3-7.3,16.3-16.3v-357.3c0-161.5-30.8-326.7-259.2-326.7h0Z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/@loanbazaar8801">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                viewBox="0 0 50 50" style="fill:#FFFFFF;">
                                <path
                                    d="M 44.898438 14.5 C 44.5 12.300781 42.601563 10.699219 40.398438 10.199219 C 37.101563 9.5 31 9 24.398438 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.398438 17 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.898438 40.5 17.898438 41 24.5 41 C 31.101563 41 37.101563 40.5 40.601563 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.101563 35.5 C 45.5 33 46 29.398438 46.101563 25 C 45.898438 20.5 45.398438 17 44.898438 14.5 Z M 19 32 L 19 18 L 31.199219 25 Z">
                                </path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php get_template_part('template-parts/contact-button-mobile'); ?>

    <!-- Add this code right after the opening <body> tag in your theme's header.php -->
    <div id="loading-screen">
        <img
            src=<?php echo esc_url(get_template_directory_uri()) . "/images/Coin.gif" ?>
            alt="Loading..." />
    </div>

    <script>
        // Wait for the page to load completely
        window.addEventListener('load', function() {
            // Remove the 'loading' class and add 'loaded' class when the page has loaded
            document.body.classList.remove('loading');
            document.body.classList.add('loaded');
        });

        // Add the 'loading' class as soon as the script is executed
        document.body.classList.add('loading');
    </script>
</footer>