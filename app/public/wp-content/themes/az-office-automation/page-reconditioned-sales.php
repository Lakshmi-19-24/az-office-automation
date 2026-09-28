<?php
/**
 * AZ Office Automation
 * Reconditioned Sales Page
 */

get_header();
?>

<style>

/* =========================================================
   RECONDITIONED SALES PAGE
========================================================= */

.az-reconditioned-page {
    background: #f7f5f0;
    color: #172746;
}


/* =========================================================
   HERO
========================================================= */

.az-recon-hero {
    background: #ffffff;
    padding: 120px 7% 110px;
    text-align: center;
    border-bottom: 1px solid #e5e0d7;
}

.az-recon-hero-inner {
    max-width: 1100px;
    margin: 0 auto;
}

.az-recon-eyebrow {
    display: block;
    margin-bottom: 28px;
    color: #b98527;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 5px;
    text-transform: uppercase;
}

.az-recon-hero h1 {
    margin: 0 auto 30px;
    max-width: 1050px;
    color: #172746;
    font-size: clamp(48px, 6vw, 82px);
    line-height: 1.05;
    font-weight: 700;
    letter-spacing: -2px;
}

.az-recon-hero h1 span {
    display: block;
    color: #bf8b2c;
}

.az-recon-hero p {
    max-width: 850px;
    margin: 0 auto;
    color: #5d718d;
    font-size: 19px;
    line-height: 1.8;
}

.az-recon-actions {
    display: flex;
    justify-content: center;
    gap: 16px;
    margin-top: 40px;
    flex-wrap: wrap;
}

.az-recon-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 190px;
    padding: 17px 30px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    font-weight: 700;
    transition: all 0.25s ease;
}

.az-recon-btn-primary {
    background: #bf8b2c;
    color: #ffffff;
}

.az-recon-btn-primary:hover {
    background: #a97720;
    color: #ffffff;
}

.az-recon-btn-secondary {
    background: #172746;
    color: #ffffff;
}

.az-recon-btn-secondary:hover {
    background: #0e1b32;
    color: #ffffff;
}


/* =========================================================
   INTRO
========================================================= */

.az-recon-intro {
    background: #f7f5f0;
    padding: 100px 7%;
    text-align: center;
}

.az-recon-intro-inner {
    max-width: 1000px;
    margin: 0 auto;
}

.az-recon-intro h2 {
    margin: 0 auto 25px;
    color: #172746;
    font-size: clamp(42px, 5vw, 68px);
    line-height: 1.08;
    letter-spacing: -2px;
}

.az-recon-intro h2 span {
    color: #bf8b2c;
}

.az-recon-intro p {
    max-width: 850px;
    margin: 0 auto;
    color: #5d718d;
    font-size: 18px;
    line-height: 1.8;
}


/* =========================================================
   PRODUCTS / SERVICES
========================================================= */

.az-recon-products {
    background: #ffffff;
    padding: 105px 7%;
}

.az-recon-products-inner {
    max-width: 1250px;
    margin: 0 auto;
}

.az-recon-section-title {
    text-align: center;
    margin-bottom: 60px;
}

.az-recon-section-title h2 {
    margin: 0;
    color: #172746;
    font-size: clamp(42px, 5vw, 68px);
    line-height: 1.1;
    letter-spacing: -2px;
}

.az-recon-section-title h2 span {
    color: #bf8b2c;
}

.az-recon-card-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}

.az-recon-card {
    background: #ffffff;
    border: 1px solid #ded9cf;
    border-radius: 14px;
    padding: 42px;
    min-height: 240px;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.az-recon-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 18px 45px rgba(23, 39, 70, 0.08);
}

.az-recon-number {
    display: block;
    margin-bottom: 28px;
    color: #bf8b2c;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 2px;
}

.az-recon-card h3 {
    margin: 0 0 18px;
    color: #172746;
    font-size: 27px;
    line-height: 1.25;
}

.az-recon-card p {
    margin: 0;
    color: #5d718d;
    font-size: 17px;
    line-height: 1.7;
}


/* =========================================================
   BRANDS
========================================================= */

.az-recon-brands {
    background: #f7f5f0;
    padding: 100px 7%;
}

.az-recon-brands-inner {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
}

.az-recon-brands h2 {
    margin: 0 0 55px;
    color: #172746;
    font-size: clamp(42px, 5vw, 64px);
    line-height: 1.1;
    letter-spacing: -2px;
}

.az-recon-brands h2 span {
    color: #bf8b2c;
}

.az-recon-brand-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
}

.az-recon-brand {
    background: #ffffff;
    border: 1px solid #ded9cf;
    border-radius: 10px;
    padding: 30px 20px;
    color: #172746;
    font-size: 19px;
    font-weight: 700;
}


/* =========================================================
   CTA
========================================================= */

.az-recon-cta {
    background: #f1eadb;
    padding: 110px 7%;
    text-align: center;
}

.az-recon-cta-inner {
    max-width: 1050px;
    margin: 0 auto;
}

.az-recon-cta h2 {
    margin: 0 auto 25px;
    color: #172746;
    font-size: clamp(42px, 5vw, 70px);
    line-height: 1.08;
    letter-spacing: -2px;
}

.az-recon-cta h2 span {
    color: #bf8b2c;
}

.az-recon-cta p {
    max-width: 750px;
    margin: 0 auto;
    color: #5d718d;
    font-size: 18px;
    line-height: 1.8;
}

.az-recon-cta .az-recon-btn {
    margin-top: 35px;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 800px) {

    .az-recon-hero {
        padding: 80px 6% 75px;
    }

    .az-recon-intro,
    .az-recon-products,
    .az-recon-brands,
    .az-recon-cta {
        padding: 75px 6%;
    }

    .az-recon-card-grid {
        grid-template-columns: 1fr;
    }

    .az-recon-brand-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .az-recon-card {
        padding: 30px;
    }

}

@media (max-width: 500px) {

    .az-recon-hero h1 {
        font-size: 43px;
        letter-spacing: -1px;
    }

    .az-recon-intro h2,
    .az-recon-section-title h2,
    .az-recon-brands h2,
    .az-recon-cta h2 {
        font-size: 39px;
        letter-spacing: -1px;
    }

    .az-recon-hero p,
    .az-recon-intro p,
    .az-recon-cta p {
        font-size: 16px;
    }

    .az-recon-actions {
        flex-direction: column;
    }

    .az-recon-btn {
        width: 100%;
    }

    .az-recon-brand-grid {
        grid-template-columns: 1fr;
    }

}

</style>


<main class="az-reconditioned-page">


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="az-recon-hero">

        <div class="az-recon-hero-inner">

            <span class="az-recon-eyebrow">
                RECONDITIONED SALES
            </span>

            <h1>
                Reliable reconditioned
                <span>machines for your business.</span>
            </h1>

            <p>
                Explore professionally inspected and reconditioned
                office automation machines from leading brands.
                Choose reliable solutions based on your printing,
                copying and scanning requirements.
            </p>

            <div class="az-recon-actions">

                <a
                    href="<?php echo esc_url( home_url('/contact/') ); ?>"
                    class="az-recon-btn az-recon-btn-primary"
                >
                    Get a Quote
                </a>

                <a
                    href="tel:+918553202432"
                    class="az-recon-btn az-recon-btn-secondary"
                >
                    Call Our Expert
                </a>

            </div>

        </div>

    </section>


    <!-- =====================================================
         INTRO
    ====================================================== -->

    <section class="az-recon-intro">

        <div class="az-recon-intro-inner">

            <span class="az-recon-eyebrow">
                RECONDITIONED OFFICE MACHINES
            </span>

            <h2>
                Practical technology.
                <span>Reliable performance.</span>
            </h2>

            <p>
                Our reconditioned machines are suitable for businesses,
                offices and institutions looking for dependable office
                automation solutions while keeping equipment investment
                practical.
            </p>

        </div>

    </section>


    <!-- =====================================================
         WHAT WE PROVIDE
    ====================================================== -->

    <section class="az-recon-products">

        <div class="az-recon-products-inner">

            <div class="az-recon-section-title">

                <span class="az-recon-eyebrow">
                    WHAT WE PROVIDE
                </span>

                <h2>
                    Reconditioned machines
                    <span>for everyday business needs.</span>
                </h2>

            </div>


            <div class="az-recon-card-grid">


                <!-- 01 -->

                <article class="az-recon-card">

                    <span class="az-recon-number">
                        01
                    </span>

                    <h3>
                        Reconditioned Photocopiers &amp; MFPs
                    </h3>

                    <p>
                        Professionally inspected and tested machines
                        for offices looking for reliable and
                        cost-effective document solutions.
                    </p>

                </article>


                <!-- 02 -->

                <article class="az-recon-card">

                    <span class="az-recon-number">
                        02
                    </span>

                    <h3>
                        Trusted Reconditioned Brands
                    </h3>

                    <p>
                        We supply reconditioned machines from
                        Canon, Xerox, Kyocera and Konica Minolta.
                    </p>

                </article>


                <!-- 03 -->

                <article class="az-recon-card">

                    <span class="az-recon-number">
                        03
                    </span>

                    <h3>
                        Cost-Effective Solutions
                    </h3>

                    <p>
                        Get dependable office automation equipment
                        while keeping your equipment investment
                        practical.
                    </p>

                </article>


                <!-- 04 -->

                <article class="az-recon-card">

                    <span class="az-recon-number">
                        04
                    </span>

                    <h3>
                        Requirement-Based Selection
                    </h3>

                    <p>
                        Our team can help you compare specifications
                        and select a machine suitable for your
                        office requirements.
                    </p>

                </article>


            </div>

        </div>

    </section>


    <!-- =====================================================
         BRANDS
    ====================================================== -->

    <section class="az-recon-brands">

        <div class="az-recon-brands-inner">

            <span class="az-recon-eyebrow">
                RECONDITIONED BRANDS
            </span>

            <h2>
                Machines from
                <span>trusted brands.</span>
            </h2>


            <div class="az-recon-brand-grid">

                <div class="az-recon-brand">
                    Canon
                </div>

                <div class="az-recon-brand">
                    Xerox
                </div>

                <div class="az-recon-brand">
                    Kyocera
                </div>

                <div class="az-recon-brand">
                    Konica Minolta
                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         FINAL CTA
    ====================================================== -->

    <section class="az-recon-cta">

        <div class="az-recon-cta-inner">

            <span class="az-recon-eyebrow">
                LET'S FIND THE RIGHT MACHINE
            </span>

            <h2>
                Looking for a reliable
                <span>reconditioned machine?</span>
            </h2>

            <p>
                Tell us your requirements and our team will help
                you find a suitable reconditioned office automation
                solution.
            </p>

            <a
                href="<?php echo esc_url( home_url('/contact/') ); ?>"
                class="az-recon-btn az-recon-btn-primary"
            >
                Get a Quote
            </a>

        </div>

    </section>


</main>


<?php
get_footer();
?>