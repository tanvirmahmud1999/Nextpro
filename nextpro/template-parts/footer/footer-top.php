<?php if (!get_theme_mod('display_footer_top', true)) return; ?>

<div class="footer__top">
    <div class="container">
        <div class="footer__bg">
            <div class="footer__innermx">
                <div class="row gutter-y-30">
                    <div class="footer-widget footer-widget__col1">
                        <div class="footer__logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-next.png" class="logo-dark" alt="next-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-light.png" class="logo-light" alt="next-logo-light">
                        </div>
                        <p class="footer__text">NextMarketing seamlessly integrates with a variety of industry-leading tools, ensuring a cohesive and efficient digital ecosystem for your business. </p>
                        <ul class="reset-ul footer__socialwrap">
                            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="footer-widget footer-widget__col2">
                        <h5 class="footer-widget__title">Company</h5>
                        <ul class="reset-ul footer-widget__links">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="career.html">Careers</a></li>
                            <li><a href="blog2.html">News</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <div class="footer-widget footer-widget__col3">
                        <h5 class="footer-widget__title">Resources</h5>
                        <ul class="reset-ul footer-widget__links">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Help Center</a></li>
                            <li><a href="contact.html">Support</a></li>
                            <li><a href="about.html">Tutorial</a></li>
                        </ul>
                    </div>
                    <div class="footer-widget footer-widget__col4">
                        <h5 class="footer-widget__title">Social</h5>
                        <ul class="reset-ul footer-widget__links">
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">LinkedIn</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ul>
                    </div>
                    <div class="footer-widget footer-widget__col5">
                        <h5 class="footer-widget__title">Other links</h5>
                        <ul class="reset-ul footer-widget__links">
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (empty(get_theme_mod('footer_logo')) &&  !has_nav_menu('footer_social')) return; ?>

<div class="footer-top-section py-30">
    <div class="container d-flex flex-wrap align-items-center justify-content-lg-between">
        <?php if (!empty(get_theme_mod('footer_logo'))) :  ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo align-items-center">
                <img src="<?php echo esc_url(nextpro_theme_mod_image_uri('footer_logo', 'assets/images/logo-white.png')); ?>" width="150" alt="<?php echo esc_attr(get_bloginfo('name', 'display')) ?>">
            </a>
        <?php endif; ?>
        <?php
        if (has_nav_menu('footer_social')) :
            // Social links
            echo '<div class="footer-top-social-icons d-flex">';
            printf('<span class="footer-social-nav-title fs-3">' . esc_attr_x('%s', 'Footer social nav title', 'nextpro') . '</span>', get_theme_mod('footer_social_nav_title', esc_attr__('Follow Us On:', 'nextpro')));
            wp_nav_menu(
                array(
                    'container'      => false,
                    'menu_class' => 'nav footer-social-nav',
                    'theme_location' => 'footer_social',
                    'depth'          => 1,
                    'fallback_cb'    => false,
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'fallback_cb'    => 'Nextpro\Nav_Walker::fallback',
                    'fallback_title'    => esc_attr__('Footer social menu', 'nextpro'),
                    'walker' => new Nextpro\Nav_Walker()
                )
            );
            echo '</div>';
        endif;
        ?>
    </div>
</div>