<div class="row section-services__listrow">
    <?php $count = 1;
    // Large Device
    $lg_device1 = control_agency_parse_text($lg_device1);
    // Calculate $lg
    $lg = 12 / $lg_device1;
    // Round $lg based on its fractional part
    $lg = ($lg - floor($lg)) < 0.5 ? floor($lg) : ceil($lg);

    // Small Device
    $md_device1 = control_agency_parse_text($md_device1);
    // Calculate $lg
    $md = 12 / $md_device1;
    // Round $lg based on its fractional part
    $md = ($md - floor($md)) < 0.5 ? floor($md) : ceil($md);
    foreach ($service_listing as $item) :
        $center_class = ($count % 2 == 0) ? '' : 'mx-auto';
        $item_class = isset($item['service_icon__switcher']) ? '' : 'fitem3';
        //$item_class = $item['service_icon__switcher'] == false ? 'fitem3' : '';
    ?>
        <div class="col-lg-<?php echo esc_attr($lg) ?> col-md-<?php echo esc_attr($md) ?> <?php echo esc_attr($center_class) ?> section-services__col">
            <div class="section-services__fItem wow fadeInUp <?php echo esc_attr($item_class) ?>" data-wow-delay="100ms">
                <?php if (isset($item['service_icon__switcher']) == true) : ?>
                    <div class="section-services__fItem__icon">
                        <?php
                        if (empty($item['title'])) {
                            $title = get_bloginfo('name');
                        } else {
                            $title = control_agency_parse_text($item['title']);
                        }
                        if (!empty($item['service_icon'])) {
                            $image_url = wp_get_attachment_image_url($item['service_icon'], 'nextpro-80x80-cropped');
                        } else {
                            if ($count == 1) {
                                $image_url = get_theme_file_uri('assets/images/shapes/edit-icon1-1.svg');
                            } else
                                $image_url = get_theme_file_uri('assets/images/shapes/discount-icon1-1.svg');
                        }
                        ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
                    </div>
                <?php endif; ?>
                <?php
                if (!empty($item['title'])) {
                    $title = control_agency_parse_text($item['title']);
                    control_agency_content($title, ' <h3 class="section-services__fItem__title">', '</h3>');
                }
                ?>
                <?php
                $switcher = isset($item['service_icon__switcher']) ? control_agency_parse_text($item['service_icon__switcher']) : false;
                if (!$switcher) :
                    $btn_link = isset($item['btn_link']) ? esc_url($item['btn_link']) : '#';
                    $btn_class = isset($item['btn_class']) ? esc_attr($item['btn_class']) : 'default-btn-class';
                    $btn_text = isset($item['btn_text']) ? esc_html($item['btn_text']) : 'Default Text';
                ?>
                    <a href="<?php echo $btn_link; ?>" class="<?php echo $btn_class; ?> section-services__fItem__btn next-marketing-btn btn btn-radius">
                        <?php echo $btn_text; ?>
                        <?php echo nextpro_get_icon_svg('ui', 'btn_arrow_right', 17); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php $count++;
    endforeach; ?>
</div>