<div class="postbox-sidebar">
    <div class="postbox-header-sidebar">
        <h2>Support & Licensing</h2>
    </div>
    <div class="inside">
        <div class="inside-sidebar">
            <p>Welcome to the settings page for <strong>NextPro</strong>!</p>
            <ul>
                <li><label><input type="text" name="license_key" placeholder="Enter Theme License Key"></li>
            </ul>

            <?php
            $my_theme  = wp_get_theme('nextpro');
            if ($my_theme->exists() && !is_wp_error($my_theme)) :
            ?>
                <ul>
                    <li>
                        <img src="<?php echo get_theme_file_uri('screenshot.png') ?>" alt="NextPro" />
                    </li>
                    <li>
                        Name: <?php echo $my_theme->get('Name') ?>
                    </li>
                    <li>
                        Author: <a href="<?php echo $my_theme->get('AuthorURI') ?>"><?php echo $my_theme->get('Author') ?></a>
                    </li>
                    <li>
                        Version: <?php echo $my_theme->get('Version') ?>
                    </li>
                </ul>
                <a href="<?php echo $my_theme->get('ThemeURI') ?>" target="_blank" class="button">Live Demo</a>
                <a href="<?php echo $my_theme->get('ThemeURI') ?>/documentation" target="_blank" class="button button-primary">Documentation</a>
            <?php endif; ?>

        </div>
    </div>
</div>