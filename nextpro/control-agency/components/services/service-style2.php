<?php if (!empty($services_style2)) : ?>
    <div class="row gutter-y-30">
        <?php
        // Large Device
        $lg_device = control_agency_parse_text($lg_device2);
        $lg = 12 / $lg_device;
        $lg = ($lg - floor($lg)) < 0.5 ? floor($lg) : ceil($lg);

        // md Device
        $md_device = control_agency_parse_text($md_device2);
        $md = 12 / $md_device;
        $md = ($md - floor($md)) < 0.5 ? floor($md) : ceil($md);

        $count = 1;
        foreach ($services_style2 as $item) :
        ?>

            <div class="col-md-<?php echo esc_attr($md) ?> col-lg-<?php echo esc_attr($lg) ?> section-services-four__col wow fadeInUp" data-wow-delay="0ms">
                <div class="section-services-four__iconwrap position-relative d-flex flex-column align-items-center">
                    <?php
                    $alt_text = !empty($item['alt_text']) ? esc_attr($item['alt_text']) : 'icon';
                    if ($count == 1) {
                        $image_shape = get_theme_file_uri('assets/images/shapes/service-bg4-1.svg');
                    } elseif ($count == 2) {
                        $image_shape = get_theme_file_uri('assets/images/shapes/service-bg4-2.svg');
                    } elseif ($count == 3) {
                        $image_shape = get_theme_file_uri('assets/images/shapes/service-bg4-3.svg');
                    } elseif ($count == 4) {
                        $image_shape = get_theme_file_uri('assets/images/shapes/service-bg4-4.svg');
                    } elseif ($count == 5) {
                        $image_shape = get_theme_file_uri('assets/images/shapes/service-bg4-5.svg');
                    } else
                        $image_shape = get_theme_file_uri('assets/images/shapes/service-bg4-6.svg');
                    ?>
                    <img src="<?php echo esc_url($image_shape); ?>" alt="<?php echo esc_attr($alt_text); ?>">

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
                            $image_url = get_theme_file_uri('assets/images/shapes/service-icon4-1.png');
                        } elseif ($count == 2) {
                            $image_url = get_theme_file_uri('assets/images/shapes/service-icon4-2.png');
                        } elseif ($count == 3) {
                            $image_url = get_theme_file_uri('assets/images/shapes/service-icon4-3.png');
                        } elseif ($count == 4) {
                            $image_url = get_theme_file_uri('assets/images/shapes/service-icon4-4.png');
                        } elseif ($count == 5) {
                            $image_url = get_theme_file_uri('assets/images/shapes/service-icon4-5.png');
                        } else
                            $image_url = get_theme_file_uri('assets/images/shapes/service-icon4-6.png');
                    }
                    ?>
                    <div class="section-services-four__icon position-absolute w-auto h-100 top-0 start-0 end-0 z-1 d-flex flex-column align-items-center justify-content-center">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                    </div>

                </div>
                <div class="section-services-four__info">
                    <?php
                    if (!empty($item['title'])) {
                        $title = control_agency_parse_text($item['title']);
                        control_agency_content($title, '<h4 class="section-services-four__title text-center"><a href="#">', '</a></h4>');
                    }
                    if (!empty($item['desc'])) {
                        $desc = control_agency_parse_text($item['desc']);
                        control_agency_content($desc, '<p class="section-services-four__text text-center">', '</p>');
                    } ?>
                </div>
            </div>

        <?php $count++;
        endforeach; ?>
    </div>
<?php endif; ?>