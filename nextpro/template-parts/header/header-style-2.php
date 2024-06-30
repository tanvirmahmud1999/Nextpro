<?php
$args = '';
extract(wp_parse_args($args, array(
    'phone_label' => get_theme_mod('header_phone_label', 'Call Us anytime:'),
    'phone_number' => get_theme_mod('header_phone_number', '04125589745'),
    'sticky_class' => get_theme_mod('disable_sticky_header', false),
)));

// sticky_header
$sticky_class = $sticky_class ? 'section-header-sticky-off' : 'section-header';
// tra_header  
$tra_header = get_theme_mod('tra_header', false);
$tra_header = nextpro_get_post_meta('tra_header', false);
$tra_menu = $tra_header == true ? ' position-absolute top-0 start-0 end-0 w-100 h-auto' : '';

?>

<div class="header-wrapper <?php echo esc_attr($tra_menu) ?>">
    <header <?php nextpro_header_class('section-header ' . $sticky_class . ''); ?>>
        <div class="container-fluid">
            <div class="section-header__inner">
                <div class="section-header__row d-flex flex-wrap align-items-center">
                    <div class="section-header__logo">
                        <div class="section-header__logo-inner">
                            <?php get_template_part('template-parts/header/site-branding'); ?>
                        </div>
                    </div>

                    <?php
                    // navbar
                    wp_nav_menu([
                        'container_class' => 'section-header__main-menu',
                        'menu_class' => 'mobileMenu reset-ul d-flex align-items-center',
                        'theme_location' => 'primary',
                        'depth' => 3,
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'fallback_cb'    => 'Nextpro\Nav_Walker::fallback',
                        'fallback_title'    => esc_attr__('Add Menu', 'nextpro'),
                    ]);

                    ?>

                    <div class="section-header__right">
                        <div class="section-header__right-bg d-flex align-items-center">
                            <div class="section-header__right__telicon">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/shapes/Calling1-1.svg" alt="rank-flow-icon">
                            </div>
                            <div class="section-header__right__callsupport" data-bs-theme="light">
                                <span class="section-header__right__calltext d-block"><?php echo esc_html($phone_label) ?></span>
                                <strong class="section-header__right__callnumber d-block"><a href="tel:<?php echo esc_url($phone_number) ?>"><?php echo esc_html($phone_number) ?></a></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>