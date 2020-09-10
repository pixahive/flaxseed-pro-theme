<?php
/**
 * Flaxseed-Pro Theme Customizer
 *
 * @package flaxseed-pro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flaxseedpro_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

}
add_action( 'customize_register', 'flaxseedpro_customize_register' );

// Load All Individual Settings Based on Sections/Panels.
require_once get_template_directory() . '/modules/customizer/_sanitization.php';
require_once get_template_directory() . '/modules/customizer/header.php';
require_once get_template_directory() . '/modules/customizer/social-icons.php';
require_once get_template_directory() . '/modules/customizer/google-fonts.php';
require_once get_template_directory() . '/modules/customizer/fonts.php';
require_once get_template_directory() . '/modules/customizer/featured-areas.php';
