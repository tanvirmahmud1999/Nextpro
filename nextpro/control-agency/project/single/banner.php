<section class="section-hero inner-page-hero hero-sec position-relative" data-bs-theme="light">
    <?php
    if (has_post_thumbnail()) {
        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    } else {
        $image_url = get_theme_file_uri('assets/images/banner/hero-about1-1.jpg');
    }
    $image_url = control_agency_get_attachment_url($image, 'full', $image_url);
    ?>
    <div class="inner-page-hero__bgimg position-absolute start-0 top-0 z-0 w-100 h-100" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
    <div class="container">
        <div class="row">
            <div class="inner-page-hero__inner-content d-flex flex-column align-items-center text-center position-relative z-1">
                <div class="inner-page-hero__titlewrap">
                    <?php
                    $title = str_replace(['[post_title]', '[project_title]'], get_the_title(), $title);
                    control_agency_content($title, '<h1 class="inner-page-hero__title">', '</h1>');
                    $subtitle = str_replace(['[post_excerpt]', '[project_excerpt]'], get_the_excerpt(), $subtitle);
                    control_agency_content($subtitle, '<p class="inner-page-hero__subtitle">', '</p>');
                    ?>
                </div>

                <?php if (!is_front_page() && function_exists('bcn_display_list')) : ?>
                    <?php get_template_part('template-parts/header/breadcrumbs'); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
<!-- ./section-hero end -->