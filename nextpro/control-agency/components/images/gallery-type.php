<!-- 3 indivisual different shape image -->

<?php
// Gallery Top image alt text
if (empty($gallery_top_image_alt_text)) {
    $gallery_top_image_alt_text =  get_bloginfo('name');
}
// Horizontal image alt text
if (empty($gallery_horizontal_image_alt_text)) {
    $gallery_horizontal_image_alt_text =  get_bloginfo('name');
}
// Vertical image alt text
if (empty($gallery_vertical_image_alt_text)) {
    $gallery_vertical_image_alt_text =  get_bloginfo('name');
}

// Gallery Top image
$gallery_top_image_url = control_agency_get_attachment_url($gallery_top_image, 'full', get_theme_file_uri('assets/images/resource/strategy1-1.jpg'));
// Horizontal image 
$gallery_horizontal_image_url = control_agency_get_attachment_url($gallery_horizontal_image, 'full', get_theme_file_uri('assets/images/resource/strategy1-2.jpg'));
// Vertical image
$gallery_vertical_image_url = control_agency_get_attachment_url($gallery_vertical_image, 'full', get_theme_file_uri('assets/images/resource/strategy1-3.png'));

?>
<div class="section-strategy__imgwrap position-relative">
    <img class="section-strategy__dots" src="<?php echo get_template_directory_uri(); ?>/assets/images/resource/strategy1-4.png" alt="nextmarketing">

    <div class="section-strategy__img1 wow fadeInDown" data-wow-delay="90ms">
        <img class="img-1 grow-up" src="<?php echo esc_url($gallery_top_image_url) ?>" alt="<?php echo esc_attr($gallery_top_image_alt_text) ?>">
    </div>
    <div class="section-strategy__img2 wow fadeInRight" data-wow-delay="200ms">
        <img class="img-1 grow-up" src="<?php echo esc_url($gallery_horizontal_image_url) ?>" alt="<?php echo esc_attr($gallery_horizontal_image_alt_text) ?>">
    </div>
    <div class="section-strategy__img3 wow fadeInUp" data-wow-delay="100ms">
        <img class="img-1 grow-up" src="<?php echo esc_url($gallery_vertical_image_url) ?>" alt="<?php echo esc_attr($gallery_vertical_image_alt_text) ?>">
    </div>
</div>