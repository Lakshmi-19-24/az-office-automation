<?php

/* =========================
   MACHINES SYSTEM
========================= */

/* Register Machine Post Type */
function az_register_machines() {

    register_post_type('machine', array(

        'labels' => array(
            'name'          => 'Machines',
            'singular_name' => 'Machine',
            'add_new'       => 'Add New',
            'add_new_item'  => 'Add New Machine',
            'edit_item'     => 'Edit Machine',
            'new_item'      => 'New Machine',
            'view_item'     => 'View Machine',
            'search_items'  => 'Search Machines',
        ),

        'public'       => true,
        'show_ui'      => true,
        'show_in_menu' => true,

        'menu_icon' => 'dashicons-printer',

        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ),

        'has_archive' => true,

        'rewrite' => array(
            'slug' => 'machines'
        ),

        'show_in_rest' => true
    ));
}

add_action('init', 'az_register_machines');


/* =========================
   MACHINE DETAILS META BOX
========================= */

function az_machine_details_metabox() {

    add_meta_box(
        'az_machine_details',
        'Machine Details',
        'az_machine_details_callback',
        'machine',
        'normal',
        'high'
    );

}

add_action('add_meta_boxes', 'az_machine_details_metabox');


/* =========================
   MACHINE DETAILS FORM
========================= */

function az_machine_details_callback($post) {

    wp_nonce_field(
        'az_save_machine_details',
        'az_machine_details_nonce'
    );

    $fields = array(
        'brand',
        'model',
        'category',
        'condition',
        'output',
        'paper_size',
        'speed',
        'monthly_volume',
        'duplex',
        'network',
        'wifi',
        'adf',
        'finisher',
        'fax',
        'mobile_print',
        'sale_price',
        'rental_month',
        'amc_rate',
        'cpc_bw',
        'cpc_colour',
        'warranty',
        'stock_status',
        'recommended_volume',
        'brochure_pdf'
    );

    $values = array();

    foreach ($fields as $field) {
        $values[$field] = get_post_meta(
            $post->ID,
            '_az_' . $field,
            true
        );
    }

    ?>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">

        <p>
            <label><strong>Brand</strong></label><br>
            <select name="az_brand" style="width:100%;">
                <option value="">Select Brand</option>
                <?php
                $brands = array(
                    'Canon',
                    'Xerox',
                    'Kyocera',
                    'Konica Minolta',
                    'Fuji Film',
                    'Epson'
                );

                foreach ($brands as $brand) {
                    echo '<option value="' . esc_attr($brand) . '" ' .
                        selected($values['brand'], $brand, false) . '>' .
                        esc_html($brand) .
                        '</option>';
                }
                ?>
            </select>
        </p>

        <p>
            <label><strong>Model</strong></label><br>
            <input type="text"
                   name="az_model"
                   value="<?php echo esc_attr($values['model']); ?>"
                   style="width:100%;">
        </p>

        <p>
            <label><strong>Category</strong></label><br>
            <select name="az_category" style="width:100%;">
                <option value="">Select Category</option>
                <?php
                $categories = array(
                    'Photocopier / MFP',
                    'Printer',
                    'Interactive Display',
                    'CCTV',
                    'Attendance / Access',
                    'Laptop / Desktop',
                    'Networking',
                    'Server',
                    'IP Telephony',
                    'Projector',
                    'Toner / Spares / Consumables'
                );

                foreach ($categories as $category) {
                    echo '<option value="' . esc_attr($category) . '" ' .
                        selected($values['category'], $category, false) . '>' .
                        esc_html($category) .
                        '</option>';
                }
                ?>
            </select>
        </p>

        <p>
            <label><strong>Condition</strong></label><br>
            <select name="az_condition" style="width:100%;">
                <option value="New" <?php selected($values['condition'], 'New'); ?>>New</option>
                <option value="Reconditioned" <?php selected($values['condition'], 'Reconditioned'); ?>>Reconditioned</option>
            </select>
        </p>

        <p>
            <label><strong>Output</strong></label><br>
            <select name="az_output" style="width:100%;">
                <option value="B&W" <?php selected($values['output'], 'B&W'); ?>>B&W</option>
                <option value="Colour" <?php selected($values['output'], 'Colour'); ?>>Colour</option>
                <option value="Both" <?php selected($values['output'], 'Both'); ?>>Both</option>
            </select>
        </p>

        <p>
            <label><strong>Paper Size</strong></label><br>
            <select name="az_paper_size" style="width:100%;">
                <option value="A4">A4</option>
                <option value="A3">A3</option>
                <option value="A3 & A4">A3 & A4</option>
            </select>
        </p>

        <p>
            <label><strong>Speed (PPM)</strong></label><br>
            <input type="number"
                   name="az_speed"
                   value="<?php echo esc_attr($values['speed']); ?>"
                   style="width:100%;">
        </p>

        <p>
            <label><strong>Monthly Print Volume</strong></label><br>
            <input type="text"
                   name="az_monthly_volume"
                   value="<?php echo esc_attr($values['monthly_volume']); ?>"
                   placeholder="Example: 10000"
                   style="width:100%;">
        </p>

        <p>
            <label><strong>Recommended Monthly Volume</strong></label><br>
            <input type="text"
                   name="az_recommended_volume"
                   value="<?php echo esc_attr($values['recommended_volume']); ?>"
                   placeholder="Example: 30000"
                   style="width:100%;">
        </p>

        <p>
            <label><strong>Sale Price</strong></label><br>
            <input type="text"
                   name="az_sale_price"
                   value="<?php echo esc_attr($values['sale_price']); ?>"
                   placeholder="₹"
                   style="width:100%;">
        </p>

        <p>
            <label><strong>Rental / Month</strong></label><br>
            <input type="text"
                   name="az_rental_month"
                   value="<?php echo esc_attr($values['rental_month']); ?>"
                   placeholder="₹"
                   style="width:100%;">
        </p>

        <p>
            <label><strong>AMC Rate</strong></label><br>
            <input type="text"
                   name="az_amc_rate"
                   value="<?php echo esc_attr($values['amc_rate']); ?>"
                   style="width:100%;">
        </p>

        <p>
            <label><strong>CPC Rate - B&W</strong></label><br>
            <input type="text"
                   name="az_cpc_bw"
                   value="<?php echo esc_attr($values['cpc_bw']); ?>"
                   style="width:100%;">
        </p>

        <p>
            <label><strong>CPC Rate - Colour</strong></label><br>
            <input type="text"
                   name="az_cpc_colour"
                   value="<?php echo esc_attr($values['cpc_colour']); ?>"
                   style="width:100%;">
        </p>

        <p>
            <label><strong>Warranty</strong></label><br>
            <input type="text"
                   name="az_warranty"
                   value="<?php echo esc_attr($values['warranty']); ?>"
                   placeholder="Example: 1 Year"
                   style="width:100%;">
        </p>

        <p>
            <label><strong>Stock Status</strong></label><br>
            <select name="az_stock_status" style="width:100%;">
                <option value="In Stock">In Stock</option>
                <option value="Available on Order">Available on Order</option>
                <option value="Out of Stock">Out of Stock</option>
            </select>
        </p>

    </div>

    <hr>

    <h3>Features</h3>

    <p>
        <label>
            <input type="checkbox" name="az_duplex" value="Yes"
                <?php checked($values['duplex'], 'Yes'); ?>>
            Duplex
        </label>

        &nbsp;&nbsp;

        <label>
            <input type="checkbox" name="az_network" value="Yes"
                <?php checked($values['network'], 'Yes'); ?>>
            Network
        </label>

        &nbsp;&nbsp;

        <label>
            <input type="checkbox" name="az_wifi" value="Yes"
                <?php checked($values['wifi'], 'Yes'); ?>>
            WiFi
        </label>

        &nbsp;&nbsp;

        <label>
            <input type="checkbox" name="az_adf" value="Yes"
                <?php checked($values['adf'], 'Yes'); ?>>
            ADF
        </label>

        &nbsp;&nbsp;

        <label>
            <input type="checkbox" name="az_finisher" value="Yes"
                <?php checked($values['finisher'], 'Yes'); ?>>
            Finisher
        </label>

        &nbsp;&nbsp;

        <label>
            <input type="checkbox" name="az_fax" value="Yes"
                <?php checked($values['fax'], 'Yes'); ?>>
            Fax
        </label>

        &nbsp;&nbsp;

        <label>
            <input type="checkbox" name="az_mobile_print" value="Yes"
                <?php checked($values['mobile_print'], 'Yes'); ?>>
            Mobile Print
        </label>
    </p>

    <p>
        <label><strong>Brochure PDF URL</strong></label><br>
        <input type="url"
               name="az_brochure_pdf"
               value="<?php echo esc_attr($values['brochure_pdf']); ?>"
               placeholder="PDF URL"
               style="width:100%;">
    </p>

    <?php
}


/* =========================
   SAVE MACHINE DETAILS
========================= */

function az_save_machine_details($post_id) {

    if (
        !isset($_POST['az_machine_details_nonce']) ||
        !wp_verify_nonce(
            $_POST['az_machine_details_nonce'],
            'az_save_machine_details'
        )
    ) {
        return;
    }

    if (
        defined('DOING_AUTOSAVE') &&
        DOING_AUTOSAVE
    ) {
        return;
    }

    if (
        isset($_POST['post_type']) &&
        $_POST['post_type'] === 'machine'
    ) {

        if (
            !current_user_can('edit_post', $post_id)
        ) {
            return;
        }
    }

    $fields = array(
        'brand',
        'model',
        'category',
        'condition',
        'output',
        'paper_size',
        'speed',
        'monthly_volume',
        'duplex',
        'network',
        'wifi',
        'adf',
        'finisher',
        'fax',
        'mobile_print',
        'sale_price',
        'rental_month',
        'amc_rate',
        'cpc_bw',
        'cpc_colour',
        'warranty',
        'stock_status',
        'recommended_volume',
        'brochure_pdf'
    );

    foreach ($fields as $field) {

        $value = isset($_POST['az_' . $field])
            ? sanitize_text_field($_POST['az_' . $field])
            : '';

        update_post_meta(
            $post_id,
            '_az_' . $field,
            $value
        );
    }
}

add_action(
    'save_post_machine',
    'az_save_machine_details'
);



/* =========================
   MACHINE FINDER API
========================= */

function az_machine_finder_api() {

    $machines = get_posts(array(
        'post_type'      => 'machine',
        'post_status'    => 'publish',
        'posts_per_page' => -1
    ));

    $results = array();

    foreach ($machines as $machine) {

        $id = $machine->ID;

        $results[] = array(
            'id' => $id,
            'title' => get_the_title($id),
            'url' => get_permalink($id),

            'brand' => get_post_meta($id, '_az_brand', true),
            'model' => get_post_meta($id, '_az_model', true),
            'category' => get_post_meta($id, '_az_category', true),
            'condition' => get_post_meta($id, '_az_condition', true),
            'output' => get_post_meta($id, '_az_output', true),
            'paper_size' => get_post_meta($id, '_az_paper_size', true),

            'speed' => get_post_meta($id, '_az_speed', true),
            'monthly_volume' => get_post_meta($id, '_az_monthly_volume', true),
            'recommended_volume' => get_post_meta($id, '_az_recommended_volume', true),

            'duplex' => get_post_meta($id, '_az_duplex', true),
            'network' => get_post_meta($id, '_az_network', true),
            'wifi' => get_post_meta($id, '_az_wifi', true),
            'adf' => get_post_meta($id, '_az_adf', true),
            'finisher' => get_post_meta($id, '_az_finisher', true),
            'fax' => get_post_meta($id, '_az_fax', true),
            'mobile_print' => get_post_meta($id, '_az_mobile_print', true),

            'sale_price' => get_post_meta($id, '_az_sale_price', true),
            'rental_month' => get_post_meta($id, '_az_rental_month', true),
            'amc_rate' => get_post_meta($id, '_az_amc_rate', true),
            'cpc_bw' => get_post_meta($id, '_az_cpc_bw', true),
            'cpc_colour' => get_post_meta($id, '_az_cpc_colour', true),

            'warranty' => get_post_meta($id, '_az_warranty', true),
            'stock_status' => get_post_meta($id, '_az_stock_status', true),

            'image' => get_the_post_thumbnail_url(
                $id,
                'medium_large'
            )
        );
    }

    return rest_ensure_response($results);
}


function az_register_machine_finder_api() {

    register_rest_route(
        'az/v1',
        '/machines',
        array(
            'methods'  => 'GET',
            'callback' => 'az_machine_finder_api',
            'permission_callback' => '__return_true'
        )
    );

}

add_action(
    'rest_api_init',
    'az_register_machine_finder_api'
);