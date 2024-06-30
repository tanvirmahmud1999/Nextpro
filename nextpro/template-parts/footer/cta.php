<?php

$args = wp_parse_args($args, array(
    'display_cta' => get_theme_mod('display_cta', false),
    'cta_title' => get_theme_mod('cta_title', 'Give it a try, it\'s free!'),
    'cta_subtitle' => get_theme_mod('cta_subtitle', 'It only takes a few clicks to get started'),
    'cta_button_text' => get_theme_mod('cta_button_text', 'Get srarted - it\'s free'),
    'cta_button_link' => get_theme_mod('cta_button_link', '#'),
    'cta_button_footer' => get_theme_mod('cta_button_footer', 'Free for 14 days, no credit card required'),
    'cta_bg_image' => get_theme_mod('cta_bg_image'),
));
extract($args);

if (!$display_cta) return;

$style = '';
if (!empty($cta_bg_image) && !is_wp_error($cta_bg_image)) {
    $cta_bg_image = wp_get_attachment_image_url($cta_bg_image, 'full');
    $style = 'style="--nextpro-banner-bg-05: url(' . esc_url($cta_bg_image) . ')"';
}

//for ppage
if (is_page()) {
    $display_cta = get_post_meta(get_the_ID(), 'display_cta', true);
}

?>

<?php if ($display_cta) : ?>
    <section id="banner-6" class="bg--05 bg--scroll banner-section" <?php echo nextpro_return_data($style) ?>>
        <div class="banner-overlay pt-80 pb-90">
            <div class="container">


                <!-- BANNER-6 WRAPPER -->
                <div class="banner-6-wrapper">
                    <div class="row justify-content-center">


                        <!-- BANNER-6 TEXT -->
                        <div class="col-md-9">
                            <div class="banner-6-txt text-center color--white">

                                <!-- Title -->
                                <?php if (!empty($cta_title)) : ?>
                                    <h3 class="s-46 w-700"><?php echo wp_kses_post($cta_title) ?></h3>
                                <?php endif ?>

                                <!-- Text -->
                                <?php if (!empty($cta_subtitle)) : ?>
                                    <p class="p-xl o-85"><?php echo wp_kses_post($cta_subtitle) ?></p>
                                <?php endif ?>

                                <!-- Button -->
                                <?php if (!empty($cta_button_text)) : ?>
                                    <a href="<?php echo esc_url($cta_button_link) ?>" class="btn r-04 btn--theme hover--tra-white"><?php echo esc_attr($cta_button_text) ?></a>
                                <?php endif ?>

                                <!-- Button footer -->
                                <?php if (!empty($cta_button_footer)) : ?>
                                    <p class="p-sm btn-txt ico-15 o-85">
                                        <?php echo wp_kses_post($cta_button_footer) ?>
                                    </p>
                                <?php endif ?>


                            </div>
                        </div> <!-- END BANNER-6 TEXT -->


                    </div> <!-- End row -->
                </div> <!-- END BANNER-6 WRAPPER -->


            </div> <!-- End container -->
        </div> <!-- End banner overlay -->
    </section> <!-- END BANNER-6 -->
<?php endif ?>