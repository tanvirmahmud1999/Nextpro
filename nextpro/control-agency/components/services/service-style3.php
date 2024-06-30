<?php if (!empty($services_style3)) : ?>
    <div class="row gutter-y-30">
        <?php
        // Large Device
        $lg_device = control_agency_parse_text($lg_device3);
        $lg = 12 / $lg_device;
        $lg = ($lg - floor($lg)) < 0.5 ? floor($lg) : ceil($lg);

        // md Device
        $md_device = control_agency_parse_text($md_device3);
        $md = 12 / $md_device;
        $md = ($md - floor($md)) < 0.5 ? floor($md) : ceil($md);

        $count = 1;
        foreach ($services_style3 as $item) :
        ?>
            <div class="col-md-<?php echo esc_attr($md) ?> col-lg-<?php echo esc_attr($lg) ?>">
                <div class="section-feature__item wow fadeInUp" data-wow-delay="00ms">
                    <div class="section-feature__bg position-relative">
                        <?php
                        // shape
                        $alt_text = !empty($item['alt_text']) ? esc_attr($item['alt_text']) : 'icon';
                        if ($count == 1) {
                            $image_shape = get_theme_file_uri('assets/images/shapes/feature-bg4-1.png');
                        } elseif ($count == 2) {
                            $image_shape = get_theme_file_uri('assets/images/shapes/feature-bg4-2.png');
                        } else
                            $image_shape = get_theme_file_uri('assets/images/shapes/feature-bg4-3.png');
                        ?>
                        <div class="section-feature__bgimg position-absolute w-100 h-100 top-0 start-0 z-1" style="background-image: url('<?php echo esc_url($image_shape); ?>');"></div>

                        <!-- Service Icon -->
                        <?php
                        if (empty($item['features_title'])) {
                            $features_title = get_bloginfo('name');
                        } else {
                            $features_title = control_agency_parse_text($item['features_title']);
                        }

                        if (!empty($item['image'])) {
                            $image_url = wp_get_attachment_image_url($item['image'], 'nextpro-100x100-cropped');
                        } else {
                            if ($count == 1) {
                                $image_url = get_theme_file_uri('assets/images/shapes/feature-icon4-1.png');
                            } elseif ($count == 2) {
                                $image_url = get_theme_file_uri('assets/images/shapes/feature-icon4-2.png');
                            } else
                                $image_url = get_theme_file_uri('assets/images/shapes/feature-icon4-3.png');
                        }
                        ?>
                        <div class="section-feature__icon wow fadeInLeft position-relative z-1" data-wow-delay="100ms">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                        </div>
                        <div class="section-feature__info position-relative z-1 wow fadeInUp" data-wow-delay="100ms">
                            <?php
                            if (!empty($item['title'])) {
                                $title = control_agency_parse_text($item['title']);
                                control_agency_content($title, '<h4 class="section-feature__title"><a href="#">', '</a></h4>');
                            }
                            if (!empty($item['desc'])) {
                                $desc = control_agency_parse_text($item['desc']);
                                control_agency_content($desc, '<p class="section-feature__text">', '</p>');
                            } ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php $count++;
        endforeach; ?>
    </div>
<?php endif; ?>