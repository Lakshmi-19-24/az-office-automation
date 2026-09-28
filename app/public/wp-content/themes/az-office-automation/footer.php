<footer class="site-footer"> 
 
    <p> 
        &copy; <?php echo date('Y'); ?> AZ Office Automation. 
        All Rights Reserved. 
    </p> 
 
</footer>


<!-- =========================================================
     AZ OFFICE AUTOMATION
     GLOBAL PRODUCT IMAGE LIGHTBOX
========================================================= -->

<div id="az-global-image-lightbox">

    <button
        id="az-global-image-close"
        type="button"
        aria-label="Close image"
    >
        &times;
    </button>

    <div id="az-global-image-stage">

        <img
            id="az-global-image"
            src=""
            alt="Machine Image"
        >

    </div>

    <div id="az-global-image-help">
        Click the image to zoom in / zoom out
    </div>

</div>


<script>
(function () {

    function AZOfficeImageLightbox() {

        const images = document.querySelectorAll(
            '.az-product-image img'
        );

        const lightbox =
            document.getElementById(
                'az-global-image-lightbox'
            );

        const lightboxImage =
            document.getElementById(
                'az-global-image'
            );

        const closeButton =
            document.getElementById(
                'az-global-image-close'
            );

        const stage =
            document.getElementById(
                'az-global-image-stage'
            );


        if (
            !images.length ||
            !lightbox ||
            !lightboxImage ||
            !closeButton ||
            !stage
        ) {

            console.log(
                'AZ Lightbox: elements not found.'
            );

            return;

        }


        console.log(
            'AZ Lightbox:',
            images.length,
            'product images found.'
        );


        /* =====================================================
           OPEN IMAGE
        ===================================================== */

        images.forEach(function (image) {

            image.style.cursor = 'zoom-in';

            image.addEventListener(
                'click',
                function (event) {

                    event.preventDefault();

                    event.stopPropagation();


                    let imageURL =
                        image.getAttribute(
                            'data-large_image'
                        );


                    if (!imageURL) {

                        imageURL =
                            image.getAttribute(
                                'data-src'
                            );

                    }


                    if (!imageURL) {

                        imageURL =
                            image.currentSrc;

                    }


                    if (!imageURL) {

                        imageURL =
                            image.src;

                    }


                    lightboxImage.src =
                        imageURL;

                    lightboxImage.alt =
                        image.alt ||
                        'AZ Office Automation Machine';


                    lightbox.classList.remove(
                        'az-global-image-zoomed'
                    );


                    lightbox.classList.add(
                        'az-global-image-active'
                    );


                    document.body.classList.add(
                        'az-global-image-open'
                    );

                },
                true
            );

        });


        /* =====================================================
           ZOOM IN / OUT
        ===================================================== */

        lightboxImage.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                lightbox.classList.toggle(
                    'az-global-image-zoomed'
                );

            }
        );


        /* =====================================================
           CLOSE BUTTON
        ===================================================== */

        closeButton.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                closeLightbox();

            }
        );


        /* =====================================================
           CLICK OUTSIDE
        ===================================================== */

        lightbox.addEventListener(
            'click',
            function (event) {

                if (
                    event.target === lightbox ||
                    event.target === stage
                ) {

                    closeLightbox();

                }

            }
        );


        /* =====================================================
           ESC KEY
        ===================================================== */

        document.addEventListener(
            'keydown',
            function (event) {

                if (
                    event.key === 'Escape' &&
                    lightbox.classList.contains(
                        'az-global-image-active'
                    )
                ) {

                    closeLightbox();

                }

            }
        );


        /* =====================================================
           CLOSE FUNCTION
        ===================================================== */

        function closeLightbox() {

            lightbox.classList.remove(
                'az-global-image-active',
                'az-global-image-zoomed'
            );

            document.body.classList.remove(
                'az-global-image-open'
            );


            setTimeout(
                function () {

                    if (
                        !lightbox.classList.contains(
                            'az-global-image-active'
                        )
                    ) {

                        lightboxImage.src = '';

                    }

                },
                300
            );

        }

    }


    if (
        document.readyState === 'loading'
    ) {

        document.addEventListener(
            'DOMContentLoaded',
            AZOfficeImageLightbox
        );

    } else {

        AZOfficeImageLightbox();

    }

})();
</script>


<?php wp_footer(); ?> 
 
</body> 
</html>