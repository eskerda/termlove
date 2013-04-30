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

add_action( 'init', 'register_main_menu' );
add_theme_support( 'post-thumbnails' );

?>
