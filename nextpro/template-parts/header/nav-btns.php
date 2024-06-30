<?php
$args = wp_parse_args($args, array(
    'enable_auth' => get_theme_mod('enable_auth', false),
    'login_url' => get_theme_mod('login_url', wp_login_url()),
    'register_url' => get_theme_mod('register_url', wp_registration_url()),
    'login_button_text' => get_theme_mod('login_button_text', 'SignIn'),
    'register_button_text' => get_theme_mod('register_button_text', 'SignUp'),

    'display_myaccount_btn' => get_theme_mod('display_myaccount_btn', false),
    'myaccount_button_text' => get_theme_mod('myaccount_button_text', 'My Account'),
));
extract($args);

if(!is_user_logged_in() && $enable_auth):
?>

<li class="nl-simple reg-fst-link mobile-last-link">
    <a class="h-link" href="<?php echo esc_url($login_url) ?>"><?php echo esc_attr($login_button_text) ?></a>
</li>

<li class="nl-simple">
    <a class="btn r-04 btn--theme hover--theme last-link" href="<?php echo esc_url($register_url) ?>"><?php echo esc_attr($register_button_text) ?></a>
</li>
<?php endif ?>

<?php if(is_user_logged_in() && $display_myaccount_btn):
$current_user = wp_get_current_user();
$profile_link = get_edit_profile_url($current_user->ID);
?>
<li class="nl-simple reg-fst-link mobile-last-link ms-md-4">
    <a class="btn r-04 btn--theme hover--theme last-link" href="<?php echo esc_url($profile_link) ?>"><?php echo esc_attr($myaccount_button_text) ?></a>
</li>
<?php endif ?>