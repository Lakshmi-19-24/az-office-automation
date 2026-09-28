<?php
get_header();

while (have_posts()) :
    the_post();

    $machine_id = get_the_ID();

    $brand              = get_post_meta($machine_id, '_az_brand', true);
    $model              = get_post_meta($machine_id, '_az_model', true);
    $category           = get_post_meta($machine_id, '_az_category', true);
    $condition          = get_post_meta($machine_id, '_az_condition', true);
    $output             = get_post_meta($machine_id, '_az_output', true);
    $paper_size         = get_post_meta($machine_id, '_az_paper_size', true);
    $speed              = get_post_meta($machine_id, '_az_speed', true);
    $monthly_volume     = get_post_meta($machine_id, '_az_monthly_volume', true);
    $recommended_volume = get_post_meta($machine_id, '_az_recommended_volume', true);
    $sale_price         = get_post_meta($machine_id, '_az_sale_price', true);
    $rental_month       = get_post_meta($machine_id, '_az_rental_month', true);
    $amc_rate           = get_post_meta($machine_id, '_az_amc_rate', true);
    $cpc_bw             = get_post_meta($machine_id, '_az_cpc_bw', true);
    $cpc_colour         = get_post_meta($machine_id, '_az_cpc_colour', true);
    $warranty           = get_post_meta($machine_id, '_az_warranty', true);
    $stock_status       = get_post_meta($machine_id, '_az_stock_status', true);
    $duplex             = get_post_meta($machine_id, '_az_duplex', true);
    $network            = get_post_meta($machine_id, '_az_network', true);
    $wifi               = get_post_meta($machine_id, '_az_wifi', true);
    $adf                = get_post_meta($machine_id, '_az_adf', true);
    $finisher           = get_post_meta($machine_id, '_az_finisher', true);
    $fax                = get_post_meta($machine_id, '_az_fax', true);
    $mobile_print       = get_post_meta($machine_id, '_az_mobile_print', true);
    $brochure_pdf       = get_post_meta($machine_id, '_az_brochure_pdf', true);
?>

<main class="machine-single-page">

    <section class="machine-hero">

        <div class="machine-image">

            <?php if (has_post_thumbnail()) : ?>

                <?php the_post_thumbnail(
                    'large',
                    array(
                        'alt' => esc_attr(get_the_title())
                    )
                ); ?>

            <?php else : ?>

                <div class="machine-image-placeholder">
                    Machine Image
                </div>

            <?php endif; ?>

        </div>


        <div class="machine-main-info">

            <span class="machine-category">
                <?php echo esc_html($category); ?>
            </span>

            <h1>
                <?php the_title(); ?>
            </h1>

            <?php if ($brand) : ?>
                <p class="machine-brand">
                    <?php echo esc_html($brand); ?>
                </p>
            <?php endif; ?>

            <div class="machine-badges">

                <?php if ($condition) : ?>
                    <span><?php echo esc_html($condition); ?></span>
                <?php endif; ?>

                <?php if ($output) : ?>
                    <span><?php echo esc_html($output); ?></span>
                <?php endif; ?>

                <?php if ($paper_size) : ?>
                    <span><?php echo esc_html($paper_size); ?></span>
                <?php endif; ?>

            </div>


            <?php if ($sale_price) : ?>

                <div class="machine-price">
                    <small>Sale Price</small>
                    <strong>
                        <?php echo esc_html($sale_price); ?>
                    </strong>
                </div>

            <?php endif; ?>


            <div class="machine-actions">

                <a href="#machine-enquiry" class="machine-btn primary">
                    Get Quote
                </a>

                <a href="#machine-enquiry" class="machine-btn">
                    Rent This
                </a>

                <a href="#machine-enquiry" class="machine-btn">
                    Book Demo
                </a>

                <a
                    href="https://wa.me/918553202432"
                    target="_blank"
                    rel="noopener"
                    class="machine-btn whatsapp"
                >
                    WhatsApp Enquiry
                </a>

            </div>

        </div>

    </section>


    <section class="machine-overview">

        <div class="machine-section-heading">
            <span>PRODUCT INFORMATION</span>
            <h2>Machine Overview</h2>
        </div>

        <?php if (get_the_content()) : ?>

            <div class="machine-description">
                <?php the_content(); ?>
            </div>

        <?php endif; ?>


        <div class="machine-spec-grid">

            <?php if ($speed) : ?>
                <div class="machine-spec">
                    <span>Speed</span>
                    <strong><?php echo esc_html($speed); ?> PPM</strong>
                </div>
            <?php endif; ?>

            <?php if ($paper_size) : ?>
                <div class="machine-spec">
                    <span>Paper Size</span>
                    <strong><?php echo esc_html($paper_size); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($output) : ?>
                <div class="machine-spec">
                    <span>Output</span>
                    <strong><?php echo esc_html($output); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($monthly_volume) : ?>
                <div class="machine-spec">
                    <span>Monthly Volume</span>
                    <strong><?php echo esc_html($monthly_volume); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($recommended_volume) : ?>
                <div class="machine-spec">
                    <span>Recommended Volume</span>
                    <strong><?php echo esc_html($recommended_volume); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($warranty) : ?>
                <div class="machine-spec">
                    <span>Warranty</span>
                    <strong><?php echo esc_html($warranty); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($stock_status) : ?>
                <div class="machine-spec">
                    <span>Availability</span>
                    <strong><?php echo esc_html($stock_status); ?></strong>
                </div>
            <?php endif; ?>

        </div>

    </section>


    <section class="machine-features">

        <div class="machine-section-heading">
            <span>CAPABILITIES</span>
            <h2>Features & Connectivity</h2>
        </div>

        <div class="machine-feature-grid">

            <?php
            $features = array(
                'duplex'       => 'Duplex Printing',
                'network'      => 'Network',
                'wifi'         => 'WiFi',
                'adf'          => 'ADF',
                'finisher'     => 'Finisher',
                'fax'          => 'Fax',
                'mobile_print' => 'Mobile Printing'
            );

            foreach ($features as $key => $label) :

                $value = get_post_meta(
                    $machine_id,
                    '_az_' . $key,
                    true
                );

                if ($value === 'Yes') :
            ?>

                <div class="machine-feature">
                    <span>✓</span>
                    <?php echo esc_html($label); ?>
                </div>

            <?php
                endif;

            endforeach;
            ?>

        </div>

    </section>


    <section class="machine-commercial">

        <div class="machine-section-heading">
            <span>COMMERCIAL OPTIONS</span>
            <h2>Purchase, Rental & Service</h2>
        </div>

        <div class="commercial-grid">

            <?php if ($sale_price) : ?>
                <div>
                    <span>Sale Price</span>
                    <strong><?php echo esc_html($sale_price); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($rental_month) : ?>
                <div>
                    <span>Rental / Month</span>
                    <strong><?php echo esc_html($rental_month); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($amc_rate) : ?>
                <div>
                    <span>AMC Rate</span>
                    <strong><?php echo esc_html($amc_rate); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($cpc_bw) : ?>
                <div>
                    <span>CPC - B&W</span>
                    <strong><?php echo esc_html($cpc_bw); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($cpc_colour) : ?>
                <div>
                    <span>CPC - Colour</span>
                    <strong><?php echo esc_html($cpc_colour); ?></strong>
                </div>
            <?php endif; ?>

        </div>

    </section>


    <?php if ($brochure_pdf) : ?>

        <section class="machine-brochure">

            <a
                href="<?php echo esc_url($brochure_pdf); ?>"
                target="_blank"
                rel="noopener"
                class="machine-btn"
            >
                Download Brochure
            </a>

        </section>

    <?php endif; ?>

<section id="machine-enquiry" class="machine-enquiry">
    <?php if (isset($_GET['quote']) && $_GET['quote'] === 'success') : ?>

    <div class="quote-success-message" role="status">
        <strong>Thank you! Your enquiry has been received.</strong>
        <p>Our AZ Office Automation team will contact you shortly.</p>
    </div>

<?php endif; ?>


    <div class="quote-form-wrapper">

        <div class="quote-form-intro">

            <span>REQUEST A QUOTE</span>

            <h2>
                Let's find the right
                <strong>solution for you.</strong>
            </h2>

            <p>
                Interested in this machine? Share your requirements and
                our team will get back to you with the right pricing,
                rental or service option.
            </p>

            <div class="quote-machine">

                <small>YOUR SELECTED MACHINE</small>

                <strong>
                    <?php the_title(); ?>
                </strong>

                <?php if ($brand) : ?>

                    <span>
                        <?php echo esc_html($brand); ?>
                    </span>

                <?php endif; ?>

            </div>

        </div>


        <div class="quote-form-card">
<form class="az-quote-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">

    <input type="hidden" name="action" value="az_machine_quote">

    <input
        type="hidden"
        name="machine_name"
        value="<?php echo esc_attr(get_the_title()); ?>"
    >

                <div class="quote-form-row">

                    <div class="quote-field">

                        <label for="quote-name">
                            Name *
                        </label>

                        <input
                            id="quote-name"
                            type="text"
                            name="name"
                            placeholder="Your full name"
                            required
                        >

                    </div>


                    <div class="quote-field">

                        <label for="quote-phone">
                            Mobile Number *
                        </label>

                        <input
                            id="quote-phone"
                            type="tel"
                            name="phone"
                            placeholder="Your mobile number"
                            required
                        >

                    </div>

                </div>


                <div class="quote-form-row">

                    <div class="quote-field">

                        <label for="quote-email">
                            Email Address
                        </label>

                        <input
                            id="quote-email"
                            type="email"
                            name="email"
                            placeholder="you@company.com"
                        >

                    </div>


                    <div class="quote-field">

                        <label for="quote-company">
                            Company Name
                        </label>

                        <input
                            id="quote-company"
                            type="text"
                            name="company"
                            placeholder="Your company name"
                        >

                    </div>

                </div>


                <div class="quote-field">

                    <label for="quote-requirement">
                        Requirement *
                    </label>

                    <select
                        id="quote-requirement"
                        name="requirement"
                        required
                    >

                        <option value="">
                            Select your requirement
                        </option>

                        <option value="Purchase">
                            Purchase
                        </option>

                        <option value="Rental">
                            Rental
                        </option>

                        <option value="Book a Demo">
                            Book a Demo
                        </option>

                        <option value="Service / AMC">
                            Service / AMC
                        </option>

                        <option value="Not Sure">
                            Not sure — Need expert advice
                        </option>

                    </select>

                </div>


                <div class="quote-field">

                    <label for="quote-message">
                        Tell us about your requirement
                    </label>

                    <textarea
                        id="quote-message"
                        name="message"
                        rows="5"
                        placeholder="Tell us about your print volume, office requirements or anything else we should know..."
                    ></textarea>

                </div>


                <button
                    type="submit"
                    class="quote-submit"
                >
                    Submit Enquiry
                    <span>→</span>
                </button>


                <p class="quote-form-note">
                    Our team will contact you regarding this machine.
                </p>

            </form>

        </div>

    </div>

</section>

</main>

<?php
endwhile;

get_footer();
?>