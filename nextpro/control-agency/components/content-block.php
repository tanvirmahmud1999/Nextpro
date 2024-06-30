<div class="<?php echo esc_attr($select_alignment) ?>">
    <?php if (!empty($name)) {
        $name = control_agency_parse_text($name);
        control_agency_content($name, '<span class="sec-title__tagline d-inline-block">', '</span>');
    }
    if (!empty($title)) {
        $title = control_agency_parse_text($title);
        control_agency_content($title, '<h2 class="sec-title__title mb-4">', '</h2>');
    }
    if (!empty($desc)) {
        $text_args = array(
            'tag' => 'span',
            'before' => '',
            'after' => ''
        );
        $desc = control_agency_parse_text($desc, $text_args);
        control_agency_content($desc, '<p class="section-provide__text">', '</p>');
    }
    ?>

    <!-- Features -->
    <?php if (!empty($features_list) && $features_switcher == true) : ?>
        <div class="section-provide__feature d-flex flex-wrap">
            <?php
            $count = 1;
            foreach ($features_list as $item) : ?>
                <div class="section-provide__ftwrap d-flex align-items-center">
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
                            $image_url = get_theme_file_uri('assets/images/shapes/Category.png');
                        } elseif ($count == 2) {
                            $image_url = get_theme_file_uri('assets/images/shapes/Filter.png');
                        } elseif ($count == 3) {
                            $image_url = get_theme_file_uri('assets/images/shapes/Shield-Done.png');
                        } else
                            $image_url = get_theme_file_uri('assets/images/shapes/Filter.png');
                    }

                    $alt_text = !empty($item['features_title']) ? esc_attr($item['features_title']) : 'icon';
                    ?>
                    <div class="section-provide__icon connectivity">
                        <img class="img-1 grow-up" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                    </div>
                    <?php if (!empty($features_title)) {
                        control_agency_content($features_title, '<h5 class="section-provide__fTitle">', '</h5>');
                    } ?>
                </div>
            <?php $count++;
            endforeach; ?>
        </div>
    <?php endif; ?>
    <!-- List items -->
    <?php
    if (!empty($story_list_items) && $story_switcher == true) : ?>
        <div class="our-story--three">
            <ul class="reset-ul our-story__list">
                <?php foreach ($story_list_items as $list_item) : ?>
                    <li> <?php echo esc_attr($list_item['list_item']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif;  ?>

    <!-- Strategic Expertise -->
    <?php if (!empty($progress_items) && $pogress_switcher == true) : ?>
        <div class="section-progress-stories__progress-wrap wow fadeInUp" data-wow-delay="90ms">
            <?php foreach ($progress_items as $item) : ?>
                <div class="section-progress-stories__progress">
                    <?php
                    if (!empty($item['progress_label'])) {
                        $progress_label = control_agency_parse_text($item['progress_label']);
                        control_agency_content($progress_label, '<h5 class="section-progress-stories__progress-title">', '</h5>');
                    }
                    $progress_value = control_agency_parse_text($item['progress_value']);
                    ?>
                    <div class="section-progress-stories__progress-bar position-relative">
                        <div class="section-progress-stories__progress-inner count-bar" data-percent="<?php echo  esc_attr($progress_value) ?>%">
                            <div class="section-progress-stories__progress-number count-text"><?php echo  esc_attr($progress_value) ?>%</div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif;  ?>

    <!-- Button and popup link -->
    <div class="d-flex align-items-center">
        <?php
        echo control_agency_get_btn(
            $buttons,
            '<div class="' . esc_attr($select_alignment) . '">',
            '</div>'
        );
        ?>
        <?php
        if (!empty($popup_link)) :
            $popup_link = control_agency_parse_text($popup_link);
        ?>
            <div class="section-hero-four__playwrap mt-2 d-flex align-items-center">
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

    <?php if (!empty($client_lists) && $clients_logo_switcher == true) : ?>
        <!-- Client List -->
        <div class="section-hero__joinman-wrap wow fadeInUp d-flex align-items-center our-story__joinman-wrap" data-wow-delay="300ms">
            <div class="section-hero__joinman d-flex align-items-center">
                <?php
                foreach ($client_lists as $item) {
                    if (empty($item['image'])) continue;
                    $title = !empty($item['title']) ? $item['title'] : get_bloginfo('name');
                    $format = '<div class="section-hero__mane-img"><img src="%1$s" alt="%2$s"></div>';
                    printf($format, esc_url($item['image']), esc_attr($title));
                }
                ?>
                <?php
                $users_number = control_agency_parse_text($users_number);
                control_agency_content($users_number, '<div class="section-hero__mane-img totla-join d-flex align-items-center justify-content-center"><span class="section-hero__totla-jointext">', '</span></div>');
                ?>
            </div>
            <div class="section-hero__review">
                <div class="section-hero__star-wrap d-flex align-items-center">
                    <span class="star-icon"><i class="icon-Star"></i></span>
                    <span class="star-icon"><i class="icon-Star"></i></span>
                    <span class="star-icon"><i class="icon-Star"></i></span>
                    <span class="star-icon"><i class="icon-Star"></i></span>
                    <span class="star-icon"><i class="icon-Star"></i></span>
                </div>
                <?php
                $custom_link = control_agency_parse_text($custom_link);
                if (!empty($quote_label)) {
                    $text_args = array(
                        'before' => '',
                        'after' => '',
                        'href' => '' . $custom_link . '',
                    );
                    $quote_label = control_agency_parse_text($quote_label, $text_args);
                    control_agency_content($quote_label, '<p class="section-hero__rvw-text">', '</p>');
                }
                ?>
            </div>
        </div>
    <?php endif;  ?>

</div>