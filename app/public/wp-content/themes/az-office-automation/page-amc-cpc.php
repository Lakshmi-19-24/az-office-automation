<?php
/**
 * Template Name: AMC & CPC
 */

get_header();
?>

<main class="az-amc-page">

    <!-- HERO -->
    <section class="az-amc-hero">
        <div class="az-amc-hero-content">
            <span class="az-amc-eyebrow">AMC & CPC SUPPORT</span>

            <h1>
                Reliable AMC & CPC solutions for uninterrupted printing.
            </h1>

            <p>
                Keep your office printing equipment running smoothly with
                planned maintenance, responsive support and cost-effective
                print management solutions.
            </p>

            <div class="az-amc-actions">
                <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="az-amc-btn az-amc-btn-primary">
                    Get AMC & CPC Support
                </a>

                <a href="<?php echo esc_url( home_url('/machines/') ); ?>" class="az-amc-btn az-amc-btn-secondary">
                    Explore Machines
                </a>
            </div>
        </div>
    </section>


    <!-- INTRO -->
    <section class="az-amc-intro">
        <div class="az-amc-section-inner">

            <span class="az-amc-label">MAINTENANCE & PRINT MANAGEMENT</span>

            <h2>
                Keep your office machines performing reliably.
            </h2>

            <p>
                Regular maintenance and effective print management can help
                reduce unexpected downtime, control printing costs and keep
                your business operations running smoothly.
            </p>

            <p>
                Our AMC & CPC solutions are designed to support businesses
                with dependable service and practical maintenance options
                based on their machine usage and requirements.
            </p>

        </div>
    </section>


    <!-- SERVICES -->
    <section class="az-amc-services">
        <div class="az-amc-section-inner">

            <div class="az-amc-heading">
                <span class="az-amc-label">OUR SUPPORT</span>

                <h2>
                    AMC & CPC services designed around your business.
                </h2>
            </div>

            <div class="az-amc-grid">

                <div class="az-amc-card">
                    <div class="az-amc-number">01</div>

                    <h3>Annual Maintenance Contract</h3>

                    <p>
                        Planned maintenance support for office printers,
                        photocopiers and multifunction machines to help
                        maintain reliable day-to-day operation.
                    </p>
                </div>


                <div class="az-amc-card">
                    <div class="az-amc-number">02</div>

                    <h3>Comprehensive Support</h3>

                    <p>
                        Support for machine servicing, preventive maintenance
                        and troubleshooting based on the equipment and
                        service requirement.
                    </p>
                </div>


                <div class="az-amc-card">
                    <div class="az-amc-number">03</div>

                    <h3>Cost Per Copy</h3>

                    <p>
                        CPC-based support can help businesses manage printing
                        expenses according to actual machine usage and
                        printing requirements.
                    </p>
                </div>


                <div class="az-amc-card">
                    <div class="az-amc-number">04</div>

                    <h3>Preventive Maintenance</h3>

                    <p>
                        Regular machine checks help identify maintenance
                        requirements early and reduce avoidable operational
                        interruptions.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <!-- BENEFITS -->
    <section class="az-amc-benefits">
        <div class="az-amc-section-inner">

            <div class="az-amc-heading">
                <span class="az-amc-label">WHY AMC & CPC?</span>

                <h2>
                    Practical support for everyday office operations.
                </h2>
            </div>

            <div class="az-amc-benefit-grid">

                <div class="az-amc-benefit">
                    <h3>Reduced Downtime</h3>

                    <p>
                        Timely maintenance and service support can help keep
                        your machines available when your team needs them.
                    </p>
                </div>


                <div class="az-amc-benefit">
                    <h3>Better Cost Planning</h3>

                    <p>
                        Choose a maintenance or CPC approach that fits your
                        machine usage and business requirements.
                    </p>
                </div>


                <div class="az-amc-benefit">
                    <h3>Regular Maintenance</h3>

                    <p>
                        Planned servicing helps maintain equipment performance
                        and identify potential service requirements.
                    </p>
                </div>


                <div class="az-amc-benefit">
                    <h3>Business-Focused Support</h3>

                    <p>
                        Get practical assistance for your office printing and
                        photocopying infrastructure.
                    </p>
                </div>

            </div>

        </div>
    </section>


    <!-- HOW IT WORKS -->
    <section class="az-amc-process">
        <div class="az-amc-section-inner">

            <div class="az-amc-heading">
                <span class="az-amc-label">HOW IT WORKS</span>

                <h2>
                    Simple support, from requirement to maintenance.
                </h2>
            </div>

            <div class="az-amc-process-grid">

                <div class="az-amc-process-card">
                    <span>01</span>

                    <h3>Tell Us Your Requirement</h3>

                    <p>
                        Share your machine details, usage and service
                        requirements with our team.
                    </p>
                </div>


                <div class="az-amc-process-card">
                    <span>02</span>

                    <h3>Discuss the Service</h3>

                    <p>
                        Our team understands the equipment and discusses
                        suitable AMC or CPC support options.
                    </p>
                </div>


                <div class="az-amc-process-card">
                    <span>03</span>

                    <h3>Get Ongoing Support</h3>

                    <p>
                        Receive planned maintenance and service assistance
                        based on the agreed requirement.
                    </p>
                </div>

            </div>

        </div>
    </section>


    <!-- CTA -->
    <section class="az-amc-cta">

        <div class="az-amc-cta-inner">

            <span class="az-amc-label">NEED MAINTENANCE SUPPORT?</span>

            <h2>
                Keep your office printing operations running smoothly.
            </h2>

            <p>
                Talk to our team about AMC, CPC and maintenance requirements
                for your office machines.
            </p>

            <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="az-amc-btn az-amc-btn-primary">
                Talk to Our Team
            </a>

        </div>

    </section>

</main>


<style>

/* ================================
   AMC & CPC PAGE
================================ */

.az-amc-page {
    background: #ffffff;
    color: #171717;
    font-family: inherit;
}

.az-amc-section-inner {
    width: min(1180px, 88%);
    margin: 0 auto;
}


/* HERO */

.az-amc-hero {
    padding: 110px 7%;
    background:
        linear-gradient(135deg, #f8f8f8 0%, #ffffff 55%, #f5f5f5 100%);
    border-bottom: 1px solid #eeeeee;
}

.az-amc-hero-content {
    max-width: 850px;
    margin: 0 auto;
    text-align: center;
}

.az-amc-eyebrow,
.az-amc-label {
    display: inline-block;
    margin-bottom: 18px;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 2px;
    color: #b88a2d;
}

.az-amc-hero h1 {
    margin: 0 auto 24px;
    max-width: 850px;
    font-size: clamp(40px, 5vw, 66px);
    line-height: 1.08;
    letter-spacing: -1.5px;
}

.az-amc-hero p {
    max-width: 720px;
    margin: 0 auto;
    color: #666666;
    font-size: 18px;
    line-height: 1.8;
}

.az-amc-actions {
    display: flex;
    justify-content: center;
    gap: 14px;
    flex-wrap: wrap;
    margin-top: 34px;
}


/* BUTTONS */

.az-amc-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 54px;
    padding: 15px 28px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 15px;
    font-weight: 700;
    transition: all .25s ease;
    box-sizing: border-box;
}

.az-amc-btn-primary {
    background: #111111;
    color: #ffffff;
    border: 1px solid #111111;
}

.az-amc-btn-primary:hover {
    background: #b88a2d;
    border-color: #b88a2d;
    color: #ffffff;
}

.az-amc-btn-secondary {
    background: #ffffff;
    color: #111111;
    border: 1px solid #d5d5d5;
}

.az-amc-btn-secondary:hover {
    background: #f5f5f5;
    border-color: #b88a2d;
}


/* INTRO */

.az-amc-intro {
    padding: 95px 0;
    text-align: center;
}

.az-amc-intro .az-amc-section-inner {
    max-width: 850px;
}

.az-amc-intro h2,
.az-amc-heading h2 {
    margin: 0 0 22px;
    font-size: clamp(32px, 4vw, 46px);
    line-height: 1.15;
    letter-spacing: -0.8px;
}

.az-amc-intro p {
    margin: 0 auto 16px;
    max-width: 780px;
    color: #666666;
    font-size: 17px;
    line-height: 1.8;
}


/* SERVICES */

.az-amc-services {
    padding: 95px 0;
    background: #f7f7f7;
}

.az-amc-heading {
    max-width: 800px;
    margin-bottom: 45px;
}

.az-amc-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 22px;
}

.az-amc-card {
    position: relative;
    padding: 36px;
    background: #ffffff;
    border: 1px solid #e8e8e8;
    border-radius: 14px;
    transition: transform .25s ease, box-shadow .25s ease;
}

.az-amc-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 35px rgba(0,0,0,.07);
}

.az-amc-number {
    margin-bottom: 22px;
    color: #b88a2d;
    font-size: 14px;
    font-weight: 800;
    letter-spacing: 1px;
}

.az-amc-card h3 {
    margin: 0 0 12px;
    font-size: 23px;
}

.az-amc-card p {
    margin: 0;
    color: #666666;
    line-height: 1.75;
}


/* BENEFITS */

.az-amc-benefits {
    padding: 95px 0;
}

.az-amc-benefit-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 42px 60px;
}

.az-amc-benefit {
    padding-left: 24px;
    border-left: 3px solid #b88a2d;
}

.az-amc-benefit h3 {
    margin: 0 0 10px;
    font-size: 21px;
}

.az-amc-benefit p {
    margin: 0;
    color: #666666;
    line-height: 1.75;
}


/* PROCESS */

.az-amc-process {
    padding: 95px 0;
    background: #f7f7f7;
}

.az-amc-process-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}

.az-amc-process-card {
    padding: 34px;
    background: #ffffff;
    border: 1px solid #e8e8e8;
    border-radius: 14px;
}

.az-amc-process-card > span {
    display: inline-block;
    margin-bottom: 20px;
    color: #b88a2d;
    font-size: 14px;
    font-weight: 800;
    letter-spacing: 1px;
}

.az-amc-process-card h3 {
    margin: 0 0 12px;
    font-size: 21px;
}

.az-amc-process-card p {
    margin: 0;
    color: #666666;
    line-height: 1.75;
}


/* CTA */

.az-amc-cta {
    padding: 100px 7%;
    background: #111111;
    color: #ffffff;
    text-align: center;
}

.az-amc-cta-inner {
    max-width: 800px;
    margin: 0 auto;
}

.az-amc-cta .az-amc-label {
    color: #d0a653;
}

.az-amc-cta h2 {
    margin: 0 0 18px;
    font-size: clamp(32px, 4vw, 48px);
    line-height: 1.15;
}

.az-amc-cta p {
    max-width: 650px;
    margin: 0 auto;
    color: #cfcfcf;
    font-size: 17px;
    line-height: 1.75;
}

.az-amc-cta .az-amc-btn {
    margin-top: 30px;
    background: #ffffff;
    color: #111111;
    border-color: #ffffff;
}

.az-amc-cta .az-amc-btn:hover {
    background: #b88a2d;
    border-color: #b88a2d;
    color: #ffffff;
}


/* MOBILE */

@media (max-width: 768px) {

    .az-amc-hero {
        padding: 75px 6%;
    }

    .az-amc-hero h1 {
        font-size: 40px;
    }

    .az-amc-hero p {
        font-size: 16px;
    }

    .az-amc-intro,
    .az-amc-services,
    .az-amc-benefits,
    .az-amc-process {
        padding: 65px 0;
    }

    .az-amc-grid,
    .az-amc-benefit-grid,
    .az-amc-process-grid {
        grid-template-columns: 1fr;
    }

    .az-amc-card,
    .az-amc-process-card {
        padding: 28px;
    }

    .az-amc-cta {
        padding: 70px 6%;
    }

    .az-amc-actions {
        flex-direction: column;
    }

    .az-amc-actions .az-amc-btn {
        width: 100%;
    }

}

@media (max-width: 480px) {

    .az-amc-hero h1 {
        font-size: 34px;
    }

    .az-amc-intro h2,
    .az-amc-heading h2 {
        font-size: 31px;
    }

    .az-amc-card,
    .az-amc-process-card {
        padding: 24px;
    }

}

</style>

<?php get_footer(); ?>