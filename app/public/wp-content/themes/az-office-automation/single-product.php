<?php

get_header();

global $product;


/*
|--------------------------------------------------------------------------
| GET WOOCOMMERCE PRODUCT
|--------------------------------------------------------------------------
*/

if (!is_a($product, 'WC_Product')) {

    $product = wc_get_product(
        get_the_ID()
    );

}


/*
|--------------------------------------------------------------------------
| PRODUCT NOT FOUND
|--------------------------------------------------------------------------
*/

if (!$product) {

    echo '<main>
            <div class="az-contact-container">
                <h1>Product not found</h1>
            </div>
          </main>';

    get_footer();

    exit;
}


/*
|--------------------------------------------------------------------------
| PRODUCT ID
|--------------------------------------------------------------------------
*/

$product_id = $product->get_id();


/*
|--------------------------------------------------------------------------
| PRODUCT NAME
|--------------------------------------------------------------------------
*/

$product_name = $product->get_name();


/*
|--------------------------------------------------------------------------
| GET QUOTE URL
|--------------------------------------------------------------------------
*/

$quote_url = add_query_arg(
    array(
        'product_id'   => $product_id,
        'machine_name' => $product_name,
    ),
    home_url('/contact/')
);


/*
|--------------------------------------------------------------------------
| BRAND
|--------------------------------------------------------------------------
*/

$brand = '';

$brand_terms = get_the_terms(
    $product_id,
    'product_brand'
);

if (
    $brand_terms &&
    !is_wp_error($brand_terms)
) {

    $brand =
        $brand_terms[0]->name;

}


/*
|--------------------------------------------------------------------------
| ATTRIBUTES
|--------------------------------------------------------------------------
*/

$condition =
    $product->get_attribute('condition');

$output =
    $product->get_attribute('output');

$paper =
    $product->get_attribute('paper-size');

$speed =
    $product->get_attribute('speed');


/*
|--------------------------------------------------------------------------
| PRICE
|--------------------------------------------------------------------------
*/

$price =
    $product->get_price();


/*
|--------------------------------------------------------------------------
| RENTAL
|--------------------------------------------------------------------------
*/

$rental =
    get_post_meta(
        $product_id,
        '_az_rental_month',
        true
    );


/*
|--------------------------------------------------------------------------
| PHONE
|--------------------------------------------------------------------------
*/

$phone = '918553202432';

?>

<main class="az-single-product">


    <!-- =========================================================
         HERO
    ========================================================== -->

    <section class="az-single-product-hero">

        <div class="az-single-product-container">

            <div class="az-single-product-grid">


                <!-- =================================================
                     IMAGE
                ================================================== -->
<div class="az-single-product-image">

    <?php
    $product_image_id = $product->get_image_id();
    ?>

    <?php if ($product_image_id) : ?>

        <?php
        echo wp_get_attachment_image(
            $product_image_id,
            'large',
            false,
            array(
                'class' => 'az-main-product-image',
                'alt'   => esc_attr($product_name),
            )
        );
        ?>

    <?php else : ?>

        <div class="az-single-no-image">
            AZ
        </div>

    <?php endif; ?>

</div>

                <!-- =================================================
                     PRODUCT INFO
                ================================================== -->

                <div class="az-single-product-info">


                    <?php if ($brand) : ?>

                        <span class="az-single-brand">

                            <?php
                            echo esc_html(
                                $brand
                            );
                            ?>

                        </span>

                    <?php endif; ?>


                    <?php if ($condition) : ?>

                        <span class="az-single-condition">

                            <?php
                            echo esc_html(
                                $condition
                            );
                            ?>

                        </span>

                    <?php endif; ?>


                    <h1>

                        <?php
                        the_title();
                        ?>

                    </h1>


                    <?php if (
                        $product->get_short_description()
                    ) : ?>

                        <div class="az-single-short-description">

                            <?php

                            echo wp_kses_post(
                                $product->get_short_description()
                            );

                            ?>

                        </div>

                    <?php endif; ?>


                    <!-- =================================================
                         PRICE
                    ================================================== -->

                    <div class="az-single-price">

                        <?php if ($price !== '') : ?>

                            <span>
                                Price
                            </span>

                            <strong>

                                <?php

                                echo wp_kses_post(
                                    wc_price(
                                        $price
                                    )
                                );

                                ?>

                            </strong>


                        <?php elseif ($rental) : ?>

                            <span>
                                Rental from
                            </span>

                            <strong>
                                ₹<?php
                                echo esc_html(
                                    $rental
                                );
                                ?>
                            </strong>

                            <small>
                                / month
                            </small>


                        <?php else : ?>

                            <span>
                                Pricing
                            </span>

                            <strong>
                                Price on Request
                            </strong>

                        <?php endif; ?>

                    </div>


                    <!-- =================================================
                         ACTION BUTTONS
                    ================================================== -->

                    <div class="az-single-actions">


                        <!-- GET A QUOTE -->

                        <a
                            class="az-single-quote"
                            href="<?php echo esc_url(
                                $quote_url
                            ); ?>"
                        >
                            Get a Quote
                        </a>


                        <!-- RENT THIS MACHINE -->

                        <a
                            class="az-single-rent"
                            href="<?php echo esc_url(
                                $quote_url
                            ); ?>"
                        >
                            Rent This Machine
                        </a>

                    
                        <!-- BOOK A DEMO -->

<a
    class="az-single-demo"
    href="<?php echo esc_url(
        $quote_url
    ); ?>"
>
    Book a Demo
</a>
                        <!-- WHATSAPP -->

                        <a
                            class="az-single-whatsapp"
                            href="<?php echo esc_url(
                                'https://wa.me/' .
                                $phone .
                                '?text=' .
                                rawurlencode(
                                    'Hello AZ Office Automation, I am interested in ' .
                                    $product_name
                                )
                            ); ?>"
                            target="_blank"
                            rel="noopener"
                        >
                            WhatsApp Enquiry
                        </a>


                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================================
         SPECIFICATIONS
    ========================================================== -->

    <section class="az-single-specifications">

        <div class="az-single-product-container">


            <div class="az-single-section-heading">

                <span>
                    PRODUCT SPECIFICATIONS
                </span>

                <h2>
                    Key specifications
                </h2>

            </div>


            <div class="az-specification-grid">


                <?php if ($brand) : ?>

                    <div class="az-specification-item">

                        <span>
                            Brand
                        </span>

                        <strong>
                            <?php
                            echo esc_html(
                                $brand
                            );
                            ?>
                        </strong>

                    </div>

                <?php endif; ?>


                <?php if ($condition) : ?>

                    <div class="az-specification-item">

                        <span>
                            Condition
                        </span>

                        <strong>
                            <?php
                            echo esc_html(
                                $condition
                            );
                            ?>
                        </strong>

                    </div>

                <?php endif; ?>


                <?php if ($output) : ?>

                    <div class="az-specification-item">

                        <span>
                            Output
                        </span>

                        <strong>
                            <?php
                            echo esc_html(
                                $output
                            );
                            ?>
                        </strong>

                    </div>

                <?php endif; ?>


                <?php if ($paper) : ?>

                    <div class="az-specification-item">

                        <span>
                            Paper Size
                        </span>

                        <strong>
                            <?php
                            echo esc_html(
                                $paper
                            );
                            ?>
                        </strong>

                    </div>

                <?php endif; ?>


             <?php if ($speed) : ?>

    <div class="az-specification-item">

        <span>
            Speed
        </span>

        <strong>
            <?php
            echo esc_html(
                $speed
            );
            ?>
        </strong>

    </div>

<?php endif; ?>


                <div class="az-specification-item">

                    <span>
                        Availability
                    </span>

                    <strong>

                        <?php

                        echo esc_html(
                            $product->is_in_stock()
                                ? 'In Stock'
                                : 'Available on Request'
                        );

                        ?>

                    </strong>

                </div>


            </div>

        </div>

    </section>


    <!-- =========================================================
         DESCRIPTION
    ========================================================== -->

    <section class="az-single-description">

        <div class="az-single-product-container">

            <div class="az-single-description-content">


                <span>
                    ABOUT THIS PRODUCT
                </span>


                <h2>
                    Product Details
                </h2>


                <div class="az-product-description">

                    <?php

                    echo wp_kses_post(
                        $product->get_description()
                    );

                    ?>

                </div>


            </div>

        </div>

    </section>


    <!-- =========================================================
         FINAL CTA
    ========================================================== -->

    <section class="az-single-cta">

        <div class="az-single-product-container">


            <div>

                <span>
                    NEED HELP CHOOSING?
                </span>


                <h2>
                    Talk to our office automation experts.
                </h2>


                <p>
                    Get pricing, rental options, service information
                    and recommendations for your business.
                </p>

            </div>


            <div class="az-single-cta-buttons">


                <!-- FINAL GET A QUOTE -->

                <a
                    href="<?php echo esc_url(
                        $quote_url
                    ); ?>"
                >
                    Get a Quote
                </a>


                <!-- CALL -->

                <a
                    href="tel:+918553202432"
                >
                    Call +91 85532 02432
                </a>


            </div>

        </div>

    </section>


</main>


<?php

get_footer();

?>