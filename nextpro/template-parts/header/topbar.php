<?php
if (!nextpro_is_enable_topbar()) return;
$display_title_and_tagline = get_theme_mod('display_title_and_tagline', true);
$enable_topbar = get_theme_mod('enable_topbar', true);
$args = '';
extract(wp_parse_args($args, array(
    'email_address' => get_theme_mod('email_address', 'contact@nextpro.com'),
    'phone_number' => get_theme_mod('phone_number', '17186385000'),
    'phone_label' => get_theme_mod('phone_label', 'Call us:'),
)));
// Transparent header color with topbar bordar
$header_style = get_theme_mod('header_style', 'style-1');
$header_style = nextpro_get_post_meta('header_style', 'style-1');

$topbar_border = $header_style == 'style-3' ? ' topbar-two--five border-bottom-1' : '';

// Transparent header color with topbar bordar
$navbar_style = get_theme_mod('navbar_style', 'navbar-dark');
$navbar_style = nextpro_get_post_meta('navbar_style', 'navbar-dark');
$navbar_style = $navbar_style == 'section-header--five' ? '' : 'border-bottom-0';


$tra_header = get_theme_mod('tra_header', false);
$tra_header = nextpro_get_post_meta('tra_header', false);
$tra_menu_topbar = $tra_header == true ? 'topbar-two--five' : '';


?>
<?php if ($enable_topbar) : ?>
    <div <?php nextpro_topbar_class('' . $tra_menu_topbar . '') ?> data-bs-theme="light">
        <div class="container-fluid">
            <div class="topbar-two__inner <?php echo esc_attr($navbar_style) ?> <?php echo esc_attr($topbar_border) ?>  d-flex align-items-center justify-content-between">

                <?php if (!empty($email_address) &&   !empty($phone_number)) : ?>
                    <ul class="topbar-two__infolist reset-ul d-flex align-items-center">
                        <?php if (!empty($email_address)) : ?>
                            <li>
                                <span class="topbar-two__icon message">
                                    <?php echo nextpro_get_icon_svg('ui', 'message', 22) ?>
                                </span>
                                <a href="mailto:<?php echo wp_kses_post($email_address) ?>"><?php echo wp_kses_post($email_address) ?></a>
                            </li>
                        <?php endif ?>
                        <?php if (!empty($phone_number)) : ?>
                            <li>
                                <span class="topbar-two__icon call-two">
                                    <?php echo nextpro_get_icon_svg('ui', 'call-two', 22) ?>
                                </span>
                                <strong><?php echo esc_html($phone_label) ?> </strong>
                                <a href="tel:<?php echo wp_kses_post($phone_number) ?>"><?php echo wp_kses_post($phone_number) ?></a>
                            </li>
                        <?php endif ?>
                    </ul>
                <?php endif; ?>
                <div class="topbar-two__callsupport d-flex align-items-center">
                    <?php
                    // Social links
                    wp_nav_menu(
                        array(
                            'container'      => '',
                            'container_class'      => ' ',
                            'menu_class' => 'footer__socialwrap reset-ul d-none d-xl-flex social-nav' . (($display_title_and_tagline && !empty(get_bloginfo('description'))) ? ' justify-content-center' : ''),
                            'theme_location' => 'social',
                            'depth'          => 1,
                            'fallback_cb'    => 'Nextpro\Nav_Walker::fallback',
                            'fallback_title'    => esc_attr__('Topbar social menu', 'nextpro'),
                            'walker' => new Nextpro\Nav_Walker()
                        )
                    );
                    ?>
                    <div class="topbar-two__thememodewrap topbar-two__thememodline d-flex align-items-center">
                        <div class="topbar-two__themeicon-wrap btn-radius d-flex align-items-center">
                            <div class="topbar-two__theme-icon themeModeBtn light-icon" data-id="light">
                                <i class="fa-regular fa-sun-bright"></i>
                            </div>
                            <div class="topbar-two__theme-icon themeModeBtn dark-icon" data-id="dark">
                                <i class="fa-regular fa-moon-stars"></i>
                            </div>
                        </div>

                        <!-- <div class="topbar-two__themetext-wrap overflow-hidden d-flex align-items-center">
                            <span class="topbar-two__theme-text light-text">Light</span>
                            <span class="topbar-two__theme-text dark-text">Dark</span>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>