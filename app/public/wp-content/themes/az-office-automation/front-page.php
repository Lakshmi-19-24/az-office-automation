<?php get_header(); ?>

<main class="az-homepage">

    <!-- HERO SECTION -->
   <section class="hero-section">

    <div class="hero-content">

        <p class="hero-eyebrow">
            OFFICE AUTOMATION • BUSINESS TECHNOLOGY
        </p>

        <h1>
            Smarter Technology.
            <br>
            Better Business.
        </h1>

        <p class="hero-description">
            Premium office automation, printing, document management
            and workplace technology solutions for modern businesses.
        </p>

        <div class="hero-buttons">
<a href="<?php echo esc_url(home_url('/machines/')); ?>" class="btn btn-primary">Explore Machines</a>

            <a href="#finder" class="btn btn-outline">
                Find My Machine
            </a>

        </div>

    </div>

    <div class="hero-image">

        <img
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/homepage-hero.jpg'); ?>"
            alt="AZ Office Automation"
        >

    </div>

</section>

    <!-- INTRODUCTION -->
    <!-- INTRODUCTION / TRUST SECTION -->
<section class="intro-section">

    <div class="intro-inner">

        <div class="intro-label">
            AZ OFFICE AUTOMATION
        </div>

        <h2>
            Technology designed around
            <span>your business.</span>
        </h2>

        <p class="intro-description">
            We provide complete office automation and workplace
            technology solutions designed to help businesses print,
            communicate, manage documents and operate more efficiently.
        </p>

        <div class="intro-stats">

            <div class="intro-stat">
                <strong>01</strong>
                <span>Office Automation</span>
            </div>

            <div class="intro-stat">
                <strong>02</strong>
                <span>Printing Solutions</span>
            </div>

            <div class="intro-stat">
                <strong>03</strong>
                <span>IT Infrastructure</span>
            </div>

            <div class="intro-stat">
                <strong>04</strong>
                <span>Service & Support</span>
            </div>

        </div>

    </div>

</section>


    <!-- MACHINE FINDER -->
   <!-- =========================
     MACHINE FINDER
========================= -->

<section id="finder" class="finder-section">

    <div class="finder-container">

        <div class="finder-heading">

            <p class="section-label">
                MACHINE FINDER
            </p>

            <h2>
                Find the right machine
                <span>for your business.</span>
            </h2>

            <p>
                Answer a few questions about your business and we'll
                help you identify the right office machine.
            </p>

        </div>


        <div class="finder-box">

            <!-- PROGRESS -->

            <div class="finder-progress">

                <div class="finder-progress-top">
                    <span id="finder-step-label">
                        STEP 1 OF 11
                    </span>

                    <span id="finder-progress-percent">
                        9%
                    </span>
                </div>

                <div class="finder-progress-track">

                    <div
                        id="finder-progress-bar"
                        class="finder-progress-bar">
                    </div>

                </div>

            </div>


            <!-- QUESTION -->

            <div id="finder-question-area">

                <div class="finder-question-number">
                    QUESTION 01
                </div>

                <h3 id="finder-question">
                    What type of business do you have?
                </h3>

                <div
                    id="finder-options"
                    class="finder-options">
                </div>

            </div>


            <!-- NAVIGATION -->

            <div class="finder-navigation">

                <button
                    id="finder-back"
                    class="finder-back"
                    type="button">
                    ← Back
                </button>

                <span id="finder-current">
                    1 / 11
                </span>

            </div>

        </div>

    </div>

</section><!-- PRODUCTS PREVIEW -->
<section id="machines" class="machines-section">

    <div class="section-heading">

        <p class="section-label">
            OUR PRODUCTS
        </p>

        <h2>
            Technology for
            <span>every workplace.</span>
        </h2>

        <p class="section-description">
            Explore office automation and workplace technology solutions
            from leading brands, with new and reconditioned options
            available based on your requirements.
        </p>

    </div>


    <div class="machine-grid">


        <!-- PHOTOCOPIERS / MFP -->

        <a
            href="<?php echo esc_url(get_post_type_archive_link('machine')); ?>"
            class="machine-card product-preview-card"
        >

            <div class="machine-card-content">

                <p>01</p>

                <h3>
                    Photocopiers & MFPs
                </h3>

                <span>
                    Colour • B&W • A3 • A4
                </span>

            </div>

        </a>


        <!-- PRINTERS -->

        <a
            href="<?php echo esc_url(get_post_type_archive_link('machine')); ?>"
            class="machine-card product-preview-card"
        >

            <div class="machine-card-content">

                <p>02</p>

                <h3>
                    Printers
                </h3>

                <span>
                    Office • High Volume • Production
                </span>

            </div>

        </a>


        <!-- WORKPLACE TECHNOLOGY -->

        <a
            href="<?php echo esc_url(get_post_type_archive_link('machine')); ?>"
            class="machine-card product-preview-card"
        >

            <div class="machine-card-content">

                <p>03</p>

                <h3>
                    Workplace Technology
                </h3>

                <span>
                    Displays • CCTV • Networking • IT
                </span>

            </div>

        </a>


    </div>


    <!-- VIEW FULL CATALOGUE -->

    <div class="products-preview-action">

        <a
            href="<?php echo esc_url(get_post_type_archive_link('machine')); ?>"
            class="btn btn-primary"
        >
            View All Products →
        </a>

    </div>


</section>

    <!-- SERVICES -->
   <section id="services" class="services-section">

        <div class="section-heading">

            <p class="section-label">
                WHAT WE DO
            </p>

            <h2>
                Complete technology
                <span>solutions.</span>
            </h2>

        </div>

        <div class="service-grid">

            <div class="service-card">
                <span>01</span>
                <h3>New Machine Sales</h3>
                <p>
                    New office automation machines for businesses of every size.
                </p>
            </div>

            <div class="service-card">
                <span>02</span>
                <h3>Rental Solutions</h3>
                <p>
                    Flexible printer and copier rental solutions for your business.
                </p>
            </div>

            <div class="service-card">
                <span>03</span>
                <h3>AMC & CPC</h3>
                <p>
                    Reliable maintenance and cost-per-copy service solutions.
                </p>
            </div>

            <div class="service-card">
                <span>04</span>
                <h3>IT Infrastructure</h3>
                <p>
                    Displays, CCTV, networking, servers and workplace technology.
                </p>
            </div>

        </div>

    </section>


    <!-- FINAL CTA -->
    <section class="cta-section">

        <p class="section-label">
            LET'S WORK TOGETHER
        </p>

        <h2>
            Ready to upgrade
            <span>your workplace?</span>
        </h2>

        <p>
            Talk to our team and find the right technology solution
            for your business.
        </p>

       <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
    Get a Quote
</a>
    </section>

</main>

<?php get_footer(); ?>