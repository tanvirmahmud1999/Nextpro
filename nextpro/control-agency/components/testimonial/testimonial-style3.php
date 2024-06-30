<?php if (!empty($testimonial_lists)) : ?>
    <div class="section-client-rating__content">
        <div class="section-client-rating__item-wrap">
            <?php foreach ($testimonial_lists as $groups) :  ?>
                <div class="section-client-rating__item-col" data-dir="top" data-speed="fast">
                    <?php foreach ($groups['testimonial_group'] as $item) :
                        // name
                        $name = empty($item['name']) ? get_bloginfo('name') : control_agency_parse_text($item['name']);
                        // image
                        $image = $item['image'] ?? get_theme_file_uri('assets/images/resource/client-img4-1.png');
                    ?>
                        <div class="section-client-rating__item">
                            <div class="section-client-rating__bg">
                                <div class="section-client-rating__review">
                                    <div class="section-client-rating__star-wrap d-flex align-items-center">
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                    </div>
                                </div>

                                <div class="section-client-rating__titlewrap">
                                    <?php
                                    if (!empty($item['subject'])) {
                                        $subject = control_agency_parse_text($item['subject']);
                                        control_agency_content($subject, '<h5 class="section-client-rating__title">', '</h5>');
                                    }
                                    if (!empty($item['comment'])) {
                                        $comment = control_agency_parse_text($item['comment']);
                                        control_agency_content($comment, '<p class="section-client-rating__text">', '</p>');
                                    }
                                    ?>
                                </div>

                                <div class="section-client-rating__author d-flex align-items-center">
                                    <div class="section-client-rating__author__img">
                                        <img src="<?php echo esc_url($image) ?>" alt="<?php echo esc_attr($name) ?>">
                                    </div>
                                    <div class="section-client-rating__author__info">
                                        <?php
                                        if (!empty($item['name'])) {
                                            $name = control_agency_parse_text($item['name']);
                                            control_agency_content($name, '<h5 class="section-client-rating__author__name">', '</h5>');
                                        }
                                        if (!empty($item['designation'])) {
                                            $designation = control_agency_parse_text($item['designation']);
                                            control_agency_content($designation, ' <small class="section-client-rating__author__designation">', '</small>');
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- section-client-rating__item-wrap -->

        <?php
        echo control_agency_get_btn(
            $buttons,
            '<div class="' . esc_attr($button_alignment) . '">',
            '</div>'
        );
        ?>
    </div>
<?php endif; ?>