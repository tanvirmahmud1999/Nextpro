<?php if (!empty($testimonial_group)) : ?>
    <div class="section-testimonial-three__wrap">
        <div class="nextmarketing-owl__carousel nextmarketing-owl__carousel-shadow owl-carousel" data-owl-options='{
                        "loop": true,
                        "animateIn": "fadeInUp",
                        "animateOut": "slideOutUp",
                        "items": 1,
                        "center" : false,
                        "autoplay": false,
                        "autoplayTimeout": 7000,
                        "smartSpeed": 1000,
                        "nav": true,
                        "dots": false,
                        "margin": 0,
                        "responsive": {
                            "0": {
                                "items": 1
                            }
                        }
                        }'>
            <?php
            foreach ($testimonial_group as $item) : ?>
                <?php
                // name
                $name = empty($item['name']) ? get_bloginfo('name') : control_agency_parse_text($item['name']);
                // image
                $image = $item['image'] ?? get_theme_file_uri('assets/images/banner/hero-img5-1.jpg');
                // rating_logo
                $rating_logo = $item['rating_logo'] ?? get_theme_file_uri('assets/images/shapes/trustpilot-img.png');
                ?>
                <div class="section-testimonial-three__item wow fadeInUp">
                    <div class="section-testimonial-three__bg">
                        <div class="section-testimonial-three__shape"></div>
                        <div class="section-testimonial-three__item-col d-flex flex-wrap">
                            <div class="section-testimonial-three__image position-relative">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/placeholder.svg" data-src="<?php echo esc_url($image) ?>" alt="<?php echo esc_attr($name) ?>">
                                <div class="section-testimonial-three__icon">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/shapes/skills-icon.png" alt="<?php echo esc_attr($name) ?>">
                                </div>
                            </div>

                            <div class="section-testimonial-three__info">
                                <div class="section-testimonial-three__review d-flex align-items-center justify-content-between">
                                    <div class="section-testimonial-three__star-wrap d-flex align-items-center">
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                    </div>

                                    <div class="section-testimonial-three__trustpilot">
                                        <img src="<?php echo esc_url($rating_logo) ?>" alt="<?php echo esc_attr($name) ?>">
                                    </div>
                                </div>

                                <div class="section-testimonial-three__info-details">
                                    <?php
                                    if (!empty($item['comment'])) {
                                        $comment = control_agency_parse_text($item['comment']);
                                        control_agency_content($comment, '<p class="section-testimonial-three__text">', '</p>');
                                    }
                                    ?>
                                    <div class="section-testimonial-three__author">
                                        <?php
                                        if (!empty($item['name'])) {
                                            $name = control_agency_parse_text($item['name']);
                                            control_agency_content($name, '<strong class="section-testimonial-three__name">', '</strong>');
                                        }
                                        if (!empty($item['designation'])) {
                                            $designation = control_agency_parse_text($item['designation']);
                                            control_agency_content($designation, '<small class="section-testimonial-three__designation">', '</small>');
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
<?php endif; ?>