<?php
$single_image_src = control_agency_get_attachment_url($single_image_single_shape, 'full', get_theme_file_uri('assets/images/resource/single-image-shapes.png'));
// image alt text
if (empty($single_image_alt_text)) {
    $single_image_alt_text =  get_bloginfo('name');
}
?>
<!-- single image with single shape ->1 -->
<div class="section-provide__right wow fadeInRight" data-wow-delay="200ms">
    <div class="section-provide__right__bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/shapes/provide-bg1-1.png');"></div>
    <div class="section-provide__right__flogowrap moving-element" data-value="6">
        <img class="img-1 grow-up" src="<?php echo esc_url($single_image_src) ?>" alt="<?php echo esc_attr($single_image_alt_text) ?>">
    </div>
</div>