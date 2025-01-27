<?php

require get_theme_file_path('/inc/like-route.php');
require get_theme_file_path('/inc/search-route.php');

function lb_custom_rest()
{
    register_rest_field('post', 'authorName', array(
        'get_callback' => function () {
            return get_the_author();
        }
    ));

    register_rest_field('note', 'userNoteCount', array(
        'get_callback' => function () {
            return count_user_posts(get_current_user_id(), 'note');
        }
    ));
}

add_action('rest_api_init', 'lb_custom_rest');

function pageBanner($args = null)
{

    if (!isset($args['title'])) {
        $args['title'] = get_the_title();
    }

    // if (!isset($args['subtitle'])) {
    //   $args['subtitle'] = get_field('page_banner_subtitle');
    // }

    // if (!isset($args['photo'])) {
    //   if (get_field('page_banner_background_image') and !is_archive() and !is_home()) {
    //     $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
    //   } else {
    //     $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    //   }
    // }

?>
    <div class="page-banner">
        <div class="page-banner__bg-image"
            style="background-image: url(<?php echo $args['photo']; ?>);">
        </div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">
                <?php echo $args['title'] ?>
            </h1>
            <div class="page-banner__intro">
                <p><?php echo $args['subtitle']; ?>
                </p>
            </div>
        </div>
    </div>
<?php }

function lb_files()
{
    wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIza----', null, '1.0', true);
    wp_enqueue_script('main-lb-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);


    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(),
        '11.0.0'
    );

    // Enqueue Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array('jquery'), // Add 'jquery' if Swiper requires it
        '11.0.0',
        true // Load in the footer
    );


    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('lb_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('lb_extra_styles', get_theme_file_uri('/build/index.css'));

    wp_enqueue_style('custom_styles', get_theme_file_uri('/css/custom.css'));

    wp_localize_script('main-lb-js', 'lbData', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ));
    // Enqueue custom JS for the frontend
    wp_enqueue_script('custom-js', get_theme_file_uri('/js/custom.js'), array(), '1.0', true);
    wp_enqueue_script('home-loan-js', get_theme_file_uri('/js/home-loan.js'), array(), '1.0', true);
    wp_enqueue_script('chart-js', 'https://cdn.jsdelivr.net/npm/chart.js', array(), '1.0', true);
    wp_enqueue_script('emi-cal-js', get_theme_file_uri('/js/emi-cal.js'), array(), '1.0', true);


    // wp_enqueue_script('bank-js', get_theme_file_uri('/js/bank.js'), array(), '1.0', true);
    // wp_enqueue_script('cards-js', get_theme_file_uri('/js/cards.js'), array(), '1.0', true);
    // wp_enqueue_script('cibil-js', get_theme_file_uri('/js/cibil.js'), array(), '1.0', true);



}

add_action('wp_enqueue_scripts', 'lb_files');

function lb_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
    add_theme_support('editor-styles');
    add_editor_style(array('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap', 'build/style-index.css', 'build/index.css'));
}

add_action('after_setup_theme', 'lb_features');

function lb_adjust_queries($query)
{
    if (!is_admin() and is_post_type_archive('campus') and $query->is_main_query()) {
        $query->set('posts_per_page', -1);
    }

    if (!is_admin() and is_post_type_archive('program') and $query->is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }

    if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )
        ));
    }
}

add_action('pre_get_posts', 'lb_adjust_queries');

function lbMapKey($api)
{
    $api['key'] = 'yourKeyGoesHere';
    return $api;
}

add_filter('acf/fields/google_map/api', 'lbMapKey');

// Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend()
{
    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar()
{
    $ourCurrentUser = wp_get_current_user();

    if (count($ourCurrentUser->roles) == 1 and $ourCurrentUser->roles[0] == 'subscriber') {
        show_admin_bar(false);
    }
}

// Customize Login Screen
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl()
{
    return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS()
{
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('lb_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('lb_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle()
{
    return get_bloginfo('name');
}

// Force note posts to be private
add_filter('wp_insert_post_data', 'makeNotePrivate', 10, 2);

function makeNotePrivate($data, $postarr)
{
    if ($data['post_type'] == 'note') {
        if (count_user_posts(get_current_user_id(), 'note') > 4 and !$postarr['ID']) {
            die("You have reached your note limit.");
        }

        $data['post_content'] = sanitize_textarea_field($data['post_content']);
        $data['post_title'] = sanitize_text_field($data['post_title']);
    }

    if ($data['post_type'] == 'note' and $data['post_status'] != 'trash') {
        $data['post_status'] = "private";
    }

    return $data;
}


// Register our new blocks
function our_new_blocks()
{
    wp_localize_script('wp-editor', 'ourThemeData', array('themePath' => get_stylesheet_directory_uri()));

    register_block_type_from_metadata(__DIR__ . '/build/home');

    register_block_type_from_metadata(__DIR__ . '/build/cardslider');
    register_block_type_from_metadata(__DIR__ . '/build/loaninterestrates');
    register_block_type_from_metadata(__DIR__ . '/build/loanlists');
    register_block_type_from_metadata(__DIR__ . '/build/creditcard');
    register_block_type_from_metadata(__DIR__ . '/build/singleloan');
    register_block_type_from_metadata(__DIR__ . '/build/cibil');
    register_block_type_from_metadata(__DIR__ . '/build/footer');
    register_block_type_from_metadata(__DIR__ . '/build/header');
    register_block_type_from_metadata(__DIR__ . '/build/blogindex');
    register_block_type_from_metadata(__DIR__ . '/build/emicalculator');
    register_block_type_from_metadata(__DIR__ . '/build/creditcardform');
    register_block_type_from_metadata(__DIR__ . '/build/about');
    register_block_type_from_metadata(__DIR__ . '/build/privacypolicy');
    register_block_type_from_metadata(__DIR__ . '/build/terms');
    register_block_type_from_metadata(__DIR__ . '/build/bloglist');
    register_block_type_from_metadata(__DIR__ . '/build/singleblog');
    register_block_type_from_metadata(__DIR__ . '/build/loaninterestform');
    register_block_type_from_metadata(__DIR__ . '/build/creditscore');
}

add_action('init', 'our_new_blocks');


function myallowedblocks($allowed_block_types, $editor_context)
{
    // If you are on a page/post editor screen
    if (!empty($editor_context->post)) {
        return $allowed_block_types;
    }

    // if you are on the FSE screen
    return array('ourblocktheme/header', 'ourblocktheme/footer');
}

// Uncomment the line below if you actually want to restrict which block types are allowed
//add_filter('allowed_block_types_all', 'myallowedblocks', 10, 2);


// Allow SVG file uploads
function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

// Fix SVG Thumbnail Display
function fix_svg_display()
{
    echo '<style>
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'fix_svg_display');


function theme_setup()
{
    add_theme_support('menus');
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('after_setup_theme', 'theme_setup');


function custom_body_class($classes)
{
    if (is_page()) {
        $acf_value = get_field('body_class');

        if ($acf_value) {
            $classes[] = sanitize_html_class($acf_value); // Sanitize and add as a class
        }
    }
    return $classes;
}
add_filter('body_class', 'custom_body_class');


function load_custom_scripts_for_about_page()
{
    // Check if the current page ID is 11
    if (is_page(553)) {
        // Enqueue jQuery (WordPress includes jQuery by default)
        wp_enqueue_script('jquery');

        wp_enqueue_style(
            'caveat-google-fonts',
            '//fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap'
        );
        wp_enqueue_style('poppins-google-fonts', '//fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap');

        // Enqueue lightGallery JS
        wp_enqueue_script('lightgallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js', array('jquery'), '2.7.1', true);

        // Enqueue Owl Carousel JS
        wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '2.3.4', true);

        // Enqueue lightGallery CSS (optional, if needed)
        wp_enqueue_style('lightgallery-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery.min.css', array(), '2.7.1');

        // Enqueue Owl Carousel CSS (optional, if needed)
        wp_enqueue_style('owl-carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), '2.3.4');
        wp_enqueue_script('about-js', get_theme_file_uri('/js/about.js'), array(), '1.0', true);
    }
}
add_action('wp_enqueue_scripts', 'load_custom_scripts_for_about_page');


// add_filter('frm_get_default_value', 'set_post_title_as_default', 10, 2);
// function set_post_title_as_default($new_value, $field)
// {
//     if ($field->default_value == '[post_title]') {
//         $new_value = get_the_title();
//     }
//     return $new_value;
// }

/*   ************** */

add_filter('frm_get_default_value', 'set_custom_default_values', 10, 2);
function set_custom_default_values($new_value, $field)
{
    // Get current post data
    global $post;

    // Get values from session storage if available
    $lender = isset($_SESSION['selected_lender']) ? $_SESSION['selected_lender'] : '';
    $roi = isset($_SESSION['selected_roi']) ? $_SESSION['selected_roi'] : '';

    // Check which field is being processed based on its default value or field ID
    switch ($field->default_value) {
        case '[post_title]':
            $new_value = get_the_title();
            break;

        case '[loan_type]':
            // Get loan type from post meta or current page
            $new_value = get_field('loan_type', $post->ID) ?: $new_value;
            break;
    }


    return $new_value;
}


/*******************/

function add_gtm_to_head()
{
?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16805140402">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-16805140402');
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MXNVBDDD');
    </script>
    <!-- End Google Tag Manager -->
    <meta name="google-site-verification" content="AfCHcgXFPJ5HkFbx71FM4w6Sz9K24mfBAjwqBRQ-6is" />

<?php
}
add_action('wp_head', 'add_gtm_to_head', 1);

function add_gtm_to_body()
{
?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXNVBDDD" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
<?php
}
add_action('wp_body_open', 'add_gtm_to_body');

function cibil_form_scripts()
{
    wp_enqueue_script('cibil-ajax-script', get_template_directory_uri() . '/js/cibil-ajax.js', ['jquery'], null, true);
    wp_localize_script('cibil-ajax-script', 'cibilAjax', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('cibil_nonce'),
    ]);
}
add_action('wp_enqueue_scripts', 'cibil_form_scripts');

function upload_pdf_from_url($pdf_url)
{
    // Ensure the URL is valid
    if (filter_var($pdf_url, FILTER_VALIDATE_URL) === FALSE) {
        return new WP_Error('invalid_url', 'Invalid URL.');
    }

    // Get WordPress upload directory path
    $upload_dir = wp_upload_dir();
    $base_dir = $upload_dir['basedir'] . '/loanbazaar-reports';

    // Generate dynamic folder structure based on date
    $date_folder = date('d-m-Y', time()); // Example: 31-12-2024
    $final_dir = $base_dir . '/' . $date_folder;

    // Create the folder structure if it doesn't exist
    if (!file_exists($final_dir)) {
        wp_mkdir_p($final_dir);
    }

    // Generate file name with timestamp
    $filename = 'Loanbazaar_' . date('d-m-y_H-i-s', time()) . '.pdf';
    $file_path = $final_dir . '/' . $filename;

    // Download PDF from URL and save to the server
    $response = wp_remote_get($pdf_url);
    if (is_wp_error($response)) {
        return new WP_Error('download_failed', 'Failed to download the PDF.');
    }

    // Get the file content from the response
    $file_data = wp_remote_retrieve_body($response);
    if (empty($file_data)) {
        return new WP_Error('empty_file', 'Downloaded file is empty.');
    }

    // Save the file to the target location
    $file_saved = file_put_contents($file_path, $file_data);

    // Check if file was saved successfully
    if (!$file_saved) {
        return new WP_Error('file_save_failed', 'Failed to save the file.');
    }

    // Return the file URL after successful upload
    $file_url = $upload_dir['baseurl'] . '/loanbazaar-reports/' . $date_folder . '/' . $filename;
    return $file_url;
}

use setasign\Fpdi\Tcpdf\Fpdi;


function handle_cibil_form_submission()
{
    check_ajax_referer('cibil_nonce', 'nonce');

    parse_str($_POST['form_data'], $form_data);

    //   require_once get_template_directory() . '/vendor/autoload.php'; // Adjust path if installed manually


    // API Endpoint and Bearer Token
    $api_url = 'https://kyc-api.surepass.io/api/v1/credit-report-experian/fetch-report-pdf';
    $bearer_token = 'ey---'; // Replace with your actual Bearer Token
    // Request body
    $api_request_body = [
        'name' => sanitize_text_field($form_data['name']),
        'consent' => 'Yes',
        'mobile' => sanitize_text_field($form_data['mobile-number']),
        'pan' => sanitize_text_field($form_data['pancard']),
    ];

    // Make the API request
    $response = wp_remote_post($api_url, [
        'headers' => [
            'Authorization' => 'Bearer ' . $bearer_token,
            'Content-Type' => 'application/json',
        ],
        'body' => json_encode($api_request_body),
        'timeout' => 80,
    ]);

    if (is_wp_error($response)) {
        wp_send_json_error(['message' => $response->get_error_message()]);
        return;
    }

    $response_body = wp_remote_retrieve_body($response);
    $response_code = wp_remote_retrieve_response_code($response);

    // Parse API response
    if ($response_code === 200) {
        $data = json_decode($response_body, true);
        $success_status = $data['success'];
        if (isset($data['data']['credit_report_link'])) {
            $file_url = $data['data']['credit_report_link']; // PDF URL

            // Load required libraries

            require_once __DIR__ . '/vendor/autoload.php';

            // Step 1: Download the PDF
            $pdf_content = file_get_contents($file_url);
            if (!$pdf_content) {
                return 'Failed to download the PDF.';
            }

            $temp_pdf = wp_upload_dir()['basedir'] . '/temp.pdf';
            file_put_contents($temp_pdf, $pdf_content);

            // Step 2: Create a password-protected PDF
            $protected_pdf = wp_upload_dir()['basedir'] . '/Credit-Score-' . $form_data['name'] . '.pdf';

            $password = sanitize_text_field($form_data['pancard']);

            $pdf = new Fpdi();
            // $pdf->SetProtection(['print', 'copy'], $password, null, 0, null);
            // Check if the file exists
            if (!file_exists($temp_pdf)) {
                die("Error: PDF file not found.");
            }

            try {
                // Set Protection: Allow only printing and copying with a password
                $pdf->SetProtection(['print', 'copy'], $password, null, 0, null);

                // Import pages from the source PDF
                $page_count = $pdf->setSourceFile($temp_pdf);
                for ($i = 1; $i <= $page_count; $i++) {
                    $template_id = $pdf->importPage($i);
                    $pdf->AddPage();
                    $pdf->useTemplate($template_id);
                }

                // Output the password-protected PDF
                $pdf->Output($protected_pdf, 'F'); // Save to file 
                //  echo "Password-protected PDF created successfully.";
            } catch (Exception $e) {
                die("Error processing the PDF: " . $e->getMessage());
            }

            $site_url = get_site_url();
            $imagePath = 'https://loanbazaar.co/wp-content/themes/loan-bazaar/images/loanbazaar-logo.png';


            if (class_exists('FrmEntry')) {
                $form_id = 11; // Replace with your Form ID
                $entry_data = array(
                    'item_meta' => array(

                        67 => $form_data['name'],
                        68 => $form_data['email'],
                        69 => $form_data['mobile-number'],
                        70 => $form_data['pancard'],
                        71 => $form_data['category'],
                        72 => $form_data['loan-type'],
                        //  73 => $upload_response,
                        74 => $data['data']['credit_score'],
                        75  => $success_status,


                    ),
                    'form_id' => $form_id,
                );

                // Create the entry
                $entry_id = FrmEntry::create($entry_data);
            }

            $headers = array('Content-Type: text/html; charset=UTF-8');
            $Subject = 'Loan Bazaar’s Experian Credit Score & Report.';
            // $message = 'Hello, PDF URL: <a href="' . $upload_response . '">Click Here</a>';
            // Prepare the email message
            $message = '
                Dear ' . esc_html($form_data['name']) . ',
                       <p>Thank you for choosing Loan Bazaar to check your Experian Credit Score and Report.</p>
                       <p>You will find your detailed Experian Credit Report attached in PDF format. To open the file, you will need a PDF Reader. This report provides valuable insights into your credit profile, including your credit score, credit history, and other important details to help you better understand your financial standing.</p>
                       <p><b>Password to open the report:</b> Your password is your PAN number.</p>
                       <p>We encourage you to review your report carefully. Maintaining a healthy credit score is essential for securing loans, credit cards, and other financial opportunities at favorable terms.</p>
                    
                       Thank you.<br><br>
                       
                       <table style="font-family: Arial, sans-serif; font-size: 14px; color: #000;">
                        <tr> 
                            <td style="padding-right: 15px; vertical-align: top;">
                            <img src="' . get_template_directory_uri() . '/images/mail-logo.png" alt="Loan Bazaar Logo" style="width: 80px; border-radius: 50%;">
                            </td>
                            <td style="vertical-align: top; border-left:1px solid lightgray;padding-left:20px;">
                            
                            <span style="font-size: 14px; color: #555;"><b>Loan Bazaar Financial Services Pvt Ltd</b></span><br><br>
                            <span style="color: #555;"> <a href="https://www.loanbazaar.co" style="color: #0073AA; text-decoration: none;">www.loanbazaar.co</a></span><br>
                            
                            <span style="color: #555;">B 307, Lodha Supremus 2, Road No. 22, Wagle Industrial Estate,
                            Near New Passport Office, Thane West, Maharashtra 400604</span><br><br>
                            <a href="https://www.facebook.com/loanbazaarbyupstream" style="margin-right: 5px;"><img src="' . get_template_directory_uri() . '/images/facebook.png" alt="Facebook" style="width: 20px;"></a>
                            <a href="https://www.instagram.com/loanbazaar/" style="margin-right: 5px;"><img src="' . get_template_directory_uri() . '/images/instagram.png" alt="Instagram" style="width: 20px;"></a>
                            <a href="https://www.linkedin.com/company/loan-bazaar01/" style="margin-right: 5px;"><img src="' . get_template_directory_uri() . '/images/linkedin.png" alt="LinkedIn" style="width: 20px;"></a>
                            </td>
                        </tr>
                        </table>';



            // Send the email
            $mail_sent = wp_mail(
                $form_data['email'],  // To email address
                $Subject,          // Email subject
                $message,          // Email message body
                $headers,          // Email headers
                [$protected_pdf]        // Attachment
            );

            if ($mail_sent) {
                $mail_resp = 'Email sent successfully with the attached PDF!';
            } else {
                $mail_resp = 'Failed to send the email';
            }

            // Cleanup temporary files
            unlink($temp_pdf);
            unlink($protected_pdf);

            wp_send_json_success([
                'message' => 'Your credit report has been generated successfully.',
                'pdf_url' => $data['data']['credit_report_link'],
                'credit_score' => $data['data']['credit_score'],
                'mail_response' => $mail_resp,
            ]);
        } else {
            wp_send_json_error(['message' => 'API response did not include a PDF URL.']);
            if (class_exists('FrmEntry')) {
                $form_id = 11; // Replace with your Form ID
                $entry_data = array(
                    'item_meta' => array(
                        67 => $form_data['name'],
                        68 => $form_data['email'],
                        69 => $form_data['mobile-number'],
                        70 => $form_data['pancard'],
                        71 => $form_data['category'],
                        72 => $form_data['loan-type'],
                        75  => $success_status,
                    ),
                    'form_id' => $form_id,
                );

                // Create the entry
                $entry_id = FrmEntry::create($entry_data);
            }
        }
    } else {
        wp_send_json_error(['message' => json_decode($response_body)]);
        $success_status = $data['data']['success'];
        if (class_exists('FrmEntry')) {
            $form_id = 11; // Replace with your Form ID
            $entry_data = array(
                'item_meta' => array(
                    67 => $form_data['name'],
                    68 => $form_data['email'],
                    69 => $form_data['mobile-number'],
                    70 => $form_data['pancard'],
                    71 => $form_data['category'],
                    72 => $form_data['loan-type'],
                    75  => $success_status,
                ),
                'form_id' => $form_id,
            );

            // Create the entry
            $entry_id = FrmEntry::create($entry_data);
        }
    }
}

add_action('wp_ajax_submit_cibil_form', 'handle_cibil_form_submission');
add_action('wp_ajax_nopriv_submit_cibil_form', 'handle_cibil_form_submission');



// Send OTP

add_action('wp_ajax_send_otp', 'send_otp');
add_action('wp_ajax_nopriv_send_otp', 'send_otp');

function send_otp()
{
    // Retrieve mobile number from the AJAX request
    $mobile = isset($_POST['mobile']) ? sanitize_text_field($_POST['mobile']) : '';

    if (empty($mobile)) {
        wp_send_json_error(['message' => 'Mobile number is required.']);
    }

    // Code to send OTP via SMS (use any SMS API here)
    // Example using a placeholder function `send_sms`
    $sms_sent = send_sms($mobile);

    if ($sms_sent) {
        wp_send_json_success(['message' => 'OTP sent successfully.']);
    } else {
        wp_send_json_error(['message' => 'Failed to send OTP.']);
    }

    wp_die(); // Required to end AJAX requests
}

function send_sms($mobile)
{

    $api_url = 'https://kyc-api.surepass.io/api/v1/sms/send-sms';
    $bearer_token = 'ey---'; // Replace with your actual Bearer Token

    $templateid = '170--'; //insert your id

    $otp = rand(100000, 999999);

    // Save OTP in the session for verification
    session_start();
    $_SESSION['otp'] = $otp;
    // Request body
    $api_request_body = [
        'template_id' => $templateid,
        'sender_id' => 'LBFSPL',
        'mobile' => $mobile,
        'variables' => [
            'var1' => $otp,
        ]
    ];

    // Make the API request
    $response = wp_remote_post($api_url, [
        'headers' => [
            'Authorization' => 'Bearer ' . $bearer_token,
            'Content-Type' => 'application/json',
        ],
        'body' => json_encode($api_request_body),
        'timeout' => 80,
    ]);

    if (is_wp_error($response)) {
        wp_send_json_error(['message' => $response->get_error_message()]);
        return;
    }

    //print_r($response);

    $response_body = wp_remote_retrieve_body($response);

    $respbodyarr = json_decode($response_body, true);

    $status_code = $respbodyarr['status_code'];

    if ($status_code == 200) {
        return true;
    } else {
        return false;
    }
}



// Send OTP

add_action('wp_ajax_verify_otp', 'verify_otp');
add_action('wp_ajax_nopriv_verify_otp', 'verify_otp');

function verify_otp()
{

    session_start();

    $user_otp = isset($_POST['otp']) ? sanitize_text_field($_POST['otp']) : '';
    $saved_otp = isset($_SESSION['otp']) ? $_SESSION['otp'] : '';

    if (empty($user_otp)) {
        wp_send_json_error(['message' => 'OTP is required.']);
    }

    if ($user_otp == $saved_otp) {
        unset($_SESSION['otp']);
        wp_send_json_success(['message' => 'OTP verified successfully.']);
    } else {
        wp_send_json_error(['message' => 'Invalid OTP.']);
    }
}
