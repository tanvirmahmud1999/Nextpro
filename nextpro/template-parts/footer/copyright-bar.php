<?php
/*
footer copyright bar
contains copyright text and footer menu
*/

extract(wp_parse_args($args, array(
    'developed_by' => get_theme_mod('developed_by', sprintf('Designed and Developed By %s', '<a href="//themeforest.net/user/themeperch">Themeperch</a>')),
    'copyright_link' => get_theme_mod('copyright_link', '#'),
    'copyright_text'    => get_theme_mod('copyright_link', sprintf('Copyright &copy; %s. All Rights Reserved', date('Y'))),
)));
$copyright = nextpro_parse_link_text($developed_by, $copyright_link);

$border_class = get_theme_mod('display_footer_top', true) ? 'border-0' : '';

?>

<div <?php nextpro_copyright_class() ?>>
    <div class="container">
        <div class="footer__bg footer__bottom-bg">
            <div class="footer__innermx footer__bottom-innermx <?php echo esc_attr($border_class) ?>">
                <div class="row">
                    <p class="footer__bottom__designed col-md-6 text-start">
                        <?php echo wp_kses_post(str_replace('{date}', date('Y'), $copyright)) ?>
                    </p>
                    <?php if (!empty($copyright_text)) : ?>
                        <p class="footer__bottom__copyright col-md-6 text-end"><?php echo wp_kses_post($copyright_text) ?></p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- wp_nav_menu([
'container' => false,
'menu_class' => 'nav footer-nav justify-content-lg-end',
'theme_location' => 'footer',
'depth' => 1,
'fallback_cb' => 'Nextpro\Nav_Walker::fallback',
'fallback_title' => esc_attr__('Footer menu', 'nextpro'),
'walker' => new Nextpro\Nav_Walker()
]); -->