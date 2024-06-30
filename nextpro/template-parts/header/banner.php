<?php
global $nextpro;
extract(wp_parse_args($args, [
    //'disable_banner' => $nextpro->meta['disable_banner'],
    'disable_banner' => nextpro_get_post_meta('disable_banner', false),
    'custom_background' => 'off',
    'bg_image' => '',
    'banner_style' => '',
    'disable_breadcrumbs' =>  nextpro_get_post_meta('disable_breadcrumbs', false),
    'breadcrumbs_bg' => ''
]));

if (!is_page()) {
    $disable_banner = get_theme_mod('disable_banner', false);
    $disable_breadcrumbs = get_theme_mod('disable_breadcrumb', false);
}
?>
<?php if (!$disable_banner) : ?>
    <section <?php nextpro_banner_class(); ?> data-bs-theme="light">

        <div class="container">
            <div class="row">
                <div class="inner-page-hero__inner-content d-flex flex-column align-items-center position-relative z-1">
                    <div class="inner-page-hero__titlewrap">
                        <?php
                        the_archive_title('<h1 class="inner-page-hero__title">', '</h1>');
                        ?>
                    </div>

                    <?php if (!is_front_page() && function_exists('bcn_display_list') && !$disable_breadcrumbs) : ?>
                        <?php get_template_part('template-parts/header/breadcrumbs', '', $args); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="parallax banner-section inner-page-hero__bgimg position-absolute start-0 top-0 z-0 w-100 h-100" style="background-image: var(--nextpro-parallax-bg)"></div>

    </section>
<?php endif; ?>