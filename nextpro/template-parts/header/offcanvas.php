<?php

$args = '';
extract(wp_parse_args($args, array(
    'offcanvas_position' => get_theme_mod('offcanvas_position', 'offcanvas_right'),
    'offcanvas_logo' => get_theme_mod('offcanvas_logo'),
    'offcanvas_description' => get_theme_mod('offcanvas_description', 'Choose Next Agency as your digital marketing agency and propel ur business to new heights with our award-winning digital marketing services.'),
    'contact_info_Label' => get_theme_mod('contact_info_Label', 'Contact Info Label'),
    'contact_address' => get_theme_mod('contact_address'),
    'contact_email' => get_theme_mod('contact_email'),
    'contact_number' => get_theme_mod('contact_number'),
)));
$left_class = $offcanvas_position == 'offcanvas_left' ? '' : 'header-info-sidebar--two';

$image = '';
if (!empty($offcanvas_logo) && !is_wp_error($offcanvas_logo)) {
    $image = wp_get_attachment_image_url($offcanvas_logo, 'full');
} else {
    $image = get_theme_file_uri('assets/images/logo-next.png');
}
?>
<div class="offcanvas offcanvas-start header-info-sidebar <?php echo esc_attr($left_class) ?>" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-label="offcanvasWithBothOptionsLabel">
    <div class="header-info-sidebar__bg">
        <div class="header-info-sidebar__cross btn-close position-absolute" data-bs-dismiss="offcanvas" aria-label="Close"></div>
        <div class="header-info-sidebar__top-logo">
            <div class="header-info-sidebar__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo nextpro_return_data($image); ?>" alt="nextmarketing"></a>
            </div>
            <?php if (!empty($offcanvas_description)) : ?>
                <div class="header-info-sidebar__discription">
                    <p class="header-info-sidebar__text">
                        <?php echo wp_kses_post($offcanvas_description); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <div class="header-info-sidebar__feature">
            <ul class="reset-ul">

                <li>
                    <a href="#">
                        <div class="header-info-sidebar__icon">
                            <svg width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7379 1.26181H5.08493C3.00493 1.25381 1.29993 2.91181 1.25093 4.99081V15.7038C1.20493 17.8168 2.87993 19.5678 4.99293 19.6148C5.02393 19.6148 5.05393 19.6158 5.08493 19.6148H13.0739C15.1679 19.5298 16.8179 17.7998 16.8029 15.7038V6.53781L11.7379 1.26181Z" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.4756 1.25V4.159C11.4756 5.579 12.6236 6.73 14.0436 6.734H16.7986" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.2887 13.8585H5.88867" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.2437 10.106H5.8877" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>

                        <span>Knowledge base</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <div class="header-info-sidebar__icon">
                            <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0714 18.5699C15.0152 21.6263 10.4898 22.2867 6.78642 20.574C6.23971 20.3539 5.79148 20.176 5.36537 20.176C4.17849 20.183 2.70117 21.3339 1.93336 20.567C1.16555 19.7991 2.31726 18.3206 2.31726 17.1266C2.31726 16.7004 2.14642 16.2602 1.92632 15.7124C0.212831 12.0096 0.874109 7.48269 3.93026 4.42721C7.8316 0.524432 14.17 0.524432 18.0714 4.4262C21.9797 8.33501 21.9727 14.6681 18.0714 18.5699Z" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M14.9398 11.913H14.9488" stroke="#001F3F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.9301 11.913H10.9391" stroke="#001F3F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.92128 11.913H6.93028" stroke="#001F3F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>

                        <span>Get Support</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="header-info-sidebar__icon">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 5C1 2.37479 1.02811 1.5 4.5 1.5C7.97189 1.5 8 2.37479 8 5C8 7.62521 8.01107 8.5 4.5 8.5C0.988927 8.5 1 7.62521 1 5Z" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 5C12 2.37479 12.0281 1.5 15.5 1.5C18.9719 1.5 19 2.37479 19 5C19 7.62521 19.0111 8.5 15.5 8.5C11.9889 8.5 12 7.62521 12 5Z" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 16C1 13.3748 1.02811 12.5 4.5 12.5C7.97189 12.5 8 13.3748 8 16C8 18.6252 8.01107 19.5 4.5 19.5C0.988927 19.5 1 18.6252 1 16Z" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16C12 13.3748 12.0281 12.5 15.5 12.5C18.9719 12.5 19 13.3748 19 16C19 18.6252 19.0111 19.5 15.5 19.5C11.9889 19.5 12 18.6252 12 16Z" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>

                        <span>View Change logo-box</span>
                    </a>
                    <small class="version-control">v1.0</small>
                </li>
                <li>
                    <a href="#">
                        <div class="header-info-sidebar__icon">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.492 1.289H5.753C2.678 1.289 0.75 3.466 0.75 6.548V14.862C0.75 17.944 2.669 20.121 5.753 20.121H14.577C17.662 20.121 19.581 17.944 19.581 14.862V10.834" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.82763 9.42093L14.3006 1.94793C15.2316 1.01793 16.7406 1.01793 17.6716 1.94793L18.8886 3.16493C19.8196 4.09593 19.8196 5.60593 18.8886 6.53593L11.3796 14.0449C10.9726 14.4519 10.4206 14.6809 9.84463 14.6809H6.09863L6.19263 10.9009C6.20663 10.3449 6.43363 9.81493 6.82763 9.42093Z" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.165 3.10254L17.731 7.66854" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>

                        <span>Suggest new features</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="header-info-sidebar__icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.75 0.749878L2.83 1.10988L3.793 12.5829C3.87 13.5199 4.653 14.2389 5.593 14.2359H16.502C17.399 14.2379 18.16 13.5779 18.287 12.6899L19.236 6.13188C19.342 5.39888 18.833 4.71888 18.101 4.61288C18.037 4.60388 3.164 4.59888 3.164 4.59888" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.125 8.2948H14.898" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15435 17.7025C5.45535 17.7025 5.69835 17.9465 5.69835 18.2465C5.69835 18.5475 5.45535 18.7915 5.15435 18.7915C4.85335 18.7915 4.61035 18.5475 4.61035 18.2465C4.61035 17.9465 4.85335 17.7025 5.15435 17.7025Z" fill="#001F3F" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4346 17.7025C16.7356 17.7025 16.9796 17.9465 16.9796 18.2465C16.9796 18.5475 16.7356 18.7915 16.4346 18.7915C16.1336 18.7915 15.8906 18.5475 15.8906 18.2465C15.8906 17.9465 16.1336 17.7025 16.4346 17.7025Z" fill="#001F3F" stroke="#001F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>

                        <span> Purchase Next Agency</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="header-info-sidebar__getin-touch">
            <?php if (!empty($contact_info_Label)) : ?>
                <h5 class="hea3er-info-sidebar__title"> <?php echo wp_kses_post($contact_info_Label); ?></h5>
            <?php endif ?>
            <ul class="reset-ul header-info-sidebar__address">
                <?php if (!empty($contact_address)) : ?>
                    <li><?php echo wp_kses_post($contact_address); ?></li>
                <?php endif ?>
                <?php if (!empty($contact_email)) : ?>
                    <li><a href="mailto:<?php echo esc_attr($contact_email) ?>"><?php echo wp_kses_post($contact_email); ?></a></li>
                <?php endif ?>
                <?php if (!empty($contact_number)) : ?>
                    <li><a href="tel:<?php echo esc_attr($contact_number) ?>"><?php echo wp_kses_post($contact_number); ?></a></li>
                <?php endif ?>
            </ul>

            <?php
            if (has_nav_menu('offcanvas_social')) :
                // Social links
                wp_nav_menu(
                    array(
                        'container'      => false,
                        'menu_class' => 'footer__socialwrap reset-ul mt-4',
                        'theme_location' => 'offcanvas_social',
                        'depth'          => 1,
                        'fallback_cb'    => false,
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'fallback_cb'    => 'Nextpro\Nav_Walker::fallback',
                        'fallback_title'    => esc_attr__('Offcanvas social menu', 'nextpro'),
                        'walker' => new Nextpro\Nav_Walker()
                    )
                );

            endif;
            ?>
        </div>
    </div>
</div>