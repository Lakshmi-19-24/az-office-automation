<?php
/**
 * AZ Office Automation
 * Rental Solutions Page
 */

get_header();
?>

<style>

/* =========================================================
   RENTAL SOLUTIONS PAGE
========================================================= */

.az-rental-page {
    background: #f7f5f0;
    color: #172746;
}


/* =========================================================
   HERO
========================================================= */

.az-rental-hero {
    background: #ffffff;
    padding: 120px 7% 110px;
    text-align: center;
    border-bottom: 1px solid #e5e0d7;
}

.az-rental-hero-inner {
    max-width: 1100px;
    margin: 0 auto;
}

.az-rental-eyebrow {
    display: block;
    margin-bottom: 28px;
    color: #bf8b2c;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 5px;
    text-transform: uppercase;
}

.az-rental-hero h1 {
    margin: 0 auto 30px;
    max-width: 1050px;
    color: #172746;
    font-size: clamp(48px, 6vw, 82px);
    line-height: 1.05;
    font-weight: 700;
    letter-spacing: -2px;
}

.az-rental-hero h1 span {
    display: block;
    color: #bf8b2c;
}

.az-rental-hero p {
    max-width: 850px;
    margin: 0 auto;
    color: #5d718d;
    font-size: 19px;
    line-height: 1.8;
}

.az-rental-actions {
    display: flex;
    justify-content: center;
    gap: 16px;
    margin-top: 40px;
    flex-wrap: wrap;
}

.az-rental-btn {
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

.az-rental-btn-primary {
    background: #bf8b2c;
    color: #ffffff;
}

.az-rental-btn-primary:hover {
    background: #a97720;
    color: #ffffff;
}

.az-rental-btn-secondary {
    background: #172746;
    color: #ffffff;
}

.az-rental-btn-secondary:hover {
    background: #0e1b32;
    color: #ffffff;
}


/* =========================================================
   INTRO
========================================================= */

.az-rental-intro {
    padding: 100px 7%;
    background: #f7f5f0;
    text-align: center;
}

.az-rental-intro-inner {
    max-width: 950px;
    margin: 0 auto;
}

.az-rental-intro h2 {
    margin: 0 auto 25px;
    color: #172746;
    font-size: clamp(42px, 5vw, 68px);
    line-height: 1.08;
    letter-spacing: -2px;
}

.az-rental-intro h2 span {
    color: #bf8b2c;
}

.az-rental-intro p {
    max-width: 850px;
    margin: 0 auto;
    color: #5d718d;
    font-size: 18px;
    line-height: 1.8;
}


/* =========================================================
   FEATURES
========================================================= */

.az-rental-features {
    background: #ffffff;
    padding: 105px 7%;
}

.az-rental-features-inner {
    max-width: 1250px;
    margin: 0 auto;
}

.az-rental-section-title {
    text-align: center;
    margin-bottom: 60px;
}

.az-rental-section-title h2 {
    margin: 0;
    color: #172746;
    font-size: clamp(42px, 5vw, 68px);
    line-height: 1.1;
    letter-spacing: -2px;
}

.az-rental-section-title h2 span {
    color: #bf8b2c;
}

.az-rental-card-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}

.az-rental-card {
    background: #ffffff;
    border: 1px solid #ded9cf;
    border-radius: 14px;
    padding: 42px;
    min-height: 235px;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.az-rental-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 18px 45px rgba(23, 39, 70, 0.08);
}

.az-rental-number {
    display: block;
    margin-bottom: 28px;
    color: #bf8b2c;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 2px;
}

.az-rental-card h3 {
    margin: 0 0 18px;
    color: #172746;
    font-size: 27px;
    line-height: 1.25;
}

.az-rental-card p {
    margin: 0;
    color: #5d718d;
    font-size: 17px;
    line-height: 1.7;
}


/* =========================================================
   HOW IT WORKS
========================================================= */

.az-rental-process {
    padding: 100px 7%;
    background: #f7f5f0;
}

.az-rental-process-inner {
    max-width: 1150px;
    margin: 0 auto;
}

.az-rental-process-title {
    text-align: center;
    margin-bottom: 55px;
}

.az-rental-process-title h2 {
    margin: 0;
    color: #172746;
    font-size: clamp(40px, 5vw, 62px);
}

.az-rental-process-title h2 span {
    color: #bf8b2c;
}

.az-rental-process-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.az-rental-process-card {
    padding: 32px;
    background: #ffffff;
    border: 1px solid #ded9cf;
    border-radius: 12px;
}

.az-rental-process-card strong {
    display: block;
    margin-bottom: 15px;
    color: #bf8b2c;
    font-size: 15px;
    letter-spacing: 2px;
}

.az-rental-process-card h3 {
    margin: 0 0 12px;
    color: #172746;
    font-size: 23px;
}

.az-rental-process-card p {
    margin: 0;
    color: #5d718d;
    line-height: 1.7;
}


/* =========================================================
   CTA
========================================================= */

.az-rental-cta {
    padding: 110px 7%;
    background: #f1eadb;
    text-align: center;
}

.az-rental-cta-inner {
    max-width: 1050px;
    margin: 0 auto;
}

.az-rental-cta h2 {
    margin: 0 auto 25px;
    color: #172746;
    font-size: clamp(42px, 5vw, 70px);
    line-height: 1.08;
    letter-spacing: -2px;
}

.az-rental-cta h2 span {
    color: #bf8b2c;
}

.az-rental-cta p {
    max-width: 750px;
    margin: 0 auto;
    color: #5d718d;
    font-size: 18px;
    line-height: 1.8;
}

.az-rental-cta .az-rental-btn {
    margin-top: 35px;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 800px) {

    .az-rental-hero {
        padding: 80px 6% 75px;
    }

    .az-rental-intro,
    .az-rental-features,
    .az-rental-process,
    .az-rental-cta {
        padding: 75px 6%;
    }

    .az-rental-card-grid {
        grid-template-columns: 1fr;
    }

    .az-rental-process-grid {
        grid-template-columns: 1fr;
    }

    .az-rental-card {
        padding: 30px;
    }

}

@media (max-width: 500px) {

    .az-rental-hero h1 {
        font-size: 43px;
        letter-spacing: -1px;
    }

    .az-rental-intro h2,
    .az-rental-section-title h2,
    .az-rental-process-title h2,
    .az-rental-cta h2 {
        font-size: 39px;
        letter-spacing: -1px;
    }

    .az-rental-hero p,
    .az-rental-intro p,
    .az-rental-cta p {
        font-size: 16px;
    }

    .az-rental-actions {
        flex-direction: column;
    }

    .az-rental-btn {
        width: 100%;
    }

}

</style>


<main class="az-rental-page">


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="az-rental-hero">

        <div class="az-rental-hero-inner">

            <span class="az-rental-eyebrow">
                RENTAL SOLUTIONS
            </span>

            <h1>
                Flexible office machine
                <span>rental solutions.</span>
            </h1>

            <p>
                Get access to suitable office automation equipment
                without making a large upfront investment. Our rental
                solutions are designed for businesses with changing
                requirements and predictable monthly budgeting needs.
            </p>

            <div class="az-rental-actions">

                <a
                    href="<?php echo esc_url( home_url('/contact/') ); ?>"
                    class="az-rental-btn az-rental-btn-primary"
                >
                    Enquire About Rental
                </a>

                <a
                    href="<?php echo esc_url( home_url('/machines/') ); ?>"
                    class="az-rental-btn az-rental-btn-secondary"
                >
                    Explore Machines
                </a>

            </div>

        </div>

    </section>


    <!-- =====================================================
         INTRO
    ====================================================== -->

    <section class="az-rental-intro">

        <div class="az-rental-intro-inner">

            <span class="az-rental-eyebrow">
                OFFICE MACHINE RENTAL
            </span>

            <h2>
                Equipment when you need it.
                <span>Costs you can plan.</span>
            </h2>

            <p>
                Whether you need a photocopier or multifunction printer
                for everyday office work, a temporary project or a
                growing business, our team can help identify a suitable
                rental solution based on your requirements.
            </p>

        </div>

    </section>


    <!-- =====================================================
         FEATURES
    ====================================================== -->

    <section class="az-rental-features">

        <div class="az-rental-features-inner">

            <div class="az-rental-section-title">

                <span class="az-rental-eyebrow">
                    WHY RENT
                </span>

                <h2>
                    A practical approach to
                    <span>office equipment.</span>
                </h2>

            </div>


            <div class="az-rental-card-grid">


                <!-- 01 -->

                <article class="az-rental-card">

                    <span class="az-rental-number">
                        01
                    </span>

                    <h3>
                        Lower Upfront Investment
                    </h3>

                    <p>
                        Rental allows businesses to access required
                        equipment without purchasing the machine
                        outright.
                    </p>

                </article>


                <!-- 02 -->

                <article class="az-rental-card">

                    <span class="az-rental-number">
                        02
                    </span>

                    <h3>
                        Flexible Equipment Options
                    </h3>

                    <p>
                        Choose equipment according to your office
                        workload, printing requirements and operational
                        needs.
                    </p>

                </article>


                <!-- 03 -->

                <article class="az-rental-card">

                    <span class="az-rental-number">
                        03
                    </span>

                    <h3>
                        Predictable Monthly Planning
                    </h3>

                    <p>
                        Rental arrangements can help businesses plan
                        equipment expenditure through predictable
                        monthly costs.
                    </p>

                </article>


                <!-- 04 -->

                <article class="az-rental-card">

                    <span class="az-rental-number">
                        04
                    </span>

                    <h3>
                        Support for Business Needs
                    </h3>

                    <p>
                        Our team can help you identify a suitable
                        machine and discuss the rental option based
                        on your requirements.
                    </p>

                </article>


            </div>

        </div>

    </section>


    <!-- =====================================================
         PROCESS
    ====================================================== -->

    <section class="az-rental-process">

        <div class="az-rental-process-inner">

            <div class="az-rental-process-title">

                <span class="az-rental-eyebrow">
                    HOW IT WORKS
                </span>

                <h2>
                    Start with your
                    <span>requirement.</span>
                </h2>

            </div>


            <div class="az-rental-process-grid">


                <div class="az-rental-process-card">

                    <strong>
                        STEP 01
                    </strong>

                    <h3>
                        Tell Us Your Requirement
                    </h3>

                    <p>
                        Share your expected monthly volume, paper
                        size, output requirement and other office needs.
                    </p>

                </div>


                <div class="az-rental-process-card">

                    <strong>
                        STEP 02
                    </strong>

                    <h3>
                        Choose a Suitable Machine
                    </h3>

                    <p>
                        Our team helps you identify a machine that
                        matches your business requirement.
                    </p>

                </div>


                <div class="az-rental-process-card">

                    <strong>
                        STEP 03
                    </strong>

                    <h3>
                        Discuss the Rental
                    </h3>

                    <p>
                        Contact our team to discuss rental terms,
                        machine availability and the next steps.
                    </p>

                </div>


            </div>

        </div>

    </section>


    <!-- =====================================================
         CTA
    ====================================================== -->

    <section class="az-rental-cta">

        <div class="az-rental-cta-inner">

            <span class="az-rental-eyebrow">
                READY TO GET STARTED?
            </span>

            <h2>
                Need a machine without
                <span>a large upfront cost?</span>
            </h2>

            <p>
                Tell us what your office needs and our team will
                help you explore suitable rental options.
            </p>

            <a
                href="<?php echo esc_url( home_url('/contact/') ); ?>"
                class="az-rental-btn az-rental-btn-primary"
            >
                Enquire About Rental
            </a>

        </div>

    </section>


</main>


<?php
get_footer();
?>