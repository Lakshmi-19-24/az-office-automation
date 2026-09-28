<?php
/**
 * AZ Office Automation
 * New Machine Sales
 */

get_header();
?>

<main class="az-service-detail">

    <!-- HERO -->
    <section class="az-detail-hero">

        <div class="az-detail-hero-inner">

            <span class="az-detail-eyebrow">
                NEW MACHINE SALES
            </span>

            <h1>
                New office technology
                <span>for modern businesses.</span>
            </h1>

            <p>
                Explore new photocopiers, multifunction printers and
                office automation equipment from leading brands,
                selected according to your business requirements.
            </p>

            <div class="az-detail-actions">

                <a
                    href="<?php echo esc_url(home_url('/machines/')); ?>"
                    class="az-detail-primary"
                >
                    Explore Machines
                </a>

                <a
                    href="<?php echo esc_url(home_url('/contact/')); ?>"
                    class="az-detail-secondary"
                >
                    Get a Quote
                </a>

            </div>

        </div>

    </section>


    <!-- INTRO -->
    <section class="az-detail-intro">

        <div class="az-detail-intro-heading">

            <span class="az-detail-eyebrow">
                WHAT WE PROVIDE
            </span>

            <h2>
                The right machine for
                <span>your workplace.</span>
            </h2>

        </div>


        <div class="az-detail-content">

            <div>
                <h3>New Photocopiers &amp; MFPs</h3>

                <p>
                    Choose from office photocopiers and multifunction
                    printers designed for everyday document printing,
                    copying and scanning requirements.
                </p>
            </div>

            <div>
                <h3>Business Printing Solutions</h3>

                <p>
                    We help businesses identify suitable machines based
                    on print volume, speed, paper size, colour or
                    black-and-white requirements and workflow needs.
                </p>
            </div>

            <div>
                <h3>Leading Brands</h3>

                <p>
                    We supply and service equipment from brands including
                    Canon, Xerox, Kyocera, Konica Minolta, Fuji Film and Epson.
                </p>
            </div>

            <div>
                <h3>Requirement-Based Selection</h3>

                <p>
                    Our team can help you compare machine specifications
                    and select an option suitable for your office,
                    institution or business.
                </p>
            </div>

        </div>

    </section>


    <!-- BRANDS -->
    <section class="az-detail-brands">

        <span class="az-detail-eyebrow">
            BRANDS
        </span>

        <h2>
            Technology from
            <span>leading brands.</span>
        </h2>

        <div class="az-detail-brand-grid">

            <div>Canon</div>
            <div>Xerox</div>
            <div>Kyocera</div>
            <div>Konica Minolta</div>
            <div>Fuji Film</div>
            <div>Epson</div>

        </div>

    </section>


    <!-- CTA -->
    <section class="az-detail-cta">

        <span class="az-detail-eyebrow">
            LET'S FIND THE RIGHT MACHINE
        </span>

        <h2>
            Ready to upgrade
            <span>your workplace?</span>
        </h2>

        <p>
            Tell us your requirements and our team will help you
            find a suitable office automation solution.
        </p>

        <a
            href="<?php echo esc_url(home_url('/contact/')); ?>"
            class="az-detail-primary"
        >
            Get a Quote
        </a>

    </section>

</main>


<style>

.az-service-detail {
    background: #f7f5f0;
    color: #142442;
}

.az-detail-hero {
    padding: 110px 7%;
    background: #ffffff;
    text-align: center;
    border-bottom: 1px solid #e2ddd4;
}

.az-detail-hero-inner {
    max-width: 900px;
    margin: auto;
}

.az-detail-eyebrow {
    display: block;
    margin-bottom: 20px;
    color: #b8862f;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 4px;
}

.az-detail-hero h1,
.az-detail-intro h2,
.az-detail-brands h2,
.az-detail-cta h2 {
    margin: 0;
    line-height: 1.08;
    color: #142442;
    font-weight: 700;
}

.az-detail-hero h1 {
    font-size: clamp(42px, 6vw, 76px);
}

.az-detail-hero h1 span,
.az-detail-intro h2 span,
.az-detail-brands h2 span,
.az-detail-cta h2 span {
    color: #b8862f;
}

.az-detail-hero p {
    max-width: 720px;
    margin: 28px auto 0;
    color: #607086;
    font-size: 19px;
    line-height: 1.8;
}

.az-detail-actions {
    display: flex;
    justify-content: center;
    gap: 14px;
    margin-top: 35px;
    flex-wrap: wrap;
}

.az-detail-primary,
.az-detail-secondary {
    display: inline-block;
    padding: 15px 28px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 700;
}

.az-detail-primary {
    background: #b8862f;
    color: #fff;
}

.az-detail-secondary {
    border: 1px solid #b8862f;
    color: #142442;
    background: #fff;
}


/* INTRO */

.az-detail-intro {
    padding: 100px 7%;
}

.az-detail-intro-heading {
    max-width: 850px;
    margin: 0 auto 55px;
    text-align: center;
}

.az-detail-intro h2,
.az-detail-brands h2,
.az-detail-cta h2 {
    font-size: clamp(36px, 5vw, 58px);
}

.az-detail-content {
    max-width: 1100px;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 22px;
}

.az-detail-content > div {
    padding: 35px;
    background: #fff;
    border: 1px solid #ded9d0;
    border-radius: 14px;
}

.az-detail-content h3 {
    margin: 0 0 15px;
    font-size: 25px;
    color: #142442;
}

.az-detail-content p {
    margin: 0;
    color: #64748a;
    line-height: 1.75;
}


/* BRANDS */

.az-detail-brands {
    padding: 100px 7%;
    text-align: center;
    background: #fff;
}

.az-detail-brand-grid {
    max-width: 1050px;
    margin: 45px auto 0;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}

.az-detail-brand-grid div {
    padding: 25px;
    background: #f8f7f4;
    border: 1px solid #ded9d0;
    border-radius: 10px;
    font-weight: 700;
}


/* CTA */

.az-detail-cta {
    padding: 100px 7%;
    text-align: center;
    background: #f1eadb;
}

.az-detail-cta p {
    max-width: 650px;
    margin: 25px auto 35px;
    color: #607086;
    font-size: 18px;
    line-height: 1.7;
}


/* MOBILE */

@media (max-width: 700px) {

    .az-detail-hero {
        padding: 75px 6%;
    }

    .az-detail-intro,
    .az-detail-brands,
    .az-detail-cta {
        padding: 70px 6%;
    }

    .az-detail-content {
        grid-template-columns: 1fr;
    }

    .az-detail-brand-grid {
        grid-template-columns: 1fr 1fr;
    }

}

@media (max-width: 450px) {

    .az-detail-hero h1 {
        font-size: 42px;
    }

    .az-detail-brand-grid {
        grid-template-columns: 1fr;
    }

    .az-detail-primary,
    .az-detail-secondary {
        width: 100%;
        text-align: center;
    }

}

</style>


<?php get_footer(); ?>