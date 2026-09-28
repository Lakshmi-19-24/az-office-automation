<?php

/* =========================================================
   AZ OFFICE AUTOMATION - THEME SETUP
========================================================= */

function az_office_automation_setup() {

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    register_nav_menus(
        array(
            'primary' => 'Primary Menu',
        )
    );
}

add_action(
    'after_setup_theme',
    'az_office_automation_setup'
);


/* =========================================================
   AZ OFFICE AUTOMATION - CSS & JAVASCRIPT
========================================================= */

function az_office_automation_assets() {

    wp_enqueue_style(
        'az-office-automation-style',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );

    wp_enqueue_script(
        'az-office-automation-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '1.0',
        true
    );
}

add_action(
    'wp_enqueue_scripts',
    'az_office_automation_assets'
);


/* =========================================================
   MACHINES SYSTEM
========================================================= */

require_once get_template_directory() . '/inc/machines.php';


/* =========================================================
   AZ MACHINE QUOTE ENQUIRY
=========/* =========================================================
   AZ MACHINE / PRODUCT QUOTE ENQUIRY
========================================================= */

function az_handle_machine_quote_enquiry() {

    /*
     * Only allow POST requests
     */
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return;
    }


    /*
     * PRODUCT ID
     */
    $product_id = isset($_POST['product_id'])
        ? absint($_POST['product_id'])
        : 0;


    /*
     * MACHINE / PRODUCT NAME
     */
    $machine_name = isset($_POST['machine_name'])
        ? sanitize_text_field(
            wp_unslash($_POST['machine_name'])
        )
        : 'General Enquiry';


    /*
     * NAME
     */
    $name = isset($_POST['name'])
        ? sanitize_text_field(
            wp_unslash($_POST['name'])
        )
        : '';


    /*
     * PHONE
     */
    $phone = isset($_POST['phone'])
        ? sanitize_text_field(
            wp_unslash($_POST['phone'])
        )
        : '';


    /*
     * EMAIL
     */
    $email = isset($_POST['email'])
        ? sanitize_email(
            wp_unslash($_POST['email'])
        )
        : '';


    /*
     * COMPANY
     */
    $company = isset($_POST['company'])
        ? sanitize_text_field(
            wp_unslash($_POST['company'])
        )
        : '';


    /*
     * REQUIREMENT
     */
    $requirement = isset($_POST['requirement'])
        ? sanitize_textarea_field(
            wp_unslash($_POST['requirement'])
        )
        : '';


    /*
     * VALIDATION
     */
    if (empty($name) || empty($phone)) {

        $redirect_url = wp_get_referer();

        if (!$redirect_url) {
            $redirect_url = home_url('/contact/');
        }

        wp_safe_redirect(
            add_query_arg(
                'quote',
                'error',
                $redirect_url
            )
        );

        exit;
    }


    /*
     * EMAIL RECIPIENT
     */
    $to = get_option('admin_email');


    /*
     * EMAIL SUBJECT
     */
    $subject = 'New Machine Enquiry - ' . $machine_name;


    /*
     * EMAIL BODY
     */
    $email_body =
        "New enquiry received from AZ Office Automation website.\n\n";


    $email_body .=
        "Machine / Product: "
        . $machine_name
        . "\n";


    $email_body .=
        "Product ID: "
        . ($product_id ? $product_id : 'N/A')
        . "\n";


    $email_body .=
        "Name: "
        . $name
        . "\n";


    $email_body .=
        "Mobile: "
        . $phone
        . "\n";


    $email_body .=
        "Email: "
        . ($email ? $email : 'Not provided')
        . "\n";


    $email_body .=
        "Company / Organisation: "
        . ($company ? $company : 'Not provided')
        . "\n";


    $email_body .=
        "\nCustomer Requirement:\n"
        . $requirement
        . "\n";


    /*
     * EMAIL HEADERS
     */
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8'
    );


    if ($email) {

        $headers[] =
            'Reply-To: '
            . $email;

    }


    /*
     * SEND EMAIL
     */
    wp_mail(
        $to,
        $subject,
        $email_body,
        $headers
    );


    /*
     * REDIRECT AFTER SUCCESS
     */
    $redirect_url = wp_get_referer();


    if (!$redirect_url) {
        $redirect_url = home_url('/contact/');
    }


    $redirect_url = add_query_arg(
        'quote',
        'success',
        $redirect_url
    );


    /*
     * Return to enquiry section
     */
    $redirect_url .= '#machine-enquiry';


    wp_safe_redirect(
        $redirect_url
    );


    exit;
}


/*
 * Logged-in users
 */
add_action(
    'admin_post_az_machine_quote',
    'az_handle_machine_quote_enquiry'
);


/*
 * Visitors / non-logged-in users
 */
add_action(
    'admin_post_nopriv_az_machine_quote',
    'az_handle_machine_quote_enquiry'
);

/* =========================================================
   AZ OFFICE AUTOMATION - FLAT WOOCOMMERCE PRODUCT URLS
   Example:
   /canon-ir-adv-4045-reconditioned/
========================================================= */

function az_flat_woocommerce_product_permalink( $permalink, $post ) {

    if ( $post->post_type === 'product' ) {

        return home_url( '/' . $post->post_name . '/' );

    }

    return $permalink;
}

add_filter(
    'post_type_link',
    'az_flat_woocommerce_product_permalink',
    10,
    2
);
/* =========================================================
   AZ OFFICE AUTOMATION - FLAT PRODUCT URL ROUTING
========================================================= */

function az_flat_product_url_routing( $query_vars ) {

    if ( ! empty( $query_vars['name'] ) && empty( $query_vars['post_type'] ) ) {

        $product = get_page_by_path(
            $query_vars['name'],
            OBJECT,
            'product'
        );

        if ( $product ) {

            $query_vars['post_type'] = 'product';

        }
    }

    return $query_vars;
}

add_filter(
    'request',
    'az_flat_product_url_routing'
);            
/* =========================================================
 * AZ MACHINE FINDER - RECOMMENDATION ENGINE
 * ========================================================= */

function az_machine_finder_recommendations() {

    $answers = isset($_POST['answers'])
    ? json_decode(stripslashes($_POST['answers']), true)
    : array();

if (!is_array($answers)) {
    wp_send_json_error(array(
        'message' => 'Invalid finder data.'
    ));
}
    $machine_type  = sanitize_text_field($answers['machine_type'] ?? '');
    $volume        = sanitize_text_field($answers['monthly_volume'] ?? '');
    $output        = sanitize_text_field($answers['output'] ?? '');
    $paper_size    = sanitize_text_field($answers['paper_size'] ?? '');
    $condition     = sanitize_text_field($answers['condition'] ?? '');
    $budget        = sanitize_text_field($answers['budget'] ?? '');
    $purchase_type = sanitize_text_field($answers['purchase_type'] ?? '');

    /*
     * Convert monthly volume into a minimum required volume.
     */
    $minimum_volume = 0;

    switch ($volume) {

        case 'Below 1000':
            $minimum_volume = 0;
            break;

        case '1000-5000':
            $minimum_volume = 1000;
            break;

        case '5000-10000':
            $minimum_volume = 5000;
            break;

        case '10000+':
            $minimum_volume = 10000;
            break;
    }

    /*
     * Start with WooCommerce products.
     */
    $args = array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => 30,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $products = get_posts($args);

    $matches = array();

    foreach ($products as $product_post) {

        $product = wc_get_product($product_post->ID);

        if (!$product) {
            continue;
        }

        $score = 0;

        /*
         * PRODUCT CATEGORY
         */
        if ($machine_type && $machine_type !== 'Not Sure') {

            $category_text = strtolower(
                implode(
                    ' ',
                    wp_get_post_terms(
                        $product_post->ID,
                        'product_cat',
                        array('fields' => 'names')
                    )
                )
            );

            $machine_type_lower = strtolower($machine_type);

            if (
                strpos($category_text, $machine_type_lower) !== false ||
                (
                    $machine_type === 'Photocopier' &&
                    (
                        strpos($category_text, 'photocopier') !== false ||
                        strpos($category_text, 'mfp') !== false
                    )
                )
            ) {
                $score += 5;
            }
        }

        /*
         * OUTPUT
         */
        if ($output && $output !== 'Both') {

            $output_terms = wp_get_post_terms(
                $product_post->ID,
                'pa_output',
                array('fields' => 'names')
            );

            $output_text = strtolower(implode(' ', $output_terms));

            if (
                strpos($output_text, strtolower($output)) !== false
            ) {
                $score += 4;
            }
        }

        /*
         * CONDITION
         */
        if ($condition && $condition !== 'Not Sure') {

            $condition_terms = wp_get_post_terms(
                $product_post->ID,
                'pa_condition',
                array('fields' => 'names')
            );

            $condition_text = strtolower(
                implode(' ', $condition_terms)
            );

            if (
                strpos(
                    $condition_text,
                    strtolower($condition)
                ) !== false
            ) {
                $score += 5;
            }
        }

        /*
         * PAPER SIZE
         */
        if ($paper_size) {

            $paper_terms = wp_get_post_terms(
                $product_post->ID,
                'pa_paper-size',
                array('fields' => 'names')
            );

            $paper_text = strtolower(
                implode(' ', $paper_terms)
            );

            if (
                strpos(
                    $paper_text,
                    strtolower($paper_size)
                ) !== false
            ) {
                $score += 3;
            }
        }

        /*
         * MONTHLY VOLUME
         *
         * Try the possible product meta keys used by
         * the catalogue/import process.
         */
        $recommended_volume = 0;

        $volume_keys = array(
            'recommended_monthly_volume',
            '_recommended_monthly_volume',
            'recommended_volume',
            '_recommended_volume',
            'monthly_volume',
            '_monthly_volume'
        );

        foreach ($volume_keys as $volume_key) {

            $value = get_post_meta(
                $product_post->ID,
                $volume_key,
                true
            );

            if ($value !== '') {

                $numeric_value = (int) preg_replace(
                    '/[^0-9]/',
                    '',
                    (string) $value
                );

                if ($numeric_value > 0) {
                    $recommended_volume = $numeric_value;
                    break;
                }
            }
        }

        /*
         * IMPORTANT:
         * Never recommend a machine below the required
         * monthly volume when catalogue volume is available.
         */
        if (
            $minimum_volume > 0 &&
            $recommended_volume > 0 &&
            $recommended_volume < $minimum_volume
        ) {
            continue;
        }

        if (
            $minimum_volume > 0 &&
            $recommended_volume >= $minimum_volume
        ) {
            $score += 6;
        }

        /*
         * RENTAL PREFERENCE
         */
        if ($purchase_type === 'Rent') {

            $rental_price = get_post_meta(
                $product_post->ID,
                'rental_month',
                true
            );

            if ($rental_price !== '') {
                $score += 3;
            }
        }

        /*
         * NOT SURE
         */
        if ($purchase_type === 'Not Sure') {
            $score += 1;
        }

        /*
         * PRODUCT IMAGE
         */
        $image_url = get_the_post_thumbnail_url(
            $product_post->ID,
            'medium'
        );

        /*
         * PRODUCT URL
         */
        $product_url = get_permalink($product_post->ID);

        $matches[] = array(
            'id'                => $product_post->ID,
            'name'              => get_the_title($product_post->ID),
            'url'               => $product_url,
            'image'             => $image_url ?: '',
            'price'             => $product->get_price(),
            'score'             => $score,
            'recommended_volume'=> $recommended_volume,
        );
    }

    /*
     * Sort by highest matching score.
     */
    usort($matches, function($a, $b) {

        return $b['score'] <=> $a['score'];

    });

    /*
     * Always return up to 3 recommendations.
     */
    $matches = array_slice($matches, 0, 3);

    /*
     * If there are no exact matches, return the first
     * available catalogue products rather than showing
     * an empty result.
     */
    if (empty($matches)) {

        $fallback_products = get_posts(array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ));

        foreach ($fallback_products as $fallback_post) {

            $fallback_product = wc_get_product(
                $fallback_post->ID
            );

            if (!$fallback_product) {
                continue;
            }

            $matches[] = array(
                'id' => $fallback_post->ID,
                'name' => get_the_title($fallback_post->ID),
                'url' => get_permalink($fallback_post->ID),
                'image' => get_the_post_thumbnail_url(
                    $fallback_post->ID,
                    'medium'
                ) ?: '',
                'price' => $fallback_product->get_price(),
                'score' => 0,
                'recommended_volume' => 0,
            );
        }
    }

    wp_send_json_success(array(
        'recommendations' => $matches
    ));
}

add_action(
    'wp_ajax_az_machine_finder_recommendations',
    'az_machine_finder_recommendations'
);

add_action(
    'wp_ajax_nopriv_az_machine_finder_recommendations',
    'az_machine_finder_recommendations'
);