<?php
if ($template_file == 'components/call-to-action.php') {

    if (!empty($title) || !empty($desc)) :
?>
        <section class="newsletter-one newsletter-one--two wow fadeInUp" data-wow-delay="200ms">
            <div class="container">
                <div class="row">
                    <div class="newsletter-one__wrap">
                        <div class="newsletter-one__bg d-flex justify-content-between align-items-center">
                            <div class="newsletter-one__mx d-flex flex-wrap flex-column">
                                <?php
                                if (!empty($title)) {
                                    $title = control_agency_parse_text($title);
                                    control_agency_content($title, '<h2 class="newsletter-one__title">', '</h2>');
                                }
                                if (!empty($desc)) {
                                    $desc = control_agency_parse_text($desc);
                                    control_agency_content($desc, '<p class="newsletter-one__text">', '</p>');
                                }
                                ?>
                                <div class="newsletter-one__business-arrow d-none d-lg-flex">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/shapes/business-consultant-cta-arrow.png" alt="<?php bloginfo('name') ?>">
                                </div>
                            </div>
                            <?php
                            if (!empty($buttons)) {
                                echo control_agency_get_btn($buttons);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php endif;
} else {
    include('components/call-to-action-style2.php');
}

?>