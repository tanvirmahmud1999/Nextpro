<section class="section-portfolio-single">
    <div class="container">
        <div class="row gx-5 gutter-y-40 justify-content-center">
            <div class="sec-title">
                <?php
                $title = str_replace(['[post_title]', '[project_title]'], get_the_title(), $title);
                control_agency_content($title, '<h2 class="sec-title__title text-center">', '</h2>');
                ?>
            </div>
            <div class="col-lg-8">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="section-portfolio-single__feature-img">
                        <?php the_post_thumbnail('nextpro-872x451-cropped') ?>
                    </div>
                <?php endif; ?>
                <?php the_content(); ?>
            </div>
            <?php if (!empty($overviews[0]['title'])) : ?>
                <div class="col-lg-4">
                    <aside class="section-portfolio-single__sidebar sticky-elements">
                        <?php
                        foreach ($overviews as $value) {
                            if (empty($value['title']) || empty($value['desc'])) continue;
                            printf(
                                '<div class="section-portfolio-single__sidebar-item"><h5 class="mb-1">%s</h5><p class="mb-0">%s</p></div>',
                                $value['title'],
                                $value['desc']
                            );
                        }
                        ?>
                    </aside>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>