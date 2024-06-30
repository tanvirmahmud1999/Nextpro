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
    foreach ($service_adds as $item) :
        $center_class = ($count % 2 == 0) ? '' : 'mx-auto';
    ?>
        <div class="col-lg-<?php echo esc_attr($lg) ?> col-md-<?php echo esc_attr($md) ?> <?php echo esc_attr($center_class) ?>">
            <div class="section-services__listitem social-marketing wow fadeInUp" data-wow-delay="100ms">
                <?php
                if (!empty($item['title'])) {
                    $title = control_agency_parse_text($item['title']);
                    control_agency_content($title, ' <h3 class="section-services__fItem__title">', '</h3>');
                }
                if (!empty($item['desc'])) {
                    $desc = control_agency_parse_text($item['desc']);
                    control_agency_content($desc, '<p class="section-services__listitem__text">', '</p>');
                }
                ?>
                <div class="section-services__listitem__img">
                    <?php
                    if (empty($item['title'])) {
                        $title = get_bloginfo('name');
                    } else {
                        $title = control_agency_parse_text($item['title']);
                    }
                    if (!empty($item['add_image'])) {
                        $image_url = wp_get_attachment_image_url($item['add_image'], 'full');
                    } else {
                        if ($count == 1) {
                            $image_url = get_theme_file_uri('assets/images/resource/services1-1.png');
                        } else
                            $image_url = get_theme_file_uri('assets/images/resource/services1-2.png');
                    }
                    ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
                </div>
            </div>
        </div>
    <?php $count++;
    endforeach; ?>
</div>