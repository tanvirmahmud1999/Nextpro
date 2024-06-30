<?php
// image
if (!empty($about_image) && !is_array($about_image)) {
    $about_image = explode(',', $about_image);
}
if (!empty($about_image[0])) {
    $about_image_src =  wp_get_attachment_image_url($about_image[0], 'full');
} else {
    $about_image_src = get_theme_file_uri('assets/images/resource/strategy4-1.png');
} // image alt text
if (empty($about_image_alt_text)) {
    $about_image_alt_text =  get_bloginfo('name');
}

?>
<!-- mid -->
<?php if (!empty($experience_text) || !empty($experience_time)) :

    $select_alignment = control_agency_parse_text($select_alignment);
    $select_alignment = ($select_alignment == 'experience-card-center') ? 'experience-card-center' : (($select_alignment == 'experience-card-top') ? 'experience-card-top' : 'none');
?>
    <div class="our-story__left position-relative wow fadeInUp our-story__left--three" data-wow-delay="200ms">
        <?php
        $flip_image = control_agency_parse_text($flip_image);
        $flip_image = $flip_image == true ? 'flip-image' : '';

        echo '<img class="img-1 grow-up ' . $flip_image . '" src="' . get_template_directory_uri() . '/assets/images/placeholder.svg" data-src="' . $about_image_src . '" alt="' . $about_image_alt_text . '">'; ?>

        <div class="experience-card <?php echo esc_attr($select_alignment) ?> d-flex align-items-center count-box wow fadeInLeft" data-wow-delay="300ms">
            <!-- <div> -->
            <?php $experience_time = control_agency_parse_text($experience_time); ?>
            <strong class="experience-card__year count-text" data-stop="<?php echo esc_attr($experience_time) ?>" data-speed="1500"></strong>
            <!-- </div> -->
            <?php
            $experience_text = control_agency_parse_text($experience_text);
            control_agency_content($experience_text, '<span class="experience-card__text">', '</span>');
            ?>
        </div>
    </div>
<?php endif; ?>