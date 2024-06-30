<?php
$popup = get_post_meta(get_the_ID(), 'popup', true);
extract(wp_parse_args($popup, [
    'popup_image'     => '',
    'popup_link'   => ''
]));
$attachment_url = wp_get_attachment_url($popup_image[0], 'nextpro-1000x600-cropped');
if (!empty($popup_link) ||  !empty($popup_image)) :
?>
    <div class="project-image project-inner-img video-preview mt-50">
        <!-- Play Icon -->
        <a class="video-popup2" href="<?php echo esc_url($popup_link) ?>">
            <div class="video-btn video-btn-xl bg--pink-400">
                <div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
            </div>
        </a>
        <!-- Preview Image -->
        <img class="img-fluid r-10" src="<?php echo esc_url($attachment_url) ?>" alt="<?php the_title() ?>">
    </div>
<?php endif  ?>