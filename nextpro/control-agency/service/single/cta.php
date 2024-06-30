<section class="section-form" data-bs-theme="light">
    <div class="container">
        <div class="section-form__bg">
            <?php
            $image_url = get_theme_file_uri('assets/images/background/services-bg1-1.png');
            if (!empty($background_image)) {
                $image_url = control_agency_get_attachment_url($background_image, 'full', $image_url);
            }

            ?>
            <div class="section-form__bgimg" style="background-image: url('<?php echo esc_url($image_url) ?>');"></div>

            <div class="section-form__inner-mx">
                <div class="row">
                    <div class="section-form__content">
                        <div class="section-form__icon d-flex align-items-center justify-content-center wow fadeInUp" data-wow-delay="200ms">
                            <img src="<?php echo get_theme_file_uri('assets/images/shapes/cro-icon.svg') ?>" alt="<?php bloginfo('name') ?>">
                        </div>
                        <div class="sec-title wow fadeInUp" data-wow-delay="200ms">
                            <?php control_agency_content($title, '<h2 class="sec-title__title">', '</h2>'); ?>
                            <?php control_agency_content($desc, '<p class="sec-title__text">', '</p>'); ?>
                        </div>
                    </div>

                    <?php if (!empty($shortcode)) : ?>
                        <div class="section-form__form wow fadeInUp" data-wow-delay="200ms">
                            <?php echo do_shortcode($shortcode) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./section-form end -->