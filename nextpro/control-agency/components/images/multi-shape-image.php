<?php
// image 
$image_src = control_agency_get_attachment_url($image_url, 'full', get_theme_file_uri('assets/images/resource/why-choose-img4-1.png'));
// image alt text
if (empty($image_alt_text)) {
    $image_alt_text =  get_bloginfo('name');
}

?>
<!-- Single image with multiple shape -->
<div class="section-why-choose__images position-relative">
    <div class="section-why-choose__shape top-shape position-absolute top-0 end-0 z-1 wow fadeInUp" data-wow-delay="300ms">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/why-choose-shape4-1.png" alt="<?php echo esc_attr($image_alt_text) ?>">
    </div>
    <div class="section-why-choose__shape bottom-shape position-absolute bottom-0 start-0 z-1 wow fadeInDown" data-wow-delay="400ms">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/why-choose-shape4-2.png" alt="<?php echo esc_attr($image_alt_text) ?>">
    </div>
    <div class="section-why-choose__shape dots-shape position-absolute bottom-0 z-0 wow fadeInLeft" data-wow-delay="400ms">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/why-choose-shape4-3.png" alt="<?php echo esc_attr($image_alt_text) ?>">
    </div>
    <div class="section-why-choose__shape bg-shape position-absolute start-0 z-1 d-none d-lg-block wow fadeInLeft" data-wow-delay="500ms"></div>

    <div class="section-why-choose__img wow fadeInLeft" data-wow-delay="200ms">
        <img class="img-1 grow-up" src="<?php echo esc_url($image_src) ?>" alt="<?php echo esc_attr($image_alt_text) ?>">
    </div>
</div>