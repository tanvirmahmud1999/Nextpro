<?php

/**
 * Displays the footer widget area.
 *
 * @since nextpro 1.0
 */
if (nextpro_get_layout() == 'full') return;
extract(wp_parse_args($args, [
  'sidebar' => nextpro_get_sidebar(),
  'layout' => nextpro_get_layout(),
]));

if (is_active_sidebar($sidebar)) : ?>

  <div class="col-lg-4 sidebar-column">
    <aside id="sidebar" class="widget-area sidebar">
      <?php dynamic_sidebar($sidebar); ?>
    </aside>
  </div><!-- .widget-area -->

<?php endif; ?>