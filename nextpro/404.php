<?php
// Extracting and parsing arguments from customizer settings
$args = '';
extract(wp_parse_args($args, array(
	'error_title'       => get_theme_mod('error_title', 'Page Not Found'),
	'error_content'    => get_theme_mod('error_content', 'Oops! The page you are looking for might have been moved'),
	'error_button_text' => get_theme_mod('error_button_text', ' Back to Home page'),
	'error_image'       => get_theme_mod('error_image'),
	'error_headline'    => get_theme_mod('error_headline', '404'), // Add error_headline setting
)));
$error_button_text = !empty($error_button_text) ? $error_button_text : ' Back to Home page';
$error_headline = !empty($error_headline) ? $error_headline : '404';

$image = '';
if (!empty($error_image) && !is_wp_error($error_image)) {
	$image = wp_get_attachment_image_url($error_image, 'full');
} else {
	$image = get_theme_file_uri('assets/images/banner/hero-404.jpg');
}

wp_head();
?>
<section class="section-hero inner-page-hero__bgimg not-found position-relative m-0 d-flex align-items-center justify-content-center" style="background-image: url('<?php echo nextpro_return_data($image); ?>');">

	<div class="container">
		<div class="row">
			<div class="not-found__inner-content d-flex flex-column align-items-center position-relative z-1">
				<div class="not-found__titlewrap text-center">
					<h1 class="not-found__404 mb-0"><?php echo esc_html($error_headline); ?></h1> <!-- Use error_headline variable -->
					<?php if (!empty($error_title)) : ?>
						<h2 class="not-found__title s-56 w-700 color--dark"><?php echo wp_kses_post($error_title); ?></h2>
					<?php endif; ?>

					<?php if (!empty($error_content)) : ?>
						<p class="not-found__text"><?php echo wp_kses_post($error_content); ?></p>
					<?php endif; ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" class="next-marketing-btn dark-btn ms-auto me-auto">

						<?php echo nextpro_get_icon_svg('ui', 'btn_arrow_right', 17); ?>
						<?php echo esc_html($error_button_text); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>


<?php wp_footer(); ?>