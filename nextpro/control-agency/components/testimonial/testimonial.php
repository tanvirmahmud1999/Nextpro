<?php if (!empty($testimonial_group)) : ?>
    <div class="section-testimonial__wrap" data-bs-theme="light">
        <div class="nextmarketing-owl__carousel owl-carousel" id="testimonial-owl" data-owl-options='{
                            "loop": true,
                            "animateOut": "fadeOut",
                            "animateIn": "fadeIn",
                            "items": 1,
                            "center" : true,
                            "autoplay": false,
                            "autoplayTimeout": 7000,
                            "smartSpeed": 1000,
                            "nav": false,
                            "navText": "",
                            "dots": true,
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
                // video popup link
                $video_link = $item['video_link'] ?? 'https://www.youtube.com/watch?v=TKnufs85hXk';
                ?>
                <div class="section-testimonial__item wow fadeInUp" data-wow-delay="0ms">
                    <div class="section-testimonial__bg">
                        <div class="section-testimonial__item-col">
                            <div class="section-testimonial__info">
                                <div class="section-testimonial__review">
                                    <div class="section-testimonial__star-wrap d-flex align-items-center">
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                        <span class="star-icon"><i class="icon-Star"></i></span>
                                    </div>
                                </div>

                                <div class="section-testimonial__info-details">
                                    <?php
                                    if (!empty($item['comment'])) {
                                        $comment = control_agency_parse_text($item['comment']);
                                        control_agency_content($comment, '<p class="section-testimonial__text">', '</p>');
                                    }
                                    ?>
                                    <div class="section-testimonial__author">
                                        <?php
                                        if (!empty($item['name'])) {
                                            $name = control_agency_parse_text($item['name']);
                                            control_agency_content($name, '<strong class="section-testimonial__name">', '</strong>');
                                        }
                                        if (!empty($item['designation'])) {
                                            $designation = control_agency_parse_text($item['designation']);
                                            control_agency_content($designation, '<small class="section-testimonial__designation">', '</small>');
                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="section-testimonial__img">
                                <img src="<?php echo esc_url($image) ?>" alt="<?php echo esc_attr($name) ?>">
                                <div class="section-dashboard__playwrap">
                                    <div class="section-dashboard__playbtn">
                                        <a href="<?php echo esc_url($video_link) ?>" aria-label="video link" class="video-popup-link">
                                            <img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/images/shapes/play-btn1-1.png" alt="<?php echo bloginfo('name') ?>"></a>
                                    </div>
                                    <div class="waves wave-1"></div>
                                    <div class="waves wave-2"></div>
                                    <div class="waves wave-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
            <!-- nextmarketing-owl__carousel -->
        </div>
    </div>
<?php endif; ?>