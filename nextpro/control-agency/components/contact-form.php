<?php
$bg_switcher = control_agency_parse_text($bg_switcher);
?>
<section class="<?php echo esc_attr($bg_switcher == true ? 'section-form' : 'section-form mb-n170 position-relative z-2 section-form--four') ?>" data-bs-theme="light">
    <div class="container">
        <div class="section-form__bg">
            <?php
            $image_url = get_theme_file_uri('assets/images/background/services-bg1-1.png');
            if (!empty($background_image)) {
                $image_url = control_agency_get_attachment_url($background_image, 'full', $image_url);
            }
            // $image_url = control_agency_get_attachment_url($background_image, 'full', get_theme_file_uri('assets/images/background/services-bg1-1.png')); 
            if ($bg_switcher == true) : ?>
                <div class="section-form__bgimg" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
            <?php endif; ?>

            <div class="section-form__inner-mx">
                <div class="row">
                    <div class="section-form__content">
                        <div class="section-form__icon d-flex align-items-center justify-content-center wow fadeInUp" data-wow-delay="200ms">
                            <?php
                            $icon_style = control_agency_parse_text($icon_style);
                            if ($icon_style == 'image_icon') :  ?>
                                <img src="<?php echo esc_url($image_icon) ?>" alt="<?php echo bloginfo('name') ?>">
                            <?php else : ?>
                                <?php if (!empty($icon)) {
                                    echo nextpro_get_icon_svg('ui', $icon, 32);
                                } else {
                                    echo nextpro_get_icon_svg('ui', 'send-two', 32);
                                }  ?>
                            <?php endif; ?>
                        </div>
                        <div class="sec-title wow fadeInUp" data-wow-delay="200ms">
                            <?php
                            if (!empty($title)) {
                                $title = control_agency_parse_text($title);
                                control_agency_content($title, '<h2 class="sec-title__title">', '</h2>');
                            }
                            if (!empty($desc)) {
                                $desc = control_agency_parse_text($desc);
                                control_agency_content($desc, ' <p class="sec-title__text">', '</p>');
                            }
                            ?>
                        </div>
                    </div>
                    <div class="section-form__form wow fadeInUp" data-wow-delay="200ms">
                        <?php
                        $form_style = control_agency_parse_text($form_style);
                        if ($form_style == 'form_id') {
                            echo do_shortcode('[contact-form-7 title="' . esc_attr($form_id) . '"]');
                        } elseif ($form_style == 'shortcode') {
                            echo do_shortcode($shortcode);
                        } else {
                            echo "Not Installed any contact form Plugin";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 
 <section class="section-form mb-n170 position-relative z-2 section-form--four">
     <div class="container">
         <div class="section-form__bg">
             <div class="section-form__inner-mx">
                 <div class="row">
                     <div class="section-form__content">
                         <div class="section-form__icon d-flex align-items-center justify-content-center wow fadeInUp" data-wow-delay="200ms">
                             <img src="assets/images/shapes/cro-icon.png" alt="nextmarketing">
                         </div>
                         <div class="sec-title wow fadeInUp" data-wow-delay="200ms">
                             <h2 class="sec-title__title">Request a free Audit of your website</h2>
                             <p class="sec-title__text">Find quick answers to common queries in our FAQ section, ensuring a clear understanding of your digital journey with us.</p>
                         </div>
                     </div>

                     <div class="section-form__form wow fadeInUp" data-wow-delay="200ms">
                         <form id="contactForm">
                             <div class="form-row d-flex flex-wrap">
                                 <div class="form-group col-sm-6">
                                     <input type="text" name="InputName" class="form-control" placeholder="Your Name" required>
                                 </div>

                                 <div class="form-group col-sm-6">
                                     <input type="email" name="InputEmail" class="form-control" placeholder="Your Email" required>
                                 </div>
                             </div>

                             <div class="form-row d-flex flex-wrap">
                                 <div class="form-group col-sm-6">
                                     <input type="text" name="InputName" class="form-control" placeholder="Your website" required>
                                 </div>

                                 <div class="form-group col-sm-6">
                                     <div class="custom-select">
                                         <p class="custom_selected form-control"> Select a Service</p>
                                         <div class="custom_select_opt_wrap">
                                             <p class="custom_select_opt form-control" data-select="">Select a Service</p>
                                             <p class="custom_select_opt form-control">Search Engine Optimization</p>
                                             <p class="custom_select_opt form-control">Social Media Marketing</p>
                                             <p class="custom_select_opt form-control">Content Writing</p>
                                             <p class="custom_select_opt form-control">Affiliate Marketing</p>
                                             <p class="custom_select_opt form-control">Email Marketing</p>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <div class="form-row">
                                 <div class="form-group">
                                     <textarea class="form-control text-area" placeholder="Message" required></textarea>
                                 </div>
                             </div>

                             <button type="submit" class="next-marketing-btn dark-btn dark-btn form-btn btn">Send request</button>

                             <div class="response py-3"></div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section> -->