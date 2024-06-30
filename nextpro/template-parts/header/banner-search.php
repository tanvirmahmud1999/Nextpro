<?php
global $nextpro;
extract(wp_parse_args($args, [
    'disable_banner' => $nextpro->meta['disable_banner'],
    'custom_background' => 'off',
    'bg_image' => '',
    'banner_style' => '',
    'disable_breadcrumbs' => true,
    'breadcrumbs_bg' => ''
]));
if (!is_page()) {
    $disable_banner = get_theme_mod('disable_banner', false);
    $disable_breadcrumbs = get_theme_mod('disable_breadcrumb', false);
}
?>
<?php if (!$disable_banner) : ?>
    <section <?php nextpro_banner_class(); ?> data-bs-theme="light">
        <div class="container pt-120">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-page-hero__inner-content d-flex flex-column align-items-center position-relative z-1 text-center">
                        <div class="inner-page-hero__titlewrap">
                            <!-- title -->
                            <h1 class="inner-page-hero__title">
                                <?php
                                printf(
                                    /* translators: %s: Search term. */
                                    esc_html__('Results for "%s"', 'nextpro'),
                                    '<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
                                );
                                ?>
                            </h1>
                        </div>
                        <!-- Subtitle -->
                        <div class="banner-subtitle lead fw-normal">
                            <h4 class="text-white">
                                <?php
                                printf(
                                    wp_kses_post(
                                        /* translators: %d: The number of search results. */
                                        _n(
                                            'We found <span class="text-primary px-2 d-inline-block">%d</span> result for your search.',
                                            'We found <span class="text-primary px-2 d-inline-block">%d</span> results for your search.',
                                            (int) $wp_query->found_posts,
                                            'nextpro'
                                        )
                                    ),
                                    (int) $wp_query->found_posts
                                );

                                ?>
                            </h4>
                        </div>
                        <?php the_archive_description('<div class="banner-subtitle lead fw-normal">', '</div>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="parallax banner-section inner-page-hero__bgimg position-absolute start-0 top-0 z-0 w-100 h-100" style="background-image: var(--nextpro-parallax-bg)"></div>
    </section>
<?php else : ?>
    <div class="banner-section border-bottom"></div>
<?php endif; ?>
<?php if (!is_front_page() && function_exists('bcn_display_list') && !$disable_breadcrumbs) : ?>
    <?php get_template_part('template-parts/header/breadcrumbs', '', $args); ?>
<?php endif; ?>


<!-- $count = (int) $wp_query->found_posts;
$singular = sprintf('We found <span>%d</span> result for your search.', $count);
$plural = sprintf('We found <span>%d</span> results for your search.', $count);

echo _n($singular, $plural, $count, 'nextpro'); -->