<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>

<?php wp_body_open(); ?>


<header class="site-header">

    <div class="container">


        <!-- LOGO -->

        <a
            href="<?php echo esc_url(home_url('/')); ?>"
            class="site-logo"
            aria-label="AZ Office Automation Home"
        >

            <img
                src="<?php echo esc_url(
                    get_template_directory_uri() .
                    '/assets/images/az-office-automation-logo.png'
                ); ?>"
                alt="AZ Office Automation"
            >

        </a>


        <!-- MOBILE MENU BUTTON -->

        <button
            class="mobile-menu-toggle"
            type="button"
            aria-label="Open navigation menu"
            aria-expanded="false"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>


        <!-- NAVIGATION -->

        <!-- NAVIGATION -->

<nav
    class="main-navigation"
    aria-label="Primary Navigation"
>

    <a href="<?php echo esc_url(home_url('/')); ?>">
        Home
    </a>

    <a href="<?php echo esc_url(home_url('/machines/')); ?>">
        Machines
    </a>

    <a href="<?php echo esc_url(home_url('/machine-finder/')); ?>">
        Machine Finder
    </a>

    <a href="<?php echo esc_url(home_url('/services/')); ?>">
        Services
    </a>

    <a href="<?php echo esc_url(home_url('/brands/')); ?>">
        Brands
    </a>

    <a href="<?php echo esc_url(home_url('/about/')); ?>">
        About
    </a>

    <a href="<?php echo esc_url(home_url('/contact/')); ?>">
        Contact
    </a>

</nav>


<!-- HEADER CTA -->

<a
    href="<?php echo esc_url(home_url('/contact/')); ?>"
    class="header-cta"
>
    Get a Quote
</a>

    </div>

</header>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const menuButton = document.querySelector('.mobile-menu-toggle');
    const navigation = document.querySelector('.main-navigation');

    if (!menuButton || !navigation) {
        return;
    }

    menuButton.addEventListener('click', function () {

        navigation.classList.toggle('mobile-menu-open');

        const isOpen =
            navigation.classList.contains('mobile-menu-open');

        menuButton.setAttribute(
            'aria-expanded',
            isOpen ? 'true' : 'false'
        );

        menuButton.setAttribute(
            'aria-label',
            isOpen
                ? 'Close navigation menu'
                : 'Open navigation menu'
        );

    });


    /* Close menu after clicking a link */

    navigation.querySelectorAll('a').forEach(function (link) {

        link.addEventListener('click', function () {

            navigation.classList.remove('mobile-menu-open');

            menuButton.setAttribute(
                'aria-expanded',
                'false'
            );

            menuButton.setAttribute(
                'aria-label',
                'Open navigation menu'
            );

        });

    });

});

</script>