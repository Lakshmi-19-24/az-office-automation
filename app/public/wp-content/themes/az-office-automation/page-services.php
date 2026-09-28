<?php
/**
 * AZ Office Automation
 * Services Page
 */

get_header();
?>

<main class="az-services-page">

    <!-- HERO -->
    <section class="az-services-hero">

        <div class="az-services-hero-inner">

            <span class="az-eyebrow">
                AZ OFFICE AUTOMATION
            </span>

            <h1>
                Complete Office
                <span>Automation Services.</span>
            </h1>

            <p>
                From machine sales and rentals to AMC, CPC, IT support,
                toner supply and on-site repair, we provide practical
                office automation solutions for businesses across Karnataka.
            </p>

            <div class="az-services-hero-actions">

                <a
                    href="<?php echo esc_url(home_url('/contact/')); ?>"
                    class="az-service-primary-btn"
                >
                    Get a Quote
                </a>

                <a
                    href="tel:+918553202432"
                    class="az-service-secondary-btn"
                >
                    Call +91 85532 02432
                </a>

            </div>

        </div>

    </section>


    <!-- SERVICES -->
    <section class="az-services-list">

        <div class="az-services-heading">

            <span class="az-eyebrow">
                WHAT WE OFFER
            </span>

            <h2>
                Office technology,
                <span>supported end to end.</span>
            </h2>

            <p>
                Choose the service that matches your business requirement.
                Our team can help you select, install, maintain and support
                the right office technology.
            </p>

        </div>


        <div class="az-service-grid">


            <!-- 01 -->
            <article class="az-service-card">

                <div class="az-service-number">
                    01
                </div>

                <span class="az-service-label">
                    OFFICE TECHNOLOGY
                </span>

                <h3>
                    New Machine Sales
                </h3>

                <p>
                    Explore new photocopiers, multifunction printers and
                    office automation equipment from leading brands.
                </p>

              <a href="<?php echo esc_url(home_url('/new-machine-sales/')); ?>">
    Explore New Machine Sales →
</a>

            </article>


            <!-- 02 -->
            <article class="az-service-card">

                <div class="az-service-number">
                    02
                </div>

                <span class="az-service-label">
                    COST-EFFECTIVE SOLUTIONS
                </span>

                <h3>
                    Reconditioned Sales
                </h3>

                <p>
                    Quality reconditioned machines that are inspected,
                    tested and supplied for dependable everyday office use.
                </p>

              <a href="<?php echo esc_url(home_url('/contact/')); ?>">
    Enquire About Rental →
</a>

            </article>


            <!-- 03 -->
            <article class="az-service-card">

                <div class="az-service-number">
                    03
                </div>

                <span class="az-service-label">
                    FLEXIBLE OFFICE SOLUTIONS
                </span>

                <h3>
                    Machine Rental
                </h3>

                <p>
                    Flexible machine rental options for offices that prefer
                    predictable monthly costs and practical equipment access.
                </p>

               <a href="<?php echo esc_url(home_url('/rental-solutions/')); ?>">
    Explore Rental Solutions →
</a>

            </article>


            <!-- 04 -->
            <article class="az-service-card">

                <div class="az-service-number">
                    04
                </div>

                <span class="az-service-label">
                    MAINTENANCE
                </span>

                <h3>
                    AMC &amp; CPC
                </h3>

                <p>
                    Annual maintenance and cost-per-copy support designed to
                    keep your printing and copying operations running smoothly.
                </p>
<a href="<?php echo esc_url(home_url('/amc-cpc/')); ?>">
    Explore AMC &amp; CPC →
</a>

            </article>


            <!-- 05 -->
            <article class="az-service-card">

                <div class="az-service-number">
                    05
                </div>

                <span class="az-service-label">
                    IT SUPPORT
                </span>

                <h3>
                    IT Department AMC
                </h3>

                <p>
                    Ongoing IT support for businesses looking for dependable
                    maintenance and technical assistance for their office systems.
                </p>

              <a href="<?php echo esc_url(home_url('/it-department-amc/')); ?>">
    Explore IT Department AMC →
</a>
            </article>


            <!-- 06 -->
            <article class="az-service-card">

                <div class="az-service-number">
                    06
                </div>

                <span class="az-service-label">
                    CONSUMABLES
                </span>

                <h3>
                    Toner &amp; Spares Supply
                </h3>

                <p>
                    Supply of compatible and required toner, spare parts and
                    consumables for supported office machines.
                </p>

                <a href="<?php echo esc_url(home_url('/toner-spares-supply/')); ?>">
    Explore Toner &amp; Spares →
</a>

            </article>


            <!-- 07 -->
            <article class="az-service-card">

                <div class="az-service-number">
                    07
                </div>

                <span class="az-service-label">
                    TECHNICAL SUPPORT
                </span>

                <h3>
                    On-site Repair
                </h3>

                <p>
                    On-site technical assistance for office automation equipment,
                    helping businesses get their machines back in operation.
                </p>

                <a href="<?php echo esc_url(home_url('/on-site-repair/')); ?>">
    Explore On-site Repair →
</a>
            </article>


        </div>

    </section>


    <!-- BRANDS -->
    <section class="az-services-brands">

        <div class="az-services-heading">

            <span class="az-eyebrow">
                BRANDS WE SUPPORT
            </span>

            <h2>
                Technology from
                <span>leading brands.</span>
            </h2>

            <p>
                We supply and service office automation equipment from
                established brands across different business requirements.
            </p>

        </div>


        <div class="az-brand-strip">

            <div>Canon</div>
            <div>Xerox</div>
            <div>Kyocera</div>
            <div>Konica Minolta</div>
            <div>Fuji Film</div>
            <div>Epson</div>

        </div>

    </section>


    <!-- CTA -->
    <section class="az-services-cta">

        <span class="az-eyebrow">
            LET'S WORK TOGETHER
        </span>

        <h2>
            Need help choosing the
            <span>right solution?</span>
        </h2>

        <p>
            Tell us what your office needs and our team will help you
            find the right machine or service.
        </p>

        <a
            href="<?php echo esc_url(home_url('/contact/')); ?>"
            class="az-service-primary-btn"
        >
            Get a Quote
        </a>

    </section>

</main>


<style>

/* =========================================================
   AZ SERVICES PAGE
========================================================= */

.az-services-page {
    background: #f7f5f0;
    color: #142442;
}


/* HERO */

.az-services-hero {
    padding: 110px 7%;
    background: #ffffff;
    border-bottom: 1px solid #e5e0d7;
}

.az-services-hero-inner {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

.az-eyebrow {
    display: block;
    margin-bottom: 22px;
    color: #b8862f;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 4px;
}

.az-services-hero h1,
.az-services-heading h2,
.az-services-cta h2 {
    margin: 0;
    color: #142442;
    font-weight: 700;
    line-height: 1.05;
}

.az-services-hero h1 {
    font-size: clamp(42px, 6vw, 76px);
}

.az-services-hero h1 span,
.az-services-heading h2 span,
.az-services-cta h2 span {
    color: #b8862f;
}

.az-services-hero p {
    max-width: 720px;
    margin: 30px auto 0;
    color: #5f7188;
    font-size: 19px;
    line-height: 1.8;
}

.az-services-hero-actions {
    display: flex;
    justify-content: center;
    gap: 14px;
    margin-top: 38px;
    flex-wrap: wrap;
}

.az-service-primary-btn,
.az-service-secondary-btn {
    display: inline-block;
    padding: 15px 28px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 700;
    transition: 0.2s ease;
}

.az-service-primary-btn {
    background: #b8862f;
    color: #ffffff;
}

.az-service-primary-btn:hover {
    background: #9d7327;
    color: #ffffff;
}

.az-service-secondary-btn {
    border: 1px solid #b8862f;
    color: #142442;
    background: #ffffff;
}

.az-service-secondary-btn:hover {
    background: #b8862f;
    color: #ffffff;
}


/* SERVICES */

.az-services-list {
    padding: 100px 7%;
}

.az-services-heading {
    max-width: 850px;
    margin: 0 auto 55px;
    text-align: center;
}

.az-services-heading h2 {
    font-size: clamp(36px, 5vw, 58px);
}

.az-services-heading p {
    margin: 24px auto 0;
    max-width: 700px;
    color: #66758a;
    font-size: 17px;
    line-height: 1.8;
}

.az-service-grid {
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 22px;
}

.az-service-card {
    position: relative;
    padding: 38px;
    background: #ffffff;
    border: 1px solid #ded9d0;
    border-radius: 16px;
    min-height: 270px;
}

.az-service-number {
    position: absolute;
    top: 24px;
    right: 28px;
    font-size: 46px;
    font-weight: 700;
    color: #ded9d0;
}

.az-service-label {
    display: block;
    margin-bottom: 18px;
    color: #b8862f;
    font-size: 12px;
    letter-spacing: 3px;
    font-weight: 700;
}

.az-service-card h3 {
    margin: 0 70px 15px 0;
    color: #142442;
    font-size: 28px;
}

.az-service-card p {
    margin: 0;
    max-width: 520px;
    color: #65758a;
    line-height: 1.7;
}

.az-service-card a {
    display: inline-block;
    margin-top: 25px;
    color: #b8862f;
    font-weight: 700;
    text-decoration: none;
}


/* BRANDS */

.az-services-brands {
    padding: 100px 7%;
    background: #ffffff;
}

.az-brand-strip {
    max-width: 1100px;
    margin: 45px auto 0;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}

.az-brand-strip div {
    padding: 25px;
    text-align: center;
    border: 1px solid #ded9d0;
    border-radius: 10px;
    color: #142442;
    font-weight: 700;
    background: #f9f8f5;
}


/* CTA */

.az-services-cta {
    padding: 100px 7%;
    text-align: center;
    background: #f1eadb;
}

.az-services-cta h2 {
    max-width: 800px;
    margin: 0 auto;
    font-size: clamp(36px, 5vw, 58px);
}

.az-services-cta p {
    max-width: 650px;
    margin: 25px auto 35px;
    color: #5f7188;
    font-size: 18px;
    line-height: 1.7;
}


/* MOBILE */

@media (max-width: 700px) {

    .az-services-hero {
        padding: 75px 6%;
    }

    .az-services-list,
    .az-services-brands,
    .az-services-cta {
        padding: 70px 6%;
    }

    .az-service-grid {
        grid-template-columns: 1fr;
    }

    .az-service-card {
        padding: 30px;
    }

    .az-brand-strip {
        grid-template-columns: 1fr 1fr;
    }

}

@media (max-width: 450px) {

    .az-services-hero h1 {
        font-size: 43px;
    }

    .az-service-card h3 {
        font-size: 25px;
    }

    .az-brand-strip {
        grid-template-columns: 1fr;
    }

    .az-service-primary-btn,
    .az-service-secondary-btn {
        width: 100%;
        text-align: center;
    }

}

</style>


<?php get_footer(); ?>