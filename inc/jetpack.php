<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package flaxseed-pro
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function flaxseedpro_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer' => false,
		'type' => 'click',
		'render' => 'flaxseedpro_jetpack_render_posts',
		'posts_per_page' => 10
	) );
}
add_action( 'after_setup_theme', 'flaxseedpro_jetpack_setup' );

function flaxseedpro_jetpack_render_posts() {
		while( have_posts() ) {
	    the_post();
	    do_action('flaxseedpro_blog_layout'); 
	}
}

function flaxseedpro_filter_jetpack_infinite_scroll_js_settings( $settings ) {
    $settings['text'] = __( 'Load more posts...', 'flaxseed-pro' );
    return $settings;
}
add_filter( 'infinite_scroll_js_settings', 'flaxseedpro_filter_jetpack_infinite_scroll_js_settings' );