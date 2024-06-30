<?php
$image_url = get_theme_file_uri('assets/images/banner/hero-about1-1.jpg');

global $controlAgency;
if(!empty($controlAgency->archive_pages[get_post_type()])){
    $post_id = $controlAgency->archive_pages[get_post_type()];
    $image=get_post_meta($post_id,'banner_image',true);
    if (!empty($image)) {
        $image_url = control_agency_get_attachment_url($image, 'full', $image_url);
    }
}
?>
<section class="section-hero inner-page-hero hero-sec position-relative" data-bs-theme="light">
    <div class="inner-page-hero__bgimg position-absolute start-0 top-0 z-0 w-100 h-100" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
    <div class="container">
        <div class="row">
            <div class="inner-page-hero__inner-content d-flex flex-column align-items-center text-center position-relative z-1">
                <div class="inner-page-hero__titlewrap">
                    <h1 class="inner-page-hero__title"><?php control_agency_get_archive_title(); ?></h1>
                </div>
                <?php if (!is_front_page() && function_exists('bcn_display_list')) : ?>
                    <?php get_template_part('template-parts/header/breadcrumbs'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>