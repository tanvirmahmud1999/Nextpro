<?php if(!has_post_thumbnail()) return; ?>
<div class="team-seo-expert__menimg position-relative">
    <div class="team-seo-expert__shape top-shape position-absolute top-0 end-0 z-1 wow fadeInUp" data-wow-delay="300ms">
        <img src="<?php echo get_theme_file_uri('assets/images/shapes/why-choose-shape4-1.png') ?>" alt="<?php the_title(); ?>">
    </div>
    <div class="team-seo-expert__shape bottom-shape position-absolute bottom-0 start-0 z-1 wow fadeInDown" data-wow-delay="400ms">
        <img src="<?php echo get_theme_file_uri('assets/images/shapes/why-choose-shape4-2.png') ?>" alt="<?php the_title(); ?>">
    </div>
    <div class="team-seo-expert__shape dots-shape position-absolute bottom-0 z-0 wow fadeInLeft" data-wow-delay="500ms">
        <img src="<?php echo get_theme_file_uri('assets/images/shapes/why-choose-shape4-3.png') ?>" alt="<?php the_title(); ?>">
    </div>
    <div class="team-seo-expert__img position-relative z-3 wow fadeInLeft h-100" data-wow-delay="200ms" >
        <?php the_post_thumbnail('nextpro-410x470-cropped', ['class' => 'rounded-5', 'alt' => get_the_title()]); ?>
    </div>
</div>