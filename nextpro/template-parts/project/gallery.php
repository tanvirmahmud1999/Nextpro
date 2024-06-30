<?php
$gallery_images = get_post_meta(get_the_ID(), 'project_gallery');
if (empty($gallery_images)) return;
?>

<div class="row mt-50 g-3" data-masonry='{"percentPosition": true }'>
    <?php
    foreach ($gallery_images as $key => $attachment_id) :
        $image_size = $key % 3 == 2 ? 'nextpro-1000x600-cropped' : 'nextpro-700x500-cropped';
        $column_size = $key % 3 == 2 ? 'col-lg-12' : 'col-lg-6';
        $attachment_url = wp_get_attachment_url($attachment_id, $image_size);
        if (empty($attachment_url)) continue;
    ?>

        <div class="<?php echo esc_attr($column_size) ?>">
            <div class="project-image project-preview top-img r-10">

                <!-- Project Preview -->
                <div class="hover-overlay">
                    <img class="img-fluid" src="<?php echo esc_url($attachment_url); ?>" alt="<?php the_title(); ?>">
                    <div class="item-overlay"></div>
                </div>

                <!-- Project Link -->
                <div class="project-link ico-35 color--white">
                    <a class="image-link" href="<?php echo esc_url($attachment_url); ?>">
                        <span class="flaticon-visibility"></span>
                    </a>
                </div>

            </div>
        </div>

    <?php endforeach ?>


</div>