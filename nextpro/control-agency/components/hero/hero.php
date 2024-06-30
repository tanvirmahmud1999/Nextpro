 <!-- <div class="section-hero-two"> -->
 <?php
    $title = control_agency_parse_text($title);
    $title = !empty($title) ? $title : get_bloginfo('name');
    ?>
 <section class="section-hero">
     <div class="container">
         <div class="section-hero__row d-flex flex-wrap">
             <div class=" section-hero__leftw">
                 <div class="section-hero__left" data-wow-delay="200ms">
                     <?php if (!empty($name)) : ?>
                         <div class="section-hero__tagline">
                             <?php
                                $name = control_agency_parse_text($name);
                                control_agency_content($name, '<span class="section-hero__tagtext">', '</span>');
                                ?>
                             <div class="section-hero__tagimg">
                                 <img src="<?php echo esc_url($name_tag) ?>" alt="<?php bloginfo('name') ?>">
                             </div>
                         </div>
                     <?php endif; ?>

                     <?php
                        if (!empty($title)) {
                            $title = control_agency_parse_text($title);
                            control_agency_content($title, '<h1 class="section-hero__title">', '</h1>');
                        }
                        if (!empty($desc)) {
                            $desc = control_agency_parse_text($desc);
                            control_agency_content($desc, '<p class="section-hero__text">', '</p>');
                        }
                        ?>
                     <div class="section-hero__joinman-wrap d-flex align-items-center">
                         <div class="section-hero__joinman d-flex align-items-center">

                             <?php
                                foreach ($client_list as $item) {
                                    if (empty($item['image'])) continue;
                                    $title = !empty($item['title']) ? $item['title'] : get_bloginfo('name');
                                    $format = '<div class="section-hero__mane-img"><img src="%1$s" alt="%2$s"></div>';

                                    printf($format, esc_url($item['image']), esc_attr($title));
                                }
                                if (!empty($client_users)) {
                                    $client_users = control_agency_parse_text($client_users);
                                    control_agency_content($client_users, '<div class="section-hero__mane-img totla-join d-flex align-items-center justify-content-center"><span class="section-hero__totla-jointext">', '</span></div>');
                                }
                                ?>
                         </div>
                         <?php
                            if (!empty($quote_label)) {
                                $quote_label = control_agency_parse_text($quote_label);
                                control_agency_content($quote_label, '<strong class="section-hero__join-thousand">', '</strong>');
                            }
                            ?>
                     </div>

                     <div class="section-hero__getstarted">
                         <form class="contact-form d-flex align-items-center flex-wrap">
                             <div class="form-group p-0 m-0">
                                 <input type="email" class="form-control" placeholder="e.g. mail@example.com" required>
                                 <div class="section-hero__field-bd-effect"></div>
                             </div>
                             <div class="section-hero__getstarted-btnwrap">
                                 <button type="submit" class="section-hero__getstarted-btn next-marketing-btn btn dark-btn dark-btn-bg">Get
                                     started Free</button>
                             </div>
                         </form>
                         <p class="section-hero__info-text">
                             <img class="section-hero__info-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/info-icon1-1.svg" alt="infoicon">
                             By submitting your email, you agree to our
                             <a href="#"> Terms of Service</a> and <a href="#"> Privacy Policy</a>.
                         </p>
                     </div>
                 </div>
             </div>
             <div class="section-hero__right" data-wow-delay="200ms">
                 <?php
                    $image = $hero_thumbnail_image ?? get_theme_file_uri('assets/images/banner/wondered1-1.png');
                    ?>
                 <div class="section-hero__right__main-img"> <img src="<?php echo esc_url($image) ?>" alt="<?php echo esc_attr($title) ?>"></div>
                 <div class="section-hero__innerright">
                     <div class="section-hero__right__credit-balance moving-element position-absolute" data-value="-5">
                         <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/balance-graph1-1.png" alt="balance">

                         <div class="section-hero__right__telegram position-absolute">
                             <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/telegram1-1.png" alt="telegram1">
                         </div>
                     </div>

                     <div class="section-hero__right__chart-balance moving-element position-absolute" data-value="4">
                         <img class="" src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/chart-graph1-1.png" alt="chart">

                         <div class="section-hero__right__picture position-absolute">
                             <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/picture1-1.png" alt="picture1">
                         </div>
                     </div>

                     <div class="section-hero__right__mailIcon d-lg-block d-none moving-element position-absolute" data-value="-3">
                         <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/mail1-1.png" alt="mail1">
                     </div>

                     <div class="section-hero__right__square1 d-lg-block d-none position-absolute a"></div>
                     <div class="section-hero__right__square2 d-lg-block d-none position-absolute b"></div>
                     <div class="section-hero__right__square3 d-lg-block d-none position-absolute c"></div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- ./section-hero end -->