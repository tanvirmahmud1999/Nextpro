<!-- 3 images 2 muving -->
<?php
// Top
// image alt text
if (empty($top_image_alt_text)) {
    $top_image_alt_text =  get_bloginfo('name');
}
// Middle
// image alt text
if (empty($middle_image_alt_text)) {
    $middle_image_alt_text =  get_bloginfo('name');
}
// Bottomm
// image alt text
if (empty($bottom_image_alt_text)) {
    $bottom_image_alt_text =  get_bloginfo('name');
}

// Top 
$process_top_image_url = control_agency_get_attachment_url($process_top_image, 'full', get_theme_file_uri('assets/images/shapes/rocket1-1.png'));
// MIddle  
$process_middle_image_url = control_agency_get_attachment_url($process_middle_image, 'full', get_theme_file_uri('assets/images/shapes/process1-2.png'));
// Bottom 
$process_bottom_image_url = control_agency_get_attachment_url($process_bottom_image, 'full', get_theme_file_uri('assets/images/shapes/process1-1.png'));

?>
<div class="section-process__image position-relative wow fadeInLeft" data-wow-delay="200ms">
    <div class="section-process__rocketimg">
        <img class="img-1 grow-up" src="<?php echo esc_url($process_top_image_url) ?>" alt="<?php echo esc_attr($top_image_alt_text) ?>">
    </div>
    <div class="section-process__laptop">
        <img class="img-1 grow-up" src="<?php echo esc_url($process_middle_image_url) ?>" alt="<?php echo esc_attr($middle_image_alt_text) ?>">
    </div>
    <div class="section-process__storage">
        <img class="img-1 grow-up" src="<?php echo esc_url($process_bottom_image_url) ?>" alt="<?php echo esc_attr($bottom_image_alt_text) ?>">
    </div>
</div>