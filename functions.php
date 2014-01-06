<?php

if ( ! function_exists( 'termlove_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 *
 */
function termlove_posted_on() {
    printf( __( '<time datetime="%1$s">%2$s</time>', 'termlove'),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
}
endif;

function register_main_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}

function custom_settings_api_init() {
    add_settings_field('google_analytics_id',
        'Google Analytics Tracking ID',
        'google_analytics_setting_callback_function',
        'general');
    register_setting('general','google_analytics_id');

    add_settings_field('gravatar_blog_email',
        'An email to display a gravatar image',
        'gravatar_blog_email_callback_function',
        'general');
    register_setting('general','gravatar_blog_email');
}

function google_analytics_setting_callback_function() {
    echo '<input name="google_analytics_id" id="st_google_analytics_id" type="text" value="'.get_option('google_analytics_id').'" placeholder="UA-XXXXX-X" />';
}

function gravatar_blog_email_callback_function() {
    echo '<input name="gravatar_blog_email" id="st_gravatar_blog_email type="text" value="'.get_option('gravatar_blog_email').' " placeholder="foo@example.com" />';
}

add_action( 'init', 'register_main_menu' );
add_action( 'admin_init', 'custom_settings_api_init');

add_theme_support( 'post-thumbnails' );

?>

