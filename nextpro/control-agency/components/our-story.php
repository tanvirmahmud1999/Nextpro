<?php
$card_switcher = control_agency_parse_text($card_switcher);
$features_switcher = control_agency_parse_text($features_switcher);
$fun_facts_switcher = control_agency_parse_text($fun_facts_switcher);
$image_column_size = !empty($image_column_size) ? control_agency_parse_text($image_column_size) : 6;
$content_column_size = !empty($content_column_size) ? control_agency_parse_text($content_column_size) : 6;

?>
<section class="our-story">
    <div class="container">
        <div class="our-story__bg">
            <div class="our-story__mx">
                <div class="row <?php echo esc_attr($card_switcher == true ? 'justify-content-between' : 'gx-lg-5'); ?>">
                    <div class="col-lg-<?php echo esc_attr($image_column_size) ?>">
                        <div class="our-story__left wow fadeInUp <?php echo esc_attr($card_switcher == true ? 'position-relative our-story__left--three' : 'pe-lg-4') ?>" data-wow-delay="200ms">
                            <?php
                            $flip_image = control_agency_parse_text($flip_image);
                            $flip_image = $flip_image == true ? 'flip-image' : '';

                            $story_image = get_theme_file_uri('assets/images/resource/our-story1-1.png');
                            if (!empty($story_image)) {
                                $story_image = control_agency_get_attachment_url($story_image, 'nextpro-500x700-cropped', $story_image);
                            }
                            ?>
                            <img class="<?php echo esc_attr($flip_image) ?>" src="<?php echo esc_url($story_image) ?>" alt="<?php echo bloginfo('name') ?>">
                            <?php
                            if ($card_switcher == true) :
                                $select_alignment = control_agency_parse_text($select_alignment);
                                $select_alignment = ($select_alignment == 'experience-card-center') ? 'experience-card-center' : (($select_alignment == 'experience-card-top') ? 'experience-card-top' : 'none');
                            ?>
                                <div class="experience-card <?php echo esc_attr($select_alignment) ?> d-flex align-items-center count-box wow fadeInLeft" data-wow-delay="300ms">
                                    <!-- <div> -->
                                    <?php $experience_time = control_agency_parse_text($experience_time); ?>
                                    <strong class="experience-card__year count-text" data-stop="<?php echo esc_attr($experience_time) ?>" data-speed="1500"></strong>
                                    <!-- </div> -->
                                    <?php
                                    $experience_text = control_agency_parse_text($experience_text);
                                    control_agency_content($experience_text, '<span class="experience-card__text">', '</span>');
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- col-lg-6 -->
                    <div class="col-lg-<?php echo esc_attr($content_column_size) ?>">
                        <div class="our-story__content">
                            <div class="our-story__content-mx">
                                <div class="sec-title wow fadeInUp">
                                    <?php
                                    if (!empty($title)) {
                                        $title = control_agency_parse_text($title);
                                        control_agency_content($title, '<h2 class="sec-title__title">', '</h2>');
                                    } ?>
                                </div>
                                <?php
                                if (!empty($desc)) {
                                    $text_args = array(
                                        'tag' => 'span',
                                    );
                                    $desc = control_agency_parse_text($desc, $text_args);
                                    control_agency_content($desc, '<div class="our-story__textinfo wow fadeInUp" data-wow-delay="200ms"><p classs="section-provide__text">', '</p></div>');
                                }
                                ?>
                                <!-- Button and popup link -->
                                <div class="our-story__twobtn d-flex align-items-center wow fadeInUp">
                                    <?php
                                    if (!empty($buttons)) {
                                        echo control_agency_get_btn($buttons, '<div class="d-inline-flex gap-2">', '</div>');
                                    }
                                    ?>
                                    <?php
                                    if (!empty($popup_link)) :
                                        $popup_link = control_agency_parse_text($popup_link);
                                    ?>
                                        <div class="our-story__playwrap d-flex align-items-center mt-2">
                                            <div class="our-story__playbtn">
                                                <a href="<?php echo esc_url($popup_link) ?>" class="video-popup-link position-relative">
                                                    <span class="play-arrow-icon"></span>
                                                </a>
                                            </div>
                                            <?php
                                            $popup_text = control_agency_parse_text($popup_text);
                                            control_agency_content($popup_text, '<p class="our-story__playtext">', '</p>');
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- Features -->
                                <?php if (!empty($features_list) && $features_switcher == true) : ?>
                                    <div class="our-story__feature d-flex flex-wrap">
                                        <?php
                                        $count = 1;
                                        foreach ($features_list as $item) :
                                            $icon_classes = ['connectivity', 'solutions', 'optimized'];
                                            $icon_bg = $icon_classes[($count - 1) % 3];

                                        ?>
                                            <div class="our-story__ftwrap d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
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
                                                <div class="section-provide__icon <?php echo esc_attr($icon_bg) ?>">
                                                    <img class="img-1 grow-up" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                                                </div>
                                                <?php if (!empty($features_title)) {
                                                    control_agency_content($features_title, ' <h5 class="section-provide__fTitle">', '</h5>');
                                                } ?>
                                            </div>
                                        <?php $count++;
                                        endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Fun Fact -->
                                <?php if (!empty($fun_facts) && $fun_facts_switcher == true) : ?>
                                    <ul class="section-funfact__list  reset-ul d-flex flex-wrap align-items-center justify-content-between">
                                        <?php foreach ($fun_facts as  $fun_fact) :
                                            $count = isset($fun_fact['fun_fact_value']) ? $fun_fact['fun_fact_value'] : 0;
                                        ?>
                                            <li class="section-funfact__item count-box wow fadeInUp" data-wow-delay="00ms">
                                                <div class="section-funfact__count-wrap d-flex align-items-center">
                                                    <?php
                                                    printf(
                                                        '<span class="section-funfact__count odometer" data-count-to="%s"></span>',
                                                        esc_attr($fun_fact['fun_fact_value']),
                                                    );
                                                    if (!empty($fun_fact['fun_fact_suffix'])) {
                                                        $fun_fact_suffix = control_agency_parse_text($fun_fact['fun_fact_suffix']);
                                                        control_agency_content($fun_fact_suffix, '<span class="section-funfact__counter-text odometer-icon">', '</span>');
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                                if (!empty($fun_fact['label'])) {
                                                    $label = control_agency_parse_text($fun_fact['label']);
                                                    control_agency_content($label, ' <p class="section-funfact__text">', '</p>');
                                                } ?>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- col-lg-6 -->
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- ./our-story end -->