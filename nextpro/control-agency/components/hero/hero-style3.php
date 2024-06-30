<section class="section-hero-five hero-sec position-relative" data-bs-theme="light">
    <?php
    if (!isset($hero_background_image)) {
        $hero_background_image = get_theme_file_uri('assets/images/banner/hero-img5-1.jpg');
    }
    ?>
    <div class="section-hero-five__bgimg position-absolute start-0 top-0 z-0 w-100 h-100" style="background-image: url('<?php echo esc_url($hero_background_image); ?>');"></div>

    <div class="container">
        <div class="section-hero-five__bg position-relative z-1">
            <div class="row d-flex flex-wrap m-0">
                <div class="section-hero-five__leftw">
                    <div class="section-hero-five__left">
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
                            control_agency_content($title, '<h1 class="section-hero-five__title">', '</h1>');
                        }
                        if (!empty($desc)) {
                            $desc = control_agency_parse_text($desc);
                            control_agency_content($desc, '<p class="section-hero-five__text">', '</p>');
                        }
                        ?>
                        <div class="section-hero-five__twobtn d-flex align-items-center">
                            <?php
                            if (!empty($buttons)) {
                                echo control_agency_get_btn($buttons, '<div class="d-inline-flex gap-2">', '</div>');
                            }
                            ?>
                            <?php
                            if (!empty($popup_link)) :
                                $popup_link = control_agency_parse_text($popup_link);
                            ?>
                                <div class="section-hero-five__playwrap d-flex align-items-center">
                                    <div class="section-hero-four__playbtn">

                                        <a href="<?php echo esc_url($popup_link) ?>" class="video-popup-link">
                                            <span class="play-arrow-icon"></span>
                                        </a>
                                    </div>
                                    <?php
                                    $popup_text = control_agency_parse_text($popup_text);
                                    control_agency_content($popup_text, '<p class="section-hero-five__playtext">', '</p>');
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./section-hero end -->