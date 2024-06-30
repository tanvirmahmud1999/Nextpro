<a href="<?php echo esc_url(home_url('/')); ?>" class="logo-dark">
    <?php if (nextpro_get_logo_uri('custom_logo')) : ?>
        <picture class="logo-dark">
            <?php echo nextpro_get_custom_logo(); ?>
        </picture>
    <?php else : ?>
        <?php echo nextpro_get_custom_logo(); ?>
    <?php endif; ?>
</a>

<a href="<?php echo esc_url(home_url('/')); ?>" class="logo-light">
    <?php if (nextpro_get_logo_uri('custom_logo_white')) : ?>
        <picture class="logo-light">
            <?php echo nextpro_get_custom_logo('custom_logo_white'); ?>
        </picture>
    <?php else : ?>
        <?php echo nextpro_get_custom_logo('custom_logo_white', 'images/logo-light.png'); ?>
    <?php endif; ?>
</a>