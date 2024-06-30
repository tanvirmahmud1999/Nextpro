<?php if (!empty($services_style4)) : ?>
    <div class="section-feature--two p-0">
        <div class="row gutter-y-30">
            <?php
            // Large Device
            $lg_device = control_agency_parse_text($lg_device4);
            $lg = 12 / $lg_device;
            $lg = ($lg - floor($lg)) < 0.5 ? floor($lg) : ceil($lg);

            // md Device
            $md_device = control_agency_parse_text($md_device4);
            $md = 12 / $md_device;
            $md = ($md - floor($md)) < 0.5 ? floor($md) : ceil($md);

            $count = 1;
            foreach ($services_style4 as $item) :
            ?>
                <div class="col-md-<?php echo esc_attr($md) ?> col-lg-<?php echo esc_attr($lg) ?>">
                    <div class="section-feature__item wow fadeInUp" data-wow-delay="00ms">
                        <div class="section-feature__bg bg-transparent">
                            <?php
                            $alt_text = !empty($item['alt_text']) ? esc_attr($item['alt_text']) : 'icon';
                            // Service Icon
                            if (empty($item['features_title'])) {
                                $features_title = get_bloginfo('name');
                            } else {
                                $features_title = control_agency_parse_text($item['features_title']);
                            }

                            if (!empty($item['image'])) {
                                $image_url = wp_get_attachment_image_url($item['image'], 'nextpro-200x200-cropped');
                            } else {
                                if ($count == 1) {
                                    $image_url = get_theme_file_uri('assets/images/resource/feature5-1.png');
                                } elseif ($count == 2) {
                                    $image_url = get_theme_file_uri('assets/images/resource/feature5-2.png');
                                } else
                                    $image_url = get_theme_file_uri('assets/images/resource/feature5-3.png');
                            }
                            ?>
                            <div class="section-feature__image">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                            </div>
                            <div class="section-feature__info rounded-2 wow fadeInUp" data-wow-delay="100ms">
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
    </div>
<?php endif; ?>