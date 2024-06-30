<div class="section-hero-four">
    <div class="container">
        <div class="section-hero-four__bg">
            <div class="row d-flex flex-wrap">
                <div class="section-hero-four__leftw col-lg-6">
                    <div class="section-hero-four__left">
                        <?php
                        if (!empty($name)) : ?>
                            <div class="section-hero__tagline">
                                <?php
                                $name = control_agency_parse_text($name);
                                control_agency_content($name, '<span class="section-hero__tagtext">', '</span>');
                                ?>
                                <div class="section-hero__tagimg">
                                    <img src="<?php echo esc_url($name_tag) ?>" alt="<?php bloginfo('name') ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php
                        if (!empty($title)) {
                            $title = control_agency_parse_text($title);
                            control_agency_content($title, '<h1 class="section-hero-four__title">', '</h1>');
                        }
                        if (!empty($desc)) {
                            $desc = control_agency_parse_text($desc);
                            control_agency_content($desc, '<p class="section-hero-four__text">', '</p>');
                        }
                        ?>
                        <div class="section-hero-four__twobtn d-flex align-items-center">
                            <?php
                            if (!empty($buttons)) {
                                echo control_agency_get_btn($buttons, '<div class="d-inline-flex gap-2">', '</div>');
                            }
                            ?>
                            <?php
                            if (!empty($popup_link)) :
                                $popup_link = control_agency_parse_text($popup_link);
                            ?>
                                <div class="section-hero-four__playwrap d-flex align-items-center">
                                    <div class="section-hero-four__playbtn">

                                        <a href="<?php echo esc_url($popup_link) ?>" class="video-popup-link">
                                            <span class="play-arrow-icon"></span>
                                        </a>
                                    </div>
                                    <?php
                                    $popup_text = control_agency_parse_text($popup_text);
                                    control_agency_content($popup_text, '<p class="section-hero-four__playtext">', '</p>');
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($offer_list)) : ?>
                            <ul class="section-hero-four__list reset-ul d-flex align-items-center">
                                <?php
                                foreach ($offer_list as $item) {
                                    $title = control_agency_parse_text($item['label']);
                                    control_agency_content($title, '<li>', '</li>');
                                }
                                ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="section-hero-four__right col-lg-6">
                    <div class="section-hero-four__innerright w-100 h-100 position-relative">
                        <div class="section-hero-four__shape shape1 moving-element d-none d-lg-block" data-value="-2">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/mobius-strip4-1.png" alt="<?php bloginfo('name') ?>">
                        </div>
                        <div class="section-hero-four__shape shape2 moving-element" data-value="3">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/mobius-strip4-2.png" alt="<?php bloginfo('name') ?>">
                        </div>
                        <div class="section-hero-four__shape shape3 moving-element" data-value="3">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/mobius-strip4-3.png" alt="<?php bloginfo('name') ?>">
                        </div>
                        <div class="section-hero-four__shape shape4 moving-element" data-value="-5">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/mobius-strip4-4.png" alt="<?php bloginfo('name') ?>">
                        </div>
                        <div class="section-hero-four__shape shape5 moving-element d-none d-lg-block">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/mobius-strip4-5.png" alt="<?php bloginfo('name') ?>">
                        </div>
                        <div class="section-hero-four__shape shape6 moving-element" data-value="4">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/mobius-strip4-6.png" alt="<?php bloginfo('name') ?>">
                        </div>
                        <div class="section-hero-four__shape shape7 moving-element d-none d-lg-block" data-value="5">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/mobius-strip4-7.png" alt="<?php bloginfo('name') ?>">
                        </div>
                        <div class="section-hero-four__shape shape8 moving-element d-none d-lg-block" data-value="3">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/mobius-strip4-8.png" alt="<?php bloginfo('name') ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./section-hero end -->