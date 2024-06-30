<?php if (!empty($features_style2)) : ?>
    <div class="section-process__list row">
        <?php
        // Large Device
        if (!empty($lg_device2)) {
            $lg_device = control_agency_parse_text($lg_device2);
        }
        // Small Device
        if (!empty($sm_device2)) {
            $sm_device = control_agency_parse_text($sm_device2);
        }
        foreach ($features_style2 as $item) :
        ?>

            <div class="col-lg-<?php echo esc_attr($lg_device) ?> col-sm-<?php echo esc_attr($sm_device) ?> section-process__row d-flex align-items-center wow fadeInRight" data-wow-delay="100ms">
                <div class="section-process__icon">
                    <?php echo nextpro_get_icon_svg('ui', $item['icon'], 35); ?>
                </div>
                <div class="section-process__info">
                    <?php
                    if (!empty($item['title'])) {
                        $title = control_agency_parse_text($item['title']);
                        control_agency_content($title, '<h4 class="section-process__heading"><a href="#">', '</a></h4>');
                    }
                    if (!empty($item['desc'])) {
                        $desc = control_agency_parse_text($item['desc']);
                        control_agency_content($desc, '<p class="section-process__text">', '</p>');
                    } ?>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
<?php endif; ?>