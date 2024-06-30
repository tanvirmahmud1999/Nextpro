<?php
// Sample data for demonstration, replace this with actual data source. 
if (!empty($popup_background_image) && !is_array($popup_background_image)) {
    $popup_background_image = explode(',', $popup_background_image);
}

// Check if the first element of the array is not empty and get the image URL.
if (!empty($popup_background_image[0])) {
    $image_src = wp_get_attachment_image_url($popup_background_image[0], 'full');
} else {
    // Fallback to the default image URL.
    $image_src = get_theme_file_uri('assets/images/banner/hero2-1.jpg');
}
$image_height_switcher = false;
?>

<div class="section-hero-two__image">
    <div class="<?php echo esc_attr($image_height_switcher == true ? 'section-hero-three__mainimg' : 'section-hero-two__mainimg') ?>">
        <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
    </div>
    <div class="section-dashboard__playwrap">
        <div class="section-dashboard__playbtn">
            <a href="<?php echo esc_url($popup_link) ?>" class="video-popup-link"><img src="<?php echo get_theme_file_uri('assets/images/shapes/play-btn1-1.png') ?>" alt="<?php esc_attr__('Play video', 'nextpro') ?>"></a>
        </div>
        <div class="waves wave-1"></div>
        <div class="waves wave-2"></div>
        <div class="waves wave-3"></div>
    </div>

    <?php if (!empty($clients) && $clients_switcher == true) : ?>
        <div class="section-hero-two__comylogo d-flex align-items-center justify-content-between <?php echo esc_attr($shadow_switcher == true ? '' : 'shadow-none'); ?> " data-bs-theme="light">
            <div class="nextmarketing-owl__carousel owl-carousel" id="rating-owl" data-owl-options='{
                    "loop": false,
                    "animateOut": "fadeOut",
                    "animateIn": "fadeIn",
                    "items": 4,
                    "center" : false,
                    "autoplay": false,
                    "autoplayTimeout": 7000,
                    "smartSpeed": 1000,
                    "nav": false,
                    "navText": "",
                    "dots": false,
                    "margin": 0,
                    "responsive": {
                        "0": {
                            "items": 2
                        },
                        "767": {
                            "items": 3
                        },
                        "1200":{
                            "items": 4
                        }
                    }
                }'>
                <?php
                foreach ($clients as $client) {
                    if (empty($client['image'])) continue;
                    $client_title = !empty($client['title']) ? $client['title'] : get_bloginfo('name');
                    $client_link = !empty($client['link']) ? $client['link'] : '';

                    if (!empty($client_link)) {
                        $format = '<div class="section-hero-three__logcol"><a target="_blank" href="%3$s"><img src="%1$s" alt="%2$s"></a></div>';
                    } else {
                        $format = '<div class="section-hero-three__logcol"><img src="%1$s" alt="%2$s"></div>';
                    }
                    printf($format, esc_url($client['image']), esc_attr($client_title), esc_url($client_link));
                }
                ?>
            </div>
        </div>
    <?php endif; ?>
</div>