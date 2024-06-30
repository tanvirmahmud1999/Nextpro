<!-- PROJECT #35 -->

<div id="post-<?php the_ID(); ?>" class="project-details">
    <!-- Title -->
    <h5 class="portfolio-title s-24"><?php the_title() ?></h5>
    <!-- Image -->
    <div class="project-preview r-10">
        <?php if (has_post_thumbnail()) : ?>
            <!-- Project Preview -->
            <div class="hover-overlay">
                <?php
                printf('<img src="%s" alt="%s" class="img-fluid">', get_the_post_thumbnail_url(get_the_ID(), 'nextpro-700x500-cropped'), get_the_title());
                ?>
                <div class="item-overlay"></div>
            </div>
        <?php endif ?>
        <!-- Project Link -->
        <div class="project-link ico-35 color--white">
            <a href="<?php the_permalink() ?>"><span class="flaticon-visibility"></span></a>
        </div>
    </div>
</div>