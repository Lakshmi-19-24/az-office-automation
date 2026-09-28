<?php

get_header();

/*
|--------------------------------------------------------------------------
| PRODUCT / MACHINE FROM GET QUOTE
|--------------------------------------------------------------------------
*/

$selected_product_id = isset($_GET['product_id'])
    ? absint($_GET['product_id'])
    : 0;


/*
|--------------------------------------------------------------------------
| GET PRODUCT NAME
|--------------------------------------------------------------------------
*/
$selected_product_name = '';

/*
|--------------------------------------------------------------------------
| FIRST: GET MACHINE NAME DIRECTLY FROM URL
|--------------------------------------------------------------------------
*/

if (isset($_GET['machine_name'])) {

    $selected_product_name =
        sanitize_text_field(
            wp_unslash($_GET['machine_name'])
        );

}


/*
|--------------------------------------------------------------------------
| SECOND: FALLBACK TO PRODUCT ID
|--------------------------------------------------------------------------
*/

if (
    empty($selected_product_name) &&
    $selected_product_id
) {

    $selected_product = wc_get_product(
        $selected_product_id
    );

    if ($selected_product) {

        $selected_product_name =
            $selected_product->get_name();

    }

}

/*
|--------------------------------------------------------------------------
| SUCCESS / ERROR STATUS
|--------------------------------------------------------------------------
*/

$quote_status = isset($_GET['quote'])
    ? sanitize_text_field(
        wp_unslash($_GET['quote'])
    )
    : '';

?>

<main class="az-contact-page">


    <!-- =========================================================
         SUCCESS POPUP
    ========================================================== -->

    <?php if ($quote_status === 'success') : ?>

        <div
            class="az-success-overlay"
            id="azSuccessPopup"
        >

            <div class="az-success-popup">

                <button
                    type="button"
                    class="az-success-close"
                    onclick="closeAzSuccessPopup()"
                    aria-label="Close"
                >
                    ×
                </button>


                <div class="az-success-icon">
                    ✓
                </div>


                <h2>
                    Enquiry Submitted Successfully!
                </h2>


                <p>
                    Thank you for contacting AZ Office Automation.
                </p>

                <p>
                    Our team will get back to you shortly.
                </p>


                <button
                    type="button"
                    class="az-success-ok"
                    onclick="closeAzSuccessPopup()"
                >
                    OK
                </button>

            </div>

        </div>

    <?php elseif ($quote_status === 'error') : ?>

        <div
            class="az-enquiry-error"
            role="alert"
        >

            <strong>
                Please enter your name and mobile number.
            </strong>

        </div>

    <?php endif; ?>


    <!-- =========================================================
         CONTACT HERO
    ========================================================== -->

    <section class="az-contact-hero">

        <div class="az-contact-container">

            <span class="az-catalogue-label">
                AZ OFFICE AUTOMATION
            </span>


            <h1>
                Get a Quote
            </h1>


            <p>
                Tell us what you need and our team will help you find
                the right office automation solution.
            </p>

        </div>

    </section>


    <!-- =========================================================
         CONTACT SECTION
    ========================================================== -->

    <section class="az-contact-section">

        <div class="az-contact-container">

            <div class="az-contact-grid">


                <!-- =================================================
                     CONTACT INFORMATION
                ================================================== -->

                <div class="az-contact-info">

                    <span class="az-section-label">
                        CONTACT OUR TEAM
                    </span>


                    <h2>
                        Let's find the right solution for your business.
                    </h2>


                    <p>
                        Whether you are looking to buy, rent, or service
                        a photocopier or office automation product,
                        our team can assist you.
                    </p>


                    <div class="az-contact-details">


                        <!-- CALL -->

                        <div>

                            <strong>
                                Call Us
                            </strong>

                            <a
                                href="tel:+918553202432"
                            >
                                +91 85532 02432
                            </a>

                        </div>


                        <!-- WHATSAPP -->

                        <div>

                            <strong>
                                WhatsApp
                            </strong>

                            <a
                                href="https://wa.me/918553202432"
                                target="_blank"
                                rel="noopener"
                            >
                                Chat on WhatsApp
                            </a>

                        </div>


                        <!-- LOCATION -->

                        <div>

                            <strong>
                                Location
                            </strong>

                            <p>
                                #7, 13th Cross, HMT Layout,
                                Nagasandra Post, Bangalore 560073
                            </p>

                        </div>


                    </div>

                </div>


                <!-- =================================================
                     ENQUIRY FORM
                ================================================== -->

                <div
                    class="az-contact-form-wrapper"
                    id="machine-enquiry"
                >

                    <form
                        class="az-contact-form"
                        method="post"
                        action="<?php echo esc_url(
                            admin_url('admin-post.php')
                        ); ?>"
                    >


                        <!-- =================================================
                             ACTION
                        ================================================== -->

                        <input
                            type="hidden"
                            name="action"
                            value="az_machine_quote"
                        >


                        <!-- =================================================
                             PRODUCT ID
                        ================================================== -->

                        <input
                            type="hidden"
                            name="product_id"
                            value="<?php echo esc_attr(
                                $selected_product_id
                            ); ?>"
                        >


                        <!-- =================================================
                             MACHINE NAME
                        ================================================== -->

                        <input
                            type="hidden"
                            name="machine_name"
                            value="<?php echo esc_attr(
                                $selected_product_name
                            ); ?>"
                        >


                        <!-- =================================================
                             NAME
                        ================================================== -->

                        <div class="az-form-group">

                            <label for="customer_name">
                                Your Name *
                            </label>


                            <input
                                type="text"
                                id="customer_name"
                                name="name"
                                required
                                placeholder="Enter your name"
                            >

                        </div>


                        <!-- =================================================
                             MOBILE
                        ================================================== -->

                        <div class="az-form-group">

                            <label for="customer_phone">
                                Mobile Number *
                            </label>


                            <input
                                type="tel"
                                id="customer_phone"
                                name="phone"
                                required
                                placeholder="Enter your mobile number"
                            >

                        </div>


                        <!-- =================================================
                             EMAIL
                        ================================================== -->

                        <div class="az-form-group">

                            <label for="customer_email">
                                Email Address
                            </label>


                            <input
                                type="email"
                                id="customer_email"
                                name="email"
                                placeholder="Enter your email"
                            >

                        </div>


                        <!-- =================================================
                             COMPANY
                        ================================================== -->

                        <div class="az-form-group">

                            <label for="company">
                                Company / Organisation
                            </label>


                            <input
                                type="text"
                                id="company"
                                name="company"
                                placeholder="Enter company name"
                            >

                        </div>


                        <!-- =================================================
                             MACHINE / PRODUCT
                        ================================================== -->

                        <div class="az-form-group">

                            <label for="machine_name_display">
                                Machine / Product
                            </label>


                            <input
                                type="text"
                                id="machine_name_display"
                                name="machine_name_display"
                                value="<?php echo esc_attr(
                                    $selected_product_name
                                ); ?>"
                                placeholder="Which machine are you interested in?"
                                readonly
                            >

                        </div>


                        <!-- =================================================
                             REQUIREMENT
                        ================================================== -->

                        <div class="az-form-group">

                            <label for="requirement">
                                Your Requirement *
                            </label>


                            <textarea
                                id="requirement"
                                name="requirement"
                                rows="5"
                                required
                                placeholder="Tell us about your requirement..."
                            ></textarea>

                        </div>


                        <!-- =================================================
                             SUBMIT
                        ================================================== -->

                        <button
                            type="submit"
                            class="az-contact-submit"
                        >
                            Submit Enquiry
                        </button>


                        <!-- =================================================
                             WHATSAPP
                        ================================================== -->

                        <a
                            class="az-whatsapp-button"
                            href="https://wa.me/918553202432"
                            target="_blank"
                            rel="noopener"
                        >
                            Enquire on WhatsApp
                        </a>


                    </form>

                </div>

            </div>

        </div>

    </section>


</main>


<!-- =========================================================
     SUCCESS POPUP JAVASCRIPT
========================================================== -->

<script>

function closeAzSuccessPopup() {

    const popup =
        document.getElementById('azSuccessPopup');

    if (popup) {

        popup.remove();

    }

    /*
    |--------------------------------------------------------------------------
    | Remove ?quote=success from browser URL
    |--------------------------------------------------------------------------
    */

    const cleanUrl =
        window.location.pathname +
        window.location.search
            .replace(/([?&])quote=success(&|$)/, '$1')
            .replace(/[?&]$/, '');

    window.history.replaceState(
        {},
        document.title,
        cleanUrl
    );

}

</script>


<?php

get_footer();

?>