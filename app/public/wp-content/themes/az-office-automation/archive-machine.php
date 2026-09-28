<?php
/**
 * AZ Office Automation
 * WooCommerce Product Catalogue
 */

get_header();

/* =========================================================
   GET FILTER VALUES
========================================================= */

$brand = isset($_GET['brand'])
    ? sanitize_text_field(wp_unslash($_GET['brand']))
    : '';

$category = isset($_GET['category'])
    ? sanitize_text_field(wp_unslash($_GET['category']))
    : '';

$output = isset($_GET['output'])
    ? sanitize_text_field(wp_unslash($_GET['output']))
    : '';

$condition = isset($_GET['condition'])
    ? sanitize_text_field(wp_unslash($_GET['condition']))
    : '';

$paper = isset($_GET['paper'])
    ? sanitize_text_field(wp_unslash($_GET['paper']))
    : '';

/* =========================================================
   ARCHIVE URL
========================================================= */

$machines_archive_url = get_post_type_archive_link('machine');

if (!$machines_archive_url) {
    $machines_archive_url = home_url('/machines/');
}

/* =========================================================
   BUILD WOOCOMMERCE TAX QUERY
========================================================= */

$tax_query = array(
    'relation' => 'AND'
);

/* ---------------------------------------------------------
   BRAND
--------------------------------------------------------- */

if (!empty($brand)) {

    $tax_query[] = array(
        'taxonomy' => 'product_brand',
        'field'    => 'name',
        'terms'    => $brand,
        'operator' => 'IN',
    );

}

/* ---------------------------------------------------------
   CATEGORY
--------------------------------------------------------- */

if (!empty($category)) {

    $tax_query[] = array(
        'taxonomy'         => 'product_cat',
        'field'            => 'name',
        'terms'            => $category,
        'operator'         => 'IN',
        'include_children' => true,
    );

}

/* ---------------------------------------------------------
   OUTPUT
--------------------------------------------------------- */

if (!empty($output)) {

    $tax_query[] = array(
        'taxonomy' => 'pa_output',
        'field'    => 'name',
        'terms'    => $output,
        'operator' => 'IN',
    );

}

/* ---------------------------------------------------------
   CONDITION
--------------------------------------------------------- */

if (!empty($condition)) {

    $tax_query[] = array(
        'taxonomy' => 'pa_condition',
        'field'    => 'name',
        'terms'    => $condition,
        'operator' => 'IN',
    );

}

/* ---------------------------------------------------------
   PAPER SIZE
--------------------------------------------------------- */

if (!empty($paper)) {

    $tax_query[] = array(
        'taxonomy' => 'pa_paper-size',
        'field'    => 'name',
        'terms'    => $paper,
        'operator' => 'IN',
    );

}

/* =========================================================
   PRODUCT COUNT
========================================================= */

$count_args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'fields'         => 'ids',
    'tax_query'      => $tax_query,
);

$count_query = new WP_Query($count_args);

$product_count = $count_query->found_posts;

wp_reset_postdata();

/* =========================================================
   PRODUCT QUERY
========================================================= */

$product_args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => 12,
    'paged' => isset($_GET['machine_page'])
    ? max(1, absint($_GET['machine_page']))
    : 1,
    'tax_query'      => $tax_query,
);

$machines_query = new WP_Query($product_args);

?>

<main class="az-catalogue">

    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="az-catalogue-hero">

        <div class="az-catalogue-hero-inner">

            <div class="az-catalogue-label">
                AZ OFFICE AUTOMATION
            </div>

            <h1>
                Find the right technology<br>
                <span>for your workplace.</span>
            </h1>

            <p>
                Explore professional office automation solutions
                from leading brands. Choose by brand, category,
                output and machine type.
            </p>

        </div>

    </section>


    <!-- =====================================================
         BRAND COLLECTION
    ====================================================== -->

    <section class="az-brand-section">

        <div class="az-section-heading">

            <span>EXPLORE BY BRAND</span>

            <h2>
                Technology from
                <strong>leading brands.</strong>
            </h2>

            <p>
                Select a brand to explore its office automation solutions.
            </p>

        </div>


        <div class="az-brand-grid">

            <?php

            $brands = array(
                'Canon',
                'Xerox',
                'Kyocera',
                'Konica Minolta',
                'Fuji Film',
                'Epson'
            );

            foreach ($brands as $index => $brand_name) :

                $brand_url = add_query_arg(
                    array(
                        'brand' => $brand_name
                    ),
                    $machines_archive_url
                );

            ?>

                <a
                    class="az-brand-card"
                    href="<?php echo esc_url($brand_url); ?>"
                >

                    <div class="az-brand-number">

                        <?php
                        echo esc_html(
                            sprintf(
                                '%02d',
                                $index + 1
                            )
                        );
                        ?>

                    </div>

                    <div class="az-brand-content">

                        <span>
                            OFFICE TECHNOLOGY
                        </span>

                        <h3>
                            <?php
                            echo esc_html($brand_name);
                            ?>
                        </h3>

                        <p>
                            Explore machines →
                        </p>

                    </div>

                </a>

            <?php endforeach; ?>

        </div>

    </section>


    <!-- =====================================================
         PRODUCT EXPLORER
    ====================================================== -->

   <section id="product-explorer" class="az-product-explorer">

        <div class="az-explorer-inner">


            <!-- =================================================
                 FILTER SIDEBAR
            ================================================== -->

            <aside class="az-filter-panel">

                <div class="az-filter-title">

                    <span>
                        PRODUCT EXPLORER
                    </span>

                    <h2>
                        Refine your search
                    </h2>

                </div>


                <!-- FILTER FORM -->
<form 
    method="get" 
    action="<?php echo esc_url($machines_archive_url . '#product-explorer'); ?>"
>

                    <!-- BRAND -->

                    <div class="az-filter-group">

                        <label for="az-brand">
                            BRAND
                        </label>

                        <select
                            id="az-brand"
                            name="brand"
                        >

                            <option value="">
                                All Brands
                            </option>

                            <?php

                            $brand_terms = get_terms(
                                array(
                                    'taxonomy'   => 'product_brand',
                                    'hide_empty' => true,
                                    'orderby'    => 'name',
                                    'order'      => 'ASC',
                                )
                            );

                            if (
                                !is_wp_error($brand_terms) &&
                                !empty($brand_terms)
                            ) :

                                foreach ($brand_terms as $brand_term) :

                            ?>

                                    <option
                                        value="<?php echo esc_attr($brand_term->name); ?>"
                                        <?php selected(
                                            $brand,
                                            $brand_term->name
                                        ); ?>
                                    >

                                        <?php
                                        echo esc_html(
                                            $brand_term->name
                                        );
                                        ?>

                                    </option>

                            <?php

                                endforeach;

                            endif;

                            ?>

                        </select>

                    </div>


                    <!-- CATEGORY -->

                  <div class="az-filter-group">

    <label for="az-category">
        CATEGORY
    </label>

    <select
        id="az-category"
        name="category"
    >

        <option value="">
            All Categories
        </option>

        <?php

        $category_terms = get_terms(
            array(
                'taxonomy'   => 'product_cat',
                'hide_empty' => true,
                'orderby'    => 'name',
                'order'      => 'ASC',
            )
        );

        if (
            !is_wp_error($category_terms) &&
            !empty($category_terms)
        ) :

            foreach ($category_terms as $category_term) :

                $category_value = $category_term->name;

        ?>

                <option
                    value="<?php echo esc_attr($category_value); ?>"
                    <?php
                    echo (
                        urldecode($category) === $category_value
                    )
                        ? 'selected'
                        : '';
                    ?>
                >
                    <?php echo esc_html($category_value); ?>
                </option>

        <?php

            endforeach;

        endif;

        ?>

    </select>

</div>


                    <!-- OUTPUT -->

                    <div class="az-filter-group">

                        <label>
                            OUTPUT
                        </label>


                        <label class="az-radio">

                            <input
                                type="radio"
                                name="output"
                                value=""
                                <?php checked(
                                    $output,
                                    ''
                                ); ?>
                            >

                            <span>
                                All
                            </span>

                        </label>


                        <label class="az-radio">

                            <input
                                type="radio"
                                name="output"
                                value="Colour"
                                <?php checked(
                                    $output,
                                    'Colour'
                                ); ?>
                            >

                            <span>
                                Colour
                            </span>

                        </label>


                        <label class="az-radio">

                            <input
                                type="radio"
                                name="output"
                                value="Black & White"
                                <?php checked(
                                    $output,
                                    'Black & White'
                                ); ?>
                            >

                            <span>
                                Black & White
                            </span>

                        </label>

                    </div>


                    <!-- CONDITION -->

                    <div class="az-filter-group">

                        <label>
                            CONDITION
                        </label>


                        <label class="az-radio">

                            <input
                                type="radio"
                                name="condition"
                                value=""
                                <?php checked(
                                    $condition,
                                    ''
                                ); ?>
                            >

                            <span>
                                All
                            </span>

                        </label>


                        <label class="az-radio">

                            <input
                                type="radio"
                                name="condition"
                                value="New"
                                <?php checked(
                                    $condition,
                                    'New'
                                ); ?>
                            >

                            <span>
                                New
                            </span>

                        </label>

<?php
$reconditioned_disabled = in_array(
    $brand,
    array('Fuji Film', 'FUJIFILM', 'Epson'),
    true
);
?>

<?php if (!$reconditioned_disabled) : ?>

    <label class="az-radio">

        <input
            type="radio"
            name="condition"
            value="Reconditioned"
            <?php checked(
                $condition,
                'Reconditioned'
            ); ?>
        >

        <span>
            Reconditioned
        </span>

    </label>

<?php endif; ?>

                    </div>


                    <!-- BUTTONS -->

                    <div class="az-filter-buttons">

                        <button
                            type="submit"
                        >
                            Apply Filters
                        </button>


                        <a
                            href="<?php echo esc_url($machines_archive_url); ?>"
                        >
                            Clear
                        </a>

                    </div>

                </form>

            </aside>


            <!-- =================================================
                 PRODUCTS AREA
            ================================================== -->

            <div class="az-products-area">


                <!-- RESULTS HEADER -->

                <div class="az-products-header">

                    <div>

                        <span>
                            OUR COLLECTION
                        </span>

                        <h2>

                            <?php

                            if ($brand) {

                                echo esc_html($brand);

                            } elseif ($category) {

                                echo esc_html($category);

                            } elseif ($condition) {

                                echo esc_html($condition);

                            } elseif ($output) {

                                echo esc_html($output);

                            } else {

                                echo 'Our Products';

                            }

                            ?>

                        </h2>

                    </div>


                    <div class="az-product-count">

                        <?php
                        echo esc_html(
                            $product_count
                        );
                        ?>

                        <span>
                            Products
                        </span>

                    </div>

                </div>


                <!-- =================================================
                     PRODUCTS
                ================================================== -->

                <?php if ($machines_query->have_posts()) : ?>


                    <div class="az-product-grid">


                        <?php

                        while (
                            $machines_query->have_posts()
                        ) :

                            $machines_query->the_post();


                            $product_id = get_the_ID();


                            $product = wc_get_product(
                                $product_id
                            );


                            if (!$product) {
                                continue;
                            }


                            /* =================================================
                               BRAND
                            ================================================== */

                            $product_brand = '';

                            $product_brand_terms =
                                get_the_terms(
                                    $product_id,
                                    'product_brand'
                                );


                            if (
                                $product_brand_terms &&
                                !is_wp_error(
                                    $product_brand_terms
                                )
                            ) {

                                $product_brand =
                                    $product_brand_terms[0]->name;

                            }


                            /* =================================================
                               ATTRIBUTES
                            ================================================== */

                            $product_condition =
                                $product->get_attribute(
                                    'condition'
                                );


                            $product_output =
                                $product->get_attribute(
                                    'output'
                                );


                            $product_paper =
                                $product->get_attribute(
                                    'paper-size'
                                );


                            $product_speed =
                                $product->get_attribute(
                                    'speed'
                                );


                            /* =================================================
                               PRICE
                            ================================================== */

                            $product_price =
                                $product->get_price();


                            /* =================================================
                               RENTAL
                            ================================================== */

                            $product_rental =
                                get_post_meta(
                                    $product_id,
                                    '_az_rental_month',
                                    true
                                );

                        ?>


                            <!-- PRODUCT CARD -->

                            <article
                                class="az-product-card"
                            >


                                <!-- IMAGE -->

                                <a
                                    href="<?php the_permalink(); ?>"
                                    class="az-product-image"
                                >

                                    <?php if (
                                        has_post_thumbnail()
                                    ) : ?>

                                        <?php

                                        the_post_thumbnail(
                                            'large',
                                            array(
                                                'alt' =>
                                                    esc_attr(
                                                        get_the_title()
                                                    )
                                            )
                                        );

                                        ?>

                                    <?php else : ?>

                                        <div
                                            class="az-no-image"
                                        >
                                            AZ
                                        </div>

                                    <?php endif; ?>


                                    <!-- CONDITION BADGE -->

                                    <div
                                        class="az-condition-badge"
                                    >

                                        <?php

                                        echo esc_html(
                                            $product_condition
                                                ?: 'Available'
                                        );

                                        ?>

                                    </div>

                                </a>


                                <!-- CONTENT -->

                                <div
                                    class="az-product-content"
                                >


                                    <!-- BRAND -->

                                    <?php if (
                                        $product_brand
                                    ) : ?>

                                        <span
                                            class="az-product-brand"
                                        >

                                            <?php
                                            echo esc_html(
                                                $product_brand
                                            );
                                            ?>

                                        </span>

                                    <?php endif; ?>


                                    <!-- TITLE -->

                                    <h3>

                                        <a
                                            href="<?php the_permalink(); ?>"
                                        >

                                            <?php
                                            the_title();
                                            ?>

                                        </a>

                                    </h3>


                                    <!-- SPECIFICATIONS -->

                                    <div
                                        class="az-product-specs"
                                    >


                                        <?php if (
                                            $product_speed
                                        ) : ?>

                                            <div>

                                                <strong>

                                                    <?php
                                                    echo esc_html(
                                                        $product_speed
                                                    );
                                                    ?>

                                                </strong>

                                                <span>
                                                    PPM
                                                </span>

                                            </div>

                                        <?php endif; ?>


                                        <?php if (
                                            $product_paper
                                        ) : ?>

                                            <div>

                                                <strong>

                                                    <?php
                                                    echo esc_html(
                                                        $product_paper
                                                    );
                                                    ?>

                                                </strong>

                                                <span>
                                                    PAPER
                                                </span>

                                            </div>

                                        <?php endif; ?>


                                        <?php if (
                                            $product_output
                                        ) : ?>

                                            <div>

                                                <strong>

                                                    <?php
                                                    echo esc_html(
                                                        $product_output
                                                    );
                                                    ?>

                                                </strong>

                                                <span>
                                                    OUTPUT
                                                </span>

                                            </div>

                                        <?php endif; ?>

                                    </div>


                                    <!-- PRICE -->

                                    <div
                                        class="az-product-pricing"
                                    >

                                        <span>
                                            Pricing
                                        </span>


                                        <?php if (
                                            $product_price !== ''
                                        ) : ?>

                                            <strong>

                                                <?php

                                                echo wp_kses_post(
                                                    wc_price(
                                                        $product_price
                                                    )
                                                );

                                                ?>

                                            </strong>

                                        <?php else : ?>

                                            <strong>
                                                Request a Quote
                                            </strong>

                                        <?php endif; ?>

                                    </div>


                                    <!-- RENTAL -->

                                    <?php if (
                                        $product_rental
                                    ) : ?>

                                        <div
                                            class="az-product-rental"
                                        >

                                            Rental from
                                            <strong>
                                                ₹<?php
                                                echo esc_html(
                                                    $product_rental
                                                );
                                                ?>
                                            /month
                                            </strong>

                                        </div>

                                    <?php endif; ?>


                                    <!-- ACTIONS -->

                                    <div
                                        class="az-product-actions"
                                    >


                                        <!-- GET QUOTE -->
<?php
$quote_url = add_query_arg(
    array(
        'product_id'   => $product_id,
        'machine_name' => get_the_title(),
    ),
    home_url('/contact/')
);
?>

<a
    class="az-quote-button"
    href="<?php echo esc_url($quote_url); ?>"
>
    Get Quote
</a>


                                        <!-- VIEW DETAILS -->

                                        <a
                                            class="az-details-button"
                                            href="<?php echo esc_url(
                                                get_permalink(
                                                    $product_id
                                                )
                                            ); ?>"
                                        >
                                            View Details
                                        </a>

                                    </div>

                                </div>

                            </article>


                        <?php endwhile; ?>


                    </div>


                    <!-- =================================================
                         PAGINATION
                    ================================================== -->

                    <?php

$machine_current_page = isset($_GET['machine_page'])
    ? max(1, absint($_GET['machine_page']))
    : 1;

/* Keep active filters when moving between catalogue pages. */
$pagination_args = array();

foreach (array('brand', 'category', 'output', 'condition', 'paper') as $filter_key) {
    if (isset($_GET[$filter_key]) && $_GET[$filter_key] !== '') {
        $pagination_args[$filter_key] = sanitize_text_field(
            wp_unslash($_GET[$filter_key])
        );
    }
}

$pagination_base = add_query_arg(
    $pagination_args,
    $machines_archive_url
);

/* paginate_links() needs the %#% placeholder to remain unescaped. */
$pagination_base .= (strpos($pagination_base, '?') === false ? '?' : '&')
    . 'machine_page=%#%';

$pagination = paginate_links(
    array(
        'base'      => esc_url_raw($pagination_base),
        'format'    => '',
        'current'   => $machine_current_page,
        'total'     => $machines_query->max_num_pages,
        'type'      => 'list',
        'prev_text' => '← Previous',
        'next_text' => 'Next →',
    )
);

if ($pagination) :

?>

    <div class="az-pagination">

        <?php
        echo wp_kses_post(
            $pagination
        );
        ?>

    </div>

<?php endif; ?>


                <?php else : ?>


                    <!-- =================================================
                         EMPTY STATE
                    ================================================== -->

                    <div
                        class="az-empty-catalogue"
                    >

                        <div
                            class="az-empty-icon"
                        >
                            AZ
                        </div>


                        <span>
                            PRODUCT COLLECTION
                        </span>


                        <h2>
    No matching machines found.
</h2>

                       <p>
    We couldn't find a machine matching all your selected requirements.
    Try changing your filters or speak with our team for assistance.
</p>


                        <div
                            class="az-empty-buttons"
                        >

                            <a
                                href="tel:+918553202432"
                            >
                                Call Our Expert
                            </a>


                            <a
                                href="https://wa.me/918553202432"
                                target="_blank"
                                rel="noopener"
                            >
                                WhatsApp Us
                            </a>

                        </div>

                    </div>


                <?php endif; ?>


                <?php wp_reset_postdata(); ?>


            </div>

        </div>

    </section>

</main>


<?php get_footer(); ?>

<!-- =========================================================
     AZ OFFICE AUTOMATION
     PRODUCT IMAGE LIGHTBOX
========================================================= -->

<div
    id="az-product-lightbox"
    class="az-product-lightbox"
    aria-hidden="true"
>

    <button
        type="button"
        id="az-product-lightbox-close"
        class="az-product-lightbox-close"
        aria-label="Close image"
    >
        &times;
    </button>


    <div
        id="az-product-lightbox-stage"
        class="az-product-lightbox-stage"
    >

        <img
            id="az-product-lightbox-image"
            class="az-product-lightbox-image"
            src=""
            alt=""
        >

    </div>


    <div class="az-product-lightbox-help">
        Click image to zoom
    </div>

</div>


<script>
(function () {

    function initAZProductLightbox() {

        /*
         * IMPORTANT:
         * Your actual product image class is:
         *
         * .az-product-image img
         *
         * NOT .machine-card-image img
         */

        const productImages =
            document.querySelectorAll(
                '.az-product-image img'
            );


        const lightbox =
            document.getElementById(
                'az-product-lightbox'
            );


        const lightboxImage =
            document.getElementById(
                'az-product-lightbox-image'
            );


        const stage =
            document.getElementById(
                'az-product-lightbox-stage'
            );


        const closeButton =
            document.getElementById(
                'az-product-lightbox-close'
            );


        /*
         * Safety check
         */

        if (
            !productImages.length ||
            !lightbox ||
            !lightboxImage ||
            !stage ||
            !closeButton
        ) {

            console.log(
                'AZ Lightbox: required elements not found.'
            );

            return;

        }


        console.log(
            'AZ Lightbox initialized:',
            productImages.length,
            'product images found.'
        );


        /* =====================================================
           OPEN LIGHTBOX
        ===================================================== */

        productImages.forEach(
            function (image) {

                /*
                 * Make image look clickable.
                 */

                image.style.cursor =
                    'zoom-in';


                image.addEventListener(
                    'click',
                    function (event) {

                        /*
                         * VERY IMPORTANT:
                         * Stop the WooCommerce/product link.
                         */

                        event.preventDefault();

                        event.stopPropagation();


                        /*
                         * Find best available image URL.
                         */

                        let imageURL =
                            image.getAttribute(
                                'data-large_image'
                            );


                        if (!imageURL) {

                            imageURL =
                                image.getAttribute(
                                    'data-src'
                                );

                        }


                        if (!imageURL) {

                            imageURL =
                                image.currentSrc;

                        }


                        if (!imageURL) {

                            imageURL =
                                image.src;

                        }


                        /*
                         * Put image into popup.
                         */

                        lightboxImage.src =
                            imageURL;


                        lightboxImage.alt =
                            image.alt ||
                            'AZ Office Automation Machine';


                        /*
                         * Reset zoom.
                         */

                        lightbox.classList.remove(
                            'az-product-lightbox-zoomed'
                        );


                        /*
                         * Open popup.
                         */

                        lightbox.classList.add(
                            'az-product-lightbox-active'
                        );


                        lightbox.setAttribute(
                            'aria-hidden',
                            'false'
                        );


                        /*
                         * Prevent background scrolling.
                         */

                        document.body.classList.add(
                            'az-product-lightbox-open'
                        );

                    }
                );

            }
        );


        /* =====================================================
           CLICK IMAGE = ZOOM / ZOOM OUT
        ===================================================== */

        lightboxImage.addEventListener(
            'click',
            function (event) {

                event.preventDefault();

                event.stopPropagation();


                lightbox.classList.toggle(
                    'az-product-lightbox-zoomed'
                );

            }
        );


        /* =====================================================
           CLOSE BUTTON
        ===================================================== */

        closeButton.addEventListener(
            'click',
            function (event) {

                event.preventDefault();

                event.stopPropagation();

                closeLightbox();

            }
        );


        /* =====================================================
           CLICK OUTSIDE IMAGE
        ===================================================== */

        lightbox.addEventListener(
            'click',
            function (event) {

                if (
                    event.target === lightbox ||
                    event.target === stage
                ) {

                    closeLightbox();

                }

            }
        );


        /* =====================================================
           ESC KEY
        ===================================================== */

        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key === 'Escape' &&
                    lightbox.classList.contains(
                        'az-product-lightbox-active'
                    )
                ) {

                    closeLightbox();

                }

            }
        );


        /* =====================================================
           CLOSE FUNCTION
        ===================================================== */

        function closeLightbox() {

            lightbox.classList.remove(
                'az-product-lightbox-active',
                'az-product-lightbox-zoomed'
            );


            lightbox.setAttribute(
                'aria-hidden',
                'true'
            );


            document.body.classList.remove(
                'az-product-lightbox-open'
            );


            setTimeout(
                function () {

                    if (
                        !lightbox.classList.contains(
                            'az-product-lightbox-active'
                        )
                    ) {

                        lightboxImage.src = '';

                    }

                },
                300
            );

        }

    }


    /*
     * Run after page loads.
     */

    if (
        document.readyState === 'loading'
    ) {

        document.addEventListener(
            'DOMContentLoaded',
            initAZProductLightbox
        );

    } else {

        initAZProductLightbox();

    }

})();
</script>