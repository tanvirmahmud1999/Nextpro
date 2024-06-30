<?php
// $mc_form_args = array(
//     'mailchimp_form_name_placeholder' => $name_placeholder,
//     'mailchimp_form_email_placeholder' => $email_placeholder,
//     'mailchimp_form_button_text' => $button_text
// );

//if (!empty($title) || !empty($desc)) :
?>

<section class="newsletter-one wow fadeInUp" data-wow-delay="200ms" data-bs-theme="light">
    <div class="container">
        <div class="row">
            <div class="newsletter-one__wrap">
                <div class="newsletter-one__bgimg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/background/services-bg1-1.png');"></div>
                <div class="newsletter-one__bg d-flex justify-content-between align-items-center">
                    <?php
                    if (!empty($title)) {
                        $title = control_agency_parse_text($title);
                        control_agency_content($title, ' <h2 class="newsletter-one__title">', '</h2>');
                    }
                    ?>
                    <div class="newsletter-one__form">
                        <?php if (function_exists('control_email_subscriber_hero_form')) : ?>
                            <?php echo control_email_subscriber_hero_form($args) ?>
                        <?php endif ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./newsletter-one end -->