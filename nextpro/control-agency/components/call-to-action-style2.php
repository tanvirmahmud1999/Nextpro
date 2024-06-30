<?php
if (!empty($title) || !empty($desc)) :
?>

    <div class="section-services__left wow fadeInUp row" data-wow-delay="200ms">
        <div class="section-services__bg" data-bs-theme="light">
            <?php

            $image_url = get_theme_file_uri('assets/images/background/services-bg1-1.png');
            if (!empty($background_image)) {
                $image_url = control_agency_get_attachment_url($background_image, 'full', $image_url);
            }

            ?>
            <div class="section-services__bgimg" style="background-image: url('<?php echo esc_url($image_url); ?>'); "></div>
            <div class="section-services__mx">
                <?php
                if (!empty($title)) {
                    $title = control_agency_parse_text($title);
                    control_agency_content($title, '<h2 class="section-services__title">', '</h2>');
                }
                if (!empty($desc)) {
                    $desc = control_agency_parse_text($desc);
                    control_agency_content($desc, '<p class="section-services__text mb-2">', '</p>');
                }
                ?>
                <?php
                if (!empty($buttons)) {
                    echo control_agency_get_btn($buttons);
                }
                ?>
            </div>
        </div>
    </div>
<?php endif;
