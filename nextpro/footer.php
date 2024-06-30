<?php

/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Nextpro
 * @since Nextpro 1.0
 */

$disable_footer = false;
if (is_page()) {
	$disable_footer = get_post_meta(get_the_ID(), 'disable_footer', true);
}
?>
</div>

<?php if (!$disable_footer) : ?>
	<footer <?php nextpro_footer_class(); ?>>
		<?php //get_template_part('template-parts/footer/site-footer'); 
		?>
		<?php //get_template_part('template-parts/footer/footer-top'); 
		?>
		<?php get_template_part('template-parts/footer/copyright-bar'); ?>
		<div class="parallax"></div>
	</footer>
	</div>
	<!-- /.page end -->
<?php endif ?>



<?php wp_footer(); ?>

</body>


<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
	<symbol id="location" viewBox="0 0 18 20">
		<g id="location-pin">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 8.50051C11.5 7.11924 10.3808 6 9.00051 6C7.61924 6 6.5 7.11924 6.5 8.50051C6.5 9.88076 7.61924 11 9.00051 11C10.3808 11 11.5 9.88076 11.5 8.50051Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			<path fill-rule="evenodd" clip-rule="evenodd" d="M8.99951 19C7.80104 19 1.5 13.8984 1.5 8.56329C1.5 4.38664 4.8571 1 8.99951 1C13.1419 1 16.5 4.38664 16.5 8.56329C16.5 13.8984 10.198 19 8.99951 19Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		</g>
	</symbol>

	<symbol id="message" viewBox="0 0 22 20">
		<path d="M16.9026 6.85107L12.4593 10.4641C11.6198 11.1301 10.4387 11.1301 9.59919 10.4641L5.11841 6.85107" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		<path fill-rule="evenodd" clip-rule="evenodd" d="M15.9089 19C18.9502 19.0084 21 16.5095 21 13.4384V6.57001C21 3.49883 18.9502 1 15.9089 1H6.09114C3.04979 1 1 3.49883 1 6.57001V13.4384C1 16.5095 3.04979 19.0084 6.09114 19H15.9089Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
	</symbol>

	<symbol id="call-two" viewBox="0 0 22 22">
		<path d="M13.353 1.5C17.054 1.911 19.978 4.831 20.393 8.532" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		<path d="M13.353 5.04297C15.124 5.38697 16.508 6.77197 16.853 8.54297" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		<path fill-rule="evenodd" clip-rule="evenodd" d="M10.0315 11.4724C14.0205 15.4604 14.9254 10.8467 17.4653 13.3848C19.9138 15.8328 21.3222 16.3232 18.2188 19.4247C17.8302 19.737 15.3613 23.4943 6.68447 14.8197C-1.99341 6.144 1.76157 3.67244 2.07394 3.28395C5.18377 0.173846 5.66682 1.58938 8.11539 4.03733C10.6541 6.5765 6.04254 7.48441 10.0315 11.4724Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
	</symbol>
</svg>

</html>





<!-- mobile menu -->
<div class="mobilenav-container">
	<div class="mobilenav-container__overlay menu-icon"></div>
	<div class="mobilenav-container__content">
		<div class="menu-icon"><i class="fa-solid fa-xmark"></i></div>
		<div class="logo-box">
			<a href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-light.png" alt="nextmarketing"></a>
		</div>
		<div id="mb_menu_holder"></div>

		<div class="header-info-sidebar__feature">
			<ul class="reset-ul">
				<li>
					<a href="#">
						<div class="header-info-sidebar__icon">
							<svg width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M11.7379 1.26181H5.08493C3.00493 1.25381 1.29993 2.91181 1.25093 4.99081V15.7038C1.20493 17.8168 2.87993 19.5678 4.99293 19.6148C5.02393 19.6148 5.05393 19.6158 5.08493 19.6148H13.0739C15.1679 19.5298 16.8179 17.7998 16.8029 15.7038V6.53781L11.7379 1.26181Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M11.4756 1.25V4.159C11.4756 5.579 12.6236 6.73 14.0436 6.734H16.7986" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M11.2887 13.8585H5.88867" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M9.2437 10.106H5.8877" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div>

						<span>Knowledge base</span>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="header-info-sidebar__icon">
							<svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M18.0714 18.5699C15.0152 21.6263 10.4898 22.2867 6.78642 20.574C6.23971 20.3539 5.79148 20.176 5.36537 20.176C4.17849 20.183 2.70117 21.3339 1.93336 20.567C1.16555 19.7991 2.31726 18.3206 2.31726 17.1266C2.31726 16.7004 2.14642 16.2602 1.92632 15.7124C0.212831 12.0096 0.874109 7.48269 3.93026 4.42721C7.8316 0.524432 14.17 0.524432 18.0714 4.4262C21.9797 8.33501 21.9727 14.6681 18.0714 18.5699Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M14.9398 11.913H14.9488" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M10.9301 11.913H10.9391" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M6.92128 11.913H6.93028" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div>

						<span>Get Support</span>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="header-info-sidebar__icon">
							<svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M1 5C1 2.37479 1.02811 1.5 4.5 1.5C7.97189 1.5 8 2.37479 8 5C8 7.62521 8.01107 8.5 4.5 8.5C0.988927 8.5 1 7.62521 1 5Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path fill-rule="evenodd" clip-rule="evenodd" d="M12 5C12 2.37479 12.0281 1.5 15.5 1.5C18.9719 1.5 19 2.37479 19 5C19 7.62521 19.0111 8.5 15.5 8.5C11.9889 8.5 12 7.62521 12 5Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path fill-rule="evenodd" clip-rule="evenodd" d="M1 16C1 13.3748 1.02811 12.5 4.5 12.5C7.97189 12.5 8 13.3748 8 16C8 18.6252 8.01107 19.5 4.5 19.5C0.988927 19.5 1 18.6252 1 16Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path fill-rule="evenodd" clip-rule="evenodd" d="M12 16C12 13.3748 12.0281 12.5 15.5 12.5C18.9719 12.5 19 13.3748 19 16C19 18.6252 19.0111 19.5 15.5 19.5C11.9889 19.5 12 18.6252 12 16Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div>

						<span>View Change logo-box</span>
					</a>
					<small class="version-control">v1.0</small>
				</li>
				<li>
					<a href="#">
						<div class="header-info-sidebar__icon">
							<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M9.492 1.289H5.753C2.678 1.289 0.75 3.466 0.75 6.548V14.862C0.75 17.944 2.669 20.121 5.753 20.121H14.577C17.662 20.121 19.581 17.944 19.581 14.862V10.834" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path fill-rule="evenodd" clip-rule="evenodd" d="M6.82763 9.42093L14.3006 1.94793C15.2316 1.01793 16.7406 1.01793 17.6716 1.94793L18.8886 3.16493C19.8196 4.09593 19.8196 5.60593 18.8886 6.53593L11.3796 14.0449C10.9726 14.4519 10.4206 14.6809 9.84463 14.6809H6.09863L6.19263 10.9009C6.20663 10.3449 6.43363 9.81493 6.82763 9.42093Z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M13.165 3.10254L17.731 7.66854" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div>

						<span>Suggest new features</span>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="header-info-sidebar__icon">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0.75 0.749878L2.83 1.10988L3.793 12.5829C3.87 13.5199 4.653 14.2389 5.593 14.2359H16.502C17.399 14.2379 18.16 13.5779 18.287 12.6899L19.236 6.13188C19.342 5.39888 18.833 4.71888 18.101 4.61288C18.037 4.60388 3.164 4.59888 3.164 4.59888" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M12.125 8.2948H14.898" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path fill-rule="evenodd" clip-rule="evenodd" d="M5.15435 17.7025C5.45535 17.7025 5.69835 17.9465 5.69835 18.2465C5.69835 18.5475 5.45535 18.7915 5.15435 18.7915C4.85335 18.7915 4.61035 18.5475 4.61035 18.2465C4.61035 17.9465 4.85335 17.7025 5.15435 17.7025Z" fill="#fff" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path fill-rule="evenodd" clip-rule="evenodd" d="M16.4346 17.7025C16.7356 17.7025 16.9796 17.9465 16.9796 18.2465C16.9796 18.5475 16.7356 18.7915 16.4346 18.7915C16.1336 18.7915 15.8906 18.5475 15.8906 18.2465C15.8906 17.9465 16.1336 17.7025 16.4346 17.7025Z" fill="#fff" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div>

						<span> Purchase Next Agency</span>
					</a>
				</li>
			</ul>
		</div>

		<ul class="reset-ul mobilenav-container__contact">
			<li>
				<span class="topbar-two__icon"><i class="fa-regular fa-envelope"></i></span>
				<a href="mailto:contact@nextpro.com">contact@nextpro.com</a>
			</li>
			<li>
				<span class="topbar-two__icon"><i class="fa-solid fa-phone-flip"></i></span>
				<a href="mailto:+17186385000">+1 718-638-5000</a>
			</li>
		</ul>

		<ul class="reset-ul mobilenav-container__socialwrap">
			<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
			<li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
		</ul>
	</div>
</div>

<div class="theme-mode-sticky position-fixed d-flex flex-column align-items-center">
	<div class="theme-mode-sticky-bg btn-radius d-flex flex-column">
		<div class="topbar-two__thememodewrap topbar-two__thememodline d-flex align-items-center">
			<div class="topbar-two__modeicon d-flex align-items-center justify-content-center">
				<div class="light-icon d-flex align-items-center justify-content-center" title="Color Change light">
					<i class="fa-regular fa-sun-bright"></i>
				</div>
				<div class="dark-icon d-flex align-items-center justify-content-center" title="Color Change dark">
					<i class="fa-regular fa-moon-stars"></i>
				</div>
			</div>

			<div class="topbar-two__themeicon-wrap btn-radius">
				<div class="topbar-two__theme-icon themeModeBtn light-icon" data-id="light" title="Color Change Light">
					<i class="fa-regular fa-sun-bright"></i>
				</div>
				<div class="topbar-two__theme-icon themeModeBtn dark-icon" data-id="dark" title="Color Change dark">
					<i class="fa-regular fa-moon-stars"></i>
				</div>

				<div class="topbar-two__themetext-wrap overflow-hidden d-flex align-items-center">
					<span class="topbar-two__theme-text light-text">Light</span>
					<span class="topbar-two__theme-text dark-text">Dark</span>
				</div>
			</div>
		</div>

		<!-- <div class="topbar-two__themelngwrap topbar-two__thememodline position-relative" title="Language">
			<div class="topbar-two__themelng lng-selected d-flex align-items-center">
				<i class="fa-light fa-globe"></i>
			</div>

			<div class="topbar-two__themelng-opt position-absolute w-100 h-auto bottom-0">
				<div class="topbar-two__themelng lng-opt d-flex align-items-center">
					<img src="<?php //echo get_template_directory_uri(); 
								?>/assets/images/shapes/flag-us.png" alt="nextmarketing">
					<span class="topbar-two__lng-text">en</span>
				</div>
				<div class="topbar-two__themelng lng-opt d-flex align-items-center">
					<img src="<?php //echo get_template_directory_uri(); 
								?>/assets/images/shapes/flag-fr.png" alt="nextmarketing">
					<span class="topbar-two__lng-text">fr</span>
				</div>
				<div class="topbar-two__themelng lng-opt d-flex align-items-center">
					<img src="<?php //echo get_template_directory_uri(); 
								?>/assets/images/shapes/flag-de.png" alt="nextmarketing">
					<span class="topbar-two__lng-text">de</span>
				</div>
				<div class="topbar-two__themelng lng-opt d-flex align-items-center">
					<img src="<?php //echo get_template_directory_uri(); 
								?>/assets/images/shapes/flag-ar.png" alt="nextmarketing">
					<span class="topbar-two__lng-text">ar</span>
				</div>
			</div>
		</div> -->

		<!-- Quick Message -->
		<!-- <div class="quick-message position-absolute bottom-0 z-3">
			<span class="msg-cross position-absolute"><i class="fa-solid fa-xmark"></i></span>
			<div class="quick-message__title white-color">
				<h4 class="mb-2">Connect for more information</h4>
				<p class="mb-3">I'm here, ready to answer any types of questions</p>
			</div>

			<div class="quick-message__form-wrap">
				<ul class="reset-ul topbar-two__infolist mb-3">
					<li>
						<a href="mailto:contact@nextpro.com">contact@nextpro.com</a>
					</li>
					<li>
						<strong>Call us: </strong>
						<a href="tel:+17186385000">+1 718-638-5000</a>
					</li>
				</ul>

				<ul class="reset-ul footer__socialwrap">
					<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div> -->

		<!-- <div class="question-icon" title="Help">
			<span class="question"><i class="fa-solid fa-question"></i></span>
			<span class="cross"><i class="fa-solid fa-xmark"></i></span>
		</div> -->

	</div>

	<?php if (get_theme_mod('display_back_to_top', true)) : ?>
		<div class="progress-circle-container position-fixed">
			<svg class="progress-circle" viewBox="0 0 100 100">
				<circle class="progress-background" cx="50" cy="50" r="45"></circle>
				<circle class="progress-circle-bar" cx="50" cy="50" r="45"></circle>
			</svg>
			<div class="scroll-to-top">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<path d="M12 19V5M5 12l7-7 7 7" />
				</svg>
			</div>
		</div>
	<?php endif; ?>

</div>