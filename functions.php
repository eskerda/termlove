<?php

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

function termlove_setup() {
    register_nav_menu('header-menu', __('Header Menu'));
    add_theme_support('automatic-feed-links');
    add_theme_support('html5',array('search-form','comment-form','comment-list'));
    add_theme_support('post-thumbnails');
}

function termlove_scripts() {
    if (is_singular() && comments_open() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');
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

add_action('admin_init', 'custom_settings_api_init');
add_action('after_setup_theme', 'termlove_setup');
add_action('wp_enqueue_scripts', 'termlove_scripts');

?>
