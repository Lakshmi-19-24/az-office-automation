<?php
/**
 * Template Name: Brands
 */

get_header();
?>

<main class="az-brands-page">

    <!-- HERO -->
    <section class="az-brands-hero">
        <div class="az-brands-hero-inner">

            <span class="az-brands-eyebrow">
                BRANDS WE SUPPORT
            </span>

            <h1>
                Technology from
                <span>leading brands.</span>
            </h1>

            <p>
                We supply and service office automation equipment from
                established brands, helping businesses choose the right
                technology for their printing, IT and workplace requirements.
            </p>

            <div class="az-brands-actions">

                <a
                    href="<?php echo esc_url(home_url('/machines/')); ?>"
                    class="az-brands-btn az-brands-btn-primary"
                >
                    Explore Machines
                </a>

                <a
                    href="<?php echo esc_url(home_url('/contact/')); ?>"
                    class="az-brands-btn az-brands-btn-secondary"
                >
                    Get a Quote
                </a>

            </div>

        </div>
    </section>


    <!-- BRAND INTRO -->
    <section class="az-brands-intro">

        <div class="az-brands-section-inner">

            <span class="az-brands-label">
                OUR BRAND PORTFOLIO
            </span>

            <h2>
                Trusted technology for
                <span>different business needs.</span>
            </h2>

            <p>
                From professional printing and photocopying to workplace
                technology and office solutions, we work with a range of
                established brands to support different business requirements.
            </p>

        </div>

    </section>


    <!-- BRANDS -->
    <section class="az-brands-list">

        <div class="az-brands-section-inner">

            <div class="az-brands-grid">


                <!-- CANON -->
                <article class="az-brand-card">

                    <div class="az-brand-number">01</div>

                    <span class="az-brand-category">
                        OFFICE PRINTING
                    </span>

                    <h3>Canon</h3>

                    <p>
                        Office printers, photocopiers and multifunction
                        systems for businesses with different printing
                        requirements.
                    </p>

                    <a href="<?php echo esc_url(home_url('/machines/?brand=Canon')); ?>">
                        Explore Canon Machines →
                    </a>

                </article>


                <!-- XEROX -->
                <article class="az-brand-card">

                    <div class="az-brand-number">02</div>

                    <span class="az-brand-category">
                        OFFICE PRINTING
                    </span>

                    <h3>Xerox</h3>

                    <p>
                        Professional printing and multifunction solutions
                        designed for business environments and everyday
                        document workflows.
                    </p>

                    <a href="<?php echo esc_url(home_url('/machines/?brand=Xerox')); ?>">
                        Explore Xerox Machines →
                    </a>

                </article>


                <!-- KYOCERA -->
                <article class="az-brand-card">

                    <div class="az-brand-number">03</div>

                    <span class="az-brand-category">
                        OFFICE PRINTING
                    </span>

                    <h3>Kyocera</h3>

                    <p>
                        Business printing and multifunction equipment suited
                        to offices looking for practical and efficient
                        document solutions.
                    </p>

                    <a href="<?php echo esc_url(home_url('/machines/?brand=Kyocera')); ?>">
                        Explore Kyocera Machines →
                    </a>

                </article>


                <!-- KONICA MINOLTA -->
                <article class="az-brand-card">

                    <div class="az-brand-number">04</div>

                    <span class="az-brand-category">
                        OFFICE PRINTING
                    </span>

                    <h3>Konica Minolta</h3>

                    <p>
                        Multifunction and document management equipment for
                        businesses with professional printing requirements.
                    </p>

                    <a href="<?php echo esc_url(home_url('/machines/?brand=Konica%20Minolta')); ?>">
                        Explore Konica Minolta Machines →
                    </a>

                </article>


                <!-- FUJIFILM -->
                <article class="az-brand-card">

                    <div class="az-brand-number">05</div>

                    <span class="az-brand-category">
                        OFFICE TECHNOLOGY
                    </span>

                    <h3>Fuji Film</h3>

                    <p>
                        Office printing and document solutions supporting
                        different workplace technology requirements.
                    </p>

                    <a href="<?php echo esc_url(home_url('/machines/?brand=FUJIFILM')); ?>">
                        Explore Fuji Film Machines →
                    </a>

                </article>


                <!-- EPSON -->
                <article class="az-brand-card">

                    <div class="az-brand-number">06</div>

                    <span class="az-brand-category">
                        OFFICE PRINTING
                    </span>

                    <h3>Epson</h3>

                    <p>
                        Printing solutions for offices and businesses with
                        varied document and workflow requirements.
                    </p>

                    <a href="<?php echo esc_url(home_url('/machines/?brand=Epson')); ?>">
                        Explore Epson Machines →
                    </a>

                </article>

            </div>

        </div>

    </section>


    <!-- SERVICE SUPPORT -->
    <section class="az-brands-support">

        <div class="az-brands-section-inner">

            <div class="az-brands-support-content">

                <div>

                    <span class="az-brands-label">
                        SUPPLY & SERVICE
                    </span>

                    <h2>
                        More than supplying machines.
                    </h2>

                </div>

                <p>
                    Our support extends beyond machine supply. Depending on
                    your requirement, we can assist with sales, reconditioned
                    machines, rental, AMC & CPC, IT support, toner and spares,
                    and on-site service.
                </p>

            </div>

        </div>

    </section>


    <!-- CTA -->
    <section class="az-brands-cta">

        <div class="az-brands-cta-inner">

            <span class="az-brands-label">
                NEED HELP CHOOSING?
            </span>

            <h2>
                Find the right machine for your business.
            </h2>

            <p>
                Tell us your printing requirements and our team can help you
                explore suitable machines and service options.
            </p>

            <div class="az-brands-actions">

                <a
                    href="<?php echo esc_url(home_url('/machine-finder/')); ?>"
                    class="az-brands-btn az-brands-btn-primary"
                >
                    Use Machine Finder
                </a>

                <a
                    href="<?php echo esc_url(home_url('/contact/')); ?>"
                    class="az-brands-btn az-brands-btn-secondary"
                >
                    Talk to Our Team
                </a>

            </div>

        </div>

    </section>

</main>


<style>

/* =========================================================
   AZ BRANDS PAGE
========================================================= */

.az-brands-page {
    background: #f7f5f0;
    color: #142442;
}


/* HERO */

.az-brands-hero {
    padding: 110px 7%;
    background: #ffffff;
    border-bottom: 1px solid #e5e0d7;
}

.az-brands-hero-inner {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

.az-brands-eyebrow,
.az-brands-label {
    display: block;
    margin-bottom: 22px;
    color: #b8862f;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 4px;
}

.az-brands-hero h1 {
    margin: 0;
    color: #142442;
    font-size: clamp(42px, 6vw, 76px);
    font-weight: 700;
    line-height: 1.05;
}

.az-brands-hero h1 span,
.az-brands-intro h2 span {
    color: #b8862f;
}

.az-brands-hero p {
    max-width: 730px;
    margin: 30px auto 0;
    color: #5f7188;
    font-size: 19px;
    line-height: 1.8;
}


/* BUTTONS */

.az-brands-actions {
    display: flex;
    justify-content: center;
    gap: 14px;
    margin-top: 38px;
    flex-wrap: wrap;
}

.az-brands-btn {
    display: inline-block;
    padding: 15px 28px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 700;
    transition: 0.2s ease;
}

.az-brands-btn-primary {
    background: #b8862f;
    color: #ffffff;
}

.az-brands-btn-primary:hover {
    background: #9d7327;
    color: #ffffff;
}

.az-brands-btn-secondary {
    border: 1px solid #b8862f;
    color: #142442;
    background: #ffffff;
}

.az-brands-btn-secondary:hover {
    background: #b8862f;
    color: #ffffff;
}


/* INTRO */

.az-brands-intro {
    padding: 100px 7%;
    background: #f7f5f0;
    text-align: center;
}

.az-brands-section-inner {
    max-width: 1180px;
    margin: 0 auto;
}

.az-brands-intro h2 {
    margin: 0;
    color: #142442;
    font-size: clamp(36px, 5vw, 58px);
    line-height: 1.1;
}

.az-brands-intro p {
    max-width: 720px;
    margin: 25px auto 0;
    color: #66758a;
    font-size: 17px;
    line-height: 1.8;
}


/* BRAND CARDS */

.az-brands-list {
    padding: 0 7% 100px;
    background: #f7f5f0;
}

.az-brands-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 22px;
}

.az-brand-card {
    position: relative;
    min-height: 280px;
    padding: 38px;
    background: #ffffff;
    border: 1px solid #ded9d0;
    border-radius: 16px;
    box-sizing: border-box;
    transition: transform .25s ease, box-shadow .25s ease;
}

.az-brand-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 35px rgba(0,0,0,.06);
}

.az-brand-number {
    position: absolute;
    top: 22px;
    right: 28px;
    color: #ded9d0;
    font-size: 44px;
    font-weight: 700;
}

.az-brand-category {
    display: block;
    margin-bottom: 18px;
    color: #b8862f;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 3px;
}

.az-brand-card h3 {
    margin: 0 80px 15px 0;
    color: #142442;
    font-size: 30px;
}

.az-brand-card p {
    max-width: 560px;
    margin: 0;
    color: #65758a;
    line-height: 1.75;
}

.az-brand-card a {
    display: inline-block;
    margin-top: 25px;
    color: #b8862f;
    font-weight: 700;
    text-decoration: none;
}

.az-brand-card a:hover {
    color: #9d7327;
}


/* SUPPORT */

.az-brands-support {
    padding: 90px 7%;
    background: #ffffff;
    border-top: 1px solid #e5e0d7;
    border-bottom: 1px solid #e5e0d7;
}

.az-brands-support-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 70px;
    align-items: center;
}

.az-brands-support h2 {
    margin: 0;
    color: #142442;
    font-size: clamp(34px, 4vw, 48px);
    line-height: 1.1;
}

.az-brands-support p {
    margin: 0;
    color: #5f7188;
    font-size: 17px;
    line-height: 1.8;
}


/* CTA */

.az-brands-cta {
    padding: 100px 7%;
    background: #f1eadb;
    text-align: center;
}

.az-brands-cta-inner {
    max-width: 820px;
    margin: 0 auto;
}

.az-brands-cta h2 {
    margin: 0;
    color: #142442;
    font-size: clamp(36px, 5vw, 58px);
    line-height: 1.1;
}

.az-brands-cta p {
    max-width: 650px;
    margin: 25px auto 0;
    color: #5f7188;
    font-size: 18px;
    line-height: 1.7;
}


/* MOBILE */

@media (max-width: 700px) {

    .az-brands-hero {
        padding: 75px 6%;
    }

    .az-brands-intro,
    .az-brands-list,
    .az-brands-support,
    .az-brands-cta {
        padding-left: 6%;
        padding-right: 6%;
    }

    .az-brands-intro,
    .az-brands-list {
        padding-top: 70px;
        padding-bottom: 70px;
    }

    .az-brands-support,
    .az-brands-cta {
        padding-top: 70px;
        padding-bottom: 70px;
    }

    .az-brands-grid {
        grid-template-columns: 1fr;
    }

    .az-brands-support-content {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .az-brand-card {
        min-height: auto;
        padding: 30px;
    }

    .az-brands-actions {
        flex-direction: column;
    }

    .az-brands-btn {
        width: 100%;
        text-align: center;
        box-sizing: border-box;
    }

}

@media (max-width: 450px) {

    .az-brands-hero h1 {
        font-size: 43px;
    }

    .az-brands-intro h2,
    .az-brands-cta h2 {
        font-size: 35px;
    }

    .az-brand-card h3 {
        font-size: 26px;
    }

}

</style>

<?php get_footer(); ?>