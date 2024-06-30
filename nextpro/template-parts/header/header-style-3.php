<?php
global $nextpro;
if ($nextpro->meta['disable_header']) return;

$display_search_icon = get_theme_mod('enable_header_search', true);

$disable_topbar = get_theme_mod('disable_topbar', false);

$sticky_header = get_theme_mod('disable_sticky_header', false);
$sticky_class = $sticky_header ? 'section-header-sticky-off' : 'section-header';

$header_padding =  $disable_topbar ? '' : '';
if (!is_user_logged_in()) {
  $header_padding =  $disable_topbar ? '' : 'pt-4 ';
}
// offcanvas_menu
$offcanvas_position = get_theme_mod('offcanvas_position', 'offcanvas_right');
$left_class = $offcanvas_position == 'offcanvas_left' ? 'offcanvas-left' : '';

$enable_offcanvas_menu = get_theme_mod('enable_offcanvas_menu', false);
$custom_button = get_theme_mod('custom_nav_button', false);
$additional_class = ($enable_offcanvas_menu == false && $custom_button == false) ? 'py-0 py-lg-4' : '';

?>
<div class="header-wrapper position-absolute top-0 start-0 end-0 w-100 h-auto">
  <?php
  if ($disable_topbar == false) {
    get_template_part('template-parts/header/topbar');
  }
  ?>

  <?php get_template_part('template-parts/header/offcanvas'); ?>
  <header id="header" <?php nextpro_header_class('section-header section-header--five bg-transparent'); ?>>
    <div class="container-fluid position-relative">
      <div class="section-header__inner">
        <div class="section-header__row d-flex flex-wrap align-items-center">
          <?php if ($offcanvas_position == 'offcanvas_left') : ?>
            <div class="<?php echo esc_attr($left_class) ?> section-header__dskmenu section-header__dskmenu--two cross-icon d-none d-xl-flex" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
              <span class="section-header__dskmenu__bar"></span>
              <span class="section-header__dskmenu__bar"></span>
              <span class="section-header__dskmenu__bar"></span>
            </div>
          <?php endif; ?>
          <!-- Logo -->
          <div class="section-header__logo ps-0  <?php echo esc_attr($additional_class) ?>">
            <div class="section-header__logo-inner">
              <?php get_template_part('template-parts/header/site-branding'); ?>
            </div>
          </div>
          <!-- header__main-menu -->

          <!-- HEADER BLACK LOGO -->
          <?php
          // navbar
          wp_nav_menu([
            'container_class' => 'section-header__main-menu',
            'menu_class' => 'mobileMenu reset-ul d-flex align-items-center',
            'theme_location' => 'primary',
            'depth' => 3,
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'fallback_cb'    => 'Nextpro\Nav_Walker::fallback',
            'fallback_title'    => esc_attr__('Add Menu', 'nextpro'),
          ]);

          ?>
          <!-- header__right -->
          <?php if ($custom_button == true) : ?>
            <div class="section-header__right  d-xl-flex align-items-center ms-0">
              <?php if ($custom_button) : ?>
                <div class="section-header__right-bg bg-transparent">
                  <?php
                  $custom_button = get_theme_mod('custom_nav_button', false);
                  $button = '';
                  if ($custom_button) {
                    $button_args = [
                      'text' => get_theme_mod('nav_button_text', 'Let’s Talk'),
                      'link' => get_theme_mod('nav_button_link', '#'),
                      'class' => get_theme_mod('nav_button_style', 'header-btn-two next-marketing-btn dark-btn btn'),
                      'extra_class' => get_theme_mod('button_extra_class ', 'btn-extra'),
                      'target_link' => get_theme_mod('button_target_link', false),
                    ];
                    echo nextpro_custom_button($button_args, false);
                  }
                  ?>
                </div>
              <?php endif; ?>
              <!-- custom_nav_button -->

              <?php if ($offcanvas_position == 'offcanvas_right') : ?>
                <div class="section-header__dskmenu section-header__dskmenu--two cross-icon d-none d-xl-flex" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                  <span class="section-header__dskmenu__bar"></span>
                  <span class="section-header__dskmenu__bar"></span>
                  <span class="section-header__dskmenu__bar"></span>
                </div>
              <?php endif; ?>
              <!-- offcanvas -->
            </div>
          <?php endif; ?>
          <!-- header__right end-->
        </div>
      </div>
    </div>
  </header>

</div>
<?php if ($enable_offcanvas_menu) : ?>
  <div class="hamburger-bar menu-icon"><span></span><span></span><span></span></div>
<?php endif; ?>